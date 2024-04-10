<?php
require "app/Views/common/head.php";
require "app/Views/common/header.php";
?>
<main class="container">
    <h1 class="title">Plateforme <span>administrateur</span></h1>
    <article class="homeAdmin">
        <div>
            <h2>Bienvenue dans votre espace administratif !</h2>
            <p>
                En tant qu'administrateur, vous pouvez consulter les demandes de contact entrantes, assurant ainsi une communication fluide avec les utilisateurs.
                De plus, vous avez le contrôle total sur la gestion des prestations, vous permettant de superviser et d'optimiser les services offerts.
                De manière tout aussi cruciale, vous avez le pouvoir de valider ou de rejeter les avis des utilisateurs, garantissant ainsi la qualité et la crédibilité des retours d'expérience.
            </p>
        </div>
        <figure>
            <img src="public/img/admin.jpg" alt="Illustration de l'accueil administrateur">
        </figure>
    </article>
</main>
<?php
require "app/Views/common/footer.php";
?>