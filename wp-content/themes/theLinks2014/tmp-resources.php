<?php
/*
Template Name: Resources
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
 
		<?php
		 $args = array(
		    'post_type'      => 'resources',
		    'posts_per_page' => -1,
		    'order'          => 'DESC',
		    'orderby'        => 'ID',
		    );
		 $wp_query = new WP_Query( $args );
		 
		if ( $wp_query->have_posts() ) : ?>
		
		<div class="row">
 
	    <?php $count=0; ?>    
	        <?php while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>
	 
		    <div class="col-md-4 col-sm-4">
			    <div class="info-box">
			        <h2><?php the_title(); ?></h2>
			        <p><?php the_excerpt(); ?></p>
			        <?php print_custom_field('resource:get_post','<a class="btn btn-default" href="[+guid+]"><i class="fa fa-download"></i> Download PDF</a>'); ?>
			    </div>        
		    </div>
		    
		<?php $count++; ?>
 
	    <?php if ($count==3 ||$wp_query->found_posts==0) : 
	        echo '</div><div class="row">';
	    ?>
	 
		<?php $count=0; ?>
		 
		    <?php endif; ?>
		    <?php endwhile; ?>
		 
		<?php else : ?>                
		    <h3>Sorry but there are no Resources.</h3>
		<?php endif; ?>
		 
		<?php wp_reset_query(); ?>
		</div><!-- /row -->
	
	</div> <!-- / page-content -->
					

<?php get_footer(); ?>