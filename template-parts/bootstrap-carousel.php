<section class="col-xs-12 col-sm-5 col-md-7">
    <h2>Mini Gallery</h2>
	  <?php 
		$images = get_field('gallery');
		$divider = 8; // # of items/thumbnails to show before closing the element and opening another
		
		if( $images ): ?>
		
		  <div id="mini-carousel" class="carousel slide" data-ride="carousel">			  
			<ul class="carousel-inner">
				<li class="item active">
				<?php 
					$total = count( $images );
					$counter = 0;
					foreach( $images as $image ): 
						$counter++; ?>
					
					<a href="<?php echo $image['sizes']['large']; ?>" class="fancybox img-<?php echo $counter; ?>" rel="mini">
	                    <img class="img-responsive" src="<?php echo $image['sizes']['thumbnail']; ?>" alt="<?php echo $image['title']; ?>" />
	                </a>
					<?php $current_position = $images->$image + 1; // current_post starts at 0 
						//if position is equal to the divider and not the last result close the currently open div and start another
						if (/* $image < $image->$total && */ $counter % $divider == 0) : ?>
							</li><li class="item">							
					<?php endif; ?>
				<?php endforeach; ?>
			  	</li>
			</ul>
			
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
		<?php endif; ?>
</section>

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