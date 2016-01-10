<?php
/*
Template Name: Gallery
*/
 get_header();?>
<div id="container" class="container">	
<?php 
 
/*
$image_ids = get_field('gallery', false, false);
 
$shortcode = '
[gallery ids="' . implode(',', $image_ids) . '"]
';
 
echo do_shortcode( $shortcode );
 
*/
?>		

<header id="gallery-template">
	<a href="http://minnowproject.com" id="logo">the minnow PROJECT</a>
</header>

<?php
$images = get_field('gallery');
 
if( $images ): ?>
    <div id="gallery">
        <ul class="slides">
            <?php foreach( $images as $image ): ?>
                <li>
                  <a href="<?php echo $image['sizes']['large']; ?>">
                    <img src="<?php echo $image['sizes']['medium']; ?>" rel="group" />
                    <p class="title"><?php echo $image['title']; ?><span class="line"></span></p>
                    <div class="cover"></div>
                    <div class="post_type">
						<i class="icon"></i>
					</div>
                  </a>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
    <?php
 
    /*
    *  The following code creates the thumbnail navigation
    */
 
    ?>
    <!--
<div id="carousel" class="flexslider">
        <ul class="slides">
            <?php foreach( $images as $image ): ?>
                <li>
                    <img src="<?php echo $image['sizes']['thumbnail']; ?>" alt="<?php echo $image['alt']; ?>" />
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
-->
<?php endif; ?>
</div>
<?php get_footer();?>