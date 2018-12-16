<?php get_header(); ?>
<?php if (have_posts()): while(have_posts()) : the_post();?>

	<h1><?php the_title();?></h1>
	<h3><?php the_content(); ?></h3>
<?php endwhile ?>
<?php endif ;?>
<div class="content">
	<div id="main-content">
<?php dole_pagination();?>
	<?php get_template_part('content','none');?>
</div>
 <div id="sidebar">
	<?php get_sidebar();?>
</div> 
</div>
<?php get_footer(); ?>