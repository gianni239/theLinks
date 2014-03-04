<?php
/*
Template Name: General Info
*/
?>

<?php get_header(); ?>
	
	
	<div class="container page-content">
		
		<div class="row main-content">
			<div class="col-md-12">
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<h1><?php the_title(); ?></h1>
			</div>
		</div> <!--/ row -->
		
		<div class="row">
			<div class="col-md-8">
				
				<?php the_content(); ?>
				<?php endwhile; endif; ?>
				<?php wp_reset_query(); ?>
				
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
			
			<div class="col-md-4">
				<h2>Patient Information Forms</h2>
				<?php
				 $args = array(
				    'post_type'      => 'resources',
				    'posts_per_page' => -1,
				    'order'          => 'DESC',
				    'orderby'        => 'ID',
				    );
				 $wp_query = new WP_Query( $args );
				 
				if ( $wp_query->have_posts() ) : ?>
						 
			    <?php while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>
			 
				    <div class="info-box">
				        <h2><?php the_title(); ?></h2>
				        <p><?php the_excerpt(); ?></p>
				        <?php print_custom_field('resource:get_post','<a class="btn btn-default" href="[+guid+]"><i class="fa fa-download"></i> Download PDF</a>'); ?>
				    </div>        
				 
				<?php endwhile; endif; ?>
				<?php wp_reset_query(); ?>
				
				<h2>Reference Links</h2>
				
				<?php
				 $args = array(
				    'post_type'      => 'links',
				    'posts_per_page' => -1,
				    'order'          => 'DESC',
				    'orderby'        => 'ID',
				    );
				 $wp_query = new WP_Query( $args );
				 
				if ( $wp_query->have_posts() ) : ?>
				
			    <?php while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>
			 
				    <div class="info-box">
				        <h2><?php the_title(); ?></h2>
				        <p><?php the_excerpt(); ?></p>
				        <a class="btn btn-default" href="<?php print_custom_field('link_url'); ?>">Visit Website</a>
				    </div>        
				    
				<?php endwhile; endif; ?>
				<?php wp_reset_query(); ?>
				
			</div><!-- /col -->
		</div><!-- /row -->
	
	</div> <!-- / page-content -->
					

<?php get_footer(); ?>