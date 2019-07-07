<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- viewport for korrekt skalering på tværs af medieenheder -->
	
	<meta name="description" content="wpstrapit - wp bs starter">	
	<meta name="keywords" content="wpstrapit">
	
	<title><?php bloginfo('name'); ?></title>
    
    <?php wp_head(); ?>
	
</head>
<body>
    
<!-- HEADER, NAVIGATION MM.-->	
		<header class="row">
			<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
				<div class="container"> <!-- makes the menu align with the content-->
					<div class="navbar-header">
						<div class="navbar-brand pull-left"><a href="<?php echo site_url(); ?>"><?php bloginfo( 'name' ); ?></a></div>
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#collapse">
						<span class="sr-only">Toggle Navigation</span> <!-- Kun til Screen Readers accessibility -->
						<div class="collapsedbaricon">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</div>
						
					</div>
					 <?php
                        wp_nav_menu( array(
                            'menu'              => 'mainmenu',
                            'theme_location'    => 'mainmenu',
                            'depth'             => 2,
                            'container'         => 'div',
                            'container_class'   => 'collapse navbar-collapse',
                            'container_id'      => 'collapse',
                            'menu_class'        => 'nav navbar-nav navbar-right',
                            'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                            'walker'            => new wp_bootstrap_navwalker())
                        );
                    ?>
				</div> <!-- Lukker div class container-->
			</nav>
		</header>
		
		
<!-- Søgefelt -->

	<div class="container">
		<section class="row" id="soeg">
			<div class="col-md-12">
				<?php get_search_form(); ?>	
			</div>
		</section>
	</div>		



    