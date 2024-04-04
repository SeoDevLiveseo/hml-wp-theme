<?php
/*load scripts */
function load_scripts()
{
    wp_enqueue_style('template', get_template_directory_uri() . '/css/template.css');
}

add_action('wp_enqueue_scripts', 'load_scripts');

/*Theme configuration function */
function liveseo_config()
{
    /*Register menu */
    register_nav_menus(
        array(
            'my_main_menu' => 'Main Menu',
            'footer_menu' => 'Footer Menu'
        )
    );

    add_theme_support('custom-header', array(
        //default image (empty to use none).
        'default-image'          => '',

        // Set height and width, with a maximum value for the width.
        'height'                 => 80,
        'width'                  => 80,
        'max-width'              => 100,

        // Support flexible height and width.
        'flex-height'            => false,
        'flex-width'             => false,
    ));


    //add the matabox image
    add_theme_support('post-thumbnails');
}

//walker
class AWP_Menu_Walker extends Walker_Nav_Menu
{
    function start_el(&$output, $item, $depth = 0, $args = [], $id = 0)
    {
        $output .= "<li class='" .  implode(" ", $item->classes) . "'>";

        if ($item->url && $item->url != '#') {
            $output .= '<a href="' . $item->url . '">';
        } else {
            $output .= '<span>';
        }

        $output .= $item->title;



        if ($item->url && $item->url != '#') {
            $output .= '</a>';
        } else {
            $output .= '</span>';
        }

        if ($args->walker->has_children) {
            $output .= '<i class="caret fa fa-angle-down"></i>';
        }
    }
}

add_action('after_setup_theme', 'liveseo_config', 0);


function custom_social_links_customize_register($wp_customize)
{
    // Add section for social links
    $wp_customize->add_section('custom_social_links_section', array(
        'title' => __('Social Links', 'text_domain'),
        'priority' => 30,
    ));

    // Add settings and controls for each social link
    $wp_customize->add_setting('facebook_url', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control('facebook_url', array(
        'label' => __('Facebook URL', 'text_domain'),
        'section' => 'custom_social_links_section',
        'type' => 'text',
    ));

    $wp_customize->add_setting('instagram_url', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control('instagram_url', array(
        'label' => __('Instagram URL', 'text_domain'),
        'section' => 'custom_social_links_section',
        'type' => 'text',
    ));

    $wp_customize->add_setting('linkedin_url', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control('linkedin_url', array(
        'label' => __('LinkedIn URL', 'text_domain'),
        'section' => 'custom_social_links_section',
        'type' => 'text',
    ));

    $wp_customize->add_setting('youtube_url', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control('youtube_url', array(
        'label' => __('YouTube URL', 'text_domain'),
        'section' => 'custom_social_links_section',
        'type' => 'text',
    ));
}
add_action('customize_register', 'custom_social_links_customize_register');

function custom_footer_register($wp_customize)
{
    //configuração do footer
    $wp_customize->add_section('footer_section', array(
        'title' => __('Footer', 'elementModels'),
        'priority' => '30',
    ));
    //=============================================================================
    // Adiciona um controle para selecionar a cor do footer
    $wp_customize->add_setting('footer_color', array(
        'default'           => '#151515',
        'sanitize_callback' => 'sanitize_hex_color',
    ));

    //Adiciona controlador de cor do footer
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'footer_color', array(
        'label'    => __('Cor do Footer', 'elementModels'),
        'section'  => 'footer_section',
        'settings' => 'footer_color',
    )));
    //=============================================================================
    // Adiciona um controle para o tamanho da fonte
    $wp_customize->add_setting('font_size_setting', array(
        'default' => '16px', // Tamanho padrão da fonte
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('font_size_control', array(
        'type' => 'text',
        'section' => 'footer_section',
        'label' => __('Font Size', 'elementModels'),
        'description' => __('Enter the font size in pixels (e.g., 16px)'),
        'input_attrs' => array(
            'style' => 'width: 100px;', // Estilo para limitar a largura do campo
        ),
        'settings' => 'font_size_setting',
    ));
    //=============================================================================
    // Adiciona um controle para a cor da fonte
    $wp_customize->add_setting('font_color_setting', array(
        'default' => '#fff',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'font_color_control', array(
        'label' => __('Font Color', 'elementModels'),
        'section' => 'footer_section',
        'settings' => 'font_color_setting'
    )));
    //=============================================================================
    //Controle da logo do footer
    $wp_customize->add_setting('footer_logo', array(
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
        'default' => 'https://liveseo.com.br/wp-content/uploads/2022/07/logo_liveseo.png'
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'logo_image_control', array(
        'label' => 'Logo',
        'section' => 'footer_section',
        'settings' => 'footer_logo',
        'description' => __('Upload or select an image for your logo'),
        'height'                 => 80,
        'width'                  => 80
    )));
    //=============================================================================
    $wp_customize->add_setting('text_brand_placeholder', array(
        'capability' => 'edit_theme_options',
        'default' => 'A experiência do usuário, abreviada para “UX” (User Experience) é um dos três pilares que sustentam o SEO.',
        'sanitize_callback' => 'sanitize_text_field',

    ));
    $wp_customize->add_control('text_brand_placeholder', array(
        'type' => 'text',
        'section' => 'footer_section',
        'label' => __('Campo para brand'),
        'description' => __('This is a custom text box')
    ));
    //=============================================================================
    $wp_customize->add_setting('first_text_title', array(
        'capability' => 'edit_theme_options',
        'default' => 'Brasil',
        'sanitize_callback' => 'sanitize_text_field'
    ));

    $wp_customize->add_control('first_text_title', array(
        'type' => 'text',
        'section' => 'footer_section',
        'label' => __('Título do Campo 1'),
        'description' => __('Adicione um título h2 para o campo de texto'),
    ));

    $wp_customize->add_setting('first_text_placeholder', array(
        'capability' => 'edit_theme_options',
        'default' => 'Maringá, PR',
        'sanitize_callback' => 'sanitize_text_field'

    ));
    $wp_customize->add_control('first_text_placeholder', array(
        'type' => 'textarea',
        'section' => 'footer_section',
        'label' => __('Campo para texto 1'),
        'description' => __('This is a custom text box')
    ));
    //=============================================================================
    $wp_customize->add_setting('second_text_title', array(
        'capability' => 'edit_theme_options',
        'default' => 'Fale Conosco',
        'sanitize_callback' => 'sanitize_text_field'
    ));

    $wp_customize->add_control('second_text_title', array(
        'type' => 'text',
        'section' => 'footer_section',
        'label' => __('Título do Campo 2'),
        'description' => __('Adicione um título h2 para o campo de texto'),
    ));


    $wp_customize->add_setting('second_text_placeholder', array(
        'capability' => 'edit_theme_options',
        'default' => '+55 (44) 3346 3896',
        'sanitize_callback' => 'sanitize_text_field'

    ));
    $wp_customize->add_control('second_text_placeholder', array(
        'type' => 'textarea',
        'section' => 'footer_section',
        'label' => __('Campo para texto 2'),
        'description' => __('This is a custom text box'),
    ));
    //=============================================================================

    $wp_customize->add_setting('title_footer_menu', array(
        'capability' => 'edit_theme_options',
        'default' => 'Acesse:',
        'sanitize_callback' => 'sanitize_text_field'
    ));

    $wp_customize->add_control('title_footer_menu', array(
        'type' => 'text',
        'section' => 'footer_section',
        'label' => __('Título do Campo 3'),
        'description' => __('Adicione um título h2 para o campo de texto'),
    ));

    //=============================================================================    
    $wp_customize->add_setting('copyright_text_placeholder', array(
        'capability' => 'edit_theme_options',
        'default' => 'Copyright',
        'sanitize_callback' => 'sanitize_text_field'

    ));
    $wp_customize->add_control('copyright_text_placeholder', array(
        'type' => 'text',
        'section' => 'footer_section',
        'label' => __('Campo para copyright'),
        'description' => __('This is a custom text box'),
    ));
    //=============================================================================
}

add_action('customize_register', 'custom_footer_register');
