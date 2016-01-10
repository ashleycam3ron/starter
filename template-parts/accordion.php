<section class="row">
    <h2>Accordion</h2>
	<?php 
		$args = array( 
			'category_name' => 'online-training',
			'post_status' 	=> 'publish',
			'orderby'		=> 'post_title',
			'order'			=> 'ASC'
		); 
		$accordion = new WP_Query( $args );
		$divider = 3; // # of items/thumbnails to show before closing the element and opening another ?>

	<?php if( $accordion->have_posts() ) : ?>
		<ul id="accordion">
			<li class="item col-sm-4"> 
			    <?php while( $accordion->have_posts() ) : $accordion->the_post(); ?>
					<h3><?php the_title(); ?></h3>
					<div>
						<?php echo wp_trim_words( get_the_excerpt(), 30 ); ?>
						<a class="more" href="<?php the_permalink(); ?>">Read more</a>
					</div>
					<?php $current_position = $accordion->current_post + 1; // current_post starts at 0 ?>
					<?php //if position is equal to the divider and not the last result close the currently open div and start another
						if ( $current_position < $accordion->found_posts && $current_position % $divider == 0 ) : ?>
							</li><li class="item col-sm-4">
					<?php endif; ?>
			    <?php endwhile; ?>
			</li><!-- end .item -->
		</ul>
	<?php endif; ?>
</section>

<script>
	jQuery(document).ready(function($) {
	    $( "#accordion li" ).accordion({
	      collapsible: true,
	      active: false
	    });
	});
</script>