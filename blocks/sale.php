<section class='sale'>
  <div class='container'>
    <h2 class="sale__title">Спецпредложения</h2>
    <div class='row'>
<?php
// The Query
$the_query = new WP_Query( 'cat=8' );
// The Loop
if ( $the_query->have_posts() ) {
    while ( $the_query->have_posts() ) {
        $the_query->the_post();
?>
    <div class="col-sm-4">
      <div class="sale__item">
        <div class="sale__img"><?php echo get_the_post_thumbnail(); ?></div>
        <div class="sale__content">
          <div class="sale__date"><?php echo get_the_date(); ?></div>
          <div class="sale__name"><?php echo get_the_title(); ?></div>
          <a href="/akcii-i-specpredlozheniya/" class="btn btn-primary sale__btn">Подробнее</a>
          <!-- <a href="<?php echo the_permalink(); ?>" class="sale__btn">Подробнее</a> -->
        </div>
      </div>
    </div><!-- .col -->
<?php
    }
} else {
    // no posts found
  echo '<p>Спецпредложений нет</p>';
}
/* Restore original Post Data */
wp_reset_postdata();
?>
    </div><!-- .row -->
  </div><!-- .container -->
</section>
