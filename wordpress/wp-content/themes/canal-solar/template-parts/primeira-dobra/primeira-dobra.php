<?php
$args = array(
    'post_type' => 'post',
    'post_status' => 'publish',
    'orderby' => 'date',
    'order' => 'DESC',
    'tax_query' => array(
        'relation' => 'OR',
        array(
            'taxonomy' => 'category',
            'field' => 'slug',
            'terms' => array( 'brasil', 'mundo' ),
        ),
        array(
            'taxonomy' => 'post_tag',
            'field' => 'slug',
            'terms' => array( 'tag1', 'tag2' ),
        ),
    ),
    'posts_per_page' => 4, 
);

$query = new WP_Query( $args );

if ( $query->have_posts() ) {
    echo '<div class="row">';
    // um post do lado esquerdo
    echo '<div class="col-lg-8">';
    $query->the_post();
    echo '<div class="card mb-3">';
    echo '<div class="row g-0">';
    echo '<div class="col-md-4">';
    the_post_thumbnail( 'medium', array( 'class' => 'img-fluid' ) );
    echo '</div>';
    echo '<div class="col-md-8">';
    echo '<div class="card-body">';
    echo '<h5 class="card-title"><a href="' . get_permalink() . '">' . get_the_title() . '</a></h5>';
    echo '<p class="card-text">' . wp_trim_words( get_the_excerpt(), 10 ) . '</p>';
    // echo '<p class="card-text"><small class="text-muted">Posted on ' . get_the_date() . '</small></p>';
    echo '</div>';
    echo '</div>';
    echo '</div>';
    echo '</div>';
    echo '</div>';
    // tres posts do lado direito
    echo '<div class="col-lg-4">';
    echo '<div class="row">';
    for ( $i = 0; $i < 3; $i++ ) {
        $query->the_post();
        echo '<div class="col-md-12 mb-3">';
        echo '<div class="card">';
        echo '<div class="row g-0">';
        echo '<div class="col-md-4">';
        the_post_thumbnail( 'medium', array( 'class' => 'card-img-top' ) );
        echo '</div>';
        echo '<div class="col-md-8">';
        echo '<div class="card-body">';
        echo '<h5 class="card-title"><a href="' . get_permalink() . '">' . get_the_title() . '</a></h5>';
        echo '<p class="card-text">' . wp_trim_words( get_the_excerpt(), 10 ) . '</p>';
        echo '<p class="card-text"><small class="text-muted">Posted on ' . get_the_date() . '</small></p>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
    }
    echo '</div>';
    echo '</div>';
    echo '</div>';

    wp_reset_postdata();
} else {
    echo 'Nenhum artigo encontrado!';
}

//ARTIGOS ABAIXO DOS PRINCIPAIS
$args = array(
    'post_type' => 'post',
    'post_status' => 'publish',
    'orderby' => 'date',
    'order' => 'DESC',
    'tax_query' => array(
        'relation' => 'OR',
        array(
            'taxonomy' => 'category',
            'field' => 'slug',
            'terms' => array( 'brasil', 'mundo' ),
        ),
        array(
            'taxonomy' => 'post_tag',
            'field' => 'slug',
            'terms' => array( 'tag1', 'tag2' ),
        ),
    ),
    'posts_per_page' => 4, 
);

$query = new WP_Query( $args );

if ( $query->have_posts() ) {
    echo '<div class="row">';
    // quatro posts por categoria ou tag
    while ( $query->have_posts() ) {
        $query->the_post();
        echo '<div class="col-md-3 mb-3">';
        echo '<div class="card">';
        echo '<div class="card-body">';
        echo '<h5 class="card-title"><a href="' . get_permalink() . '">' . get_the_title() . '</a></h5>';
        echo '<p class="card-text">' . wp_trim_words( get_the_excerpt(), 10 ) . '</p>';
        echo '<p class="card-text"><small class="text-muted">Posted on ' . get_the_date() . '</small></p>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
    }
    echo '</div>';

    wp_reset_postdata();
} else {
    echo 'Nenhum artigo encontrado!';
}
?>
<div class="row">
  <div class="col-2">
    <h2>DESTAQUES</h2>
  </div>
  <div class="col-10">
    <hr class="divisor">
  </div>
</div>
