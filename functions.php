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
