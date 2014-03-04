<aside class="blog-aside">

    <?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('Sidebar Widgets')) : else : ?>
    
    <!-- Show WooCommerce Categories -->
    <h3>Shop Categories</h3>	
  	
  	<ul class="nav nav-tabs nav-stacked">
    	<li><a href="#">Shop Category 1</a></li>
        <li><a href="#">Shop Category 2</a></li>
        <li><a href="#">Shop Category 3</a></li>
        <li><a href="#">Shop Category 4</a></li>
        <li><a href="#">Shop Category 5</a></li>
    </ul>
	
	<?php endif; ?>

</aside>