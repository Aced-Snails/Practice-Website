<?php get_header(); ?>
<div class="container">
    <article>
        <h1><?php the_title(); ?></h1>
        <div>
            <?php the_content(); ?>

            <?php
            // Get the current Caryll Rune post ID
            $caryll_rune_id = get_the_ID();
            
            // Retrieve the ACF score for Caryll Rune
            $caryll_rune_score = get_field('caryll_rune_score', $caryll_rune_id);
            
            // Check if the Caryll Rune score exists and display it
            if ($caryll_rune_score) :
            ?>
                <div class="score-container">
                    <p class="score"><strong>Rune Score:</strong> <?php echo esc_html($caryll_rune_score); ?></p>
                </div>
            <?php else : ?>
                <p class="no-score">No score available</p>
            <?php endif; ?>
        </div>
    </article>

    <?php if (is_active_sidebar('sidebar-1')) : ?>
        <div id="sidebar" class="widget-area">
            <?php dynamic_sidebar('sidebar-1'); ?>
        </div>
    <?php endif; ?>
</div>

<?php get_footer(); ?>
