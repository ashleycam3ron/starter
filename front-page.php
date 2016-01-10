<?php get_header(); ?>

<div id="home" class="container-fluid">
	<?php get_template_part('/template-parts/slider'); ?>

    <section id="story" class="row">
		<div class="col-xs-10 col-xs-offset-1">
			<?php the_content(); ?>
		</div>
    </section><!-- end .row -->

	<?php // check if the flexible content field has rows of data
		if( have_rows('custom_layouts') ):
		    while ( have_rows('custom_layouts') ) : the_row();
				$image = get_sub_field('image');
		        if( get_row_layout() == '2_col_1' ): ?>
				<section id="products" class="row">
		        	<div class="content col-xs-10 col-xs-offset-1 col-sm-5 col-sm-offset-1">
		        		<?php the_sub_field('text'); ?>
		        	</div>
		        	<img class="img-responsive hidden-xs col-sm-4 col-sm-offset-1" src="<?php echo $image['url']; ?>" alt="<?php echo $image['title']; ?>" />
				</section>
		        <?php elseif( get_row_layout() == '2_col_2' ): ?>
		        <section id="tours" class="row">
					<img class="img-responsive col-xs-8 col-sm-4" src="<?php echo $image['url']; ?>" alt="<?php echo $image['title']; ?>" />
		        	<div class="content col-xs-10 col-xs-offset-1 col-sm-5 col-sm-offset-1">
		        		<?php the_sub_field('text'); ?>
		        	</div>
		        </section>
		        <?php endif;
		    endwhile;
		else :
		    // no layouts found
		endif; ?>
</div>

<script>
	jQuery(function($){
		jQuery('#carousel').carousel({
		    interval: false
		});
	});

<?php if ( wp_is_mobile() ) { ?>
	jQuery(document).ready(function() {
	   jQuery("#carousel").swiperight(function() {
	      jQuery(this).carousel('prev');
	    });
	   jQuery("#carousel").swipeleft(function() {
	      jQuery(this).carousel('next');
	   });
	});
<?php } ?>
</script>

<?php get_footer(); ?>