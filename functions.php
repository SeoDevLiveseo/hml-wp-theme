<?php
/*Carrega os scripts */
function load_scripts(){
    wp_enqueue_style( 'template', get_template_directory_uri() . '/css/template.css');
}

add_action( 'wp_enqueue_scripts', 'load_scripts' );

/*Função configuração de tema */
function liveseo_config(){
    /*Registrando menu */
    register_nav_menus(
        array(
            'my_main_menu' => 'Main Menu'
        )
    );
}

add_theme_support( 'custom-background' );
add_action('after_setup_theme', 'liveseo_config', 0);

?>
