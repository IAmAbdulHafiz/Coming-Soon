# Database Setup Guide - Fix "Error loading countdown"

## Quick Fix Steps

### Step 1: Import the Database Tables

Open phpMyAdmin or your MySQL client and run this command:

```bash
# Using command line:
mysql -u u948335622_neba_coming -p u948335622_neba_coming < Database/setup.sql

# Or in phpMyAdmin:
# 1. Select your database: u948335622_neba_coming
# 2. Click "Import" tab
# 3. Choose file: Database/setup.sql
# 4. Click "Go"
```

### Step 2: Verify Tables Were Created

Run this SQL query to check:

```sql
SHOW TABLES;
```

You should see:
- `countdown`
- `subscribers`

### Step 3: Test the Countdown

1. Clear your browser cache (Ctrl + Shift + Delete)
2. Refresh the page (F5)
3. Open browser console (F12) to see any errors

## Alternative: Manual Table Creation

If the import doesn't work, copy and paste this into phpMyAdmin SQL tab:

```sql
-- Create countdown table
CREATE TABLE IF NOT EXISTS countdown (
    id INT AUTO_INCREMENT PRIMARY KEY,
    end_time BIGINT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Create subscribers table
CREATE TABLE IF NOT EXISTS subscribers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) NOT NULL UNIQUE,
    subscribed_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    notified BOOLEAN DEFAULT FALSE,
    INDEX idx_email (email),
    INDEX idx_subscribed_at (subscribed_at)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
```

## Troubleshooting Common Issues

### Issue 1: "Table 'countdown' doesn't exist"
**Solution:** Run the setup.sql file or create tables manually (see above)

### Issue 2: "Connection failed"
**Solution:** Check your database credentials in `db.php`:
- Username: u948335622_neba_coming
- Password: C0deP@$$w0r_D
- Database: u948335622_neba_coming

### Issue 3: "Access denied"
**Solution:** 
1. Verify MySQL user has correct permissions
2. Check if database exists
3. Verify credentials are correct

### Issue 4: Still showing "Error loading countdown"
**Solution:**
1. Open browser console (F12)
2. Look for specific error messages
3. Check Network tab for failed requests
4. Verify countdown-end-time.php is accessible

## Check Database Connection

Create a test file `test-db.php` in your root folder:

```php
<?php
include 'db.php';

if ($conn->connect_error) {
    echo "❌ Connection failed: " . $conn->connect_error;
} else {
    echo "✅ Database connected successfully!<br>";
    
    // Check if tables exist
    $tables = ['countdown', 'subscribers'];
    foreach ($tables as $table) {
        $result = $conn->query("SHOW TABLES LIKE '$table'");
        if ($result->num_rows > 0) {
            echo "✅ Table '$table' exists<br>";
        } else {
            echo "❌ Table '$table' NOT found<br>";
        }
    }
}
$conn->close();
?>
```

Visit: `http://localhost/Coming-Soon/test-db.php`

## Success Checklist

- [ ] Database credentials correct in db.php
- [ ] Tables created (countdown and subscribers)
- [ ] Apache and MySQL running
- [ ] Browser cache cleared
- [ ] No errors in browser console
- [ ] Countdown displays properly

## Still Need Help?

Contact: info@nebatech.com or (+233) 247636080
