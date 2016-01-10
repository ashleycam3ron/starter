<section>
    <h2 class="hidden">Tabs</h2>
	<?php
		$args = array(
			'category_name' => 'projects',
			'post_status' 	=> 'publish',
			'orderby'		=> 'post_title',
			'order'			=> 'ASC'
		);
		$tabs = new WP_Query( $args );
		$divider = 3; // # of items/thumbnails to show before closing the element and opening another ?>

	<?php /*if( $tabs->have_posts() ) : ?>
		<ul id="accordion">
			<li class="item col-sm-4">
			    <?php while( $tabs->have_posts() ) : $tabs->the_post(); ?>
					<h3><?php the_title(); ?></h3>

			    <?php endwhile; ?>
			</li><!-- end .item -->
		</ul>
	<?php endif; */ ?>

    <div id="tabs">
      <ul>
        <li><a href="#tabs-1"><h2>Tab 1</h2></a></li>
        <li><a href="#tabs-2"><h2>Tab 2</h2></a></li>
        <li><a href="#tabs-3"><h2>Tab 3</h2></a></li>
      </ul>
      <div id="tabs-1">
        <ul>
            <li>Providing all materials, labor, equipment and services.</li>
            <li>Subcontracting with various trade and specialty contractors.</li>
            <li>Applying for or assisting in the application process for building permits.</li>
            <li>Monitoring schedule and cash flow.</li>
            <li>Maintaining accurate records.</li>
            <li>Ensuring a safe and secure project site.</li>
        </ul>
      </div>
      <div id="tabs-2">
          <h3><?php the_title(); ?></h3>
          <p>Ut posuere viverra nulla. Aliquam erat volutpat. Pellentesque convallis. Maecenas feugiat, tellus pellentesque pretium posuere, felis lorem euismod felis, eu ornare leo nisi vel felis. Mauris consectetur tortor et purus.</p>
          <h3><?php the_title(); ?></h3>
          <p>Ut posuere viverra nulla. Aliquam erat volutpat. Pellentesque convallis. Maecenas feugiat, tellus pellentesque pretium posuere, felis lorem euismod felis, eu ornare leo nisi vel felis. Mauris consectetur tortor et purus.</p>
      </div>
      <div id="tabs-3">
          <h3><?php the_title(); ?></h3>
          <p>Ut posuere viverra nulla. Aliquam erat volutpat. Pellentesque convallis. Maecenas feugiat, tellus pellentesque pretium posuere, felis lorem euismod felis, eu ornare leo nisi vel felis. Mauris consectetur tortor et purus.</p>
          <h3><?php the_title(); ?></h3>
          <p>Ut posuere viverra nulla. Aliquam erat volutpat. Pellentesque convallis. Maecenas feugiat, tellus pellentesque pretium posuere, felis lorem euismod felis, eu ornare leo nisi vel felis. Mauris consectetur tortor et purus.</p>
       </div>
    </div>

</section>

<script>
jQuery(document).ready(function($) {
    $( "#tabs" ).tabs({
     // event: "mouseover"
    });
});
</script>