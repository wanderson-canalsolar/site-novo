<div class="row">
    <div class="col-md-8">
        <?php
        // Query one post based on category or tag
        $args = array(
            'post_type' => 'post',
            'posts_per_page' => 1,
            'post_status' => 'publish',
            'tax_query' => array(
                array(
                    'taxonomy' => 'category', // or 'post_tag' if you want to query by tag
                    'field' => 'slug',
                    'terms' => 'your-category-or-tag-slug',
                ),
            ),
        );
        $query = new WP_Query($args);

        // Loop through posts
        while ($query->have_posts()) {
            $query->the_post();
        ?>
            <div class="big-post">
                <div class="post-thumbnail">
                    <?php
                    if (has_post_thumbnail()) {
                        the_post_thumbnail('large');
                    }
                    ?>
                </div>
                <div class="post-title">
                    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                </div>
                <div class="post-meta">
                    <span class="post-date"><?php echo get_the_date(); ?></span>
                    <span class="post-author"><?php echo get_the_author(); ?></span>
                </div>
                <div class="post-excerpt">
                    <?php the_excerpt(); ?>
                </div>
            </div>
        <?php
        }
        wp_reset_postdata();
        ?>
    </div>
    <div class="col-md-4">
        <div class="row">
            <?php
            // Query three posts based on category or tag
            $args = array(
                'post_type' => 'post',
                'posts_per_page' => 3,
                'post_status' => 'publish',
                'tax_query' => array(
                    array(
                        'taxonomy' => 'category', // or 'post_tag' if you want to query by tag
                        'field' => 'slug',
                        'terms' => 'your-category-or-tag-slug',
                    ),
                ),
            );
            $query = new WP_Query($args);

            // Loop through posts
            while ($query->have_posts()) {
                $query->the_post();
            ?>
                <div class="col-md-12">
                    <div class="small-post">
                        <div class="post-thumbnail">
                            <?php
                            if (has_post_thumbnail()) {
                                the_post_thumbnail('medium');
                            }
                            ?>
                        </div>
                        <div class="post-title">
                            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                        </div>
                        <div class="post-meta">
                            <span class="post-date"><?php echo get_the_date(); ?></span>
                            <span class="post-author"><?php echo get_the_author(); ?></span>
                        </div>
                    </div>
                </div>
            <?php
            }
            wp_reset_postdata();
            ?>
        </div>
    </div>
</div>

