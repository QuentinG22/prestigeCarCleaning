const stars2 = document.querySelectorAll('#rating2 .star');
const note = document.querySelector('#note');

stars2.forEach(star => {
    star.addEventListener('click', function() {
        const value = parseInt(this.getAttribute('data-value'));
        colorStars(stars2, value);
        note.value = value;
    });
});

function colorStars(stars, value) {
    stars.forEach((star, index) => {
        if (index < value) {
            star.style.color = 'gold';
        } else {
            star.style.color = '#ccc';
        }
    });
}

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