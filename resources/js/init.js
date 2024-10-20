import AWN from './plugins/notification';
globalThis.notifier = new AWN({ position: 'top-right', maxNotifications: 3 });

document.addEventListener('DOMContentLoaded', () => {
    const sidebar = document.getElementById('sidebar');
    const sidebarBackdrop = document.getElementById('sidebar-backdrop');
    const body = document.body;

    const openSidebar = () => {
        sidebar.classList.remove('-translate-x-full');
        sidebarBackdrop.classList.remove('hidden');
        body.classList.add('overflow-hidden');
    };

    const closeSidebar = () => {
        sidebar.classList.add('-translate-x-full');
        sidebarBackdrop.classList.add('hidden');
        body.classList.remove('overflow-hidden');
    };

    document.querySelectorAll('[data-sidebar-toggle]').forEach(toggle => {
        toggle.addEventListener('click', e => {
            e.stopPropagation();
            openSidebar();
        });
    });

    document.querySelectorAll('[data-sidebar-close]').forEach(close => {
        close.addEventListener('click', () => {
            closeSidebar();
        });
    });

    document.addEventListener('click', e => {
        if (!sidebar.contains(e.target) && !e.target.matches('[data-sidebar-toggle]')) {
            closeSidebar();
        }
    });

    // Prevent clicks inside the sidebar from closing it
    sidebar.addEventListener('click', e => {
        e.stopPropagation();
    });

    document.querySelectorAll('[uk-scrollable]').forEach(el => {
        new PerfectScrollbar(el, {
            wheelPropagation: false,
            suppressScrollX: true
        });
    });
});
