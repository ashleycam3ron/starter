<?php
// CUSTOMIZE ADMIN MENU LABELS
/*
	function edit_admin_menus() {
	    global $menu;
	    global $submenu;

	    $menu[5][0] = 'News'; // Change Posts to News
	    $submenu['edit.php'][5][0] = 'All News';
*/


	    //remove_menu_page('tools.php'); // Remove the Tools menu
	    //remove_submenu_page('themes.php','theme-editor.php'); // Remove the Theme Editor submenu
/*
	}
	add_action( 'admin_menu', 'edit_admin_menus' );
*/


// CUSTOMIZE ADMIN MENU ORDER
   function custom_menu_order($menu_ord) {
       if (!$menu_ord) return true;

       return array(
           'index.php', // Dashboard
           'separator1', // First separator
           'edit.php?post_type=menu', // Custom type one
           'edit.php', // Posts
           'edit.php?post_type=page', // Pages
           'upload.php', // Media
           'edit-comments.php', // Comments
           'separator2', // Second separator
           'themes.php', // Appearance
           'plugins.php', // Plugins
           'users.php', // Users
           'tools.php', // Tools
           'options-general.php', // Settings
           'separator-last', // Last separator
       );
   }
   add_filter('custom_menu_order', 'custom_menu_order'); // Activate custom_menu_order
   add_filter('menu_order', 'custom_menu_order');