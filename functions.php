<?php

if( defined('WP_COMPOSER') and WP_COMPOSER == false ){
	
}

$childtheme = new WordPress\Theme('Tacklebox Child');

$global_scripts = array(
	array(
		'name' => 'owlcarousel-script',
		'type' => 'script',
		'location' => get_stylesheet_directory_uri() . '/bower_components/owlcarousel/owl-carousel/owl.carousel.min.js',
		'method' => 'enqueue',
		'dependencies' => array('jquery')
	),
	array(
		'name' => 'owlcarousel-style',
		'type' => 'style',
		'location' => get_stylesheet_directory_uri() . '/bower_components/owlcarousel/owl-carousel/owl.carousel.css',
		'method' => 'enqueue'
	),
	array(
		'name' => 'owlcarousel-theme',
		'type' => 'style',
		'location' => get_stylesheet_directory_uri() . '/bower_components/owlcarousel/owl-carousel/owl.theme.css',
		'method' => 'enqueue'
	),
	array(
		'name' => 'owlcarousel-custom-theme',
		'type' => 'style',
		'location' => get_stylesheet_directory_uri() . '/assets/css/owl.custom.theme.css',
		'method' => 'enqueue'
	)
);

$childtheme->loadScripts($global_scripts);

$child_widgets = array(
	array(
			'name' => __( 'Navigation', 'tacklebox' ),
			'id' => 'navigation-widget-area',
			'before_title' => '<h2 class="widget-title" style="display:none;">',
			'before_widget' => '<aside id="%1$s" class="widget item %2$s">',
			'after_widget' => '</aside>'
	)
);
$childtheme->addWidgets($child_widgets);


// Owl  Carousel
function ocinit() {
	?>
	<script>
	/*
	jQuery(document).ready(function($) {
		$("#primary-navigation").owlCarousel({
			navigation : true,
			navigationText : ['Commercial', 'Residential'], 
			slideSpeed : 300,
			pagination: false,
			paginationSpeed : 400,
			singleItem : true,
			baseClass : "owl-carousel",
			theme : "owl-theme",
		});
	});
	*/

	jQuery(document).ready(function($) {
	 
	  var sync1 = $("#occontent-box");
	  var sync2 = $("#ocpaging-nav");
	 
	  sync1.owlCarousel({
	    singleItem : true,
	    slideSpeed : 1000,
	    navigation: false,
	    pagination:false,
	    afterAction : syncPosition,
	    responsiveRefreshRate : 200,
	  });
	 
	  sync2.owlCarousel({
	    itemsDesktop      : [1199,10],
	    itemsDesktopSmall     : [979,10],
	    itemsTablet       : [768,8],
	    itemsMobile       : [479,4],
	    pagination:false,
	    responsiveRefreshRate : 100,
	    afterInit : function(el){
	      el.find(".owl-item").eq(0).addClass("synced");
	    }
	  });
	 
	  function syncPosition(el){
	    var current = this.currentItem;
	    $("#ocpaging-nav")
	      .find(".owl-item")
	      .removeClass("synced")
	      .eq(current)
	      .addClass("synced")
	    if($("#ocpaging-nav").data("owlCarousel") !== undefined){
	      center(current)
	    }
	  }
	 
	  $("#ocpaging-nav").on("click", ".owl-item", function(e){
	    e.preventDefault();
	    var number = $(this).data("owlItem");
	    sync1.trigger("owl.goTo",number);
	  });
	 
	  function center(number){
	    var sync2visible = sync2.data("owlCarousel").owl.visibleItems;
	    var num = number;
	    var found = false;
	    for(var i in sync2visible){
	      if(num === sync2visible[i]){
	        var found = true;
	      }
	    }
	 
	    if(found===false){
	      if(num>sync2visible[sync2visible.length-1]){
	        sync2.trigger("owl.goTo", num - sync2visible.length+2)
	      }else{
	        if(num - 1 === -1){
	          num = 0;
	        }
	        sync2.trigger("owl.goTo", num);
	      }
	    } else if(num === sync2visible[sync2visible.length-1]){
	      sync2.trigger("owl.goTo", sync2visible[1])
	    } else if(num === sync2visible[0]){
	      sync2.trigger("owl.goTo", num-1)
	    }
	    
	  }
	 
	});
	</script>
	<?php
}
add_action('wp_footer', 'ocinit', 200 );