<?php
require "app/Views/common/head.php";
require "app/Views/common/header.php";
?>
<main class="container">
    <h1 class="title">Gestion des <span>prestations</span></h1>
    <?php if (isset($error) && $error !== '') : ?>
        <div class="alert error">
            <?= $error ?>
            <button>×</button>
        </div>
    <?php endif; ?>
    <?php if (isset($success) && $success !== '') : ?>
        <div class="alert success">
            <?= $success ?>
            <button>×</button>
        </div>
    <?php endif; ?>
    <section class="managerForm">
        <article id="addService">
            <h2>Ajouter une prestation</h2>
            <form action="admin/gestion-des-prestations" method="post">
                <input type="text" name="name" id="addServiceName" placeholder="Nom de la prestation" required>
                <textarea name="description" id="addServiceDescription" placeholder="Description de la prestation" cols="30" rows="10" required></textarea>
                <input type="number" step="0.01" name="price" id="addServicePrice" placeholder="Prix de la prestation" required>
                <h3>Produits associés :</h3>
                <?php foreach ($productsAll as $product) : ?>
                    <input type="checkbox" name="products[]" value="<?= $product->idProduct; ?>"><?= $product->nameProduct; ?>
                <?php endforeach ?>
                <div>
                    <input type="submit" name="addService" value="Ajouter">
                </div>
            </form>
        </article>

        <article id="selectService">
            <h2>Sélectionnez une prestation</h2>
            <form action="admin/gestion-des-prestations" method="post">
                <select id="service" name="selectedServiceId" required>
                    <option value="">Sélectionnez une prestation</option>
                    <?php foreach ($servicesAll as $service) : ?>
                        <option value="<?= $service->idService; ?>"><?= $service->nameService; ?></option>
                    <?php endforeach ?>
                </select>
                <input type="text" id="selectServiceName" name="name" placeholder="Nom de la prestation">
                <textarea name="description" id="selectServiceDescription" placeholder="Description de la prestation" cols="30" rows="10"></textarea>
                <input type="number" step="0.01" id="selectServicePrice" name="price" placeholder="Prix de la prestation">
                <h3>Produits associés :</h3>
                <?php foreach ($productsAll as $product) : ?>
                    <input id="selectServiceProduct<?= $product->idProduct; ?>" type="checkbox" name="products[]" data-product-id="<?= $product->idProduct; ?>" value="<?= $product->idProduct; ?>"><?= $product->nameProduct; ?>
                <?php endforeach ?>
                <div>
                    <input type="submit" name="updateService" value="Modifier">
                    <input type="submit" name="deleteService" value="Supprimer">
                </div>
            </form>
        </article>
    </section>

</main>
<?php
require "app/Views/common/footer.php";
?>