# Database Permissions Management for PPFMO

## How It Works

The system now manages **database-wide privileges** for the PPFMO user on the `cu` database. This means:

- Permissions are granted/revoked on `cu.*` (all tables in the cu database)
- This matches the typical setup where PPFMO has global-type access
- Simple and straightforward - no need to convert between privilege types

## Managing Permissions via Web Interface

1. Navigate to: **System Settings → Database Permissions**
2. You'll see the current status of all CRUD permissions
3. Use individual **Grant/Revoke** buttons for each permission
4. Or use **Grant All/Revoke All** for bulk operations
5. Changes take effect immediately with real-time UI updates

## What Gets Modified

When you grant or revoke permissions through the web interface, the system executes:

```sql
-- Granting a permission
GRANT SELECT ON `cu`.* TO 'ppfmo'@'localhost';

-- Revoking a permission
REVOKE SELECT ON `cu`.* FROM 'ppfmo'@'localhost';
```

Note: Permissions are applied to the entire `cu` database, not just the reservations table.

## Manual SQL Commands

If you need to manage permissions manually:

```sql
-- Grant specific permissions
GRANT SELECT, INSERT, UPDATE ON `cu`.* TO 'ppfmo'@'localhost';

-- Revoke specific permissions
REVOKE DELETE ON `cu`.* FROM 'ppfmo'@'localhost';

-- Grant all CRUD permissions
GRANT SELECT, INSERT, UPDATE, DELETE ON `cu`.* TO 'ppfmo'@'localhost';

-- Revoke all permissions (keep USAGE for connection)
REVOKE ALL PRIVILEGES ON `cu`.* FROM 'ppfmo'@'localhost';

-- Apply changes
FLUSH PRIVILEGES;

-- Verify
SHOW GRANTS FOR 'ppfmo'@'localhost';
```  

## Verification

To check the current permissions:

```sql
SHOW GRANTS FOR 'ppfmo'@'localhost';
```

**Expected output:**
```
GRANT USAGE ON *.* TO `ppfmo`@`localhost`
GRANT SELECT, INSERT, UPDATE ON `cu`.* TO `ppfmo`@`localhost`
```

This shows:
1. **USAGE** - Basic connection permission
2. **cu.*** - Database-wide permissions on the cu database

## How the Web Interface Works

The system:

1. **Detects** current permissions automatically when you visit the Database Permissions page
2. **Displays** the status of each CRUD operation (Granted/Revoked)
3. **Provides** individual Grant/Revoke buttons that work in real-time
4. **Updates** the UI instantly without page reload
5. **Disables** bulk action buttons intelligently based on current state
6. **Logs** all permission changes for audit purposes

## Permission Scope

The permissions managed through this interface apply to:
- ✅ All tables in the `cu` database
- ✅ Includes reservations, users, groups, logs, and all other tables
- ✅ Simple and straightforward management

## Security Considerations

When granting permissions:
- Only grant what's needed for PPFMO system to function
- DELETE permission is typically not needed
- Regularly review granted permissions
- All changes are logged in the activity logs

