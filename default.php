<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0, user-scalable=yes">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
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
    
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Alpine.js CDN -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    
    <!-- Google Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&display=swap">
    
    <!-- Custom Tailwind Config -->
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#002366',
                        secondary: '#FFA500',
                        accent: '#FFD700',
                    },
                    fontFamily: {
                        sans: ['DM Sans', 'sans-serif'],
                    },
                    animation: {
                        'float': 'float 20s infinite ease-in-out',
                        'float-icon': 'floatIcon 15s infinite ease-in-out',
                        'shimmer': 'shimmer 2s infinite',
                        'pulse-subtle': 'pulseSubtle 4s infinite ease-in-out',
                        'horizon-scroll': 'horizonScroll 20s linear infinite',
                    },
                    keyframes: {
                        float: {
                            '0%, 100%': { transform: 'translateY(0) translateX(0) rotate(0deg)', opacity: '0.3' },
                            '50%': { transform: 'translateY(-100px) translateX(50px) rotate(180deg)', opacity: '0.6' },
                        },
                        floatIcon: {
                            '0%, 100%': { transform: 'translateY(0) translateX(0) rotate(0deg)' },
                            '25%': { transform: 'translateY(-30px) translateX(20px) rotate(5deg)' },
                            '50%': { transform: 'translateY(-50px) translateX(-10px) rotate(-5deg)' },
                            '75%': { transform: 'translateY(-20px) translateX(30px) rotate(3deg)' },
                        },
                        shimmer: {
                            '0%': { backgroundPosition: '-100% 0' },
                            '100%': { backgroundPosition: '200% 0' },
                        },
                        pulseSubtle: {
                            '0%, 100%': { opacity: '0.15', transform: 'scale(1)' },
                            '50%': { opacity: '0.25', transform: 'scale(1.02)' },
                        },
                        horizonScroll: {
                            '0%': { transform: 'translateX(0)' },
                            '100%': { transform: 'translateX(50%)' },
                        },
                    },
                }
            }
        }
    </script>
    
    <link rel="stylesheet" href="css/custom-animations.css">
</head>
<body class="bg-transparent font-sans text-white text-center relative overflow-x-hidden overflow-y-auto py-8 px-5 sm:py-6 sm:px-4" 
      x-data="comingSoonApp()" 
      x-init="init()">
    
    <!-- Fixed Background Gradient -->
    <div class="fixed inset-0 bg-gradient-to-br from-[#001a4d] via-primary to-[#003d99] -z-10"></div>
    
    <!-- Digital Horizon -->
    <div class="fixed bottom-0 left-0 w-full h-[300px] md:h-[200px] pointer-events-none z-0 digital-horizon-bg">
        <div class="absolute bottom-0 left-[-50%] w-[200%] h-[2px] animate-horizon-scroll horizon-lines"></div>
        <div class="absolute bottom-0 left-0 w-full h-full grid-lines"></div>
    </div>
    
    <!-- Particles -->
    <div class="fixed inset-0 pointer-events-none z-0" id="particles"></div>
    
    <!-- Programming Icons -->
    <div class="fixed inset-0 pointer-events-none overflow-hidden z-[5]" id="prog-icons"></div>
    
    <!-- Background Image -->
    <div class="fixed bottom-[5%] right-[5%] w-[450px] h-[450px] md:w-[280px] md:h-[280px] opacity-15 md:opacity-12 z-0 pointer-events-none animate-pulse-subtle bg-contain bg-no-repeat bg-center" 
         style="background-image: url('/img/nss_brand.png')" 
         role="img" 
         aria-label="Company branding"></div>
    
    <!-- Main Content -->
    <main class="relative z-10 w-full max-w-[750px] mx-auto px-5 md:px-4 py-8 sm:py-6">
        <div class="backdrop-blur-lg rounded-[30px] md:rounded-[20px] p-8 md:p-6 sm:p-5 shadow-[0_20px_60px_rgba(0,0,0,0.5)] border border-secondary/10 relative z-10">
            
            <!-- Title -->
            <h1 class="text-4xl md:text-3xl sm:text-2xl font-bold mb-6 md:mb-5 sm:mb-4 leading-tight bg-gradient-to-r from-secondary to-accent bg-clip-text text-transparent tracking-wider typing-title"
                id="coming-soon-title"
                aria-label="Coming Soon">
                <span x-text="typingText"></span><span class="typing-cursor">|</span>
            </h1>
            
            <!-- Organization Name -->
            <h2 class="text-2xl md:text-xl sm:text-lg font-semibold mb-4 sm:mb-3 leading-snug"
                id="organization-name"
                x-text="organizationName"></h2>
            
            <!-- Description -->
            <p class="text-base md:text-sm leading-relaxed mb-8 md:mb-6 sm:mb-5 text-gray-200 max-w-[600px] mx-auto">
                We are excited to have you here. Our team is working hard to build something truly amazing. Stay tuned for updates!
            </p>
            
            <!-- Countdown Section -->
            <div class="my-10 md:my-8">
                <h3 class="text-xl md:text-lg font-semibold text-secondary mb-5 uppercase tracking-widest">
                    Launch Countdown
                </h3>
                <div class="w-[90%] md:w-[95%] max-w-[650px] h-14 md:h-11 sm:h-10 mx-auto relative rounded-full overflow-hidden bg-white/10 backdrop-blur-sm shadow-[inset_0_2px_10px_rgba(0,0,0,0.3),0_5px_15px_rgba(255,165,0,0.1)] border border-secondary/20"
                     role="progressbar" 
                     :aria-valuenow="percentage"
                     aria-valuemin="0" 
                     aria-valuemax="100">
                    <!-- Progress Bar -->
                    <div class="absolute top-0 left-0 h-full rounded-full bg-gradient-to-r from-green-400 via-green-500 to-green-600 transition-all duration-500 shadow-[0_0_20px_rgba(34,197,94,0.5)] animate-shimmer"
                         :style="`width: ${percentage}%`"></div>
                    <!-- Countdown Text -->
                    <div class="absolute left-5 md:left-4 sm:left-3 top-0 h-full flex items-center text-white font-bold text-lg md:text-base sm:text-sm z-[1] tracking-wide font-mono"
                         style="text-shadow: 0 2px 5px rgba(0, 0, 0, 0.5);"
                         x-text="timeString"
                         aria-live="polite"></div>
                    <!-- Percentage -->
                    <div class="absolute right-5 md:right-4 sm:right-3 top-0 h-full flex items-center text-white font-bold text-lg md:text-base sm:text-sm z-[2]"
                         style="text-shadow: 0 2px 5px rgba(0, 0, 0, 0.5);"
                         x-text="`${Math.floor(percentage)}%`"
                         aria-live="polite"></div>
                </div>
            </div>
            
            <!-- Subscription Section -->
            <div class="my-12 md:my-10 sm:my-8">
                <h3 class="text-xl md:text-lg font-semibold text-secondary mb-3 uppercase tracking-widest">
                    Get Notified
                </h3>
                <p class="text-base text-gray-200 mb-5">
                    Be the first to know when we launch!
                </p>
                <form class="max-w-[450px] mx-auto" @submit.prevent="handleSubmit">
                    <div class="flex flex-col sm:flex-col gap-3 mb-4">
                        <input type="email" 
                               x-model="email"
                               placeholder="Enter your email" 
                               required 
                               class="flex-1 min-w-[200px] px-4 py-3 text-sm bg-white/10 border-2 border-secondary/30 rounded-lg text-white placeholder-white/50 focus:outline-none focus:border-secondary focus:bg-white/15 focus:shadow-[0_0_20px_rgba(255,165,0,0.1)] transition-all appearance-none"
                               aria-label="Email address">
                        <button type="submit" 
                                :disabled="loading"
                                class="px-6 py-3 min-h-[44px] text-sm font-semibold uppercase tracking-wide bg-gradient-to-r from-secondary to-accent text-primary rounded-lg shadow-[0_5px_15px_rgba(255,165,0,0.1)] hover:shadow-[0_8px_25px_rgba(255,165,0,0.3)] hover:-translate-y-0.5 active:translate-y-0 transition-all disabled:opacity-60 disabled:cursor-not-allowed">
                            <span x-show="!loading">Notify Me</span>
                            <span x-show="loading">⏳</span>
                        </button>
                    </div>
                    <div x-show="message" 
                         x-transition
                         class="min-h-[20px] text-sm mt-3 p-3 rounded-lg"
                         :class="messageType === 'success' ? 'text-green-400 bg-green-400/10 border border-green-400/30' : 'text-red-400 bg-red-400/10 border border-red-400/30'"
                         role="alert"
                         x-text="message"></div>
                </form>
            </div>
            
            <!-- Developer Link -->
            <div class="mt-8">
                <a href="https://nebatech.com" 
                   rel="noopener noreferrer" 
                   target="_blank"
                   class="inline-flex items-center justify-center gap-3 font-semibold text-base text-primary bg-secondary px-6 py-3 rounded-lg shadow-[0_5px_15px_rgba(255,165,0,0.1)] hover:shadow-[0_8px_25px_rgba(255,165,0,0.3)] hover:-translate-y-0.5 hover:bg-accent transition-all"
                   aria-label="Visit Nebatech Software Solution Ltd website">
                    Developed by Nebatech Software Solution Ltd
                    <svg class="w-5 h-5 transition-transform hover:translate-x-1 hover:-translate-y-1" viewBox="0 0 21 20" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M16.3333 15.8333H4.66667V4.16667H10.5V2.5H4.66667C3.74167 2.5 3 3.25 3 4.16667V15.8333C3 16.75 3.74167 17.5 4.66667 17.5H16.3333C17.25 17.5 18 16.75 18 15.8333V10H16.3333V15.8333ZM12.1667 2.5V4.16667H15.1583L6.96667 12.3583L8.14167 13.5333L16.3333 5.34167V8.33333H18V2.5H12.1667Z" fill="#002366"/>
                    </svg>
                </a>
            </div>
        </div>
    </main>
    
    <!-- Footer -->
    <footer class="relative z-10 mt-10 md:mt-8 px-5 py-4 text-sm md:text-xs text-gray-200" role="contentinfo">
        <p class="my-2 leading-relaxed">
            <strong>Contact us:</strong>
            <a href="tel:+233247636080" class="text-secondary hover:text-accent hover:underline transition-colors">(+233) 247636080</a> / 
            <a href="tel:+233249241156" class="text-secondary hover:text-accent hover:underline transition-colors">249241156</a> / 
            <a href="tel:+233206789600" class="text-secondary hover:text-accent hover:underline transition-colors">206789600</a>
        </p>
        <p class="my-2">
            Email: <a href="mailto:info@nebatech.com" class="text-secondary hover:text-accent hover:underline transition-colors">info@nebatech.com</a>
        </p>
    </footer>
    
    <script src="js/alpine-app.js"></script>
    <script src="js/animations.js"></script>
</body>
</html>