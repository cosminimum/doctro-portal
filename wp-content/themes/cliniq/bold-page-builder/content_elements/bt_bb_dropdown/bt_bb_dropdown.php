<?php

class bt_bb_dropdown extends BT_BB_Element {

	function handle_shortcode( $atts, $content ) {
		extract( shortcode_atts( apply_filters( 'bt_bb_extract_atts_' . $this->shortcode, array(
			'title'       		=> ''
			
		) ), $atts, $this->shortcode ) );

		wp_enqueue_script( 
			'bt_bb_dropdown',
			get_template_directory_uri() . '/bold-page-builder/content_elements/bt_bb_dropdown/bt_bb_dropdown.js',
			array( 'jquery' ),
			'',
			true
		);

		$class = array( $this->shortcode );
		
		if ( $el_class != '' ) {
			$class[] = $el_class;
		}

		$id_attr = '';
		if ( $el_id != '' ) {
			$id_attr = ' ' . 'id="' . esc_attr( $el_id ) . '"';
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


		$output = '<div' . $id_attr . ' class="' . esc_attr( $class_attr ) . '" ' . $style_attr . '>';
					
			// IMAGE
			$output .= '<div class="' . esc_attr( $this->shortcode . '_image' ) . '">';
				$output .= '<div class="bt_bb_image bt_bb_shape_circle bt_bb_image_dropdown" data-bt-override-class="{}"><span><img id="bt_bb_image_dropdown" width="100" height="100" src="" class="attachment-shop_thumbnail size-shop_thumbnail" sizes="(max-width: 100px) 100vw, 100px"></span></div>';
			$output .= '</div>';

			$output .= '<div class="' . esc_attr( $this->shortcode . '_list' ) . '">';
				// HEADLINE
				$output .= '<div class="' . esc_attr( $this->shortcode . '_title' ) . '">' . do_shortcode( '[bt_bb_headline headline="' . esc_attr( $title ) . '" html_tag="h6" size="extrasmall" ignore_fe_editor="true"]') . '</div>';	


				// SELECT
				$output .= '<div class="' . esc_attr( $this->shortcode . '_select' ) . '">';
					$output .= '<select class="btDropdownSelect"  id="btDropdownSelect">';
						$output .= $content;
					$output .= '</select>';
				$output .= '</div>';
			$output .= '</div>';


			// BUTTON
			$output .= '<div class="' . esc_attr( $this->shortcode . '_button' ) . '">';
				$output .= '<div class="bt_bb_button bt_bb_icon_position_left bt_bb_color_scheme_6 bt_bb_style_filled bt_bb_size_normal bt_bb_align_inherit btWithIcon" data-bt-override-class="{}"><a  id="bt_bb_button_dropdown"  href="" target="_self" class="bt_bb_link"><span class="bt_bb_button_text"></span><span data-ico-remixiconsbusiness="" class="bt_bb_icon_holder"></span></a></div>';
			$output .= '</div>';

		$output .= '</div>';
		
		$output = apply_filters( 'bt_bb_general_output', $output, $atts );
		$output = apply_filters( $this->shortcode . '_output', $output, $atts );
			
		return $output;

	}


	function map_shortcode() {

		bt_bb_map( $this->shortcode, array( 'name' => esc_html__( 'Dropdown', 'cliniq' ), 'description' => esc_html__( 'Dropdown with image, text and button', 'cliniq' ), 'container' => 'vertical', 'accept' => array( 'bt_bb_dropdown_inner' => true ), 'icon' => $this->prefix_backend . 'icon' . '_' . $this->shortcode, 'highlight' => true,
			'params' => array(
				array( 'param_name' => 'title', 'type' => 'textarea', 'heading' => esc_html__( 'Title', 'cliniq' ) )

			))
		);
	}
}