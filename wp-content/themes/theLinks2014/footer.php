
<div id="footer" class="panel-fade">
	<footer class="container">
		<div class="row">
        	<div class="col-lg-12">
        	<?php wp_nav_menu( array(
						'theme_location' => 'footer_menu',
						'container' =>false,
						'items_wrap' => '<div class="navbar navbar-default" role="navigation">
																		<div class="navbar-header">
																				<ul class="nav navbar-nav">%3$s</ul>
																		</div>
																	</div>',
								'echo' => true,
						'before' => '',
						'after' => '',
						'link_before' => '',
						'link_after' => '',
						'depth' => 0 )
					); ?>
        	</div> 		
		</div>
	</footer>
</div>

<?php wp_footer(); ?>

<!-- javascript -->

<script src="<?php bloginfo('template_directory'); ?>/_/js/jquery-1.9.1.min.js"></script>
<script src="<?php bloginfo('template_directory'); ?>/_/js/bootstrap.js"></script>
<script src="<?php bloginfo('template_directory'); ?>/_/js/jquery.mobile.custom.min.js"></script>
<script src="<?php bloginfo('template_directory'); ?>/_/js/functions.js"></script>
<?php if( is_page('Home') ){ ?><script src="<?php bloginfo('template_directory'); ?>/_/js/equalHeights.js"></script><?php } ?>

<script src="<?php bloginfo('template_directory'); ?>/_/js/jquery.easing.min.js"></script>
<script src="<?php bloginfo('template_directory'); ?>/_/js/backgroundGallery.js"></script>
<script>hideAddressbar('body');</script>
<script src="<?php bloginfo('template_directory'); ?>/_/js/respond.js"></script>

<?php if( is_page('Apartments') ){ ?><script>							
$(document).ready(function(){
   $(".apartment-nav ul").find('span').click(function () {
      var str = $(this).parents("li").index() + 1;
      var apartment = '<?php bloginfo('url'); ?>/apartments/apartment-' + str + '/';      
      $('#siteloader').fadeOut('slow', function(){
					$('#siteloader').load(apartment, function(){
							$('#siteloader').fadeIn('slow');
							});
					});      
		});
});
</script><?php } ?>

</body>

</html>
