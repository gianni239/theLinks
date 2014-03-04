<?php get_header(); ?>
	
	
	<div class="container page-content">
		
		<div class="row main-content">
			<div class="col-md-8 col-sm-8">
			
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

				<article <?php post_class() ?> id="post-<?php the_ID(); ?>">

					<h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>

					<?php include (TEMPLATEPATH . '/_/inc/meta.php' ); ?>

					<div class="entry">
						<?php the_content(); ?>
					</div>

					<footer class="postmetadata">
						<?php the_tags('Tags: ', ', ', '<br />'); ?>
						Posted in <?php the_category(', ') ?> | 
						<?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?>
						<?php edit_post_link('Edit this entry','','.'); ?>
					</footer>

				</article>

			<?php endwhile; ?>
		
			<?php include (TEMPLATEPATH . '/_/inc/nav.php' ); ?>
		
			<?php else : ?>
		
				<h2>Not Found</h2>
		
			<?php endif; ?>
			
			</div>
			<div class="col-md-4 col-sm-4">
				<?php get_sidebar(); ?>
			</div>
		</div> <!--/ row -->
	
	</div> <!-- / page-content -->
					

<?php get_footer(); ?>