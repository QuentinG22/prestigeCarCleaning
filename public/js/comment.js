const stars2 = document.querySelectorAll('#rating2 .star');
const note = document.querySelector('#note');

stars2.forEach(star => {
    star.addEventListener('click', function () {
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