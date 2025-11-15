# Coming Soon Page - Northern Light International School

A modern, responsive coming soon page with countdown timer and email subscription functionality.

## ✨ Recent Improvements (Version 2.0)

### 🎨 Design Enhancements
- **Modern Glassmorphic UI** - Added frosted glass effect with backdrop blur
- **Gradient Backgrounds** - Dynamic gradient backgrounds with multiple color stops
- **Particle Effects** - Animated floating particles for visual appeal
- **Smooth Animations** - Enhanced fade-in, glow, and shimmer effects
- **Responsive Design** - Optimized for mobile, tablet, and desktop devices
- **Better Typography** - Improved font hierarchy and readability

### 🚀 Functionality Improvements
- **Email Subscription Form** - Users can subscribe to launch notifications
- **Enhanced Countdown Timer** - Improved progress bar with gradient and shimmer effects
- **Better Error Handling** - Retry logic and user-friendly error messages
- **Loading States** - Visual feedback during async operations
- **Accessibility** - ARIA labels, semantic HTML, and keyboard navigation
- **SEO Optimized** - Meta tags for search engines and social media sharing

### 📱 Responsive Features
- Mobile-first design approach
- Breakpoints for tablets (768px) and phones (480px)
- Touch-friendly buttons and form elements
- Optimized font sizes and spacing for all devices

### 🔧 Technical Improvements
- Modern CSS with custom properties (CSS variables)
- Modular JavaScript with better organization
- Form validation and sanitization
- LocalStorage integration for subscriber management
- Smooth scroll behavior for better UX

## 📁 File Structure

```
Coming-Soon/
├── default.php              # Main HTML page
├── css/
│   └── style.css           # Enhanced styles with animations
├── js/
│   └── myscript.js         # JavaScript with particle effects & form handling
├── Database/
│   ├── countdown_db.sql    # Countdown database schema
│   └── subscribers.sql     # Email subscribers table (new)
├── countdown-end-time.php  # API endpoint for countdown
├── subscribe.php           # Email subscription handler (new)
├── db.php                  # Database configuration
└── img/                    # Images and assets
```

## 🎯 Features

1. **Countdown Timer**
   - 8-day countdown with live updates
   - Visual progress bar with percentage
   - Days:Hours:Minutes:Seconds format
   - Auto-redirect when countdown ends

2. **Email Subscription**
   - Clean, modern form design
   - Real-time validation
   - Success/error feedback
   - Duplicate email prevention
   - Loading states during submission

3. **Visual Effects**
   - Animated floating particles
   - Gradient text effects with glow
   - Smooth hover transitions
   - Pulse animations on key elements

4. **Accessibility**
   - Semantic HTML5 elements
   - ARIA labels and roles
   - Keyboard navigation support
   - Screen reader friendly
   - High contrast text

## 🛠️ Setup Instructions

### Database Setup

1. Import the countdown database:
```bash
mysql -u username -p database_name < Database/countdown_db.sql
```

2. Import the subscribers table:
```bash
mysql -u username -p database_name < Database/subscribers.sql
```

3. Update database credentials in `db.php`:
```php
$servername = "localhost";
$username = "your_username";
$password = "your_password";
$dbname = "your_database";
```

### Web Server Setup

1. Place files in your web server directory (e.g., `htdocs` for XAMPP)
2. Start Apache and MySQL
3. Access via `http://localhost/Coming-Soon/default.php`

### Customization

1. **Organization Name**: Edit in `js/myscript.js`:
```javascript
const organizationName = "Your Organization Name";
```

2. **Colors**: Modify CSS variables in `css/style.css`:
```css
:root {
    --primary-color: #002366;
    --secondary-color: #FFA500;
}
```

3. **Countdown Duration**: Change in `js/myscript.js`:
```javascript
const totalSeconds = 8 * 24 * 60 * 60; // 8 days
```

## 📧 Email Subscription Integration

To use the database-backed email subscription:

1. Make sure the `subscribers` table is created (see Database Setup)
2. Update `js/myscript.js` to use the PHP endpoint (replace the localStorage logic):

```javascript
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
} else {
    showMessage(data.message, 'error');
}
```

## 🎨 Color Scheme

- **Primary**: Dark Blue (#002366)
- **Secondary**: Gold/Orange (#FFA500)
- **Accent**: Light Gold (#FFD700)
- **Success**: Green (#4ade80)
- **Error**: Red (#f87171)

## 📱 Browser Support

- Chrome (latest)
- Firefox (latest)
- Safari (latest)
- Edge (latest)
- Mobile browsers (iOS Safari, Chrome Mobile)

## 🔒 Security Features

- SQL injection prevention with prepared statements
- XSS protection with proper output escaping
- Email validation and sanitization
- CORS headers configuration
- Secure database connections

## 📊 What's New in Version 2.0

### Visual Improvements
✅ Glassmorphic design with frosted glass effects  
✅ Animated particle background  
✅ Gradient color schemes throughout  
✅ Improved responsive breakpoints  
✅ Better mobile experience  

### Functionality
✅ Email subscription system  
✅ Enhanced error handling with retries  
✅ Loading states and user feedback  
✅ Accessibility improvements (ARIA labels)  
✅ SEO meta tags for social sharing  

### Code Quality
✅ Modern CSS with custom properties  
✅ Better organized JavaScript  
✅ Improved security measures  
✅ Enhanced form validation  

## 👥 Credits

Developed by **Abdul-Hafiz Yussif** for **Nebatech Software Solution Ltd**
- Website: [nebatech.com](https://nebatech.com)
- Contact: info@nebatech.com
- Phone: (+233) 247636080 / 249241156 / 206789600

## 📄 License

See LICENSE file for details.

## 🚀 Future Enhancements

- [ ] Social media integration
- [ ] Multi-language support
- [ ] Admin dashboard for managing subscribers
- [ ] Automated email notification system
- [ ] Analytics integration (Google Analytics, etc.)
- [ ] Custom countdown end date selector
- [ ] Export subscribers list to CSV

---

**Version**: 2.0  
**Last Updated**: November 2025  
**For**: Northern Light International School
