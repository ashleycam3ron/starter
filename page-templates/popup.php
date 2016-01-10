<?php
/*
Template Name: Popup
*/
?>
<link rel="stylesheet" type="text/css" media="screen" href="<?php echo get_bloginfo('stylesheet_url'); ?>" />
<!--[if lte IE 9]>
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_directory'); ?>/css/ie.css">
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<style>
body{background:none;border:0;}
.entry{border: 5px solid #E7CDCD;}
.entry#post-179{padding:60px 20px 48px 105px;width:auto;background:url(<?php bloginfo('stylesheet_directory'); ?>/images/alert.png) no-repeat 17px 62px;}
</style>
<?php define('WP_USE_THEMES', false);
the_post(); ?>
<div class="entry" id="post-<?php the_ID(); ?>">
<h1 class="title"><?php the_title(); ?></h1>
<?php the_content(); ?>
</div>
