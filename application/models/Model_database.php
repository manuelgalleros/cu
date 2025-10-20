<?php

class Model_database extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Check if PPFMO database user exists
     * @return bool
     */
    public function checkPpfmoUserExists()
    {
        $sql = "SELECT COUNT(*) as count FROM mysql.user WHERE User = 'ppfmo' AND Host = 'localhost'";
        $query = $this->db->query($sql);
        $result = $query->row_array();
        return ($result['count'] > 0);
    }

    /**
     * Create PPFMO database user if it doesn't exist
     * @param string $password
     * @return bool
     */
    public function createPpfmoUser($password)
    {
        try {
            // Create user
            $sql = "CREATE USER IF NOT EXISTS 'ppfmo'@'localhost' IDENTIFIED BY ?";
            $this->db->query($sql, array($password));
            
            // Grant basic usage
            $sql = "GRANT USAGE ON *.* TO 'ppfmo'@'localhost'";
            $this->db->query($sql);
            
            // Flush privileges
            $this->db->query("FLUSH PRIVILEGES");
            
            return true;
        } catch (Exception $e) {
            log_message('error', 'Error creating PPFMO user: ' . $e->getMessage());
            return false;
        }
    }

    /**
     * Check if PPFMO user has global privileges that override cu.* permissions
     * @return array
     */
    public function hasGlobalPrivileges()
    {
        $result = array(
            'has_global' => false,
            'global_privileges' => array(),
            'is_super_admin' => false
        );

        try {
            $sql = "SHOW GRANTS FOR 'ppfmo'@'localhost'";
            $query = $this->db->query($sql);
            $results = $query->result_array();

            foreach ($results as $row) {
                $grant = array_values($row)[0];
                
                // Check for super-global privileges (ON *.*)
                if (stripos($grant, 'ON *.*') !== false) {
                    // Skip basic USAGE privilege as it's harmless and needed
                    if (stripos($grant, 'GRANT USAGE ON') !== false && stripos($grant, 'ALL PRIVILEGES') === false) {
                        continue;
                    }
                    
                    // Check if this is ALL PRIVILEGES on *.*
                    if (stripos($grant, 'ALL PRIVILEGES ON *.*') !== false) {
                        $result['is_super_admin'] = true;
                    }
                    
                    $result['has_global'] = true;
                    $result['global_privileges'][] = $grant;
                }
            }
        } catch (Exception $e) {
            log_message('error', 'Error checking global privileges: ' . $e->getMessage());
        }

        return $result;
    }

    /**
     * Remove super-global privileges from PPFMO user and set up cu.* permissions
     * @return array
     */
    public function removeGlobalPrivileges()
    {
        try {
            $revoked = false;
            
            // First, revoke ALL PRIVILEGES on *.* (super-global)
            try {
                $this->db->query("REVOKE ALL PRIVILEGES, GRANT OPTION FROM 'ppfmo'@'localhost'");
                $revoked = true;
                log_message('info', 'Revoked ALL PRIVILEGES on *.* from PPFMO user');
            } catch (Exception $e) {
                log_message('warning', 'Could not revoke ALL PRIVILEGES: ' . $e->getMessage());
            }
            
            // Also try specific revoke in case the above didn't work
            try {
                $this->db->query("REVOKE ALL PRIVILEGES ON *.* FROM 'ppfmo'@'localhost'");
                $revoked = true;
            } catch (Exception $e) {
                log_message('warning', 'Could not revoke *.* privileges: ' . $e->getMessage());
            }
            
            // Revoke GRANT OPTION separately
            try {
                $this->db->query("REVOKE GRANT OPTION ON *.* FROM 'ppfmo'@'localhost'");
            } catch (Exception $e) {
                log_message('warning', 'Could not revoke GRANT OPTION: ' . $e->getMessage());
            }
            
            // Ensure USAGE privilege exists for connection
            try {
                $this->db->query("GRANT USAGE ON *.* TO 'ppfmo'@'localhost'");
            } catch (Exception $e) {
                log_message('info', 'USAGE grant might already exist: ' . $e->getMessage());
            }
            
            // Flush privileges
            $this->db->query("FLUSH PRIVILEGES");
            
            if ($revoked) {
                return array(
                    'success' => true, 
                    'message' => 'Successfully removed super-global privileges. You can now manage individual permissions on the CU database.'
                );
            } else {
                return array(
                    'success' => false, 
                    'message' => 'Could not remove global privileges. Please check the logs or do it manually.'
                );
            }
            
        } catch (Exception $e) {
            log_message('error', 'Error removing global privileges: ' . $e->getMessage());
            return array('success' => false, 'message' => 'Error removing global privileges: ' . $e->getMessage());
        }
    }

    /**
     * Get current permissions for PPFMO user on cu database
     * @return array
     */
    public function getPpfmoPermissions()
    {
        $permissions = array(
            'select' => false,
            'insert' => false,
            'update' => false,
            'delete' => false
        );

        try {
            $sql = "SHOW GRANTS FOR 'ppfmo'@'localhost'";
            $query = $this->db->query($sql);
            $results = $query->result_array();

            foreach ($results as $row) {
                $grant = array_values($row)[0];
                
                // Check both database-wide (cu.*) and table-specific (cu.reservations) grants
                // Database-wide grants take precedence
                $is_relevant = false;
                
                if (stripos($grant, 'ON `cu`.*') !== false || stripos($grant, "ON 'cu'.*") !== false) {
                    // Database-wide grant on cu database
                    $is_relevant = true;
                } elseif (stripos($grant, '`reservations`') !== false || stripos($grant, 'cu.reservations') !== false) {
                    // Table-specific grant for reservations
                    $is_relevant = true;
                }
                
                if ($is_relevant) {
                    if (stripos($grant, 'SELECT') !== false || stripos($grant, 'ALL PRIVILEGES') !== false) {
                        $permissions['select'] = true;
                    }
                    if (stripos($grant, 'INSERT') !== false || stripos($grant, 'ALL PRIVILEGES') !== false) {
                        $permissions['insert'] = true;
                    }
                    if (stripos($grant, 'UPDATE') !== false || stripos($grant, 'ALL PRIVILEGES') !== false) {
                        $permissions['update'] = true;
                    }
                    if (stripos($grant, 'DELETE') !== false || stripos($grant, 'ALL PRIVILEGES') !== false) {
                        $permissions['delete'] = true;
                    }
                }
            }
        } catch (Exception $e) {
            log_message('error', 'Error getting PPFMO permissions: ' . $e->getMessage());
        }

        return $permissions;
    }

    /**
     * Grant specific permission to PPFMO user on cu database
     * @param string $permission (SELECT, INSERT, UPDATE, DELETE)
     * @return array
     */
    public function grantPermission($permission)
    {
        $permission = strtoupper($permission);
        $allowed = array('SELECT', 'INSERT', 'UPDATE', 'DELETE');

        if (!in_array($permission, $allowed)) {
            return array('success' => false, 'message' => 'Invalid permission type');
        }

        try {
            // Grant on entire cu database (global type)
            $sql = "GRANT {$permission} ON `cu`.* TO 'ppfmo'@'localhost'";
            $this->db->query($sql);
            
            // Flush privileges
            $this->db->query("FLUSH PRIVILEGES");
            
            return array('success' => true, 'message' => "{$permission} permission granted successfully");
        } catch (Exception $e) {
            log_message('error', 'Error granting permission: ' . $e->getMessage());
            return array('success' => false, 'message' => 'Error granting permission: ' . $e->getMessage());
        }
    }

    /**
     * Revoke specific permission from PPFMO user on cu database
     * @param string $permission (SELECT, INSERT, UPDATE, DELETE)
     * @return array
     */
    public function revokePermission($permission)
    {
        $permission = strtoupper($permission);
        $allowed = array('SELECT', 'INSERT', 'UPDATE', 'DELETE');

        if (!in_array($permission, $allowed)) {
            return array('success' => false, 'message' => 'Invalid permission type');
        }

        // Check if the permission exists before trying to revoke
        $current_permissions = $this->getPpfmoPermissions();
        $permission_key = strtolower($permission);
        
        if (!isset($current_permissions[$permission_key]) || !$current_permissions[$permission_key]) {
            // Permission doesn't exist, so nothing to revoke (end goal is achieved)
            return array('success' => true, 'message' => "{$permission} permission is already revoked");
        }

        try {
            // Revoke from entire cu database (global type)
            $sql = "REVOKE {$permission} ON `cu`.* FROM 'ppfmo'@'localhost'";
            $this->db->query($sql);
            
            // Flush privileges
            $this->db->query("FLUSH PRIVILEGES");
            
            return array('success' => true, 'message' => "{$permission} permission revoked successfully");
        } catch (Exception $e) {
            log_message('error', 'Error revoking permission: ' . $e->getMessage());
            return array('success' => false, 'message' => 'Error revoking permission: ' . $e->getMessage());
        }
    }

    /**
     * Grant all CRUD permissions at once
     * @return array
     */
    public function grantAllPermissions()
    {
        try {
            $permissions = array('SELECT', 'INSERT', 'UPDATE', 'DELETE');
            $granted_count = 0;
            $errors = array();
            
            // Grant each permission individually for better error handling
            foreach ($permissions as $permission) {
                try {
                    $sql = "GRANT {$permission} ON `cu`.* TO 'ppfmo'@'localhost'";
                    $this->db->query($sql);
                    $granted_count++;
                    log_message('info', "Granted {$permission} permission to PPFMO user");
                } catch (Exception $e) {
                    $error_msg = $e->getMessage();
                    log_message('warning', "Could not grant {$permission}: " . $error_msg);
                    $errors[] = "{$permission}: {$error_msg}";
                }
            }
            
            // Flush privileges
            $this->db->query("FLUSH PRIVILEGES");
            
            if ($granted_count === count($permissions)) {
                return array('success' => true, 'message' => 'All permissions granted successfully');
            } elseif ($granted_count > 0) {
                return array('success' => true, 'message' => "Granted {$granted_count} out of " . count($permissions) . " permissions");
            } else {
                return array('success' => false, 'message' => 'Could not grant permissions: ' . implode(', ', $errors));
            }
            
        } catch (Exception $e) {
            log_message('error', 'Error granting all permissions: ' . $e->getMessage());
            return array('success' => false, 'message' => 'Error granting permissions: ' . $e->getMessage());
        }
    }

    /**
     * Revoke all CRUD permissions at once
     * @return array
     */
    public function revokeAllPermissions()
    {
        try {
            // Get current permissions to only revoke what exists
            $current_permissions = $this->getPpfmoPermissions();
            $permissions_to_revoke = array();
            
            if ($current_permissions['select']) $permissions_to_revoke[] = 'SELECT';
            if ($current_permissions['insert']) $permissions_to_revoke[] = 'INSERT';
            if ($current_permissions['update']) $permissions_to_revoke[] = 'UPDATE';
            if ($current_permissions['delete']) $permissions_to_revoke[] = 'DELETE';
            
            if (empty($permissions_to_revoke)) {
                return array('success' => true, 'message' => 'All permissions are already revoked');
            }
            
            // Revoke each permission individually to avoid errors
            $revoked_count = 0;
            $errors = array();
            
            foreach ($permissions_to_revoke as $permission) {
                try {
                    $sql = "REVOKE {$permission} ON `cu`.* FROM 'ppfmo'@'localhost'";
                    $this->db->query($sql);
                    $revoked_count++;
                    log_message('info', "Revoked {$permission} permission from PPFMO user");
                } catch (Exception $e) {
                    $error_msg = $e->getMessage();
                    log_message('warning', "Could not revoke {$permission}: " . $error_msg);
                    
                    // Only add to errors if it's not a "no such grant" error
                    if (stripos($error_msg, 'no such grant') === false) {
                        $errors[] = "{$permission}: {$error_msg}";
                    }
                }
            }
            
            // Flush privileges
            $this->db->query("FLUSH PRIVILEGES");
            
            if ($revoked_count > 0) {
                return array('success' => true, 'message' => "Successfully revoked {$revoked_count} permission(s)");
            } elseif (!empty($errors)) {
                return array('success' => false, 'message' => 'Errors occurred: ' . implode(', ', $errors));
            } else {
                return array('success' => true, 'message' => 'All permissions were already revoked');
            }
            
        } catch (Exception $e) {
            log_message('error', 'Error revoking all permissions: ' . $e->getMessage());
            return array('success' => false, 'message' => 'Error revoking permissions: ' . $e->getMessage());
        }
    }

    /**
     * Change PPFMO user password
     * @param string $new_password
     * @return array
     */
    public function changePpfmoPassword($new_password)
    {
        try {
            $sql = "ALTER USER 'ppfmo'@'localhost' IDENTIFIED BY ?";
            $this->db->query($sql, array($new_password));
            
            // Flush privileges
            $this->db->query("FLUSH PRIVILEGES");
            
            return array('success' => true, 'message' => 'Password changed successfully');
        } catch (Exception $e) {
            log_message('error', 'Error changing password: ' . $e->getMessage());
            return array('success' => false, 'message' => 'Error changing password: ' . $e->getMessage());
        }
    }
}

