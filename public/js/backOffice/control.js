document.querySelector('form').addEventListener('submit', function (event) {

    // Réinitialisation des messages d'erreur
    let error = document.querySelectorAll('.errorForm');
    error.forEach(function (paragraph) {
        paragraph.textContent = '';
    });

    // Validation des champs
    let errors = {};
    let nameRegex = /^[a-zA-Z]+$/;

    if (name === '') {
        displayError('name', 'Veuillez renseigner le champs de saisis');
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