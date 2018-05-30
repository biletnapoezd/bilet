<div class="share-one_block">
<div class="share-one__info"><?php the_content(); ?>
</div>
<div class="sell-block">
<a href="#" class="share-one__buy-button">Купить билет</a>
<div class="socials">
                     <?php
$args = array(
    'posts_per_page' => 1,
	'post_type' => 'generalmain'
);
$query = new WP_Query;
$my_posts = $query->query($args);

foreach( $my_posts as $my_post ){


?>  
        
            <a href="<?php echo  get_post_meta($my_post->ID, 'link1', true) ?>" class="socials__link socials__link-vk"></a>
             <a href="<?php echo  get_post_meta($my_post->ID, 'link2', true) ?>" class="socials__link socials__link-inst"></a>
              <a href="<?php echo  get_post_meta($my_post->ID, 'link3', true) ?>" class="socials__link socials__link-googlePl"></a>
            <a href="<?php echo  get_post_meta($my_post->ID, 'link4', true) ?>" class="socials__link socials__link-fb"></a>
            <?php } ?>
            
         </div>
</div>
<div class="photo-block">
<?php the_post_thumbnail(array('class' => ' photo-block__img')); ?>
<p class="slogan">
<span class="slogan__text">
<?php  echo get_post_meta(get_the_ID(),'slogan', true) ?>
</span>
</p>
</div>
</div>