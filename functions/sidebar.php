<?php
add_action( 'widgets_init', 'ashleycameron_widgets_init' );
function ashleycameron_widgets_init() {
    register_sidebar( array(
        'name' => __( 'Main Sidebar', 'sidebar' ),
        'id' => 'sidebar',
        'description' => __( 'Widgets in this area will be shown on all posts and pages.', 'ashleycameron' ),
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget'  => '</li>',
		'before_title'  => '<h2 class="widgettitle">',
		'after_title'   => '</h2>',
    ));
}