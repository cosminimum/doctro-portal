<?php

class bt_bb_card extends BT_BB_Element {

	function handle_shortcode( $atts, $content ) {
		extract( shortcode_atts( apply_filters( 'bt_bb_extract_atts', array(
			'image'      					=> '',
			'lazy_load'  					=> 'no',
			'image_size'   					=> '',
			'height'   						=> '',			
			'url'    						=> '',
			'target' 						=> '',
			'image_style'					=> '',
			'border'      					=> 'show',
			'blur'      					=> '',			
			'shadow'      					=> '',
			'shape'							=> '',
			'padding'                		=> 'text_indent',
			'background_color'       		=> '',
			'gradient_color_01'       		=> '',
			'gradient_color_02'       		=> '',
			'content_hover_color'			=> ''
		) ), $atts, $this->shortcode ) );
		
		$content_elements_path = get_template_directory_uri() . '/bold-page-builder/content_elements/bt_bb_card/';
		
		$class = array( $this->shortcode );

		if ( $el_class != '' ) {
			$class[] = $el_class;
		}

		$id_attr = '';
		if ( $el_id != '' ) {
			$id_attr = ' ' . 'id="' . esc_attr( $el_id ) . '"';
		}

		if ( $image_style != '' ) {
			$class[] = $this->prefix . 'image_style' . '_' . $image_style;
		}

		if ( $border != '' ) {
			$class[] = $this->prefix . 'border' . '_' . $border;
		}

		if ( $blur != '' ) {
			$class[] = $this->prefix . 'blur' . '_' . $blur;
		}

		if ( $shadow != '' ) {
			$class[] = $this->prefix . 'shadow' . '_' . $shadow;
		}

		if ( $shape != '' ) {
			$class[] = $this->prefix . 'shape' . '_' . $shape;
		}

		if ( $image == '' ) {
			$class[] = 'btNoImage';
		}

		if ( $url != '' ) {
			$class[] = 'btWithLink';
		}

		if ( $height != '' ) {
			$el_style = $el_style . 'min-height:' . $height . ';';
		}

		if ( $padding != '' ) {
			$class[] = $this->prefix . 'padding' . '_' . $padding;
		}

		if ( $content_hover_color != '' ) {
			$class[] = $this->prefix . 'content_hover_color' . '_' . $content_hover_color;
		}

		if ( $background_color != '' ) {
			if ( strpos( $background_color, '#' ) !== false ) {
				$background_color = bt_bb_hex2rgb( $background_color );
				if ( $opacity == '' ) {
					$opacity = 1;
				}
				$el_style .= 'background-color:rgba(' . $background_color[0] . ', ' . $background_color[1] . ', ' . $background_color[2] . ', ' . $opacity . ');';
			} else {
				$el_style .= 'background-color:' . $background_color . ';';
			}
		}



		if ( ( $gradient_color_01 != '' ) && ( $gradient_color_02 != '' ) ) {
			$el_style .= 'background: linear-gradient(0deg, ' . $gradient_color_01 . ' 0%, ' . $gradient_color_02 . ' 100%);';
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


		$content = do_shortcode( $content );

		$link = bt_bb_get_permalink_by_slug( $url );

		$class = apply_filters( $this->shortcode . '_class', $class, $atts );
		$class_attr = implode( ' ', $class );
		
		
		$output = '<div' . $id_attr . ' class="' . esc_attr( $class_attr ) . '" ' . $style_attr . '>';

			if ( $link != '' ) {
				$target_attr = ' target="_self" ';
				if ( $target != '' ) {
					$target_attr = ' ' . 'target="' . esc_attr( $target ) . '"';
				}
				$output .= '<a href="' . esc_url( $link ) . '" ' . $target_attr . ' class="btCardLink"></a>';
			}
			
			// IMAGE
			if ( $image != '' ) $output .=  '<div class="' . esc_attr( $this->shortcode . '_image') . '">
				' . do_shortcode( '[bt_bb_image image="' . esc_attr( $image ) . '" lazy_load="' . esc_attr( $lazy_load ) . '" shape="" size="' . esc_attr( $image_size ) . '" ignore_fe_editor="true"]' ) . '
			</div>';


			// TEXT BOX
			$output .= '<div class="' . esc_attr( $this->shortcode . '_text_box' ) . '">';

				// CONTENT
				if ( $content != '' ) $output .= '<div class="' . esc_attr( $this->shortcode . '_content_inner' ) . '">' . ( $content ) . '</div>';

			$output .= '</div>';
		
		$output .= '</div>';

		$output = apply_filters( 'bt_bb_general_output', $output, $atts );
		$output = apply_filters( $this->shortcode . '_output', $output, $atts );

		return $output;

	}

	function map_shortcode() {
		
		bt_bb_map( $this->shortcode, array( 'name' => esc_html__( 'Card', 'cliniq' ), 'description' => esc_html__( 'Card with image and text', 'cliniq' ), 'container' => 'vertical', 'toggle' => true, 'accept' => array( 'bt_bb_headline' => true, 'bt_bb_button' => true, 'bt_bb_icon' => true, 'bt_bb_text' => true, 'bt_bb_separator' => true ), 'icon' => $this->prefix_backend . 'icon' . '_' . $this->shortcode,
			'params' => array(
				array( 'param_name' => 'image', 'type' => 'attach_image', 'preview' => true, 'heading' => esc_html__( 'Image', 'cliniq' ) 
				),
				array( 'param_name' => 'lazy_load', 'type' => 'dropdown', 'default' => 'yes', 'heading' => esc_html__( 'Lazy load this image', 'cliniq' ),
					'value' => array(
						esc_html__( 'No', 'cliniq' ) 				=> 'no',
						esc_html__( 'Yes', 'cliniq' ) 				=> 'yes'
					)
				),
				array( 'param_name' => 'image_size', 'type' => 'dropdown', 'heading' => esc_html__( 'Image size', 'cliniq' ),
					'value' => bt_bb_get_image_sizes()
				),
				array( 'param_name' => 'height', 'type' => 'textfield', 'description' => esc_html__( 'Enter height in em or px, e.g. 10em', 'cliniq' ), 'heading' => esc_html__( 'Min height', 'cliniq' ) ),


				array( 'param_name' => 'url', 'type' => 'link', 'heading' => esc_html__( 'URL', 'cliniq' ), 'preview' => true, 'description' => esc_html__( 'Enter full or local URL (e.g. https://www.bold-themes.com or /pages/about-us), post slug (e.g. about-us), #lightbox to open current image in full size or search for existing content.', 'cliniq' ), 'group' => esc_html__( 'URL', 'cliniq' ) ),
				array( 'param_name' => 'target', 'type' => 'dropdown', 'group' => esc_html__( 'URL', 'cliniq' ), 'heading' => esc_html__( 'Target', 'cliniq' ),
					'value' => array(
						esc_html__( 'Self (open in same tab)', 'cliniq' ) => '_self',
						esc_html__( 'Blank (open in new tab)', 'cliniq' ) => '_blank',
					)
				),

				array( 'param_name' => 'image_style', 'type' => 'dropdown', 'group' => esc_html__( 'Design', 'cliniq' ), 'heading' => esc_html__( 'Image shape', 'cliniq' ),
					'value' => array(
						esc_html__( 'Simple', 'cliniq' ) 				=> '',
						esc_html__( 'Sharp Rectangle', 'cliniq' ) 		=> 'rectangle'
					)
				),
				
				array( 'param_name' => 'border', 'type' => 'dropdown', 'default' => 'show', 'group' => esc_html__( 'Design', 'cliniq' ), 'heading' => esc_html__( 'Card border', 'cliniq' ),
					'value' => array(
						esc_html__( 'No', 'cliniq' ) 				=> '',
						esc_html__( 'Yes', 'cliniq' )				=> 'show'
				) ),
				array( 'param_name' => 'blur', 'type' => 'dropdown', 'default' => 'show', 'group' => esc_html__( 'Design', 'cliniq' ), 'heading' => esc_html__( 'Card blur', 'cliniq' ),
					'value' => array(
						esc_html__( 'No', 'cliniq' ) 				=> '',
						esc_html__( 'Yes', 'cliniq' )				=> 'show'
				) ),
				array( 'param_name' => 'shadow', 'type' => 'dropdown', 'group' => esc_html__( 'Design', 'cliniq' ), 'heading' => esc_html__( 'Card shadow', 'cliniq' ),
					'value' => array(
						esc_html__( 'No', 'cliniq' ) 					=> '',
						esc_html__( 'Show', 'cliniq' )					=> 'show',
						esc_html__( 'Show on hover', 'cliniq' )		=> 'show_on_hover'
				) ),
				array( 'param_name' => 'shape', 'type' => 'dropdown', 'heading' => esc_html__( 'Card shape', 'cliniq' ), 'group' => esc_html__( 'Design', 'cliniq' ),
					'value' => array(
						esc_html__( 'Inherit', 'cliniq' ) 			=> '',
						esc_html__( 'Square', 'cliniq' ) 			=> 'square',
						esc_html__( 'Soft Round', 'cliniq' ) 			=> 'rounded',
						esc_html__( 'Hard Round', 'cliniq' ) 			=> 'round'
					)
				),
				array( 'param_name' => 'padding', 'type' => 'dropdown', 'heading' => esc_html__( 'Inner padding', 'cliniq' ), 'preview' => true,
					'value' => array(
						esc_html__( 'Normal', 'cliniq' ) 		=> 'normal',
						esc_html__( 'Double', 'cliniq' ) 		=> 'double',
						esc_html__( 'Text Indent', 'cliniq' ) 	=> 'text_indent',
						esc_html__( '0px', 'cliniq' ) 			=> '0',
						esc_html__( '5px', 'cliniq' ) 			=> '5',
						esc_html__( '10px', 'cliniq' ) 		=> '10',
						esc_html__( '15px', 'cliniq' ) 		=> '15',
						esc_html__( '20px', 'cliniq' ) 		=> '20',
						esc_html__( '25px', 'cliniq' ) 		=> '25',
						esc_html__( '30px', 'cliniq' ) 		=> '30',
						esc_html__( '35px', 'cliniq' ) 		=> '35',
						esc_html__( '40px', 'cliniq' ) 		=> '40',
						esc_html__( '45px', 'cliniq' ) 		=> '45',
						esc_html__( '50px', 'cliniq' ) 		=> '50',
						esc_html__( '55px', 'cliniq' ) 		=> '55',
						esc_html__( '60px', 'cliniq' ) 		=> '60',
						esc_html__( '65px', 'cliniq' ) 		=> '65',
						esc_html__( '70px', 'cliniq' ) 		=> '70',
						esc_html__( '75px', 'cliniq' ) 		=> '75',
						esc_html__( '80px', 'cliniq' ) 		=> '80',
						esc_html__( '85px', 'cliniq' ) 		=> '85',
						esc_html__( '90px', 'cliniq' ) 		=> '90',
						esc_html__( '95px', 'cliniq' ) 		=> '95',
						esc_html__( '100px', 'cliniq' ) 		=> '100'
					)
				),
				array( 'param_name' => 'background_color', 'type' => 'colorpicker', 'heading' => esc_html__( 'Solid background color', 'cliniq' ), 'group' => esc_html__( 'Design', 'cliniq' ) ),
				
				array( 'param_name' => 'gradient_color_01', 'type' => 'colorpicker', 'heading' => esc_html__( 'Gradient color 01', 'cliniq' ), 'group' => esc_html__( 'Design', 'cliniq' ) ),
				array( 'param_name' => 'gradient_color_02', 'type' => 'colorpicker', 'heading' => esc_html__( 'Gradient color 02', 'cliniq' ), 'group' => esc_html__( 'Design', 'cliniq' ) ),
				array( 'param_name' => 'content_hover_color', 'type' => 'dropdown', 'group' => esc_html__( 'Design', 'cliniq' ), 'heading' => esc_html__( 'Content colors on hover (details & background)', 'cliniq' ),
					'value' => array(
						esc_html__( 'Inherit', 'cliniq' ) 								=> '',
						esc_html__( 'Light color, accent background', 'cliniq' ) 		=> 'light_accent',
						esc_html__( 'Light color, alternate background', 'cliniq' ) 	=> 'light_alternate'
					)
				)
				)
			)
		);
	}
}