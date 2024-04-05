// Récupérer l'URL complète
let fullUrl = window.location.href;

// Sélectionner tous les liens dans le menu
let links = document.querySelectorAll('.mainMenu ul li a');

// Parcourir tous les liens
let matchFound = false;
links.forEach(link => {
    let linkUrl = link.href;

    // Comparer l'URL actuelle avec l'URL du lien
    if (fullUrl === linkUrl) {
        // Ajouter la classe active si les URL correspondent
        link.classList.add('active');
        matchFound = true;
    } else {
        // Retirer la classe active si les URL ne correspondent pas
        link.classList.remove('active');
    }
});

// Si aucun lien ne correspond à l'URL actuelle, activer le lien "Accueil"
if (!matchFound) {
    links[0].classList.add('active');
}