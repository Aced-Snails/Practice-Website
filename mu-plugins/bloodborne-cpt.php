<?php

function bloodborne_post_types() {
    // Register Weapon Post Type
    register_post_type('weapon', array(
        'labels' => array(
            'name'               => __('Weapons', 'textdomain'),
            'singular_name'      => __('Weapon', 'textdomain'),
            'add_new_item'       => __('Add New Weapon', 'textdomain'),
            'edit_item'          => __('Edit Weapon', 'textdomain'),
            'all_items'          => __('All Weapons', 'textdomain'),
            'view_item'          => __('View Weapon', 'textdomain'),
            'search_items'       => __('Search Weapons', 'textdomain'),
            'not_found'          => __('No weapons found', 'textdomain'),
            'not_found_in_trash' => __('No weapons found in Trash', 'textdomain'),
            'parent_item_colon'  => '',
            'menu_name'          => __('Weapons', 'textdomain'),
        ),
        'public'            => true,
        'has_archive'       => true,
        'show_in_nav_menus' => true,
        'show_in_rest'      => true,
        'supports'          => array('title', 'editor', 'excerpt', 'thumbnail'),
        'rewrite'           => array('slug' => 'weapons'),
        'menu_icon'         => 'http://bloodborne.local/wp-content/uploads/2025/02/sword-e1739725530190.png', // Custom icon
        'taxonomies'        => array('category', 'post_tag'),
    ));
    

    // Register Armor Post Type
    register_post_type('armor', array(
        'labels' => array(
            'name'          => __('Armor', 'textdomain'),
            'singular_name' => __('Armor', 'textdomain'),
            'add_new_item'  => __('Add New Armor', 'textdomain'),
            'edit_item'     => __('Edit Armor', 'textdomain'),
            'all_items'     => __('All Armor', 'textdomain'),
        ),
        'public'            => true,
        'has_archive'       => true,
        'show_in_nav_menus' => true,
        'show_in_rest'      => true, // Enables Gutenberg & REST API support
        'supports'          => array('title', 'editor', 'excerpt', 'thumbnail'),
        'rewrite'           => array('slug' => 'armor'),
        'menu_icon'         => 'http://bloodborne.local/wp-content/uploads/2025/02/armour-e1739725441288.png',
        'taxonomies'        => array('category', 'post_tag'), // Specify default taxonomies
    ));

    // Register Location Post Type
    register_post_type('location', array(
        'labels' => array(
            'name'          => __('Locations', 'textdomain'),
            'singular_name' => __('Location', 'textdomain'),
            'add_new_item'  => __('Add New Location', 'textdomain'),
            'edit_item'     => __('Edit Location', 'textdomain'),
            'all_items'     => __('All Locations', 'textdomain'),
        ),
        'public'            => true,
        'has_archive'       => true,
        'show_in_nav_menus' => true,
        'show_in_rest'      => true, // Enables Gutenberg & REST API support
        'supports'          => array('title', 'editor', 'excerpt', 'thumbnail'),
        'rewrite'           => array('slug' => 'locations'),
        'menu_icon'         => 'dashicons-location-alt',
        'taxonomies'        => array('category', 'post_tag'), // Specify default taxonomies
    ));

    // Register Caryll Rune Post Type
    register_post_type('caryll-rune', array(
        'labels' => array(
            'name'          => __('Caryll Runes', 'textdomain'),
            'singular_name' => __('Caryll Rune', 'textdomain'),
            'add_new_item'  => __('Add New Caryll Rune', 'textdomain'),
            'edit_item'     => __('Edit Caryll Rune', 'textdomain'),
            'all_items'     => __('All Caryll Runes', 'textdomain'),
        ),
        'public'            => true,
        'has_archive'       => true,
        'show_in_nav_menus' => true,
        'show_in_rest'      => true, // Enables Gutenberg & REST API support
        'supports'          => array('title', 'editor', 'excerpt', 'thumbnail'),
        'rewrite'           => array('slug' => 'caryll-runes'),
        'menu_icon'         => 'http://bloodborne.local/wp-content/uploads/2025/02/caryll-rune.png',
        'taxonomies'        => array('category', 'post_tag'), // Specify default taxonomies
    ));

    // Register Blood Gems Post Type
    register_post_type('blood-gem', array(
        'labels' => array(
            'name'          => __('Blood Gems', 'textdomain'),
            'singular_name' => __('Blood Gem', 'textdomain'),
            'add_new_item'  => __('Add New Blood Gems', 'textdomain'),
            'edit_item'     => __('Edit Blood Gems', 'textdomain'),
            'all_items'     => __('All Blood Gems', 'textdomain'),
        ),
        'public'            => true,
        'has_archive'       => true,
        'show_in_nav_menus' => true,
        'show_in_rest'      => true, // Enables Gutenberg & REST API support
        'supports'          => array('title', 'editor', 'excerpt', 'thumbnail'),
        'rewrite'           => array('slug' => 'blood-gems'),
        'menu_icon'         => 'http://bloodborne.local/wp-content/uploads/2025/02/blood-gem.png',
        'taxonomies'        => array('category', 'post_tag'), // Specify default taxonomies
    ));

    // Register Enemies Post Type
    register_post_type('enemy', array(
        'labels' => array(
            'name'          => __('Enemies', 'textdomain'),
            'singular_name' => __('Blood Gem', 'textdomain'),
            'add_new_item'  => __('Add New Enemies', 'textdomain'),
            'edit_item'     => __('Edit Enemies', 'textdomain'),
            'all_items'     => __('All Enemies', 'textdomain'),
        ),
        'public'            => true,
        'has_archive'       => true,
        'show_in_nav_menus' => true,
        'show_in_rest'      => true, // Enables Gutenberg & REST API support
        'supports'          => array('title', 'editor', 'excerpt', 'thumbnail'),
        'rewrite'           => array('slug' => 'enemies'),
        'menu_icon'         => 'http://bloodborne.local/wp-content/uploads/2025/02/enemies.png',
        'taxonomies'        => array('category', 'post_tag'), // Specify default taxonomies
    ));
}

// Hook into init
add_action('init', 'bloodborne_post_types');

// Register Sidebar Widget
function my_theme_widgets_init() {
    register_sidebar(array(
        'name'          => 'Sidebar 1',
        'id'            => 'sidebar-1',
        'before_widget' => '<div class="widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));
}
add_action('widgets_init', 'my_theme_widgets_init');
