<?php
        // Translations can be filed in the /languages/ directory
        load_theme_textdomain( 'html5reset', TEMPLATEPATH . '/languages' );
 
        $locale = get_locale();
        $locale_file = TEMPLATEPATH . "/languages/$locale.php";
        if ( is_readable($locale_file) )
            require_once($locale_file);
	
	// Add RSS links to <head> section
	automatic_feed_links();
	

	// Load jQuery
	if ( !function_exists( 'core_mods' ) ) {
		function core_mods() {
			if ( !is_admin() ) {
				wp_deregister_script( 'jquery' );
				wp_register_script( 'jquery', ( "/wp-content/themes/dr-tracy-md/_/js/jquery-1.9.1.min.js" ), false);
				wp_enqueue_script( 'jquery' );
			}
		}
		add_action( 'wp_enqueue_scripts', 'core_mods' );
	}
	

	// Clean up the <head>
	function removeHeadLinks() {
    	remove_action('wp_head', 'rsd_link');
    	remove_action('wp_head', 'wlwmanifest_link');
    }
    add_action('init', 'removeHeadLinks');
    remove_action('wp_head', 'wp_generator');
    
    if (function_exists('register_sidebar')) {
    	register_sidebar(array(
    		'name' => __('Sidebar Widgets','html5reset' ),
    		'id'   => 'sidebar-widgets',
    		'description'   => __( 'These are widgets for the sidebar.','html5reset' ),
    		'before_widget' => '<div id="%1$s" class="widget %2$s">',
    		'after_widget'  => '</div>',
    		'before_title'  => '<h2>',
    		'after_title'   => '</h2>'
    	));
    }
 
    
    add_theme_support( 'post-formats', array('aside', 'gallery', 'link', 'image', 'quote', 'status', 'audio', 'chat', 'video')); // Add 3.1 post format theme support.
    
    	//Add shortcode for site url
		function websiteurl_shortcode() {
			return get_bloginfo('url');
		}
		add_shortcode('url', 'websiteurl_shortcode');
		
		//Add shortcode for theme template url
		function theme_template_shortcode() {
			return get_bloginfo('template_url');
		}
		add_shortcode('template_url', 'theme_template_shortcode');
		
		
		// WP Title (based on twentythirteen: http://make.wordpress.org/core/tag/twentythirteen/)
		function html5reset_wp_title( $title, $sep ) {
			global $paged, $page;
		
			if ( is_feed() )
				return $title;
		
	//		 Add the site name.
			$title .= get_bloginfo( 'name' );
		
	//		 Add the site description for the home/front page.
			$site_description = get_bloginfo( 'description', 'display' );
			if ( $site_description && ( is_home() || is_front_page() ) )
				$title = "$title $sep $site_description";
		
	//		 Add a page number if necessary.
			if ( $paged >= 2 || $page >= 2 )
				$title = "$title $sep " . sprintf( __( 'Page %s', 'html5reset' ), max( $paged, $page ) );
		
			return $title;
		}
		add_filter( 'wp_title', 'html5reset_wp_title', 10, 2 );
		
		// Register Navigation Menus
		function custom_navigation_menus() {
		
			$locations = array(
				'header_menu' => __( 'Custom Header Menu', 'text_domain' ),
				'services_menu' => __( 'Sidebar Menu for Services Page', 'text_domain' ),
				'footer_menu' => __( 'Custom Footer Menu', 'text_domain' ),
				'mobile_menu' => __( 'Menu on mobile devices', 'text_domain' ),
			);
			register_nav_menus( $locations );
		
		}
		
		// Hook into the 'init' action
		add_action( 'init', 'custom_navigation_menus' );
		
		//PDF MIME type
		
		function modify_post_mime_types( $post_mime_types ) {  
  
	    // select the mime type, here: 'application/pdf'  
	    // then we define an array with the label values  
	  
	    $post_mime_types['application/pdf'] = array( __( 'PDFs' ), __( 'Manage PDFs' ), _n_noop( 'PDF <span class="count">(%s)</span>', 'PDFs <span class="count">(%s)</span>' ) );  
	  
	    // then we return the $post_mime_types variable  
	    return $post_mime_types;  
	  
	}  
	  
	// Add Filter Hook  
	add_filter( 'post_mime_types', 'modify_post_mime_types' );  
		
?>