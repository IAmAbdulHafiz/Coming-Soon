# Quick Setup Guide for Coming Soon Page

## 🚀 Getting Started

### Step 1: Database Configuration

1. Open phpMyAdmin or your MySQL client
2. Run the following SQL files in order:
   ```
   Database/countdown_db.sql
   Database/subscribers.sql
   ```

3. Update `db.php` with your database credentials:
   ```php
   $username = "your_username";
   $password = "your_password";
   $dbname = "your_database";
   ```

### Step 2: Customize Content

1. **Organization Name** (`js/myscript.js` line 2):
   ```javascript
   const organizationName = "Your Organization Name";
   ```

2. **Page Title** (`default.php` line 19):
   ```html
   <title>Coming Soon - Your Organization Name</title>
   ```

3. **Meta Description** (`default.php` line 6):
   ```html
   <meta name="description" content="Your custom description">
   ```

### Step 3: Customize Colors (Optional)

Edit `css/style.css` (lines 1-10):
```css
:root {
    --primary-color: #002366;     /* Your primary color */
    --secondary-color: #FFA500;   /* Your accent color */
}
```

### Step 4: Test the Page

1. Start XAMPP (Apache + MySQL)
2. Navigate to: `http://localhost/Coming-Soon/default.php`
3. Test the countdown timer
4. Test the email subscription form

### Step 5: Enable Database-Backed Email Subscriptions (Optional)

Replace the email handling in `js/myscript.js` (around line 90):

**Replace:**
```javascript
// Store email in localStorage (or send to backend)
const subscribers = JSON.parse(localStorage.getItem('subscribers') || '[]');
// ... localStorage code ...
```

**With:**
```javascript
// Send to backend
const response = await fetch('subscribe.php', {
    method: 'POST',
    headers: {
        'Content-Type': 'application/json'
    },
    body: JSON.stringify({ email: email })
});

const data = await response.json();

if (data.success) {
    showMessage(data.message, 'success');
    emailInput.value = '';
} else {
    showMessage(data.message, 'error');
}
```

## ✅ Checklist

- [ ] Database tables created
- [ ] Database credentials updated in `db.php`
- [ ] Organization name customized
- [ ] Page title and meta tags updated
- [ ] Colors customized (optional)
- [ ] Test countdown timer
- [ ] Test email subscription
- [ ] Mobile responsiveness checked
- [ ] Images/logo updated in `img/` folder

## 🔧 Troubleshooting

### Countdown not working?
- Check browser console for errors (F12)
- Verify database connection in `db.php`
- Ensure `countdown` table exists and has proper permissions

### Email form not working?
- Check if `subscribers` table exists
- Verify database connection
- Check browser console for JavaScript errors
- Ensure form inputs have correct IDs

### Styling issues?
- Clear browser cache (Ctrl+F5)
- Check if `css/style.css` is properly linked
- Verify CSS file path in `default.php`

### Mobile view problems?
- Test on actual device or use browser DevTools (F12)
- Check viewport meta tag is present
- Verify media queries in CSS

## 📞 Need Help?

Contact Nebatech Software Solution Ltd:
- Email: info@nebatech.com
- Phone: (+233) 247636080 / 249241156 / 206789600

## 🎉 You're All Set!

Your coming soon page is now ready. Share the link and start collecting email subscribers!
