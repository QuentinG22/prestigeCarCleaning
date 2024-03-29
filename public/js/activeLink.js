// let baseUrl = '/stagiaires-kercode/quentin-guillemin/prestigeCarCleaning/';
let baseUrl = '/prestigeCarCleaning/';
let url = window.location.pathname;
let links = document.querySelectorAll('.mainMenu ul li a');

if (url === baseUrl) {
    let home = links[0];
    home.classList.add('active');
 } else {
    links.forEach(link => {
        let linkUrl = link.href;
        if (url === linkUrl) {
            link.classList.add('active');
        }
    })
}