<?php get_header(); ?>

<div class="hero-overall-container">
    <div class="hero-container">
        <h1 class="hero-title" style="color: <?php echo esc_attr(get_theme_mod('hero_title_color_setting', '#ffffff')); ?>;">
            <?php echo esc_html(get_theme_mod('hero_title', 'Hero Title')); ?>
        </h1>

        <h2 class="hero-subtitle" style="color: <?php echo esc_attr(get_theme_mod('hero_subtitle_color_setting', '#ffffff')); ?>;">
            <?php echo esc_html(get_theme_mod('hero_subtitle', 'Hero Subtitle')); ?>
        </h2>
    </div>
</div>

<div class="overall-featured-container">
    <!-- Weapons Section -->
    <div class="weapons-container">
        <h1 class="featured-title-1">
            <?php echo esc_html(get_theme_mod('featured_title_1', 'Featured Title 1')); ?>
        </h1>
        <?php
        $weapons_args = array(
            'post_type'      => 'weapon',
            'posts_per_page' => 2,
            'orderby'        => 'rand',
        );

        $weapons_query = new WP_Query($weapons_args);

        if ($weapons_query->have_posts()) : ?>
            <div class="weapons-grid">
                <?php while ($weapons_query->have_posts()) : $weapons_query->the_post(); ?>
                    <div class="weapon-item">
                        <?php if (has_post_thumbnail()) : ?>
                            <div class="weapon-image">
                                <img src="<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(), 'thumbnail')); ?>" alt="<?php the_title_attribute(); ?>" loading="lazy" />
                            </div>
                        <?php endif; ?>
                        <div class="weapon-content">
                            <h2><?php the_title(); ?></h2>
                            <p><?php echo esc_html(wp_trim_words(get_the_content(), 30)); ?></p>
                            <a href="<?php the_permalink(); ?>">Read More</a>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php else : ?>
            <p>No weapons found.</p>
        <?php endif;
        wp_reset_postdata(); ?>
    </div>

    <!-- Armor Section -->
    <div class="armor-container">
        <h1 class="featured-title-2">
            <?php echo esc_html(get_theme_mod('featured_title_2', 'Featured Title 2')); ?>
        </h1>
        <?php
        $armor_args = array(
            'post_type'      => 'armor',
            'posts_per_page' => 2,
            'orderby'        => 'rand',
        );

        $armor_query = new WP_Query($armor_args);

        if ($armor_query->have_posts()) : ?>
            <div class="armor-grid">
                <?php while ($armor_query->have_posts()) : $armor_query->the_post(); ?>
                    <div class="armor-item">
                        <?php if (has_post_thumbnail()) : ?>
                            <div class="armor-image">
                                <img src="<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(), 'thumbnail')); ?>" alt="<?php the_title_attribute(); ?>" loading="lazy" />
                            </div>
                        <?php endif; ?>
                        <div class="armor-content">
                            <h2><?php the_title(); ?></h2>
                            <p><?php echo esc_html(wp_trim_words(get_the_content(), 30)); ?></p>
                            <a href="<?php the_permalink(); ?>">Read More</a>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php else : ?>
            <p>No armor found.</p>
        <?php endif;
        wp_reset_postdata(); ?>
    </div>
</div>

<!-- Front Page Content -->
<div class="front-page-content-container">
    <div class="front-page-content">
        <h1><?php echo esc_html(get_the_title()); ?></h1>
        <?php the_content(); ?>
    </div>

    <?php if (is_active_sidebar('sidebar-1')) : ?>
        <div id="sidebar" class="widget-area">
            <?php dynamic_sidebar('sidebar-1'); ?>
        </div>
    <?php endif; ?>
</div>

<!-- Locations Section -->
<div class="locations-container-all">
    <h1 class="location-title">
        <?php echo esc_html(get_theme_mod('location_title', 'Location Title')); ?>
    </h1>
    <div class="location-slider">
        <?php
        $location_args = array(
            'post_type'      => 'location',
            'posts_per_page' => -1,
        );

        $location_query = new WP_Query($location_args);

        if ($location_query->have_posts()) :
            while ($location_query->have_posts()) : $location_query->the_post(); ?>
                <div class="location-item">
                    <?php if (has_post_thumbnail()) : ?>
                        <div class="location-image">
                            <img src="<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(), 'medium')); ?>" alt="<?php the_title_attribute(); ?>" loading="lazy" />
                        </div>
                    <?php endif; ?>
                    <div class="location-content">
                        <h2><?php the_title(); ?></h2>
                        <p><?php echo esc_html(wp_trim_words(get_the_content(), 30)); ?></p>
                        <a href="<?php the_permalink(); ?>">Read More</a>
                    </div>
                </div>
            <?php endwhile;
        else : ?>
            <p>No locations found.</p>
        <?php endif;
        wp_reset_postdata(); ?>
    </div>

    <!-- Slider Controls -->
    <div class="slider-controls">
        <button id="prev">Previous</button>
        <button id="next">Next</button>
    </div>
</div>

<?php get_footer(); ?>