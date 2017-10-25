<?php
/*
Template Name: Share
*/
?>
<?php query_posts('showposts=1'); ?>
	<?php while (have_posts()): the_post(); ?>
<h2><?php the_title(); ?></h2>
<?php the_content(); ?>
<p><a href="<?php the_permalink(); ?>">Read more...</a></p>
<?php endwhile; ?>
