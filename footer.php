<footer style="background-color: <?php echo esc_attr(get_theme_mod('footer_color', '#151515')); ?>; color: <?php echo esc_attr(get_theme_mod('font_color_setting', '#fff')); ?>; font-size: <?php echo esc_attr(get_theme_mod('font_size_setting', '16px')); ?>">
    <div class="container">
        <div class="row">
            <div class="footer-logo">
                <img src="<?php echo get_theme_mod('footer_logo', 'https://liveseo.com.br/wp-content/uploads/2022/07/logo_liveseo.png') ?>">
                <p><?php echo get_theme_mod('text_brand_placeholder', 'A experiência do usuário, abreviada para “UX” (User Experience) é um dos três pilares que sustentam o SEO.') ?></p>
            </div>
        </div>
        <div class="row">
            <div class="first-text-title">
                <h3><?php echo get_theme_mod('first_text_title', 'Brasil') ?></h3>
            </div>
            <div class="first-text-placeholder">
                <p><?php echo get_theme_mod('first_text_placeholder', 'Maringá, PR') ?></p>
            </div>
        </div>
        <div class="row">
            <div class="second-text-title">
                <h3><?php echo get_theme_mod('second_text_title', 'Fale Conosco') ?></h3>
            </div>
            <div class="second-text-placeholder">
                <p><?php echo get_theme_mod('second_text_placeholder', '+55 (44) 3346 3896') ?></p>
            </div>
        </div>
        <div class="title-footer-menu">
            <h3><?php echo get_theme_mod('title_footer_menu', 'Acesse:') ?></h3>
            <nav class="footer-menu">
                <?php wp_nav_menu(
                    array('theme_location' =>
                    'footer_menu')
                );
                ?>
            </nav>
        </div>
    </div>
    <div class="copyright">
        <div class="row">
            <div class="copyright_text_placeholder">
                <p><?php echo get_theme_mod('copyright_text_placeholder', '© Copyright 2024 | Agência liveSEO. Todos os direitos reservados.') ?></p>
            </div>
        </div>
    </div>
</footer>
<?php wp_footer(); ?>