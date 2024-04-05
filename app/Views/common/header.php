<header>
    <div class="container header">
        <figure>
            <a href="accueil">
                <img src="public/img/logo.png" class="logoHeader" alt="Logo de Prestige Car Cleaning">
            </a>
        </figure>
        <div id="burger">
            <i class="fa-solid fa-bars"></i>
        </div>
        <nav class="mainMenu">
            <ul>
            <?php if (strpos($_SERVER['REQUEST_URI'], "/admin") !== false) : ?>
                    <li><a href="admin/tableau-de-bord">Tableau de bord</a></li>
                    <li><a href="admin/gestion-des-prestations">Gestion des prestations</a></li>
                    <li><a href="admin/gestion-des-produits">Gestion des produits</a></li>
                    <li><a href="admin/modération-avis">Modération avis</a></li>
                <?php else : ?>
                    <li><a href="accueil">Accueil</a></li>
                    <li><a href="nos-prestations">Prestations</a></li>
                    <li><a href="nos-avis">Avis</a></li>
                    <li><a href="contact">Contact</a></li>
                    <?php if (isset($_SESSION['actif']) && $_SESSION['actif'] === 'yes') : ?>
                        <li><a href="déconnexion">Déconnexion</a></li>
                    <?php else : ?>
                        <li><a href="connexion">Connexion</a></li>
                    <?php endif; ?>
                <?php endif; ?>
            </ul>
        </nav>
    </div>
    <hr>
</header>