document.addEventListener('DOMContentLoaded', () => {
    document.body.classList.add('js-ready');

    /* --------------------------------------------------
     * 1. Mobile-Optimized Scroll Observer
     * -------------------------------------------------- */
    const revealTargets = document.querySelectorAll(
        '.reveal-up, .reveal-left, .reveal-right, .reveal-clip, .reveal-3d, .stagger, .stats-bar-inner'
    );

    const observerOptions = {
        threshold: 0.02,
        rootMargin: '0px 0px 60px 0px' // Positive margin pre-triggers elements before viewport entry
    };

    const revealObserver = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const target = entry.target;
                target.classList.add('visible');

                // Trigger stats counter
                if (target.classList.contains('stats-bar-inner') || target.querySelector('.stats-bar-number')) {
                    playStats(target);
                }

                // Stop observing on mobile/desktop to eliminate layout jitter and reset loops
                observer.unobserve(target);
            }
        });
    }, observerOptions);

    revealTargets.forEach(el => revealObserver.observe(el));

    /* --------------------------------------------------
     * 2. Animated Stats Counter
     * -------------------------------------------------- */
    function playStats(container) {
        if (container.dataset.animating === 'true') return;
        container.dataset.animating = 'true';

        const statNumbers = container.querySelectorAll('.stats-bar-number, .about-stat-num');
        
        statNumbers.forEach(stat => {
            if (!stat.dataset.targetText) {
                stat.dataset.targetText = stat.innerText.trim();
            }
            
            const rawText = stat.dataset.targetText;
            const numericValue = parseInt(rawText.replace(/\D/g, ''), 10);
            const suffix = rawText.replace(/[0-9]/g, '');

            if (isNaN(numericValue)) return;

            let startTime = null;
            const duration = 1800;

            function updateCounter(currentTime) {
                if (!startTime) startTime = currentTime;
                const progress = Math.min((currentTime - startTime) / duration, 1);
                const easedProgress = progress === 1 ? 1 : 1 - Math.pow(2, -10 * progress);
                const currentValue = Math.floor(easedProgress * numericValue);

                stat.innerText = currentValue + suffix;

                if (progress < 1) {
                    requestAnimationFrame(updateCounter);
                } else {
                    stat.innerText = rawText;
                }
            }
            requestAnimationFrame(updateCounter);
        });
    }

    /* --------------------------------------------------
     * 3. Hero Parallax (Desktop Only)
     * -------------------------------------------------- */
    const blob1 = document.querySelector('.hero-blob-1');
    const blob2 = document.querySelector('.hero-blob-2');
    
    if (blob1 && blob2 && window.innerWidth > 900) {
        let currentScroll = 0;
        let targetScroll = 0;

        function lerp(start, end, factor) {
            return start + (end - start) * factor;
        }

        function renderParallax() {
            targetScroll = window.scrollY;
            currentScroll = lerp(currentScroll, targetScroll, 0.08);

            if (currentScroll < window.innerHeight) {
                blob1.style.transform = `translate3d(0, ${currentScroll * 0.25}px, 0)`;
                blob2.style.transform = `translate3d(0, ${currentScroll * -0.15}px, 0)`;
            }

            requestAnimationFrame(renderParallax);
        }
        
        renderParallax();
    }

    /* --------------------------------------------------
     * 4. Touch-Delegated Mobile Drawer
     * -------------------------------------------------- */
    ['click', 'touchstart'].forEach(eventType => {
        document.addEventListener(eventType, (e) => {
            const menuBtn = e.target.closest('.mobile-menu-btn');
            if (menuBtn) {
                e.preventDefault();
                document.querySelector('.mobile-drawer')?.classList.add('open');
                document.querySelector('.menu-overlay')?.classList.add('open');
                document.body.style.overflow = 'hidden';
                return;
            }

            const closeBtn = e.target.closest('.mobile-drawer-close');
            const overlay = e.target.closest('.menu-overlay');
            if (closeBtn || overlay) {
                e.preventDefault();
                document.querySelector('.mobile-drawer')?.classList.remove('open');
                document.querySelector('.menu-overlay')?.classList.remove('open');
                document.body.style.overflow = '';
            }
        }, { passive: false });
    });
});