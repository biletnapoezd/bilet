<?php
if ( ! function_exists( 'train_setup' ) ) :
function remove_admin_login_header() {
    remove_action('wp_head', '_admin_bar_bump_cb');
}
add_action('get_header', 'remove_admin_login_header');
add_theme_support( 'custom-logo' );
function add_specific_menu_location_atts( $atts, $item, $args ) {
    // check if the item is in the primary menu
    if( $args->theme_location == 'primary' ) {
      // add the desired attributes:
      $atts['class'] = 'menu__link';
    }
        if( $args->theme_location == 'social' ) {
      // add the desired attributes:
      $atts['class'] = 'menu-footer__link';
    }
    return $atts;
}
add_filter( 'nav_menu_link_attributes', 'add_specific_menu_location_atts', 10, 3 );
function atg_menu_classes($classes, $item, $args) {
  if($args->theme_location == 'primary') {
    $classes[] = 'menu__item';
  }
    if($args->theme_location == 'social') {
    $classes[] = 'menu-footer__item';
  }  
  return $classes;
}
add_filter('nav_menu_css_class', 'atg_menu_classes', 1, 3);
function train_setup() {

	load_theme_textdomain( 'train' );

	add_theme_support( 'title-tag' );

	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 1200, 9999 );
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'train' ),
		'social'  => __( 'Social Links Menu', 'train' ),
	) );

	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
		'gallery',
		'status',
		'audio',
		'chat',
	) );
}
endif; 
add_action( 'after_setup_theme', 'train_setup' );
function train_scripts() {
	// Theme stylesheet.
	wp_enqueue_style( 'train-style', get_stylesheet_uri() );

	wp_enqueue_style( 'train-bootstrap', get_template_directory_uri() . '/libs/bootstrap/css/bootstrap.min.css', array() );
    wp_enqueue_style( 'train-variables', get_template_directory_uri() . '/css/variables.css', array() );
    wp_enqueue_style( 'train-main', get_template_directory_uri() . '/css/main.css', array() );
    wp_enqueue_style( 'train-responsive', get_template_directory_uri() . '/css/responsive.css', array() );
    wp_enqueue_script( 'jquerry-js', get_template_directory_uri() . '/js/jquery-3.3.1.min.js', array(), null, true );
    wp_enqueue_script( 'paralax-js', get_template_directory_uri() . '/js/parallax.min.js', array(), null, true );
    wp_enqueue_script( 'train-bootstrap-js', get_template_directory_uri() . '/libs/bootstrap/js/bootstrap.min.js', array(), null, true );
    wp_enqueue_script( 'script-js', get_template_directory_uri() . '/js/script.js', array(), null, true );
}
add_action( 'wp_enqueue_scripts', 'train_scripts' );
add_action('wp_enqueue_scripts', 'my_register_javascript', 100);
function my_register_javascript() {
  wp_register_script('mediaelement', plugins_url('wp-mediaelement.min.js', __FILE__), array('jquery'), '4.8.2', true);
  wp_enqueue_script('mediaelement');
}
add_action( 'init', 'true_register_generalmain' );
add_action( 'init', 'true_register_slider' ); // Использовать функцию только внутри хука init
add_action( 'init', 'true_register_mainleft' );
add_action( 'init', 'true_register_banner' );
add_action( 'init', 'true_register_services' );
add_action( 'init', 'true_register_directions' );


function true_register_services() {
	$labels = array(
		'name' => 'Сервисы',
		'singular_name' => 'Сервис', // админ панель Добавить->Функцию
		'add_new' => 'Добавить Сервис',
		'add_new_item' => 'Добавить Сервис', // заголовок тега <title>
		'edit_item' => 'Редактировать  Сервис',
		'new_item' => 'Новій  Сервис',
		'all_items' => 'Все  Сервисы',
		'view_item' => 'Просмотр  Сервисов',
		'search_items' => 'Искать  Сервис',
		'not_found' =>  'Сервис не найдено.',
		'not_found_in_trash' => 'Сервис не найдено.',
		'menu_name' => 'Сервисы' // ссылка в меню в админке
	);
	$args = array(
		'labels' => $labels,
		'public' => true, // благодаря этому некоторые параметры можно пропустить
		'menu_icon' => 'dashicons-images-alt2', // иконка корзины
		'menu_position' => 3,
		'has_archive' => true,
		'supports' => array( 'title', 'thumbnail', 'editor', 'excerpt'),
		'taxonomies' => array('post_tag')
	);
	register_post_type('services',$args);
} 
function true_register_mainleft() {
	$labels = array(
		'name' => 'Блок слева',
		'singular_name' => 'Блок', // админ панель Добавить->Функцию
		'add_new' => 'Добавить Блок',
		'add_new_item' => 'Добавить Блок', // заголовок тега <title>
		'edit_item' => 'Редактировать  Блок',
		'new_item' => 'Новій  Блок',
		'all_items' => 'Все  Блоки',
		'view_item' => 'Просмотр  Блоков',
		'search_items' => 'Искать  Блок',
		'not_found' =>  ' Блок не найдено.',
		'not_found_in_trash' => ' Блок не найдено.',
		'menu_name' => 'Блок слева' // ссылка в меню в админке
	);
	$args = array(
		'labels' => $labels,
		'public' => true, // благодаря этому некоторые параметры можно пропустить
		'menu_icon' => 'dashicons-admin-customizer', // иконка корзины
		'menu_position' => 3,
		'has_archive' => true,
		'supports' => array( 'title', 'thumbnail'),
		'taxonomies' => array('post_tag')
	);
	register_post_type('mainleft',$args);
} 
function true_register_generalmain() {
	$labels = array(
		'name' => 'generalmain',
		'singular_name' => 'Основные настройки', // админ панель Добавить->Функцию
		'add_new' => 'Добавить Настройку',
		'add_new_item' => 'Добавить новую Настройку', // заголовок тега <title>
		'edit_item' => 'Редактировать Настройку',
		'new_item' => 'Новая Настройка',
		'all_items' => 'Все Настройки',
		'view_item' => 'Просмотр Настроек на сайте',
		'search_items' => 'Искать Настройку',
		'not_found' =>  'Настроек не найдено.',
		'not_found_in_trash' => 'Настроек не найдено.',
		'menu_name' => 'Настройки Общие' // ссылка в меню в админке
	);
	$args = array(
		'labels' => $labels,
		'public' => true, // благодаря этому некоторые параметры можно пропустить
		'menu_icon' => 'dashicons-admin-network', // иконка корзины
		'menu_position' => 3,
		'has_archive' => true,
		'supports' => array( 'title', 'thumbnail'),
		'taxonomies' => array('post_tag')
	);
	register_post_type('generalmain',$args);
}  
function true_register_directions() {
	$labels = array(
		'name' => 'directions',
		'singular_name' => 'Направление', // админ панель Добавить->Функцию
		'add_new' => 'Добавить Направление',
		'add_new_item' => 'Добавить новое Направление', // заголовок тега <title>
		'edit_item' => 'Редактировать Направление',
		'new_item' => 'Новое Направление',
		'all_items' => 'Все Направления',
		'view_item' => 'Просмотр направлений на сайте',
		'search_items' => 'Искать Направления',
		'not_found' =>  'Направлений не найдено.',
		'not_found_in_trash' => 'Направлений не найдено.',
		'menu_name' => 'Направления' // ссылка в меню в админке
	);
	$args = array(
		'labels' => $labels,
		'public' => true, // благодаря этому некоторые параметры можно пропустить
		'menu_icon' => 'dashicons-clipboard', // иконка корзины
		'menu_position' => 3,
		'has_archive' => true,
		'supports' => array( 'title', 'thumbnail', 'editor', 'excerpt'),
		'taxonomies' => array('post_tag')
	);
	register_post_type('directions',$args);
}    
function true_register_slider() {
	$labels = array(
		'name' => 'slider',
		'singular_name' => 'Слайд', // админ панель Добавить->Функцию
		'add_new' => 'Добавить Слайд',
		'add_new_item' => 'Добавить новый Слайд', // заголовок тега <title>
		'edit_item' => 'Редактировать Слайд',
		'new_item' => 'Новый Слайд',
		'all_items' => 'Все Слайды',
		'view_item' => 'Просмотр слайдов на сайте',
		'search_items' => 'Искать Слайды',
		'not_found' =>  'Слайдов не найдено.',
		'not_found_in_trash' => 'Не найдено слайдов.',
		'menu_name' => 'Слайдер' // ссылка в меню в админке
	);
	$args = array(
		'labels' => $labels,
		'public' => true, // благодаря этому некоторые параметры можно пропустить
		'menu_icon' => 'dashicons-admin-appearance', // иконка корзины
		'menu_position' => 3,
		'has_archive' => true,
		'supports' => array( 'title', 'thumbnail'),
		'taxonomies' => array('post_tag')
	);
	register_post_type('slider',$args);
}
function true_register_banner() {
	$labels = array(
		'name' => 'Баннер',
		'singular_name' => 'Баннер', // админ панель Добавить->Функцию
		'add_new' => 'Добавить Баннер',
		'add_new_item' => 'Добавить новый Баннер', // заголовок тега <title>
		'edit_item' => 'Редактировать Баннер',
		'new_item' => 'Новый Баннер',
		'all_items' => 'Все Баннера',
		'view_item' => 'Просмотр баннеров на сайте',
		'search_items' => 'Искать Баннера',
		'not_found' =>  'Баннеров не найдено.',
		'not_found_in_trash' => 'Не найдено Баннеров.',
		'menu_name' => 'Баннер' // ссылка в меню в админке
	);
	$args = array(
		'labels' => $labels,
		'public' => true, // благодаря этому некоторые параметры можно пропустить
		'menu_icon' => 'dashicons-format-image', // иконка корзины
		'menu_position' => 3,
		'has_archive' => true,
		'supports' => array( 'title', 'thumbnail'),
		'taxonomies' => array('post_tag')
	);
	register_post_type('banner',$args);
}

function true_unset_image_sizes( $sizes) {
    unset( $sizes['thumbnail']); // миниатюра
    unset( $sizes['medium']); // средний
    unset( $sizes['large']); // большой
    return $sizes;
}
 
add_filter('intermediate_image_sizes_advanced', 'true_unset_image_sizes');





function true_meta_boxes() {
	add_meta_box('truediv', 'Настройки', 'true_print_box', 'directions', 'normal', 'high');
}
 
add_action( 'admin_menu', 'true_meta_boxes' );
/*
 * также можно использовать и другие хуки:
 * add_action( 'add_meta_boxes', 'tr_meta_boxes' );
 * если версия WordPress ниже 3.0, то
 * add_action( 'admin_init', 'tr_meta_boxes', 1 );
 */
 
/*
 * Этап 2. Заполнение
 */
function true_print_box($post) {
	wp_nonce_field( basename( __FILE__ ), 'seo_metabox_nonce' );
	/*
	 * добавляем текстовое поле
	 */
	$html .= '<label>Откуда <input style="margin-left:10px;margin-right:10px;" type="text" name="direction1" value="' . get_post_meta($post->ID, 'direction1',true) . '" /></label> ';
    $html .= '<label>Куда <input style="margin-left:10px;margin-right:10px;" type="text" name="direction2" value="' . get_post_meta($post->ID, 'direction2',true) . '" /></label> ';
	/*
	 * добавляем чекбокс
	 */
	
 
	echo $html;
}
 
/*
 * Этап 3. Сохранение
 */
function true_save_box_data ( $post_id ) {
	// проверяем, пришёл ли запрос со страницы с метабоксом
	if ( !isset( $_POST['seo_metabox_nonce'] )
	|| !wp_verify_nonce( $_POST['seo_metabox_nonce'], basename( __FILE__ ) ) )
        return $post_id;
	// проверяем, является ли запрос автосохранением
	if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) 
		return $post_id;
	// проверяем, права пользователя, может ли он редактировать записи
	if ( !current_user_can( 'edit_post', $post_id ) )
		return $post_id;
	// теперь также проверим тип записи	
	$post = get_post($post_id);
	if ($post->post_type == 'directions') { // укажите собственный
		update_post_meta($post_id, 'direction1', esc_attr($_POST['direction1']));
        update_post_meta($post_id, 'direction2', esc_attr($_POST['direction2']));
	}
	return $post_id;
}
 
add_action('save_post', 'true_save_box_data');




function true2_meta_boxes() {
	add_meta_box('truediv', 'Настройки', 'true2_print_box', 'slider', 'normal', 'high');
}
 
add_action( 'admin_menu', 'true2_meta_boxes' );
/*
 * также можно использовать и другие хуки:
 * add_action( 'add_meta_boxes', 'tr_meta_boxes' );
 * если версия WordPress ниже 3.0, то
 * add_action( 'admin_init', 'tr_meta_boxes', 1 );
 */
 
/*
 * Этап 2. Заполнение
 */
function true2_print_box($post) {
	wp_nonce_field( basename( __FILE__ ), 'seo_metabox_nonce' );
	/*
	 * добавляем текстовое поле
	 */
	$html .= '<label>Первый блок слайдера<input style="margin-left:10px;margin-right:10px;" type="text" name="1info" value="' . get_post_meta($post->ID, '1info',true) . '" /></label> ';
    $html .= '<label>Второй блок слайдера<input style="margin-left:10px;margin-right:10px;" type="text" name="2info" value="' . get_post_meta($post->ID, '2info',true) . '" /></label> ';
	/*
	 * добавляем чекбокс
	 */
	
 
	echo $html;
}
 
/*
 * Этап 3. Сохранение
 */
function true2_save_box_data ( $post_id ) {
	// проверяем, пришёл ли запрос со страницы с метабоксом
	if ( !isset( $_POST['seo_metabox_nonce'] )
	|| !wp_verify_nonce( $_POST['seo_metabox_nonce'], basename( __FILE__ ) ) )
        return $post_id;
	// проверяем, является ли запрос автосохранением
	if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) 
		return $post_id;
	// проверяем, права пользователя, может ли он редактировать записи
	if ( !current_user_can( 'edit_post', $post_id ) )
		return $post_id;
	// теперь также проверим тип записи	
	$post = get_post($post_id);
	if ($post->post_type == 'slider') { // укажите собственный
		update_post_meta($post_id, '1info', esc_attr($_POST['1info']));
        update_post_meta($post_id, '2info', esc_attr($_POST['2info']));
	}
	return $post_id;
}
 
add_action('save_post', 'true2_save_box_data');



function true3_meta_boxes() {
	add_meta_box('truediv', 'Настройки', 'true3_print_box', 'generalmain', 'normal', 'high');
}
 
add_action( 'admin_menu', 'true3_meta_boxes' );
/*
 * также можно использовать и другие хуки:
 * add_action( 'add_meta_boxes', 'tr_meta_boxes' );
 * если версия WordPress ниже 3.0, то
 * add_action( 'admin_init', 'tr_meta_boxes', 1 );
 */
 
/*
 * Этап 2. Заполнение
 */
function true3_print_box($post) {
	wp_nonce_field( basename( __FILE__ ), 'seo_metabox_nonce' );
	/*
	 * добавляем текстовое поле
	 */
	$html .= '<label>Vk<input style="margin-left:100px;margin-right:10px;" type="text" name="link1" value="' . get_post_meta($post->ID, 'link1',true) . '" /></label> ';
    $html .= '<br><label>Instagram<input style="margin-left:58px;margin-right:10px;" type="text" name="link2" value="' . get_post_meta($post->ID, 'link2',true) . '" /></label> ';
    $html .= '<br><label>Facebook<input style="margin-left:60px;margin-right:10px;" type="text" name="link3" value="' . get_post_meta($post->ID, 'link3',true) . '" /></label> ';
    $html .= '<br><label>Google+<input style="margin-left:64px;margin-right:10px;" type="text" name="link4" value="' . get_post_meta($post->ID, 'link4',true) . '" /></label> ';
    $html .= '<br><label>AppStore<input style="margin-left:61px;margin-right:10px;" type="text" name="link5" value="' . get_post_meta($post->ID, 'link5',true) . '" /></label> ';
    $html .= '<br><label>GooglePlay<input style="margin-left:50px;margin-right:10px;" type="text" name="link6" value="' . get_post_meta($post->ID, 'link6',true) . '" /></label> ';
	/*
	 * добавляем чекбокс
	 */
	
 
	echo $html;
}
 
/*
 * Этап 3. Сохранение
 */
function true3_save_box_data ( $post_id ) {
	// проверяем, пришёл ли запрос со страницы с метабоксом
	if ( !isset( $_POST['seo_metabox_nonce'] )
	|| !wp_verify_nonce( $_POST['seo_metabox_nonce'], basename( __FILE__ ) ) )
        return $post_id;
	// проверяем, является ли запрос автосохранением
	if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) 
		return $post_id;
	// проверяем, права пользователя, может ли он редактировать записи
	if ( !current_user_can( 'edit_post', $post_id ) )
		return $post_id;
	// теперь также проверим тип записи	
	$post = get_post($post_id);
	if ($post->post_type == 'generalmain') { // укажите собственный
		update_post_meta($post_id, 'link1', esc_attr($_POST['link1']));
        update_post_meta($post_id, 'link2', esc_attr($_POST['link2']));
        update_post_meta($post_id, 'link3', esc_attr($_POST['link3']));
        update_post_meta($post_id, 'link4', esc_attr($_POST['link4']));
        update_post_meta($post_id, 'link5', esc_attr($_POST['link5']));
        update_post_meta($post_id, 'link6', esc_attr($_POST['link6']));
	}
	return $post_id;
}
 
add_action('save_post', 'true3_save_box_data');




function true4_meta_boxes() {
	add_meta_box('truediv', 'Настройки', 'true4_print_box', 'services', 'normal', 'high');
}
 
add_action( 'admin_menu', 'true4_meta_boxes' );
/*
 * также можно использовать и другие хуки:
 * add_action( 'add_meta_boxes', 'tr_meta_boxes' );
 * если версия WordPress ниже 3.0, то
 * add_action( 'admin_init', 'tr_meta_boxes', 1 );
 */
 
/*
 * Этап 2. Заполнение
 */
function true4_print_box($post) {
	wp_nonce_field( basename( __FILE__ ), 'seo_metabox_nonce' );
	/*
	 * добавляем текстовое поле
	 */
	$html .= '<label>Ссылка <input style="margin-left:10px;margin-right:10px;" type="text" name="servicelink" value="' . get_post_meta($post->ID, 'servicelink',true) . '" /></label> ';

	/*
	 * добавляем чекбокс
	 */
	
 
	echo $html;
}
 
/*
 * Этап 3. Сохранение
 */
function true4_save_box_data ( $post_id ) {
	// проверяем, пришёл ли запрос со страницы с метабоксом
	if ( !isset( $_POST['seo_metabox_nonce'] )
	|| !wp_verify_nonce( $_POST['seo_metabox_nonce'], basename( __FILE__ ) ) )
        return $post_id;
	// проверяем, является ли запрос автосохранением
	if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) 
		return $post_id;
	// проверяем, права пользователя, может ли он редактировать записи
	if ( !current_user_can( 'edit_post', $post_id ) )
		return $post_id;
	// теперь также проверим тип записи	
	$post = get_post($post_id);
	if ($post->post_type == 'services') { // укажите собственный
		update_post_meta($post_id, 'servicelink', esc_attr($_POST['servicelink']));

	}
	return $post_id;
}
 
add_action('save_post', 'true4_save_box_data');






function true5_meta_boxes() {
	add_meta_box('truediv', 'Настройки', 'true5_print_box', 'post', 'normal', 'high');
}
 
add_action( 'admin_menu', 'true5_meta_boxes' );
/*
 * также можно использовать и другие хуки:
 * add_action( 'add_meta_boxes', 'tr_meta_boxes' );
 * если версия WordPress ниже 3.0, то
 * add_action( 'admin_init', 'tr_meta_boxes', 1 );
 */
 
/*
 * Этап 2. Заполнение
 */
function true5_print_box($post) {
	wp_nonce_field( basename( __FILE__ ), 'seo_metabox_nonce' );
	/*
	 * добавляем текстовое поле
	 */
	$html .= '<label>Обьявление к картинке <input style="margin-left:10px;margin-right:10px;" type="text" name="slogan" value="' . get_post_meta($post->ID, 'slogan',true) . '" /></label> ';

	/*
	 * добавляем чекбокс
	 */
	
 
	echo $html;
}
 
/*
 * Этап 3. Сохранение
 */
function true5_save_box_data ( $post_id ) {
	// проверяем, пришёл ли запрос со страницы с метабоксом
	if ( !isset( $_POST['seo_metabox_nonce'] )
	|| !wp_verify_nonce( $_POST['seo_metabox_nonce'], basename( __FILE__ ) ) )
        return $post_id;
	// проверяем, является ли запрос автосохранением
	if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) 
		return $post_id;
	// проверяем, права пользователя, может ли он редактировать записи
	if ( !current_user_can( 'edit_post', $post_id ) )
		return $post_id;
	// теперь также проверим тип записи	
	$post = get_post($post_id);
	if ($post->post_type == 'post') { // укажите собственный
		update_post_meta($post_id, 'slogan', esc_attr($_POST['slogan']));

	}
	return $post_id;
}
 
add_action('save_post', 'true5_save_box_data');



/*  fff */
function true6_meta_boxes() {
	add_meta_box('truediv', 'Настройки', 'true6_print_box', 'banner', 'normal', 'high');
}
 
add_action( 'admin_menu', 'true6_meta_boxes' );
/*
 * также можно использовать и другие хуки:
 * add_action( 'add_meta_boxes', 'tr_meta_boxes' );
 * если версия WordPress ниже 3.0, то
 * add_action( 'admin_init', 'tr_meta_boxes', 1 );
 */
 
/*
 * Этап 2. Заполнение
 */
function true6_print_box($post) {
	wp_nonce_field( basename( __FILE__ ), 'seo_metabox_nonce' );
	/*
	 * добавляем текстовое поле
	 */
	$html .= '<label style="display:block;">1 слоган в списке <input style="margin-left:10px;margin-right:10px;" type="text" name="bannerinfo1" value="' . get_post_meta($post->ID, 'bannerinfo1',true) . '" /></label> ';
    $html .= '<label style="display:block;">2 слоган в списке <input style="margin-left:10px;margin-right:10px;" type="text" name="bannerinfo2" value="' . get_post_meta($post->ID, 'bannerinfo2',true) . '" /></label> ';
    $html .= '<label style="display:block;">3 слоган в списке <input style="margin-left:10px;margin-right:10px;" type="text" name="bannerinfo3" value="' . get_post_meta($post->ID, 'bannerinfo3',true) . '" /></label> ';

	/*
	 * добавляем чекбокс
	 */
	
 
	echo $html;
}
 
/*
 * Этап 3. Сохранение
 */
function true6_save_box_data ( $post_id ) {
	// проверяем, пришёл ли запрос со страницы с метабоксом
	if ( !isset( $_POST['seo_metabox_nonce'] )
	|| !wp_verify_nonce( $_POST['seo_metabox_nonce'], basename( __FILE__ ) ) )
        return $post_id;
	// проверяем, является ли запрос автосохранением
	if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) 
		return $post_id;
	// проверяем, права пользователя, может ли он редактировать записи
	if ( !current_user_can( 'edit_post', $post_id ) )
		return $post_id;
	// теперь также проверим тип записи	
	$post = get_post($post_id);
	if ($post->post_type == 'banner') { // укажите собственный
		update_post_meta($post_id, 'bannerinfo1', esc_attr($_POST['bannerinfo1']));
        update_post_meta($post_id, 'bannerinfo2', esc_attr($_POST['bannerinfo2']));
        update_post_meta($post_id, 'bannerinfo3', esc_attr($_POST['bannerinfo3']));
        
	}
	return $post_id;
}
 
add_action('save_post', 'true6_save_box_data');

function kama_pagenavi( $before = '', $after = '', $echo = true, $args = array(), $wp_query = null ) {
	if( ! $wp_query ){
		wp_reset_query();
		global $wp_query;
	}

	// параметры по умолчанию
	$default_args = array(
		'text_num_page'   => '', // Текст перед пагинацией. {current} - текущая; {last} - последняя (пр. 'Страница {current} из {last}' получим: "Страница 4 из 60" )
		'num_pages'       => 3, // сколько ссылок показывать
		'step_link'       => 0, // ссылки с шагом (значение - число, размер шага (пр. 1,2,3...10,20,30). Ставим 0, если такие ссылки не нужны.
		'dotright_text'   => '…', // промежуточный текст "до".
		'dotright_text2'  => '…', // промежуточный текст "после".
		'back_text'       => 'назад', // текст "перейти на предыдущую страницу". Ставим 0, если эта ссылка не нужна.
		'next_text'       => 'следующая', // текст "перейти на следующую страницу". Ставим 0, если эта ссылка не нужна.
		'first_page_text' => '', // текст "к первой странице". Ставим 0, если вместо текста нужно показать номер страницы.
		'last_page_text'  => '0', // текст "к последней странице". Ставим 0, если вместо текста нужно показать номер страницы.
	);

	$default_args = apply_filters('kama_pagenavi_args', $default_args ); // чтобы можно было установить свои значения по умолчанию

	$args = array_merge( $default_args, $args );

	extract( $args );

	$posts_per_page = (int) $wp_query->get('posts_per_page');
	$paged          = (int) $wp_query->get('paged');
	$max_page       = $wp_query->max_num_pages;

	//проверка на надобность в навигации
	if( $max_page <= 1 )
		return false;

	if( empty( $paged ) || $paged == 0 )
		$paged = 1;

	$pages_to_show = intval( $num_pages );
	$pages_to_show_minus_1 = $pages_to_show-1;

	$half_page_start = floor( $pages_to_show_minus_1/2 ); //сколько ссылок до текущей страницы
	$half_page_end = ceil( $pages_to_show_minus_1/2 ); //сколько ссылок после текущей страницы

	$start_page = $paged - $half_page_start; //первая страница
	$end_page = $paged + $half_page_end; //последняя страница (условно)

	if( $start_page <= 0 )
		$start_page = 1;
	if( ($end_page - $start_page) != $pages_to_show_minus_1 )
		$end_page = $start_page + $pages_to_show_minus_1;
	if( $end_page > $max_page ) {
		$start_page = $max_page - $pages_to_show_minus_1;
		$end_page = (int) $max_page;
	}

	if( $start_page <= 0 )
		$start_page = 1;

	//выводим навигацию
	$out = '';

	// создаем базу чтобы вызвать get_pagenum_link один раз
	$link_base = str_replace( 99999999, '___', get_pagenum_link( 99999999 ) );
	$first_url = get_pagenum_link( 1 );
	if( false === strpos( $first_url, '?') )
		$first_url = user_trailingslashit( $first_url );

	$out .= $before . "<div class='wp-pagenavi'>\n";

		if( $text_num_page ){
			$text_num_page = preg_replace( '!{current}|{last}!', '%s', $text_num_page );
			$out.= sprintf( "<span class='pages'>$text_num_page</span> ", $paged, $max_page );
		}
		// назад
		if ( $back_text && $paged != 1 )
			$out .= '<a class="prev" href="'. ( ($paged-1)==1 ? $first_url : str_replace( '___', ($paged-1), $link_base ) ) .'">'. $back_text .'</a> ';
		// в начало
		if ( $start_page >= 2 && $pages_to_show < $max_page ) {
			$out.= '<a class="first" href="'. $first_url .'">'. ( $first_page_text ? $first_page_text : 1 ) .'</a> ';
			if( $dotright_text && $start_page != 2 ) $out .= '<span class="extend">'. $dotright_text .'</span> ';
		}
		// пагинация
		for( $i = $start_page; $i <= $end_page; $i++ ) {
			if( $i == $paged )
				$out .= '<span class="current">'.$i.'</span> ';
			elseif( $i == 1 )
				$out .= '<a href="'. $first_url .'">1</a> ';
			else
				$out .= '<a href="'. str_replace( '___', $i, $link_base ) .'">'. $i .'</a> ';
		}

		//ссылки с шагом
		$dd = 0;
		if ( $step_link && $end_page < $max_page ){
			for( $i = $end_page+1; $i<=$max_page; $i++ ) {
				if( $i % $step_link == 0 && $i !== $num_pages ) {
					if ( ++$dd == 1 )
						$out.= '<span class="extend">'. $dotright_text2 .'</span> ';
					$out.= '<a href="'. str_replace( '___', $i, $link_base ) .'">'. $i .'</a> ';
				}
			}
		}
		// в конец
		if ( $end_page < $max_page ) {
			if( $dotright_text && $end_page != ($max_page-1) )
				$out.= '<span class="extend">'. $dotright_text2 .'</span> ';
			$out.= '<a class="last" href="'. str_replace( '___', $max_page, $link_base ) .'">'. ( $last_page_text ? $last_page_text : $max_page ) .'</a> ';
		}
		// вперед
		if ( $next_text && $paged != $end_page )
			$out.= '<a class="next" href="'. str_replace( '___', ($paged+1), $link_base ) .'">'. $next_text .'</a> ';

	$out .= "</div>". $after ."\n";

	$out = apply_filters('kama_pagenavi', $out );

	if( $echo )
		return print $out;

	return $out;
}
/*
 * "Хлебные крошки" для WordPress
 * автор: Dimox
 * версия: 2017.01.21
 * лицензия: MIT
*/
function dimox_breadcrumbs() {

  /* === ОПЦИИ === */
  $text['home'] = 'Главная'; // текст ссылки "Главная"
  $text['category'] = '%s'; // текст для страницы рубрики
  $text['search'] = 'Результаты поиска по запросу "%s"'; // текст для страницы с результатами поиска
  $text['tag'] = 'Записи с тегом "%s"'; // текст для страницы тега
  $text['author'] = 'Статьи автора %s'; // текст для страницы автора
  $text['404'] = 'Ошибка 404'; // текст для страницы 404
  $text['page'] = 'Страница %s'; // текст 'Страница N'
  $text['cpage'] = 'Страница комментариев %s'; // текст 'Страница комментариев N'

  $wrap_before = '<div class="breadcrumbs" itemscope itemtype="">'; // открывающий тег обертки
  $wrap_after = '</div><!-- .breadcrumbs -->'; // закрывающий тег обертки
  $sep = '&nbsp-&nbsp'; // разделитель между "крошками"
  $sep_before = '<span class="sep">'; // тег перед разделителем
  $sep_after = '</span>'; // тег после разделителя
  $show_home_link = 0; // 1 - показывать ссылку "Главная", 0 - не показывать
  $show_on_home = 0; // 1 - показывать "хлебные крошки" на главной странице, 0 - не показывать
  $show_current = 1; // 1 - показывать название текущей страницы, 0 - не показывать
  $before = '<span class="current">'; // тег перед текущей "крошкой"
  $after = '</span>'; // тег после текущей "крошки"
  /* === КОНЕЦ ОПЦИЙ === */

  global $post;
  $home_url = home_url('/');
  $link_before = '<span itemprop="itemListElement" itemscope itemtype="">';
  $link_after = '</span>';
  $link_attr = ' itemprop="item"';
  $link_in_before = '<span itemprop="name">';
  $link_in_after = '</span>';
  $link = $link_before . '<a href="%1$s"' . $link_attr . '>' . $link_in_before . '%2$s' . $link_in_after . '</a>' . $link_after;
  $frontpage_id = get_option('page_on_front');
  $parent_id = ($post) ? $post->post_parent : '';
  $sep = ' ' . $sep_before . $sep . $sep_after . ' ';
  $home_link = $link_before . '<a href="' . $home_url . '"' . $link_attr . ' class="home">' . $link_in_before . $text['home'] . $link_in_after . '</a>' . $link_after;

  if (is_home() || is_front_page()) {

    if ($show_on_home) echo $wrap_before . $home_link . $wrap_after;

  } else {

    echo $wrap_before;
    if ($show_home_link) echo $home_link;

    if ( is_category() ) {
      $cat = get_category(get_query_var('cat'), false);
      if ($cat->parent != 0) {
        $cats = get_category_parents($cat->parent, TRUE, $sep);
        $cats = preg_replace("#^(.+)$sep$#", "$1", $cats);
        $cats = preg_replace('#<a([^>]+)>([^<]+)<\/a>#', $link_before . '<a$1' . $link_attr .'>' . $link_in_before . '$2' . $link_in_after .'</a>' . $link_after, $cats);
        if ($show_home_link) echo $sep;
        echo $cats;
      }
      if ( get_query_var('paged') ) {
        $cat = $cat->cat_ID;
        echo $sep . sprintf($link, get_category_link($cat), get_cat_name($cat)) . $sep . $before . sprintf($text['page'], get_query_var('paged')) . $after;
      } else {
        if ($show_current) echo $sep . $before . sprintf($text['category'], single_cat_title('', false)) . $after;
      }

    } elseif ( is_search() ) {
      if (have_posts()) {
        if ($show_home_link && $show_current) echo $sep;
        if ($show_current) echo $before . sprintf($text['search'], get_search_query()) . $after;
      } else {
        if ($show_home_link) echo $sep;
        echo $before . sprintf($text['search'], get_search_query()) . $after;
      }

    } elseif ( is_day() ) {
      if ($show_home_link) echo $sep;
      echo sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y')) . $sep;
      echo sprintf($link, get_month_link(get_the_time('Y'), get_the_time('m')), get_the_time('F'));
      if ($show_current) echo $sep . $before . get_the_time('d') . $after;

    } elseif ( is_month() ) {
      if ($show_home_link) echo $sep;
      echo sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y'));
      if ($show_current) echo $sep . $before . get_the_time('F') . $after;

    } elseif ( is_year() ) {
      if ($show_home_link && $show_current) echo $sep;
      if ($show_current) echo $before . get_the_time('Y') . $after;

    } elseif ( is_single() && !is_attachment() ) {
      if ($show_home_link) echo $sep;
      if ( get_post_type() != 'post' ) {
        $post_type = get_post_type_object(get_post_type());
        $slug = $post_type->rewrite;
        printf($link, $home_url . $slug['slug'] . '/', $post_type->labels->singular_name);
        if ($show_current) echo $sep . $before . get_the_title() . $after;
      } else {
        $cat = get_the_category(); $cat = $cat[0];
        $cats = get_category_parents($cat, TRUE, $sep);
        if (!$show_current || get_query_var('cpage')) $cats = preg_replace("#^(.+)$sep$#", "$1", $cats);
        $cats = preg_replace('#<a([^>]+)>([^<]+)<\/a>#', $link_before . '<a$1' . $link_attr .'>' . $link_in_before . '$2' . $link_in_after .'</a>' . $link_after, $cats);
        echo $cats;
        if ( get_query_var('cpage') ) {
          echo $sep . sprintf($link, get_permalink(), get_the_title()) . $sep . $before . sprintf($text['cpage'], get_query_var('cpage')) . $after;
        } else {
          if ($show_current) echo $before . get_the_title() . $after;
        }
      }

    // custom post type
    } elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
      $post_type = get_post_type_object(get_post_type());
      if ( get_query_var('paged') ) {
        echo $sep . sprintf($link, get_post_type_archive_link($post_type->name), $post_type->label) . $sep . $before . sprintf($text['page'], get_query_var('paged')) . $after;
      } else {
        if ($show_current) echo $sep . $before . $post_type->label . $after;
      }

    } elseif ( is_attachment() ) {
      if ($show_home_link) echo $sep;
      $parent = get_post($parent_id);
      $cat = get_the_category($parent->ID); $cat = $cat[0];
      if ($cat) {
        $cats = get_category_parents($cat, TRUE, $sep);
        $cats = preg_replace('#<a([^>]+)>([^<]+)<\/a>#', $link_before . '<a$1' . $link_attr .'>' . $link_in_before . '$2' . $link_in_after .'</a>' . $link_after, $cats);
        echo $cats;
      }
      printf($link, get_permalink($parent), $parent->post_title);
      if ($show_current) echo $sep . $before . get_the_title() . $after;

    } elseif ( is_page() && !$parent_id ) {
      if ($show_current) echo $sep . $before . get_the_title() . $after;

    } elseif ( is_page() && $parent_id ) {
      if ($show_home_link) echo $sep;
      if ($parent_id != $frontpage_id) {
        $breadcrumbs = array();
        while ($parent_id) {
          $page = get_page($parent_id);
          if ($parent_id != $frontpage_id) {
            $breadcrumbs[] = sprintf($link, get_permalink($page->ID), get_the_title($page->ID));
          }
          $parent_id = $page->post_parent;
        }
        $breadcrumbs = array_reverse($breadcrumbs);
        for ($i = 0; $i < count($breadcrumbs); $i++) {
          echo $breadcrumbs[$i];
          if ($i != count($breadcrumbs)-1) echo $sep;
        }
      }
      if ($show_current) echo $sep . $before . get_the_title() . $after;

    } elseif ( is_tag() ) {
      if ( get_query_var('paged') ) {
        $tag_id = get_queried_object_id();
        $tag = get_tag($tag_id);
        echo $sep . sprintf($link, get_tag_link($tag_id), $tag->name) . $sep . $before . sprintf($text['page'], get_query_var('paged')) . $after;
      } else {
        if ($show_current) echo $sep . $before . sprintf($text['tag'], single_tag_title('', false)) . $after;
      }

    } elseif ( is_author() ) {
      global $author;
      $author = get_userdata($author);
      if ( get_query_var('paged') ) {
        if ($show_home_link) echo $sep;
        echo sprintf($link, get_author_posts_url($author->ID), $author->display_name) . $sep . $before . sprintf($text['page'], get_query_var('paged')) . $after;
      } else {
        if ($show_home_link && $show_current) echo $sep;
        if ($show_current) echo $before . sprintf($text['author'], $author->display_name) . $after;
      }

    } elseif ( is_404() ) {
      if ($show_home_link && $show_current) echo $sep;
      if ($show_current) echo $before . $text['404'] . $after;

    } elseif ( has_post_format() && !is_singular() ) {
      if ($show_home_link) echo $sep;
      echo get_post_format_string( get_post_format() );
    }

    echo $wrap_after;

  }
} // end of dimox_breadcrumbs()