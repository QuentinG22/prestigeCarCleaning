<!DOCTYPE html>
<html lang="fr">

<head>
    <base href="http://localhost/prestigeCarCleaning/">
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
    <?php if (isset($_GET['url']) && $_GET['url'] == "contact") : ?>
        <script type="module" src="public/js/tools.js" defer></script>
    <?php endif; ?>
    <?php if (isset($_GET['url']) && $_GET['url'] == "inscription") : ?>
        <script type="module" src="public/js/register.js" defer></script>
    <?php endif; ?>
    <?php if (!isset($_GET['url']) || $_GET['url'] == "accueil") : ?>
        <script src="public/js/slider.js" defer></script>
    <?php endif; ?>
    <?php if (isset($_GET['url']) && $_GET['url'] == "contact") : ?>
        <script type="module" src="public/js/contact.js" defer></script>
    <?php endif; ?>
    <?php if (isset($_GET['url']) && $_GET['url'] == "admin/tableau-de-bord") : ?>
        <script type="module" src="public/js/dashboard.js" defer></script>
    <?php endif; ?>

</head>

<body>