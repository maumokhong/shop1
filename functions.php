<?php
/**
@khai báo hằng gái trị
	@THEME_URL = lấy đường dẫn thư mục theme
	@core = lấy đường dẫn của thư mục / core
**/
define( 'THEME_URL', get_stylesheet_directory_uri());
define( 'THEME_DIR', get_stylesheet_directory() );
define('CORE', THEME_DIR . "/core");
/**
@nhúng file /core/init.php
**/
require_once( CORE . "/init.php" );
/**
@thiết lập chiều rộng nôi dung
**/
// if (!isset($content_width)) {
// 	# code...
// 	$content_width = 620;
// }
/**
@khai báo chức năng của theme
**/
if (!function_exists('dole_theme_setup')) {
	# code...
	function dole_theme_setup(){
		/*thiệt lập textdomain*/
		$language_folder = THEME_URL . '/languages';
		load_theme_textdomain('dole', $language_folder);
		/* tư động thêm link rss lên <head> **/
		add_theme_support('automatic-feed-link');
		/* thêm post thumbnail **/
		add_theme_support('post-thumbnails');
		/*post format*/
		add_theme_support('post-formats', array(
			'image',
			'video',
			'gallery',
			'quote',
			'link'
		));
		/* theme title-tag*/
		add_theme_support('title-tag');
		/* theme custom backgroud */
		$default_background = array(
			'default-color' => '#e8e8e8'
		);
		add_theme_support('custom-background', $default_background);
		/* theme menu */
		register_nav_menu('primary-menu', __('primary menu','dole'));

		/* tạo sidebar */
		// $Sidebar = array (
		// 	'name' =>('main_sidebar' ,'dole'),
		// 	'id' => 'main-sidebar',
		// 	'description'=>__('Default sidebar'),
		// 	'class' => 'main-sidebar',
		// 	'before_title ' => '<h3 class = "widgettitle">',
		// 	'after_title' => '</h3>'
		// );
		// register_sidebar( $Sidebar );
	}
	add_action('init','dole_theme_setup');
}

/*-------
template functions */
if (!function_exists('dole_header')) {
	# code...
	function dole_header(){ ?>
			<div class="site-name">
					<?php
					if(is_home() ){
					printf('<h1><a href = "%1$s" title ="%2$s">%3$s</a></h1>',
					get_bloginfo('url'),
					get_bloginfo('description'),
					get_bloginfo('sitename'));
				}else
				{
					printf('<p><a href = "%1$s" title ="%2$s">%3$s</a></p>',
					get_bloginfo('url'),
					get_bloginfo('description'),
					get_bloginfo('sitename'));
				}
					?>
		
			</div>
			<div class="site-description"><?php bloginfo('description');?></div>
			<?php
	}
}
/** thiết lập menu **/
if (!function_exists('dole_menu')) {
	# code...
	function dole_menu($menu){
		$menu = array(
			'theme_location' => $menu,
			'container' => 'nav',
			'container_class' => $menu
		);
		wp_nav_menu('primary-menu');
	}
}

/**
hàm tạo phần trang đơn giản
**/
if (!function_exists('dole_pagination')) {
	function dole_pagination(){
		if ($GLOBALS['wp_query']->max_num_pages < 2 ) {
			return '';
			
		}?>
		<nav class="pagination" role="navigation">
			<!-- <?php if ( get_next_post_link() ): ?>
				<div class="prev"><?php next_post_link(__('older posts','dole')); ?></div>
			<?php endif; ?> -->
			<?php if( get_previous_posts_link()): ?>
				<div class="next"> <?php previous_posts_link(__('newest posts', ' dole'));?></div>
			<?php endif;?>
		</nav>
	<?php }
	
}
/**
hàm hiển thị thumbnail 
**/
if (!function_exists('dole_thumbnail')) {
	function dole_thumbnail($size){
		if(!is_single() && has_post_thumbnail() && !post_password_required() || has_post_format('image')):?>
		<figure class="post-thumbnail"> <?php the_post_thumbnail($size,$atlr); ?></figure>
	<?php endif ; ?>
	 <?php }
}
/** dole_entry_header = hiển thị tiêu đề post **/

if (!function_exists('dole_entry_header')) {
	function dole_entry_header(){ ?>
		<?php if (is_single()) : ?>
			<h1><a href="<?php the_permalink();?>" title ="<?php the_title();?>"><?php the_title();?></a></h1>
		<?php else :?>
			<h2><a href="<?php the_permalink();?>" title ="<?php the_title(); ?>"><?php the_title();?></a></h2>
		<?php endif;?>

	<?php }
}
/**nhúng file style.css **/
function dole_style(){
	wp_register_style('main-style', get_template_directory_uri() . "/style.css" , 'all');
	wp_enqueue_style('main-style');
	// 

	// wp_register_style('superfish-style', get_template_directory_uri() . "/superfish.css" , 'all');
	// wp_enqueue_style('superfish-style');
	// wp_enqueue_scripts('superfish-script', get_template_directory_uri(). "/superfish.js", arrry('jquery'));
	// wp_enqueue_scripts('superfish-script');

}
add_action('wp_enqueue_scripts','dole_style');