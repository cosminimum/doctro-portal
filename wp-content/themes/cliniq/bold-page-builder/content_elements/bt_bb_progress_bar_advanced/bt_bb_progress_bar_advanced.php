<?php

/* examples:
https://kimmobrunfeldt.github.io/progressbar.js/
http://progressbarjs.readthedocs.io/en/latest/api/shape/
*/

class bt_bb_progress_bar_advanced extends BT_BB_Element {

	function handle_shortcode( $atts, $content ) {
		extract( shortcode_atts( apply_filters( 'bt_bb_extract_atts', array(
			'type'        					=> '',
			'percentage'        			=> '',
			'duration'     	   				=> '',
			'easing'       	 				=> '',
			'text'        					=> '',
			'url'							=> '',
			'target'						=> '',
			'size'        					=> '',
			'thickness'						=> '',
			'trail_thickness'				=> '',
			'color_from' 					=> '',
			'color_to' 						=> '',
			'trail_color'       			=> '',
			'fill_color'					=> '',
			'font_weight'					=> '',
			'text_color'					=> ''
		) ), $atts, $this->shortcode ) );

		$pb_id = rand(1000, 100000);

		/**
		* Enqueue scripts and styles
		*/

		$content_elements_path			= get_template_directory_uri() . '/bold-page-builder/content_elements/bt_bb_progress_bar_advanced/';
		$content_elements_misc_path_js	= get_template_directory_uri() . '/bold-page-builder/content_elements_misc/js/';

		wp_enqueue_script( 
			'bt_bb_progressbar_advanced_js',
			$content_elements_path . 'bb_progressbar_advanced.js',
			array( 'jquery' ),
			'',
			true
		);

		wp_enqueue_script( 
			'bt_bb_progressbar_advanced',
			$content_elements_misc_path_js . 'bt_bb_progress_bar_advanced.js',
			array( 'jquery' ),
			'',
			true
		);


		$class = array( $this->shortcode );
		$class[] = 'animate-adv_progressbar';

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

		if ( $size != '' ) {
			$class[] = $this->prefix . 'size' . '_' . $size;
		}

		if ( $font_weight != '' ) {
			$class[] = $this->prefix . 'font_weight' . '_' . $font_weight;
		}

		if ( $text_color != '' ) {
			$class[] = $this->prefix . 'text_color' . '_' . $text_color;
		}

	

		if ( $percentage == '' ) {
			$percentage = 100;
		}

		if ( $fill_color != '' ) {
			if ( strpos( $fill_color, '#' ) !== false ) {
				$fill_color = $this->hex2rgba($fill_color, 1);
			}
		}

		$container				= 'container_' . $pb_id;
		$container_text			= $text;
		$container_percentage	= $percentage / 100;
		$container_duration		= ( $duration == '' ) ? '1400' : $duration;	
		$container_easing		= ( $easing == '') ? 'linear' : $easing;
			
		$container_color_from	= ( $color_from == '') ? '#eee' : $color_from;
		$container_color_to		= ( $color_to == '') ? '#000' : $color_to;		
		$container_trail_color	= ( $trail_color == '') ? '#eee' : $trail_color;
		$container_fill			= ( $fill_color) ? $fill_color : null;


		if ( $color_to == "" && $color_from != "") {
			$container_color_to = $container_color_from;
		}


		switch( $thickness ){
			case 'small':	$container_depth_from	= 1;	$container_depth_to		= 1;	$container_stroke_width = 1;	$container_trail_width	= 1;break;
			case 'normal':	$container_depth_from	= 2;	$container_depth_to		= 2;	$container_stroke_width = 2;	$container_trail_width	= 2;break;
			case 'medium':	$container_depth_from	= 4;	$container_depth_to		= 4;	$container_stroke_width = 4;	$container_trail_width	= 4;break;
			case 'large':	$container_depth_from	= 8;	$container_depth_to		= 8;	$container_stroke_width = 8;	$container_trail_width	= 8;break;
			case 'xlarge':	$container_depth_from	= 10;	$container_depth_to		= 10;	$container_stroke_width = 10;	$container_trail_width	= 10;break;
			default:break;
		}

		switch( $trail_thickness ){
			case 'small':	$container_trail_width	= 1;break;
			case 'normal':	$container_trail_width	= 2;break;
			case 'medium':	$container_trail_width	= 4;break;
			case 'large':	$container_trail_width	= 8;break;
			case 'xlarge':	$container_trail_width	= 10;break;
			default:break;
		}

		$link = '';

		if ( $url != '' && $url != '#' && substr( $url, 0, 4 ) != 'http' && substr( $url, 0, 5 ) != 'https' && substr( $url, 0, 6 ) != 'mailto' ) {
			$link = bt_bb_get_permalink_by_slug( $url );
		} else {
			$link = $url;
		}


		if ( $container_color_to == "" ) {
			$container_color_to = $container_color_from;
		}

		$content = do_shortcode( $content );
		$data = ' data-container="' . esc_attr( $container ) . '"';
		$data .= ' data-container-pbid="' . esc_attr( $pb_id ) . '"';
		$data .= ' data-container-type="' . esc_attr( $type ) . '"';
		$data .= ' data-container-percentage="' . esc_attr( $container_percentage ) . '"';
		$data .= ' data-container-stroke-width="' . esc_attr( $container_stroke_width ) . '"';
		$data .= ' data-container-trail-color="' . esc_attr( $container_trail_color ) . '"';
		$data .= ' data-container-trail-width="' . esc_attr( $container_trail_width ) . '"';
		$data .= ' data-container-easing="' . esc_attr( $container_easing ) . '"';
		$data .= ' data-container-color-from="' . esc_attr( $container_color_from ) . '"';
		$data .= ' data-container-depth-from="' . esc_attr( $container_depth_from ) . '"';
		$data .= ' data-container-color-to="' . esc_attr( $container_color_to ) . '"';
		$data .= ' data-container-depth-to="' . esc_attr( $container_depth_to ) . '"';
		$data .= ' data-container-fill="' . esc_attr( $container_fill ) . '"';
		$data .= ' data-container-duration="' . esc_attr( $container_duration ) . '"';
		$data .= ' data-container-text="' . esc_attr( $container_text ) . '"';

		$output = '';

		$class = apply_filters( $this->shortcode . '_class', $class, $atts );


			// PROGRESS BAR
			$output .= '<div' . $id_attr . ' class="' . esc_attr( implode( ' ', $class ) ) . '"' . $style_attr . ' ' . $data . '>';


			if ( $link != '' ) {
				$target_attr = 'target="_self"';
				if ( $target != '' ) {
					$target_attr = ' ' . 'target="' . esc_attr( $target ) . '"';
				}
				$output .= '<a href="' . esc_url( $link ) . '" ' . $target_attr.'>';
			}


			// CONTAINER
			$output .= '<div id="' . esc_attr( 'container_' . $pb_id ) . '" class="container">';

				// TEXT
				if ( $container_text != '' ) {
					
					$output .= '<span class="bt_bb_progress_bar_advanced_text">' . wp_kses_post( $container_text ) . '</span>';
					
				}

			$output .= '</div>';


			if ( $link != '' ) {
				$output .= '</a>';
			}
				
		$output .= '</div>';

		
		$output = apply_filters( 'bt_bb_general_output', $output, $atts );
		$output = apply_filters( $this->shortcode . '_output', $output, $atts );
			
		return $output;
	}

	

	/* Convert hexdec color string to rgb(a) string */ 
	static function hex2rgba($color, $opacity = false) {
		$default = 'rgb(0,0,0)';

		// Return default if no color provided
		if ( empty($color) )
			return $default;

		// Sanitize $color if "#" is provided 
		if ($color[0] == '#' ) {
			$color = substr( $color, 1 );
		}

		// Check if color has 6 or 3 characters and get values
		if (strlen($color) == 6) {
			$hex = array( $color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5] );
		} elseif ( strlen( $color ) == 3 ) {
			$hex = array( $color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2] );
		} else {
			return $default;
		}

		// Convert hexadec to rgb
		$rgb =  array_map('hexdec', $hex);

		// Check if opacity is set(rgba or rgb)
		if ( $opacity ) {
			if ( abs($opacity ) > 1 )
				$opacity = 1.0;
				$output = 'rgba('.implode(",",$rgb).','.$opacity.')';
			} else {
				$output = 'rgb('.implode(",",$rgb).')';
			}
		// Return rgb(a) color string
		return $output;
	}

	function map_shortcode() {

		bt_bb_map( $this->shortcode, array( 'name' => esc_html__( 'Advanced Progress bar', 'cliniq' ), 'description' => esc_html__( 'Advanced Progress bar', 'cliniq' ), 'container' => 'vertical', 'accept' => false, 'icon' => $this->prefix_backend . 'icon' . '_' . $this->shortcode,
			'params' => array(
				array( 'param_name' => 'type', 'type' => 'dropdown', 'heading' => esc_html__( 'Progress Bar Type', 'cliniq' ), 'preview' => true,
					'value' => array(
						esc_html__( 'Semi circle', 'cliniq' ) 		=> 'semi-circle',
						esc_html__( 'Circle', 'cliniq' ) 			=> 'circle'
					)
				),
				array( 'param_name' => 'percentage', 'type' => 'textfield', 'heading' => esc_html__( 'Percentage', 'cliniq' ), 'description' => esc_html__( 'Enter number from 1 to 100, without %', 'cliniq' ), 'preview' => true ),
				array( 'param_name' => 'duration', 'type' => 'textfield', 'heading' => esc_html__( 'Animation duration', 'cliniq' ), 'preview' => true ),
						array( 'param_name' => 'easing', 'type' => 'dropdown', 'heading' => esc_html__( 'Easing', 'cliniq' ), 'preview' => true,
					'value' => array(
						esc_html__( 'Linear', 'cliniq' ) 			=> 'linear',
						esc_html__( 'Ease In Out', 'cliniq' ) 		=> 'easeInOut',
						esc_html__( 'Bounce', 'cliniq' ) 			=> 'bounce'
					)
				),
				array( 'param_name' => 'text', 'type' => 'textarea', 'heading' => esc_html__( 'Text', 'cliniq' ) ),
				
				

				array( 'param_name' => 'url', 'group' => esc_html__( 'URL', 'cliniq' ), 'type' => 'textfield', 'heading' => esc_html__( 'URL', 'cliniq' ) ),
				array( 'param_name' => 'target', 'group' => esc_html__( 'URL', 'cliniq' ), 'type' => 'dropdown', 'heading' => esc_html__( 'URL Target', 'cliniq' ),
					'value' => array(
						esc_html__( 'Self (open in same tab)', 'cliniq' ) 	=> '_self',
						esc_html__( 'Blank (open in new tab)', 'cliniq' ) 	=> '_blank',
					)
				),

				
				array( 'param_name' => 'size', 'type' => 'dropdown', 'default' => 'normal', 'heading' => esc_html__( 'Progress bar size', 'cliniq' ), 'group' => esc_html__( 'Design', 'cliniq' ), 'preview' => true,
					'value' => array(
						esc_html__( 'Small', 'cliniq' ) 			=> 'small',
						esc_html__( 'Normal', 'cliniq' ) 			=> 'normal',
						esc_html__( 'Medium', 'cliniq' ) 			=> 'medium',
						esc_html__( 'Large', 'cliniq' ) 			=> 'large',
						esc_html__( 'Extra large', 'cliniq' ) 		=> 'xlarge'
					)
				),
				array( 'param_name' => 'thickness', 'type' => 'dropdown', 'heading' => esc_html__( 'Progress bar thickness', 'cliniq' ), 'group' => esc_html__( 'Design', 'cliniq' ),
					'value' => array(
						esc_html__( 'Small', 'cliniq' ) 			=> 'small',
						esc_html__( 'Normal', 'cliniq' ) 			=> 'normal',
						esc_html__( 'Medium', 'cliniq' ) 			=> 'medium',
						esc_html__( 'Large', 'cliniq' ) 			=> 'large',
						esc_html__( 'Extra large', 'cliniq' ) 		=> 'xlarge'
					)
				),
				array( 'param_name' => 'trail_thickness', 'type' => 'dropdown', 'heading' => esc_html__( 'Progress bar trail thickness', 'cliniq' ), 'group' => esc_html__( 'Design', 'cliniq' ),
					'value' => array(
						esc_html__( 'Same as progress bar', 'cliniq' ) 	=> 'progressbar',
						esc_html__( 'Small', 'cliniq' ) 					=> 'small',
						esc_html__( 'Normal', 'cliniq' ) 					=> 'normal',
						esc_html__( 'Medium', 'cliniq' ) 					=> 'medium',
						esc_html__( 'Large', 'cliniq' ) 					=> 'large',
						esc_html__( 'Extra large', 'cliniq' ) 				=> 'xlarge'
					)
				),
				array( 'param_name' => 'color_from', 'type' => 'colorpicker', 'heading' => esc_html__( 'Starting Progress Bar Background color', 'cliniq' ), 'group' => esc_html__( 'Design', 'cliniq' ) ),
				array( 'param_name' => 'color_to', 'type' => 'colorpicker', 'heading' => esc_html__( 'Ending Progress Bar Background color', 'cliniq' ), 'group' => esc_html__( 'Design', 'cliniq' ) ),
				array( 'param_name' => 'trail_color', 'type' => 'colorpicker', 'heading' => esc_html__( 'Color for lighter trail stroke underneath the actual progress path', 'cliniq' ), 'group' => esc_html__( 'Design', 'cliniq' ) ),
				array( 'param_name' => 'fill_color', 'type' => 'colorpicker', 'heading' => esc_html__( 'Fill color', 'cliniq' ), 'group' => esc_html__( 'Design', 'cliniq' ) ),
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
				array( 'param_name' => 'text_color', 'type' => 'dropdown', 'group' => esc_html__( 'Design', 'cliniq' ), 'heading' => esc_html__( 'Text color', 'cliniq' ), 
					'value' => array(
						esc_html__( 'Inherit', 'cliniq' ) 					=> '',
						esc_html__( 'Light color', 'cliniq' ) 				=> 'light',
						esc_html__( 'Dark color', 'cliniq' ) 				=> 'dark',
						esc_html__( 'Accent color', 'cliniq' ) 			=> 'accent',
						esc_html__( 'Alternate color', 'cliniq' ) 			=> 'alternate'
					)
				),
			)
		) );
	}
}

