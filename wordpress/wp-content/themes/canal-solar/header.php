<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php wp_head(); ?>
</head>

<body>
  <nav class="navbar navbar-expand-md navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>">
        <?php
          $logo = get_theme_mod( 'custom_logo' );
          if ($logo) {
            echo wp_get_attachment_image( $logo, 'full', false, array(
              'class'    => 'img-fluid',
              'alt'      => get_bloginfo( 'name' ),
            ) );
          } else {
            echo get_bloginfo( 'name' );
          }
        ?>
      </a>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="main-menu">
        <?php
        wp_nav_menu(array(
          'theme_location'  => 'main-menu',
          'container'       => false,
          'menu_class'      => 'primary',
          'fallback_cb'     => '__return_false',
          'items_wrap'      => '<ul id="%1$s" class="navbar-nav me-auto mb-2 mb-md-0 %2$s">%3$s</ul>',
          'depth'           => 2,
          'walker'          => new bootstrap_5_wp_nav_menu_walker()
        ));
        ?>

        <form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
          <label>
            <span class="screen-reader-text"><?php echo _x( 'Search for:', 'label', 'textdomain' ); ?></span>
            <input type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Search...', 'placeholder', 'textdomain' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
          </label>
          <button type="submit" class="search-submit"><?php echo esc_html_x( 'Search', 'submit button', 'textdomain' ); ?></button>
        </form>
      </div>
    </div>
  </nav>
