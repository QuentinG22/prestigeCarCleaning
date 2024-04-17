<?php
require "app/Views/common/head.php";
require "app/Views/common/header.php";
?>
<main class="container">
    <h1 class="title">Modération des <span>avis</span></h1>
    <?php if (isset($error) && $error !== '') : ?>
        <div class="alert error">
            <?= $error ?>
            <button>×</button>
        </div>
    <?php endif; ?>
    <?php if (isset($success) && $success !== '') : ?>
        <div class="alert success">
            <?= $success ?>
            <button>×</button>
        </div>
    <?php endif; ?>
    <article>
        <div class="progressBar">
            <hr>
        </div>
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
                            <p class="textComment">
                                <?= nl2br($key->text) ?>
                            </p>
                            <p>Poster le : <?= date('d/m/Y', strtotime($key->_date)) ?></p>
                            <form class="adminComment" action="admin/modération-avis" method="post">
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
</main>
<?php
require "app/Views/common/footer.php";
?>