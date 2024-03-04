<?php

/**
 * Plugin Name: Themefic Widget
 * Description: Auto embed any embbedable content from external URLs into Elementor.
 * Plugin URI:  https://themfic.com/
 * Version:     1.0.0
 * Author:      Team Tanvir
 * Author URI:  https://tanvirover.com/
 * Text Domain: themefic_widget
 *
 * Elementor tested up to: 3.16.0
 * Elementor Pro tested up to: 3.16.0
 */

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

function register_themfic_widget($widgets_manager)
{

	require_once(__DIR__ . '/widgets/slider.php');
	require_once(__DIR__ . '/widgets/booking.php');

	$widgets_manager->register(new \Elementor_slider_Widget());
	$widgets_manager->register(new \Elementor_booking_Widget());
}
add_action('elementor/widgets/register', 'register_themfic_widget');

function register_widget_styles()
{

	wp_enqueue_style('mainstyle', plugins_url('assets/css/main.css', __FILE__), array(), '1.0.0');
	wp_enqueue_style('slick-for-plugin', plugins_url('assets/css/slick.css', __FILE__), array(), '1.0.0');

	wp_enqueue_style('slick-for-theme', plugins_url('assets/css/slick-theme.css', __FILE__), array(), '1.0.0');
	
	wp_enqueue_script('jquery-for-plugin', '//code.jquery.com/jquery-2.2.0.min.js', array(), '1.0.0', true);

	wp_enqueue_script('slickforplugin', plugins_url('assets/js/slick.min.js', __FILE__), array('jquery'), '1.0.0', true);
	wp_enqueue_script('mainscriptforplugin', plugins_url('assets/js/main.js', __FILE__), array('jquery'), '1.0.0', true);
}
add_action('wp_enqueue_scripts', 'register_widget_styles');
