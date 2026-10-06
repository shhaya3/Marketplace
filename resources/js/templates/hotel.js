document.addEventListener('DOMContentLoaded', function () {
    // 1. Tell CSS that JS is ready to handle animations
    document.body.classList.add('js-ready');

    // 2. Intersection Observer for the smooth drifting animations
    const revealEls = document.querySelectorAll('.reveal, .stagger');
    const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                entry.target.classList.add('visible');
            } else {
                // Remove class when out of view so it animates again on return
                entry.target.classList.remove('visible');
            }
        });
    }, { threshold: 0.15, rootMargin: '0px 0px -60px 0px' });

    revealEls.forEach((el) => observer.observe(el));

    // 3. Mobile Drawer Menu Logic
    const menuBtn = document.querySelector('.mobile-menu-btn');
    const drawer = document.querySelector('.mobile-drawer');
    const overlay = document.querySelector('.menu-overlay');
    const closeBtn = document.querySelector('.mobile-drawer-close');

    function openMenu() {
        drawer.classList.add('open');
        overlay.classList.add('open');
        document.body.style.overflow = 'hidden'; // Stop background scrolling
    }
    
    function closeMenu() {
        drawer.classList.remove('open');
        overlay.classList.remove('open');
        document.body.style.overflow = '';
    }

    if (menuBtn) menuBtn.addEventListener('click', openMenu);
    if (closeBtn) closeBtn.addEventListener('click', closeMenu);
    if (overlay) overlay.addEventListener('click', closeMenu);
});