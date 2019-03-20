<?php

remove_filter('the_content', 'wpautop');

function enqueue_styles() {
	wp_enqueue_style( 'whitesquare-style', get_stylesheet_uri());
	wp_register_style('font-style', 'http://fonts.googleapis.com/css?family=Oswald:400,300');
	wp_enqueue_style( 'font-style');
}
add_action('wp_enqueue_scripts', 'enqueue_styles');

function enqueue_scripts () {
	wp_register_script('html5-shim', 'http://html5shim.googlecode.com/svn/trunk/html5.js');
	wp_enqueue_script('html5-shim');
}
add_action('wp_enqueue_scripts', 'enqueue_scripts');

if (function_exists('add_theme_support')) {
	add_theme_support('menus');
}
//filter 
add_filter('the_title', 'add_text_to_titles'); 
function add_text_to_titles( $title ){
	$title = $title . " какой-то текст";
	return $title;
}

//action
add_action( 'user_register', 'mail_for_user' );

function mail_for_user( $user_id ) {
	//get user's data
	$user_info = get_userdata($user_id);

	$login = 'Логин: ' . $user_info -> user_login . "\n";
	$email = 'E-mail: ' . $user_info -> user_email . "\n";

	$first_name = 'Имя: ' . $user_info -> first_name . "\n";
	$last_name = 'Фамилия: ' . $user_info -> last_name . "\n";

	$text = $login . $email . $first_name . $last_name;

	$headers= 'From: Whitesquare' . "\r\n";
	wp_mail( $email, 'Congratulations!', $text , $headers);
	return $user_id;
}
?>