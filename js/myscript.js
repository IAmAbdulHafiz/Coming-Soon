// JavaScript to dynamically update the organization name
const organizationName = "A.K & Brodas Enterprise";
const orgNameElement = document.getElementById('organization-name');
if (orgNameElement) {
    orgNameElement.textContent = `Welcome to ${organizationName}!`;
}

// Create floating particles effect
function createParticles() {
    const particlesContainer = document.getElementById('particles');
    if (!particlesContainer) return;
    
    const particleCount = 30;
    
    for (let i = 0; i < particleCount; i++) {
        const particle = document.createElement('div');
        particle.className = 'particle';
        
        // Random size between 2-8px
        const size = Math.random() * 6 + 2;
        particle.style.width = `${size}px`;
        particle.style.height = `${size}px`;
        
        // Random position
        particle.style.left = `${Math.random() * 100}%`;
        particle.style.top = `${Math.random() * 100}%`;
        
        // Random animation delay and duration
        particle.style.animationDelay = `${Math.random() * 20}s`;
        particle.style.animationDuration = `${Math.random() * 15 + 15}s`;
        
        particlesContainer.appendChild(particle);
    }
}

// Initialize particles on load
window.addEventListener('DOMContentLoaded', createParticles);

// Programming language icons data with official logo URLs
const programmingLanguages = [
    { name: 'JavaScript', icon: 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/javascript/javascript-original.svg' },
    { name: 'Python', icon: 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/python/python-original.svg' },
    { name: 'Java', icon: 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/java/java-original.svg' },
    { name: 'C++', icon: 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/cplusplus/cplusplus-original.svg' },
    { name: 'PHP', icon: 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/php/php-original.svg' },
    { name: 'Ruby', icon: 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/ruby/ruby-original.svg' },
    { name: 'Swift', icon: 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/swift/swift-original.svg' },
    { name: 'Go', icon: 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/go/go-original.svg' },
    { name: 'Rust', icon: 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/rust/rust-plain.svg' },
    { name: 'TypeScript', icon: 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/typescript/typescript-original.svg' },
    { name: 'Kotlin', icon: 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/kotlin/kotlin-original.svg' },
    { name: 'C#', icon: 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/csharp/csharp-original.svg' }
];

// Create programming language icons
function createProgrammingIcons() {
    const iconsContainer = document.getElementById('prog-icons');
    if (!iconsContainer) return;
    
    const iconCount = window.innerWidth < 768 ? 8 : 12;
    const languagesToShow = programmingLanguages.slice(0, iconCount);
    
    languagesToShow.forEach((lang, index) => {
        const icon = document.createElement('div');
        icon.className = 'prog-icon';
        icon.setAttribute('title', lang.name);
        icon.setAttribute('role', 'img');
        icon.setAttribute('aria-label', `${lang.name} programming language`);
        
        // Create icon with actual logo image
        icon.innerHTML = `
            <img src="${lang.icon}" 
                 alt="${lang.name} logo" 
                 style="
                    width: 100%;
                    height: 100%;
                    object-fit: contain;
                    filter: drop-shadow(0 2px 8px rgba(0, 0, 0, 0.3));
                 "
                 onerror="this.style.display='none'"
            />
        `;
        
        // Random position
        const startX = Math.random() * 90; // 0-90% to keep within viewport
        const startY = Math.random() * 80; // 0-80% to keep within viewport
        icon.style.left = `${startX}%`;
        icon.style.top = `${startY}%`;
        
        // Random animation delay and duration
        icon.style.animationDelay = `${index * 0.5}s`;
        icon.style.animationDuration = `${12 + Math.random() * 6}s`;
        
        iconsContainer.appendChild(icon);
    });
}

// Initialize programming icons on load
window.addEventListener('DOMContentLoaded', createProgrammingIcons);

// Recreate icons on window resize for responsiveness
let resizeTimer;
window.addEventListener('resize', () => {
    clearTimeout(resizeTimer);
    resizeTimer = setTimeout(() => {
        const iconsContainer = document.getElementById('prog-icons');
        if (iconsContainer) {
            iconsContainer.innerHTML = '';
            createProgrammingIcons();
        }
    }, 500);
});

// JavaScript for the countdown timer and progress bar
const progressBar = document.getElementById('progress-bar');
const progressBarText = document.getElementById('progress-bar-text');
const progressPercentage = document.getElementById('progress-percentage');
const progressContainer = document.querySelector('.progress-container');
const totalSeconds = 60 * 60 * 60; // 60 hours in seconds

let retryCount = 0;
const maxRetries = 3;

async function getEndTime() {
    try {
        const response = await fetch('countdown-end-time.php', {
            headers: {
                'Accept': 'application/json'
            }
        });
        
        if (!response.ok) {
            throw new Error(`HTTP error! status: ${response.status}`);
        }
        
        const data = await response.json();
        console.log('Fetched end time:', data.endTime);
        return data.endTime;
    } catch (error) {
        console.error('Error fetching end time:', error);
        
        if (retryCount < maxRetries) {
            retryCount++;
            console.log(`Retrying... (${retryCount}/${maxRetries})`);
            await new Promise(resolve => setTimeout(resolve, 2000)); // Wait 2 seconds before retry
            return getEndTime();
        }
        
        return null;
    }
}

async function initializeCountdown() {
    // Show loading state
    if (progressBarText) {
        progressBarText.textContent = 'Loading...';
    }
    
    let endTime = await getEndTime();

    if (!endTime) {
        // If end time isn't set, initialize it to 60 hours from now
        try {
            console.log('No end time found, initializing to 60 hours...');
            const response = await fetch('countdown-end-time.php', { 
                method: 'POST',
                headers: {
                    'Accept': 'application/json'
                }
            });
            
            if (!response.ok) {
                throw new Error(`HTTP error! status: ${response.status}`);
            }
            
            const data = await response.json();
            
            if (data.error) {
                throw new Error(data.error);
            }
            
            endTime = data.endTime;
            console.log('Initialized end time:', endTime);
        } catch (error) {
            console.error('Error initializing end time:', error);
            if (progressBarText) {
                progressBarText.textContent = 'Database setup required';
                progressBarText.style.fontSize = '0.85rem';
            }
            if (progressPercentage) {
                progressPercentage.textContent = 'Run setup.sql';
                progressPercentage.style.fontSize = '0.7rem';
            }
            return;
        }
    }

    function updateProgressBar() {
        const now = new Date().getTime();
        const remainingTime = Math.max(0, endTime - now);
        const remainingSeconds = Math.floor(remainingTime / 1000);

        const elapsedSeconds = totalSeconds - remainingSeconds;
        const percentage = Math.min(100, Math.max(0, (elapsedSeconds / totalSeconds) * 100));

        if (remainingSeconds === 0) {
            if (progressBarText) {
                progressBarText.textContent = '🎉 Launching...';
            }
            // Redirect when countdown ends
            setTimeout(() => {
                window.location.href = 'nlis/index.html';
            }, 2000);
            return;
        }

        const days = Math.floor(remainingSeconds / (3600 * 24));
        const hours = Math.floor((remainingSeconds % (3600 * 24)) / 3600);
        const minutes = Math.floor((remainingSeconds % 3600) / 60);
        const seconds = remainingSeconds % 60;

        const timeString = `${days.toString().padStart(2, '0')}:${hours.toString().padStart(2, '0')}:${minutes.toString().padStart(2, '0')}:${seconds.toString().padStart(2, '0')}`;
        
        if (progressBarText) {
            progressBarText.textContent = timeString;
        }
        if (progressBar) {
            progressBar.style.width = `${percentage}%`;
        }
        if (progressPercentage) {
            progressPercentage.textContent = `${Math.floor(percentage)}%`;
        }
        if (progressContainer) {
            progressContainer.setAttribute('aria-valuenow', Math.floor(percentage));
        }

        setTimeout(updateProgressBar, 1000);
    }

    updateProgressBar();
}

// Initialize countdown
initializeCountdown();

// Email subscription form handling
const subscriptionForm = document.getElementById('subscription-form');
const emailInput = document.getElementById('email');
const formMessage = document.getElementById('form-message');
const subscribeBtn = subscriptionForm?.querySelector('.subscribe-btn');
const btnText = subscriptionForm?.querySelector('.btn-text');
const btnLoader = subscriptionForm?.querySelector('.btn-loader');

if (subscriptionForm) {
    subscriptionForm.addEventListener('submit', async (e) => {
        e.preventDefault();
        
        const email = emailInput.value.trim();
        
        // Validate email
        if (!isValidEmail(email)) {
            showMessage('Please enter a valid email address', 'error');
            return;
        }
        
        // Show loading state
        setLoading(true);
        
        try {
            // Simulate API call (replace with actual endpoint)
            await new Promise(resolve => setTimeout(resolve, 1500));
            
            // Store email in localStorage (or send to backend)
            const subscribers = JSON.parse(localStorage.getItem('subscribers') || '[]');
            
            if (subscribers.includes(email)) {
                showMessage('You are already subscribed!', 'error');
                setLoading(false);
                return;
            }
            
            subscribers.push(email);
            localStorage.setItem('subscribers', JSON.stringify(subscribers));
            
            // Success
            showMessage('🎉 Thank you! We\'ll notify you when we launch!', 'success');
            emailInput.value = '';
            
            // Add success animation to button
            if (subscribeBtn) {
                subscribeBtn.style.background = 'linear-gradient(135deg, #4ade80 0%, #22c55e 100%)';
                setTimeout(() => {
                    subscribeBtn.style.background = '';
                }, 2000);
            }
            
        } catch (error) {
            console.error('Subscription error:', error);
            showMessage('Oops! Something went wrong. Please try again.', 'error');
        } finally {
            setLoading(false);
        }
    });
}

function isValidEmail(email) {
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailRegex.test(email);
}

function showMessage(message, type) {
    if (!formMessage) return;
    
    formMessage.textContent = message;
    formMessage.className = `form-message ${type}`;
    formMessage.style.display = 'block';
    
    if (type === 'success') {
        setTimeout(() => {
            formMessage.style.display = 'none';
        }, 5000);
    }
}

function setLoading(loading) {
    if (!subscribeBtn || !btnText || !btnLoader) return;
    
    if (loading) {
        subscribeBtn.disabled = true;
        btnText.style.display = 'none';
        btnLoader.style.display = 'inline-block';
        btnLoader.textContent = '⏳';
    } else {
        subscribeBtn.disabled = false;
        btnText.style.display = 'inline';
        btnLoader.style.display = 'none';
    }
}

// Add smooth scroll behavior for better UX
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        const target = document.querySelector(this.getAttribute('href'));
        if (target) {
            target.scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
        }
    });
});
