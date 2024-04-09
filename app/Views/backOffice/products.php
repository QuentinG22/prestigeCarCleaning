<?php
require "app/Views/common/head.php";
require "app/Views/common/header.php";
?>
<main class="container">
    <h1 class="title">Gestion des <span>produits</span></h1>
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
    <section class="managerForm">
        <article id="addproduct">
            <h2>Ajouter un produit</h2>
            <form action="admin/gestion-des-produits" method="post">
                <input type="text" name="name" placeholder="Nom du produit" required>
                <textarea name="description" placeholder="Description du produit" id="" cols="30" rows="10" required></textarea>
                <input type="submit" name="addProduct" value="Ajouter">
            </form>
        </article>
        <article id="selectProduct">
            <h2>Sélectionnez un produit</h2>
            <form action="admin/gestion-des-produits" method="post">
                <select id="product" name="selectedProductId" required>
                    <option value="">Sélectionnez un produit</option>
                    <?php foreach ($productsAll as $product) : ?>
                        <option value="<?= $product->idProduct; ?>"><?= $product->nameProduct; ?></option>
                    <?php endforeach ?>
                </select>
                <input type="text" id="productName" name="name" placeholder="Nom du produit">
                <textarea name="description" id="productDescription" placeholder="Description du produit" cols="30" rows="10"></textarea>
                <div>
                    <input type="submit" name="updateProduct" value="Modifier">
                    <input type="submit" name="deleteProduct" value="Supprimer">
                </div>
            </form>
        </article>
        <script>
            let productsAll = <?= json_encode($productsAll); ?>;

            document.getElementById('product').addEventListener('change', function() {
                console.log(this.value); // Vérifier la valeur sélectionnée
                var selectedProductId = parseInt(this.value);
                var selectedProduct = productsAll.find(function(product) {
                    return product.idProduct === selectedProductId;
                });
                if (selectedProduct) {
                    document.getElementById('productName').value = selectedProduct.nameProduct;
                    document.getElementById('productDescription').value = selectedProduct.description;
                } else {
                    // Réinitialiser les champs si aucun produit n'est sélectionné
                    document.getElementById('productName').value = '';
                    document.getElementById('productDescription').value = '';
                }
            });
        </script>
    </section>
</main>
<?php
require "app/Views/common/footer.php";
?>