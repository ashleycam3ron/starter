<?php
/*
Template Name: FAQs
*/
get_header(); ?>

<?php get_header();?>
	<section class="container">
		<div class="row">

		 <?php $args = array(
				'post_type' => 'post',
				'category_name' => 'FAQs',
				'orderby' => 'date',
				'order' => 'ASC',
				'posts_per_page' => 10
				);
			$faqs = new WP_Query( $args );
			while ( $faqs->have_posts() ) : $faqs->the_post(); ?>

			<article class="col-md-10 col-md-offset-1">
				<header class="entry-header">
					<h2><?php the_title();?><span class="caret pull-right"></span></h2>
				</header>
				<div class="entry"><?php the_content();?></div>
			</article>

			<?php endwhile; ?>

		</div>
	</section>

<script type="text/javascript">
    jQuery(".entry").hide();
    jQuery(".entry-header").click(function () {
        jQuery(this).next(".entry").slideToggle(500);
        jQuery(this).toggleClass("active");
    });
</script>

<?php get_footer();?>


