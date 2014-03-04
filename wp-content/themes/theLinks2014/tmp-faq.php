<?php
/*
Template Name: FAQ
*/
?>

<?php get_header(); ?>
	
	
	<div class="container page-content">
		
		<div class="row main-content">
			<div class="col-md-12">
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<h1><?php the_title(); ?></h1>
			<?php endwhile; endif; ?>
			</div>
		</div> <!--/ row -->
		
		<?php wp_reset_query(); ?>
		
		<div class="row">
			<div class="col-md-12">
				<div class="panel-group" id="accordion">
				
					<?php $query = new WP_Query(array ( 'post_type' => 'faq', 'posts_per_page' => -1, 'orderby' => 'menu_order' )); 
						while ( $query->have_posts() ) : $query->the_post(); ?>
			
					<!-- Repeating Panel -->
					<div class="panel panel-default">
				    	<div class="panel-heading">
							<h4 class="panel-title">
								<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse-<?php the_ID(); ?>">
									<?php the_title(); ?>
								</a>
							</h4>
						</div>
						<div id="collapse-<?php the_ID(); ?>" class="panel-collapse collapse">
							<div class="panel-body">
								<?php the_excerpt(); ?>
							</div>
						</div>
					</div><!-- /panel -->
					
					<?php endwhile;	wp_reset_postdata();?>
				
				</div><!-- /panel-group -->
			
			</div><!-- /col -->
		</div><!-- /row -->
	
	</div> <!-- / page-content -->
					

<?php get_footer(); ?>