<?php
	wp_enqueue_script( 'isotope', '//cdnjs.cloudflare.com/ajax/libs/jquery.isotope/2.2.2/isotope.pkgd.min.js', array('jquery'),  true );
	wp_enqueue_script( 'isotope-fix', 'https://cdnjs.cloudflare.com/ajax/libs/jquery.imagesloaded/4.0.0/imagesloaded.pkgd.min.js', array('jquery'),  true );
?>

<ul id="filters">
	<?php
		$args = array(
			'orderby' 		=> 'name',
			'parent' 		=> '4',
			'hide_empty' 	=> true,
		);
		$terms = get_terms("category", $args); // get all categories, but you can use any taxonomy
		$count = count($terms); //How many are they?
		if ( $count > 0 ){  //If there are more than 0 terms
			foreach ( $terms as $term ) {  //for each term:
				echo "<li><a href='#' data-filter='.".$term->slug."'>" . $term->name . "</a></li>\n";
				//create a list item with the current term slug for sorting, and name for label
			}
		}
	?>
</ul>

<ul id="isotope-list" class="projects">
<?php
  $projects = new WP_Query(array(
    'post_type' => 'post',
    'cat'		=> 4,
    'posts_per_page' => -1,
    'orderby' => 'menu_order',
    'order' => 'ASC',
    ));
?>
<?php while ($projects->have_posts()) : $projects->the_post();
	$termsArray = get_the_terms( $post->ID, "category" );  //Get the terms for this particular item
	$termsString = ""; //initialize the string that will contain the terms
		foreach ( $termsArray as $term ) { // for each term
			$termsString .= $term->slug.' '; //create a string that has all the slugs
		} ?>
		<li class="<?php echo $termsString; ?> col-xs-6 col-md-3 item"> <?php // 'item' is used as an identifier ?>
			<a href="<?php the_permalink(); ?>">
				<?php if ( has_post_thumbnail() ) {
                    	the_post_thumbnail('feature', array('class' => 'img-responsive'));
                	} else { ?>
                <img class="img-responsive" src="http://placehold.it/400x266" alt="placeholder">
            <?php } ?>
		        <h3><?php the_title();?></h3>
		        <?php if ( get_field('project_location')){ ?>
			       <p><span class="glyphicon glyphicon-map-marker"></span><?php the_field('project_location');?></p>
			     <?php } else { ?>
				 	<p>Location</p>
                <?php } ?>
			</a>
		</li> <!-- end item -->
<?php endwhile; wp_reset_postdata(); ?>
</ul>

<script>
jQuery(document).ready(function($) {
    //ISOTOPE for Projects
    var $container = $('#isotope-list'); //The ID for the list with all the blog posts
	$container.isotope({ //Isotope options, 'item' matches the class in the PHP
		itemSelector : '.item',
  		layoutMode : 'masonry'
	}).imagesLoaded(); //Isotope fix - make sure images are loaded before initializing

	//Add the class selected to the item that is clicked, and remove from the others
	var $optionSets = $('#filters'),
	$optionLinks = $optionSets.find('a');

	$optionLinks.click(function(){
	var $this = $(this);
	// don't proceed if already selected
	if ( $this.hasClass('selected') ) {
	  return false;
	}
	var $optionSet = $this.parents('#filters');
	$optionSets.find('.selected').removeClass('selected');
	$this.addClass('selected');

	//When an item is clicked, sort the items.
	 var selector = $(this).attr('data-filter');
	$container.isotope({ filter: selector });

	return false;
	});
});
</script>