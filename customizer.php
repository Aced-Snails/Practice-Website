<?php

// Add Customizer Settings
function bloodborne_customize_register($wp_customize)
{
    // General Site Settings Section
    $wp_customize->add_section('general_section', array(
        'title'    => __('General', 'bloodborne'),
        'priority' => 30,
    ));

    // Favicon Setting
    $wp_customize->add_setting('site_favicon', array(
        'default'   => '',
        'transport' => 'refresh',
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control(
        $wp_customize,
        'site_favicon',
        array(
            'label'    => __('Upload Favicon', 'bloodborne'),
            'section'  => 'general_section',
            'settings' => 'site_favicon',
        )
    ));

    // Site Title Setting
    $wp_customize->add_setting('custom_site_title', array(
        'default'   => '', // Set an empty string instead of get_bloginfo()
        'transport' => 'refresh',
        'sanitize_callback' => 'wp_filter_nohtml_kses',
    ));

    $wp_customize->add_control('custom_site_title', array(
        'label'    => __('Site Title', 'bloodborne'),
        'section'  => 'general_section',
        'settings' => 'custom_site_title',
        'type'     => 'text',
    ));

    // Tagline Setting
    $wp_customize->add_setting('custom_tagline', array(
        'default'   => '',
        'transport' => 'refresh',
        'sanitize_callback' => 'wp_filter_nohtml_kses',
    ));

    $wp_customize->add_control('custom_tagline', array(
        'label'    => __('Tagline', 'bloodborne'),
        'section'  => 'general_section',
        'settings' => 'custom_tagline',
        'type'     => 'text',
    ));

    // Add Body Font Setting to Customizer
    $wp_customize->add_setting('body_font_setting', array(
        'default' => get_field('body_font', 'option'), // Get default value from ACF or set your own
        'transport' => 'refresh', // Live refresh
    ));

    // Body Font Control
    $wp_customize->add_control('body_font_control', array(
        'label' => __('Body Font', 'bloodborne'),
        'section' => 'general_section',
        'settings' => 'body_font_setting',
        'type' => 'select',
        'choices' => array(
            'Merriweather, serif' => 'Merriweather',
            'Georgia, serif' => 'Georgia',
            'Arial, sans-serif' => 'Arial',
            'Roboto, sans-serif' => 'Roboto',
            'Open Sans, sans-serif' => 'Open Sans',
            'Lato, sans-serif' => 'Lato',
            'Montserrat, sans-serif' => 'Montserrat',
            'Source Sans Pro, sans-serif' => 'Source Sans Pro',
            'Raleway, sans-serif' => 'Raleway',
            'Slabo 27px, serif' => 'Slabo 27px',
            'Poppins, sans-serif' => 'Poppins',
            'Playfair Display, serif' => 'Playfair Display',
            'Oswald, sans-serif' => 'Oswald',
            'Ubuntu, sans-serif' => 'Ubuntu',
            'PT Sans, sans-serif' => 'PT Sans',
            'Anton, sans-serif' => 'Anton',
            'Nunito, sans-serif' => 'Nunito',
            'Arimo, sans-serif' => 'Arimo',
            'Roboto Slab, serif' => 'Roboto Slab',
            'Exo 2, sans-serif' => 'Exo 2',
            'Bebas Neue, sans-serif' => 'Bebas Neue',
            'Lora, serif' => 'Lora',
        ),
    ));

    // Add Heading Font Setting to Customizer
    $wp_customize->add_setting('heading_font_setting', array(
        'default' => get_field('heading_font', 'option'), // Get default value from ACF or set your own
        'transport' => 'refresh',
    ));

    // Heading Font Control
    $wp_customize->add_control('heading_font_control', array(
        'label' => __('Heading Font', 'bloodborne'),
        'section' => 'general_section',
        'settings' => 'heading_font_setting',
        'type' => 'select',
        'choices' => array(
            'Merriweather, serif' => 'Merriweather',
            'Georgia, serif' => 'Georgia',
            'Arial, sans-serif' => 'Arial',
            'Roboto, sans-serif' => 'Roboto',
            'Open Sans, sans-serif' => 'Open Sans',
            'Lato, sans-serif' => 'Lato',
            'Montserrat, sans-serif' => 'Montserrat',
            'Source Sans Pro, sans-serif' => 'Source Sans Pro',
            'Raleway, sans-serif' => 'Raleway',
            'Slabo 27px, serif' => 'Slabo 27px',
            'Poppins, sans-serif' => 'Poppins',
            'Playfair Display, serif' => 'Playfair Display',
            'Oswald, sans-serif' => 'Oswald',
            'Ubuntu, sans-serif' => 'Ubuntu',
            'PT Sans, sans-serif' => 'PT Sans',
            'Anton, sans-serif' => 'Anton',
            'Nunito, sans-serif' => 'Nunito',
            'Arimo, sans-serif' => 'Arimo',
            'Roboto Slab, serif' => 'Roboto Slab',
            'Exo 2, sans-serif' => 'Exo 2',
            'Bebas Neue, sans-serif' => 'Bebas Neue',
            'Lora, serif' => 'Lora',
        ),
    ));


    // Header Settings Section
    $wp_customize->add_section('header_section', array(
        'title'    => __('Header', 'bloodborne'),
        'priority' => 30,
    ));

    // Logo Upload Setting
    $wp_customize->add_setting('header_logo', array(
        'default'   => '',
        'transport' => 'refresh', // Or 'postMessage' for live preview
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'header_logo_control', array(
        'label'    => __('Upload Logo', 'bloodborne'),
        'section'  => 'header_section',
        'settings' => 'header_logo',
    )));

    // Background Image Setting for Header
    $wp_customize->add_setting('header_background_image', array(
        'default'   => '',
        'transport' => 'postMessage', // Use 'postMessage' for live preview
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'header_background_image_control', array(
        'label'    => __('Background Image', 'bloodborne'),
        'section'  => 'header_section',
        'settings' => 'header_background_image',
    )));

    // Header Background Color Setting
    $wp_customize->add_setting('header_background_color_setting', array(
        'default'           => '#333333',
        'sanitize_callback' => 'sanitize_hex_color', // Ensure it’s a valid hex color
        'transport'         => 'postMessage', // Ensure live preview works
    ));
    $wp_customize->add_control('header_background_color', array(
        'label'    => __('Background Color', 'bloodborne'),
        'section'  => 'header_section',
        'settings' => 'header_background_color_setting',
        'type'     => 'color',
    ));

    // Header Text Color Setting
    $wp_customize->add_setting('header_text_color_setting', array(
        'default'           => '#ffffff',
        'sanitize_callback' => 'sanitize_hex_color', // Ensure it’s a valid hex color
        'transport'         => 'postMessage', // Ensure live preview works
    ));
    $wp_customize->add_control('header_text_color', array(
        'label'    => __('Text Color', 'bloodborne'),
        'section'  => 'header_section',
        'settings' => 'header_text_color_setting',
        'type'     => 'color',
    ));

    // Header Font Size Setting
    $wp_customize->add_setting('header_fontsize_setting', array(
        'default'           => '25',
        'transport'         => 'postMessage', // Enable live preview
        'sanitize_callback' => 'absint', // Ensure it's an integer
    ));
    $wp_customize->add_control('header_fontsize', array(
        'label'       => __('Font Size', 'bloodborne'),
        'description' => __('Adjust the base font size.', 'bloodborne'),
        'section'     => 'header_section',
        'settings'    => 'header_fontsize_setting',
        'type'        => 'number', // Use 'number' instead of 'slider'
        'input_attrs' => array(
            'min'  => 10,
            'max'  => 50,
            'step' => 1,
        ),
    ));

    // Hero Section
    $wp_customize->add_section('hero_section', array(
        'title'    => __('Hero Section', 'bloodborne'),
        'priority' => 40,
    ));

    // Hero Background Color Setting
    $wp_customize->add_setting('hero_background_color_setting', array(
        'default'           => '#333333',
        'sanitize_callback' => 'sanitize_hex_color', // Ensure it’s a valid hex color
        'transport'         => 'postMessage', // Ensure live preview works
    ));
    $wp_customize->add_control('hero_background_color', array(
        'label'    => __('Background Color', 'bloodborne'),
        'section'  => 'hero_section',
        'settings' => 'hero_background_color_setting',
        'type'     => 'color',
    ));

    // Hero Title Setting
    $wp_customize->add_setting('hero_title', array(
        'default'   => '',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_text_field', // Sanitize title input
    ));
    $wp_customize->add_control('hero_title_control', array(
        'label'    => __('Title', 'bloodborne'),
        'section'  => 'hero_section',
        'settings' => 'hero_title',
        'type'     => 'text',
    ));

    // Hero Title Color Setting
    $wp_customize->add_setting('hero_title_color_setting', array(
        'default'           => '#ffffff',
        'sanitize_callback' => 'sanitize_hex_color', // Ensure it’s a valid hex color
        'transport'         => 'postMessage', // Ensure live preview works
    ));
    $wp_customize->add_control('hero_title_color', array(
        'label'    => __('Title Color', 'bloodborne'),
        'section'  => 'hero_section',
        'settings' => 'hero_title_color_setting',
        'type'     => 'color',
    ));

    // Hero Title Font Size Setting
    $wp_customize->add_setting('hero_title_fontsize_setting', array(
        'default'           => '35',
        'transport'         => 'postMessage', // Enable live preview
        'sanitize_callback' => 'absint', // Ensure it's an integer
    ));
    $wp_customize->add_control('hero_title_fontsize', array(
        'label'       => __('Title Font Size', 'bloodborne'),
        'description' => __('Adjust the base font size.', 'bloodborne'),
        'section'     => 'hero_section',
        'settings'    => 'hero_title_fontsize_setting',
        'type'        => 'number', // Use 'number' instead of 'slider'
        'input_attrs' => array(
            'min'  => 10,
            'max'  => 50,
            'step' => 1,
        ),
    ));

    // Hero Subtitle Setting
    $wp_customize->add_setting('hero_subtitle', array(
        'default'   => '',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_text_field', // Sanitize subtitle input
    ));
    $wp_customize->add_control('hero_subtitle_control', array(
        'label'    => __('Subtitle', 'bloodborne'),
        'section'  => 'hero_section',
        'settings' => 'hero_subtitle',
        'type'     => 'text',
    ));

    // Hero Subtitle Color Setting
    $wp_customize->add_setting('hero_subtitle_color_setting', array(
        'default'           => '#ffffff',
        'sanitize_callback' => 'sanitize_hex_color', // Ensure it’s a valid hex color
        'transport'         => 'postMessage', // Use postMessage for live preview
    ));
    $wp_customize->add_control('hero_subtitle_color', array(
        'label'    => __('Subtitle Color', 'bloodborne'),
        'section'  => 'hero_section',
        'settings' => 'hero_subtitle_color_setting',
        'type'     => 'color',
    ));

    // Hero Subtitle Font Size Setting
    $wp_customize->add_setting('hero_subtitle_fontsize_setting', array(
        'default'           => '30',
        'transport'         => 'postMessage', // Enable live preview
        'sanitize_callback' => 'absint', // Ensure it's an integer
    ));
    $wp_customize->add_control('hero_subtitle_fontsize', array(
        'label'       => __('Subtitle Font Size', 'bloodborne'),
        'description' => __('Adjust the subtitle font size.', 'bloodborne'),
        'section'     => 'hero_section',
        'settings'    => 'hero_subtitle_fontsize_setting',
        'type'        => 'number',
        'input_attrs' => array(
            'min'  => 10,
            'max'  => 50,
            'step' => 1,
        ),
    ));

    // Featured Section
    $wp_customize->add_section('featured_section', array(
        'title'    => __('Featured Section', 'bloodborne'),
        'priority' => 50,
    ));

    // Overall Featured Background Color Setting
    $wp_customize->add_setting('overall_featured_color_setting', array(
        'default'           => '#333333',
        'sanitize_callback' => 'sanitize_hex_color', // Ensure it’s a valid hex color
        'transport'         => 'postMessage', // Ensure live preview works
    ));
    $wp_customize->add_control('overall_featured_color', array(
        'label'    => __('Overall Background Color', 'bloodborne'),
        'section'  => 'featured_section',
        'settings' => 'overall_featured_color_setting',
        'type'     => 'color',
    ));

    // Featured 1 Background Color Setting
    $wp_customize->add_setting('featured_1_background_color_setting', array(
        'default'           => '#333333',
        'sanitize_callback' => 'sanitize_hex_color', // Ensure it’s a valid hex color
        'transport'         => 'postMessage', // Ensure live preview works
    ));
    $wp_customize->add_control('featured_1_background_color', array(
        'label'    => __('Background Color 1', 'bloodborne'),
        'section'  => 'featured_section',
        'settings' => 'featured_1_background_color_setting',
        'type'     => 'color',
    ));

    // Featured 2 Background Color Setting
    $wp_customize->add_setting('featured_2_background_color_setting', array(
        'default'           => '#333333',
        'sanitize_callback' => 'sanitize_hex_color', // Ensure it’s a valid hex color
        'transport'         => 'postMessage', // Ensure live preview works
    ));
    $wp_customize->add_control('featured_2_background_color', array(
        'label'    => __('Background Color 2', 'bloodborne'),
        'section'  => 'featured_section',
        'settings' => 'featured_2_background_color_setting',
        'type'     => 'color',
    ));

    // Featured Title Settings for 1 & 2
    for ($i = 1; $i <= 2; $i++) {
        $wp_customize->add_setting("featured_title_$i", array(
            'default'   => '',
            'transport' => 'refresh',
            'sanitize_callback' => 'sanitize_text_field', // Sanitize title input
        ));
        $wp_customize->add_control("featured_title_{$i}_control", array(
            'label'    => __("Featured Title $i", 'bloodborne'),
            'section'  => 'featured_section',
            'settings' => "featured_title_$i",
            'type'     => 'text',
        ));

        // Featured Font Size Setting for 1 & 2
        $wp_customize->add_setting("featured_title_{$i}_fontsize_setting", array(
            'default'           => '30',
            'transport'         => 'postMessage', // Enable live preview
            'sanitize_callback' => 'absint', // Ensure it's an integer
        ));
        $wp_customize->add_control("featured_title_{$i}_fontsize", array(
            'label'       => __("Featured Title $i Font Size", 'bloodborne'),
            'description' => __('Adjust the font size for featured title.', 'bloodborne'),
            'section'     => 'featured_section',
            'settings'    => "featured_title_{$i}_fontsize_setting",
            'type'        => 'number',
            'input_attrs' => array(
                'min'  => 10,
                'max'  => 50,
                'step' => 1,
            ),
        ));

        // Featured Title Color Settings for 1 & 2
        $wp_customize->add_setting("featured_title_{$i}_color_setting", array(
            'default'           => '#ffffff',
            'sanitize_callback' => 'sanitize_hex_color', // Ensure it’s a valid hex color
            'transport'         => 'postMessage', // Ensure live preview works
        ));
        $wp_customize->add_control("featured_title_{$i}_color", array(
            'label'    => __("Featured Title $i Color", 'bloodborne'),
            'section'  => 'featured_section',
            'settings' => "featured_title_{$i}_color_setting",
            'type'     => 'color',
        ));
    }

    // Location Section
    $wp_customize->add_section('location_section', array(
        'title'    => __('Locations Section', 'bloodborne'),
        'priority' => 60, // Updated priority to avoid conflict
    ));

    // Location Background Color Setting
    $wp_customize->add_setting('location_background_color_setting', array(
        'default'           => '#333333',
        'sanitize_callback' => 'sanitize_hex_color', // Ensure it’s a valid hex color
        'transport'         => 'postMessage', // Ensure live preview works
    ));
    $wp_customize->add_control('location_background_color', array(
        'label'    => __('Background Color', 'bloodborne'),
        'section'  => 'location_section',
        'settings' => 'location_background_color_setting',
        'type'     => 'color',
    ));

    // Location Title Setting
    $wp_customize->add_setting('location_title', array(
        'default'   => '',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_text_field', // Sanitize title input
    ));
    $wp_customize->add_control('location_title_control', array(
        'label'    => __('Title', 'bloodborne'),
        'section'  => 'location_section',
        'settings' => 'location_title',
        'type'     => 'text',
    ));

    // Location Title Color Setting
    $wp_customize->add_setting('location_title_color_setting', array(
        'default'           => '#ffffff',
        'sanitize_callback' => 'sanitize_hex_color', // Ensure it’s a valid hex color
        'transport'         => 'postMessage', // Ensure live preview works
    ));
    $wp_customize->add_control('location_title_color', array(
        'label'    => __('Title Color', 'bloodborne'),
        'section'  => 'location_section',
        'settings' => 'location_title_color_setting',
        'type'     => 'color',
    ));

    // Location Title Font Size Setting
    $wp_customize->add_setting('location_title_fontsize_setting', array(
        'default'           => '30',
        'transport'         => 'postMessage', // Enable live preview
        'sanitize_callback' => 'absint', // Ensure it's an integer
    ));
    $wp_customize->add_control('location_title_fontsize', array(
        'label'       => __('Title Font Size', 'bloodborne'),
        'description' => __('Adjust the subtitle font size.', 'bloodborne'),
        'section'     => 'location_section',
        'settings'    => 'location_title_fontsize_setting',
        'type'        => 'number',
        'input_attrs' => array(
            'min'  => 10,
            'max'  => 50,
            'step' => 1,
        ),
    ));

    // Footer Settings Section
    $wp_customize->add_section('footer_section', array(
        'title'    => __('Footer', 'bloodborne'),
        'priority' => 70,
    ));

    // Footer Background Color Setting
    $wp_customize->add_setting('footer_background_color_setting', array(
        'default'           => '#333333',
        'sanitize_callback' => 'sanitize_hex_color', // Ensure it’s a valid hex color
        'transport'         => 'postMessage', // Ensure live preview works
    ));
    $wp_customize->add_control('footer_background_color', array(
        'label'    => __('Background Color', 'bloodborne'),
        'section'  => 'footer_section',
        'settings' => 'footer_background_color_setting',
        'type'     => 'color',
    ));

    // Logo Upload Setting
    $wp_customize->add_setting('footer_logo', array(
        'default'   => '',
        'transport' => 'refresh', // Or 'postMessage' for live preview
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'footer_logo_control', array(
        'label'    => __('Upload Logo', 'bloodborne'),
        'section'  => 'footer_section',
        'settings' => 'footer_logo',
    )));

    // Footer Disclaimer Setting
    $wp_customize->add_setting('disclaimer_setting', array(
        'default'   => '',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_text_field', // Sanitize title input
    ));
    $wp_customize->add_control('disclaimer_control', array(
        'label'    => __('Disclaimer', 'bloodborne'),
        'section'  => 'footer_section',
        'settings' => 'disclaimer_setting',
        'type'     => 'textarea',
    ));

    // Background Image Section
    $wp_customize->add_section('background_image_section', array(
        'title'    => __('Background Image', 'bloodborne'),
        'priority' => 80,
    ));

    // Background Image Upload Setting
    $wp_customize->add_setting('background_image_setting', array(
        'default'   => '',
        'transport' => 'refresh', // Or 'postMessage' for live preview
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'background_image_control', array(
        'label'    => __('Upload BG Image', 'bloodborne'),
        'section'  => 'background_image_section',
        'settings' => 'background_image_setting',
    )));

     // Secondary Page Background Image Upload Setting
     $wp_customize->add_setting('secondary_page_background_image_setting', array(
        'default'   => '',
        'transport' => 'refresh', // Or 'postMessage' for live preview
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'secondary_page_background_image_control', array(
        'label'    => __('Upload BG Image for secondary pages', 'bloodborne'),
        'section'  => 'background_image_section',
        'settings' => 'secondary_page_background_image_setting',
    )));
}

function bloodborne_customize_css()
{
?>
    <style type="text/css">
        body.home {
            background-image: url(<?php echo get_theme_mod('background_image_setting'); ?>);
            background-position: center;
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            /* Optional: keeps the background fixed while scrolling */
            height: 100vh;
            /* Ensures it covers the full viewport height */
            margin: 0;
            padding: 0;
        }

        body {
            background-image: url(<?php echo get_theme_mod('secondary_page_background_image_setting'); ?>);
            background-position: top;
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            /* Optional: keeps the background fixed while scrolling */
            height: 100vh;
            /* Ensures it covers the full viewport height */
            margin: 0;
            padding: 0;
        }

        header {
            background-color: <?php echo esc_html(get_theme_mod('header_background_color_setting', '#333333')); ?>;
        }

        footer {
            background-color: <?php echo esc_html(get_theme_mod('footer_background_color_setting', '#333333')); ?>;
        }

        .hero-overall-container {
            background-color: <?php echo esc_html(get_theme_mod('hero_background_color_setting', 'rgba(105, 105, 105, 0.7)')); ?>;
        }

        .overall-featured-container {
            background-color: <?php echo esc_html(get_theme_mod('overall_featured_color_setting', 'rgba(105, 105, 105, 0.7)')); ?>;
        }

        nav ul li a {
            color: <?php echo esc_html(get_theme_mod('header_text_color_setting', '#ffffff')); ?>;
            font-size: <?php echo esc_html(get_theme_mod('header_fontsize_setting', '10px')); ?>px;
        }

        .hero-title {
            color: <?php echo esc_html(get_theme_mod('hero_title_color_setting', '#ffffff')); ?>;
            font-size: <?php echo esc_html(get_theme_mod('hero_title_fontsize_setting', '35')); ?>px;
        }

        .weapons-container {
            background-color: <?php echo esc_html(get_theme_mod('featured_1_background_color_setting', 'rgba(105, 105, 105, 0.7)')); ?>;
        }

        .armor-container {
            background-color: <?php echo esc_html(get_theme_mod('featured_2_background_color_setting', 'rgba(105, 105, 105, 0.7)')); ?>;
        }

        .hero-subtitle {
            color: <?php echo esc_html(get_theme_mod('hero_subtitle_color_setting', '#ffffff')); ?>;
            font-size: <?php echo esc_html(get_theme_mod('hero_subtitle_fontsize_setting', '30')); ?>px;
        }

        .featured-title-1 {
            color: <?php echo esc_html(get_theme_mod('featured_title_1_color_setting', '#ffffff')); ?>;
            font-size: <?php echo esc_html(get_theme_mod('featured_title_1_fontsize_setting', '30')); ?>px;
        }

        .featured-title-2 {
            color: <?php echo esc_html(get_theme_mod('featured_title_2_color_setting', '#ffffff')); ?>;
            font-size: <?php echo esc_html(get_theme_mod('featured_title_2_fontsize_setting', '30')); ?>px;
        }

        .location-title {
            color: <?php echo esc_html(get_theme_mod('location_title_color_setting', '#ffffff')); ?>;
            font-size: <?php echo esc_html(get_theme_mod('location_title_fontsize_setting', '30')); ?>px;
        }

        .locations-container-all {
            background-color: <?php echo esc_html(get_theme_mod('location_background_color_setting', 'rgba(105, 105, 105, 0.7)')); ?>;
        }
    </style>
<?php
}

add_action('wp_head', 'bloodborne_customize_css');

add_action('customize_register', 'bloodborne_customize_register');

// Live Preview for Customizer
function bloodborne_customize_live_preview()
{
    wp_enqueue_script(
        'bloodborne-customizer', // Handle
        get_template_directory_uri() . '/modules/customizer.js', // Path to JS
        array('jquery', 'customize-preview'), // Dependencies
        null,
        true // Load in footer
    );
}
add_action('customize_preview_init', 'bloodborne_customize_live_preview');

// Hide Customizer Items
function hide_customizer_items($wp_customize)
{
    $wp_customize->remove_section('title_tagline');
    $wp_customize->remove_section('static_front_page');
    $wp_customize->remove_section('custom_css');
}
add_action('customize_register', 'hide_customizer_items');

?>