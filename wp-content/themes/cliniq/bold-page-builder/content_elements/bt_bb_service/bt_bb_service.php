<?php

class bt_bb_service extends BT_BB_Element {

	function handle_shortcode( $atts, $content ) {
		extract( shortcode_atts( apply_filters( 'bt_bb_extract_atts_' . $this->shortcode, array(
			'ai_prompt'   			=> '',
			'icon'         			=> '',
			'title'       	 		=> '',
			'html_tag'     			=> 'div',
			'text'         			=> '',
			'url'          			=> '',
			'target'       			=> '',
			'color_scheme' 			=> '',
			'style'        			=> '',
			'size'         			=> '',
			'shape'        			=> '',
			'align'        			=> '',
			'align_content'			=> '',
			'supertitle'   			=> '',
			'title_color_scheme' 	=> ''
		) ), $atts, $this->shortcode ) );

		$title = html_entity_decode( $title, ENT_QUOTES, 'UTF-8' );

		$class = array( $this->shortcode );
		$data_override_class = array();

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
		if ( $color_scheme_colors ) $el_style .= '; --service-primary-color:' . $color_scheme_colors[0] . '; --service-secondary-color:' . $color_scheme_colors[1] . ';';
		if ( $color_scheme != '' ) $class[] = $this->prefix . 'color_scheme_' .  $color_scheme_id;

		$title_color_scheme_id = NULL;
		if ( is_numeric ( $title_color_scheme ) ) {
			$title_color_scheme_id = $title_color_scheme;
		} else if ( $title_color_scheme != '' ) {
			$title_color_scheme_id = bt_bb_get_color_scheme_id( $title_color_scheme );
		}
		$title_color_scheme_colors = bt_bb_get_color_scheme_colors_by_id( $title_color_scheme_id - 1 );
		if ( $title_color_scheme_colors ) $el_style .= '; --service-title-primary-color:' . $title_color_scheme_colors[0] . '; --service-title-secondary-color:' . $title_color_scheme_colors[1] . ';';
		if ( $title_color_scheme != '' ) $class[] = $this->prefix . 'title_color_scheme_' .  $title_color_scheme_id;


		if ( $style != '' ) {
			$class[] = $this->prefix . 'style' . '_' . $style;
		}

		if ( $align_content != '' ) {
			$class[] = $this->prefix . 'align_content' . '_' . $align_content;
		}

		$this->responsive_data_override_class(
			$class, $data_override_class,
			array(
				'prefix' => $this->prefix,
				'param' => 'size',
				'value' => $size
			)
		);

		if ( $shape != '' ) {
			$class[] = $this->prefix . 'shape' . '_' . $shape;
		}

		if ( $supertitle == '' ) {
			$class[] = 'btNoSupertitle';
		}

		if ( $title != '' ) {
			$class[] = 'btWithTitle';
		}

		if ( $text == '' ) {
			$class[] = 'btNoText';
		}

		if ( $url != '' ) {
			$class[] = 'btWithLink';
		}

		$this->responsive_data_override_class(
			$class, $data_override_class,
			array(
				'prefix' => $this->prefix,
				'param' => 'align',
				'value' => $align
			)
		);
		
		$link = bt_bb_get_url( $url );

		$icon_title = wp_strip_all_tags($title);
		
		$icon = bt_bb_icon::get_html( $icon, '', $link, $icon_title, $target );

		if ( $link != '' ) {
			if ( $title != '' ) $title = '<a href="' . esc_url( $link ) . '" target="' . esc_attr( $target ) . '">' . $title . '</a>';
		}

		$style_attr = '';
		if ( $el_style != '' ) {
			$style_attr = ' ' . 'style="' . esc_attr( $el_style ) . '"';
		}

		$class = apply_filters( $this->shortcode . '_class', $class, $atts );

		$output = $icon;

		$output .= '<div class="' . esc_attr( $this->shortcode ) . '_content">';
			if ( $supertitle != '' ) $output .= '<div class="' . esc_attr( $this->shortcode ) . '_content_supertitle">' . $supertitle . '</div>';
			if ( $title != '' ) $output .= '<'. $html_tag . ' class="' . esc_attr( $this->shortcode ) . '_content_title">' . nl2br( $title ) . '</'. $html_tag . '>';
			if ( $text != '' ) $output .= '<div class="' . esc_attr( $this->shortcode ) . '_content_text">' . nl2br( $text ) . '</div>';
		$output .= '</div>';

		$output = '<div' . $id_attr . ' class="' . esc_attr( implode( ' ', $class ) ) . '"' . $style_attr . ' data-bt-override-class="' . htmlspecialchars( json_encode( $data_override_class, JSON_FORCE_OBJECT ), ENT_QUOTES, 'UTF-8' ) . '">' . $output . '</div>';
		
		$output = apply_filters( 'bt_bb_general_output', $output, $atts );
		$output = apply_filters( $this->shortcode . '_output', $output, $atts );

		return $output;

	}

	function map_shortcode() {

		$color_scheme_arr = bt_bb_get_color_scheme_param_array();

		bt_bb_map( $this->shortcode, array( 'name' => esc_html__( 'Service', 'cliniq' ), 'description' => esc_html__( 'Icon with text (and AI help)', 'cliniq' ), 'icon' => $this->prefix_backend . 'icon' . '_' . $this->shortcode,
			'params' => array(
				array(
					'param_name' => 'ai_prompt',
					'type' => 'ai_prompt',
					'target' =>
						array(
							'title' => array( 'alias' => 'title', 'title' => esc_html__( 'Title', 'cliniq' ) ),
							'text' => array( 'alias' => 'text', 'title' => esc_html__( 'Text', 'cliniq' ) ),
							'supertitle' => array( 'alias' => 'supertitle', 'title' => esc_html__( 'Supertitle', 'cliniq' ) ),
						),
					'system_prompt' => 'You are a copywriter and your GOAL is to help users generate website content. Based on the user prompt generate title and text for the website page.',
				),
				array( 'param_name' => 'icon', 'type' => 'iconpicker', 'heading' => esc_html__( 'Icon', 'cliniq' ), 'preview' => true ),
				array( 'param_name' => 'supertitle', 'type' => 'textfield', 'heading' => esc_html__( 'Supertitle', 'cliniq' ) ),
				array( 'param_name' => 'title', 'type' => 'textarea', 'heading' => esc_html__( 'Title', 'cliniq' ), 'preview' => true ),
				array( 'param_name' => 'html_tag', 'type' => 'dropdown', 'heading' => esc_html__( 'Title HTML tag', 'cliniq' ), 'preview' => true, 'default' => 'div',
					'value' => array(
						esc_html__( 'div', 'cliniq' ) => 'div',
						esc_html__( 'h1', 'cliniq' ) 	=> 'h1',
						esc_html__( 'h2', 'cliniq' ) 	=> 'h2',
						esc_html__( 'h3', 'cliniq' ) 	=> 'h3',
						esc_html__( 'h4', 'cliniq' ) 	=> 'h4',
						esc_html__( 'h5', 'cliniq' ) 	=> 'h5',
						esc_html__( 'h6', 'cliniq' ) 	=> 'h6'
				) ),
				array( 'param_name' => 'text', 'type' => 'textarea', 'heading' => esc_html__( 'Text', 'cliniq' ) ),
				array( 'param_name' => 'align', 'type' => 'dropdown', 'heading' => esc_html__( 'Icon position', 'cliniq' ), 'responsive_override' => true,
					'value' => array(
						esc_html__( 'Inherit', 'cliniq' ) 		=> 'inherit',
						esc_html__( 'Left', 'cliniq' ) 		=> 'left',
						esc_html__( 'Center', 'cliniq' ) 		=> 'center',
						esc_html__( 'Right', 'cliniq' ) 		=> 'right'
					)
				),
				array( 'param_name' => 'align_content', 'type' => 'dropdown', 'heading' => esc_html__( 'Content position', 'cliniq' ),
					'value' => array(
						esc_html__( 'Top', 'cliniq' ) 			=> '',
						esc_html__( 'Middle', 'cliniq' ) 		=> 'middle',
						esc_html__( 'Bottom', 'cliniq' ) 		=> 'bottom'
					)
				),

				array( 'param_name' => 'url', 'type' => 'link', 'heading' => esc_html__( 'URL', 'cliniq' ), 'group' => esc_html__( 'URL', 'cliniq' ), 'description' => esc_html__( 'Enter full or local URL (e.g. https://www.bold-themes.com or /pages/about-us) or post slug (e.g. about-us) or search for existing content.', 'cliniq' ) ),
				array( 'param_name' => 'target', 'type' => 'dropdown', 'group' => esc_html__( 'URL', 'cliniq' ), 'heading' => esc_html__( 'Target', 'cliniq' ),
					'value' => array(
						esc_html__( 'Self (open in same tab)', 'cliniq' ) => '_self',
						esc_html__( 'Blank (open in new tab)', 'cliniq' ) => '_blank',
					)
				),


				
				array( 'param_name' => 'size', 'type' => 'dropdown', 'heading' => esc_html__( 'Icon size', 'cliniq' ), 'responsive_override' => true, 'preview' => true, 'group' => esc_html__( 'Design', 'cliniq' ),
					'value' => array(
						esc_html__( 'Extra small', 'cliniq' ) 	=> 'xsmall',
						esc_html__( 'Small', 'cliniq' ) 		=> 'small',
						esc_html__( 'Normal', 'cliniq' ) 		=> 'normal',
						esc_html__( 'Large', 'cliniq' ) 		=> 'large',
						esc_html__( 'Extra large', 'cliniq' ) 	=> 'xlarge'
					)
				),
				array( 'param_name' => 'color_scheme', 'type' => 'dropdown', 'heading' => esc_html__( 'Service Color scheme', 'cliniq' ), 'description' => esc_html__( 'Define color schemes in Bold Builder settings or define accent and alternate colors in theme customizer (if avaliable)', 'cliniq' ), 'value' => $color_scheme_arr, 'preview' => true, 'group' => esc_html__( 'Design', 'cliniq' ) ),
				array( 'param_name' => 'title_color_scheme', 'type' => 'dropdown', 'heading' => esc_html__( 'Title & Text Color scheme', 'cliniq' ), 'description' => esc_html__( 'Define color schemes in Bold Builder settings or define accent and alternate colors in theme customizer (if avaliable)', 'cliniq' ), 'value' => $color_scheme_arr, 'group' => esc_html__( 'Design', 'cliniq' ) ),
				array( 'param_name' => 'style', 'type' => 'dropdown', 'heading' => esc_html__( 'Icon style', 'cliniq' ), 'preview' => true, 'group' => esc_html__( 'Design', 'cliniq' ),
					'value' => array(
						esc_html__( 'Outline', 'cliniq' ) 		=> 'outline',
						esc_html__( 'Filled', 'cliniq' ) 		=> 'filled',
						esc_html__( 'Borderless', 'cliniq' ) 	=> 'borderless'
					)
				),
				array( 'param_name' => 'shape', 'type' => 'dropdown', 'heading' => esc_html__( 'Icon shape', 'cliniq' ), 'default' => '', 'group' => esc_html__( 'Design', 'cliniq' ),
					'value' => array(
						esc_html__( 'Inherit', 'cliniq' ) 			=> '',
						esc_html__( 'Circle', 'cliniq' ) 			=> 'circle',
						esc_html__( 'Square', 'cliniq' ) 			=> 'square',
						esc_html__( 'Rounded Square', 'cliniq' ) 	=> 'round'
					)
				)
			)
		) );
	}
}