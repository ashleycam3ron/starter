<?php 
/*

Template Name: Sitemap Page

*/

?>

<?php get_header(); ?>
	<section id="banner">
    	<h2>Banner</h2>
        <figure class="contain">
			<?php if ( has_post_thumbnail() ) { ?>
                  <?php the_post_thumbnail('full'); ?>
            <?php } else { ?>
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/example.jpg" alt="<?php the_title(); ?>" />
            <?php } ?>
        </figure>
    </section>
	<section id="bg4">
    	<h2>Content</h2>
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <article class="post contain" id="post-<?php the_ID(); ?>">
                  <nav class="sub">
                    <?php wp_nav_menu( array('menu' => 'main' )); ?>
                  </nav>
                <div class="title">
                	<h1 class="title"><?php the_title(); ?></h1>
                </div>
                <div class="entry">
<ul>
<?php
// Add pages you'd like to exclude in the exclude here
wp_list_pages(
  array(
    'exclude' => '',
    'title_li' => '',
  )
);
?>
</ul>
                    <?php edit_post_link('Edit this entry.', '<p>', '</p>'); ?>
                </div>
                <div id="email">
                  <div class="contain">
                    <p><?php the_field('email', 123); ?></p>
                    <nav>
                      <h2>Subscribe</h2>
                      <?php wp_nav_menu( array('menu' => 'email' )); ?>
                    </nav>
                  </div>
                </div>
            </article>
		<?php endwhile; endif; ?>
	</section>
<?php get_footer(); ?>