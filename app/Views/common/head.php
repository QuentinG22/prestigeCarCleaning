<!DOCTYPE html>
<html lang="fr">

<head>
    <?php
    $baseUrl = "";
    if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') {
        $baseUrl = "https://";
    } else {
        $baseUrl = "http://";
    }
    // Ajouter le nom d'hôte (domaine) à l'URL
    $baseUrl .= $_SERVER['HTTP_HOST'];
    // Ajouter le chemin relatif de l'URL
    $baseUrl .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);
    ?>

    <base href="<?= $baseUrl ?>">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="public/img/favicon.png" type="image/x-icon">
    <title><?= $title ?></title>
    <!-- CDN pour les icônes -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer">
    <!-- Css du site -->
    <link rel="stylesheet" href="public/css/style.min.css">
    <script src="public/js/burger.js" defer></script>
    <script src="public/js/activeLink.js" defer></script>
    <?php if (!isset($_GET['url']) || $_GET['url'] == "accueil") : ?>
        <script src="public/js/slider.js" defer></script>
    <?php endif; ?>
    <?php if (!isset($_GET['url']) || $_GET['url'] == "nos-prestations") : ?>
        <script src="public/js/service.js" defer></script>
    <?php endif; ?>
    <?php if (!isset($_GET['url']) || $_GET['url'] == "nos-avis") : ?>
        <script src="public/js/comment.js" defer></script>
    <?php endif; ?>
    <?php if (isset($_GET['url']) && $_GET['url'] == "contact") : ?>
        <script type="module" src="public/js/contact.js"></script>
    <?php endif; ?>
    <?php if (isset($_GET['url']) && $_GET['url'] == "inscription") : ?>
        <script type="module" src="public/js/register.js"></script>
    <?php endif; ?>
    <?php if (isset($_GET['url']) && $_GET['url'] == "profil") : ?>
        <script type="module" src="public/js/profile.js"></script>
    <?php endif; ?>
    <?php if (isset($_GET['url']) && $_GET['url'] == "admin/gestion-des-prestations") : ?>
        <script src="public/js/backOffice/service.js" defer></script>
    <?php endif; ?>
    <?php if (isset($_GET['url']) && ($_GET['url'] == "admin/modération-avis" || $_GET['url'] == "nos-avis")) : ?>
        <script src="public/js/carrousel.js" defer></script>
    <?php endif; ?>

</head>

<body>