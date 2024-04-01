<footer>
    <div class="container">
        <div class="row">
            <div class="copyright">
                <p>copyright</p>
            </div>
        </div>
        <nav class="footer-menu">
            <?php wp_nav_menu(
                array('theme_location' =>
                'footer_menu')
            );
            ?>
        </nav>
    </div>
</footer>
<?php wp_footer(); ?>