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