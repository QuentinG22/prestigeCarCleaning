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
        <?php if (!empty($commentsAll)) : ?>
            <?php foreach ($commentsAll as $key) : ?>
                <?php if ($key->active === 1) : ?>
                    <div class="item">
                        <p>
                            <?= $key->name . ' ' . $key->firstname ?>
                        </p>
                        <p class="serviceComments">
                            <?= $key->nameService ?>
                        </p>
                        <div class="rating" id="rating1">
                            <?php
                            $note = $key->note; // Récupère la note du commentaire
                            // Parcours chaque étoile et vérifie si elle doit être coloriée en fonction de la note
                            for ($i = 1; $i <= 5; $i++) {
                                if ($i <= $note) {
                                    echo '<span class="star filled" data-value="' . $i . '">&#9733;</span>';
                                } else {
                                    echo '<span class="star" data-value="' . $i . '">&#9733;</span>';
                                }
                            }
                            ?>
                        </div>
                        <p>
                            <?= $key->text ?>
                        </p>
                    </div>
                <?php endif ?>
            <?php endforeach  ?>
        <?php endif ?>
    </div>

    <?php if (isset($_SESSION['actif']) && $_SESSION['actif'] === 'yes') : ?>
        <article class="addComments">
            <h2>Laissez votre <span>avis</span></h2>
            <form action="" method="post">
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
                    <input type="hidden" name="note" id="note" value="1">
                </div>
                <textarea name="text" id="" cols="30" rows="10"></textarea>
                <input type="submit" id="inputValid" name="addComment" value="Envoyer">
            </form>
        </article>
    <?php endif; ?>

    <script>
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