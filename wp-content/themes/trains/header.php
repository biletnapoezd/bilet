<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>

</head>
<body>
 <header class="header">
    <div class="wrapper">
    <div class="container">
     <div class="tagline">
        <div class="tagline__logo">
           <?php
            echo get_custom_logo();
            ?>
        </div>
        <div class="tagline__link-wrapper">
            <a href="#" class="tagline__link"><?= get_bloginfo('name'); ?></a>
        </div>
        <div class="tagline__tag-wrapper">
            <span class="tagline__tag"><?= get_bloginfo('description'); ?></span>
        </div>
     </div>
     </div>
     </div>
     <div class="wrapper grey-bg">
     <div class="container">
     
     <nav class="menu">
        <div class="burger burger-1">
  <input type="checkbox" name="burger1" id="burger1"/>
  <label for="burger1"><span class="bar bar-1"></span><span class="bar bar-2"></span><span class="bar bar-3"></span><span class="txt">Burger</span></label>
</div>
   <div class="menu__wrap">
 
       
						<?php if ( has_nav_menu( 'primary' ) ) : 
							
								
									wp_nav_menu( array(
										'theme_location' => 'primary',
										'menu_class'     => 'menu__items-list',
                                        'link_before'     => '<span class="menu__link-inner">',              // (string) Текст перед анкором (текстом) ссылки
	                                    'link_after'      => '</span>',
                                        
									 ) );
				       endif; ?>
    

         </div>
     </nav>
     
     </div>
     </div>
 </header>