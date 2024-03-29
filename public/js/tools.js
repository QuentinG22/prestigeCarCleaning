export function validateEmail(email) {
    let regex = /\b[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,}\b/i;
    return regex.test(email);
}

export function validatePhoneNumber(phoneNumber) {
    // Expression régulière pour vérifier le format du numéro de téléphone français
    let regex = /^(?:(?:\+|00)33|0)\s*[1-9](?:[\s.-]*\d{2}){4}$/;
    return regex.test(phoneNumber);
}

// Fonction pour activer ou désactiver le champ de saisie en fonction de l'état de la case à cocher
export function toggleInput(checkbox, inputValid) {
    if (checkbox.checked) {
        inputValid.disabled = false;
    } else {
        inputValid.disabled = true;
    }
}

export function displayError(fieldName, errorMessage) {
    let errorElement = document.querySelector(`p.errorForm[data-error-for="${fieldName}"]`);
    if (errorElement) {
        errorElement.textContent = errorMessage;
    }
}