<footer class="footer grey-bg">
     <div class="container container__footer-flex">
          <?php
$args = array(
    'posts_per_page' => 1,
	'post_type' => 'generalmain'
);
$query = new WP_Query;
$my_posts = $query->query($args);

foreach( $my_posts as $my_post ){


?>  
        
         <div class="socials">
            <a href="<?php echo  get_post_meta($my_post->ID, 'link1', true) ?>" class="socials__link socials__link-vk"></a>
             <a href="<?php echo  get_post_meta($my_post->ID, 'link2', true) ?>" class="socials__link socials__link-inst"></a>
              <a href="<?php echo  get_post_meta($my_post->ID, 'link3', true) ?>" class="socials__link socials__link-googlePl"></a>
            <a href="<?php echo  get_post_meta($my_post->ID, 'link4', true) ?>" class="socials__link socials__link-fb"></a>
            
         </div>
          
           
              
                <nav class="menu-footer">
               
    						<?php if ( has_nav_menu( 'social' ) ) : 
							
								
									wp_nav_menu( array(
										'theme_location' => 'social',
										'menu_class'     => 'menu-footer__items-list',
                                        'link_before'     => '<span class="menu-footer__link-inner">',              // (string) Текст перед анкором (текстом) ссылки
	                                    'link_after'      => '</span>',
                                        
									 ) );
				       endif; ?>
   
     </nav>  
             
         
         <div class="availables">
             <a href="<?php echo  get_post_meta($my_post->ID, 'link5', true) ?>" class="availables_appstore"></a>
             <a href="<?php echo  get_post_meta($my_post->ID, 'link6', true) ?>" class="availables_ggplay"></a>
         </div>
         <?php } ?>

     </div>
 </footer>
 <?php wp_footer(); ?>
</body>


</html>