<?php 

function pageBanner($args = NULL){
	if(!$args['title']){
		$args['title'] = get_the_title();
	}
	if (!$args['subtitle']) {
		$args['subtitle'] = get_field('page_banner_subtitle');
	}
	if (!$args['image']) {
		if(get_field('page_banner_background_image')){
			$args['image'] = get_field('page_banner_background_image')['sizes']['pageBanner'];
		} else{
			$args['image'] = get_theme_file_uri('/images/ocean.jpg');
		}

	}
	?>
	<div class="page-banner">
		    <div class="page-banner__bg-image" style="background-image: url(<?php echo $args['image']; ?>);"></div>
		    <div class="page-banner__content container container--narrow">
		      <h1 class="page-banner__title"><?php echo $args['title']; ?></h1>
		      <div class="page-banner__intro">
		        <p><?php echo $args['subtitle']; ?></p>
		      </div>
		    </div>  
		  </div>
	<?php
}

function university_files(){
	wp_enqueue_script('main_university_js', get_theme_file_uri('/js/scripts-bundled.js'), NULL, microtime(), true);
	wp_enqueue_style('custome_google_fonts', '//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:100,300,400,400i,700,700i');
	wp_enqueue_style('font_awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
	wp_enqueue_style('university_main_styles', get_stylesheet_uri(), NULL, microtime());
}

add_action('wp_enqueue_scripts', 'university_files');

function university_features(){
	add_theme_support('title-tag');
	add_theme_support('post-thumbnails');
	add_image_size('professorLandscape', 400, 250, true);
	add_image_size('professorPortrait', 480, 650, true);
	add_image_size('pageBanner', 1500, 350, true);
}

add_action('after_setup_theme', 'university_features');

function university_adjust_queries($query){
	if(!is_admin() AND is_post_type_archive('program') AND $query->is_main_query()){
		$query->set('orderby', 'title');
		$query->set('order', 'ASC');
		$query->set('posts_per_page', -1);
	}

	if(!is_admin() AND is_post_type_archive('event') AND $query->is_main_query()){
		$today = date('Ymd');
		$query->set('meta_key', 'event_date');
		$query->set('orderby', 'meta_value_num');
		$query->set('order', 'ASC');
		$query->set('meta_query', array(
                array(
                  'key' => 'event_date',
                  'compare' => '>=',
                  'value' => $today,
                  'type' => 'numeric'
                )
              ));
		
	}
}

//Login Redirection
add_action('admin_init', 'redirectSubsToFrontend');

function redirectSubsToFrontend(){
	$ourCurrentUser = wp_get_current_user();
	if(count($ourCurrentUser->roles) == 1 AND $ourCurrentUser->roles[0] == 'subscriber'){
		wp_redirect(site_url('/'));
		exit;
	}
}

//hide header bar
add_action('wp_loaded', 'noSubsAdminBar');

function noSubsAdminBar(){
	$ourCurrentUser = wp_get_current_user();
	if(count($ourCurrentUser->roles) == 1 AND $ourCurrentUser->roles[0] == 'subscriber'){
		show_admin_bar(false);
	}
}

//Customize login screen
add_filter('login_headerurl', 'ourHeaderUrl');

function ourHeaderUrl(){
	return esc_url(site_url('/'));
}

//Login Redirection
add_action('login_enqueue_scripts', 'ourLoginCss');

function ourLoginCss(){
	wp_enqueue_style('university_main_styles', get_stylesheet_uri());
	wp_enqueue_style('custome_google_fonts', '//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:100,300,400,400i,700,700i');
}

add_filter('login_headertitle', 'ourLoginTitle');

function ourLoginTitle(){
	return get_bloginfo('name');
}

/*
add_action('pre_get_posts', 'university_adjust_queries');

function universityMapKey($api){
	$api['key'] = 'AIzaSyD3p0Pml8wusOL2amiPN5EUzqimnCIx_NE';
	return $api;
}

add_filter('acf/fields/google_map/api', 'universityMapKey');
*/
?>