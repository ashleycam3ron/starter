<?php get_header();?>
	<section class="container">
		<?php while(have_posts()) : the_post();?>

			<article class="entry col-md-10 col-md-offset-1">
				<h1><?php the_title();?></h1>
				<?php the_content();?>
			</article>

		<?php endwhile;?>

		<?php //comment_form(); ?>
		<?php //comments_template( $file, $separate_comments ); ?>
	</section>
<?php get_footer();?>