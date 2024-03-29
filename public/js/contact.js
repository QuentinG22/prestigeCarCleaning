import { validateEmail, toggleInput, displayError } from './tools.js';
document.querySelector('#contact form').addEventListener('submit', function (event) {

    // Réinitialisation des messages d'erreur
    let error = document.querySelectorAll('.errorForm');
    error.forEach(function (paragraph) {
        paragraph.textContent = '';
    });

    // Récupération des valeurs des champs
    let name = document.querySelector('#name').value;
    let firstname = document.querySelector('#firstname').value;
    let email = document.querySelector('#email').value;
    let object = document.querySelector('#object').value;
    let message = document.querySelector('#text').value;

    // Validation des champs
    let errors = {};

    if (name === '') {
        displayError('name', 'Veuillez renseigner votre nom.');
        errors['name'] = true;
    }

    if (firstname === '') {
        displayError('firstname', 'Veuillez renseigner votre prénom.');
        errors['firstname'] = true;
    }

    if (!validateEmail(email)) {
        displayError('email', 'Veuillez saisir une adresse email valide.');
        errors['email'] = true;
    }

    if (object === '') {
        displayError('object', 'Veuillez renseigner l\'objet de votre message.');
        errors['object'] = true;
    }

    if (message === '') {
        displayError('text', 'Veuillez saisir votre message.');
        errors['message'] = true;
    }

    // Si des erreurs sont présentes, arrête la soumission du formulaire
    if (Object.keys(errors).length > 0) {
        event.preventDefault();
    }
});

document.querySelector("#rgpd").addEventListener("change", function () {
    let checkbox = document.querySelector("#rgpd");
    let inputValid = document.querySelector("#inputValid");
    toggleInput(checkbox, inputValid);
});