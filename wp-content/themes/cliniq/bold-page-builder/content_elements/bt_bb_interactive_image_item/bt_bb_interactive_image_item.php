<?php

class bt_bb_interactive_image_item extends BT_BB_Element {

	function handle_shortcode( $atts, $content ) {
		extract( shortcode_atts( apply_filters( 'bt_bb_extract_atts_' . $this->shortcode, array(
			'title'							=> '',
			'text'							=> '',
			'position_x'					=> '',
			'position_y'					=> ''
		) ), $atts, $this->shortcode ) );
		
		$class = array( $this->shortcode );

		$class = apply_filters( $this->shortcode . '_class', $class, $atts );

		$random_id = rand(10000, 99999);

		$content = do_shortcode( $content );

		$output = '';

		$output .= '<div class="' . implode( ' ', $class ) . '" data-title="' . esc_attr( $title ) . '" data-x="' . esc_attr( $position_x ) . '" data-y="' . esc_attr( $position_y ) . '" data-id="' . esc_attr( $random_id ) . '" style="top: ' . esc_attr( $position_y ) . '%; left: ' . esc_attr( $position_x ) . '%;">';
			$output .= '<div class="bt_bb_interactive_image_item_dot" data-id="' . esc_attr( $random_id ) . '" data-title="' . esc_attr( $title ) . '"><div class="bt_bb_interactive_image_item_dot_tooltip"><div class="bt_bb_interactive_image_item_dot_tooltip_title">' . esc_attr( $title ) . '</div><div class="bt_bb_interactive_image_item_dot_tooltip_text">' . nl2br( wp_kses_post( $text ) ) . '</div></div></div>';
			$output .= '<div class="' . esc_attr( $this->shortcode . '_content') . '">';
				if ( $content != '' )  $output .= '<div class="' . esc_attr( $this->shortcode ) . '_inner_content">' . $content . '</div>';
			$output .= '</div>';
		$output .= '</div>';		
		
		$output = apply_filters( 'bt_bb_general_output', $output, $atts );
		$output = apply_filters( $this->shortcode . '_output', $output, $atts );
		
		return $output;

		$output = '';

	}

	function map_shortcode() {
		bt_bb_map( $this->shortcode, array( 'name' => esc_html__( 'Interactive Image Item', 'cliniq' ), 'description' => esc_html__( 'Interactive Image Item', 'cliniq' ), 'container' => 'vertical', 'accept' => array( 'bt_bb_headline' => true, 'bt_bb_image' => true, 'bt_bb_separator' => true, 'bt_bb_single_product' => true ), 'as_child' => array( 'only' => 'bt_bb_interactive_image' ), 'icon' => $this->prefix_backend . 'icon' . '_' . $this->shortcode,
			'params' => array(
				array( 'param_name' => 'title', 'type' => 'textfield', 'preview' => true, 'heading' => esc_html__( 'Title', 'cliniq' ) ),
				array( 'param_name' => 'text', 'type' => 'textarea', 'heading' => esc_html__( 'Text', 'cliniq' ) ),
				array( 'param_name' => 'position_x', 'type' => 'textfield', 'preview' => true, 'description' => esc_html__( 'Enter X position in percentage in order to position Interactive dot on the image.', 'cliniq' ), 'group' => esc_html__( 'Position', 'cliniq' ), 'heading' => esc_html__( 'Position X', 'cliniq' ) ),
				array( 'param_name' => 'position_y', 'type' => 'textfield', 'preview' => true, 'group' => esc_html__( 'Position', 'cliniq' ), 'description' => esc_html__( 'Enter Y position in percentage in order to position Interactive dot on the image.', 'cliniq' ), 'heading' => esc_html__( 'Position Y', 'cliniq' ) )
			)
		) );
	}
}