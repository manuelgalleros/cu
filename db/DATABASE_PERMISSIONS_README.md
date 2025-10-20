# PPFMO Database Permissions Management

## Overview

This system allows the admin of the main application (using root MySQL credentials) to manage database permissions for the PPFMO system. The PPFMO system uses a separate database user (`ppfmo`@`localhost`) to access the `reservations` table.

## Purpose

The PPFMO system needs to interact with the reservation data in the main database. Instead of sharing the root database credentials, we create a dedicated `ppfmo` MySQL user with controlled permissions.

## Features

### 1. **CRUD Permission Control**
The admin can grant or revoke individual permissions:
- **SELECT** (Read) - View reservation data
- **INSERT** (Create) - Add new reservations
- **UPDATE** (Modify) - Update existing reservations (e.g., change status to "endorsed")
- **DELETE** (Remove) - Delete reservations

### 2. **User Management**
- Create the PPFMO database user
- Change the PPFMO user password
- View current permission status

### 3. **Quick Actions**
- Grant all permissions at once
- Revoke all permissions at once

## How to Use

### Admin Interface (Recommended)

1. **Access the Settings:**
   - Navigate to: **System Settings → Database Permissions**
   - Direct URL: `/systemsettings/databasePermissions`

2. **Create PPFMO User (First Time Only):**
   - If the PPFMO user doesn't exist, you'll see a form to create it
   - Enter a strong password
   - Click "Create PPFMO User"

3. **Manage Permissions:**
   - View the current status of each permission (Granted/Revoked)
   - Click "Grant" to enable a permission
   - Click "Revoke" to disable a permission
   - Use "Grant All Permissions" for full access
   - Use "Revoke All Permissions" to remove all access

4. **Change Password:**
   - Use the password change form in the Quick Actions panel
   - Enter the new password
   - Click "Change Password"

### Manual Setup (SQL)

If you prefer to set up the PPFMO user manually:

```bash
mysql -u root -p'@Password123' cu < db/setup_ppfmo_database_user.sql
```

**Important:** Edit the SQL file first to set a secure password!

## Security Features

### Access Control
- Only the admin user (user_id = 1) can access the database permissions page
- All permission changes require admin authorization
- Uses POST requests with CSRF protection

### Password Security
- PPFMO user password is separate from admin password
- Password can be changed anytime from the admin interface
- Strong passwords recommended

### Audit Trail
- All permission changes are logged
- Activity logs track who made changes and when

## Technical Details

### Database Structure

**User:** `ppfmo`@`localhost`  
**Database:** `cu`  
**Table:** `reservations`

### Available Permissions

| Permission | SQL Command | Purpose |
|-----------|-------------|---------|
| SELECT | `GRANT SELECT ON cu.reservations TO 'ppfmo'@'localhost'` | Read data |
| INSERT | `GRANT INSERT ON cu.reservations TO 'ppfmo'@'localhost'` | Create records |
| UPDATE | `GRANT UPDATE ON cu.reservations TO 'ppfmo'@'localhost'` | Modify records |
| DELETE | `GRANT DELETE ON cu.reservations TO 'ppfmo'@'localhost'` | Remove records |

### Files Created

1. **Model:** `application/models/Model_database.php`
   - Manages MySQL user and permissions
   - Methods: `grantPermission()`, `revokePermission()`, etc.

2. **Controller:** `application/controllers/Systemsettings.php`
   - Endpoints for permission management
   - Methods: `databasePermissions()`, `grantPermission()`, etc.

3. **View:** `application/views/settings/database-permissions.php`
   - User interface for managing permissions
   - AJAX-powered for smooth UX

4. **SQL Scripts:**
   - `db/setup_ppfmo_database_user.sql` - Manual setup script
   - `db/DATABASE_PERMISSIONS_README.md` - This documentation

## Common Use Cases

### Scenario 1: Initial Setup
**Goal:** Set up PPFMO with full access

1. Create PPFMO user with a password
2. Click "Grant All Permissions"
3. Verify all 4 permissions show "Granted"

### Scenario 2: Read-Only Access
**Goal:** Allow PPFMO to view reservations only

1. Revoke INSERT, UPDATE, DELETE permissions
2. Keep SELECT permission granted
3. PPFMO can now only read data

### Scenario 3: Update Status Only
**Goal:** Allow PPFMO to update reservation status (e.g., to "endorsed")

1. Grant SELECT and UPDATE permissions
2. Revoke INSERT and DELETE permissions
3. PPFMO can read and update, but not create or delete

### Scenario 4: Security Lockdown
**Goal:** Temporarily block all PPFMO access

1. Click "Revoke All Permissions"
2. All permissions will be revoked
3. PPFMO system will no longer have database access

### Scenario 5: Password Reset
**Goal:** Change PPFMO database password

1. Go to Quick Actions panel
2. Enter new password in "Change PPFMO Password" form
3. Click "Change Password"
4. Update the PPFMO application's database configuration

## Troubleshooting

### Issue: "PPFMO User Not Found"
**Solution:** Create the user using the form or run the SQL setup script

### Issue: "Access Denied" errors in PPFMO
**Causes:**
1. PPFMO user doesn't exist
2. Required permissions are revoked
3. Wrong password in PPFMO config

**Solution:** 
- Check permission status in admin panel
- Verify PPFMO password matches database user password

### Issue: Can't grant/revoke permissions
**Causes:**
1. Not logged in as admin (user_id = 1)
2. Database connection issues
3. Root user lacks GRANT privilege

**Solution:**
- Ensure you're logged in as the admin user
- Check MySQL root user has GRANT privilege

## Best Practices

1. **Principle of Least Privilege:**
   - Only grant permissions that PPFMO actually needs
   - Review permissions periodically

2. **Password Security:**
   - Use strong, unique passwords for PPFMO user
   - Change password if compromised
   - Don't share credentials

3. **Regular Audits:**
   - Review permission status monthly
   - Check activity logs for suspicious changes

4. **Documentation:**
   - Document any permission changes
   - Note why specific permissions are granted/revoked

5. **Backup:**
   - Keep a record of current permissions
   - Test permission changes in development first

## API Endpoints

All endpoints require admin authorization (user_id = 1) and POST method:

- `/systemsettings/databasePermissions` - View permissions page
- `/systemsettings/createPpfmoUser` - Create PPFMO user
- `/systemsettings/grantPermission` - Grant single permission
- `/systemsettings/revokePermission` - Revoke single permission
- `/systemsettings/grantAllPermissions` - Grant all CRUD permissions
- `/systemsettings/revokeAllPermissions` - Revoke all CRUD permissions
- `/systemsettings/changePpfmoPassword` - Change PPFMO password

## Database Queries Reference

### Check User Exists
```sql
SELECT User, Host FROM mysql.user WHERE User = 'ppfmo';
```

### View Current Permissions
```sql
SHOW GRANTS FOR 'ppfmo'@'localhost';
```

### Grant Individual Permission
```sql
GRANT SELECT ON cu.reservations TO 'ppfmo'@'localhost';
FLUSH PRIVILEGES;
```

### Revoke Individual Permission
```sql
REVOKE SELECT ON cu.reservations FROM 'ppfmo'@'localhost';
FLUSH PRIVILEGES;
```

### Change Password
```sql
ALTER USER 'ppfmo'@'localhost' IDENTIFIED BY 'new_password';
FLUSH PRIVILEGES;
```

## Support

For issues or questions about database permissions:
1. Check this documentation first
2. Review activity logs for recent changes
3. Verify MySQL root user permissions
4. Check PPFMO application logs for connection errors

---

**Created:** October 2025  
**System:** Reservation Management System  
**Database:** MySQL/MariaDB  
**Framework:** CodeIgniter 3

