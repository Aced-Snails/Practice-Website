<?php get_header(); ?>
<div class="container">
    <article>
        <h1><?php the_title(); ?></h1>
        <div>
            <?php the_content(); ?>

            <?php
            // Get the current Blood Gem post ID
            $blood_gem_id = get_the_ID();
            
            // Retrieve the ACF score for Blood Gem
            $blood_gem_score = get_field('blood_gem_score', $blood_gem_id);
            
            // Check if the Blood Gem score exists and display it
            if ($blood_gem_score) : // Explicitly checking for false value
            ?>
                <div class="score-container">
                    <p class="score"><strong>Blood Gem Score:</strong> <?php echo esc_html($blood_gem_score); ?></p>
                </div>
            <?php else : ?>
                <p class="no-score">No score available</p>
            <?php endif; 
            ?>
        </div>
    </article>

    <?php if (is_active_sidebar('sidebar-1')) : ?>
        <div id="sidebar" class="widget-area">
            <?php dynamic_sidebar('sidebar-1'); ?>
        </div>
    <?php endif; ?>
</div>

<?php get_footer(); ?>
