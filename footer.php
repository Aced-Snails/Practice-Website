<footer>
    <div class="logo">
        <a href="<?php echo esc_url(home_url()); ?>"><img style="width: 250px;" src="<?php echo esc_url(get_theme_mod('footer_logo')); ?>" alt="<?php bloginfo('name'); ?>"></a>
    </div>
    <nav>
        <?php
        wp_nav_menu(array(
            'theme_location' => 'main-menu-footer',
            'container' => false,
        ));
        ?>
    </nav>
    <div class="disclaimer">
        <?php echo esc_html(get_theme_mod('disclaimer_setting')); ?>
    </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>
