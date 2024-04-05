<?php
require "app/Views/common/head.php";
require "app/Views/common/header.php";
if (isset($_SESSION['actif']) && $_SESSION['actif'] === 'yes') {
    $userName = $_SESSION['userName'];
    $userFirstname = $_SESSION['userFirstname'];
    $userEmail = $_SESSION['userEmail'];
}
?>
<main class="container">
    <h1 class="title">Nos <span>avis</span></h1>
    <?php if (isset($error) && $error !== '') : ?>
        <div class="alert error">
            <?= $error ?>
        </div>
    <?php endif; ?>
    <?php if (isset($success) && $success !== '') : ?>
        <div class="alert success">
            <?= $success ?>
        </div>
    <?php endif; ?>

    <div class="center">
        <div class="item">
            <p>
                Dupond Pierre
            </p>
            <p class="serviceComments">
                Prestation xxxxx
            </p>
            <div class="rating" id="rating1">
                <span class="star" data-value="1">&#9733;</span>
                <span class="star" data-value="2">&#9733;</span>
                <span class="star" data-value="3">&#9733;</span>
                <span class="star" data-value="4">&#9733;</span>
                <span class="star" data-value="5">&#9733;</span>
            </div>
            <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Recusandae, molestias.
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Recusandae, molestias.
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Recusandae, molestias.
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Recusandae, molestias.
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Recusandae, molestias.
            </p>
        </div>
        <div class="item">Avis 2</div>
        <div class="item">Avis 3</div>
        <div class="item">Avis 4</div>
        <div class="item">Avis 5</div>
        <div class="item">Avis 6</div>
        <!-- Ajoutez plus d'avis au besoin -->
    </div>

    <?php if (isset($_SESSION['actif']) && $_SESSION['actif'] === 'yes') : ?>
        <article class="addComments">
            <h2>Laissez votre <span>avis</span></h2>
            <form action="" method="post">
                <input type="text" id="name" name="name" value="<?= $_SESSION['userName'] ?>">
                <input type="text" id="firstname" name="name" value="<?= $_SESSION['userFirstname'] ?>">
                <select name="service">
                    <?php foreach ($servicesAll as $service) : ?>
                        <option value="<?= $service->idService; ?>"><?= $service->nameService; ?></option>
                    <?php endforeach; ?>
                </select>
                <div class="rating" id="rating2">
                    <span class="star" data-value="1">&#9733;</span>
                    <span class="star" data-value="2">&#9733;</span>
                    <span class="star" data-value="3">&#9733;</span>
                    <span class="star" data-value="4">&#9733;</span>
                    <span class="star" data-value="5">&#9733;</span>
                </div>
                <textarea name="text" id="" cols="30" rows="10"></textarea>
                <input type="submit" id="inputValid" name="avis" value="Envoyer">
            </form>
        </article>
    <?php endif; ?>

    <script>
        const stars1 = document.querySelectorAll('#rating1 .star');
        const stars2 = document.querySelectorAll('#rating2 .star');

        stars2.forEach(star => {
            star.addEventListener('click', function() {
                const value = parseInt(this.getAttribute('data-value'));
                colorStars(stars2, value);
                // Envoyer la valeur à votre script PHP pour traitement
            });
        });

        function colorStars(stars, value) {
            stars.forEach((star, index) => {
                if (index < value) {
                    star.style.color = 'gold';
                } else {
                    star.style.color = '#ccc';
                }
            });
        }

        // Exemple : Vous pouvez appeler cette fonction avec la valeur reçue de votre base de données
        const ratingValue = 3; // Exemple de valeur reçue de la base de données
        colorStars(stars1, ratingValue);

        // Sélectionner l'élément avec la classe "center"
        const centerElement = document.querySelector('.center');

        // Fonction pour déplacer les éléments du carrousel
        function moveCarousel() {
            const firstItem = centerElement.querySelector('.item');
            // Déplacer le premier élément à la fin
            centerElement.appendChild(firstItem);
        }

        // Déplacer le carrousel toutes les 3 secondes
        setInterval(moveCarousel, 3000);
    </script>
</main>
<?php
require "app/Views/common/footer.php";
?>