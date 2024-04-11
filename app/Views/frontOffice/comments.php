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
    <p class="intro">
        <?php
        $countCommments = 0;
        foreach($commentsAll as $key){
            if($key->active == 1){
                $countCommments++;
            }
        }
        ?>
        La satisfaction de nos clients est notre priorité absolue.
        Découvrez ce que nos clients disent de notre service de nettoyage de voiture : <?= $countCommments ?> avis !
    </p>
    <div class="progressBar"><hr></div>
    <div class="center">
        <?php if (!empty($commentsAll)) : ?>
            <?php foreach ($commentsAll as $key) : ?>
                <?php if ($key->active == 1) : ?>
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
                            <?= $key->text ?>
                        </p>
                        <p>Poster le : <?= date('d/m/Y', strtotime($key->_date)) ?></p>
                    </div>
                <?php endif ?>
            <?php endforeach  ?>
        <?php endif ?>
    </div>

    <p class="intro">
        Votre satisfaction est notre motivation. <a href="contact">Contactez-nous</a> dès aujourd'hui
        pour bénéficier d'un nettoyage exceptionnel et rejoignez nos clients satisfaits !
    </p>

    <?php if (isset($_SESSION['actif']) && $_SESSION['actif'] === 'yes') : ?>
        <h2 class="titleSendComment">Laissez votre <span>avis</span></h2>
        <section class="sendComment">
            <article class="addComments">
                <form action="nos-avis" method="post">
                    <select name="service">
                        <option>Sélectionnez une prestation</option>
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
                        <input type="hidden" name="note" id="note">
                    </div>
                    <textarea placeholder="Votre avis" name="text" cols="30" rows="10"></textarea>
                    <input type="submit" id="sendComment" name="addComment" value="Envoyer">
                </form>
            </article>
            <figure>
                <img src="public/img/avis.jpg" alt="Illustration d'avis">
            </figure>
        </section>
    <?php endif; ?>
</main>
<?php
require "app/Views/common/footer.php";
?>