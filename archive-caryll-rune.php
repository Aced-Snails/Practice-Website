<?php get_header(); ?>
<div class="archive-container">

    <!-- Loop Through Categories -->
    <?php
    $categories = get_categories(); // Retrieve all categories

    if (!empty($categories)) : // Check if there are categories
        $count = 0; // Counter to track columns
        echo '<div class="category-row">'; // Start first row with a flexbox container
        
        foreach ($categories as $category) :
            // Query for posts in each category
            $args = array(
                'post_type'      => 'caryll-rune', // Query the 'caryll-rune' custom post type
                'posts_per_page' => 10, // Limit number of posts per page
                'paged'          => max(1, get_query_var('paged', 1)), // Handle pagination
                'tax_query'      => array(
                    array(
                        'taxonomy' => 'category', // If 'caryll-rune' has a different taxonomy, change this
                        'field'    => 'slug',
                        'terms'    => $category->slug, // Use the category slug dynamically
                    ),
                ),
            );
            $category_query = new WP_Query($args);

            if ($category_query->have_posts()) :
                if ($count > 0 && $count % 4 == 0) {
                    echo '</div><div class="category-row">'; // Close previous row and start new one
                }
                ?>

                <div class="archive-inner-container">
                    <h1><?php echo esc_html($category->name); ?></h1> <!-- Category Title -->
                    <?php while ($category_query->have_posts()) : $category_query->the_post(); ?>
                        <article>
                            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                        </article>
                        <hr class="section-break">
                    <?php endwhile; ?>
                    <!-- Pagination for this category -->
                    <div class="pagination">
                        <?php
                        echo paginate_links(array(
                            'total'     => $category_query->max_num_pages, // Total pages for the current category query
                            'prev_text' => '« Previous',
                            'next_text' => 'Next »',
                        ));
                        ?>
                    </div>
                </div> <!-- Close .archive-inner-container -->

        <?php
                wp_reset_postdata(); // Reset the post data after each category query
                $count++;
            endif;
        endforeach;
        echo '</div>'; // Close last row
    else :
        echo '<p>No categories found.</p>';
    endif;
    ?>
</div>
<?php get_footer(); ?>
