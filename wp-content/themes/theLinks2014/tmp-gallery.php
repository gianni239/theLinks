<?php
/*
Template Name: Gallery
*/
?>

<?php get_header(); ?>

	<div class="gallery-show" style="display: none;">
		<a class="show-interface"><i class="fa fa-th-large"></i></a>
		<a class="prev-img"><i class="fa fa-chevron-left"></i></a>
		<a class="next-img"><i class="fa fa-chevron-right"></i></a>
	</div>

	<div class="container panel-fade">		
			<div class="row">
								
					<div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">					

									<div class="gallery-extra">
										<a class="hide-interface"><i class="fa fa-th-large"></i></a>										
										<a class="prev-img"><i class="fa fa-chevron-left"></i></a>
										<a class="next-img"><i class="fa fa-chevron-right"></i></a>
									</div>

									<div class="gallery-thumbs">
										<a class="scroll-left"><i class="fa fa-chevron-up"></i></a>
											<div class="mask">
								  			<ul>
								  			</ul>
											</div>
										<a class="scroll-right"><i class="fa fa-chevron-down"></i></a>
									</div>									
									
					</div>
					
			</div>			
	</div>
	
	<div class="gallery-viewfinder">
	    <ul class="hp-layout">    	
	    	<?php 
	    	if (have_posts()) : while (have_posts()) : the_post();													
				$my_array = get_custom_field('superBKG:to_array','to_image_tag');
				foreach ($my_array as $item) {
				print '<li>' . $item . '</li>';
				}														
				endwhile; endif; ?>	          
	    </ul>
	</div>
	
	<div id="push"></div>

</div><!-- /wrap -->
	
<?php get_footer(); ?>
