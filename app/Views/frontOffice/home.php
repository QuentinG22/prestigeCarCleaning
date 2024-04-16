<?php
require "app/Views/common/head.php";
require "app/Views/common/header.php";
?>
<main class="container">
    <!-- Slider -->
    <article id="sliderContainer">
        <div id="slider">
            <div class="slide"><img src="public/img/slide1.webp" alt="Image représentant un lavage de voiture"></div>
            <div class="slide disabled"><img src="public/img/slide2.webp" alt="Image de lavage automobile"></div>
            <div class="slide disabled"><img src="public/img/slide3.webp" alt="Image de lavage automobile"></div>
            <div class="slide disabled"><img src="public/img/slide4.webp" alt="Illustration de service de lavage de voiture"></div>
        </div>
    </article>
    <article class="about">
        <div>
            <h1 class="exclude">Prestige Car <span>Cleaning</span></h1>
            <p>
                Notre société a vu le jour avec une vision bien précise :
                offrir à nos clients une expérience de lavage automobile incomparable.
                Fondée par une équipe de passionnés,
                notre entreprise s'est rapidement imposée comme une référence dans le domaine.
                Forts de notre engagement envers la qualité et le service client,
                nous avons bâti notre réputation sur des valeurs telles que le professionnalisme,
                l'attention du détail et le respect de chaque véhicule que nous traitons.
            </p><br>
            <p>
                L'idée de créer une entreprise de lavage automobile exclusivement manuelle est née de notre
                désir de proposer un service haut de gamme, respectueux de la carrosserie
                et offrant des résultats impeccables. Nous croyons fermement que chaque voiture mérite
                un traitement personnalisé, adapté à ses besoins spécifiques, et c'est pourquoi nous mettons
                un point d'honneur à effectuer tous nos lavages à la main.
            </p><br>
            <p>
                Grâce à notre expertise et à notre dévouement, nous avons su nous positionner comme le choix 
                privilégié des amateurs de véhicules sportifs. Notre équipe spécialisée est formée pour 
                prendre en charge les modèles les plus prestigieux avec le plus grand soin.
            </p>
        </div>
        <figure>
            <img src="public/img/apropos.jpg" alt="Illustration de l'environnement de travail">
        </figure>
    </article>
</main>
<?php
require "app/Views/common/footer.php";
?>