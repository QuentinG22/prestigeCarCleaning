<?php
require "app/Views/common/head.php";
require "app/Views/common/header.php";
?>
<main class="container">
    <h1 class="title">Oups ! erreur <span>technique</span></h1>
    <article class="error404">
        <div>
            <p>
                Nous sommes désolés, mais il semble que nous rencontrions un problème technique.
            </p>
            <p>
                Notre équipe essaye de résoudre le problème au plus vite.
            </p>
        </div>
        <figure><img src="public/img/erreurBd.jpg" alt="Image erreur base de données"></figure>
    </article>
</main>
<?php
require "app/Views/common/footer.php";
?>