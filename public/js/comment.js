const stars = document.querySelectorAll('#rating .star');
const note = document.querySelector('#note');

stars.forEach(star => {
    star.addEventListener('click', function () {
        const value = parseInt(this.getAttribute('data-value'));
        colorStars(stars, value);
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