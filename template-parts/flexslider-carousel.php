<section class="col-xs-12 col-sm-5 col-md-7">
    <h2>Mini Gallery</h2>
		<?php $images = get_field('gallery');
		if( $images ): ?>
		  <div id="mini-carousel" class="flexslider row">
			<ul class="slides">
			  <?php foreach( $images as $image ): ?>
				<li>
					<a href="<?php echo $image['sizes']['large']; ?>" class="fancybox" rel="mini">
	                    <img class="img-responsive" src="<?php echo $image['sizes']['thumbnail']; ?>" alt="<?php echo $image['title']; ?>" />
	                </a>
				</li>
			  <?php endforeach; ?>
			</ul>
		  </div>
		<?php endif; ?>
</section>

<script>
jQuery(document).ready(function($) {
	$('#mini-carousel').flexslider({
		touch: true,
	    animation: "slide",
	    selector: ".slides > li",
	    animationLoop: false,
	    slideshowSpeed:8000,
	    animationSpeed:2000,
	    itemWidth: 150,
	    itemMargin: 2,
	    animationLoop: true,
	    controlNav: true,               //Boolean: Create navigation for paging control of each clide? Note: Leave true for manualControls usage
		directionNav: false,             //Boolean: Create navigation for previous/next navigation? (true/false)
		prevText: "Previous",           //String: Set the text for the "previous" directionNav item
		nextText: "Next",
		maxItems: 8
	  });
	$('.fancybox').fancybox({
		padding: 0
	});
});
</script>