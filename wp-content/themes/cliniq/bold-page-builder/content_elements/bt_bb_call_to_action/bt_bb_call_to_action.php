<?php

class bt_bb_call_to_action extends BT_BB_Element {

	function handle_shortcode( $atts, $content ) {
		extract( shortcode_atts( apply_filters( 'bt_bb_extract_atts_' . $this->shortcode, array(
			'title'       	 		=> '',
			'html_tag'      		=> 'h5',
			'icon'         			=> '',
			'details_title'        	=> '',
			'details_supertitle'   	=> '',
			'style'        			=> '',
			'url'          			=> '',
			'target'       			=> '',
			'background_image'      => '',			
			'shape'       			=> '',
			'top_left_shape'       	=> '',
			'top_right_shape'       => '',
			'bottom_left_shape'     => '',
			'bottom_right_shape'    => '',
			'border_color'       	=> '',
			'top_border'       		=> '',
			'bottom_border'       	=> '',
			'left_border'    	 	=> '',
			'right_border'    		=> ''			
		) ), $atts, $this->shortcode ) );

		$title = html_entity_decode( $title, ENT_QUOTES, 'UTF-8' );

		$class = array( $this->shortcode );
		
		if ( $el_class != '' ) {
			$class[] = $el_class;
		}

		$id_attr = '';
		if ( $el_id != '' ) {
			$id_attr = ' ' . 'id="' . esc_attr( $el_id ) . '"';
		}

		if ( $style != '' ) {
			$class[] = $this->prefix . 'style' . '_' . $style;
		}

		if ( $shape != '' ) {
			$class[] = $this->prefix . 'shape' . '_' . $shape;
		}

		if ( $top_left_shape != '' ) {
			$class[] = 'bt_bb_top_left';
		}

		if ( $top_right_shape != '' ) {
			$class[] = 'bt_bb_top_right';
		}

		if ( $bottom_left_shape != '' ) {
			$class[] = 'bt_bb_bottom_left';
		}

		if ( $bottom_right_shape != '' ) {
			$class[] = 'bt_bb_bottom_right';
		}

		if ( $top_border != '' ) {
			$class[] = 'bt_bb_top_border';
		}

		if ( $bottom_border != '' ) {
			$class[] = 'bt_bb_bottom_border';
		}

		if ( $left_border != '' ) {
			$class[] = 'bt_bb_left_border';
		}

		if ( $right_border != '' ) {
			$class[] = 'bt_bb_right_border';
		}

		if ( $border_color != '' ) {
			$class[] = $this->prefix . 'border_color' . '_' . $border_color;
		}

		if ( $url != '' ) {
			$class[] = 'btWithLink';
		}

		$link = bt_bb_get_permalink_by_slug( $url );

		if ( $background_image != '' ) {
			$background_image = wp_get_attachment_image_src( $background_image, 'full' );
			if ( $background_image ) {
				$background_image_url = $background_image[0];
				$el_style .= 'background-image:url(\'' . $background_image_url . '\');';
			}
				
			$class[] = 'bt_bb_background_image';
		}

		$class = apply_filters( $this->shortcode . '_class', $class, $atts );
		$class_attr = implode( ' ', $class );
		
		if ( $el_class != '' ) {
			$class_attr = $class_attr . ' ' . $el_class;
		}
	
		$style_attr = '';
		if ( $el_style != '' ) {
			$style_attr = ' ' . 'style="' . esc_attr( $el_style ) . '"';
		}

		$output = '<div' . $id_attr . ' class="' . esc_attr( $class_attr ) . '" ' . $style_attr . '>';

			if ( $link != '' ) {
				$target_attr = ' target="_self" ';
				if ( $target != '' ) {
					$target_attr = ' ' . 'target="' . esc_attr( $target ) . '"';
				}
				$output .= '<a href="' . esc_url( $link ) . '" ' . $target_attr . ' class="btLink"></a>';
			}

			if ( $title != '' )	$output .= '<div class="' . esc_attr( $this->shortcode . '_title' ) . '">' . do_shortcode( '[bt_bb_headline headline="' . esc_attr( $title ) . '" html_tag="'. esc_attr( $html_tag ) .'" size="small" ignore_fe_editor="true"]') . '</div>';

			$output .= '<div class="' . esc_attr( $this->shortcode ) . '_arrow">' . do_shortcode('[bt_bb_icon icon="arrow_e900" size="small" shape="circle" style="filled" ignore_fe_editor="true"]' ) . '</div>';
			
			if ( $icon != '' ) $output .= '<div class="' . esc_attr( $this->shortcode . '_icon' ) . '">' . do_shortcode( '[bt_bb_service icon="' . esc_attr( $icon ) . '" title="' . esc_attr( $details_title ) . '" supertitle="' . esc_attr( $details_supertitle ) . '" size="large" style="borderless" ignore_fe_editor="true"]' ) . '</div>';

		$output .= '</div>';

		
		$output = apply_filters( 'bt_bb_general_output', $output, $atts );
		$output = apply_filters( $this->shortcode . '_output', $output, $atts );
			
		return $output;

	}


	function map_shortcode() {

		bt_bb_map( $this->shortcode, array( 'name' => esc_html__( 'Call To Action', 'cliniq' ), 'description' => esc_html__( 'Call To Action with icon, text and title', 'cliniq' ), 'icon' => $this->prefix_backend . 'icon' . '_' . $this->shortcode, 'highlight' => true,
			'params' => array(
				array( 'param_name' => 'title', 'type' => 'textarea', 'heading' => esc_html__( 'Title', 'cliniq' ) ),
				array( 'param_name' => 'html_tag', 'type' => 'dropdown', 'default' => 'h5', 'heading' => esc_html__( 'HTML title tag', 'cliniq' ),
					'value' => array(
						esc_html__( 'h1', 'cliniq' ) 				=> 'h1',
						esc_html__( 'h2', 'cliniq' )	 			=> 'h2',
						esc_html__( 'h3', 'cliniq' ) 				=> 'h3',
						esc_html__( 'h4', 'cliniq' ) 				=> 'h4',
						esc_html__( 'h5', 'cliniq' ) 				=> 'h5',
						esc_html__( 'h6', 'cliniq' ) 				=> 'h6'
				) ),
				array( 'param_name' => 'icon', 'type' => 'iconpicker', 'heading' => esc_html__( 'Icon', 'cliniq' ), 'preview' => true ),
				array( 'param_name' => 'details_supertitle', 'type' => 'textfield', 'heading' => esc_html__( 'Details supertitle', 'cliniq' ) ),
				array( 'param_name' => 'details_title', 'type' => 'textarea', 'heading' => esc_html__( 'Details title', 'cliniq' ) ),

				
				array( 'param_name' => 'url', 'type' => 'link', 'heading' => esc_html__( 'URL', 'cliniq' ), 'group' => esc_html__( 'URL', 'cliniq' ), 'description' => esc_html__( 'Enter full or local URL (e.g. https://www.bold-themes.com or /pages/about-us) or post slug (e.g. about-us) or search for existing content.', 'cliniq' ) ),
				array( 'param_name' => 'target', 'type' => 'dropdown', 'group' => esc_html__( 'URL', 'cliniq' ), 'heading' => esc_html__( 'Target', 'cliniq' ),
					'value' => array(
						esc_html__( 'Self (open in same tab)', 'cliniq' ) => '_self',
						esc_html__( 'Blank (open in new tab)', 'cliniq' ) => '_blank',
					)
				),



				array( 'param_name' => 'style', 'type' => 'dropdown', 'group' => esc_html__( 'Design', 'cliniq' ), 'heading' => esc_html__( 'Style', 'cliniq' ), 
					'value' => array(
						esc_html__( 'Style 01 (dark font color)', 'cliniq' ) 				=> '',
						esc_html__( 'Style 02 (light font color)', 'cliniq' ) 				=> 'light',
						esc_html__( 'Style 03 (light & accent font color, extra blur)', 'cliniq' ) 	=> 'blur',
						esc_html__( 'Style 04 (light & alternate font color)', 'cliniq' ) 	=> 'alternate',
						esc_html__( 'Style 05 (alternate & accent font color)', 'cliniq' ) => 'accent'
					)
				),
				array( 'param_name' => 'background_image', 'type' => 'attach_image', 'preview' => true, 'heading' => esc_html__( 'Background image', 'cliniq' ), 'group' => esc_html__( 'Design', 'cliniq' ) ),

				

				array( 'param_name' => 'shape', 'type' => 'dropdown', 'heading' => esc_html__( 'Shape', 'cliniq' ), 'group' => esc_html__( 'Design', 'cliniq' ),
					'value' => array(
						esc_html__( 'Square', 'cliniq' ) 			=> '',
						esc_html__( 'Soft Rounded', 'cliniq' ) 	=> 'soft-rounded',
						esc_html__( 'Hard Rounded', 'cliniq' ) 	=> 'hard-rounded'
					)
				),
				array( 'param_name' => 'top_left_shape', 'type' => 'checkbox', 'value' => array( esc_html__( 'Yes', 'cliniq' ) => 'top_left_shape' ), 'group' => esc_html__( 'Design', 'cliniq' ), 'heading' => esc_html__( 'Top left', 'cliniq' ) ),
				array( 'param_name' => 'top_right_shape', 'type' => 'checkbox', 'group' => esc_html__( 'Design', 'cliniq' ), 'value' => array( esc_html__( 'Yes', 'cliniq' ) => 'top_right_shape' ), 'heading' => esc_html__( 'Top right', 'cliniq' ) ),
				array( 'param_name' => 'bottom_left_shape', 'type' => 'checkbox', 'group' => esc_html__( 'Design', 'cliniq' ), 'value' => array( esc_html__( 'Yes', 'cliniq' ) => 'bottom_left_shape' ), 'heading' => esc_html__( 'Bottom left', 'cliniq' ) ),
				array( 'param_name' => 'bottom_right_shape', 'type' => 'checkbox', 'group' => esc_html__( 'Design', 'cliniq' ), 'value' => array( esc_html__( 'Yes', 'cliniq' ) => 'bottom_right_shape' ), 'heading' => esc_html__( 'Bottom right', 'cliniq' ) ),

				array( 'param_name' => 'border_color', 'type' => 'dropdown', 'heading' => esc_html__( 'Border color', 'cliniq' ), 'group' => esc_html__( 'Design', 'cliniq' ),
					'value' => array(
						esc_html__( 'None', 'cliniq' ) 			=> '',
						esc_html__( 'Light color', 'cliniq' ) 		=> 'light',
						esc_html__( 'Gray color', 'cliniq' ) 		=> 'gray',
						esc_html__( 'Dark color', 'cliniq' ) 		=> 'dark'
					)
				),
				array( 'param_name' => 'top_border', 'type' => 'checkbox', 'value' => array( esc_html__( 'Yes', 'cliniq' ) => 'top_border' ), 'group' => esc_html__( 'Design', 'cliniq' ), 'heading' => esc_html__( 'Top Border', 'cliniq' ), 'preview' => true ),
				array( 'param_name' => 'bottom_border', 'type' => 'checkbox', 'group' => esc_html__( 'Design', 'cliniq' ), 'value' => array( esc_html__( 'Yes', 'cliniq' ) => 'bottom_border' ), 'heading' => esc_html__( 'Bottom Border', 'cliniq' ), 'preview' => true ),
				array( 'param_name' => 'left_border', 'type' => 'checkbox', 'group' => esc_html__( 'Design', 'cliniq' ), 'value' => array( esc_html__( 'Yes', 'cliniq' ) => 'left_border' ), 'heading' => esc_html__( 'Left Border', 'cliniq' ), 'preview' => true ),
				array( 'param_name' => 'right_border', 'type' => 'checkbox', 'group' => esc_html__( 'Design', 'cliniq' ), 'value' => array( esc_html__( 'Yes', 'cliniq' ) => 'right_border' ), 'heading' => esc_html__( 'Right Border', 'cliniq' ), 'preview' => true )
			))
		);
	}
}