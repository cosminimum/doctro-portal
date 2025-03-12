<?php

class bt_bb_dropdown_inner extends BT_BB_Element {

	function handle_shortcode( $atts, $content ) {
		extract( shortcode_atts( apply_filters( 'bt_bb_extract_atts_' . $this->shortcode, array(
			'image'      			=> '',
			'title'       	 		=> '',
			'url_text'				=> '',
			'url'          			=> '',
			'target'       			=> '',
			
		) ), $atts, $this->shortcode ) );

		$class = array( $this->shortcode );
		
		if ( $el_class != '' ) {
			$class[] = $el_class;
		}

		$id_attr = '';
		if ( $el_id != '' ) {
			$id_attr = ' ' . 'id="' . esc_attr( $el_id ) . '"';
		}

	
		$final_url_text = '';
		if ( $url_text == '' ) {
			$final_url_text = '';
		} else if ( $url_text != '' ) {
			$final_url_text = $url_text;
		}

		$link = bt_bb_get_permalink_by_slug( $url );

		$class = apply_filters( $this->shortcode . '_class', $class, $atts );
		$class_attr = implode( ' ', $class );
		
		if ( $el_class != '' ) {
			$class_attr = $class_attr . ' ' . $el_class;
		}
	
		$style_attr = '';
		if ( $el_style != '' ) {
			$style_attr = ' ' . 'style="' . esc_attr( $el_style ) . '"';
		}

		$item_image = wp_get_attachment_image_src( $image, 'thumbnail' );
		$item_image = isset($item_image[0]) ? $item_image[0] : '';;
		$alt_image = $item_image;

		$output = '<option value="' . esc_attr( $title ) . '" data-title="' . esc_attr( $title ) . '" data-image="' . esc_attr( $item_image ) . '" data-link="' . esc_attr( $link ) . '" data-target="' . esc_attr( $target ) . '"" data-final-url-text="' . esc_attr( $final_url_text ) . '">' . $title . '</option>';
		
		$output = apply_filters( 'bt_bb_general_output', $output, $atts );
		$output = apply_filters( $this->shortcode . '_output', $output, $atts );
			
		return $output;

	}


	function map_shortcode() {

		bt_bb_map( $this->shortcode, array( 'name' => esc_html__( 'Dropdown Inner', 'cliniq' ), 'description' => esc_html__( 'Dropdown Inner with image, text and button', 'cliniq' ), 'as_child' => array( 'only' => 'bt_bb_dropdown' ), 'icon' => $this->prefix_backend . 'icon' . '_' . $this->shortcode, 'highlight' => true,
			'params' => array(
				array( 'param_name' => 'title', 'type' => 'textarea', 'heading' => esc_html__( 'Title', 'cliniq' ), 'preview' => true ),
				array( 'param_name' => 'image', 'type' => 'attach_image', 'preview' => true, 'heading' => esc_html__( 'Image', 'cliniq' ) 
				),
				array( 'param_name' => 'url', 'type' => 'link', 'heading' => esc_html__( 'URL', 'cliniq' ), 'preview' => true, 'description' => esc_html__( 'Enter full or local URL (e.g. https://www.bold-themes.com or /pages/about-us), post slug (e.g. about-us), #lightbox to open current image in full size or search for existing content.', 'cliniq' ), 'group' => esc_html__( 'URL', 'cliniq' ) ),
				array( 'param_name' => 'target', 'type' => 'dropdown', 'group' => esc_html__( 'URL', 'cliniq' ), 'heading' => esc_html__( 'Target', 'cliniq' ),
					'value' => array(
						esc_html__( 'Self (open in same tab)', 'cliniq' ) => '_self',
						esc_html__( 'Blank (open in new tab)', 'cliniq' ) => '_blank',
					)
				),
				array( 'param_name' => 'url_text', 'type' => 'textfield', 'group' => esc_html__( 'URL', 'cliniq' ), 'heading' => esc_html__( 'Button text', 'cliniq' ) )
				

			))
		);
	}
}