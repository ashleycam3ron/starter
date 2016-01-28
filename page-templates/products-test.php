<?php
/*
Template Name: Products Temp
*/

get_header(); ?>

<div id="products" class="container-fluid">
	<?php get_template_part('/template-parts/video-banner'); ?>

	<?php while ( have_posts() ) : the_post(); ?>

		<h1 class="hidden"><?php the_title(); ?></h1>
		<?php the_content(); ?>
		<?php if( have_rows('product_cat') ):
			$carousel = 0; ?>
			<?php  while( have_rows('product_cat') ): the_row(); ?>
			<div class="row">
				<div class="col-xs-12 col-md-2 text-center">
					<h2><?php the_sub_field('cat_title'); ?></h2>
					<?php the_sub_field('note'); ?>
				</div>
				<?php
					$products = get_sub_field('products');
					$divider = 6;
					if($products){ ?>
					<div id="mini-carousel-<?php $carousel++; echo $carousel; ?>" class="carousel slide col-xs-12 col-md-10" data-ride="carousel">
						<ul class="carousel-inner">
							<li class="item active">
						<?php
							$total = count( $products );
							$counter = 0;
							foreach($products as $product){
							$image = $product['image'];
							$label = $product['label'];
							$title = $product['title'];
							$counter++; ?>

							  <a class="fancybox col-xs-2" href="<?php echo $label['url']; ?>" rel="products">
								<div class="label"></div>
								<img class="img-responsive" src="<?php echo $image['url']; ?>" alt="<?php echo $image['title']; ?>" />
								<h3 class="hidden"><?php echo $product['title']; ?></h3>
							  </a>
						<?php if ( $counter % $divider == 0) : ?>
							</li><li class="item">
						<?php endif; ?>
						<?php } ?>
						</ul>
						<!-- Controls -->
						<?php if ( $total > 6 ){ ?>
						<a class="left carousel-control" href="#mini-carousel-<?php echo $carousel; ?>" role="button" data-slide="prev">
							<span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>
							<span class="sr-only">Previous</span>
						</a>
						<a class="right carousel-control" href="#mini-carousel-<?php echo $carousel; ?>" role="button" data-slide="next">
							<span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>
							<span class="sr-only">Next</span>
						</a>
						<?php } ?>
				<?php } ?>
				</div>
				<div style="clear:both;background: url(<?php the_sub_field('image'); ?>) no-repeat center;background-size: cover;min-height: 80vh;"></div>
			</div>
			<?php endwhile; // end of the loop. ?>
		<?php endif; // if( get_field('product_cat') ): ?>
	<?php endwhile; // end of the loop. ?>

</div>

<script>
jQuery(document).ready(function($) {
	$('#mini-carousel-1, #mini-carousel-2').carousel({
	  interval: false
	});
	$('.fancybox').fancybox({
		padding: 0
	});
});
</script>
<?php get_footer(); ?>