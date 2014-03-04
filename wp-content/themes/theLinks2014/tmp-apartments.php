<?php
/*
Template Name: Apartments
*/
?>

<?php get_header(); ?>
	
	<div class="container">		
			<div class="row">
								
					<div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">					
						<div class="page-content">
							<?php if (have_posts()) : while (have_posts()) : the_post();
										$parent_title = get_the_title($post->post_parent); ?>
							<h1><?php echo $parent_title; ?></h1>
							<?php $parent = get_post($post->post_parent);
										$parentContent = $parent->post_content; ?>
							<p><?php echo $parentContent; ?></p>
							<?php endwhile; endif; ?>	
							
							<div class="apartment-nav">
								<ul>									
										<?php
											$count = 0;
											$pages = get_pages('child_of=10&depth=1');
										  foreach($pages as $page) {
										    $count++;
										  }
										  //echo $count;
										  for ($i = 1; $i <= $count; $i++) { ?>
										  <li><span><?php echo $i; ?></span></li>
										<?php 
											} ?>
								</ul>
							</div>
											
						</div>
					</div>
					
					<div class="col-lg-6 col-md-7 col-sm-8 col-xs-12" id="siteloader" style="display:none;">					
											
					</div>
					
			</div>			
	</div>

	<div class="gallery-viewfinder">
	    <ul class="hp-layout">    	
	    	<?php 
	    	$my_array = get_custom_field( 'superBKG:to_array', 'to_image_tag');
				foreach ($my_array as $item) {
				print '<li>' . $item . '</li>';
				}	?>	          
	    </ul>
	</div>			

	<div id="push"></div>

</div><!-- /wrap -->

<?php get_footer(); ?>	