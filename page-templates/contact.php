<?php
/*
Template Name: Contact Us
*/

get_header(); ?>

<div id="contact" class="row">
	<h2><?php the_title(); ?></h2>
	<iframe id="map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6039.628490257492!2d-96.71690343118213!3d40.810075539444846!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8796bf040d4da64f%3A0x738766d22c4dfdc8!2sBison+Inc!5e0!3m2!1sen!2sus!4v1446666480274" width="100%" height="500" frameborder="0" style="border:0" allowfullscreen></iframe>
	

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<article <?php post_class(array('text-center','col-xs-10','col-xs-offset-1','col-md-6','col-md-offset-3','dark')) ?> id="post-<?php the_ID(); ?>">
			<div class="entry">
				<?php the_content(); ?>
			</div>	
		</article>
	<?php endwhile; ?>
	<?php else : ?>
		<h2>Not Found</h2>
	<?php endif; ?>
		
	<div class="row dark">
		<div class="container">
			<?php echo do_shortcode('[gravityform id="1" title="false" description="false"]'); ?>
		</div>
	</div>
</div>
<?php get_footer(); ?>