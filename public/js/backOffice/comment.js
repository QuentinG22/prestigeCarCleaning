// Sélectionner l'élément avec la classe "center"
const centerElement = document.querySelector('.center');

// Fonction pour déplacer les éléments du carrousel
function moveCarousel() {
    const firstItem = centerElement.querySelector('.item');
    // Déplacer le premier élément à la fin
    centerElement.appendChild(firstItem);
}

// Déplacer le carrousel toutes les 3 secondes
setInterval(moveCarousel, 3000);