// Fungsi untuk menerapkan tema
function applyTheme(theme) {
    var htmlElement = document.documentElement;
    var themeIcon = document.getElementById('theme-icon');

    if (theme === 'dark') {
        htmlElement.setAttribute('data-bs-theme', 'dark');
        themeIcon.classList.remove('fa-sun');
        themeIcon.classList.add('fa-moon');
        document.body.classList.remove('light-theme');
        document.body.classList.add('dark-theme');
    } else {
        htmlElement.setAttribute('data-bs-theme', 'light');
        themeIcon.classList.remove('fa-moon');
        themeIcon.classList.add('fa-sun');
        document.body.classList.remove('dark-theme');
        document.body.classList.add('light-theme');
    }
}

// Memuat tema dari localStorage saat halaman dimuat
document.addEventListener('DOMContentLoaded', function () {
    var savedTheme = localStorage.getItem('theme') || 'light';
    applyTheme(savedTheme);
});

// Menambahkan event listener ke tombol untuk mengubah tema
document.getElementById('theme-toggle').addEventListener('click', function () {
    var currentTheme = document.documentElement.getAttribute('data-bs-theme');
    var newTheme = currentTheme === 'light' ? 'dark' : 'light';
    applyTheme(newTheme);
    localStorage.setItem('theme', newTheme);
});