const centerElement = document.querySelector('.center');
const items = Array.from(document.querySelectorAll('.item'));
// Largeur d'un élément item
const itemWidth = items[0].offsetWidth;
// Largeur du conteneur visible
const containerWidth = centerElement.offsetWidth;
// Calculer le nombre d'éléments visibles dans le conteneur
const itemsVisible = Math.floor(containerWidth / itemWidth);

let isDragging = false;
let startPositionX = 0;
let currentPosition = 0;

// Fonction pour déplacer les éléments du carrousel
function moveCarousel(distance) {

    currentPosition += distance;

    // Calculer la largeur totale des éléments du carrousel, y compris les marges
    const totalItemsWidth = items.reduce((total, item) => {
        // Largeur de l'élément
        const itemWidth = item.offsetWidth;
        // Marge gauche de l'élément
        const itemMarginLeft = parseFloat(getComputedStyle(item).marginLeft);
        // Marge droite de l'élément
        const itemMarginRight = parseFloat(getComputedStyle(item).marginRight);
        
        return total + itemWidth + itemMarginLeft + itemMarginRight;
    }, 0);

    // Calculer la position maximale pour que le dernier élément soit entièrement visible
    const maxVisiblePosition = containerWidth - totalItemsWidth;
    currentPosition = Math.min(0, Math.max(maxVisiblePosition, currentPosition));

    items.forEach(item => {
        item.style.transform = `translateX(${currentPosition}px)`;
    });
}

// Gestion du début du glissement (ou de la souris)
function startDrag(startX) {
    isDragging = true;
    startPositionX = startX;
}

// Gestion du mouvement pendant le glissement (ou déplacement de la souris)
function dragMove(currentX) {
    if (isDragging) {
        const distance = currentX - startPositionX;
        moveCarousel(distance);
        // Mettre à jour la position de départ
        startPositionX = currentX; 
    }
}

// Gestion de la fin du glissement (ou relâchement de la souris)
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
    // Empêcher la sélection de texte pendant le glissement
    e.preventDefault();
});

centerElement.addEventListener('mousemove', (e) => {
    dragMove(e.clientX);
});

centerElement.addEventListener('mouseup', () => {
    endDrag();
});

// Écouter également l'événement de sortie du conteneur pour gérer la fin du glissement
centerElement.addEventListener('mouseleave', () => {
    if (isDragging) {
        endDrag();
    }
});