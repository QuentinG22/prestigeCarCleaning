<?php
require "app/Views/common/head.php";
require "app/Views/common/header.php";
?>
<main class="container">
    <h1 class="title">Inscrivez<span>-vous</span></h1>
    <?php if (isset($error) && $error !== '') : ?>
        <div class="alert error">
            <?= $error ?>
        </div>
    <?php endif; ?>
    <article id="register" class="classForm">
        <p>* Champs obligatoire</p>
        <form action="inscription" method="post">
            <div class="formRegister">
                <div>
                    <input type="text" id="name" name="name" placeholder="Nom *">
                    <p class="errorForm" data-error-for="name"></p>
                </div>
                <div>
                    <input type="text" id="firstname" name="firstname" placeholder="Prénom *">
                    <p class="errorForm" data-error-for="firstname"></p>
                </div>
                <div>
                    <input type="email" id="email" name="email" placeholder="Email *">
                    <p class="errorForm" data-error-for="email"></p>
                </div>
                <div>
                    <input type="phone" id="phone" name="phone" placeholder="Téléphone *">
                    <p class="errorForm" data-error-for="phone"></p>
                </div>
                <div>
                    <input type="password" id="password" name="password" placeholder="Mot de passe *">
                    <p class="errorForm" data-error-for="password"></p>
                </div>
                <div>
                    <input type="password" id="confirmPassword" name="confirmPassword" placeholder="Confirmation mot de passe *">
                    <p class="errorForm" data-error-for="confirmPassword"></p>
                </div>
            </div>
            <div>
                <p>
                    <input type="checkbox" id="rgpd">
                    * J'accepte les termes et conditions et la politique de confidentialité
                    <a href="politique-de-confidentialité"><span>Lisez les termes et conditions d'utilisation</span></a>.
                </p>
                <input type="submit" id="inputValid" name="register" value="Valider" disabled>
            </div>
        </form>
    </article>
</main>
<?php
require "app/Views/common/footer.php";
?>