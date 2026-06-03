// ── Theme (dark/light) ───────────────────────────────────────────
// Default = light mode (no class on html)
(function () {
    const saved = localStorage.getItem('theme');
    if (saved === 'dark') document.documentElement.classList.add('dark');
})();

function toggleTheme() {
    const isDark = document.documentElement.classList.toggle('dark');
    localStorage.setItem('theme', isDark ? 'dark' : 'light');
    updateThemeToggle();
}

function updateThemeToggle() {
    const isDark = document.documentElement.classList.contains('dark');
    document.querySelectorAll('[data-theme-icon-dark]').forEach(el => {
        el.style.display = isDark ? 'none' : 'inline';
    });
    document.querySelectorAll('[data-theme-icon-light]').forEach(el => {
        el.style.display = isDark ? 'inline' : 'none';
    });
}

document.addEventListener('DOMContentLoaded', () => {
    updateThemeToggle();
    document.querySelectorAll('[data-theme-toggle]').forEach(btn => {
        btn.addEventListener('click', toggleTheme);
    });
});

// ── Header scroll effect ─────────────────────────────────────────
const header = document.getElementById('site-header');
if (header) {
    window.addEventListener('scroll', () => {
        header.classList.toggle('scrolled', window.scrollY > 20);
    }, { passive: true });
}

// ── Mobile menu ──────────────────────────────────────────────────
const menuBtn   = document.getElementById('menu-btn');
const mobileNav = document.getElementById('mobile-nav');
if (menuBtn && mobileNav) {
    menuBtn.addEventListener('click', () => {
        const open = mobileNav.classList.toggle('hidden');
        menuBtn.setAttribute('aria-expanded', String(!open));
    });
    document.addEventListener('click', (e) => {
        if (!menuBtn.contains(e.target) && !mobileNav.contains(e.target)) {
            mobileNav.classList.add('hidden');
        }
    });
}
