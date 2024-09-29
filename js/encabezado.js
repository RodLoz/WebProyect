const toggleMenuElement = document.getElementById('menu-barra');
const mainMenuElement = document.getElementById('lista-desplegable');

toggleMenuElement.addEventListener('click', () => {
    mainMenuElement.classList.toggle('lista-desplegable--show');
});