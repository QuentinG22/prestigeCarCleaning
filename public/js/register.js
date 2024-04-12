import { validateEmail, validatePhoneNumber, toggleInput, displayError } from './tools.js';
document.addEventListener('DOMContentLoaded', function () {
    document.querySelector('#register form').addEventListener('submit', function (event) {

        // Réinitialisation des messages d'erreur
        let error = document.querySelectorAll('.errorForm');
        error.forEach(function (paragraph) {
            paragraph.textContent = '';
        });

        // Récupération des valeurs des champs
        let name = document.querySelector('#name').value;
        let firstname = document.querySelector('#firstname').value;
        let email = document.querySelector('#email').value;
        let phone = document.querySelector('#phone').value;
        let password = document.querySelector('#password').value;
        let confirmPassword = document.querySelector('#confirmPassword').value;


        // Validation des champs
        let errors = {};
        let nameRegex = /^[a-zA-Z]+$/;

        if (name === '') {
            displayError('name', 'Veuillez renseigner votre nom.');
            errors['name'] = true;
        } else if (!nameRegex.test(name)) {
            displayError('name', 'Le nom ne doit pas contenir de caractères spéciaux.');
            errors['name'] = true;
        }

        if (firstname === '') {
            displayError('firstname', 'Veuillez renseigner votre prénom.');
            errors['firstname'] = true;
        } else if (!nameRegex.test(firstname)) {
            displayError('firstname', 'Le prénom ne doit pas contenir de caractères spéciaux.');
            errors['firstname'] = true;
        }

        if (!validateEmail(email)) {
            displayError('email', 'Veuillez saisir une adresse email valide.');
            errors['email'] = true;
        }

        if (!validatePhoneNumber(phone)) {
            displayError('phone', 'Veuillez saisir un numéro de téléphone valide.');
            errors['phone'] = true;
        }

        if (password === '') {
            displayError('password', 'Veuillez rentrer un mot de passe.');
            errors['password'] = true;
        } else if (password.length < 8 || password.length > 32) {
            displayError('password', 'Votre mot de passe doit être compris entre 8 et 32 caractères.');
            errors['password'] = true;
        } else if (password !== confirmPassword) {
            displayError('confirmPassword', 'La confirmation du mot de passe a échoué !');
            errors['confirmPassword'] = true;
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
});