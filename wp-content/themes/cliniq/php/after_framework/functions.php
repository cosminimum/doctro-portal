<?php


// NEW IMAGE SIZES

function cliniq_custom_image_sizes () {
	
	/* Large */
	add_image_size( 'boldthemes_large_4:3', 1280, 960, true );
	add_image_size( 'boldthemes_large_vertical_rectangle', 850, 1280, true );
	
	/* Medium */
	add_image_size( 'boldthemes_medium_4:3', 1080, 810, true );
	add_image_size( 'boldthemes_medium_vertical_rectangle', 720, 1080, true );
	
	/* Small */
	add_image_size( 'boldthemes_small_4:3', 540, 405, true );
	add_image_size( 'boldthemes_small_vertical_rectangle', 360, 540, true );
}

add_action( 'after_setup_theme', 'cliniq_custom_image_sizes', 11);



// COLOR SCHEME

if ( is_file( dirname(__FILE__) . '/../../../../plugins/bold-page-builder/content_elements_misc/misc.php' ) ) {
	require_once( dirname(__FILE__) . '/../../../../plugins/bold-page-builder/content_elements_misc/misc.php' );
}
if ( function_exists('bt_bb_get_color_scheme_param_array') ) {
	$color_scheme_arr = bt_bb_get_color_scheme_param_array();
} else {
	$color_scheme_arr = array();
}


// SECTION
if ( function_exists( 'bt_bb_remove_params' ) ) {
	bt_bb_remove_params( 'bt_bb_section', 'background_overlay' );
}

if ( function_exists( 'bt_bb_add_params' ) ) {
	bt_bb_add_params( 'bt_bb_section', array(
		array( 'param_name' => 'background_overlay', 'type' => 'dropdown', 'heading' => esc_html__( 'Background overlay', 'cliniq' ), 'group' => esc_html__( 'Design', 'cliniq' ), 
			'value' => array(
				esc_html__( 'No overlay', 'cliniq' )    				=> '',
				esc_html__( 'Light stripes', 'cliniq' ) 				=> 'light_stripes',
				esc_html__( 'Dark stripes', 'cliniq' )  				=> 'dark_stripes',
				esc_html__( 'Light solid', 'cliniq' )	  				=> 'light_solid',
				esc_html__( 'Dark solid', 'cliniq' )	  				=> 'dark_solid',
				esc_html__( 'Light top & bottom gradient', 'cliniq' )	=> 'light_gradient',
				esc_html__( 'Light top gradient', 'cliniq' )			=> 'light_top_gradient',
				esc_html__( 'Light bottom gradient', 'cliniq' )		=> 'light_bottom_gradient',
				esc_html__( 'Dark gradient', 'cliniq' )	  			=> 'dark_gradient'
			)
		),
		array( 'param_name' => 'allow_content_outside', 'type' => 'dropdown', 'heading' => esc_html__( 'Top & Bottom Coverage Images position', 'cliniq' ), 'group' => esc_html__( 'Design', 'cliniq' ),
			'value' => array(
				esc_html__( 'Top & Bottom Coverage Image above content', 'cliniq' ) 			=> '',
				esc_html__( 'Top & Bottom Coverage Image under content', 'cliniq' ) 			=> 'under',
				esc_html__( 'Only Top Coverage Image under content', 'cliniq' ) 				=> 'top_under',
				esc_html__( 'Bottom Coverage Image under content', 'cliniq' ) 					=> 'bottom_under'
			)
		),
	));
}

function cliniq_bt_bb_section_class( $class, $atts ) {
	if ( isset( $atts['allow_content_outside'] ) && $atts['allow_content_outside'] != '' ) {
		$class[] = 'bt_bb_section_allow_content_outside_' . $atts['allow_content_outside'];
	}
	return $class;
}
add_filter( 'bt_bb_section_class', 'cliniq_bt_bb_section_class', 10, 2 );


// ROW - SHAPE, BACKGROUND IMAGE
if ( function_exists( 'bt_bb_add_params' ) ) {
	bt_bb_add_params( 'bt_bb_row', array(
		array( 'param_name' => 'shape', 'type' => 'dropdown', 'group' => esc_html__( 'Shape', 'cliniq' ), 'heading' => esc_html__( 'Shape', 'cliniq' ), 'preview' => true,
			'value' => array(
				esc_html__( 'Square', 'cliniq' ) 					=> '',
				esc_html__( 'Soft Rounded', 'cliniq' ) 			=> 'soft-rounded',
				esc_html__( 'Hard Rounded', 'cliniq' ) 			=> 'hard-rounded'
			)
		),
		array( 'param_name' => 'background_image', 'type' => 'attach_image',  'preview' => true, 'heading' => esc_html__( 'Background image', 'cliniq' ), 'group' => esc_html__( 'General', 'cliniq' ) ),
		array( 'param_name' => 'negative_top_margin', 'type' => 'dropdown', 'heading' => esc_html__( 'Top negative margin', 'cliniq' ), 'description' => esc_html__( 'This option will move Row to the top (disabled on screens <992px)', 'cliniq' ),
		'value' => array(
				esc_html__( 'No margin', 'cliniq' ) 	=> '',
				esc_html__( 'Extra small', 'cliniq' ) 	=> 'extrasmall',
				esc_html__( 'Small', 'cliniq' ) 		=> 'small',
				esc_html__( 'Normal', 'cliniq' ) 		=> 'normal',
				esc_html__( 'Medium', 'cliniq' ) 		=> 'medium',
				esc_html__( 'Large', 'cliniq' ) 		=> 'large',
				esc_html__( 'Extra large', 'cliniq' ) 	=> 'extralarge',
				esc_html__( 'Huge', 'cliniq' ) 		=> 'huge',
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
		)
	));
}

function cliniq_bt_bb_row_class( $class, $atts ) {
	if ( isset( $atts['shape'] ) && $atts['shape'] != '' ) {
		$class[] = 'bt_bb_shape' . '_' . $atts['shape'];
	}
	if ( isset( $atts['background_image'] ) && $atts['background_image'] != '' ) {
		$class[] = 'bt_bb_row_with_bg_image';
	}
	if ( isset( $atts['negative_top_margin'] ) && $atts['negative_top_margin'] != '' ) {
		$class[] = 'bt_bb_negative_top_margin' . '_' . $atts['negative_top_margin'];
	}
	return $class;
}

function cliniq_bt_bb_row_style( $style_attr, $atts ) {
	if ( isset( $atts['background_image'] ) && $atts['background_image'] != '' ) {
		$background_image = wp_get_attachment_image_src( $atts['background_image'], 'full' );
		$background_image_url = $background_image[0];
		$background_image_style = 'background-image:url("' . $background_image_url . '");';
		$style_attr .= $background_image_style;
	}
	return $style_attr;
}

add_filter( 'bt_bb_row_class', 'cliniq_bt_bb_row_class', 10, 2 );
add_filter( 'bt_bb_row_style', 'cliniq_bt_bb_row_style', 10, 2 );



// INNER ROW - SHAPE, BACKGROUND IMAGE, MARGIN
if ( function_exists( 'bt_bb_add_params' ) ) {
	bt_bb_add_params( 'bt_bb_row_inner', array(
		array( 'param_name' => 'background_image', 'type' => 'attach_image',  'preview' => true, 'heading' => esc_html__( 'Background image', 'cliniq' ), 'group' => esc_html__( 'General', 'cliniq' ) ),
		array( 'param_name' => 'shape', 'type' => 'dropdown', 'heading' => esc_html__( 'Shape', 'cliniq' ), 'preview' => true,
			'value' => array(
				esc_html__( 'Square', 'cliniq' ) 				=> '',
				esc_html__( 'Soft Rounded', 'cliniq' ) 		=> 'soft-rounded',
				esc_html__( 'Hard Rounded', 'cliniq' ) 		=> 'hard-rounded'
			)
		),
		array( 'param_name' => 'move_left', 'type' => 'dropdown', 'heading' => esc_html__( 'Move to left', 'cliniq' ), 'preview' => true,
			'value' => array(
				esc_html__( 'No', 'cliniq' ) 					=> '',
				esc_html__( 'Yes', 'cliniq' ) 					=> 'move_left'
			)
		),
		array( 'param_name' => 'move_right', 'type' => 'dropdown', 'heading' => esc_html__( 'Move to right', 'cliniq' ), 'preview' => true,
			'value' => array(
				esc_html__( 'No', 'cliniq' ) 					=> '',
				esc_html__( 'Yes', 'cliniq' ) 					=> 'move_right'
			)
		),
		array( 'param_name' => 'negative_top_margin', 'type' => 'dropdown', 'heading' => esc_html__( 'Top negative margin', 'cliniq' ), 'description' => esc_html__( 'This option will move Row to the top (disabled on screens <992px)', 'cliniq' ),
			'value' => array(
				esc_html__( 'No margin', 'cliniq' ) 	=> '',
				esc_html__( 'Extra small', 'cliniq' ) 	=> 'extrasmall',
				esc_html__( 'Small', 'cliniq' ) 		=> 'small',
				esc_html__( 'Normal', 'cliniq' ) 		=> 'normal',
				esc_html__( 'Medium', 'cliniq' ) 		=> 'medium',
				esc_html__( 'Large', 'cliniq' ) 		=> 'large',
				esc_html__( 'Extra large', 'cliniq' ) 	=> 'extralarge',
				esc_html__( 'Huge', 'cliniq' ) 		=> 'huge',
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
	));
}

function cliniq_bt_bb_row_inner_class( $class, $atts ) {
	if ( isset( $atts['shape'] ) && $atts['shape'] != '' ) {
		$class[] = 'bt_bb_shape' . '_' . $atts['shape'];
	}
	if ( isset( $atts['move_left'] ) && $atts['move_left'] != '' ) {
		$class[] = 'bt_bb_move_left';
	}
	if ( isset( $atts['move_right'] ) && $atts['move_right'] != '' ) {
		$class[] = 'bt_bb_move_right';
	}
	if ( isset( $atts['background_image'] ) && $atts['background_image'] != '' ) {
		$class[] = 'bt_bb_row_with_bg_image';
	}
	if ( isset( $atts['negative_top_margin'] ) && $atts['negative_top_margin'] != '' ) {
		$class[] = 'bt_bb_negative_top_margin' . '_' . $atts['negative_top_margin'];
	}
	return $class;
}

function cliniq_bt_bb_row_inner_style_attr( $style_attr, $atts ) {
	if ( isset( $atts['background_image'] ) && $atts['background_image'] != '' ) {
		$background_image = wp_get_attachment_image_src( $atts['background_image'], 'full' );
		$background_image_url = $background_image[0];
		$background_image_style = 'background-image:url(\'' . $background_image_url . '\');';
		if ( $style_attr == '' ) {
			$style_attr = 'style="' . esc_attr( $background_image_style ) . '"';
		} else {
			$style_attr = $style_attr . '; ' . esc_attr( $background_image_style ) . '"';
		}
	}
	return $style_attr;
}

add_filter( 'bt_bb_row_inner_class', 'cliniq_bt_bb_row_inner_class', 10, 2 );
add_filter( 'bt_bb_row_inner_style_attr', 'cliniq_bt_bb_row_inner_style_attr', 10, 2 );


// COLUMN - PADDING, INNER COLOR SCHEME
if ( function_exists( 'bt_bb_remove_params' ) ) {
	bt_bb_remove_params( 'bt_bb_column', 'padding' );
}

if ( function_exists( 'bt_bb_add_params' ) ) {
	bt_bb_add_params( 'bt_bb_column', array(
		array( 'param_name' => 'padding', 'type' => 'dropdown', 'heading' => esc_html__( 'Inner padding', 'cliniq' ), 'preview' => true,
			'responsive_override' => true, 'value' => array(
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
		

		array( 'param_name' => 'shape', 'type' => 'dropdown', 'group' => esc_html__( 'Shape', 'cliniq' ), 'heading' => esc_html__( 'Shape', 'cliniq' ), 'preview' => true,
			'value' => array(
				esc_html__( 'Square', 'cliniq' ) 					=> '',
				esc_html__( 'Soft Rounded', 'cliniq' ) 			=> 'soft-rounded',
				esc_html__( 'Hard Rounded', 'cliniq' ) 			=> 'hard-rounded'
			)
		),
		array( 'param_name' => 'top_left_shape', 'type' => 'checkbox', 'value' => array( esc_html__( 'Yes', 'cliniq' ) => 'top_left_shape' ), 'group' => esc_html__( 'Shape', 'cliniq' ), 'heading' => esc_html__( 'Top Left', 'cliniq' )
		),
		array( 'param_name' => 'top_right_shape', 'type' => 'checkbox', 'group' => esc_html__( 'Shape', 'cliniq' ), 'value' => array( esc_html__( 'Yes', 'cliniq' ) => 'top_right_shape' ), 'heading' => esc_html__( 'Top Right', 'cliniq' )
		),
		array( 'param_name' => 'bottom_left_shape', 'type' => 'checkbox', 'group' => esc_html__( 'Shape', 'cliniq' ), 'value' => array( esc_html__( 'Yes', 'cliniq' ) => 'bottom_left_shape' ), 'heading' => esc_html__( 'Bottom Left', 'cliniq' )
		),
		array( 'param_name' => 'bottom_right_shape', 'type' => 'checkbox', 'group' => esc_html__( 'Shape', 'cliniq' ), 'value' => array( esc_html__( 'Yes', 'cliniq' ) => 'bottom_right_shape' ), 'heading' => esc_html__( 'Bottom Right', 'cliniq' )
		),
		array( 'param_name' => 'shape_position', 'type' => 'dropdown', 'heading' => esc_html__( 'Shape position', 'cliniq' ), 'group' => esc_html__( 'Shape', 'cliniq' ), 'description' => esc_html__( 'Show regular or inner shape', 'cliniq' ),
			'value' => array(
				esc_html__( 'Regular', 'cliniq' ) 					=> '',
				esc_html__( 'Inner', 'cliniq' ) 					=> 'inner'
			)
		),



		array( 'param_name' => 'border_style', 'type' => 'dropdown', 'heading' => esc_html__( 'Border style', 'cliniq' ), 'group' => esc_html__( 'Borders', 'cliniq' ),
			'value' => array(
				esc_html__( 'Dark color', 'cliniq' ) 				=> '',
				esc_html__( 'Light color', 'cliniq' ) 				=> 'light',
				esc_html__( 'Accent color', 'cliniq' ) 			=> 'accent',
				esc_html__( 'Alternate color', 'cliniq' ) 			=> 'alternate',
				esc_html__( 'Gray color', 'cliniq' ) 				=> 'gray'
			)
		),
		array( 'param_name' => 'top_border', 'type' => 'checkbox', 'value' => array( esc_html__( 'Yes', 'cliniq' ) => 'top_border' ), 'group' => esc_html__( 'Borders', 'cliniq' ), 'heading' => esc_html__( 'Top Border', 'cliniq' )
		),
		array( 'param_name' => 'bottom_border', 'type' => 'checkbox', 'group' => esc_html__( 'Borders', 'cliniq' ), 'value' => array( esc_html__( 'Yes', 'cliniq' ) => 'bottom_border' ), 'heading' => esc_html__( 'Bottom Border', 'cliniq' )
		),
		array( 'param_name' => 'left_border', 'type' => 'checkbox', 'group' => esc_html__( 'Borders', 'cliniq' ), 'value' => array( esc_html__( 'Yes', 'cliniq' ) => 'left_border' ), 'heading' => esc_html__( 'Left Border', 'cliniq' )
		),
		array( 'param_name' => 'right_border', 'type' => 'checkbox', 'group' => esc_html__( 'Borders', 'cliniq' ), 'value' => array( esc_html__( 'Yes', 'cliniq' ) => 'right_border' ), 'heading' => esc_html__( 'Right Border', 'cliniq' )
		),
		
		array( 'param_name' => 'border_position', 'type' => 'dropdown', 'heading' => esc_html__( 'Border position', 'cliniq' ), 'group' => esc_html__( 'Borders', 'cliniq' ), 'description' => esc_html__( 'Show regular or inner border', 'cliniq' ),
			'value' => array(
				esc_html__( 'Regular', 'cliniq' ) 					=> '',
				esc_html__( 'Inner', 'cliniq' ) 					=> 'inner'
			)
		),

		array( 'param_name' => 'blur', 'type' => 'dropdown', 'default' => '', 'group' => esc_html__( 'Design', 'cliniq' ), 'heading' => esc_html__( 'Background blur', 'cliniq' ),
			'value' => array(
				esc_html__( 'No', 'cliniq' ) 						=> '',
				esc_html__( 'Yes', 'cliniq' )						=> 'show'
		) ),
		array( 'param_name' => 'blur_position', 'type' => 'dropdown', 'heading' => esc_html__( 'Blur position', 'cliniq' ), 'group' => esc_html__( 'Design', 'cliniq' ), 'description' => esc_html__( 'Show regular or inner blur', 'cliniq' ),
			'value' => array(
				esc_html__( 'Regular', 'cliniq' ) 					=> '',
				esc_html__( 'Inner', 'cliniq' ) 					=> 'inner'
			)
		),
	));
}

function cliniq_bt_bb_column_class( $class, $atts ) {
	if ( isset( $atts['blur'] ) && $atts['blur'] != '' ) {
		$class[] = 'bt_bb_blur' . '_' . $atts['blur'];
	}
	if ( isset( $atts['blur_position'] ) && $atts['blur_position'] != '' ) {
		$class[] = 'bt_bb_blur_position' . '_' . $atts['blur_position'];
	}
	if ( isset( $atts['shape'] ) && $atts['shape'] != '' ) {
		$class[] = 'bt_bb_shape' . '_' . $atts['shape'];
	}
	if ( isset( $atts['top_left_shape'] ) && $atts['top_left_shape'] != '' ) {
		$class[] = 'bt_bb_top_left_shape';
	}
	if ( isset( $atts['top_right_shape'] ) && $atts['top_right_shape'] != '' ) {
		$class[] = 'bt_bb_top_right_shape';
	}
	if ( isset( $atts['bottom_left_shape'] ) && $atts['bottom_left_shape'] != '' ) {
		$class[] = 'bt_bb_bottom_left_shape';
	}
	if ( isset( $atts['bottom_right_shape'] ) && $atts['bottom_right_shape'] != '' ) {
		$class[] = 'bt_bb_bottom_right_shape';
	}
	if ( isset( $atts['shape_position'] ) && $atts['shape_position'] != '' ) {
		$class[] = 'bt_bb_shape_position' . '_' . $atts['shape_position'];
	}
	if ( isset( $atts['top_border'] ) && $atts['top_border'] != '' ) {
		$class[] = 'bt_bb_top_border';
	}
	if ( isset( $atts['bottom_border'] ) && $atts['bottom_border'] != '' ) {
		$class[] = 'bt_bb_bottom_border';
	}
	if ( isset( $atts['right_border'] ) && $atts['right_border'] != '' ) {
		$class[] = 'bt_bb_right_border';
	}
	if ( isset( $atts['left_border'] ) && $atts['left_border'] != '' ) {
		$class[] = 'bt_bb_left_border';
	}
	if ( isset( $atts['border_style'] ) && $atts['border_style'] != '' ) {
		$class[] = 'bt_bb_border_style' . '_' . $atts['border_style'];
	}
	if ( isset( $atts['border_position'] ) && $atts['border_position'] != '' ) {
		$class[] = 'bt_bb_border_position' . '_' . $atts['border_position'];
	}
	return $class;
}

add_filter( 'bt_bb_column_class', 'cliniq_bt_bb_column_class', 10, 2 );



// INNER COLUMN - PADDING, INNER COLOR SCHEME
if ( function_exists( 'bt_bb_remove_params' ) ) {
	bt_bb_remove_params( 'bt_bb_column_inner', 'padding' );
}

if ( function_exists( 'bt_bb_add_params' ) ) {
	bt_bb_add_params( 'bt_bb_column_inner', array(
		array( 'param_name' => 'padding', 'type' => 'dropdown', 'heading' => esc_html__( 'Inner padding', 'cliniq' ), 'preview' => true, 'responsive_override' => true, 
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
		



		array( 'param_name' => 'shape', 'type' => 'dropdown', 'group' => esc_html__( 'Shape', 'cliniq' ), 'heading' => esc_html__( 'Shape', 'cliniq' ), 'preview' => true,
			'value' => array(
				esc_html__( 'Square', 'cliniq' ) 					=> '',
				esc_html__( 'Soft Rounded', 'cliniq' ) 			=> 'soft-rounded',
				esc_html__( 'Hard Rounded', 'cliniq' ) 			=> 'hard-rounded'
			)
		),
		array( 'param_name' => 'top_left_shape', 'type' => 'checkbox', 'value' => array( esc_html__( 'Yes', 'cliniq' ) => 'top_left_shape' ), 'group' => esc_html__( 'Shape', 'cliniq' ), 'heading' => esc_html__( 'Top Left', 'cliniq' )
		),
		array( 'param_name' => 'top_right_shape', 'type' => 'checkbox', 'group' => esc_html__( 'Shape', 'cliniq' ), 'value' => array( esc_html__( 'Yes', 'cliniq' ) => 'top_right_shape' ), 'heading' => esc_html__( 'Top Right', 'cliniq' )
		),
		array( 'param_name' => 'bottom_left_shape', 'type' => 'checkbox', 'group' => esc_html__( 'Shape', 'cliniq' ), 'value' => array( esc_html__( 'Yes', 'cliniq' ) => 'bottom_left_shape' ), 'heading' => esc_html__( 'Bottom Left', 'cliniq' )
		),
		array( 'param_name' => 'bottom_right_shape', 'type' => 'checkbox', 'group' => esc_html__( 'Shape', 'cliniq' ), 'value' => array( esc_html__( 'Yes', 'cliniq' ) => 'bottom_right_shape' ), 'heading' => esc_html__( 'Bottom Right', 'cliniq' )
		),
		array( 'param_name' => 'shape_position', 'type' => 'dropdown', 'heading' => esc_html__( 'Shape position', 'cliniq' ), 'group' => esc_html__( 'Shape', 'cliniq' ), 'description' => esc_html__( 'Show regular or inner shape', 'cliniq' ),
			'value' => array(
				esc_html__( 'Regular', 'cliniq' ) 					=> '',
				esc_html__( 'Inner', 'cliniq' ) 					=> 'inner'
			)
		),




		array( 'param_name' => 'border_style', 'type' => 'dropdown', 'heading' => esc_html__( 'Border style', 'cliniq' ), 'group' => esc_html__( 'Borders', 'cliniq' ),
			'value' => array(
				esc_html__( 'Dark color', 'cliniq' ) 				=> '',
				esc_html__( 'Light color', 'cliniq' ) 				=> 'light',
				esc_html__( 'Accent color', 'cliniq' ) 			=> 'accent',
				esc_html__( 'Alternate color', 'cliniq' ) 			=> 'alternate',
				esc_html__( 'Gray color', 'cliniq' ) 				=> 'gray'
			)
		),
		array( 'param_name' => 'top_border', 'type' => 'checkbox', 'value' => array( esc_html__( 'Yes', 'cliniq' ) => 'top_border' ), 'group' => esc_html__( 'Borders', 'cliniq' ), 'heading' => esc_html__( 'Top Border', 'cliniq' )
		),
		array( 'param_name' => 'bottom_border', 'type' => 'checkbox', 'group' => esc_html__( 'Borders', 'cliniq' ), 'value' => array( esc_html__( 'Yes', 'cliniq' ) => 'bottom_border' ), 'heading' => esc_html__( 'Bottom Border', 'cliniq' )
		),
		array( 'param_name' => 'left_border', 'type' => 'checkbox', 'group' => esc_html__( 'Borders', 'cliniq' ), 'value' => array( esc_html__( 'Yes', 'cliniq' ) => 'left_border' ), 'heading' => esc_html__( 'Left Border', 'cliniq' )
		),
		array( 'param_name' => 'right_border', 'type' => 'checkbox', 'group' => esc_html__( 'Borders', 'cliniq' ), 'value' => array( esc_html__( 'Yes', 'cliniq' ) => 'right_border' ), 'heading' => esc_html__( 'Right Border', 'cliniq' )
		),
		
		array( 'param_name' => 'border_position', 'type' => 'dropdown', 'heading' => esc_html__( 'Border position', 'cliniq' ), 'group' => esc_html__( 'Borders', 'cliniq' ), 'description' => esc_html__( 'Show regular or inner border', 'cliniq' ),
			'value' => array(
				esc_html__( 'Regular', 'cliniq' ) 					=> '',
				esc_html__( 'Inner', 'cliniq' ) 					=> 'inner'
			)
		),


		array( 'param_name' => 'blur', 'type' => 'dropdown', 'default' => '', 'group' => esc_html__( 'Design', 'cliniq' ), 'heading' => esc_html__( 'Background blur', 'cliniq' ),
			'value' => array(
				esc_html__( 'No', 'cliniq' ) 						=> '',
				esc_html__( 'Yes', 'cliniq' )						=> 'show'
		) ),
		array( 'param_name' => 'blur_position', 'type' => 'dropdown', 'heading' => esc_html__( 'Blur position', 'cliniq' ), 'group' => esc_html__( 'Design', 'cliniq' ), 'description' => esc_html__( 'Show regular or inner blur', 'cliniq' ),
			'value' => array(
				esc_html__( 'Regular', 'cliniq' ) 					=> '',
				esc_html__( 'Inner', 'cliniq' ) 					=> 'inner'
			)
		),
	));
}

function cliniq_bt_bb_column_inner_class( $class, $atts ) {
	if ( isset( $atts['blur'] ) && $atts['blur'] != '' ) {
		$class[] = 'bt_bb_blur' . '_' . $atts['blur'];
	}
	if ( isset( $atts['blur_position'] ) && $atts['blur_position'] != '' ) {
		$class[] = 'bt_bb_blur_position' . '_' . $atts['blur_position'];
	}
	if ( isset( $atts['shape'] ) && $atts['shape'] != '' ) {
		$class[] = 'bt_bb_shape' . '_' . $atts['shape'];
	}
	if ( isset( $atts['top_left_shape'] ) && $atts['top_left_shape'] != '' ) {
		$class[] = 'bt_bb_top_left_shape';
	}
	if ( isset( $atts['top_right_shape'] ) && $atts['top_right_shape'] != '' ) {
		$class[] = 'bt_bb_top_right_shape';
	}
	if ( isset( $atts['bottom_left_shape'] ) && $atts['bottom_left_shape'] != '' ) {
		$class[] = 'bt_bb_bottom_left_shape';
	}
	if ( isset( $atts['bottom_right_shape'] ) && $atts['bottom_right_shape'] != '' ) {
		$class[] = 'bt_bb_bottom_right_shape';
	}
	if ( isset( $atts['shape_position'] ) && $atts['shape_position'] != '' ) {
		$class[] = 'bt_bb_shape_position' . '_' . $atts['shape_position'];
	}
	if ( isset( $atts['top_border'] ) && $atts['top_border'] != '' ) {
		$class[] = 'bt_bb_top_border';
	}
	if ( isset( $atts['bottom_border'] ) && $atts['bottom_border'] != '' ) {
		$class[] = 'bt_bb_bottom_border';
	}
	if ( isset( $atts['right_border'] ) && $atts['right_border'] != '' ) {
		$class[] = 'bt_bb_right_border';
	}
	if ( isset( $atts['left_border'] ) && $atts['left_border'] != '' ) {
		$class[] = 'bt_bb_left_border';
	}
	if ( isset( $atts['border_style'] ) && $atts['border_style'] != '' ) {
		$class[] = 'bt_bb_border_style' . '_' . $atts['border_style'];
	}
	if ( isset( $atts['border_position'] ) && $atts['border_position'] != '' ) {
		$class[] = 'bt_bb_border_position' . '_' . $atts['border_position'];
	}
	return $class;
}
add_filter( 'bt_bb_column_inner_class', 'cliniq_bt_bb_column_inner_class', 10, 2 );


// HEADLINE - SUPEHEADLINE & SUBHEADLINE FONT WEIGHT
if ( function_exists( 'bt_bb_remove_params' ) ) {
	bt_bb_remove_params( 'bt_bb_headline', 'font_weight' );
}

if ( function_exists( 'bt_bb_remove_params' ) ) {
	bt_bb_remove_params( 'bt_bb_headline', 'superheadline_font_weight' );
}

if ( function_exists( 'bt_bb_remove_params' ) ) {
	bt_bb_remove_params( 'bt_bb_headline', 'subheadline_font_weight' );
}

if ( function_exists( 'bt_bb_remove_params' ) ) {
	bt_bb_remove_params( 'bt_bb_headline', 'size' );
}

if ( function_exists( 'bt_bb_add_params' ) ) {
	bt_bb_add_params( 'bt_bb_headline', array(
		array( 'param_name' => 'size', 'type' => 'dropdown', 'preview' => true, 'heading' => esc_html__( 'Size', 'cliniq' ), 'description' => esc_html__( 'Predefined heading sizes, independent of html tag', 'cliniq' ), 'responsive_override' => true,
			'value' => array(
				esc_html__( 'Inherit', 'cliniq' ) 		=> 'inherit',
				esc_html__( 'Extra Small', 'cliniq' ) 	=> 'extrasmall',
				esc_html__( 'Small', 'cliniq' ) 		=> 'small',
				esc_html__( 'Medium', 'cliniq' ) 		=> 'medium',
				esc_html__( 'Normal', 'cliniq' ) 		=> 'normal',
				esc_html__( 'Large', 'cliniq' ) 		=> 'large',
				esc_html__( 'Extra large', 'cliniq' ) 	=> 'extralarge',
				esc_html__( 'Huge', 'cliniq' ) 		=> 'huge'
			)
		),
		array( 'param_name' => 'font_weight', 'type' => 'dropdown', 'heading' => esc_html__( 'Font weight', 'cliniq' ), 'group' => esc_html__( 'Font', 'cliniq' ),
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
		array( 'param_name' => 'heading_style', 'type' => 'dropdown', 'heading' => esc_html__( 'Heading font style', 'cliniq' ), 'group' => esc_html__( 'Design', 'cliniq' ),
			'value' => array(
				esc_html__( 'Default', 'cliniq' ) 				=> '',
				esc_html__( 'Regular', 'cliniq' ) 				=> 'regular',
				esc_html__( 'Italic', 'cliniq' ) 				=> 'italic'
			)
		),
		array( 'param_name' => 'supertitle_font_weight', 'type' => 'dropdown', 'heading' => esc_html__( 'Supertitle font weight', 'cliniq' ), 'group' => esc_html__( 'Font', 'cliniq' ),
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
		array( 'param_name' => 'supertitle_color_scheme', 'type' => 'dropdown', 'group' => esc_html__( 'Design', 'cliniq' ), 'heading' => esc_html__( 'Supertitle color scheme', 'cliniq' ), 'value' => $color_scheme_arr ),
		array( 'param_name' => 'subtitle_font_weight', 'type' => 'dropdown', 'heading' => esc_html__( 'Subtitle font weight', 'cliniq' ), 'group' => esc_html__( 'Font', 'cliniq' ),
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
		array( 'param_name' => 'subtitle_style', 'type' => 'dropdown', 'heading' => esc_html__( 'Subtitle font style', 'cliniq' ), 'group' => esc_html__( 'Design', 'cliniq' ),
			'value' => array(
				esc_html__( 'Default', 'cliniq' ) 				=> '',
				esc_html__( 'Regular', 'cliniq' ) 				=> 'regular',
				esc_html__( 'Italic', 'cliniq' ) 				=> 'italic'
			)
		),
	));
}

function cliniq_bt_bb_headline_class( $class, $atts ) {
	if ( isset( $atts['supertitle_font_weight'] ) && $atts['supertitle_font_weight'] != '' ) {
		$class[] = 'bt_bb_supertitle_font_weight' . '_' . $atts['supertitle_font_weight'];
	}
	if ( isset( $atts['subtitle_font_weight'] ) && $atts['subtitle_font_weight'] != '' ) {
		$class[] = 'bt_bb_subtitle_font_weight' . '_' . $atts['subtitle_font_weight'];
	}
	if ( $atts['headline'] == '' ) {
		$class[] = 'btNoHeadline';
	}
	if ( isset( $atts['supertitle_color_scheme'] ) && $atts['supertitle_color_scheme'] != '' ) {
		$class[] = 'bt_bb_supertitle_color_scheme' . '_' . bt_bb_get_color_scheme_id( $atts['supertitle_color_scheme'] );
	}
	if ( isset( $atts['subtitle_style'] ) && $atts['subtitle_style'] != '' ) {
		$class[] = 'bt_bb_subtitle_style' . '_' . $atts['subtitle_style'];
	}
	if ( isset( $atts['heading_style'] ) && $atts['heading_style'] != '' ) {
		$class[] = 'bt_bb_heading_style' . '_' . $atts['heading_style'];
	}
	return $class;
}

function cliniq_bt_bb_headline_style( $style, $atts ) {
	if ( isset( $atts['supertitle_color_scheme'] ) && $atts['supertitle_color_scheme'] != '' ) {
	
		$supertitle_color_scheme_id = NULL;
		if ( is_numeric ( $atts['supertitle_color_scheme'] ) ) {
			$supertitle_color_scheme_id = $atts['supertitle_color_scheme'];
		} else if ( $atts['supertitle_color_scheme'] != '' ) {
			$supertitle_color_scheme_id = bt_bb_get_color_scheme_id( $atts['supertitle_color_scheme'] );
		}
		$supertitle_color_scheme_colors = bt_bb_get_color_scheme_colors_by_id( $supertitle_color_scheme_id - 1 );
		if ( $supertitle_color_scheme_colors ) $style .= '; --supertitle-primary-color:' . $supertitle_color_scheme_colors[0] . '; --supertitle-secondary-color:' . $supertitle_color_scheme_colors[1] . ';';
	}
	return $style;
}

add_filter( 'bt_bb_headline_class', 'cliniq_bt_bb_headline_class', 10, 2 );
add_filter( 'bt_bb_headline_style', 'cliniq_bt_bb_headline_style', 10, 2 );


// BUTTON - WEIGHT, SIZE, STYLE
if ( function_exists( 'bt_bb_remove_params' ) ) {
	bt_bb_remove_params( 'bt_bb_button', 'url' );
}
if ( function_exists( 'bt_bb_remove_params' ) ) {
	bt_bb_remove_params( 'bt_bb_button', 'target' );
}
if ( function_exists( 'bt_bb_remove_params' ) ) {
	bt_bb_remove_params( 'bt_bb_button', 'style' );
}
if ( function_exists( 'bt_bb_remove_params' ) ) {
	bt_bb_remove_params( 'bt_bb_button', 'font_weight' );
}
if ( function_exists( 'bt_bb_remove_params' ) ) {
	bt_bb_remove_params( 'bt_bb_button', 'color_scheme' );
}

if ( function_exists( 'bt_bb_add_params' ) ) {
	bt_bb_add_params( 'bt_bb_button', array(
		array( 'param_name' => 'style', 'type' => 'dropdown', 'heading' => esc_html__( 'Style', 'cliniq' ), 'preview' => true, 'group' => esc_html__( 'Design', 'cliniq' ),
			'value' => array(
				esc_html__( 'Outline', 'cliniq' ) 				=> 'outline',
				esc_html__( 'Special Outline', 'cliniq' ) 		=> 'special_outline',
				esc_html__( 'Filled', 'cliniq' )	 			=> 'filled',
				esc_html__( 'Clean', 'cliniq' )	 			=> 'clean'	
			)
		),
		array( 'param_name' => 'color_scheme', 'type' => 'dropdown', 'heading' => esc_html__( 'Color scheme', 'cliniq' ), 'description' => esc_html__( 'Define color schemes in Bold Builder settings or define accent and alternate colors in theme customizer (if avaliable)', 'cliniq' ), 'value' => $color_scheme_arr, 'preview' => true, 'group' => esc_html__( 'Design', 'cliniq' ) ),
		array( 'param_name' => 'icon_color_scheme', 'type' => 'dropdown', 'group' => esc_html__( 'Design', 'cliniq' ), 'heading' => esc_html__( 'Icon color scheme', 'cliniq' ), 'value' => $color_scheme_arr ),
		array( 'param_name' => 'weight', 'type' => 'dropdown', 'heading' => esc_html__( 'Font weight', 'cliniq' ), 'weight' => 9, 'group' => esc_html__( 'Design', 'cliniq' ),
			'value' => array(
				esc_html__( 'Default', 'cliniq' ) 		=> '',
				esc_html__( 'Thin', 'cliniq' ) 		=> 'thin',
				esc_html__( 'Lighter', 'cliniq' ) 		=> 'lighter',
				esc_html__( 'Light', 'cliniq' ) 		=> 'light',
				esc_html__( 'Normal', 'cliniq' ) 		=> 'normal',
				esc_html__( 'Medium', 'cliniq' ) 		=> 'medium',
				esc_html__( 'Semi bold', 'cliniq' ) 	=> 'semi-bold',
				esc_html__( 'Bold', 'cliniq' ) 		=> 'bold',
				esc_html__( 'Bolder', 'cliniq' ) 		=> 'bolder',
				esc_html__( 'Black', 'cliniq' ) 		=> 'black'
			)
		),
		array( 'param_name' => 'url', 'type' => 'link', 'heading' => esc_html__( 'URL', 'cliniq' ), 'description' => esc_html__( 'Enter full or local URL (e.g. https://www.bold-themes.com or /pages/about-us) or post slug (e.g. about-us) or search for existing content.', 'cliniq' ), 'group' => esc_html__( 'URL', 'cliniq' ), 'preview' => true ),
		array( 'param_name' => 'target', 'type' => 'dropdown', 'group' => esc_html__( 'URL', 'cliniq' ), 'heading' => esc_html__( 'Target', 'cliniq' ),
			'value' => array(
				esc_html__( 'Self (open in same tab)', 'cliniq' ) => '_self',
				esc_html__( 'Blank (open in new tab)', 'cliniq' ) => '_blank',
			)
		),
	));
}

function cliniq_bt_bb_button_class( $class, $atts ) {
	if ( isset( $atts['weight'] ) && $atts['weight'] != '' ) {
		$class[] = 'bt_bb_font_weight' . '_' . $atts['weight'];
	}
	if ( $atts['icon'] != '' ) {
		$class[] = 'btWithIcon';
	}
	if ( $atts['icon'] == 'arrow_e900' ) {
		$class[] = 'btWithArrow';
	}
	if ( isset( $atts['icon_color_scheme'] ) && $atts['icon_color_scheme'] != '' ) {
		$class[] = 'bt_bb_icon_color_scheme' . '_' . bt_bb_get_color_scheme_id( $atts['icon_color_scheme'] );
	}
	return $class;
}

function cliniq_bt_bb_button_style( $style, $atts ) {
	if ( isset( $atts['icon_color_scheme'] ) && $atts['icon_color_scheme'] != '' ) {
	
		$icon_color_scheme_id = NULL;
		if ( is_numeric ( $atts['icon_color_scheme'] ) ) {
			$icon_color_scheme_id = $atts['icon_color_scheme'];
		} else if ( $atts['icon_color_scheme'] != '' ) {
			$icon_color_scheme_id = bt_bb_get_color_scheme_id( $atts['icon_color_scheme'] );
		}
		$icon_color_scheme_colors = bt_bb_get_color_scheme_colors_by_id( $icon_color_scheme_id - 1 );
		if ( $icon_color_scheme_colors ) $style .= '; --icon-primary-color:' . $icon_color_scheme_colors[0] . '; --icon-secondary-color:' . $icon_color_scheme_colors[1] . ';';
	}

	return $style;
}

add_filter( 'bt_bb_button_class', 'cliniq_bt_bb_button_class', 10, 2 );
add_filter( 'bt_bb_button_style', 'cliniq_bt_bb_button_style', 10, 2 );



// ICON - SIZE
if ( function_exists( 'bt_bb_remove_params' ) ) {
	bt_bb_remove_params( 'bt_bb_icon', 'size' );
}

if ( function_exists( 'bt_bb_add_params' ) ) {
	bt_bb_add_params( 'bt_bb_icon', array(
		array( 'param_name' => 'size', 'type' => 'dropdown', 'heading' => esc_html__( 'Size', 'cliniq' ), 'preview' => true, 'weight' => 1, 'group' => esc_html__( 'Design', 'cliniq' ), 'responsive_override' => true,
			'value' => array(
				esc_html__( 'Tiny', 'cliniq' ) 			=> 'tiny',
				esc_html__( 'Extra small', 'cliniq' ) 		=> 'xsmall',
				esc_html__( 'Small', 'cliniq' ) 			=> 'small',
				esc_html__( 'Normal', 'cliniq' ) 			=> 'normal',
				esc_html__( 'Large', 'cliniq' ) 			=> 'large',
				esc_html__( 'Extra large', 'cliniq' ) 		=> 'xlarge',
				esc_html__( 'Huge', 'cliniq' ) 			=> 'huge'
			)
		),
		array( 'param_name' => 'text_size', 'type' => 'dropdown', 'heading' => esc_html__( 'Text size', 'cliniq' ), 'group' => esc_html__( 'Design', 'cliniq' ),
			'value' => array(
				esc_html__( 'Inherit', 'cliniq' ) 			=> '',
				esc_html__( 'Extra Small', 'cliniq' ) 		=> 'xsmall',
				esc_html__( 'Small', 'cliniq' ) 			=> 'small',
				esc_html__( 'Normal', 'cliniq' ) 			=> 'normal',
				esc_html__( 'Large', 'cliniq' ) 			=> 'large'
			)
		),
		array( 'param_name' => 'text_color_scheme', 'type' => 'dropdown', 'group' => esc_html__( 'Design', 'cliniq' ), 'heading' => esc_html__( 'Text color scheme', 'cliniq' ), 'value' => $color_scheme_arr ),
	));
}

function cliniq_bt_bb_icon_class( $class, $atts ) {
	if ( isset( $atts['text_color_scheme'] ) && $atts['text_color_scheme'] != '' ) {
		$class[] = 'bt_bb_text_color_scheme' . '_' . bt_bb_get_color_scheme_id( $atts['text_color_scheme'] );
	}
	if ( isset( $atts['text_size'] ) && $atts['text_size'] != '' ) {
		$class[] = 'bt_bb_text_size' . '_' . $atts['text_size'];
	}
	return $class;
}

function cliniq_bt_bb_icon_style( $style, $atts ) {
	if ( isset( $atts['text_color_scheme'] ) && $atts['text_color_scheme'] != '' ) {
	
		$text_color_scheme_id = NULL;
		if ( is_numeric ( $atts['text_color_scheme'] ) ) {
			$text_color_scheme_id = $atts['text_color_scheme'];
		} else if ( $atts['text_color_scheme'] != '' ) {
			$text_color_scheme_id = bt_bb_get_color_scheme_id( $atts['text_color_scheme'] );
		}
		$text_color_scheme_colors = bt_bb_get_color_scheme_colors_by_id( $text_color_scheme_id - 1 );
		if ( $text_color_scheme_colors ) $style .= '; --text-primary-color:' . $text_color_scheme_colors[0] . '; --text-secondary-color:' . $text_color_scheme_colors[1] . ';';
	}
	return $style;
}

add_filter( 'bt_bb_icon_class', 'cliniq_bt_bb_icon_class', 10, 2 );
add_filter( 'bt_bb_icon_style', 'cliniq_bt_bb_icon_style', 10, 2 );


// CUSTOM MENU - WEIGHT, FONT SIZE, STYLE
if ( function_exists( 'bt_bb_remove_params' ) ) {
	bt_bb_remove_params( 'bt_bb_custom_menu', 'font_weight' );
}

if ( function_exists( 'bt_bb_add_params' ) ) {
	bt_bb_add_params( 'bt_bb_custom_menu', array(
		array( 'param_name' => 'weight', 'type' => 'dropdown', 'heading' => esc_html__( 'Font weight', 'cliniq' ),
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
		array( 'param_name' => 'font_size', 'type' => 'dropdown', 'heading' => esc_html__( 'Font size', 'cliniq' ),
			'value' => array(
				esc_html__( 'Default', 'cliniq' ) 				=> '',
				esc_html__( '12px', 'cliniq' ) 				=> '12',
				esc_html__( '13px', 'cliniq' ) 				=> '13',
				esc_html__( '14px', 'cliniq' ) 				=> '14',
				esc_html__( '15px', 'cliniq' ) 				=> '15',
				esc_html__( '16px', 'cliniq' ) 				=> '16',
				esc_html__( '17px', 'cliniq' ) 				=> '17'
			)
		),
		array( 'param_name' => 'style', 'type' => 'dropdown', 'heading' => esc_html__( 'Style', 'cliniq' ),
			'value' => array(
				esc_html__( 'Inherit', 'cliniq' ) 			=> '',
				esc_html__( 'Opacity 60%', 'cliniq' ) 		=> 'opacity'
			)
		),
		array( 'param_name' => 'text_decoration', 'type' => 'dropdown', 'heading' => esc_html__( 'Links decoration', 'cliniq' ),
			'value' => array(
				esc_html__( 'None', 'cliniq' ) 				=> '',
				esc_html__( 'Underline', 'cliniq' ) 			=> 'underline'
			)
		),
	));
}

function cliniq_bt_bb_custom_menu_class( $class, $atts ) {
	if ( isset( $atts['weight'] ) && $atts['weight'] != '' ) {
		$class[] = 'bt_bb_font_weight' . '_' . $atts['weight'];
	}
	if ( isset( $atts['font_size'] ) && $atts['font_size'] != '' ) {
		$class[] = 'bt_bb_font_size' . '_' . $atts['font_size'];
	}
	if ( isset( $atts['style'] ) && $atts['style'] != '' ) {
		$class[] = 'bt_bb_style' . '_' . $atts['style'];
	}
	if ( isset( $atts['text_decoration'] ) && $atts['text_decoration'] != '' ) {
		$class[] = 'bt_bb_text_decoration' . '_' . $atts['text_decoration'];
	}
	return $class;
}

add_filter( 'bt_bb_custom_menu_class', 'cliniq_bt_bb_custom_menu_class', 10, 2 );



// SLIDER ITEM - BACKGROUND COLOR
if ( function_exists( 'bt_bb_add_params' ) ) {
	bt_bb_add_params( 'bt_bb_content_slider_item', array(
		array( 'param_name' => 'background_color', 'type' => 'dropdown', 'heading' => esc_html__( 'Background color', 'cliniq' ),
			'value' => array(
				esc_html__( 'None', 'cliniq' ) 						=> '',
				esc_html__( 'Light background color', 'cliniq' ) 		=> 'light',
				esc_html__( 'Dark background color', 'cliniq' ) 		=> 'dark',
				esc_html__( 'Accent background color', 'cliniq' ) 		=> 'accent',
				esc_html__( 'Alternate background color', 'cliniq' ) 	=> 'alternate',
				esc_html__( 'Gray background color', 'cliniq' ) 		=> 'gray'
			)
		),
	));
}

function cliniq_bt_bb_content_slider_item_class( $class, $atts ) {
	if ( isset( $atts['background_color'] ) && $atts['background_color'] != '' ) {
		$class[] = 'bt_bb_background_color' . '_' . $atts['background_color'];
	}
	return $class;
}

add_filter( 'bt_bb_content_slider_item_class', 'cliniq_bt_bb_content_slider_item_class', 10, 2 );


// TEXT - FONT SIZE
if ( function_exists( 'bt_bb_add_params' ) ) {
	bt_bb_add_params( 'bt_bb_text', array(
		array( 'param_name' => 'font_size', 'type' => 'dropdown', 'preview' => true, 'heading' => esc_html__( 'Font size', 'cliniq' ),
			'value' => array(
				esc_html__( 'Default', 'cliniq' ) 				=> '',
				esc_html__( '12px', 'cliniq' ) 				=> '12',
				esc_html__( '13px', 'cliniq' ) 				=> '13',
				esc_html__( '14px', 'cliniq' ) 				=> '14',
				esc_html__( '15px', 'cliniq' ) 				=> '15',
				esc_html__( '16px', 'cliniq' ) 				=> '16',
				esc_html__( '17px', 'cliniq' ) 				=> '17'
			)
		),
	));
}

function cliniq_bt_bb_text_class( $class, $atts ) {
	if ( isset( $atts['font_size'] ) && $atts['font_size'] != '' ) {
		$class[] = 'bt_bb_font_size' . '_' . $atts['font_size'];
	}
	return $class;
}

add_filter( 'bt_bb_text_class', 'cliniq_bt_bb_text_class', 10, 2 );


// ACCORDION - STYLE
if ( function_exists( 'bt_bb_remove_params' ) ) {
	bt_bb_remove_params( 'bt_bb_accordion', 'style' );
}
if ( function_exists( 'bt_bb_remove_params' ) ) {
	bt_bb_remove_params( 'bt_bb_accordion', 'shape' );
}

function cliniq_bt_bb_accordion_class( $class, $atts ) {
	$class[] = 'bt_bb_style_simple';
	
	return $class;
}

add_filter( 'bt_bb_accordion_class', 'cliniq_bt_bb_accordion_class', 10, 2 );


// CONTACT FORM 7
if ( function_exists( 'bt_bb_add_params' ) ) {
	bt_bb_add_params( 'bt_bb_contact_form_7', array(
		array( 'param_name' => 'input_fields_style', 'type' => 'dropdown', 'heading' => esc_html__( 'Input fields style', 'cliniq' ), 
			'value' => array(
				esc_html__( 'Gray Outline', 'cliniq' ) 						=> 'gray_filled',
				esc_html__( 'Light Color Filled', 'cliniq' ) 						=> 'light_filled'
			)
		),
		array( 'param_name' => 'button_width', 'type' => 'dropdown', 'heading' => esc_html__( 'Button width', 'cliniq' ), 
			'value' => array(
				esc_html__( 'Inline', 'cliniq' ) 		=> '',
				esc_html__( 'Full', 'cliniq' ) 		=> 'full'
			)
		),
	));
}

function cliniq_bt_bb_contact_form_7_class( $class, $atts ) {
	if ( isset( $atts['input_fields_style'] ) && $atts['input_fields_style'] != '' ) {
		$class[] = 'bt_bb_input_fields_style' . '_' . $atts['input_fields_style'];
	}
	if ( isset( $atts['input_fields_colors'] ) && $atts['input_fields_colors'] != '' ) {
		$class[] = 'bt_bb_input_fields_colors' . '_' . $atts['input_fields_colors'];
	}
	if ( isset( $atts['button_width'] ) && $atts['button_width'] != '' ) {
		$class[] = 'bt_bb_button_width' . '_' . $atts['button_width'];
	}
	return $class;
}

add_filter( 'bt_bb_contact_form_7_class', 'cliniq_bt_bb_contact_form_7_class', 10, 2 );


// TABS
if ( function_exists( 'bt_bb_remove_params' ) ) {
	bt_bb_remove_params( 'bt_bb_tabs', 'style' );
}
if ( function_exists( 'bt_bb_remove_params' ) ) {
	bt_bb_remove_params( 'bt_bb_tabs', 'shape' );
}

function cliniq_bt_bb_tabs_class( $class, $atts ) {
	$class[] = 'bt_bb_style_filled';
	return $class;
}

add_filter( 'bt_bb_tabs_class', 'cliniq_bt_bb_tabs_class', 10, 2 );



// IMAGE
if ( function_exists( 'bt_bb_remove_params' ) ) {
	bt_bb_remove_params( 'bt_bb_image', 'shape' );
}

if ( function_exists( 'bt_bb_add_params' ) ) {
	bt_bb_add_params( 'bt_bb_image', array(
		array( 'param_name' => 'shape', 'type' => 'dropdown', 'heading' => esc_html__( 'Shape', 'cliniq' ),
			'value' => array(
				esc_html__( 'Square', 'cliniq' ) 			=> 'square',
				esc_html__( 'Soft Rounded', 'cliniq' ) 	=> 'soft-rounded',
				esc_html__( 'Hard Rounded', 'cliniq' ) 	=> 'hard-rounded',
				esc_html__( 'Circle', 'cliniq' ) 			=> 'circle'
			)
		),
	));
}


// MASONRY POST GRID
if ( function_exists( 'bt_bb_add_params' ) ) {
	bt_bb_add_params( 'bt_bb_masonry_post_grid', array(
		array( 'param_name' => 'image_style', 'type' => 'dropdown', 'heading' => esc_html__( 'Image style', 'cliniq' ), 
			'value' => array(
				esc_html__( 'Simple', 'cliniq' ) 				=> '',
				esc_html__( 'Sharp Rectangle', 'cliniq' ) 		=> 'rectangle'
			)
		),
	));
}

function cliniq_bt_bb_masonry_post_grid_class( $class, $atts ) {
	if ( isset( $atts['image_style'] ) && $atts['image_style'] != '' ) {
		$class[] = 'bt_bb_image_style' . '_' . $atts['image_style'];
	}
	return $class;
}

add_filter( 'bt_bb_masonry_post_grid_class', 'cliniq_bt_bb_masonry_post_grid_class', 10, 2 );




/* FRONT END 
---------------------------------------------------------- */

/* OLD ELEMENTS */
function bt_bb_fe_new_params( $elements_array) {

	$elements_array[ 'bt_bb_custom_menu' ][ 'params' ][ 'font_size' ] = array( 'ajax_filter' => array( 'class' ) );

	$elements_array[ 'bt_bb_separator' ][ 'params' ][ 'border_color' ] = array( 'ajax_filter' => array( 'class' ) );

	$elements_array[ 'bt_bb_headline' ][ 'params' ][ 'heading_style' ] = array( 'ajax_filter' => array( 'class' ) );
	$elements_array[ 'bt_bb_headline' ][ 'params' ][ 'supertitle_font_weight' ] = array( 'ajax_filter' => array( 'class' ) );
	$elements_array[ 'bt_bb_headline' ][ 'params' ][ 'supertitle_color_scheme' ] = array( 'ajax_filter' => array( 'class', 'style' ) );
	$elements_array[ 'bt_bb_headline' ][ 'params' ][ 'subtitle_font_weight' ] = array( 'ajax_filter' => array( 'class' ) );
	$elements_array[ 'bt_bb_headline' ][ 'params' ][ 'subtitle_style' ] = array( 'ajax_filter' => array( 'class' ) );

	$elements_array[ 'bt_bb_icon' ][ 'params' ][ 'text_size' ] = array( 'ajax_filter' => array( 'class' ) );
	$elements_array[ 'bt_bb_icon' ][ 'params' ][ 'text_color_scheme' ] = array( 'ajax_filter' => array( 'class', 'style' ) );

	$elements_array[ 'bt_bb_button' ][ 'params' ][ 'weight' ] = array( 'ajax_filter' => array( 'class' ) );
	$elements_array[ 'bt_bb_button' ][ 'params' ][ 'icon_color_scheme' ] = array( 'ajax_filter' => array( 'class', 'style' ) );

	$elements_array[ 'bt_bb_custom_menu' ][ 'params' ][ 'weight' ] = array( 'ajax_filter' => array( 'class' ) );
	$elements_array[ 'bt_bb_custom_menu' ][ 'params' ][ 'font_size' ] = array( 'ajax_filter' => array( 'class' ) );
	$elements_array[ 'bt_bb_custom_menu' ][ 'params' ][ 'style' ] = array( 'ajax_filter' => array( 'class' ) );
	$elements_array[ 'bt_bb_custom_menu' ][ 'params' ][ 'text_decoration' ] = array( 'ajax_filter' => array( 'class' ) );

	$elements_array[ 'bt_bb_service' ][ 'params' ][ 'supertitle' ] = array( 'js_handler' => array( 'target_selector' => '.bt_bb_service_content .bt_bb_service_content_supertitle', 'type' => 'inner_html' ) );
	$elements_array[ 'bt_bb_service' ][ 'params' ][ 'align_content' ] = array( 'ajax_filter' => array( 'class' ) );
	$elements_array[ 'bt_bb_service' ][ 'params' ][ 'title_color_scheme' ] = array( 'ajax_filter' => array( 'class', 'style' ) );

	return $elements_array;
}
add_filter( 'bt_bb_fe_elements', 'bt_bb_fe_new_params' );


/* NEW ELEMENTS */
function cliniq_bt_bb_fe( $elements ) {

	$elements[ 'bt_bb_contact_form_7' ] = array(
		'edit_box_selector' => '',
		'params' => array(
			'input_fields_style'				=> array( 'ajax_filter' => array( 'class' ) ),
			'button_width'				=> array( 'ajax_filter' => array( 'class' ) ),
		),
	);

	$elements[ 'bt_bb_call_to_action' ] = array(
		'edit_box_selector' => '',
		'params' => array(
			'title'					=> array( 'js_handler' => array( 'target_selector' => '.bt_bb_call_to_action_title .bt_bb_headline_content span', 'type' => 'inner_html' ) ),
			'icon'         			=> array(),	
			'details_title'        	=> array( 'js_handler' => array( 'target_selector' => '.bt_bb_service_content_title', 'type' => 'inner_html' ) ),
			'details_supertitle'   	=> array( 'js_handler' => array( 'target_selector' => '.bt_bb_service_content_supertitle', 'type' => 'inner_html' ) ),	
			'style'        			=> array( 'js_handler' => array( 'target_selector' => '', 'type' => 'class' ) ),
			'url'					=> array( 'js_handler' => array( 'target_selector' => 'a', 'type' => 'attr', 'attr' => 'href' ) ),
			'target' 				=> array( 'js_handler' => array( 'target_selector' => 'a', 'type' => 'attr', 'attr' => 'target' ) ),
			'background_image'      => array( 'js_handler' => array( 'target_selector' => '', 'type' => 'background_image' ) ),						
		),
	);

	$elements[ 'bt_bb_card' ] = array(
		'edit_box_selector' => '',
		'params' => array(
			'image'							=> array( 'js_handler' => array( 'target_selector' => '', 'type' => 'background_image' ) ),
			//'image_size'   					=> array(),
			//'height'   						=> array(),		
			'url'							=> array( 'js_handler' => array( 'target_selector' => 'a', 'type' => 'attr', 'attr' => 'href' ) ),
			'target' 						=> array( 'js_handler' => array( 'target_selector' => 'a', 'type' => 'attr', 'attr' => 'target' ) ),
			'image_style'					=> array( 'js_handler' => array( 'target_selector' => '', 'type' => 'class' ) ),
			'border'      					=> array( 'js_handler' => array( 'target_selector' => '', 'type' => 'class' ) ),
			'blur'      					=> array( 'js_handler' => array( 'target_selector' => '', 'type' => 'class' ) ),			
			'shadow'      					=> array( 'js_handler' => array( 'target_selector' => '', 'type' => 'class' ) ),
			'shape'							=> array( 'js_handler' => array( 'target_selector' => '', 'type' => 'class' ) ),
		),
	);
	
	$elements[ 'bt_bb_dropdown' ] = array(
		'edit_box_selector' => '',
		'params' => array(
			'title'			=> array( 'js_handler' => array( 'target_selector' => '.bt_bb_call_to_action_title .bt_bb_headline_content span', 'type' => 'inner_html' ) ),
		),
	);
	$elements[ 'bt_bb_dropdown_inner' ] = array(
		'edit_box_selector' => '',
		'params' => array(
			'image'      			=> array( 'js_handler' => array( 'target_selector' => '', 'type' => 'background_image' ) ),
			'title'       	 		=> array(),
			'url_text'				=> array(),
			'url'					=> array( 'js_handler' => array( 'target_selector' => 'a', 'type' => 'attr', 'attr' => 'href' ) ),
			'target' 				=> array( 'js_handler' => array( 'target_selector' => 'a', 'type' => 'attr', 'attr' => 'target' ) ),
		),
	);
	
	$elements[ 'bt_bb_floating_image' ] = array(
		'edit_box_selector' => '',
		'params' => array(
			'image'      			=> array(),
		),
	);

	$elements[ 'bt_bb_interactive_image' ] = array(
		'edit_box_selector' => '',
		'params' => array(
			'image'      			=> array(),
		),
	);

	$elements[ 'bt_bb_interactive_image_item' ] = array(
		'edit_box_selector' => '',
		'params' => array(
			'title'			=> array( 'js_handler' => array( 'target_selector' => '.bt_bb_call_to_action_title .bt_bb_headline_content span', 'type' => 'inner_html' ) ),
			'text'			=> array(),
			'position_x'	=> array(),
			'position_y'	=> array(),
		),
	);

	$elements[ 'bt_bb_progress_bar_advanced' ] = array(
		'edit_box_selector' => '',
		'ajax_trigger_scroll' => true,
		'params' => array(
			'type'        					=> array(),
			'percentage'        			=> array(),
			'duration'     	   				=> array(),
			'easing'       	 				=> array(),
			'text'        					=> array(),			
			'size'        					=> array( 'js_handler' => array( 'target_selector' => '', 'type' => 'class' ) ),
			'font_weight'					=> array( 'js_handler' => array( 'target_selector' => '', 'type' => 'class' ) ),
			'text_color'					=> array( 'js_handler' => array( 'target_selector' => '', 'type' => 'class' ) ),
			'url'							=> array( 'js_handler' => array( 'target_selector' => 'a', 'type' => 'attr', 'attr' => 'href' ) ),
			'target' 						=> array( 'js_handler' => array( 'target_selector' => 'a', 'type' => 'attr', 'attr' => 'target' ) ),
		),
	);

	$elements[ 'bt_bb_testimonial' ] = array(
		'edit_box_selector' => '',
		'params' => array(
			'text'						=> array( 'js_handler' => array( 'target_selector' => '.bt_bb_testimonial_text span', 'type' => 'inner_html' ) ),
			'details'					=> array( 'js_handler' => array( 'target_selector' => '.bt_bb_testimonial_details', 'type' => 'inner_html' ) ),
			'name'						=> array( 'js_handler' => array( 'target_selector' => '.bt_bb_testimonial_name', 'type' => 'inner_html' ) ),
			'signature'					=> array(),
		),
	);

	$elements[ 'bt_bb_working_hours' ] = array(
		'edit_box_selector' => '',
		'params' => array(
			'day'					=> array( 'js_handler' => array( 'target_selector' => '.bt_bb_working_hours_inner_day', 'type' => 'inner_html' ) ),
			'time'					=> array( 'js_handler' => array( 'target_selector' => '.bt_bb_working_hours_inner_time', 'type' => 'inner_html' ) ),
			'color_scheme' 			=> array( 'ajax_filter' => array( 'class' ) ),
			'url_text'				=> array( 'js_handler' => array( 'target_selector' => '.bt_bb_working_hours  .bt_bb_working_hours_button .bt_bb_button_text', 'type' => 'inner_html' ) ),
			'url'					=> array( 'js_handler' => array( 'target_selector' => 'a', 'type' => 'attr', 'attr' => 'href' ) ),
			'target' 				=> array( 'js_handler' => array( 'target_selector' => 'a', 'type' => 'attr', 'attr' => 'target' ) ),
		),
	);


	return $elements;
}

add_filter( 'bt_bb_fe_elements', 'cliniq_bt_bb_fe' );