<section>
	<h2>Posts Carousel</h2>
	<?php
		$args = array(
			'cat' 			=> '2',
			'post_status' 	=> 'publish',
			'orderby'		=> 'title',
			'order'			=> 'ASC'
		);
		$query = new WP_Query( $args );
		$divider = 3; // # of items/thumbnails to show before closing the element and opening another ?>

	<?php if( $query->have_posts() ) : ?>
		<ul id="mini-carousel">
			<li class="item col-sm-4">
			    <?php while( $query->have_posts() ) : $query->the_post(); ?>
					<h3><?php the_title(); ?></h3>
					<div class="text">
						<?php echo wp_trim_words( get_the_excerpt(), 30 ); ?>
						<a class="more" href="<?php the_permalink(); ?>">Read more</a>
					</div>
					<?php $current_position = $query->current_post + 1; // current_post starts at 0 ?>
					<?php //if position is equal to the divider and not the last result close the currently open div and start another
						if ( $current_position < $query->found_posts && $current_position % $divider == 0 ) : ?>
							</li><li class="item col-sm-4">
					<?php endif; ?>
			    <?php endwhile; ?>
			</li><!-- end .item -->
		</ul>
	<?php endif; ?>
</section>

<script>
jQuery(document).ready(function($) {
	$('#mini-carousel').carousel({
	  interval: 6000
	});
});
</script>