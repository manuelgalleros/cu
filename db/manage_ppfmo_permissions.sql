-- Manual Database Permissions Management for PPFMO User
-- These commands manage database-wide privileges on the cu database

-- ============================================
-- GRANT PERMISSIONS
-- ============================================

-- Grant individual permission
GRANT SELECT ON `cu`.* TO 'ppfmo'@'localhost';
GRANT INSERT ON `cu`.* TO 'ppfmo'@'localhost';
GRANT UPDATE ON `cu`.* TO 'ppfmo'@'localhost';
GRANT DELETE ON `cu`.* TO 'ppfmo'@'localhost';

-- OR grant all CRUD permissions at once
GRANT SELECT, INSERT, UPDATE, DELETE ON `cu`.* TO 'ppfmo'@'localhost';

-- Apply changes
FLUSH PRIVILEGES;

-- ============================================
-- REVOKE PERMISSIONS
-- ============================================

-- Revoke individual permission
REVOKE SELECT ON `cu`.* FROM 'ppfmo'@'localhost';
REVOKE INSERT ON `cu`.* FROM 'ppfmo'@'localhost';
REVOKE UPDATE ON `cu`.* FROM 'ppfmo'@'localhost';
REVOKE DELETE ON `cu`.* FROM 'ppfmo'@'localhost';

-- OR revoke all CRUD permissions at once
REVOKE SELECT, INSERT, UPDATE, DELETE ON `cu`.* FROM 'ppfmo'@'localhost';

-- Apply changes
FLUSH PRIVILEGES;

-- ============================================
-- VERIFY CURRENT PERMISSIONS
-- ============================================

-- Show all grants for PPFMO user
SHOW GRANTS FOR 'ppfmo'@'localhost';

-- Expected output:
-- GRANT USAGE ON *.* TO `ppfmo`@`localhost`
-- GRANT SELECT, INSERT, UPDATE ON `cu`.* TO `ppfmo`@`localhost`

-- ============================================
-- TYPICAL SETUP FOR PPFMO SYSTEM
-- ============================================

-- PPFMO typically needs SELECT and UPDATE for reservation status updates
-- INSERT might be needed if PPFMO creates records
-- DELETE is usually NOT needed

-- Recommended minimal setup:
GRANT SELECT, UPDATE ON `cu`.* TO 'ppfmo'@'localhost';
FLUSH PRIVILEGES;

-- If PPFMO also needs to create reservations:
GRANT SELECT, INSERT, UPDATE ON `cu`.* TO 'ppfmo'@'localhost';
FLUSH PRIVILEGES;

-- ============================================
-- NOTES
-- ============================================
-- These permissions apply to ALL tables in the cu database
-- Includes: reservations, users, groups, logs, orders, etc.
-- Use the web interface at System Settings → Database Permissions for easier management

