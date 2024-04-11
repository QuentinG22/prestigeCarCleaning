<?php
require "app/Views/common/head.php";
require "app/Views/common/header.php";
?>
<main class="container">
    <h1 class="title">Mon <span>profil</span></h1>
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
    <?php if (isset($_SESSION['actif']) && $_SESSION['actif'] === 'yes') : ?>
        <p class="intro">
            Bienvenue sur votre profil <span><?= $_SESSION['userFirstname'] ?></span>, vous pouvez consulter, modifier ou supprimer vos données personnelles en toute simplicité.
        </p>
        <section id="profile">
            <article>
                <h2>Mes données personnelles</h2>
                <p><span>Nom : </span><?= $user->name ?></p>
                <p><span>Prénom : </span><?= $user->firstname ?></p>
                <p><span>E-mail : </span><?= $user->email ?></p>
                <p><span>Téléphone : </span>+33<?= $user->phone ?></p>
                <button><a href="déconnexion">Déconnexion</a></button>
            </article>
            <article>
                <h2>Modifier mes données personnelles</h2>
                <form action="profil" method="post">
                    <div class="formRegister">
                        <div>
                            <input type="email" id="email" name="email" placeholder="Email">
                            <p class="errorForm" data-error-for="email"></p>
                        </div>
                        <div>
                            <input type="phone" id="phone" name="phone" placeholder="Téléphone">
                            <p class="errorForm" data-error-for="phone"></p>
                        </div>
                        <p class="infoPassword">Pour un changement de mot de passe veuillez renseigner votre ancien mot de passe.</p>
                        <div>
                            <input type="password" id="password" name="password" placeholder="Ancien mot de passe">
                            <p class="errorForm" data-error-for="password"></p>
                        </div>
                        <div>
                            <input type="password" id="newPassword" name="newPassword" placeholder="Nouveau mot de passe">
                            <p class="errorForm" data-error-for="newPassword"></p>
                        </div>
                        <div>
                            <input type="password" id="confirmNewPassword" placeholder="Confirmation nouveau mot de passe">
                            <p class="errorForm" data-error-for="confirmPassword"></p>
                        </div>
                    </div>
                    <div>
                        <p>
                            <input type="checkbox" id="updateUser">
                            J'accepte d'apporter les modifications sur mon profil.
                        </p>
                        <?php if ($_SESSION['userIsAdmin'] == 0) : ?>
                            <p>
                                <input type="checkbox" id="deleteUser">
                                Je souhaite supprimer mon compte.
                            </p>
                        <?php endif; ?>
                        <input type="submit" id="inputUpdate" name="updateUser" value="Modifier" disabled>
                        <?php if ($_SESSION['userIsAdmin'] == 0) : ?>
                            <input type="submit" id="inputDelete" name="deleteUser" value="Supprimer" disabled>
                        <?php endif; ?>
                    </div>
                </form>
            </article>
        </section>
    <?php endif; ?>
</main>
<?php
require "app/Views/common/footer.php";
?>