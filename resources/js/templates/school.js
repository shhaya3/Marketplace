document.addEventListener('DOMContentLoaded', function () {
    document.body.classList.add('js-ready');

    const revealEls = document.querySelectorAll('.reveal, .stagger');
    const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                entry.target.classList.add('visible');
            } else {
                entry.target.classList.remove('visible');
            }
        });
    }, { threshold: 0.15, rootMargin: '0px 0px -60px 0px' });

    revealEls.forEach((el) => observer.observe(el));

    const counters = document.querySelectorAll('[data-count]');
    const counterObserver = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                animateCount(entry.target);
            }
        });
    }, { threshold: 0.5 });
    counters.forEach((el) => counterObserver.observe(el));

    function animateCount(el) {
        const raw = el.getAttribute('data-count');
        const suffix = el.getAttribute('data-suffix') || '';
        const target = parseInt(raw.replace(/,/g, ''), 10);
        const duration = 1300;
        const start = performance.now();

        function tick(now) {
            const progress = Math.min((now - start) / duration, 1);
            const eased = 1 - Math.pow(1 - progress, 3);
            el.textContent = Math.floor(eased * target).toLocaleString() + suffix;
            if (progress < 1) requestAnimationFrame(tick);
            else el.textContent = target.toLocaleString() + suffix;
        }
        requestAnimationFrame(tick);
    }
    /* --------------------------------------------------
 * INDESTRUCTIBLE MOBILE DRAWER LOGIC
 * -------------------------------------------------- */
['click', 'touchstart'].forEach(eventType => {
    document.addEventListener(eventType, (e) => {
        // 1. Handle Opening
        const menuBtn = e.target.closest('.mobile-menu-btn');
        if (menuBtn) {
            e.preventDefault();
            const drawer = document.querySelector('.mobile-drawer');
            drawer?.classList.add('open');
            document.querySelector('.menu-overlay')?.classList.add('open');
            document.body.style.overflow = 'hidden';
            return;
        }

        // 2. Handle Closing (X button or dark overlay)
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