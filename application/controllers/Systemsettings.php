<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Systemsettings extends Admin_Controller 
{
    public function __construct()
    {
        parent::__construct();
        $this->not_logged_in();

        $this->data['page_title'] = 'System Settings';

        $this->load->model('model_users');
        $this->load->model('model_reservations');
        $this->load->model('model_database');
    }

    public function index()
    {
        redirect('systemsettings/backupRecovery');
    }

    /**
     * Backup Recovery: view deleted_reservations
     */
    public function backupRecovery()
    {
        $user_id = $this->session->userdata('id');
        $this->data['user_data'] = $this->model_users->getUserData($user_id);
        $this->data['page_title'] = 'Backup Recovery';

        $this->data['deleted_reservations'] = $this->model_reservations->getAllDeletedReservations();
        $this->data['deleted_users'] = method_exists($this->model_users, 'getAllDeletedUsers') ? $this->model_users->getAllDeletedUsers() : array();

        $this->render_template('settings/backup-recovery', $this->data);
    }

    /**
     * Database Permissions Management for PPFMO
     */
    public function databasePermissions()
    {
        // Only allow admin (user_id = 1)
        $user_id = $this->session->userdata('id');
        if ($user_id != 1) {
            redirect('dashboard', 'refresh');
            return;
        }

        $this->data['user_data'] = $this->model_users->getUserData($user_id);
        $this->data['page_title'] = 'Database Permissions';

        // Check if PPFMO user exists
        $this->data['ppfmo_exists'] = $this->model_database->checkPpfmoUserExists();

        // Get current permissions
        if ($this->data['ppfmo_exists']) {
            $this->data['permissions'] = $this->model_database->getPpfmoPermissions();
            // Check for global privileges
            $globalCheck = $this->model_database->hasGlobalPrivileges();
            $this->data['has_global'] = $globalCheck['has_global'];
            $this->data['is_super_admin'] = $globalCheck['is_super_admin'];
            $this->data['global_privileges'] = $globalCheck['global_privileges'];
        } else {
            $this->data['permissions'] = array(
                'select' => false,
                'insert' => false,
                'update' => false,
                'delete' => false
            );
            $this->data['has_global'] = false;
            $this->data['is_super_admin'] = false;
            $this->data['global_privileges'] = array();
        }

        $this->render_template('settings/database-permissions', $this->data);
    }

    /**
     * Create PPFMO database user
     */
    public function createPpfmoUser()
    {
        // Only allow admin via POST
        $user_id = $this->session->userdata('id');
        if ($user_id != 1 || $this->input->server('REQUEST_METHOD') !== 'POST') {
            echo json_encode(array('success' => false, 'message' => 'Unauthorized'));
            return;
        }

        $password = $this->input->post('password');
        if (empty($password)) {
            echo json_encode(array('success' => false, 'message' => 'Password is required'));
            return;
        }

        $result = $this->model_database->createPpfmoUser($password);
        
        if ($result) {
            echo json_encode(array('success' => true, 'message' => 'PPFMO database user created successfully'));
        } else {
            echo json_encode(array('success' => false, 'message' => 'Failed to create PPFMO user'));
        }
    }

    /**
     * Grant permission to PPFMO user
     */
    public function grantPermission()
    {
        // Only allow admin via POST
        $user_id = $this->session->userdata('id');
        if ($user_id != 1 || $this->input->server('REQUEST_METHOD') !== 'POST') {
            echo json_encode(array('success' => false, 'message' => 'Unauthorized'));
            return;
        }

        $permission = $this->input->post('permission');
        if (empty($permission)) {
            echo json_encode(array('success' => false, 'message' => 'Permission type is required'));
            return;
        }

        $result = $this->model_database->grantPermission($permission);
        echo json_encode($result);
    }

    /**
     * Revoke permission from PPFMO user
     */
    public function revokePermission()
    {
        // Only allow admin via POST
        $user_id = $this->session->userdata('id');
        if ($user_id != 1 || $this->input->server('REQUEST_METHOD') !== 'POST') {
            echo json_encode(array('success' => false, 'message' => 'Unauthorized'));
            return;
        }

        $permission = $this->input->post('permission');
        if (empty($permission)) {
            echo json_encode(array('success' => false, 'message' => 'Permission type is required'));
            return;
        }

        $result = $this->model_database->revokePermission($permission);
        echo json_encode($result);
    }

    /**
     * Grant all permissions
     */
    public function grantAllPermissions()
    {
        // Only allow admin via POST
        $user_id = $this->session->userdata('id');
        if ($user_id != 1 || $this->input->server('REQUEST_METHOD') !== 'POST') {
            echo json_encode(array('success' => false, 'message' => 'Unauthorized'));
            return;
        }

        $result = $this->model_database->grantAllPermissions();
        echo json_encode($result);
    }

    /**
     * Revoke all permissions
     */
    public function revokeAllPermissions()
    {
        // Only allow admin via POST
        $user_id = $this->session->userdata('id');
        if ($user_id != 1 || $this->input->server('REQUEST_METHOD') !== 'POST') {
            echo json_encode(array('success' => false, 'message' => 'Unauthorized'));
            return;
        }

        $result = $this->model_database->revokeAllPermissions();
        echo json_encode($result);
    }

    /**
     * Change PPFMO user password
     */
    public function changePpfmoPassword()
    {
        // Only allow admin via POST
        $user_id = $this->session->userdata('id');
        if ($user_id != 1 || $this->input->server('REQUEST_METHOD') !== 'POST') {
            echo json_encode(array('success' => false, 'message' => 'Unauthorized'));
            return;
        }

        $new_password = $this->input->post('new_password');
        if (empty($new_password)) {
            echo json_encode(array('success' => false, 'message' => 'New password is required'));
            return;
        }

        $result = $this->model_database->changePpfmoPassword($new_password);
        echo json_encode($result);
    }

    /**
     * Remove global privileges from PPFMO user
     */
    public function removeGlobalPrivileges()
    {
        // Only allow admin via POST
        $user_id = $this->session->userdata('id');
        if ($user_id != 1 || $this->input->server('REQUEST_METHOD') !== 'POST') {
            echo json_encode(array('success' => false, 'message' => 'Unauthorized'));
            return;
        }

        $result = $this->model_database->removeGlobalPrivileges();
        echo json_encode($result);
    }
}


