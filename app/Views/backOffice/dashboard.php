<?php
require "app/Views/common/head.php";
require "app/Views/common/header.php";
?>
<main class="container">
    <h1 class="title">Tableau de <span>bord</span></h1>
    <?php if ($error !== '') : ?>
        <div class="alert error">
            <?= $error ?>
        </div>
    <?php endif; ?>
    <?php if ($sucess !== '') : ?>
        <div class="alert sucess">
            <?= $sucess ?>
        </div>
    <?php endif; ?>
    <section class="dashboard">
        <article>
            <h2>Les demandes de contact</h2>
            <table id="contactTable">
                <thead>
                    <tr>
                        <th>Email</th>
                        <th>Objet</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($this->contactAll as $key) : ?>
                        <tr data-id="<?= $key->idContact ?>">
                            <td><?= $key->email ?></td>
                            <td><?= $key->object ?></td>
                            <td><?= date('d/m/Y', strtotime($key->_date)) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </article>
        <article id="detailContact">
            <h2>Détail de la demande de contact</h2>
        </article>
    </section>
</main>
<?php
require "app/Views/common/footer.php";
?>