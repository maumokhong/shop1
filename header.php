<!DOCTYPE html>
<html <?php language_attributes(); ?>/>
<head>
	<meta charset="<?php bloginfo('charet'); ?>" />
	<link rel="profile" href="http://gmpg.org/xfn/11" /> 
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

	
	<?php wp_head(); ?>
	
</head>
<body  <?php body_class();?> />
	<div id="container">
		<div class="logo">
			<?php dole_header(); ?>
			<?php dole_menu('primary-menu'); ?>
		</div>
		
	

