<?php get_header(); ?>
<div class="container">
        <article>
            <h1><?php the_title(); ?></h1>
            <div><?php the_content();
            // Get the current armor post ID
               $armor_id = get_the_ID();
               
               // Retrieve the ACF scores for armor scores
               $armor_score = get_field('armor_score', $armor_id);
               
               // Check if the relevant scores exist and display them
               if ($armor_score || $firearm_score) :
                   ?>
                   <div class="score-container">
                       <?php if ($armor_score) : ?>
                           <p class="score"><strong>Armor Score:</strong> <?php echo esc_html($armor_score); ?></p>
                       <?php endif; ?>
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