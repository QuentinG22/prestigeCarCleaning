<footer>
    <hr>
    <figure>
        <a href="accueil">
            <img src="public/img/logo.png" id="logoFooter" alt="Logo de Prestige Car Cleaning">
        </a>
    </figure>
    <div class="footer">
        <section class="container articleFooter">
            <article class="address">
                <h3>Adresse</h3>
                <address>
                    <p>20 Rue Notre Dame</p>
                    <p>22600 Loudéac</p>
                    <p>xx xx xx xx xx</p>
                </address>
            </article>
            <article class="networks">
                <h3>Réseaux</h3>
                <a href="https://www.facebook.com/" target="_blank">
                    <i class="fa-brands fa-square-facebook"></i>
                </a>
                <a href="https://www.instagram.com/" target="_blank">
                    <i class="fa-brands fa-square-instagram"></i>
                </a>
            </article>
            <article class="links">
                <h3>Liens utiles</h3>
                <ul>
                    <?php if (isset($_SESSION['userIsAdmin']) && $_SESSION['userIsAdmin'] === 1) : ?>
                        <li><a href="admin">Espace admin</a></li>
                    <?php endif; ?>
                    <li><a href="">Mentions légales</a></li>
                    <li><a href="">Politique de confidentialité</a></li>
                </ul>
            </article>
        </section>
    </div>
    <div class="copyright">
        <p>Copyright &copy; 2024 - Presitge Car Cleaning</p>
    </div>
</footer>

</body>

</html>