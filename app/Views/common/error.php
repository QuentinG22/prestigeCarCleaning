<?php
require "app/Views/common/head.php";
require "app/Views/common/header.php";
?>
<main class="container">
    <h1 class="title">Oups ! Cette page a pris une route <span>imprévue</span></h1>
    <article class="error404">
        <div>
            <p>
                Nous sommes désolés, mais il semble que la page que vous recherchez soit aussi propre
                qu'une voiture fraîchement lavée : introuvable ! Ne vous inquiétez pas,
                nous avons encore beaucoup à vous offrir.
            </p>
            <h3>Que pouvez-vous faire maintenant ?</h3>
            <ul>
                <li>
                    Retournez à notre <a href="accueil">page d'accueil</a>.
                </li>
                <li>
                    Explorez nos <a href="nos-prestations">prestations de lavage</a> pour trouver celui qui convient le mieux à votre véhicule.
                </li>
                <li>
                    Si vous avez des questions ou besoin d'assistance, notre équipe est là pour vous aider. <a href="contact">Contactez-nous</a> dès maintenant.
                </li>
            </ul>
            <p>
                Nous vous remercions de votre intérêt pour nos services de lavage de voitures et nous nous excusons pour ce petit détour imprévu.
                Nous travaillons toujours pour vous offrir la meilleure expérience possible.
            </p>
        </div>
        <figure><img src="public/img/404.png" alt="Image erreur 404"></figure>
    </article>
</main>
<?php
require "app/Views/common/footer.php";
?>