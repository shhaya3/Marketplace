document.addEventListener('DOMContentLoaded', function () {
    document.body.classList.add('js-ready');

    /* --------------------------------------------------
     * SCROLL ANIMATION OBSERVER
     * -------------------------------------------------- */
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

    /* --------------------------------------------------
     * NAVBAR SHADOW SCROLL EFFECT
     * -------------------------------------------------- */
    const nav = document.querySelector('.hnav');
    if (nav) {
        window.addEventListener('scroll', function () {
            nav.classList.toggle('scrolled', window.scrollY > 20);
        });
    }

    /* --------------------------------------------------
     * INDESTRUCTIBLE MOBILE DRAWER LOGIC
     * -------------------------------------------------- */
    ['click', 'touchstart'].forEach(eventType => {
        document.addEventListener(eventType, (e) => {
            // Handle Opening
            const menuBtn = e.target.closest('.mobile-menu-btn');
            if (menuBtn) {
                e.preventDefault();
                const drawer = document.querySelector('.mobile-drawer');
                drawer?.classList.add('open');
                document.querySelector('.menu-overlay')?.classList.add('open');
                document.body.style.overflow = 'hidden';
                return;
            }

            // Handle Closing (X button or dark overlay)
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

    /* --------------------------------------------------
     * FLASH SALE COUNTDOWN TIMER
     * -------------------------------------------------- */
    let seconds = 3 * 3600 + 24 * 60 + 18; // 03:24:18 initial state
    const hEl = document.getElementById('dealH');
    const mEl = document.getElementById('dealM');
    const sEl = document.getElementById('dealS');

    function pad(n) { return n.toString().padStart(2, '0'); }

    function tick() {
        if (seconds <= 0) return;
        seconds--;
        const h = Math.floor(seconds / 3600);
        const m = Math.floor((seconds % 3600) / 60);
        const s = seconds % 60;
        if (hEl) hEl.textContent = pad(h);
        if (mEl) mEl.textContent = pad(m);
        if (sEl) sEl.textContent = pad(s);
    }

    setInterval(tick, 1000);
});