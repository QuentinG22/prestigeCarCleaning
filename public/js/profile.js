import { validateEmail, validatePhoneNumber, toggleInput, displayError } from './tools.js';
document.querySelector('form').addEventListener('submit', function (event) {

    // Réinitialisation des messages d'erreur
    let error = document.querySelectorAll('.errorForm');
    error.forEach(function (paragraph) {
        paragraph.textContent = '';
    });

    // Récupération des valeurs des champs
    let email = document.querySelector('#email').value;
    let phone = document.querySelector('#phone').value;
    let password = document.querySelector('#password').value;
    let newPassword = document.querySelector('#newPassword').value;
    let confirmNewPassword = document.querySelector('#confirmNewPassword').value;


    // Validation des champs
    let errors = {};

    if (email !== '' && !validateEmail(email)) {
        displayError('email', 'Veuillez saisir une adresse email valide.');
        errors['email'] = true;
    }

    if (phone !== '' && !validatePhoneNumber(phone)) {
        displayError('phone', 'Veuillez saisir un numéro de téléphone valide.');
        errors['phone'] = true;
    }

    if (newPassword !== '') {
        if (password === '') {
            displayError('password', 'Veuillez rentrer votre mot de passe actuel.');
            errors['password'] = true;
        } else if (newPassword.length < 8 || newPassword.length > 32) {
            displayError('newPassword', 'Votre nouveau mot de passe doit être compris entre 8 et 32 caractères.');
            errors['newPassword'] = true;
        } else if (newPassword !== confirmNewPassword) {
            displayError('confirmPassword', 'La confirmation du nouveau mot de passe a échoué !');
            errors['confirmPassword'] = true;
        }
    }

    // Si des erreurs sont présentes, arrête la soumission du formulaire
    if (Object.keys(errors).length > 0) {
        event.preventDefault();
    }
});

document.querySelector("#updateUser").addEventListener("change", function () {
    let checkbox = document.querySelector("#updateUser");
    let inputValid = document.querySelector("#inputUpdate");
    toggleInput(checkbox, inputValid);
});

document.querySelector("#deleteUser").addEventListener("change", function () {
    let checkbox = document.querySelector("#deleteUser");
    let inputValid = document.querySelector("#inputDelete");
    toggleInput(checkbox, inputValid);
});