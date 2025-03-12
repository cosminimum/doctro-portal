<?php

class bt_bb_tab_item extends BT_BB_Element {

	function handle_shortcode( $atts, $content ) {	
		extract( shortcode_atts( apply_filters( 'bt_bb_extract_atts_' . $this->shortcode, array(
			'title'  => '',
			'icon'	 => ''
		) ), $atts, $this->shortcode ) );
		
		$class = array( $this->shortcode );
		
		$class = apply_filters( $this->shortcode . '_class', $class, $atts );

		$icon_html = bt_bb_icon::get_html( $icon, '' );
		
		$output = '';
		
		// ICON
		if ( $icon != '' ) {
			$output1 = '<li class="bt_bb_tab_title_content btWithIcon">' . $icon_html . '<span class="bt_bb_tab_title">' . esc_attr( $title ) . '</span></li>';
		} else {
			$output1 = '<li class="bt_bb_tab_title_content"><span class="bt_bb_tab_title">' . esc_attr( $title ) . '</span></li>';
		}
		
		if ( strpos( $content, 'bt_bb_image' ) ) {
			$class[] = 'has_bt_bb_image';
		}

		$output2 = '<div class="' . implode( ' ', $class ) . '">
			<div class="bt_bb_tab_content">' . ( do_shortcode( $content ) ) . '</div>
		</div>';
		
		$output .= $output1 . '%$%' . $output2 . '%$%';
		
		$output = apply_filters( 'bt_bb_general_output', $output, $atts );
		$output = apply_filters( $this->shortcode . '_output', $output, $atts );
		
		return $output;

	}

	function add_params() {
		// removes default params from BT_BB_Element
	}

	function map_shortcode() {

		bt_bb_map( $this->shortcode, array( 'name' => esc_html__( 'Tab', 'cliniq' ), 'description' => esc_html__( 'Tab item', 'cliniq' ), 'container' => 'vertical', 'toggle' => true, 'accept' => array( 'bt_bb_section' => false, 'bt_bb_row' => false, 'bt_bb_column' => false, 'bt_bb_column_inner' => false, 'bt_bb_tabs' => false, 'bt_bb_tab_item' => false, 'bt_bb_accordion' => false, 'bt_bb_accordion_item' => false, 'bt_bb_cost_calculator_item' => false, 'bt_cc_group' => false, 'bt_cc_multiply' => false, 'bt_cc_item' => false, 'bt_bb_content_slider_item' => false, 'bt_bb_google_maps_location' => false, '_content' => false ), 'accept_all' => true, 'icon' => $this->prefix_backend . 'icon' . '_' . $this->shortcode,
			'params' => array(
				array( 'param_name' => 'icon', 'type' => 'iconpicker', 'heading' => esc_html__( 'Icon', 'cliniq' ), 'preview' => true ),
				array( 'param_name' => 'title', 'type' => 'textfield', 'heading' => esc_html__( 'Title', 'cliniq' ), 'preview' => true )			
			)
		) );
	}
}