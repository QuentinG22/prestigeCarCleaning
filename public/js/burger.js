let burger = document.querySelector('#burger i');
let nav = document.querySelector('.mainMenu ul');

burger.addEventListener('click', function(){
    if (nav.classList.contains('on')) {
        nav.classList.remove('on');
    } else {
        nav.classList.add('on');
    }
})
