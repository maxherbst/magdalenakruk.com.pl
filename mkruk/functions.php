<?php
require_once(TEMPLATEPATH.'/inc/constants.php');
require_once(TEMPLATEPATH.'/inc/css-js.php');
require_once(TEMPLATEPATH.'/inc/custom-post-types.php');
require_once(TEMPLATEPATH.'/inc/menu.php');

add_theme_support('post-thumbnails');
//add_image_size('xxx',2560,9999,false);

add_filter('jpeg_quality',function($arg){return 95;});
/* Allow svg upload */
add_filter('wp_check_filetype_and_ext',function($data,$file,$filename,$mimes){
  global $wp_version;
  if($wp_version!=='4.7.1'){return $data;}
  $filetype = wp_check_filetype($filename,$mimes);
  return ['ext' => $filetype['ext'], 'type' => $filetype['type'], 'proper_filename' => $data['proper_filename']];
},10,4);

function cc_mime_types($mimes){$mimes['svg']='image/svg+xml';return $mimes;}
add_filter('upload_mimes','cc_mime_types');

function fix_svg(){ echo '<style type="text/css">.attachment-266x266, .thumbnail img{width: 100% !important;height: auto !important;}</style>'; }
add_action('admin_head','fix_svg');


// Wp v4.7.1 and higher
add_filter( 'wp_check_filetype_and_ext', function($data, $file, $filename, $mimes) {
  $filetype = wp_check_filetype( $filename, $mimes );
  return [
      'ext'             => $filetype['ext'],
      'type'            => $filetype['type'],
      'proper_filename' => $data['proper_filename']
  ];

}, 10, 4 );


/* Redirect after login */
function admin_default_page() {return get_admin_url().'edit.php';}
add_filter('login_redirect','admin_default_page');

/*** WordPress optimisation starts ***/

/* Remove query strings */
function remove_cssjs_ver($src) {if(strpos($src,'?ver=')) $src = remove_query_arg('ver',$src); return $src;}
add_filter('style_loader_src','remove_cssjs_ver',10,2);
add_filter('script_loader_src','remove_cssjs_ver',10,2);
/* Remove rsd links */
remove_action('wp_head','rsd_link') ;
/* Disable emoticons */
remove_action('wp_head','print_emoji_detection_script',7);remove_action('wp_print_styles','print_emoji_styles');
remove_action('admin_print_scripts','print_emoji_detection_script');remove_action('admin_print_styles','print_emoji_styles');
/* Remove shortlink */
remove_action('wp_head','wp_shortlink_wp_head',10,0);
/* Disable embeds */
function disable_embed(){wp_dequeue_script('wp-embed');}
add_action('wp_footer','disable_embed');
/* Disable xml-rpc */
add_filter('xmlrpc_enabled','__return_false');
/* Remove wlManifest link */
remove_action('wp_head','wlwmanifest_link');
/* Remove jQuery */
function no_more_jquery(){if(!is_admin()){ wp_deregister_script('jquery');}}
//add_action('wp_enqueue_scripts', 'no_more_jquery');
/* Disable self pingback */
function disable_pingback(&$links) { foreach($links as $l => $link) if ( 0 === strpos($link,get_option('home'))) unset($links[$l]);}
add_action('pre_ping','disable_pingback');
/* Disable heartbeat */
add_action('init','stop_heartbeat',1);
function stop_heartbeat() {wp_deregister_script('heartbeat');}
/* Remove comments from admin menu */
add_action('admin_menu','my_remove_admin_menus' );
function my_remove_admin_menus(){remove_menu_page('edit-comments.php');}
/* Remove comments from post and pages */
add_action('init','remove_comment_support',100);
function remove_comment_support() {remove_post_type_support('post','comments');remove_post_type_support('page','comments');}
/* Remove comments from admin bar */
function admin_bar_render() {global $wp_admin_bar;$wp_admin_bar->remove_menu('comments');}
add_action('wp_before_admin_bar_render','admin_bar_render');
/* Remove tags */
add_action('init','remove_tags');
function remove_tags(){register_taxonomy('post_tag',array());}
/* Disable categories */
function wpse120418_unregister_categories(){register_taxonomy('category',array());}
//add_action('init','wpse120418_unregister_categories');

/*** WordPress optimisation ends ***/

if (!function_exists('is_login_page')){
  function is_login_page() {
    return in_array(
      $GLOBALS['pagenow'],
      array('wp-login.php','wp-register.php'),
      true
    );
  }
}

?>