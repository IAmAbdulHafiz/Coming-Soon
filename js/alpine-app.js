// Alpine.js App for Coming Soon Page
function comingSoonApp() {
    return {
        organizationName: 'A.K & Brodas Enterprise',
        email: '',
        message: '',
        messageType: '',
        loading: false,
        timeString: 'Loading...',
        percentage: 0,
        endTime: null,
        totalSeconds: 60 * 60 * 60, // 60 hours
        typingText: '',
        fullText: 'Coming Soon',
        typingIndex: 0,
        isDeleting: false,

        async init() {
            await this.initializeCountdown();
            this.createParticles();
            this.createProgrammingIcons();
            this.startTyping();
        },

        startTyping() {
            const typeSpeed = this.isDeleting ? 50 : 300;
            const pauseEnd = 3000;
            const pauseStart = 500;

            if (!this.isDeleting && this.typingIndex < this.fullText.length) {
                this.typingText = this.fullText.substring(0, this.typingIndex + 1);
                this.typingIndex++;
                setTimeout(() => this.startTyping(), typeSpeed);
            } else if (this.isDeleting && this.typingIndex > 0) {
                this.typingIndex--;
                this.typingText = this.fullText.substring(0, this.typingIndex);
                setTimeout(() => this.startTyping(), typeSpeed);
            } else if (this.typingIndex === this.fullText.length) {
                this.isDeleting = true;
                setTimeout(() => this.startTyping(), pauseEnd);
            } else if (this.typingIndex === 0) {
                this.isDeleting = false;
                setTimeout(() => this.startTyping(), pauseStart);
            }
        },

        async initializeCountdown() {
            try {
                this.endTime = await this.getEndTime();

                if (!this.endTime) {
                    const response = await fetch('countdown-end-time.php', {
                        method: 'POST',
                        headers: { 'Accept': 'application/json' }
                    });

                    if (!response.ok) throw new Error(`HTTP error! status: ${response.status}`);

                    const data = await response.json();
                    if (data.error) throw new Error(data.error);

                    this.endTime = data.endTime;
                }

                this.updateProgressBar();
            } catch (error) {
                console.error('Error initializing countdown:', error);
                this.timeString = 'Database setup required';
                this.percentage = 0;
            }
        },

        async getEndTime() {
            try {
                const response = await fetch('countdown-end-time.php', {
                    headers: { 'Accept': 'application/json' }
                });

                if (!response.ok) throw new Error(`HTTP error! status: ${response.status}`);

                const data = await response.json();
                return data.endTime;
            } catch (error) {
                console.error('Error fetching end time:', error);
                return null;
            }
        },

        updateProgressBar() {
            const now = new Date().getTime();
            const remainingTime = Math.max(0, this.endTime - now);
            const remainingSeconds = Math.floor(remainingTime / 1000);

            const elapsedSeconds = this.totalSeconds - remainingSeconds;
            this.percentage = Math.min(100, Math.max(0, (elapsedSeconds / this.totalSeconds) * 100));

            if (remainingSeconds === 0) {
                this.timeString = '🎉 Launching...';
                setTimeout(() => {
                    window.location.href = 'nlis/index.html';
                }, 2000);
                return;
            }

            const days = Math.floor(remainingSeconds / (3600 * 24));
            const hours = Math.floor((remainingSeconds % (3600 * 24)) / 3600);
            const minutes = Math.floor((remainingSeconds % 3600) / 60);
            const seconds = remainingSeconds % 60;

            this.timeString = `${String(days).padStart(2, '0')}:${String(hours).padStart(2, '0')}:${String(minutes).padStart(2, '0')}:${String(seconds).padStart(2, '0')}`;

            setTimeout(() => this.updateProgressBar(), 1000);
        },

        async handleSubmit() {
            if (!this.validateEmail(this.email)) {
                this.showMessage('Please enter a valid email address', 'error');
                return;
            }

            this.loading = true;

            try {
                // Simulate API call - replace with actual backend call
                await new Promise(resolve => setTimeout(resolve, 1500));

                const subscribers = JSON.parse(localStorage.getItem('subscribers') || '[]');

                if (subscribers.includes(this.email)) {
                    this.showMessage('You are already subscribed!', 'error');
                    this.loading = false;
                    return;
                }

                subscribers.push(this.email);
                localStorage.setItem('subscribers', JSON.stringify(subscribers));

                this.showMessage('🎉 Thank you! We\'ll notify you when we launch!', 'success');
                this.email = '';

                setTimeout(() => {
                    this.message = '';
                }, 5000);
            } catch (error) {
                console.error('Subscription error:', error);
                this.showMessage('Oops! Something went wrong. Please try again.', 'error');
            } finally {
                this.loading = false;
            }
        },

        validateEmail(email) {
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return emailRegex.test(email);
        },

        showMessage(text, type) {
            this.message = text;
            this.messageType = type;
        },

        createParticles() {
            const particlesContainer = document.getElementById('particles');
            if (!particlesContainer) return;

            const particleCount = 30;

            for (let i = 0; i < particleCount; i++) {
                const particle = document.createElement('div');
                particle.className = 'absolute rounded-full bg-secondary opacity-30';

                const size = Math.random() * 6 + 2;
                particle.style.width = `${size}px`;
                particle.style.height = `${size}px`;
                particle.style.left = `${Math.random() * 100}%`;
                particle.style.top = `${Math.random() * 100}%`;
                particle.style.animationDelay = `${Math.random() * 20}s`;
                particle.style.animationDuration = `${Math.random() * 15 + 15}s`;
                particle.style.animation = 'float 20s infinite ease-in-out';

                particlesContainer.appendChild(particle);
            }
        },

        createProgrammingIcons() {
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

            const iconsContainer = document.getElementById('prog-icons');
            if (!iconsContainer) return;

            const iconCount = window.innerWidth < 768 ? 8 : 12;
            const languagesToShow = programmingLanguages.slice(0, iconCount);

            languagesToShow.forEach((lang, index) => {
                const icon = document.createElement('div');
                icon.className = 'prog-icon absolute w-[60px] h-[60px] md:w-[45px] md:h-[45px] sm:w-[35px] sm:h-[35px] p-2 bg-white/10 backdrop-blur-sm rounded-xl opacity-80 hover:opacity-100 hover:scale-125 transition-all cursor-pointer pointer-events-auto';
                icon.setAttribute('title', lang.name);
                icon.setAttribute('role', 'img');
                icon.setAttribute('aria-label', `${lang.name} programming language`);

                icon.innerHTML = `
                    <img src="${lang.icon}" 
                         alt="${lang.name} logo" 
                         class="w-full h-full object-contain"
                         style="filter: drop-shadow(0 2px 8px rgba(0, 0, 0, 0.3));"
                         onerror="this.style.display='none'"
                    />
                `;

                icon.style.left = `${Math.random() * 90}%`;
                icon.style.top = `${Math.random() * 80}%`;
                icon.style.setProperty('--animation-delay', `${index * 0.5}s`);
                icon.style.setProperty('--animation-duration', `${12 + Math.random() * 6}s`);

                iconsContainer.appendChild(icon);
            });
        }
    }
}
