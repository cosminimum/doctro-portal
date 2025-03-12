<?php

class bt_bb_progress_bar extends BT_BB_Element {

	function handle_shortcode( $atts, $content ) {
		
		extract( shortcode_atts( apply_filters( 'bt_bb_extract_atts_' . $this->shortcode, array(
			'percentage'		=> '',
			'text'				=> '',
			'highlighted_text'	=> '',
			'color_scheme'		=> ''
		) ), $atts, $this->shortcode ) );

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

		if ( $color_scheme != '' ) {
			$class[] = $this->prefix . 'color_scheme' . '_' . $color_scheme;
		}
		
		$class = apply_filters( $this->shortcode . '_class', $class, $atts );

		$content = do_shortcode( $content );

		$output = '';

		$output .= '<div' . $id_attr . ' class="' . implode( ' ', $class ) . ' "' . $style_attr . '>';
			
			// TEXT
			$output .= '<div class="' . esc_attr( $this->shortcode ) . '_text_above">';
				if ( $text != '' ) $output .= '<div class="' . esc_attr( $this->shortcode ) . '_text"><span>' . $text . '</span></div>';
				if ( $highlighted_text != '' ) $output .= '<div class="' . esc_attr( $this->shortcode ) . '_highlighted_text animate" style="left: ' . $percentage . '%;"><span>' . $highlighted_text . '</span></div>';
			$output .= '</div>';

			// BAR
			$output .= '<div class="' . esc_attr( $this->shortcode ) . '_bg_cover">';
				$output .= '<div class="' . esc_attr( $this->shortcode ) . '_bg"><div class="bt_bb_progress_bar_inner animate" style="width:' . $percentage . '%"></div></div>';
			$output .= '</div>';

		$output .= '</div>';
		
		$output = apply_filters( 'bt_bb_general_output', $output, $atts );
		$output = apply_filters( $this->shortcode . '_output', $output, $atts );

		return $output;

	}

	function map_shortcode() {
		
		$color_scheme_arr = bt_bb_get_color_scheme_param_array();
		
		bt_bb_map( $this->shortcode, array( 'name' => esc_html__( 'Progress Bar', 'cliniq' ), 'description' => esc_html__( 'Progress bar', 'cliniq' ), 'icon' => $this->prefix_backend . 'icon' . '_' . $this->shortcode,
			'params' => array(
				array( 'param_name' => 'percentage', 'type' => 'textfield', 'heading' => esc_html__( 'Percentage', 'cliniq' ), 'preview' => true ),
				array( 'param_name' => 'text', 'type' => 'textfield', 'heading' => esc_html__( 'Text', 'cliniq' ), 'preview' => true ),
				array( 'param_name' => 'highlighted_text', 'type' => 'textfield', 'heading' => esc_html__( 'Highlighted text', 'cliniq' ), 'preview' => true ),
				array( 'param_name' => 'color_scheme', 'type' => 'dropdown', 'heading' => esc_html__( 'Color scheme', 'cliniq' ), 'preview' => true,
					'value' => array(
						esc_html__( 'Dark color', 'cliniq' ) 		=> '',
						esc_html__( 'Light color', 'cliniq' ) 		=> 'light',
						esc_html__( 'Accent color', 'cliniq' ) 	=> 'accent',
						esc_html__( 'Alternate color', 'cliniq' ) 	=> 'alternate'
					)
				)
			)
		) );
	}
}