<!doctype html>
<html <?php language_attributes(); ?>>

<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php wp_head(); ?>
</head>

<body>

<div class="container-fluid">
  <div class="row" style="height: 30px;">
    <div class="col-4">
      <a href="#">Link</a>
    </div>
    <div class="col-4">
      <span><?php echo date('F j, Y'); ?></span>
    </div>
    <div class="col-4 d-flex justify-content-end">
      <a href="#"><i class="fab fa-facebook"></i></a>
      <a href="#"><i class="fab fa-linkedin"></i></a>
      <a href="#"><i class="fab fa-youtube"></i></a>
      <a href="#"><i class="fab fa-instagram"></i></a>
      <a href="#"><i class="fab fa-spotify"></i></a>
    </div>
  </div>
</div>

<nav class="navbar navbar-expand-md navbar-light bg-light">
    <div class="row one">
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
                  

                  </div>

                  <form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                <label>
                  <span class="screen-reader-text"><?php echo _x( 'Search for:', 'label', 'textdomain' ); ?></span>
                  <div class="search-box">
                    <input type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Search...', 'placeholder', 'textdomain' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
                    <button type="submit" class="search-submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                  </div>
                </label>
              </form>

    </div>

<div class="row two">

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

      </div>
</div>

  </nav>
<hr class="divisor">