<?php
require "app/Views/common/head.php";
require "app/Views/common/header.php";
?>
<main class="container">
    <h1 class="title">Modération des <span>avis</span></h1>
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
    <article>
        <div class="center">
            <?php if (!empty($commentsAll)) : ?>
                <?php $countNotActif = 0; ?>
                <?php foreach ($commentsAll as $key) : ?>
                    <?php if ($key->active == 0) : ?>
                        <?php $countNotActif++; ?>
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
                            <form action="admin/modération-avis" method="post">
                                <input type="hidden" name="idComment" value="<?= $key->idComment ?>">
                                <input type="submit" name="actifComment" value="Activer">
                                <input type="submit" name="deleteComment" value="Supprimer">
                            </form>
                        </div>
                    <?php endif ?>
                <?php endforeach  ?>
                <?php if ($countNotActif == 0) : ?>
                    <p>Aucun commentaire en attente de validation !</p>
                <?php endif ?>
            <?php else : ?>
            <p>Aucun commentaire en attente de validation !</p>
            <?php endif ?>
    </article>
    <script>
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