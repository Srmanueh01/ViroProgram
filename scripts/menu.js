function toggleMenu() {
    var menuContainer = document.getElementById('menu-container');
    var mainContent = document.getElementById('main-content');

    menuContainer.classList.toggle('menu-open');
    mainContent.classList.toggle('content-shifted');
}
