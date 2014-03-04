<?php
/*
Template Name: Contact
*/
?>

<?php get_header(); ?>
	
	
	<div class="container page-content">
		
		<div class="row main-content">
			<div class="col-md-6 col-sm-6">
			
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		
				<h1><?php the_title(); ?></h1>
				<?php the_content(); ?>
				<?php edit_post_link('Edit this entry.', '<p>', '</p>'); ?>
		
			<?php endwhile; endif; ?>
			
				<ul class="social-links list-inline">
	    			<li>
	    				<a href="https://www.facebook.com/tracyschellermd" title="Facebook">
			        		<span class="fa-stack">
								<i class="fa fa-circle fa-stack-2x"></i>
								<i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
							</span>
	    				</a>
	    			</li>
	    			<li>
	    				<a href="#" title="Pinterest">
			        		<span class="fa-stack">
								<i class="fa fa-circle fa-stack-2x"></i>
								<i class="fa fa-pinterest fa-stack-1x fa-inverse"></i>
							</span>
	    				</a>
	    			</li>	
	    			<li>
	    				<a href="#" title="Instagram">
			        		<span class="fa-stack">
								<i class="fa fa-circle fa-stack-2x"></i>
								<i class="fa fa-instagram fa-stack-1x fa-inverse"></i>
							</span>
	    				</a>
	    			</li>   
	    			<li>
	    				<a href="https://twitter.com/tracyschellermd" title="Twitter">
			        		<span class="fa-stack">
								<i class="fa fa-circle fa-stack-2x"></i>
								<i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
							</span>
	    				</a>
	    			</li> 
	    			<li>
	    				<a href="#" title="Linked In">
			        		<span class="fa-stack">
								<i class="fa fa-circle fa-stack-2x"></i>
								<i class="fa fa-linkedin fa-stack-1x fa-inverse"></i>
							</span>
	    				</a>
	    			</li>       			     			
	    		</ul><!-- /social-links -->
			
			</div><!-- /col -->
			<div class="col-md-6 col-sm-6">
				<!-- Responsive iFrame -->
				<div class="flexible-container">				    
				    <iframe width="425" height="550" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com.au/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=300+Grand+Avenue+Suite+201+Englewood+NJ+07631&amp;aq=&amp;sll=-33.796924,150.922433&amp;sspn=1.321532,2.326355&amp;t=m&amp;ie=UTF8&amp;hq=&amp;hnear=300+Grand+Ave+%23201,+Englewood,+New+Jersey+07631,+United+States&amp;ll=40.883604,-73.978243&amp;spn=0.022712,0.036478&amp;z=14&amp;iwloc=A&amp;output=embed"></iframe>
				</div><!-- /flexible-container -->
			</div><!-- /col -->
		</div> <!--/ row -->
	
	</div> <!-- / page-content -->
					

<?php get_footer(); ?>