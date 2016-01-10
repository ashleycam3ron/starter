<?php
/*
Template Name: Bar Template
*/
wp_deregister_script('jquery');
wp_enqueue_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js');
wp_enqueue_script('flexslider', get_stylesheet_directory_uri() . '/js/jquery.flexslider-min.js');
get_header(); ?>

<div id="page" class="container-fluid text-center">

	<!-- main slider carousel -->
    <div class="row" id="bar">
	    <h2>From the Bar</h2>
        <div id="slider">

            <div id="carousel-bounding-box">
                <div id="carousel" class="carousel slide text-center">
                    <!-- main slider carousel items -->
                    <div class="carousel-inner">
	                    <?php $the_query = new WP_Query(array(
							'post_type' => 'menu',
						    'tax_query' => array(
							    'relation' => 'AND',
								array(
									'taxonomy' => 'courses',
									'field'    => 'slug',
									'terms'    => array( 'bar' ),
								),
								array(
									'taxonomy' => 'courses',
									'field'    => 'slug',
									'terms'    => array( 'featured' ),
								),
							)
						    ));
						    $count = 0;
						   while ( $the_query->have_posts() ) :
						   $the_query->the_post(); ?>
						 <div class="item <?php if ( $count++ == 0){ echo 'active';};?>" data-slide-number="<?php echo $count++;?>">
						     <h3><div>The</div> <?php the_title();?></h3>
						     <?php the_post_thumbnail('large', array( 'class' => 'img-responsive fullwidth'));?>
						     <div class="col-md-4 col-md-offset-1 recipe">
							    <div class="col-md-10 hidden-xs">
<!-- 							    	<span class="lg">Highlights</span> -->
									<span class="lh"><?php the_field('ingredients'); ?></span>
									<?php edit_post_link('Edit this drink.', '<p>', '</p>'); ?>
						     	</div>
						     </div>
						     <?php if (get_field('brief_description')){ ?>
						     <div class="col-md-4 col-sm-3 hidden-xs style">
							    <div class="col-md-10 hidden-xs">
<!-- 							    	<span class="lg">Style</span> -->
									<p class="lh" style="padding-top: 50px;"><?php the_field('brief_description'); ?></p>
									<?php edit_post_link('Edit this.', '<p>', '</p>'); ?>
						     	</div>
						     </div>
						     <?php } ?>
							 <div class="clearfix hidden-xs">
								 <h4 class="lg clearfix rating">Rate Drink</h4>
							 	<?php if(function_exists('the_ratings')) { the_ratings(); } ?>
							 </div>
						</div><!-- item active -->
						<?php endwhile; wp_reset_postdata(); ?>

                    </div>
                    <a class="carousel-control left" href="#carousel" data-slide="prev"><div class="arrow-prev"></div></a>
                    <a class="carousel-control right" href="#carousel" data-slide="next"><div class="arrow-next"></div></a>
                </div>
            </div>

        </div><!-- end #slider -->

    </div><!--/main slider carousel-->

 	<div class="row hidden-xs">
		<?php if (get_field('thumb_carousel')){ ?>
			<?php $images = get_field('thumb_carousel');
				if( $images ): ?>
			<div class="flexslider f01">
			<ul class="slides blocks row products">
			  <?php foreach( $images as $image ): ?>
				<li>
					<a href="<?php echo $image['sizes']['large']; ?>" class="fancybox" rel="bar">
	                    <img class="img-responsive" src="<?php echo $image['sizes']['thumbnail']; ?>" alt="<?php echo $image['title']; ?>" />
	                </a>
				</li>
			  <?php endforeach; ?>
			</ul>
			</div>
			<?php endif; ?>
		<?php } ?>
	</div><!-- end .row -->

	<div id="tap" class="row">
 		<div class="col-md-4 tap">
 			<?php the_field('col1'); ?>
 		</div>
 		<div class="col-md-4">
	 		<h2 class="on-tap">30 Beers On Tap</h2>
 			<?php the_field('col2'); ?>
 		</div>
 		<div class="col-md-4 tap">
 			<?php the_field('col3'); ?>
 		</div>
 	</div>

	<div class="row happy" style="padding-top: 3%;padding-bottom: 5%;">
		<div class="col-xs-12 col-sm-5 col-sm-offset-1">
		  <h2><span>The Bar</span></h2>
		  <?php the_content(); ?>
		</div>
		<div class="col-xs-12 col-sm-5">
		  <h2><span>Happy Hour</span></h2>
		  <p style="font-size:1.3em">Join us seven days a week for happy hour 3-6pm and for reverse happy hour from 10pm-close in which we offer <strong>$6 margherita and marinara pizzas</strong> along with <strong>20% off</strong> all alcohol! The quickest way to happy hour is through the back door!</p>
		  <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/happy-hour.png" style="width: 160px; height: auto;"/>
		</div>
	</div>

	<?php if (get_field('gallery')){ ?>
		<div class="gallery col-xs-12">
		 <?php $images = get_field('gallery');
			if( $images ): ?>
	        <ul>
	            <?php foreach( $images as $image ): ?>
	                <li class="col-xs-2 col-sm-3 col-md-2">
	                    <a href="<?php echo $image['url']; ?>" class="fancybox" rel="pizza">
		                    <img class="img-responsive" src="<?php echo $image['sizes']['thumbnail']; ?>" alt="<?php echo $image['title']; ?>" />
		                </a>
	                </li>
	            <?php endforeach; ?>
	        </ul>
	    </div>
		<?php endif; ?>
	<?php } ?>
    </div><!-- end .row -->

</div><!-- end .container-fluid -->

<script>
	jQuery(function($){
		jQuery('#carousel').carousel({
		    interval: false
		});
	});

	jQuery(window).load(function() {
	  jQuery('.f01').flexslider({
		touch: true,
	    animation: "slide",
	    selector: ".slides > li",
	    animationLoop: false,
	    slideshowSpeed:8000,
	    animationSpeed:2000,
	    itemWidth: 180,
	    itemMargin: 2,
	    animationLoop: true,
	    controlNav: true,               //Boolean: Create navigation for paging control of each clide? Note: Leave true for manualControls usage
		directionNav: false,             //Boolean: Create navigation for previous/next navigation? (true/false)
		//prevText: "Previous",           //String: Set the text for the "previous" directionNav item
		//nextText: "Next",
		maxItems: 8
	  });
	});
</script>

<?php get_footer(); ?>