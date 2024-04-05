//  Fonction pour remplir les détails de la prestation et les produits associés
function fillServiceDetails(data) {
    // Mettre à jour les champs avec les détails de la prestation
    document.getElementById('selectServiceName').value = data.name;
    document.getElementById('selectServiceDescription').value = data.description;
    document.getElementById('selectServicePrice').value = data.price;

    // Cocher les cases des produits associés
    data.products.forEach(product => {
        let productId = product.idProduct;
        let productName = product.nameProduct;

        let checkbox = document.querySelector('input[type="checkbox"][data-product-id="' + productId + '"]');
        if (checkbox) {
            checkbox.checked = true;
        }
    });
}
// Fonction pour récupérer les détails de la prestation et les produits associés
function fetchServiceDetails() {
    // Récupérer l'ID de la prestation sélectionnée
    let selectedServiceId = document.getElementById('service').value;

    // Vérifier si une prestation est sélectionnée
    if (selectedServiceId !== '') {
        // URL du script serveur pour récupérer les détails de la prestation
        let url = 'admin/service/' + selectedServiceId;

        // Effectuer une requête fetch
        fetch(url)
            .then(response => {
                if (response.status === 200) {
                    return response.json();
                } else {
                    throw new Error('Une erreur est survenue lors du chargement des détails de la prestation.');
                }
            })
            .then(data => {
                fillServiceDetails(data);
            })
            .catch(error => {
                console.error('Erreur lors de la récupération des détails de la prestation :', error);
            });
    }
}

// Ajouter un écouteur d'événement au changement de sélection de la prestation
document.getElementById('service').addEventListener('change', fetchServiceDetails);