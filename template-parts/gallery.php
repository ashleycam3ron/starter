<?php if (get_field('gallery')){ ?>
	<section id="gallery" class="container">
	 <?php $images = get_field('gallery');
		if( $images ): ?>
        <ul>
            <?php foreach( $images as $image ): ?>
            <li class="col-xs-3 col-sm-3 col-md-2">
                <a href="<?php echo $image['sizes']['large']; ?>" class="fancybox" rel="pizza">
                    <img class="img-responsive" src="<?php echo $image['sizes']['thumbnail']; ?>" alt="<?php echo $image['title']; ?>" />
                </a>
            </li>
            <?php endforeach; ?>
        </ul>
    </section>
	<?php endif; ?>
<?php } ?>