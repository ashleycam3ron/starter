<?php
/*
Template Name: News Archive
*/

get_header(); ?>

<section id="news" class="container">
	<div class="row">
		<h1><?php the_title(); ?></h1>
		<?php
			$big = 999999999; // need an unlikely integer
			$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
			$args = array(
				'post_type' => 'post',
				'category_name' => 'News',
				'posts_per_page' => 5,
				'paged' => $paged,
				'orderby' => 'date',
				'order' => 'DESC' );
			$wp_query = new WP_Query( $args );
			while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>

	    <article class="entry" id="post-<?php the_ID(); ?>">
			<?php if ( has_post_thumbnail()) { ?>
              <a href="<?php the_permalink(); ?>">
			  	<?php echo get_the_post_thumbnail($post->ID, 'thumbnail'); ?>
              </a>
            <?php } ?>
		      <h3><?php the_title(); ?></h3>
		      <small class="date">
			    by <?php $posttags = get_the_tags();
					if ($posttags) {
					  foreach($posttags as $tag) {
					    echo $tag->name . ' ';
					  }
					} ?>
				on <?php the_date('F d, Y'); ?></small>
		      <div class="excerpt"><?php the_excerpt(); ?></div>
	    </article>

		<?php endwhile; ?>

		<?php if ($wp_query->max_num_pages > 1) { // check if the max number of pages is greater than 1  ?>
		  <?php if (function_exists("wp_bs_pagination")){
		     //wp_bs_pagination($the_query->max_num_pages);
		     wp_bs_pagination();
			}
			?>
		<?php } ?>

		<aside class="featured col-md-3"><?php get_sidebar(); ?></aside>
	</div> <!-- end .row -->
</section>
<?php get_footer();?>