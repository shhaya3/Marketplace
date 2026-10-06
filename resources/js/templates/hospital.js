console.log('Template JS loaded successfully');


document.addEventListener('DOMContentLoaded', () => {
    // 1. Reveal UI safely
    document.body.classList.add('js-ready');

    /* --------------------------------------------------
     * 2. NAV SCROLL SHADOW (Null-Safe)
     * -------------------------------------------------- */
    const nav = document.querySelector('.hnav');
    if (nav) {
        window.addEventListener('scroll', () => {
            if (window.scrollY > 20) {
                nav.classList.add('scrolled');
            } else {
                nav.classList.remove('scrolled');
            }
        }, { passive: true });
    }

    /* --------------------------------------------------
     * 3. CONTINUOUS SCROLL OBSERVER (Mobile-Optimized)
     * -------------------------------------------------- */
    const revealTargets = document.querySelectorAll('.anim-el, .anim-stagger, .reveal, .stagger');

    const observerOptions = {
        threshold: 0.01,
        // Positive bottom margin pre-triggers elements before they enter the screen
        rootMargin: '0px 0px 80px 0px' 
    };

    const revealObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('is-visible', 'visible');
                
                // Cascade visible state to all nested animation children immediately
                entry.target.querySelectorAll('.anim-el').forEach(child => {
                    child.classList.add('is-visible', 'visible');
                });

                // Trigger stats counter
                if (entry.target.classList.contains('stats-container') || entry.target.querySelector('.stat-float-num')) {
                    startCounters(entry.target);
                }
            } else {
                // Only reset when element is completely out of the viewport
                entry.target.classList.remove('is-visible', 'visible');
                
                // Reset stats counter
                if (entry.target.classList.contains('stats-container') || entry.target.querySelector('.stat-float-num')) {
                    resetCounters(entry.target);
                }
            }
        });
    }, observerOptions);

    revealTargets.forEach(el => revealObserver.observe(el));

    /* --------------------------------------------------
     * 4. STATS COUNTER LOGIC
     * -------------------------------------------------- */
    const statNumbers = document.querySelectorAll('.stat-float-num');
    const activeCounters = new Map();

    statNumbers.forEach(stat => {
        stat.innerText = '0' + (stat.dataset.suffix || '');
    });

    function startCounters(container) {
        const stats = container.querySelectorAll('.stat-float-num');
        stats.forEach((stat) => {
            const targetVal = parseInt(stat.dataset.val, 10);
            const suffix = stat.dataset.suffix || '';
            if (isNaN(targetVal)) return;

            const duration = 1800;
            const startTime = performance.now();

            if (activeCounters.has(stat)) {
                cancelAnimationFrame(activeCounters.get(stat));
            }

            function update(currentTime) {
                const progress = Math.min((currentTime - startTime) / duration, 1);
                const easedProgress = 1 - Math.pow(1 - progress, 3);
                
                stat.innerText = Math.floor(easedProgress * targetVal) + suffix;

                if (progress < 1) {
                    activeCounters.set(stat, requestAnimationFrame(update));
                } else {
                    stat.innerText = targetVal + suffix;
                }
            }
            activeCounters.set(stat, requestAnimationFrame(update));
        });
    }

    function resetCounters(container) {
        const stats = container.querySelectorAll('.stat-float-num');
        stats.forEach((stat) => {
            if (activeCounters.has(stat)) {
                cancelAnimationFrame(activeCounters.get(stat));
            }
            stat.innerText = '0' + (stat.dataset.suffix || '');
        });
    }

    /* --------------------------------------------------
     * 5. HERO LERP PARALLAX (Desktop Only)
     * -------------------------------------------------- */
    const heroParallax = document.getElementById('hero-parallax');
    
    if (heroParallax && window.innerWidth > 900) {
        let currentScroll = 0;
        let targetScroll = 0;

        function smoothScrollParallax() {
            targetScroll = window.scrollY;
            currentScroll += (targetScroll - currentScroll) * 0.08;
            
            if (currentScroll < window.innerHeight) {
                heroParallax.style.transform = `translate3d(0, ${currentScroll * 0.3}px, 0)`;
            }
            requestAnimationFrame(smoothScrollParallax);
        }
        
        smoothScrollParallax();
    }

    /* --------------------------------------------------
     * 6. STANDARDIZED MOBILE DRAWER LOGIC
     * -------------------------------------------------- */
    ['click', 'touchstart'].forEach(eventType => {
        document.addEventListener(eventType, (e) => {
            // Open Menu
            const menuBtn = e.target.closest('.mobile-menu-btn');
            if (menuBtn) {
                e.preventDefault();
                const drawer = document.querySelector('.mobile-drawer');
                drawer?.classList.add('open');
                document.querySelector('.menu-overlay')?.classList.add('open');
                document.body.style.overflow = 'hidden';
                return;
            }

            // Close Menu
            const closeBtn = e.target.closest('.mobile-drawer-close');
            const overlay = e.target.closest('.menu-overlay');
            
            if (closeBtn || overlay) {
                e.preventDefault();
                const drawer = document.querySelector('.mobile-drawer');
                drawer?.classList.remove('open');
                document.querySelector('.menu-overlay')?.classList.remove('open');
                document.body.style.overflow = '';
            }
        }, { passive: false });
    });
});