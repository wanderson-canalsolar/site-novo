<div class="row">
  <div class="col-lg-6">
    <div class="row">
      <?php 
        $args = array(
          'post_type' => 'post',
          'posts_per_page' => 6,
          'tax_query' => array(
            'relation' => 'OR',
            array(
              'taxonomy' => 'category',
              'field'    => 'slug',
              'terms'    => array( 'brasil', 'mundo' ),
            ),
            array(
              'taxonomy' => 'post_tag',
              'field'    => 'slug',
              'terms'    => array( 'tag-slug-1', 'tag-slug-2' ),
            ),
          ),
        );
        $query = new WP_Query($args);
        if($query->have_posts()): while($query->have_posts()): $query->the_post(); 
      ?>
        <div class="col-md-4">
          <div class="card mb-3">
            <div class="row g-0">
              <?php if(has_post_thumbnail()): ?>
                <div class="col-md-12">
                  <a href="<?php the_permalink(); ?>">
                    <?php the_post_thumbnail('medium', array('class' => 'img-fluid rounded-start')); ?>
                  </a>
                </div>
              <?php endif; ?>
              <div class="col-md-12">
                <div class="card-body">
                  <h5 class="card-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                  <p class="card-text"><?php echo wp_trim_words(get_the_excerpt(), 10); ?></p>
                  <p class="card-text"><small class="text-muted"><?php the_date(); ?></small></p>
                </div>
              </div>
            </div>
          </div>
        </div>
      <?php endwhile; endif; wp_reset_postdata(); ?>
    </div>
  </div>
  <div class="col-lg-6">
    <?php 
      $args = array(
        'post_type' => 'post',
        'posts_per_page' => 3,
        'tax_query' => array(
          'relation' => 'OR',
          array(
            'taxonomy' => 'category',
            'field'    => 'slug',
            'terms'    => array( 'mundo', 'brasil' ),
          ),
          array(
            'taxonomy' => 'post_tag',
            'field'    => 'slug',
            'terms'    => array( 'tag-slug-1', 'tag-slug-2' ),
          ),
        ),
      );
      $query = new WP_Query($args);
      if($query->have_posts()): while($query->have_posts()): $query->the_post(); 
    ?>
      <div class="card mb-3">
        <div class="card-body">
          <h5 class="card-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
          <p class="card-text"><?php echo wp_trim_words(get_the_excerpt(), 10); ?></p>
          <p class="card-text"><small class="text-muted"><?php the_category(', '); ?></small></p>
        </div>
      </div>
    <?php endwhile; endif; wp_reset_postdata(); ?>
  </div>
</div>
