/**
 * Kodam Broker — Mobile menu navigation (loaded only when wp_is_mobile()).
 *
 * State-based navigation with a stack:
 *   stack = ['mobileMainPanel', 'platformPanel', 'brokerPanel']
 *   - Open a sub menu  -> push, content cross-fades.
 *   - Back             -> pop,  content cross-fades to the previous level.
 * Header and search are never re-rendered; the header only switches
 * between "logo" and "back" when crossing between the main level and
 * the first sub level.
 */
(function () {
    'use strict';

    var drawer = document.getElementById('mobileDrawer');
    if (!drawer || drawer.getAttribute('data-amb-ready') === '1') return; // guard against double init
    drawer.setAttribute('data-amb-ready', '1');

    var hamburger = document.getElementById('hamburgerBtn');
    var viewport  = drawer.querySelector('[data-amb-viewport]');
    var backBtn   = drawer.querySelector('[data-amb-back]');
    var ROOT      = 'mobileMainPanel';
    var LOCK_MS   = 240;   // blocks double taps while a transition runs
    var CLOSE_MS  = 360;   // matches the drawer slide duration

    var stack = [ROOT];
    var lockedUntil = 0;
    var resetTimer = null;
    var lastFocus = null;

    function panel(id) {
        return id ? document.getElementById(id) : null;
    }

    function setHeader() {
        var sub = stack.length > 1;
        drawer.classList.toggle('is-sub', sub);
        if (backBtn) backBtn.tabIndex = sub ? 0 : -1;
    }

    /**
     * Swap the visible panel. Only the content region animates.
     * @param {string} fromId
     * @param {string} toId
     * @param {'forward'|'back'} dir
     */
    function swap(fromId, toId, dir) {
        var from = panel(fromId);
        var to   = panel(toId);
        if (!to || from === to) return;

        viewport.setAttribute('data-dir', dir);

        // Clean up any half-finished transition.
        var stale = viewport.querySelectorAll('.is-leaving, .is-pre');
        for (var i = 0; i < stale.length; i++) stale[i].classList.remove('is-leaving', 'is-pre');

        if (from) {
            from.classList.remove('is-active');
            from.classList.add('is-leaving');
            from.setAttribute('aria-hidden', 'true');
        }

        // Start entering panel from its offset, then let CSS animate it in.
        to.scrollTop = 0;
        to.classList.add('is-pre');
        void to.offsetWidth; // single forced reflow per navigation
        to.classList.remove('is-pre');
        to.classList.add('is-active');
        to.removeAttribute('aria-hidden');

        if (from) {
            window.setTimeout(function () {
                from.classList.remove('is-leaving');
            }, LOCK_MS);
        }
    }

    function locked() {
        var now = Date.now();
        if (now < lockedUntil) return true;
        lockedUntil = now + LOCK_MS;
        return false;
    }

    function push(id) {
        if (!panel(id) || stack[stack.length - 1] === id || locked()) return;
        var from = stack[stack.length - 1];
        stack.push(id);
        swap(from, id, 'forward');
        setHeader();
    }

    function pop() {
        if (stack.length < 2 || locked()) return;
        var from = stack.pop();
        swap(from, stack[stack.length - 1], 'back');
        setHeader();
    }

    /** Return to the main menu instantly (no animation), used after closing. */
    function resetInstant() {
        drawer.classList.add('no-anim');
        var panels = viewport.querySelectorAll('[data-amb-panel]');
        for (var i = 0; i < panels.length; i++) {
            var p = panels[i];
            var isRoot = p.id === ROOT;
            p.classList.remove('is-leaving', 'is-pre');
            p.classList.toggle('is-active', isRoot);
            if (isRoot) p.removeAttribute('aria-hidden'); else p.setAttribute('aria-hidden', 'true');
            p.scrollTop = 0;
        }
        stack = [ROOT];
        setHeader();
        void drawer.offsetWidth;
        drawer.classList.remove('no-anim');
    }

    function openMenu() {
        if (drawer.classList.contains('active')) return;
        window.clearTimeout(resetTimer);
        lastFocus = document.activeElement;
        drawer.classList.add('active');
        drawer.setAttribute('aria-hidden', 'false');
        if (hamburger) {
            hamburger.classList.add('open');
            hamburger.setAttribute('aria-expanded', 'true');
        }
        document.documentElement.style.overflow = 'hidden';
        document.body.style.overflow = 'hidden';
    }

    function closeMenu() {
        if (!drawer.classList.contains('active')) return;
        drawer.classList.remove('active');
        drawer.setAttribute('aria-hidden', 'true');
        if (hamburger) {
            hamburger.classList.remove('open');
            hamburger.setAttribute('aria-expanded', 'false');
        }
        document.documentElement.style.overflow = '';
        document.body.style.overflow = '';
        if (document.activeElement && drawer.contains(document.activeElement)) document.activeElement.blur();
        if (lastFocus && lastFocus.focus) lastFocus.focus({ preventScroll: true });
        resetTimer = window.setTimeout(resetInstant, CLOSE_MS);
    }

    // Initial a11y state for hidden panels.
    (function initPanels() {
        var panels = viewport.querySelectorAll('[data-amb-panel]');
        for (var i = 0; i < panels.length; i++) {
            if (!panels[i].classList.contains('is-active')) panels[i].setAttribute('aria-hidden', 'true');
        }
        setHeader();
    })();

    // ---- Events (one delegated listener on the drawer) ----
    if (hamburger) hamburger.addEventListener('click', openMenu);

    drawer.addEventListener('click', function (e) {
        var t = e.target;
        if (!t || !t.closest) return;

        var navBtn = t.closest('[data-amb-target]');
        if (navBtn && drawer.contains(navBtn)) {
            e.preventDefault();
            push(navBtn.getAttribute('data-amb-target'));
            return;
        }
        if (t.closest('[data-amb-back]')) {
            e.preventDefault();
            pop();
            return;
        }
        if (t.closest('#mobileCloseBtn')) {
            e.preventDefault();
            closeMenu();
        }
    });

    document.addEventListener('keydown', function (e) {
        if (!drawer.classList.contains('active')) return;
        if (e.key === 'Escape') {
            if (stack.length > 1) pop(); else closeMenu();
        }
    });

    // Restore a clean state when the page comes back from bfcache.
    window.addEventListener('pageshow', function (e) {
        if (e.persisted) {
            if (drawer.classList.contains('active')) closeMenu();
            resetInstant();
        }
    });

    // Small public API (optional use by the theme).
    window.KodamMobileMenu = { open: openMenu, close: closeMenu, back: pop, go: push };
})();
