<!DOCTYPE html>
<!--[if lt IE 7]>      <html <html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html <html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html <html <?php language_attributes(); ?> class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html <html <?php language_attributes(); ?> class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php wp_head(); ?>

        <?php if( ! is_home() ) : ?>
            <script type="text/javascript">
            jQuery(document).ready(function($){
                //$("#occontent-box").css({'height':'0px', 'color': 'orange', 'overflow': 'hidden'});
                $("#occontent-box").addClass('hide');
                $("#ocpaging-nav span").click(function(){
                   //$("#occontent-box").css({'height':'auto', 'color': 'orange', 'overflow': 'visible'});
                   $("#occontent-box").removeClass('hide');
                   $("#occontent-box").addClass('show');
                   console.log(this);     
                });
            });
            </script>
        <?php endif; ?>
    </head>
    <body <?php body_class(); ?>>
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <!-- Add your site or application content here -->
        <section class="row">
            <div class="container">
                <header id="masthead" class="header" >
                    <div class="branding">

                        <?php if ( get_header_image() ) : ?>

                            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                                <img src="<?php header_image(); ?>" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="">
                            </a>

                        <?php endif; // End header image check. ?>
                        
                        <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                        <h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
                    </div>   
                </header>

                <nav id="primary-navigation">

                    <?php get_sidebar('navigation-widget-area'); ?>

                </nav>


            </div>
        </section>

        <section class="row">

        