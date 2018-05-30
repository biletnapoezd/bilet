<?php get_header(); ?>
 <div class="shares">
 <div class="container">
 <?php
    $idObj = get_category_by_slug( 'services' );
    $id=$idObj->term_id;

    ?>
 <h2 class="shares__page-title"><?= get_cat_name( $id );?></h2>
 <div class="share__all-wrap">
<div class="shares-list">
<?php
    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
    $args = array(
    'cat' => $id,
    'order' => ASC,
    'paged'=>1,
    'orderby' => 'modifed',
    'paged' => $paged
    );
    $query = new WP_Query( $args );
    while ( $query->have_posts() ){
        $query->the_post()
    ?>
    <div class="share">
  <div class="share__img-wrap">
    <?php the_post_thumbnail( array('class' => ' share__img')); ?>
  </div>
  <div class="share__info-wrap">
      <a href="<?= get_permalink(); ?>" class="share__title"><?php the_title(); ?></a>
      <?php  echo '<p class="share__descr">' . get_the_excerpt() . '</p>' ?>
  </div>
</div>

<?php
  
    
}
wp_reset_postdata();

 ?>

</div>
<aside class="banner">
    <?php
$args = array(
    'posts_per_page' => 6,
	'post_type' => 'banner'
);
$query = new WP_Query;
$my_posts = $query->query($args);

foreach( $my_posts as $my_post ){


?>
<?php echo get_the_post_thumbnail( $my_post->ID, 'thumbnail', array('class' => 'banner__img')); ?>
<div class="banner__info">
<h2 class="banner__title"><?php echo  $my_post->post_title ; ?></h2>
<ul class="banner__features">
<li class="banner__feature"><?php echo  get_post_meta($my_post->ID, 'bannerinfo1', true) ?></li>
<li class="banner__feature"><?php echo  get_post_meta($my_post->ID, 'bannerinfo2', true) ?></li>
<li class="banner__feature"><?php echo  get_post_meta($my_post->ID, 'bannerinfo3', true) ?></li>
</ul>
</div>
<?php } ?>

</aside>
    
     </div>
     <?php kama_pagenavi(); ?>
 </div>   
 </div>
 
<?php get_footer(); ?>