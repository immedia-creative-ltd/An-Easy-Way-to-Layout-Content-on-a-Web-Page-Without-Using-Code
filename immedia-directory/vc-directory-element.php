<?php

/**
* Adds new shortcode "info-box-shortcode" and registers it to
* the WPBakery Visual Composer plugin
*
*/


// If this file is called directly, abort

if ( ! defined( 'ABSPATH' ) ) {
    die ('Silly human what are you doing here');
}


if ( ! class_exists( 'vcInfoBox' ) ) {

	class vcInfoBox {


		/**
		* Main constructor
		*
		*/
		public function __construct() {

			// Registers the shortcode in WordPress
			add_shortcode( 'info-box-shortcode', array( 'vcInfoBox', 'output' ) );

			// Map shortcode to Visual Composer
			if ( function_exists( 'vc_lean_map' ) ) {
				vc_lean_map( 'info-box-shortcode', array( 'vcInfoBox', 'map' ) );
			}

		}


		/**
		* Map shortcode to VC
    *
    * This is an array of all your settings which become the shortcode attributes ($atts)
		* for the output.
		*
		*/
		public static function map() {
			return array(
				'name'        => esc_html__( 'Service Box', 'text-domain' ),
				'description' => esc_html__( 'Add new service box', 'text-domain' ),
				'base'        => 'vc_infobox',
				'category' => __('Immedia', 'text-domain'),
				'icon' => plugin_dir_path( __FILE__ ) . 'assets/img/note.png',
				'params'      => array(
				
					array(
						"type" => "vc_link",
						//"holder" => "div",
						"heading" => __( "Service box link", "text-domain" ),
						"param_name" => "url",
						"description" => __( "Link for Key Message", "text-domain" ),
					),
					array(
                        'type' => 'textfield',
                        'holder' => 'h3',
                        'heading' => __( 'Service box title', 'text-domain' ),
                        'param_name' => 'title',
                        'value' => __( '', 'text-domain' ),
                        'admin_label' => false,
                        'weight' => 0,
                    ),

                    array(
                        'type' => 'textarea_html',
                        'holder' => 'div',
                        'heading' => __( 'Service box content', 'text-domain' ),
                        'param_name' => 'content',
                        'value' => __( '', 'text-domain' ),
                        'description' => __( 'To add link highlight text or url and click the chain to apply hyperlink', 'text-domain' ),
                        // 'admin_label' => false,
                        // 'weight' => 0,
                    ),

				),
			);
		}


		/**
		* Shortcode output
		*
		*/
		public static function output( $atts, $content = null ) {

			extract(
				shortcode_atts(
					array(
						'title'   => '',
						'url'   => '',
					),
					$atts
				)
			);
			
		//construct link
		$url = ($url=='||') ? '' : $url;
		$url = vc_build_link( $url );
		$a_link = $url['url'];
		$a_title = ($url['title'] == '') ? '' : 'title="'.$url['title'].'"';
		$a_target = ($url['target'] == '') ? '' : 'target="'.$url['target'].'"';
			

        // Fill $html var with data
        $html = '
		<a class="service-box-cont" href="'.$a_link. '" target="'.$a_target.'">
			<div class="service-box wpb_content_element">
				<h3>' . $title . '</h3>
					<p>'. $content .'</p>
					
			</div>
		</a>';

        return $html;

		}

	}

}
new vcInfoBox;