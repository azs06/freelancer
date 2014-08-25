<?php
/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 * By default it uses the theme name, in lowercase and without spaces, but this can be changed if needed.
 * If the identifier changes, it'll appear as if the options have been reset.
 */

function optionsframework_option_name() {

	// This gets the theme name from the stylesheet
	$themename = wp_get_theme();
	$themename = preg_replace("/\W/", "_", strtolower($themename) );

	$optionsframework_settings = get_option( 'optionsframework' );
	$optionsframework_settings['id'] = $themename;
	update_option( 'optionsframework', $optionsframework_settings );
}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the 'id' fields, make sure to use all lowercase and no spaces.
 *
 * If you are making your theme translatable, you should replace 'options_framework_theme'
 * with the actual text domain for your theme.  Read more:
 * http://codex.wordpress.org/Function_Reference/load_theme_textdomain
 */

function optionsframework_options() {

	$options = array();

	$portfolio_number = array(
		'3' => __('3', 'options_framework_theme'),
		'6' => __('6', 'options_framework_theme'),
		'9' => __('9', 'options_framework_theme'),
		'12' => __('12', 'options_framework_theme')
	);
	$posts_number = array(
		'1' => __('1', 'options_framework_theme'),
		'2' => __('2', 'options_framework_theme'),
		'3' => __('3', 'options_framework_theme'),
		'4' => __('4', 'options_framework_theme'),
		'5' => __('5', 'options_framework_theme'),
		'6' => __('6', 'options_framework_theme')
	);

	$options[] = array(
		'name' => __('Theme Settings', 'options_framework_theme'),
		'type' => 'heading');


	$options[] = array(
		'name' => __('Freelancer Name', 'options_framework_theme'),
		'desc' => __('Name of the Freelancer,this will appear on home page', 'options_framework_theme'),
		'id' => 'freelancer_name',
		'std' => 'Freelancer Name',
		'type' => 'text');

	$options[] = array(
		'name' => __('Avatar', 'options_framework_theme'),
		'desc' => __('Upload image,this will show up at the home page.', 'options_framework_theme'),
		'id' => 'freelancer_image',
		'type' => 'upload');

	$options[] = array(
		'name' => __('Home Page Message', 'options_framework_theme'),
		'desc' => __('This area is to add skills of the freelancer,but you can add whatever you want.', 'options_framework_theme'),
		'id' => 'freelance_desc',
		'std' => 'Default Text',
		'type' => 'textarea');

	$wp_editor_settings = array(
		'wpautop' => true, // Default
		'textarea_rows' => 5,
		'tinymce' => array( 'plugins' => 'wordpress' )
	);

	$options[] = array(
		'name' => __('Number of Portfolio to show', 'options_framework_theme'),
		'desc' => __('Select how many portfolio you want on your home page.', 'options_framework_theme'),
		'id' => 'portfolio_number',
		'std' => '3',
		'type' => 'select',
		'options' => $portfolio_number);
	$options[] = array(
		'name' => __('Number of blog post to show on home page', 'options_framework_theme'),
		'desc' => __('Select how many posts you want on your home page.', 'options_framework_theme'),
		'id' => 'posts_number',
		'std' => '1',
		'type' => 'select',
		'options' => $posts_number);

	$options[] = array(
		'name' => __('Footer Settings', 'options_framework_theme'),
		'type' => 'heading');

		$options[] = array(
		'name' => __('Footer Message', 'options_framework_theme'),
		'desc' => __('Whatever text you want on footer,genrally a copyright message.', 'options_framework_theme'),
		'id' => 'freelancer_footer_editor',
		'type' => 'editor',
		'settings' => $wp_editor_settings );

	$options[] = array(
		'name' => __('If you don\'t want to show any social icon,just keep the input field empty', 'options_framework_theme'),
		 );

	$options[] = array(
		'name' => __('Facebook', 'options_framework_theme'),
		'desc' => __('Facebook profile url', 'options_framework_theme'),
		'id' => 'freelancer_fb',
		'std' => 'https://www.facebook.com',
		'type' => 'text');
	$options[] = array(
		'name' => __('Twitter', 'options_framework_theme'),
		'desc' => __('Twitter profile url', 'options_framework_theme'),
		'id' => 'freelancer_tw',
		'std' => 'https://twitter.com/soikat',
		'type' => 'text');
	$options[] = array(
		'name' => __('Google Plus', 'options_framework_theme'),
		'desc' => __('Google plus profile url', 'options_framework_theme'),
		'id' => 'freelancer_gp',
		'std' => 'https://plus.google.com',
		'type' => 'text');
	$options[] = array(
		'name' => __('LinkedIn', 'options_framework_theme'),
		'desc' => __('LinkedIn profile url', 'options_framework_theme'),
		'id' => 'freelancer_ln',
		'std' => 'https://www.linkedin.com/',
		'type' => 'text');
	$options[] = array(
		'name' => __('Dribbble', 'options_framework_theme'),
		'desc' => __('Dribbble profile url', 'options_framework_theme'),
		'id' => 'freelancer_db',
		'std' => 'https://dribbble.com/',
		'type' => 'text');
	
	return $options;
}