const centerElement = document.querySelector('.center');
const items = Array.from(document.querySelectorAll('.item'));
// Largeur d'un élément item
const itemWidth = items[0].offsetWidth;
// Largeur du conteneur visible
const containerWidth = centerElement.offsetWidth;
// Calculer le nombre d'éléments visibles dans le conteneur
const itemsVisible = Math.floor(containerWidth / itemWidth);
const progressBar = document.querySelector('.progressBar hr');

let isDragging = false;
let startPositionX = 0;
let currentPosition = 0;

function moveCarousel(distance) {
    currentPosition += distance;

    // Calculer la largeur totale des éléments du carrousel, y compris les marges
    const totalItemsWidth = items.reduce((total, item) => {
        const itemWidth = item.offsetWidth;
        const itemMarginLeft = parseFloat(getComputedStyle(item).marginLeft);
        const itemMarginRight = parseFloat(getComputedStyle(item).marginRight);
        return total + itemWidth + itemMarginLeft + itemMarginRight;
    }, 0);

    // Calculer la position maximale pour que le dernier élément soit entièrement visible
    const maxVisiblePosition = containerWidth - totalItemsWidth;
    currentPosition = Math.min(0, Math.max(maxVisiblePosition, currentPosition));

    // Mettre à jour la transformation (translation) pour chaque élément du carrousel
    items.forEach(item => {
        item.style.transform = `translateX(${currentPosition}px)`;
    });

    // Calculer la position de la barre de progression en fonction de la position actuelle
    const progress = (-currentPosition / maxVisiblePosition) * 100;

    // Appliquer la largeur de la barre de progression en pourcentage
    progressBar.style.width = `${Math.abs(progress)}%`;
}

function startDrag(startX) {
    isDragging = true;
    startPositionX = startX;
}

function dragMove(currentX) {
    if (isDragging) {
        const distance = currentX - startPositionX;
        moveCarousel(distance);
        startPositionX = currentX;
    }
}

function endDrag() {
    isDragging = false;
}

// Gestion des événements tactiles
centerElement.addEventListener('touchstart', (e) => {
    const touch = e.touches[0];
    startDrag(touch.clientX);
});

centerElement.addEventListener('touchmove', (e) => {
    const touch = e.touches[0];
    dragMove(touch.clientX);
});

centerElement.addEventListener('touchend', () => {
    endDrag();
});

// Gestion des événements de la souris
centerElement.addEventListener('mousedown', (e) => {
    startDrag(e.clientX);
    e.preventDefault();
});

centerElement.addEventListener('mousemove', (e) => {
    dragMove(e.clientX);
});

centerElement.addEventListener('mouseup', () => {
    endDrag();
});

centerElement.addEventListener('mouseleave', () => {
    if (isDragging) {
        endDrag();
    }
});