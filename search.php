<?php get_header(); ?>
	<div id="primary">
    	<div class="entry">
			<h1>Search Results</h1>
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <article class="post" id="post-<?php the_ID(); ?>">
                    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                    <?php the_excerpt("Read More"); ?>
                </article>
			<?php endwhile; else : ?>
       		<h2>No posts found.</h2>
	<?php endif; ?>
    </div>
    <div class="clear"></div>
</div>
<?php get_footer(); ?>