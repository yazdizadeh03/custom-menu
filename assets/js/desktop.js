// Follow the actual header content box, including when its width changes.
function positionMegaPanels() {
    document.querySelectorAll('.navbar').forEach(nav => {
        const header = nav.closest('header, [role="banner"]');
        let container = nav.parentElement;
        while (container && container !== header && container.getBoundingClientRect().width < nav.getBoundingClientRect().width + 80) {
            container = container.parentElement;
        }
        if (!container || (container === document.body)) container = header || nav;
        let box = container.getBoundingClientRect();
        // A full-width header often has a nested, centered content wrapper.
        if (box.width >= window.innerWidth - 2 && header) {
            const wrappers = Array.from(header.querySelectorAll('*')).filter(el =>
                el.contains(nav) && el !== nav && el.getBoundingClientRect().width > nav.getBoundingClientRect().width + 80 &&
                el.getBoundingClientRect().width < window.innerWidth - 24
            );
            if (wrappers.length) box = wrappers[0].getBoundingClientRect();
        }
        const margin = 16;
        const search = header && header.querySelector('input[type="search"], input[placeholder*="جستجو"], input[placeholder*="Search"], [role="search"] input');
        // The search box is the left edge of the visible header content.
        let searchBox = search && search.getBoundingClientRect();
        if (searchBox && searchBox.width) {
            let searchWrapper = search.parentElement;
            while (searchWrapper && searchWrapper !== header) {
                const wrapperBox = searchWrapper.getBoundingClientRect();
                if (wrapperBox.width > 0 && wrapperBox.width < window.innerWidth / 3 && wrapperBox.width < 500) {
                    if (wrapperBox.left < searchBox.left) searchBox = wrapperBox;
                }
                searchWrapper = searchWrapper.parentElement;
            }
        }
        const left = Math.max(margin, searchBox && searchBox.width ? searchBox.left : box.left);
        const right = Math.min(window.innerWidth - margin, box.right);
        const width = Math.max(0, right - left);
        const top = header ? header.getBoundingClientRect().bottom : nav.getBoundingClientRect().bottom;
        nav.style.setProperty('--cmb-panel-left', `${left}px`);
        nav.style.setProperty('--cmb-panel-width', `${width}px`);
        nav.style.setProperty('--cmb-panel-top', `${Math.max(0, top + 8)}px`);
    });
}
positionMegaPanels();
window.addEventListener('resize', positionMegaPanels, { passive: true });
window.addEventListener('scroll', positionMegaPanels, { passive: true });
document.querySelectorAll('.has-mega, .submenu').forEach(megaItem => {
    const megaToggle = megaItem.querySelector('.mega-toggle');
    const dropdownContent = megaItem.querySelector('.dropdown-content');
    let clicked = false;

    if(megaToggle){ // ← چک کن وجود داشته باشه
        megaToggle.addEventListener('click', (e) => {
            e.preventDefault();
            positionMegaPanels();
            clicked = !clicked;
            megaItem.classList.toggle('active', clicked);
        });
    }

    document.addEventListener('click', (e) => {
        if (!megaItem.contains(e.target)) {
            clicked = false;
            megaItem.classList.remove('active');
        }
    });
});

document.querySelectorAll('.title-sidebar-tab .tab-item').forEach(tab => {
    tab.addEventListener('click', function () {

        // نزدیک‌ترین زیرمنویی که این تب داخلشه
        const scope = tab.closest('.dropdown-content');
        if (!scope) return;

        // فقط تب‌های داخل همین زیرمنو
        scope.querySelectorAll('.tab-item').forEach(item =>
            item.classList.remove('active')
        );

        tab.classList.add('active');

        // فقط محتوای تب‌های همین زیرمنو
        scope.querySelectorAll('.tab-content').forEach(content =>
            content.classList.remove('active')
        );

        const target = tab.getAttribute('data-target');
        const targetEl = scope.querySelector(`#${target}`);
        if (targetEl) {
            targetEl.classList.add('active');
        }
    });
});

(function () {
    const words = ['بروکر', 'صرافی', 'صندوق', 'کارگزاری'];
    const pattern = new RegExp('(^|\\s)(' + words.join('|') + ')(?=\\s|$)', 'g');

    document.querySelectorAll('.category-content-sec .choice-item.cart-section .cart-item p').forEach(p => {
        const original = p.textContent;
        const cleaned = original.replace(pattern, ' ').replace(/\s{2,}/g, ' ').trim();
        if (cleaned !== original.trim()) {
            p.textContent = cleaned;
        }
    });
})();
const menuBackdrop = document.createElement('div');
menuBackdrop.className = 'cmb-menu-backdrop';
document.body.appendChild(menuBackdrop);

function updateMenuBackdrop() {
    const isOpen = !!document.querySelector('.has-mega.active, .submenu.active');

    menuBackdrop.classList.toggle('is-visible', isOpen);

    const header = document.querySelector('.header-site');

    if (header) {
        header.classList.toggle('menu-active', isOpen);
    }
}

document.querySelectorAll('.has-mega .mega-toggle').forEach(toggle => {
    toggle.addEventListener('click', () => {
        requestAnimationFrame(updateMenuBackdrop);
    });
});

document.addEventListener('click', event => {
    if (event.target.closest('.has-mega, .submenu')) {
        requestAnimationFrame(updateMenuBackdrop);
    }
});

menuBackdrop.addEventListener('click', () => {
    document.querySelectorAll('.has-mega.active, .submenu.active').forEach(menu => {
        menu.classList.remove('active');
    });

    updateMenuBackdrop();
});
