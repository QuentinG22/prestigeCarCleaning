let rows = document.querySelectorAll('#contactTable tbody tr');
rows.forEach(function (row) {
    row.addEventListener('click', function () {
        let contactId = this.getAttribute('data-id');

        fetch('admin/tableau-de-bord/contact-' + contactId)
            .then(response => {
                if (response.status === 200) {
                    return response.json();
                } else {
                    throw new Error('Une erreur est survenue lors du chargement des détails de la demande de contact.');
                }
            })
            .then(data => {
                let detailContact = document.getElementById('detailContact');
                detailContact.innerHTML = ''; // Nettoie le contenu précédent

                let contactDetails = data; // Les détails du contact

                // Créez les éléments DOM
                let heading = document.createElement('h2');
                heading.textContent = 'Détail de la demande de contact';

                let dateParagraph = document.createElement('p');
                dateParagraph.innerHTML = '<span>Date: </span>' + contactDetails._date;

                let nameParagraph = document.createElement('p');
                nameParagraph.innerHTML = '<span>Nom: </span>' + contactDetails.name;

                let firstnameParagraph = document.createElement('p');
                firstnameParagraph.innerHTML = '<span>Prénom: </span>' + contactDetails.firstname;

                let emailParagraph = document.createElement('p');
                emailParagraph.innerHTML = '<span>Email: </span>' + contactDetails.email;

                let objectParagraph = document.createElement('p');
                objectParagraph.innerHTML = '<span>Objet: </span>' + contactDetails.object;

                let textParagraph = document.createElement('p');
                textParagraph.innerHTML = '<span>Message: </span>' + contactDetails.text;

                let deleteButton = document.createElement('button');
                deleteButton.textContent = 'Supprimer';

                // Ajoutez les éléments au détail de contact
                detailContact.appendChild(heading);
                detailContact.appendChild(dateParagraph);
                detailContact.appendChild(nameParagraph);
                detailContact.appendChild(firstnameParagraph);
                detailContact.appendChild(emailParagraph);
                detailContact.appendChild(objectParagraph);
                detailContact.appendChild(textParagraph);
                detailContact.appendChild(deleteButton);

                deleteButton.addEventListener('click', function () {
                    fetch('admin/tableau-de-bord/contact-' + contactId + '/delete', {
                        method: 'DELETE'
                    })
                        .then(response => {
                            if (response.status === 200) {
                                alert('Le contact a été supprimé avec succès.');
                                window.location.reload();
                            } else {
                                throw new Error('Une erreur est survenue lors de la suppression du contact.');
                            }
                        })
                        .catch(error => {
                            // Gérer les erreurs de la suppression du contact
                            alert(error.message);
                        });
                });
            })
            .catch(error => {
                // Gérer les erreurs de chargement des détails de la demande de contact
                alert(error.message);
            });
    });
});