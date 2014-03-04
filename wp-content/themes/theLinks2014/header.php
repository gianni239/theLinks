<!DOCTYPE html>
<html>
  <head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<?php if (is_search()) { ?>
	<meta name="robots" content="noindex, nofollow" /> 
	<?php } ?>
	
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	
	<meta name="title" content="<?php wp_title( '|', true, 'right' ); ?>">
		   
	<!-- description meta -->	   
	<meta name="description" content="<?php bloginfo('description'); ?>">
	<meta name="author" content="Author Here">
	<meta name="Copyright" content="Copyright Here">
	<meta name="google-site-verification" content="">
	
	<!-- icons -->
	<link rel="shortcut icon" href="<?php bloginfo('template_directory'); ?>/_/img/favicon.ico">
	<link rel="apple-touch-icon" href="<?php bloginfo('template_directory'); ?>/_/img/apple-touch-icon.png">
	
	<!-- css -->
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">
	
	<!-- js -->
	
	<!-- mobile -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<!-- The Rest -->
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	
	<!-- Remember to re-compile -->
	<script src="<?php echo get_template_directory_uri(); ?>/_/js/modernizr-2.6.2.dev.js"></script>

	<?php // wp_head(); ?>
	
</head>

<body <?php body_class(""); ?>>

<!-- Sticky Footer Wrap -->
<div id="wrap">
	
<header class="container panel-fade">

	<div class="row">
						
			<div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">					
				<div class="logo">
					<a><img src="<?php bloginfo('template_directory'); ?>/_/img/logo.png"></a>
				</div>
			</div>
			<div class="col-lg-9 col-md-9 col-sm-8 col-xs-12">
			<?php wp_nav_menu( array(
				'theme_location' => 'header_menu',
				'container' =>false,
				'items_wrap' => '<div class="navbar navbar-default" role="navigation">
														<div class="navbar-header">
															<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span></button>
															<div class="collapse navbar-collapse">
																<ul class="nav navbar-nav">%3$s</ul>
															</div>
														</div>
													</div>',
				'echo' => true,
				'before' => '',
				'after' => '',
				'link_before' => '',
				'link_after' => '',
				'depth' => 0 )
			); ?>
			</div>
			
	</div>
	
</header>

	
				
				
				
				
				
				
			