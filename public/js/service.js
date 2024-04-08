const slider = document.querySelector('.sliderService');
const slides = document.querySelectorAll('.sliderService article');
const prevButton = document.querySelector('.prev');
const nextButton = document.querySelector('.next');

let slideIndex = 0;
const totalSlides = slides.length;
// Nombre maximum d'articles par slide sur grand écran
const maxSlidesDesktop = 3;

// Fonction pour afficher les slides
function showSlides() {
    const screenWidth = window.innerWidth;
    // Afficher 3 articles sur grand écran, 1 article sur petit écran
    const numSlidesToShow = (screenWidth >= 768) ? maxSlidesDesktop : 1;

    slides.forEach((slide, index) => {
        if (index >= slideIndex && index < slideIndex + numSlidesToShow) {
            slide.style.display = 'block';
        } else {
            slide.style.display = 'none';
        }
    });

    // Désactiver le bouton "suivant" s'il n'y a pas de série complète de diapositives suivantes
    if (screenWidth >= 768) {
        if (slideIndex >= totalSlides - numSlidesToShow) {
            nextButton.disabled = true;
        } else {
            nextButton.disabled = false;
        }
    }
}

// Afficher les slides au chargement de la page
showSlides();

// Gestion du clic sur le bouton précédent
prevButton.addEventListener('click', function () {

    if (slideIndex > 0) {
        slideIndex--;
    }
    showSlides();
});

// Gestion du clic sur le bouton suivant
nextButton.addEventListener('click', function () {

    if (slideIndex < totalSlides - 1) {
        slideIndex++;
    }
    showSlides();
});

// Redimensionnement de la fenêtre
window.addEventListener('resize', function () {
    showSlides(); // Mettre à jour l'affichage lors du redimensionnement de la fenêtre
});

// Fonction pour afficher ou masquer les détails de la prestation
function toggleServiceDetails(event) {
    const article = event.currentTarget;
    const detailService = article.querySelector('.detailsService');

    // Vérifier si les détails sont déjà affichés
    if (detailService.innerHTML.trim() !== '') {
        // Les détails sont déjà affichés, donc les supprimer (masquer)
        detailService.innerHTML = '';
        showNavigationAndSlides();
    } else {
        // Les détails ne sont pas déjà affichés, donc les récupérer et afficher
        const serviceId = article.id;
        const url = 'nos-prestations/service/' + serviceId;

        fetch(url)
            .then(response => {
                if (response.status === 200) {
                    return response.json();
                } else {
                    throw new Error('Une erreur est survenue lors du chargement des détails de la prestation.');
                }
            })
            .then(data => {
                console.log(data);

                let descriptionParagraph = document.createElement('p');
                descriptionParagraph.innerHTML = data.description.replace(/\r\n/g, '<br>');

                let productParagraph = document.createElement('p');
                productParagraph.innerHTML = '<br><span>Les produits utilisés: </span>';

                let productList = document.createElement('ul');

                data.products.forEach(product => {
                    // Création de l'élément de liste (<li>) pour chaque produit
                    let listItem = document.createElement('li');
                    listItem.textContent = product.nameProduct;

                    productList.appendChild(listItem);
                });

                let priceParagraph = document.createElement('p');
                priceParagraph.innerHTML = '<br><span>Prix: </span>' + data.price;

                detailService.appendChild(descriptionParagraph);
                detailService.appendChild(productParagraph);
                productParagraph.appendChild(productList);
                detailService.appendChild(priceParagraph);

                hideNavigationAndOtherSlides(article);
            })
            .catch(error => {
                console.error('Erreur lors de la récupération des détails de la prestation :', error);
            });
    }
}

// Fonction pour masquer les flèches de navigation et les autres slides
function hideNavigationAndOtherSlides(clickedArticle) {
    slides.forEach(slide => {
        if (slide !== clickedArticle) {
            slide.style.display = 'none';
        }
    });
    prevButton.style.display = 'none';
    nextButton.style.display = 'none';
    slider.style.width = '100%';
}

// Fonction pour réafficher les flèches de navigation et les autres slides
function showNavigationAndSlides() {
    showSlides();
    prevButton.style.display = 'block';
    nextButton.style.display = 'block';
    slider.style.width = 'auto';
}

// Ajouter un écouteur d'événement à chaque article de prestation
slides.forEach(article => {
    article.addEventListener('click', toggleServiceDetails);
});