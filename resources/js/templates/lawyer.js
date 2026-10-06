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
     * NAVBAR FROSTED GLASS SCROLL EFFECT
     * -------------------------------------------------- */
    const nav = document.querySelector('.hnav');
    if (nav) {
        window.addEventListener('scroll', function () {
            nav.classList.toggle('scrolled', window.scrollY > 30);
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

            // Handle Closing
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
     * PRACTICE AREA TABS
     * -------------------------------------------------- */
    const navItems = document.querySelectorAll('.practice-nav-item');
    const details = {
        civil: { tag: 'Civil Litigation', title: 'Resolving disputes with strategic clarity', desc: 'We represent clients in property disputes, contract breaches, and civil recovery matters — combining thorough preparation with courtroom experience across Maharashtra.' },
        corporate: { tag: 'Corporate Law', title: 'Structuring business for growth and protection', desc: 'From incorporation to mergers, we advise businesses on regulatory compliance, contracts, and corporate governance that stands up to scrutiny.' },
        family: { tag: 'Family Law', title: 'Compassionate counsel through difficult transitions', desc: 'Divorce, custody, and inheritance matters handled with discretion and a focus on amicable resolution wherever possible.' },
        criminal: { tag: 'Criminal Defence', title: 'Rigorous defence at every stage', desc: 'From bail applications to trial representation, our criminal defence practice protects your rights through every step of the process.' }
    };
    const detailPane = document.querySelector('.practice-detail');

    navItems.forEach((item) => {
        item.addEventListener('click', function () {
            navItems.forEach((i) => i.classList.remove('active'));
            this.classList.add('active');
            const key = this.dataset.practice;
            const d = details[key];
            
            if (d && detailPane) {
                // Soft fade transition for the text change
                detailPane.classList.add('fade-out');
                setTimeout(() => {
                    detailPane.querySelector('.practice-detail-tag').textContent = d.tag;
                    detailPane.querySelector('.practice-detail-title').textContent = d.title;
                    detailPane.querySelector('.practice-detail-desc').textContent = d.desc;
                    detailPane.classList.remove('fade-out');
                }, 150);
            }
        });
    });
});