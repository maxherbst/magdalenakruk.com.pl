<?php
	add_action('wp_enqueue_scripts','css_js');

	function css_js(){
		if(!is_admin() && !is_login_page()){
			wp_enqueue_script('js','https://code.jquery.com/jquery-3.6.0.min.js',array('jquery'),null,true);
			wp_enqueue_script('plugins',get_bloginfo('template_url').'/assets/js/plugins.js',array(),'1.0',true);
			wp_enqueue_script('lg-zoom',get_bloginfo('template_url').'/assets/plugins/zoom/lg-zoom.min.js',array(),'1.0',true);
			wp_enqueue_script('main',get_bloginfo('template_url').'/assets/js/main.js',array(),'1.0',true);
			$array = array('templateUrl'=>get_stylesheet_directory_uri());
			wp_localize_script('main','template',$array);
			wp_enqueue_style('flickity',get_bloginfo('template_url').'/assets/css/flickity.css',array(),'1.0');
			wp_enqueue_style('lightgallery',get_bloginfo('template_url').'/assets/css/lightgallery.css',array(),'1.0');
			wp_enqueue_style('lg-zoom',get_bloginfo('template_url').'/assets/css/lg-zoom.css',array(),'1.0');
			wp_enqueue_style('flexbox',get_bloginfo('template_url').'/assets/css/flexbox.css',array(),'1.0');
			wp_enqueue_style('main',get_bloginfo('template_url').'/assets/css/styles.css',array(),'1.0');
		};
	};

?>