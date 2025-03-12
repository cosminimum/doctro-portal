<?php

class bt_bb_content_slider extends BT_BB_Element {
	
	public $auto_play = '';

	function handle_shortcode( $atts, $content ) {
		extract( shortcode_atts( apply_filters( 'bt_bb_extract_atts_' . $this->shortcode, array(
			'height'    			=> '',
			'show_dots' 			=> '',
			'animation' 			=> 'slide',
			'direction' 			=> 'default',
			'gap' 					=> '',
			'arrows_size' 			=> '',
			'pause_on_hover'     	=> '',
			'slides_to_show' 		=> '',
			'additional_settings' 	=> '',
			'auto_play' 			=> '',
			'navigation_color'		=> ''
		) ), $atts, $this->shortcode ) );
		
		$class = array( $this->shortcode );
		$slider_class = array( 'slick-slider' );
		$data_override_class = array();
		
		if ( $el_class != '' ) {
			$class[] = $el_class;
		}
		
		$id_attr = '';
		if ( $el_id != '' ) {
			$id_attr = ' ' . 'id="' . esc_attr( $el_id ) . '"';
		}

		$style_attr = '';
		$el_style = apply_filters( $this->shortcode . '_style', $el_style, $atts );
		if ( $el_style != '' ) {
			$style_attr = ' ' . 'style="' . esc_attr( $el_style ) . '"';
		}
		
		if ( $gap != '' ) {
			$class[] = $this->prefix . 'gap' . '_' . $gap;
		}
		
		if ( $arrows_size != '' ) {
			$class[] = $this->prefix . 'arrows_size' . '_' . $arrows_size;
		}
		
		if ( $show_dots != '' ) {
			$class[] = $this->prefix . 'show_dots_' . $show_dots;
		}
		
		if ( $height != '' ) {
			$class[] = $this->prefix . 'height' . '_' . $height;
		}
		
		if ( $navigation_color != '' ) {
			$class[] = $this->prefix . 'navigation_color' . '_' . $navigation_color;
		}

		if ( $animation != '' ) {
			$class[] = $this->prefix . 'animation' . '_' . $animation;
		}
		
		$data_slick  = ' data-slick=\'{ "lazyLoad": "progressive", "cssEase": "ease-out", "speed": "600", "accessibility": false';
		
		if ( $animation == 'fade' ) {
			$data_slick .= ', "fade": true';
			$slider_class[] = 'fade';
			$slides_to_show = 1;
		}
		
		if ( $arrows_size != 'no_arrows' ) {
			$data_slick  .= ', "prevArrow": "&lt;button type=\"button\" class=\"slick-prev\" aria-label=\"' . esc_html__( 'Previous', 'cliniq' ) . '\" tabindex=\"0\" role=\"button\"&gt;&lt;/button&gt;", "nextArrow": "&lt;button type=\"button\" class=\"slick-next\" aria-label=\"' . esc_html__( 'Next', 'cliniq' ) . '\" tabindex=\"0\" role=\"button\"&gt;&lt;/button&gt;"';
		} else {
			$data_slick .= ', "arrows": false';
		}
		
		if ( $height != 'keep-height' ) {
			$data_slick .= ', "adaptiveHeight": true';
		}
		
		if ( $show_dots != 'hide' ) {
			$data_slick .= ', "dots": true' ;
		}
		
		if ( $slides_to_show > 1 ) {
			$data_slick .= ',"slidesToShow": ' . intval( $slides_to_show );
			$class[] = $this->prefix . 'multiple_slides';
		}
		
		if ( $auto_play != '' ) {
			$data_slick .= ',"autoplay": true, "autoplaySpeed": ' . intval( $auto_play );
		}
		
		if ( $pause_on_hover == 'no' ) {
			$data_slick .= ',"pauseOnHover": false';
		}

		$dir_attr = "";

		if ( is_rtl() && ( !in_array( $direction, array( 'rtl', 'ltr') ) ) ) {
			$data_slick .= ', "rtl": true' ;
		} else if( $direction == 'rtl' ) {
			$data_slick .= ', "rtl": true' ;
			$dir_attr = " dir='rtl'";
		} else if( $direction == 'ltr' ) {
			$data_slick .= ', "rtl": false' ;
			$dir_attr = " dir='ltr'";
		}
		
		if ( $slides_to_show > 1 ) {
			$data_slick .= ', "responsive": [';
			if ( $slides_to_show > 1 ) {
				$data_slick .= '{ "breakpoint": 480, "settings": { "slidesToShow": 1, "slidesToScroll": 1 } }';	
			}
			if ( $slides_to_show > 2 ) {
				$data_slick .= ',{ "breakpoint": 768, "settings": { "slidesToShow": 2, "slidesToScroll": 2 } }';	
			}
			if ( $slides_to_show > 3 ) {
				$data_slick .= ',{ "breakpoint": 920, "settings": { "slidesToShow": 3, "slidesToScroll": 3 } }';	
			}
			if ( $slides_to_show > 4 ) {
				$data_slick .= ',{ "breakpoint": 1024, "settings": { "slidesToShow": 3, "slidesToScroll": 3 } }';	
			}				
			$data_slick .= ']';
		}

		if ( $additional_settings != '' ) {
			$data_slick .= ', ' . $additional_settings;
		}

		$data_slick = $data_slick . '}\' ';

		do_action( $this->shortcode . '_before_extra_responsive_param' );
		foreach ( $this->extra_responsive_data_override_param as $p ) {
			if ( ! is_array( $atts ) || ! array_key_exists( $p, $atts ) ) continue;
			$this->responsive_data_override_class(
				$class, $data_override_class,
				apply_filters( $this->shortcode . '_responsive_data_override', array(
					'prefix' => $this->prefix,
					'param' => $p,
					'value' => $atts[ $p ],
				) )
			);
		}
		
		$class = apply_filters( $this->shortcode . '_class', $class, $atts );

		$output = '<div' . $id_attr . ' class="' . implode( ' ', $class ) . '"' . $style_attr . '' . $dir_attr . ' data-bt-override-class="' . htmlspecialchars( json_encode( $data_override_class, JSON_FORCE_OBJECT ), ENT_QUOTES, 'UTF-8' ) . '"><div class="' . implode( ' ', $slider_class ) . '" ' . $data_slick .  '>' . do_shortcode( $content ) . '</div></div>';
		
		$output = apply_filters( 'bt_bb_general_output', $output, $atts );
		$output = apply_filters( $this->shortcode . '_output', $output, $atts );
		
		return $output;

	}

	function map_shortcode() {
		bt_bb_map( $this->shortcode, array( 'name' => esc_html__( 'Slider', 'cliniq' ), 'description' => esc_html__( 'Slider with custom content', 'cliniq' ), 'container' => 'vertical', 'accept' => array( 'bt_bb_content_slider_item' => true ), 'toggle' => true, 'icon' => $this->prefix_backend . 'icon' . '_' . $this->shortcode,
			'params' => array(
				array( 'param_name' => 'height', 'type' => 'dropdown', 'preview' => true, 'heading' => esc_html__( 'Size', 'cliniq' ),
					'value' => array(
						esc_html__( 'Auto', 'cliniq' ) 			=> 'auto',
						esc_html__( 'Keep height', 'cliniq' ) 		=> 'keep-height',
						esc_html__( 'Half screen', 'cliniq' ) 		=> 'half_screen',
						esc_html__( 'Full screen', 'cliniq' ) 		=> 'full_screen'
					)
				),
				array( 'param_name' => 'animation', 'preview' => true, 'default' => 'slide', 'type' => 'dropdown', 'heading' => esc_html__( 'Animation', 'cliniq' ), 'description' => esc_html__( 'If fade is selected, number of slides to show will be 1', 'cliniq' ),
					'value' => array(
						esc_html__( 'Default (slide)', 'cliniq' ) 	=> 'slide',
						esc_html__( 'Fade', 'cliniq' ) 			=> 'fade'
					)
				),
				array( 'param_name' => 'direction', 'preview' => true, 'default' => 'default', 'type' => 'dropdown', 'heading' => esc_html__( 'Direction', 'cliniq' ), 'description' => esc_html__( 'Default option follows Wordpress language settings.', 'cliniq' ),
					'value' => array(
						esc_html__( 'Default (switch rtl / ltr)', 'cliniq' ) 						=> 'default',
						esc_html__( 'Left to right', 'cliniq' ) 									=> 'ltr',
						esc_html__( 'Right to left', 'cliniq' ) 									=> 'rtl'
					)
				),
				array( 'param_name' => 'arrows_size', 'type' => 'dropdown', 'preview' => true, 'default' => 'normal', 'heading' => esc_html__( 'Navigation arrows size', 'cliniq' ),
					'value' => array(
						esc_html__( 'No arrows', 'cliniq' ) 		=> 'no_arrows',
						esc_html__( 'Small', 'cliniq' ) 			=> 'small',
						esc_html__( 'Normal', 'cliniq' ) 			=> 'normal',
						esc_html__( 'Large', 'cliniq' ) 			=> 'large'
					)
				),
				array( 'param_name' => 'show_dots', 'type' => 'dropdown', 'heading' => esc_html__( 'Dots navigation', 'cliniq' ),
					'value' => array(
						esc_html__( 'Bottom', 'cliniq' ) 		=> 'bottom',
						esc_html__( 'Below', 'cliniq' ) 		=> 'below',
						esc_html__( 'Hide', 'cliniq' ) 		=> 'hide'
					)
				),
				array( 'param_name' => 'navigation_color', 'type' => 'dropdown', 'heading' => esc_html__( 'Dots navigation color', 'cliniq' ),
					'value' => array(
						esc_html__( 'Light color', 'cliniq' ) 			=> '',
						esc_html__( 'Dark color', 'cliniq' ) 			=> 'dark',
						esc_html__( 'Accent color', 'cliniq' ) 		=> 'accent',
						esc_html__( 'Alternate color', 'cliniq' ) 		=> 'alternate',
						esc_html__( 'Gray color', 'cliniq' ) 			=> 'gray'
					)
				),
				array( 'param_name' => 'pause_on_hover', 'default' => 'yes', 'type' => 'dropdown', 'heading' => esc_html__( 'Pause slideshow on hover', 'cliniq' ),
					'value' => array(
						esc_html__( 'Yes', 'cliniq' ) 			=> 'yes',
						esc_html__( 'No', 'cliniq' ) 			=> 'no'
					)
				),
				array( 'param_name' => 'slides_to_show', 'type' => 'textfield', 'preview' => true, 'default' => 1, 'heading' => esc_html__( 'Number of slides to show', 'cliniq' ), 'description' => esc_html__( 'e.g. 3', 'cliniq' ) ),
				array( 'param_name' => 'additional_settings', 'type' => 'textfield', 'heading' => esc_html__( 'Additional settings', 'cliniq' ), 'description' => esc_html__( 'E.g. "slidesToScroll": 3, "infinite": false, "centerMode": true, "centerPadding": "60px" (check https://kenwheeler.github.io/slick/ for more)', 'cliniq' ) ),
				array( 'param_name' => 'gap', 'type' => 'dropdown', 'heading' => esc_html__( 'Gap', 'cliniq' ),
					'value' => array(
						esc_html__( 'No gap', 'cliniq' ) 		=> 'no_gap',
						esc_html__( 'Small', 'cliniq' ) 		=> 'small',
						esc_html__( 'Normal', 'cliniq' ) 		=> 'normal',
						esc_html__( 'Large', 'cliniq' ) 		=> 'large'
					)
				),
				array( 'param_name' => 'auto_play', 'type' => 'textfield', 'heading' => esc_html__( 'Autoplay interval (ms)', 'cliniq' ), 'description' => esc_html__( 'e.g. 2000', 'cliniq' ) )
			)
		) );
	}
}