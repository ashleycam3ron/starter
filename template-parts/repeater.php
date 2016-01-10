<section id="slider" class="row">
    <h2>Slider</h2>
    <div id="slider">
        <div id="carousel-bounding-box">
            <div id="carousel" class="carousel slide">
                <div class="carousel-inner">
                    <?php $slider = new WP_Query(array(
						'post_type' => 'menu',
						'posts_per_page' => -1,
						'orderby' => 'menu_order',
						'order' => 'ASC',
						)));
					    $count = 0;
					   while ($slider->have_posts()) : $slider->the_post(); ?>
					<div class="item <?php if ( $count++ == 0){ echo 'active';};?>" data-slide-number="<?php echo $count++;?>">
					     <h3><?php the_title();?></h3>
						 <?php if ( has_post_thumbnail() ) { ?>
					     	 <?php the_post_thumbnail('large', array( 'class' => 'img-responsive'));?>
						 <?php } ?>
					</div><!-- item active -->
					<?php endwhile; wp_reset_postdata(); ?>

                </div>
                <a class="carousel-control left" href="#carousel" data-slide="prev"><div class="arrow-prev"></div></a>
                <a class="carousel-control right" href="#carousel" data-slide="next"><div class="arrow-next"></div></a>
            </div>
        </div>
    </div><!-- end #slider -->
</section>

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