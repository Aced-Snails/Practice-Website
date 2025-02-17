<?php get_header(); ?>
<div class="container">
        <article>
            <h1><?php the_title(); ?></h1>
            <div><?php the_content(); ?></div>
        </article>
        <?php if (is_active_sidebar('sidebar-1')) : ?>
        <div id="sidebar" class="widget-area">
            <?php dynamic_sidebar('sidebar-1'); ?>
        </div>
    <?php endif; ?>
</div>
<?php get_footer(); ?>