 <?php get_header(); ?>
 <div class="share-one">
 <div class="container">
 <?php if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs(); ?>
 <h2 class="share-one__page-title"><?php the_title(); ?></h2>
 </div>
 <div class="container">
 <div class="share-one__all-wrap">
<?php
     while( have_posts()) : the_post();
     get_template_part('template-parts/content', get_post_format());
     endwhile;
 ?>

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
</div><script src="//c45.travelpayouts.com/content?promo_id=1355&shmarker=170131" charset="utf-8" async></script>
<?php } ?>

</aside>
     </div>
 </div>   
 </div>
<?php get_footer(); ?>