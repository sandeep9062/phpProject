document.addEventListener('DOMContentLoaded', () => {
    const themeSelect = document.getElementById('theme-select');
    const themeLink = document.getElementById('theme-style');

    themeSelect.addEventListener('change', (event) => {
        const newTheme = event.target.value;
        themeLink.setAttribute('href', newTheme);
    });
});
