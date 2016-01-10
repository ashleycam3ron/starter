<?php query_posts(array('category_name' => 'Collection', 'posts_per_page' => -1,'orderby' => 'date', 'order' => 'ASC')); ?>
	<?php while ( have_posts() ) : the_post(); ?>
        <article class="post" id="post-<?php the_ID(); ?>">
	      <?php if ( has_post_thumbnail()) { ?>
              <aside class="featured col-md-4">
                  <?php $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large');
                   echo '<a class="fancybox" href="' . $large_image_url[0] . '" title="' . the_title_attribute('echo=0') . '" >';
                   echo get_the_post_thumbnail($post->ID, 'medium');
                   echo '</a>';
				   echo '<span>' . get_post( get_post_thumbnail_id() )->post_excerpt . '</span>'; ?>
              </aside>
			<div class="col-md-8">
	            <h2><?php the_title(); ?></h2>
	            <?php the_content(); ?>
			</div>
		  <?php } else { ?>
		    <div class="col-md-12">
	            <h2><?php the_title(); ?></h2>
	            <?php the_content(); ?>
			</div>
		  <?php } ?>
		  <?php edit_post_link('Edit this entry.', '<p>', '</p>'); ?>
        </article>
<?php endwhile; ?>
<?php wp_reset_query(); ?>