<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="We are currently working on something amazing. Stay tuned for the launch of A.K & Brodas Enterprise!">
    <meta name="keywords" content="coming soon, A.K & Brodas Enterprise, business, launch">
    <meta name="author" content="Nebatech Software Solution Ltd">
    <meta name="theme-color" content="#002366">
    
    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:title" content="Coming Soon - A.K & Brodas Enterprise">
    <meta property="og:description" content="We are excited to launch something truly amazing. Stay tuned for updates!">
    <meta property="og:image" content="img/nss_brand.png">
    
    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:title" content="Coming Soon - A.K & Brodas Enterprise">
    <meta property="twitter:description" content="We are excited to launch something truly amazing. Stay tuned for updates!">
    
    <title>Coming Soon - A.K & Brodas Enterprise</title>
    <link rel="icon" type="image/x-icon" href="img/nss_logo.jpg" alt="NSS Logo">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&display=swap">
</head>
<body>
    <div class="digital-horizon" id="digital-horizon"></div>
    <div class="particles" id="particles"></div>
    <div class="prog-icons-container" id="prog-icons">
        <!-- Programming language icons will be added via JavaScript -->
    </div>
    <div class="background-image" role="img" aria-label="School branding"></div>
    <div class="overlay"></div>
    <main class="content">
        <div class="content-wrapper">
            <h1 id="coming-soon-title" class="main-title" aria-label="Coming Soon">Coming Soon</h1>
            <h2 id="organization-name" class="organization-title">Welcome to [Organization Name]!</h2>
            <p class="description">We are excited to have you here. Our team is working hard to build something truly amazing. Stay tuned for updates!</p>
            <div class="countdown-section">
                <h3 class="countdown-label">Launch Countdown</h3>
                <div class="progress-container" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
                    <div class="progress-bar" id="progress-bar"></div>
                    <div class="progress-bar-text" id="progress-bar-text" aria-live="polite"></div>
                    <div class="progress-percentage" id="progress-percentage" aria-live="polite">0%</div>
                </div>
            </div>
            
            <div class="subscription-section">
                <h3 class="subscription-label">Get Notified</h3>
                <p class="subscription-description">Be the first to know when we launch!</p>
                <form class="subscription-form" id="subscription-form">
                    <div class="form-group">
                        <input type="email" id="email" name="email" placeholder="Enter your email" required aria-label="Email address" class="email-input">
                        <button type="submit" class="subscribe-btn">
                            <span class="btn-text">Notify Me</span>
                            <span class="btn-loader" style="display: none;">...</span>
                        </button>
                    </div>
                    <div class="form-message" id="form-message" role="alert"></div>
                </form>
            </div>
            <div class="link-container">
                <a class="link" href="https://nebatech.com" rel="noopener noreferrer" target="_blank" aria-label="Visit Nebatech Software Solution Ltd website">
                    Developed by Nebatech Software Solution Ltd
                    <svg class="ic-launch" viewBox="0 0 21 20" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M16.3333 15.8333H4.66667V4.16667H10.5V2.5H4.66667C3.74167 2.5 3 3.25 3 4.16667V15.8333C3 16.75 3.74167 17.5 4.66667 17.5H16.3333C17.25 17.5 18 16.75 18 15.8333V10H16.3333V15.8333ZM12.1667 2.5V4.16667H15.1583L6.96667 12.3583L8.14167 13.5333L16.3333 5.34167V8.33333H18V2.5H12.1667Z" fill="#002366"/>
                    </svg>
                </a>
            </div>
        </div>
    </main>
    
    <footer class="footer" role="contentinfo">
        <p class="contact-info">
            <strong>Contact us:</strong>
            <a href="tel:+233247636080" class="phone-link">(+233) 247636080</a> / 
            <a href="tel:+233249241156" class="phone-link">249241156</a> / 
            <a href="tel:+233206789600" class="phone-link">206789600</a>
        </p>
        <p class="email-info">
            Email: <a href="mailto:info@nebatech.com" class="email-link">info@nebatech.com</a>
        </p>
    </footer>
    <script src="js/myscript.js" defer></script>
</body>
</html>