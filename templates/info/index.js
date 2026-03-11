const menuToggle = document.getElementById('menuToggle');
const sideMenu = document.getElementById('sideMenu');

menuToggle.addEventListener('click', () => {
    sideMenu.classList.toggle('open');
});

document.addEventListener('DOMContentLoaded', () => {
    const menuToggle = document.getElementById('menuToggle');
    const sideMenu = document.getElementById('sideMenu');

    if (!menuToggle || !sideMenu) {
        console.error('Bouton ou menu introuvable');
        return;
    }

    menuToggle.addEventListener('click', () => {
        sideMenu.classList.toggle('open');
    });
});
