let burger = document.querySelector('#burger i');
let nav = document.querySelector('.mainMenu ul');

burger.addEventListener('click', function(){
    if (nav.classList.contains('on')) {
        nav.classList.remove('on');
    } else {
        nav.classList.add('on');
    }
})

// Gestion du boutton pour les message d'alerte
document.querySelectorAll(".alert button").forEach(button => {
    button.addEventListener("click", function () {
        document.querySelectorAll(".alert").forEach(alert => {
            alert.classList.add("disabled");
        });
    });
});
