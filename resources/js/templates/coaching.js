document.addEventListener('DOMContentLoaded', () => {
    // 1. Reveal UI safely
    document.body.classList.add('js-ready');

    /* --------------------------------------------------
     * 2. NAVBAR SCROLL ELEVATION
     * -------------------------------------------------- */
    const nav = document.querySelector('.hnav');
    if (nav) {
        window.addEventListener('scroll', () => {
            nav.classList.toggle('scrolled', window.scrollY > 20);
        }, { passive: true });
    }

    /* --------------------------------------------------
     * 3. MOBILE-OPTIMIZED SCROLL OBSERVER (One-time trigger)
     * -------------------------------------------------- */
    const revealTargets = document.querySelectorAll('.anim-el, .anim-stagger, .reveal, .stagger');

    const revealObserver = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const target = entry.target;
                target.classList.add('is-visible', 'visible');
                
                // Immediately cascade visibility to nested child elements
                target.querySelectorAll('.anim-el').forEach(child => {
                    child.classList.add('is-visible', 'visible');
                });

                // Unobserve to prevent mobile scroll-reset jitter
                observer.unobserve(target);
            }
        });
    }, {
        threshold: 0.05,
        rootMargin: '0px 0px 50px 0px' // Positive bottom buffer pre-triggers cards
    });

    revealTargets.forEach(el => revealObserver.observe(el));

    /* --------------------------------------------------
     * 4. TOUCH-DELEGATED MOBILE DRAWER LOGIC
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