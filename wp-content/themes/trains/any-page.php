<?php
/*
Template Name:Простая страница
*/
?>
<?php get_header(); ?>
 <div class="shares">
 <div class="container">
 <?php if(have_posts() ) while( have_posts()) : the_post(); ?>

 <h1 class="shares__page-title"><?php the_title();?></h1>
 <div class="share__all-wrap">
<div class="shares-list">
 <?php the_content();?>

</div>
<?php endwhile; ?>
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