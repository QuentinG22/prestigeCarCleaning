<?php
require "app/Views/common/head.php";
require "app/Views/common/header.php";
?>
<main class="container">
    <h1 class="title">Connectez<span>-vous</span></h1>
    <?php if ($error !== '') : ?>
        <div class="alert error">
            <?= $error ?>
        </div>
    <?php endif; ?>
    <article id="connection">
        <form action="connection" method="post">
            <div>
                <input type="email" name="email" placeholder="Email utilisateur">
            </div>
            <div>
                <input type="password" name="password" placeholder="Mot de passe">
            </div>
            <div>
                <input type="submit" name="login" value="Connexion">
                <a href="inscription"><input type="button" name="register" value="Inscription"></a>
            </div>
        </form>
        <figure>
            <img src="public/img/login.jpg" alt="Image de connexion">
        </figure>
    </article>
</main>
<?php
require "app/Views/common/footer.php";
?>