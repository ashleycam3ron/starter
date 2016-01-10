<?php
/*
Template Name: Staff
*/

get_header(); ?>
<div class="container text-center">
	<h2><?php the_title(); ?></h2>
</div>

<div id="staff" class="container">
	<div class="entry">
		<?php the_content(); ?>
	</div>
	
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<article <?php post_class(array('text-center','row')) ?> id="post-<?php the_ID(); ?>">
			<?php if( have_rows('staff') ): ?>

			<ul>
		
			<?php while( have_rows('staff') ): the_row(); 
				$image = get_sub_field('image');
				$name = get_sub_field('name');
				$title = get_sub_field('title');
				$phone = get_sub_field('phone');
				$email = get_sub_field('email');
				?>            
            
				<li class="col-md-3 card">
					<div class="avatar">
						<?php if ($image){ ?>
							<img class="img-responsive" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt'] ?>" />
						<?php }else{ ?>
							<img class="img-responsive" src="http://placehold.it/300x200">
						<?php } ?>
					</div>
					<div class="content">
						<h2><?php echo $name; ?></h2>
						<h3><?php echo $title; ?></h3>
						<p><?php echo $phone; ?></p>
	<!-- 					<p><button type="button" class="btn btn-default">Contact</button></p> -->
					</div>
					<div class="email"><a href="<?php echo $email; ?>"><i class="fa fa-envelope"></i>Email</a></div>
				</li>
		
			<?php endwhile; ?>
			</ul>

			<?php endif; ?>	
		</article>
	<?php endwhile; ?>
	<?php else : ?>
		<h2>Not Found</h2>
	<?php endif; ?>

</div>
<?php get_footer(); ?>