<?php get_header(); ?>

<div id="archive">
	<div class="container equal">

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	<article class="col-sm-3 text-center col" id="post-<?php the_ID(); ?>">
		<div <?php post_class() ?>>
			<?php if ( has_post_thumbnail() ) { ?>
		     	 <?php the_post_thumbnail('medium', array( 'class' => 'img-responsive'));?>
			 <?php } else { ?>
					<img class="img-responsive img-circle" src="http://placehold.it/250x250">
			 <?php } ?>
			<h2><?php the_title(); ?></h2>
			<span><?php echo implode(', ', get_field('ingredients2')); ?></span>
			<p class="price"><?php the_field('price'); ?></p>
			<?php //the_content(); ?>
		</div>
	</article>

	<?php endwhile; ?>
	<?php else : ?>
		<h2>Not Found</h2>
	<?php endif; ?>
	</div>
</div>
<?php get_footer(); ?>