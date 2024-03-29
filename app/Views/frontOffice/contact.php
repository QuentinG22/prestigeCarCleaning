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
    <h1 class="title">Contactez<span>-nous</span></h1>
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
    <div class="contactInfo">
        <p>
            Pour toute question ou demande d'information supplémentaire,
            notre équipe reste à votre disposition.
            Vous pouvez nous joindre facilement par téléphone au xx xx xx xx xx pour discuter
            directement avec une personne qualifiés.
        </p><br>
        <p>
            Si vous préférez,
            vous avez également la possibilité de nous contacter via notre formulaire en ligne,
            où vous pourrez détailler vos besoins et nous serons ravis de vous répondre dans les plus
            brefs délais.
        </p><br>
        <p>
            Nous sommes là pour vous aider et répondre à toutes vos interrogations.
        </p>
    </div>
    <article id="contact" class="classForm">
        <form action="contact" method="post">
            <p>* Champs obligatoire</p>
            <div class="formContact">
                <div>
                    <input type="text" id="date" name="date" value="<?= date('Y-m-d'); ?>" readonly>
                </div>
                <div>
                    <input type="text" id="name" name="name" placeholder="Nom *" value="<?= isset($userName) ? $userName : ''; ?>">
                    <p class="errorForm" data-error-for="name"></p>
                </div>
                <div>
                    <input type="text" id="firstname" name="firstname" placeholder="Prénom *" value="<?= isset($userFirstname) ? $userFirstname : ''; ?>">
                    <p class="errorForm" data-error-for="firstname"></p>
                </div>
                <div>
                    <input type="email" id="email" name="email" placeholder="Email *" value="<?= isset($userEmail) ? $userEmail : ''; ?>">
                    <p class="errorForm" data-error-for="email"></p>
                </div>
                <div>
                    <input type="text" id="object" name="object" placeholder="Objet *">
                    <p class="errorForm" data-error-for="object"></p>
                </div>
                <div>
                    <textarea name="text" id="text" cols="30" rows="10" placeholder="Message *"></textarea>
                    <p class="errorForm" data-error-for="text"></p>
                </div>
            </div>
            <div>
                <p>
                    <input type="checkbox" id="rgpd">
                    * J'accepte les termes et conditions et la politique de confidentialité
                    <a href="politique-de-confidentialite"><span>Lisez les termes et conditions d'utilisation</span></a>.
                </p>
                <input type="submit" id="inputValid" name="contact" value="Envoyer" disabled>
            </div>
        </form>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d5321.28865260028!2d-2.754363745782642!3d48.17493583957639!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x480e28280118234d%3A0x9991aa77b5be3f1d!2s20%20Rue%20Notre%20Dame%2C%2022600%20Loud%C3%A9ac!5e0!3m2!1sfr!2sfr!4v1711639443265!5m2!1sfr!2sfr" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </article>
</main>
<?php
require "app/Views/common/footer.php";
?>