<section id="testimonials" class="row">
    <div class="label"></div>
    <h2 style="display: none;">Testimonials</h2>
    <div id="carousel1" class="carousel slide col-md-10 col-md-offset-1">
    	<?php 
            $testimonials = new WP_Query(array(
			    'post_type' => 'post',
			    'cat'		=> 4,
			    'posts_per_page' => 4,
			    'orderby' => 'menu_order',
			    'order' => 'ASC',
			    ));
			$count = 0;
		?>
    	<ol class="carousel-indicators">
		    <?php while ($testimonials->have_posts()) : $testimonials->the_post(); ?>
		    <li <?php if ( $count == 0){ echo 'class="active"';} ?> data-target="#carousel1" data-slide-to="<?php echo $count++; ?>"></li>
		    <?php endwhile;  wp_reset_postdata(); ?>
		</ol>

        <div class="carousel-inner">
          <?php 
			$count = 0;
            while ($testimonials->have_posts()) : $testimonials->the_post(); 
             
             $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large' ); ?>
			<div class="item <?php if ( $count == 0){ echo 'active';};?>" data-slide-number="<?php echo $count++;?>" style="background:url(<?php echo $image[0];?>) no-repeat center; background-size:cover;">
			     <h3><?php the_title();?></h3>
			</div><!-- item active -->
			<?php endwhile; wp_reset_postdata(); ?>
        </div>

        <a class="carousel-control prev" href="#carousel1" data-slide="prev"></a>
        <a class="carousel-control next" href="#carousel1" data-slide="next"></a>
    </div><!-- end #carousel -->
</section>