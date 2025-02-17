<?php

require_once get_template_directory() . '/customizer.php';

// Enqueue Google Fonts and apply selected fonts
function bloodborne_fonts() {
    // Get custom font settings from the theme customizer
    $body_font = get_theme_mod('body_font_setting', 'Roboto, sans-serif');
    $heading_font = get_theme_mod('heading_font_setting', 'Merriweather, serif');

    // Enqueue Google Fonts with the selected font weights
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=' . urlencode($body_font) . '&family=' . urlencode($heading_font) . '&display=swap', false);

    // Apply selected fonts via inline CSS
    $custom_css = "
        body {
            font-family: {$body_font};
        }
        h1, h2, h3, h4, h5, h6 {
            font-family: {$heading_font};
        }
    ";
    wp_add_inline_style('google-fonts', $custom_css);
}

add_action('wp_enqueue_scripts', 'bloodborne_fonts');

function bloodborne_files() {
    wp_enqueue_script('custom-search', get_template_directory_uri() . '/src/modules/search.js', array('jquery'), null, true);
    wp_localize_script('custom-search', 'search_params', array('ajaxurl' => admin_url('admin-ajax.php')));
    wp_enqueue_style('bloodborne-style', get_theme_file_uri('/build/style-index.css'));
    wp_enqueue_style('bloodborne-extra-style', get_theme_file_uri('/build/index.css'));
    wp_enqueue_script('bloodborne-js', get_theme_file_uri('/build/index.js'), array('jquery'), '1.0', true);
    wp_enqueue_script('bloodborne-slide-js', get_theme_file_uri('/src/modules/slide.js'), array('jquery'), '1.0', true);
    wp_enqueue_script('bloodborne-customizer-js', get_theme_file_uri('/src/modules/customizer.js'), array('jquery'), '1.0', true);
    wp_enqueue_script('custom-mobile-header', get_template_directory_uri() . '/src/modules/mobile-header.js', array('jquery'), null, true);
    wp_enqueue_script('hunter-loadout', get_template_directory_uri() . '/src/modules/hunter-loadout.js', array('jquery'), null, true);
}

add_action('wp_enqueue_scripts', 'bloodborne_files');

function bloodborne_setup() {
    add_theme_support('title-tag');
    add_theme_support('custom-logo');
    add_theme_support('post-thumbnails');
    register_nav_menus(array(
        'main-menu'        => __('Main Menu'),
        'main-menu-footer' => __('Footer Menu')
    ));
    add_theme_support('widgets');
    add_image_size('landscape', 400, 260, true);
    add_image_size('portrait', 480, 1000, true);
}

add_action('after_setup_theme', 'bloodborne_setup');

// Enqueue WordPress color picker script and style in the admin panel
function enqueue_wp_color_picker() {
    // Enqueue the color picker CSS and JS
    wp_enqueue_style('wp-color-picker');
    wp_enqueue_script('wp-color-picker');

    // Initialize the color picker with a script
    wp_add_inline_script('wp-color-picker', '
        jQuery(document).ready(function($) {
            $(".color-picker").wpColorPicker();
        });
    ');
}

add_action('admin_enqueue_scripts', 'enqueue_wp_color_picker');

function custom_ajax_search() {
    if (isset($_POST['search'])) {
        $search_term = sanitize_text_field($_POST['search']);

        // Get all public custom post types, excluding default 'post' and 'page'
        $args = array(
            'public'   => true,    // Only public post types
            '_builtin' => false,   // Exclude built-in post types
        );
        $post_types = get_post_types($args, 'names'); // Get only the names of custom post types

        // Add built-in post types if needed (optional)
        $post_types[] = 'post';  // Add 'post' if you want to include posts
        $post_types[] = 'page';  // Add 'page' if you want to include pages

        // Query arguments to search in titles only
        $query_args = array(
            'post_type'      => $post_types,  // Use dynamically retrieved post types
            'posts_per_page' => -1,    // Limit the number of results
            's'               => $search_term, // Search term
        );

        // The Query
        $query = new WP_Query($query_args);

        if ($query->have_posts()) {
            while ($query->have_posts()) {
                $query->the_post();
?>
                <div class="search-result-item" data-url="<?php the_permalink(); ?>">
                    <h3><?php the_title(); ?></h3>
                </div>
<?php
            }
        } else {
            echo '<div class="search-result-item">No results found</div>';
        }

        wp_reset_postdata();
    }
    die();
}

add_action('wp_ajax_custom_ajax_search', 'custom_ajax_search');
add_action('wp_ajax_nopriv_custom_ajax_search', 'custom_ajax_search');
