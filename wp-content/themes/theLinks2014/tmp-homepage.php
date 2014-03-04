<?php
/*
Template Name: Homepage
*/
?>

<?php get_header(); ?>
	
	<div class="container">		
			<div class="row">
								
					<div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">					
						<div class="page-content">
							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>		
							<h1><?php the_title(); ?></h1>
							<?php the_content();
										edit_post_link('Edit this entry.', '<p>', '</p>');
										endwhile; endif; ?>
						
							<!--Gallery Control Bar-->
							<div id="controls-wrapper" class="load-item">
								<div id="controls">									
									<!--Gallery Navigation-->
									<ul class="hp-controls"></ul>							
								</div>
							</div>
							
						</div>
					</div>
					
			</div>			
	</div>

	<div class="gallery-viewfinder">
	    <ul class="hp-layout">    	
	    	<?php 
	    	$my_array = get_custom_field('superBKG:to_array','to_image_tag');
				foreach ($my_array as $item) {
				print '<li>' . $item . '</li>';
				}														
				?>	          
	    </ul>
	</div>			
	
	<div id="push"></div>

</div><!-- /wrap -->

<?php get_footer(); ?>

