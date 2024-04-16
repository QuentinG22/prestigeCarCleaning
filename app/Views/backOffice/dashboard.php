<?php
require "app/Views/common/head.php";
require "app/Views/common/header.php";
?>
<main class="container">
    <h1 class="title">Tableau de <span>bord</span></h1>
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
    <section class="dashboard">
        <article id="selectContact">
            <h2>Demande de contact</h2>
            <form action="admin/tableau-de-bord" method="post">
                <select id="contact" name="selectedContactId" required>
                    <option value="">Sélectionnez une demande de contact</option>
                    <?php foreach ($contactsAll as $key) : ?>
                        <option value="<?= $key->idContact; ?>">Nom, prénom : <?= $key->name; ?> <?= $key->firstname; ?> | Objet : <?= $key->object; ?></option>
                    <?php endforeach ?>
                </select>
                <div>
                    <span>Date :</span>
                    <p id="dateContact"></p>
                </div>
                <div>
                    <span>Nom, prénom :</span>
                    <p id="nameContact"></p>
                </div>
                <div>
                    <span>E-mail :</span>
                    <p id="emailContact"></p>
                </div>
                <div>
                    <span>Objet :</span>
                    <p id="objectContact"></p>
                </div>
                <span>Message :</span>
                <p id="textContact"></p>
                <div>
                    <input type="submit" name="deleteContact" value="Supprimer">
                </div>
            </form>
        </article>
        <figure>
            <img src="public/img/contact.jpg" alt="Image illustration consultation des contacts">
        </figure>
        <script>
            let contactsAll = <?= json_encode($contactsAll); ?>;

            console.log(contactsAll);

            document.querySelector('#contact').addEventListener('change', function() {

                let selectedContactId = parseInt(this.value);
                let selectedContact = contactsAll.find(function(contact) {
                    return contact.idContact == selectedContactId;
                });
                // Mettre à jour les paragraphes avec les détails du contact sélectionné
                if (selectedContact) {
                    document.querySelector('#dateContact').textContent = selectedContact._date;
                    document.querySelector('#nameContact').textContent = selectedContact.name + ' ' + selectedContact.firstname;
                    document.querySelector('#emailContact').textContent = selectedContact.email;
                    document.querySelector('#objectContact').textContent = selectedContact.object;
                    document.querySelector('#textContact').innerHTML = selectedContact.text.replace(/\n/g, '<br>');
                } else {
                    document.querySelector('#dateContact').textContent = '';
                    document.querySelector('#nameContact').textContent = '';
                    document.querySelector('#emailContact').textContent = '';
                    document.querySelector('#objectContact').textContent = '';
                    document.querySelector('#textContact').textContent = '';
                }
            });
        </script>
    </section>
</main>
<?php
require "app/Views/common/footer.php";
?>