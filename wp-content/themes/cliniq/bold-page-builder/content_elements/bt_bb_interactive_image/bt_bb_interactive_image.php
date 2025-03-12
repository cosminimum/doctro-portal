<?php

class bt_bb_interactive_image extends BT_BB_Element {

	function handle_shortcode( $atts, $content ) {
		extract( shortcode_atts( apply_filters( 'bt_bb_extract_atts_' . $this->shortcode, array(
			'image'      	=> '',
			'size'   		=> '',
			'lazy_load'  	=> 'no'
		) ), $atts, $this->shortcode ) );


		$content_elements_path			= get_template_directory_uri() . '/bold-page-builder/content_elements/bt_bb_interactive_image/';
		$content_elements_misc_path_js	= get_template_directory_uri() . '/bold-page-builder/content_elements_misc/js/';

		wp_enqueue_script( 

			'bt_bb_interactive_image_js',
			$content_elements_path . 'bt_bb_interactive_image.js',
			array( 'jquery' ),
			'',
			true
		);
		
		$class = array( $this->shortcode );

		if ( $el_class != '' ) {
			$class[] = $el_class;
		}

		$id_attr = '';
		if ( $el_id != '' ) {
			$id_attr = ' ' . 'id="' . esc_attr( $el_id ) . '"';
		}

		$style_attr = '';
		if ( $el_style != '' ) {
			$style_attr = ' ' . 'style="' . esc_attr( $el_style ) . '"';
		}

		
		$class = apply_filters( $this->shortcode . '_class', $class, $atts );

		$content = do_shortcode( $content );

		$output = '';
		
		$output .= do_shortcode( '[bt_bb_image image="' . esc_attr( $image ) . '" size="' . esc_attr( $size ) . '"  lazy_load="' . esc_attr( $lazy_load ) . '" ignore_fe_editor="true"]' );
		$output .=  '<div class="' . esc_attr( $this->shortcode . '_content') . '">' . $content . '</div>';		

		$output = '<div' . $id_attr . ' class="' . esc_attr( implode( ' ', $class ) ) . '"' . $style_attr . '>' . ( $output ) . '</div>';

		$output = apply_filters( 'bt_bb_general_output', $output, $atts );
		$output = apply_filters( $this->shortcode . '_output', $output, $atts );

		return $output;

	}

	function map_shortcode() {

		
		bt_bb_map( $this->shortcode, array( 'name' => esc_html__( 'Interactive Image', 'cliniq' ), 'description' => esc_html__( 'Interactive image with dots, title and text', 'cliniq' ), 'container' => 'vertical', 'accept' => array( 'bt_bb_interactive_image_item' => true ), 'icon' => $this->prefix_backend . 'icon' . '_' . $this->shortcode,
			'params' => array(
				array( 'param_name' => 'image', 'type' => 'attach_image', 'preview' => true, 'heading' => esc_html__( 'Image', 'cliniq' ) 
				),
				array( 'param_name' => 'size', 'type' => 'dropdown', 'heading' => esc_html__( 'Size', 'cliniq' ), 'preview' => true,
					'value' => bt_bb_get_image_sizes()
				),
				array( 'param_name' => 'lazy_load', 'type' => 'dropdown', 'default' => 'yes', 'heading' => esc_html__( 'Lazy load this image', 'cliniq' ),
					'value' => array(
						esc_html__( 'No', 'cliniq' ) 				=> 'no',
						esc_html__( 'Yes', 'cliniq' ) 				=> 'yes'
					)
				)
			))
		);
	}
}