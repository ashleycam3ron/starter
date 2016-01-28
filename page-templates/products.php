<?php
/*
Template Name: Products
*/

get_header(); ?>

<div id="products" class="container-fluid">
	<?php get_template_part('/template-parts/video-banner'); ?>

	<?php while ( have_posts() ) : the_post(); ?>

		<h1><?php the_title(); ?></h1>
		<?php the_content(); ?>

		<?php // check for rows (parent repeater)
		if( have_rows('product_cat') ): ?>
			<?php  // loop through rows (parent repeater)
			while( have_rows('product_cat') ): the_row(); ?>
			<div class="row">
				<h2><?php the_sub_field('cat_title'); ?></h2>
				<?php the_sub_field('note'); ?>
				<?php // check for rows (sub repeater)
				if( have_rows('products') ): ?>
					<ul>
					<?php // loop through rows (sub repeater)
					while( have_rows('products') ): the_row();
					$image = get_sub_field('image');
					$label = get_sub_field('label'); ?>
						<li class="col-sm-2">
						  <a class="fancybox" href="<?php echo $label['url']; ?>" rel="products">
							<div class="label"></div>
							<img class="img-responsive" src="<?php echo $image['url']; ?>" alt="<?php echo $image['title']; ?>" />
							<h3><?php the_sub_field('title'); ?></h3>
						  </a>
						</li>
					<?php endwhile; ?>
					</ul>
				<?php endif; //if( get_sub_field('products') ): ?>
			</div>
<!-- 			<div class="row" style="background: url(http://placehold.it/1400x400) no-repeat center;background-size: cover;min-height: 60vh;"></div> -->
			<div class="row" style="background: url(<?php the_sub_field('image'); ?>) no-repeat center;background-size: cover;min-height: 60vh;"></div>
			<?php endwhile; // while( has_sub_field('product_cat') ): ?>
		<?php endif; // if( get_field('product_cat') ): ?>
	<?php endwhile; // end of the loop. ?>
</div>

<script>
jQuery(document).ready(function($) {
	$('#mini-carousel').carousel({
	  interval: 6000
	});
	$('.fancybox').fancybox({
		padding: 0
	});
});
</script>
<script>

</script>
<?php get_footer(); ?>