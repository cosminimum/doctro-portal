<?php

class bt_bb_working_hours extends BT_BB_Element {

	function handle_shortcode( $atts, $content ) {
		extract( shortcode_atts( apply_filters( 'bt_bb_extract_atts', 
			array(
			'day'					=> '',
			'time'					=> '',
			'color_scheme' 			=> '',
			'url_text'				=> '',
			'url'					=> '',
			'target'				=> ''
		) ), $atts, $this->shortcode ) );
		
		$class = array( $this->shortcode );
		
		if ( $el_class != '' ) {
			$class[] = $el_class;
		}

		$id_attr = '';
		if ( $el_id != '' ) {
			$id_attr = ' ' . 'id="' . esc_attr( $el_id ) . '"';
		}

		$color_scheme_id = NULL;
		if ( is_numeric ( $color_scheme ) ) {
			$color_scheme_id = $color_scheme;
		} else if ( $color_scheme != '' ) {
			$color_scheme_id = bt_bb_get_color_scheme_id( $color_scheme );
		}
		$color_scheme_colors = bt_bb_get_color_scheme_colors_by_id( $color_scheme_id - 1 );
		if ( $color_scheme_colors ) $el_style .= '; --working-hours-primary-color:' . $color_scheme_colors[0] . '; --working-hours-secondary-color:' . $color_scheme_colors[1] . ';';
		if ( $color_scheme != '' ) $class[] = $this->prefix . 'color_scheme_' .  $color_scheme_id;

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


		$link = bt_bb_get_permalink_by_slug( $url );
		
		$output = '<div' . $id_attr . ' class="' . esc_attr( $class_attr ) . '" ' . $style_attr . '>';
			
			$output .= '<div class="' . esc_attr( $this->shortcode . '_inner_wrapper' ) . '">';
				if ( $day != '' ) $output .= '<div class="' . esc_attr( $this->shortcode . '_day' ) . '">' . $day . '</div>';
				if ( $time != '' ) $output .= '<div class="' . esc_attr( $this->shortcode . '_time' ) . '">' . $time . '</div>';
				if ( $link != '' ) $output .= '<div class="' . esc_attr( $this->shortcode ) . '_button">' . do_shortcode('[bt_bb_button text="' . esc_attr( $final_url_text ) . '" icon="remixiconsbusiness_e92d" icon_position="left" size="normal" color_scheme="' . esc_attr( $color_scheme ) . '" style="filled"  url="' . esc_attr( $link ) . '" target="' . esc_attr( $target ) . '" ignore_fe_editor="true"]' ) . '</div>';

			$output .= '</div>';
		
		$output .= '</div>';
		
		$output = apply_filters( 'bt_bb_general_output', $output, $atts );
		$output = apply_filters( $this->shortcode . '_output', $output, $atts );

		return $output;

	}

	function map_shortcode() {

		$color_scheme_arr = bt_bb_get_color_scheme_param_array();

		bt_bb_map( $this->shortcode, array( 'name' => esc_html__( 'Working Hours', 'cliniq' ), 'description' => esc_html__( 'Working hours with text and booking hyperlink.', 'cliniq' ), 'icon' => $this->prefix_backend . 'icon' . '_' . $this->shortcode, 'highlight' => true,
			'params' => array(
				array( 'param_name' => 'day', 'type' => 'textfield', 'heading' => esc_html__( 'Day', 'cliniq' ), 'preview' => true ),
				array( 'param_name' => 'time', 'type' => 'textfield', 'heading' => esc_html__( 'Time', 'cliniq' ) ),
				array( 'param_name' => 'color_scheme', 'type' => 'dropdown', 'heading' => esc_html__( 'Color scheme', 'cliniq' ), 'description' => esc_html__( 'Define color schemes in Bold Builder settings or define accent and alternate colors in theme customizer (if avaliable)', 'cliniq' ), 'value' => $color_scheme_arr, 'preview' => true ),

				
				array( 'param_name' => 'url', 'type' => 'link', 'heading' => esc_html__( 'URL', 'cliniq' ), 'group' => esc_html__( 'URL', 'cliniq' ), 'description' => esc_html__( 'Enter full or local URL (e.g. https://www.bold-themes.com or /pages/about-us), post slug (e.g. about-us), #lightbox to open current image in full size or search for existing content.', 'cliniq' ) ),
				array( 'param_name' => 'target', 'type' => 'dropdown', 'group' => esc_html__( 'URL', 'cliniq' ), 'heading' => esc_html__( 'Target', 'cliniq' ),
					'value' => array(
						esc_html__( 'Self (open in same tab)', 'cliniq' ) => '_self',
						esc_html__( 'Blank (open in new tab)', 'cliniq' ) => '_blank',
				) ),
				array( 'param_name' => 'url_text', 'type' => 'textfield', 'group' => esc_html__( 'URL', 'cliniq' ), 'heading' => esc_html__( 'Button text', 'cliniq' ) )
			)
		) );
	}
}