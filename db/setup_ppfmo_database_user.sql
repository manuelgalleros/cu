-- ============================================
-- PPFMO Database User Setup Script
-- ============================================
-- This script creates the PPFMO database user and configures permissions
-- for the reservations table in the cu database.
--
-- Usage: You can use the Admin UI (System Settings > Database Permissions)
-- or run this script manually.
-- ============================================

-- Step 1: Create the PPFMO database user
-- Replace 'YOUR_SECURE_PASSWORD_HERE' with a strong password
CREATE USER IF NOT EXISTS 'ppfmo'@'localhost' IDENTIFIED BY 'YOUR_SECURE_PASSWORD_HERE';

-- Step 2: Grant basic usage
GRANT USAGE ON *.* TO 'ppfmo'@'localhost';

-- Step 3: Grant CRUD permissions on the reservations table
-- You can grant all permissions at once:
GRANT SELECT, INSERT, UPDATE, DELETE ON cu.reservations TO 'ppfmo'@'localhost';

-- OR grant them individually as needed:
-- GRANT SELECT ON cu.reservations TO 'ppfmo'@'localhost';  -- Read permission
-- GRANT INSERT ON cu.reservations TO 'ppfmo'@'localhost';  -- Create permission
-- GRANT UPDATE ON cu.reservations TO 'ppfmo'@'localhost';  -- Update permission
-- GRANT DELETE ON cu.reservations TO 'ppfmo'@'localhost';  -- Delete permission

-- Step 4: Apply the changes
FLUSH PRIVILEGES;

-- ============================================
-- VERIFICATION QUERIES
-- ============================================

-- Check if user exists
SELECT User, Host FROM mysql.user WHERE User = 'ppfmo';

-- Show current grants for PPFMO user
SHOW GRANTS FOR 'ppfmo'@'localhost';

-- ============================================
-- MANAGING PERMISSIONS
-- ============================================

-- To REVOKE a specific permission:
-- REVOKE SELECT ON cu.reservations FROM 'ppfmo'@'localhost';
-- REVOKE INSERT ON cu.reservations FROM 'ppfmo'@'localhost';
-- REVOKE UPDATE ON cu.reservations FROM 'ppfmo'@'localhost';
-- REVOKE DELETE ON cu.reservations FROM 'ppfmo'@'localhost';

-- To REVOKE all permissions:
-- REVOKE ALL PRIVILEGES ON cu.reservations FROM 'ppfmo'@'localhost';
-- FLUSH PRIVILEGES;

-- To CHANGE the password:
-- ALTER USER 'ppfmo'@'localhost' IDENTIFIED BY 'NEW_PASSWORD_HERE';
-- FLUSH PRIVILEGES;

-- To DELETE the user completely (use with caution):
-- DROP USER 'ppfmo'@'localhost';
-- FLUSH PRIVILEGES;

-- ============================================
-- PERMISSION DESCRIPTIONS
-- ============================================
-- SELECT: Allows reading/viewing reservation data
-- INSERT: Allows creating new reservations
-- UPDATE: Allows modifying existing reservations (e.g., updating status to 'endorsed')
-- DELETE: Allows removing reservations from the table
-- ============================================

