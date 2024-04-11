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
    <h1 class="title">Nos <span>prestations</span></h1>
    <p class="intro">
        Découvrez notre service de nettoyage de voiture professionnel, conçu pour raviver et 
        protéger l'éclat de votre véhicule. Nous proposons des prestations complètes, allant du 
        lavage extérieur minutieux au nettoyage en profondeur de l'intérieur. Notre équipe expérimentée 
        utilise des techniques et des produits de qualité supérieure pour éliminer la saleté, les taches et 
        les odeurs indésirables, laissant votre voiture comme neuve à chaque visite. Faites confiance à nos 
        spécialistes du nettoyage automobile pour redonner à votre véhicule son allure et sa propreté d'origine.
    </p>
    <section class="sliderService">
        <button class="prev">❮</button>
        <?php foreach ($servicesAll as $key) : ?>
            <article class="service">
                <h2 id="<?= $key->idService ?>"><?= $key->nameService ?></h2>
                <div class="detailsService"></div>
                <button id="<?= $key->idService ?>" class="closeButton disabled">×</button>
            </article>
        <?php endforeach; ?>
        <button class="next">❯</button>
    </section>
</main>

<?php
require "app/Views/common/footer.php";
?>