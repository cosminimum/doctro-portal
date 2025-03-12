<?php

class bt_bb_testimonial extends BT_BB_Element {

	function handle_shortcode( $atts, $content ) {
		extract( shortcode_atts( apply_filters( 'bt_bb_extract_atts_' . $this->shortcode, array(
			'text'						=> '',
			'logo'						=> '',
			'name'						=> '',
			'details'					=> '',
			'signature'					=> '',
			'style'						=> '',
			'font_weight'				=> '',
			'text_font'          		=> '',
			'text_font_subset'			=> '',
			'text_size'					=> '',
			'text_style'				=> '',
			'quote_color'				=> '',
			'quote_position'			=> '',
			'border'					=> ''			
		) ), $atts, $this->shortcode ) );

		if ( $text_font != '' && $text_font != 'inherit'  ) {
			require_once( WP_PLUGIN_DIR   . '/bold-page-builder/content_elements_misc/misc.php' );
			
			if ( $text_font != '' && $text_font != 'inherit' ) {
				bt_bb_enqueue_google_font( $text_font, $text_font_subset );
			}
		}

		$text = html_entity_decode( $text, ENT_QUOTES, 'UTF-8' );

		$class = array( $this->shortcode );
		
		if ( $el_class != '' ) {
			$class[] = $el_class;
		}

		$id_attr = '';
		if ( $el_id != '' ) {
			$id_attr = ' ' . 'id="' . esc_attr( $el_id ) . '"';
		}

		if ( $text_size != '' ) {
			$class[] = $this->prefix . 'text_size' . '_' . $text_size;
		}

		if ( $font_weight != '' ) {
			$class[] = $this->prefix . 'font_weight' . '_' . $font_weight;
		}

		if ( $quote_color != '' ) {
			$class[] = $this->prefix . 'quote_color' . '_' . $quote_color;
		}

		if ( $quote_position != '' ) {
			$class[] = $this->prefix . 'quote_position' . '_' . $quote_position;
		}

		if ( $text_style != '' ) {
			$class[] = $this->prefix . 'text_style' . '_' . $text_style;
		}

		if ( $border != '' ) {
			$class[] = $this->prefix . 'border' . '_' . $border;
		}

		if ( $style != '' ) {
			$class[] = $this->prefix . 'style' . '_' . $style;
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

		/* style text font */
		$html_text_tag_style = "";
		$html_text_tag_style_arr = array();		

		if ( $text_font != '' && $text_font != 'inherit' ) {
			$html_text_tag_style_arr[] = 'font-family:\'' . urldecode_deep( $text_font ) . '\'';
		}
		if ( count( $html_text_tag_style_arr ) > 0 ) {
			$html_text_tag_style = ' style="' . implode( '; ', $html_text_tag_style_arr ) . ';"';
		}


		$output = '';

		// TEXT
		if ( $text != '' ) {
			$output .= '<div class="' . esc_attr( $this->shortcode . '_text' ) . '"><span'. $html_text_tag_style  . '>' . $text . '</span></div>';
		}

		// NAME & DETAILS
		$output .= '<div class="' . esc_attr( $this->shortcode . '_text_box' ) . '">';
			$output .= '<div class="' . esc_attr( $this->shortcode . '_left_box' ) . '">';
				if ( $logo != '' ) $output .=  '<div class="' . esc_attr( $this->shortcode . '_logo') . '">' . do_shortcode( '[bt_bb_image image="' . esc_attr( $logo ) . '" size="boldthemes_small" ignore_fe_editor="true"]' ) . '</div>';
				if ( $name != '' ) $output .= '<span class="' . esc_attr( $this->shortcode . '_name' ) . '">' . $name . '</span>';
				if ( $details != '' ) $output .= '<span class="' . esc_attr( $this->shortcode . '_details' ) . '">' . $details . '</span>';
			$output .= '</div>';

			$output .= '<div class="' . esc_attr( $this->shortcode . '_right_box' ) . '">';
				if ( $signature != '' ) $output .=  '<div class="' . esc_attr( $this->shortcode . '_signature') . '">' . do_shortcode( '[bt_bb_image image="' . esc_attr( $signature ) . '" size="boldthemes_small" ignore_fe_editor="true"]' ) . '</div>';
			$output .= '</div>';

		$output .= '</div>';


		$output = '<div' . $id_attr . ' class="' . esc_attr( implode( ' ', $class ) ) . '"' . $style_attr . '>' . ( $output ) . '</div>';

		
		$output = apply_filters( 'bt_bb_general_output', $output, $atts );
		$output = apply_filters( $this->shortcode . '_output', $output, $atts );
			
		return $output;

	}


	function map_shortcode() {

		require( WP_PLUGIN_DIR   . '/bold-page-builder/content_elements_misc/fonts.php' );

		bt_bb_map( $this->shortcode, array( 'name' => esc_html__( 'Testimonial', 'cliniq' ), 'description' => esc_html__( 'Testimonial with ratings, text and title', 'cliniq' ), 'icon' => $this->prefix_backend . 'icon' . '_' . $this->shortcode, 'highlight' => true,
			'params' => array(
				array( 'param_name' => 'text', 'type' => 'textarea', 'heading' => esc_html__( 'Text', 'cliniq' ) ),
				array( 'param_name' => 'logo', 'type' => 'attach_image', 'preview' => true, 'heading' => esc_html__( 'Logo', 'cliniq' ) ),
				array( 'param_name' => 'name', 'type' => 'textfield', 'preview' => true, 'heading' => esc_html__( 'Name', 'cliniq' ) ),
				array( 'param_name' => 'details', 'type' => 'textarea', 'heading' => esc_html__( 'Details', 'cliniq' ) ),
				array( 'param_name' => 'signature', 'type' => 'attach_image', 'heading' => esc_html__( 'Image', 'cliniq' ) ),


				array( 'param_name' => 'style', 'type' => 'dropdown', 'group' => esc_html__( 'Design', 'cliniq' ), 'heading' => esc_html__( 'Style', 'cliniq' ),
					'value' => array(
						esc_html__( 'Image on bottom', 'cliniq' ) 			=> '',
						esc_html__( 'Image on top', 'cliniq' ) 			=> 'image_bottom'
					)
				),
				
				array( 'param_name' => 'quote_position', 'type' => 'dropdown', 'group' => esc_html__( 'Design', 'cliniq' ), 'heading' => esc_html__( 'Show icon', 'cliniq' ), 
					'value' => array(
						esc_html__( 'Show', 'cliniq' ) 				=> '',
						esc_html__( 'Hide', 'cliniq' ) 				=> 'hide'
					)
				),
				array( 'param_name' => 'quote_color', 'type' => 'dropdown', 'group' => esc_html__( 'Design', 'cliniq' ), 'heading' => esc_html__( 'Icon color', 'cliniq' ), 
					'value' => array(
						esc_html__( 'Gray color', 'cliniq' ) 				=> '',
						esc_html__( 'Light color', 'cliniq' ) 				=> 'light',
						esc_html__( 'Dark color', 'cliniq' ) 				=> 'dark',
						esc_html__( 'Accent color', 'cliniq' ) 			=> 'accent',
						esc_html__( 'Alternate color', 'cliniq' ) 			=> 'alternate',
						esc_html__( 'Transparent light color', 'cliniq' ) 	=> 'transparent_light',
					)
				),
				
				array( 'param_name' => 'text_size', 'type' => 'dropdown', 'group' => esc_html__( 'Design', 'cliniq' ), 'heading' => esc_html__( 'Text size', 'cliniq' ), 
					'value' => array(
						esc_html__( 'Extra Small', 'cliniq' ) 			=> 'extrasmall',
						esc_html__( 'Small', 'cliniq' ) 				=> '',
						esc_html__( 'Medium', 'cliniq' ) 				=> 'medium',
						esc_html__( 'Large', 'cliniq' ) 				=> 'large'
					)
				),
				array( 'param_name' => 'text_style', 'type' => 'dropdown', 'group' => esc_html__( 'Design', 'cliniq' ), 'heading' => esc_html__( 'Text style', 'cliniq' ),
					'value' => array(
						esc_html__( 'Normal', 'cliniq' ) 				=> '',
						esc_html__( 'Italic', 'cliniq' ) 				=> 'italic'
					)
				),
				array( 'param_name' => 'font_weight', 'type' => 'dropdown', 'group' => esc_html__( 'Design', 'cliniq' ), 'heading' => esc_html__( 'Text font weight', 'cliniq' ),
					'value' => array(
						esc_html__( 'Default', 'cliniq' ) 				=> '',
						esc_html__( 'Thin', 'cliniq' ) 				=> 'thin',
						esc_html__( 'Lighter', 'cliniq' ) 				=> 'lighter',
						esc_html__( 'Light', 'cliniq' ) 				=> 'light',
						esc_html__( 'Normal', 'cliniq' ) 				=> 'normal',
						esc_html__( 'Medium', 'cliniq' ) 				=> 'medium',
						esc_html__( 'Semi bold', 'cliniq' ) 			=> 'semi-bold',
						esc_html__( 'Bold', 'cliniq' ) 				=> 'bold',
						esc_html__( 'Bolder', 'cliniq' ) 				=> 'bolder',
						esc_html__( 'Black', 'cliniq' ) 				=> 'black'
					)
				),
				array( 'param_name' => 'text_font', 'type' => 'dropdown', 'group' => esc_html__( 'Design', 'cliniq' ), 'heading' => esc_html__( 'Text font', 'cliniq' ),
					'value' => array( esc_html__( 'Inherit', 'cliniq' ) => 'inherit' ) + $font_arr
				),
				array( 'param_name' => 'text_font_subset', 'type' => 'textfield', 'group' => esc_html__( 'Design', 'cliniq' ), 'heading' => esc_html__( 'Text font subset', 'cliniq' ), 'value' => 'latin,latin-ext', 'description' => 'E.g. latin,latin-ext,cyrillic,cyrillic-ext' ),
				array( 'param_name' => 'border', 'type' => 'dropdown', 'group' => esc_html__( 'Design', 'cliniq' ), 'heading' => esc_html__( 'Show Border', 'cliniq' ),
					'value' => array(
						esc_html__( 'No', 'cliniq' ) 				=> '',
						esc_html__( 'Yes', 'cliniq' ) 				=> 'show'
					)
				)

			))
		);
	}
}