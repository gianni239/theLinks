<?php
/*
Template Name: Homepage
*/
?>

<?php get_header(); ?>
	
	
	<div class="container page-content">
	
		<div class="row page-carousel">
		
			<!-- carousel -->
			
			<?php $is_gallery = get_post_meta($post->ID, 'carousel_image', true); if (!empty($is_gallery)) { ?>
			
			<div id="carousel-example-generic" class="carousel slide bs-docs-carousel-example">
		    	<ol class="carousel-indicators">
		        	<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
					<li data-target="#carousel-example-generic" data-slide-to="1"></li>
					<li data-target="#carousel-example-generic" data-slide-to="2"></li>
		        </ol>
				<div class="carousel-inner">
					<?php $my_array = get_custom_field('carousel_array_image:to_array','to_image_src');
				    $first=true;
						foreach ($my_array as $item) {
						if($first){
							print '<div class="item active"><img src="' . $item . '"></div>';
							$first=false;
						} else {
							print '<div class="item"><img src="' . $item . '"></div>';	
						}
					}?>
				</div><!-- /inner -->
				<a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
					<i class="fa fa-angle-left fa-3x prev"></i>
				</a>
				<a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
					<i class="fa fa-angle-right fa-3x next"></i>
				</a>
			</div><!-- /carousel -->			
			
			<?php } ?>
			
		</div> <!-- /page-carousel -->
		
		<div class="row main-content">
			<div class="col-md-8 col-sm-8">
			
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		
				<h1><?php the_title(); ?></h1>
				<?php the_content(); ?>
				<?php edit_post_link('Edit this entry.', '<p>', '</p>'); ?>
		
			<?php endwhile; endif; ?>
			
			</div>
			<div class="col-md-4 col-sm-4">
				<aside class="services-aside">
					<h2>All Services</h2>
					<?php wp_nav_menu( array(
						'theme_location' => 'services_menu',
						'container' =>false,
						'items_wrap' => '<ul class="nav nav-pills" id="services-nav">%3$s</ul>',
						'echo' => true,
						'before' => '',
						'after' => '',
						'link_before' => '',
						'link_after' => '',
						'depth' => 0 )
					); ?>
				</aside>
			</div>
		</div> <!--/ row -->
	
	</div> <!-- / page-content -->
					

<?php get_footer(); ?>