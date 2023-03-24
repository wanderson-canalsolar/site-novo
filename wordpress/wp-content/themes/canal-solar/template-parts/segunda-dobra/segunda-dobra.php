<div class="row">
  <div class="col-2">
    <h2>DESTAQUES</h2>
  </div>
  <div class="col-10">
    <hr class="divisor">
  </div>
</div>
<div class="container">
  <div class="row">
    <div class="col-lg-8">
      <div class="row">
        <?php
          // Display posts by category
          $args = array(
            'posts_per_page' => 6,
            'post_type' => 'post',
            'category_name' => 'brasil'
          );
          
          // Display posts by tag
          /*
          $args = array(
            'posts_per_page' => 6,
            'post_type' => 'post',
            'tag' => 'your-tag-slug'
          );
          */
          
          $query = new WP_Query($args);
          if ($query->have_posts()) :
            while ($query->have_posts()) : $query->the_post();
        ?>
        <div class="col-lg-6 mb-4">
          <div class="card h-100">
            <div class="card-body">
              <div class="row">
                <div class="col-md-4">
                  <?php if (has_post_thumbnail()) : ?>
                    <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('medium', ['class' => 'img-fluid']); ?></a>
                  <?php endif; ?>
                </div>
                <div class="col-md-8">
                  <h2 class="card-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                  <p class="card-text"><?php echo wp_trim_words(get_the_excerpt(), 10); ?></p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php
            endwhile;
            wp_reset_postdata();
          endif;
        ?>
      </div>
    </div>
    <div class="col-lg-4">
      <?php
        // Display posts by category
        $args = array(
          'posts_per_page' => 1,
          'post_type' => 'post',
          'category_name' => 'mundo'
        );
        
        // Display posts by tag
        /*
        $args = array(
          'posts_per_page' => 1,
          'post_type' => 'post',
          'tag' => 'your-tag-slug'
        );
        */
        
        $query = new WP_Query($args);
        if ($query->have_posts()) :
          while ($query->have_posts()) : $query->the_post();
      ?>
      <div class="card mb-4">
        <div class="card-body">
          <?php if (has_post_thumbnail()) : ?>
            <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('large', ['class' => 'img-fluid mb-3']); ?></a>
          <?php endif; ?>
          <h2 class="card-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
          <p class="card-text"><?php echo wp_trim_words(get_the_excerpt(), 10); ?></p>
        </div>
      </div>
      <?php
          endwhile;
          wp_reset_postdata();
        endif;
      ?>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-2">
    <h2>NOTÍCIAS</h2>
  </div>
  <div class="col-10">
    <hr class="divisor">
  </div>
</div>