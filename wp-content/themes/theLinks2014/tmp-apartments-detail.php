<?php
/*
Template Name: Apartment-Detail
*/
?>


	

					
					<div class="page-content detail">
							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
							<h1><?php the_title(); ?></h1>
							<?php	
							the_content();
							edit_post_link('Edit this entry.', '<p>', '</p>');
							endwhile; endif; ?>							
						</div>
					
					






				
						
				