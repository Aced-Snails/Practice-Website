<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php
        $site_title = get_theme_mod('custom_site_title', get_bloginfo('name'));
        $site_tagline = get_theme_mod('custom_tagline', get_bloginfo('description'));

        if (!empty($site_title) && !empty($site_tagline)) {
            echo esc_html($site_title) . ' | ' . esc_html($site_tagline);
        } elseif (!empty($site_title)) {
            echo esc_html($site_title);
        }
        ?>
    </title>
    <?php wp_head(); ?>
    <?php
    $site_favicon = get_theme_mod('site_favicon');
    if ($site_favicon) : ?>
        <link rel="icon" href="<?php echo esc_url($site_favicon); ?>" type="image/png">
    <?php endif; ?>
</head>

<body <?php body_class(); ?>>
    <header>
        <div class="logo">
            <?php if (get_theme_mod('header_logo')) : ?>
                <a href="<?php echo esc_url(home_url()); ?>">
                    <img style="width: 250px;" src="<?php echo esc_url(get_theme_mod('header_logo')); ?>" alt="<?php bloginfo('name'); ?>">
                </a>
            <?php endif; ?>
        </div>

        <div class="nav-container">
            <!-- Hamburger Icon -->
            <div class="hamburger" id="hamburger-icon">
                <div></div>
                <div></div>
                <div></div>
            </div>

            <!-- Navigation Menu -->
            <nav>
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'main-menu',
                    'container'      => false,
                    'menu_class'     => 'main-menu',
                    'depth'           => 5, // Allow submenus
                ));
                ?>
            </nav>
        </div>
        <!-- Search Container -->
        <div class="search-container">
            <input type="text" id="search-input" placeholder="Search...">
            <div class="search-overlay">
                <div id="search-results">
                    <!-- Loading spinner or results will be here -->
                </div>
            </div>
        </div>
    </header>