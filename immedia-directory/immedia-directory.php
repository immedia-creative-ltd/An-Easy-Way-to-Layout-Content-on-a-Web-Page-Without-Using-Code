<?php

/*
Plugin Name: Immedia - Service Box
Description: An extension for Visual Composer that display a service box
Author: Immedia Creative
Version: 1.0.0
Author URI: https://immedia-creative.com/
*/


// If this file is called directly, abort

if ( ! defined( 'ABSPATH' ) ) {
     die ('Silly human what are you doing here');
}


// Before VC Init

add_action( 'vc_before_init', 'immedia_vc_before_init_actions' );

function immedia_vc_before_init_actions() {

// Require new custom Element

include( plugin_dir_path( __FILE__ ) . 'vc-directory-element.php');

}

// Link directory stylesheet

/*function immedia_community_directory_scripts() {
    wp_enqueue_style( 'get_stylesheet_directory',  plugin_dir_url( __FILE__ ) . 'styling/directory-styling.css' );
}
add_action( 'wp_enqueue_scripts', 'immedia_community_directory_scripts' );*/