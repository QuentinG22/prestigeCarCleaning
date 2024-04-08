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
    <section class="sliderService">
        <button class="prev">❮</button>
        <?php foreach ($servicesAll as $key) : ?>
            <article class="service" id="<?= $key->idService ?>">
                <h2><?= $key->nameService ?></h2>
                <div class="detailsService"></div>
            </article>
        <?php endforeach; ?>
        <button class="next">❯</button>
    </section>
</main>

<?php
require "app/Views/common/footer.php";
?>