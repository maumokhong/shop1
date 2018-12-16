<article id="post-<?php the_ID();?>" <?php post_class();?>>
	<div class="entry-thumbnail">
		<?php dole_thumbnail();?>
	</div>
	<div class="entry-header">
		<?php dole_entry_header();?>
		<?php dole_entry_meta();?>
		
	</div>
	<div class="entry-content"></div>
</article>