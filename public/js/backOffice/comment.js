const centerElement = document.querySelector('.center');
// Variable pour stocker l'identifiant de l'intervalle
let intervalId; 

// Fonction pour déplacer les éléments du carrousel
function moveCarousel() {
    const firstItem = centerElement.querySelector('.item');
    // Déplacer le premier élément à la fin
    centerElement.appendChild(firstItem);
}

// Démarrer le défilement automatique du carrousel
function startCarousel() {
    intervalId = setInterval(moveCarousel, 3000);
}

// Arrêter le défilement automatique du carrousel
function stopCarousel() {
    clearInterval(intervalId);
}

// Détecter le survol d'un élément du carrousel
centerElement.addEventListener('mouseenter', () => {
    stopCarousel(); // Arrêter le défilement automatique
});

// Détecter lorsque le curseur quitte un élément du carrousel
centerElement.addEventListener('mouseleave', () => {
    startCarousel(); // Redémarrer le défilement automatique
});

// Démarrer le défilement automatique au chargement de la page
startCarousel();