<?php get_header(); ?>
 <section class="search">
 <div class="container">
 <div class="search__bg-wrap">
  <img src="<?php echo esc_url(get_template_directory_uri()); ?>/img/search_bg.jpg" alt="train" class="search__bg"> 
  
  <form class="search__form__main">  	<script src="//c45.travelpayouts.com/content?promo_id=1357&shmarker=170131" charset="utf-8" async></script>
  </form>  
  </div>
  </div>
 </section>
 <section class="slider-block">
    <div class="container">
    <div class="slider-block__left-wrap">
        <?php
$args = array(
    'posts_per_page' => 1,
	'post_type' => 'mainleft'
);
$query = new WP_Query;
$my_posts = $query->query($args);

foreach( $my_posts as $my_post ){


?>
   <?php echo get_the_post_thumbnail( $my_post->ID, 'thumbnail', array('class' => 'slider-block__left-img')); ?>
    </div>
    <?php } ?>
    <div class="slider-block__right-slider">

    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
   
<?php
$args = array(
    'posts_per_page' => 3,
	'post_type' => 'slider',
    'order'       => 'ASC',
);
$query = new WP_Query;
$my_posts = $query->query($args);
 $l = 0;
foreach( $my_posts as $my_post ){


?>
   fdsfsdfdsfsdf
    <div class="item <?php if($l == 0){echo 'active';} ?>">
                <div class="slider-block__slider-item">
    
    <?php echo get_the_post_thumbnail( $my_post->ID, 'thumbnail', array('class' => 'slider-block__slider-img')); ?>
    <div class="slider-block__slider-description">
    <h2 class="slider-block__slider-title"><?php echo  $my_post->post_title ; ?></h2>
    <span class="slider-block__slider-info"><?php echo  get_post_meta($my_post->ID, '1info', true) ?></span>
    <span class="slider-block__slider-info"><?php echo  get_post_meta($my_post->ID, '2info', true) ?></span>
    </div>
    </div>
    </div>
    
    
<?php
$l++;
} ?>

  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
    
    

    </div>
    </div>
 </section>
 <section class="service" data-parallax="scroll" data-image-src="<?php echo  esc_url(get_template_directory_uri()); ?>/img/service-bg.jpg">
       <h2 class="all-title">СЕРВИСЫ ДЛЯ ПУТЕШЕСТВЕННИКОВ</h2>
        <div class="container">
   <?php
$args = array(
    'posts_per_page' => 4,
	'post_type' => 'services',
    'order'       => 'ASC',
);
$query = new WP_Query;
$my_posts = $query->query($args);
 $i = 0;
foreach( $my_posts as $my_post ){


?>     
        <a href="<?php echo  get_post_meta($my_post->ID, 'servicelink', true) ?>" class="service__block <?php if($i == 0){echo 'service__block-time';}if($i == 1){echo  'service__block-reg';}if($i == 2){echo  'service__block-return';}?>">
            <h3 class="service__service-title"><?php echo  $my_post->post_title ; ?></h3>
            <p class="service__service-info"><?php echo  $my_post->post_content ; ?></p>
        </a>

<?php 
$i++;
} ?>
 
        </div>
    </section>

 <section class="directions">
   <h2 class="all-title">ПОПУЛЯРНЫЕ НАПРАВЛЕНИЯ</h2>
    <div class="container">
       
    <?php
$args = array(
    'posts_per_page' => 6,
	'post_type' => 'directions'
);
$query = new WP_Query;
$my_posts = $query->query($args);

foreach( $my_posts as $my_post ){


?>
        <div class="directions__block">
        <label class="directions__name" for=""><?php echo  get_post_meta($my_post->ID, 'direction1', true) ?><span class="directions__name-defis">-</span><?php echo  get_post_meta($my_post->ID, 'direction2', true) ?></label>
        <div class="direction__wrap">
       <?php echo get_the_post_thumbnail( $my_post->ID, 'thumbnail', array('class' => ' direction__img')); ?>
           <div class="direction__info-wrap">
            <p class="direction__info-text">
                <span class="direction__info"><?php echo  $my_post->post_content ; ?></span>
                
            </p>
            <a href="" class="direction__buy-link">Купить билет</a>
            </div>
            
        </div>
    </div>
    <?php } ?>

        
    </div> 
 </section>
 
<?php get_footer(); ?>