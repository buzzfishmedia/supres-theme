<?php

$sidebars = get_option('sidebars_widgets');

// Check that there are sidebars where we want them.
if( $sidebars['navigation-widget-area'] ) {
	echo '<div class="navbar navbar-justified"><ul id="ocpaging-nav">';
	$nav_menus = get_option('widget_nav_menu');

	if( $nav_menus ) {
		foreach( $sidebars['navigation-widget-area'] as $menu ) {
			$menu_id = ltrim( $menu, 'nav_menu-' );
			//echo "Menu ID: " . $menu_id . "\n";
			
			foreach( $nav_menus as $nav_menu ) {
				if( $nav_menu['nav_menu'] == $menu_id ) {
					echo '<li class="item"><span style="text-align:center">' . $nav_menu['title'] . '</span></li>';
				}
			}
		}
	}

	echo "</ul></div>";
}
?>
<div id="occontent-box" class="owl-carousel">
	<?php dynamic_sidebar( 'navigation-widget-area' ); ?>
</div>