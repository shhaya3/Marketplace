document.addEventListener('DOMContentLoaded', () => {
    // 1. Reveal UI safely
    document.body.classList.add('js-ready');

    /* --------------------------------------------------
     * 2. NAV SCROLL SHADOW
     * -------------------------------------------------- */
    const nav = document.querySelector('.hnav');
    window.addEventListener('scroll', () => {
        if (window.scrollY > 30) {
            nav.classList.add('scrolled');
        } else {
            nav.classList.remove('scrolled');
        }
    }, { passive: true });

    /* --------------------------------------------------
     * 3. CONTINUOUS SCROLL OBSERVER (Two-way)
     * -------------------------------------------------- */
    const revealTargets = document.querySelectorAll('.anim-el, .anim-stagger');

    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -40px 0px' 
    };

    const revealObserver = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('is-visible');
                // Removed unobserve so it continuously triggers on scroll up/down
            } else {
                entry.target.classList.remove('is-visible');
            }
        });
    }, observerOptions);

    revealTargets.forEach(el => revealObserver.observe(el));

    /* --------------------------------------------------
     * 4. SMOOTH LERP PARALLAX (Hero & Polaroid)
     * -------------------------------------------------- */
    const heroParallax = document.getElementById('hero-parallax');
    const polaroidImg = document.getElementById('polaroid-parallax');
    
    if (window.innerWidth > 900) {
        let currentScroll = 0;
        let targetScroll = 0;

        function smoothScrollParallax() {
            targetScroll = window.scrollY;
            currentScroll += (targetScroll - currentScroll) * 0.08;
            
            if (heroParallax && currentScroll < window.innerHeight) {
                heroParallax.style.transform = `translate3d(0, ${currentScroll * 0.3}px, 0)`;
            }
            
            if (polaroidImg && currentScroll > 200 && currentScroll < 1800) {
                const offset = (currentScroll - 600) * 0.12; 
                polaroidImg.style.transform = `translate3d(0, ${-offset}px, 0) rotate(6deg)`;
            }
            
            requestAnimationFrame(smoothScrollParallax);
        }
        
        smoothScrollParallax();
    }

    /* --------------------------------------------------
     * 5. PREMIUM MOBILE DRAWER LOGIC
     * -------------------------------------------------- */
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