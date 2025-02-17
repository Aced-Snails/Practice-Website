<?php get_header(); ?>
<div class="container">
    <article>
        <h1><?php the_title(); ?></h1>
        <div><?php the_content();
               // Get the current weapon post ID
               $weapon_id = get_the_ID();
               
               // Retrieve the ACF scores for firearms and melee weapons
               $melee_weapon_score = get_field('melee_weapon_score', $weapon_id);
               $firearm_score = get_field('firearm_score', $weapon_id);
               
               // Check if the relevant scores exist and display them
               if ($melee_weapon_score || $firearm_score) :
                   ?>
                   <div class="score-container">
                       <?php if ($melee_weapon_score) : ?>
                           <p class="score"><strong>Melee Weapon Score:</strong> <?php echo esc_html($melee_weapon_score); ?></p>
                       <?php endif; ?>
               
                       <?php if ($firearm_score) : ?>
                           <p class="score"><strong>Firearm Score:</strong> <?php echo esc_html($firearm_score); ?></p>
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