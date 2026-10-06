document.addEventListener('click', function (e) {
    // Open Trigger (Public or Admin)
    const openTrigger = e.target.closest('.mobile-menu-btn, .admin-menu-toggle');
    if (openTrigger) {
        e.preventDefault();
        const drawer = document.querySelector('.mobile-drawer, .admin-sidebar');
        const overlay = document.querySelector('.menu-overlay, .admin-overlay');
        drawer?.classList.add('open');
        overlay?.classList.add('open');
        document.body.style.overflow = 'hidden';
        return;
    }

    // Close Trigger (X Button or Backdrop)
    const closeTrigger = e.target.closest('.mobile-drawer-close, .admin-sidebar-close, .menu-overlay, .admin-overlay');
    if (closeTrigger) {
        e.preventDefault();
        const drawer = document.querySelector('.mobile-drawer, .admin-sidebar');
        const overlay = document.querySelector('.menu-overlay, .admin-overlay');
        drawer?.classList.remove('open');
        overlay?.classList.remove('open');
        document.body.style.overflow = '';
    }
});