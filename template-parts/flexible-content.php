<?php // check if the flexible content field has rows of data
	if( have_rows('custom_layouts') ):
	    while ( have_rows('custom_layouts') ) : the_row();
			$image = get_sub_field('image');
	        if( get_row_layout() == '2_col_1' ): ?>
			<section id="two-col-one" class="row">
	        	<div class="content col-xs-10 col-xs-offset-1 col-sm-5 col-sm-offset-1">
	        		<?php the_sub_field('text'); ?>
	        	</div>
	        	<img class="img-responsive hidden-xs col-sm-4 col-sm-offset-1" src="<?php echo $image['url']; ?>" alt="<?php echo $image['title']; ?>" />
			</section>
	        <?php elseif( get_row_layout() == '2_col_2' ): ?>
	        <section id="two-col-two" class="row">
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