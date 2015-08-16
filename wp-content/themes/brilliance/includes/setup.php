<?php 

//Top elements
add_action('cpotheme_top', 'cpotheme_top_menu');

//Header elements
add_action('cpotheme_header', 'cpotheme_logo');
add_action('cpotheme_header', 'cpotheme_menu_toggle');
add_action('cpotheme_header', 'cpotheme_menu');

//Before main elements
add_action('cpotheme_before_main', 'cpotheme_home_slider', 100);
add_action('cpotheme_before_main', 'cpotheme_home_features', 300);
add_action('cpotheme_before_main', 'cpotheme_home_portfolio', 400);

//Page title elements
add_action('cpotheme_title', 'cpotheme_page_title');
add_action('cpotheme_title', 'cpotheme_breadcrumb');

//After main elements

//Subfooter elements
add_action('cpotheme_subfooter', 'cpotheme_subfooter');

//Footer elements
add_action('cpotheme_footer', 'cpotheme_footer_menu');
add_action('cpotheme_footer', 'cpotheme_footer');


//Add homepage slider
function cpotheme_home_slider(){ 
	if(is_front_page()) get_template_part('homepage', 'slider'); 
}

//Add homepage features
function cpotheme_home_features(){ 
	if(is_front_page()) get_template_part('homepage', 'features'); 
}

//Add homepage portfolio
function cpotheme_home_portfolio(){ 
	if(is_front_page()) get_template_part('homepage', 'portfolio'); 
}

add_filter('cpotheme_font_headings', 'cpotheme_theme_fonts');
add_filter('cpotheme_font_menu', 'cpotheme_theme_fonts');
function cpotheme_theme_fonts($data){ 
	return 'Open+Sans:700';
}

add_filter('cpotheme_font_body', 'cpotheme_theme_fonts_body');
function cpotheme_theme_fonts_body($data){ 
	return 'Open+Sans';
}

add_filter('cpotheme_customizer_controls', 'cpotheme_theme_settings');
function cpotheme_theme_settings($data){ 
	
	unset($data['home_tagline']);
	unset($data['home_portfolio']);
	unset($data['home_features']);
	$data['home_posts']['default'] = true;
	$data['header_opaque'] = array(
	'label' => __('Enable Opaque Header', 'cpocore'),
	'section' => 'cpotheme_layout_general',
	'type' => 'checkbox',
	'default' => '0');
	
	return $data;
}