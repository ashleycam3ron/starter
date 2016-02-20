<section class="row">

	<h1>Posts Carousel</h1>
		<?php
			$divider = 9;
			$query = new WP_Query( array( 'cat' => 2, 'posts_per_page' => -1, 'orderby' => 'title', 'order'   => 'ASC' ) ); ?>
			<?php if( $query->have_posts() ) : ?>
				<div id="mini-carousel" class="carousel slide" data-ride="carousel">
					<ul class="carousel-inner">
						<li class="item active">
							<?php
								$total = count( $query );
								$counter = 0;
								while( $query->have_posts() ) : $query->the_post();
									$counter++; ?>

							<h3><?php the_title(); ?></h3>
							<div class="text">
								<?php echo wp_trim_words( get_the_excerpt(), 30 ); ?>
								<a class="more" href="<?php the_permalink(); ?>">Read more</a>
							</div>
							<?php $current_position = $query->current_post + 1; // current_post starts at 0
								//if position is equal to the divider and not the last result close the currently open div and start another
								if ( $current_position < $query->found_posts && $current_position % $divider == 0 ) : ?>
									</li><li class="item">
							<?php endif; ?>
						<?php endwhile;
							  wp_reset_postdata();?>
					  	</li>
					</ul>
				</div>
			<?php endif; ?>

			<!-- Controls -->
			<a class="left carousel-control" href="#mini-carousel" role="button" data-slide="prev">
				<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			</a>
			<a class="right carousel-control" href="#mini-carousel" role="button" data-slide="next">
				<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			</a>

		  </div>
</section>

<script>
jQuery(document).ready(function($) {
	$('#mini-carousel').carousel({
	  interval: 6000
	});
});
</script>