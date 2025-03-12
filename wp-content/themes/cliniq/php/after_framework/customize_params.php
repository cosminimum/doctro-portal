<?php

/* Remove unused params */

remove_action( 'customize_register', 'boldthemes_customize_blog_side_info' );
remove_action( 'boldthemes_customize_register', 'boldthemes_customize_blog_side_info' );
remove_action( 'customize_register', 'boldthemes_customize_footer_dark_skin' );
remove_action( 'boldthemes_customize_register', 'boldthemes_customize_footer_dark_skin' );


/* GENERAL SECTION 
-------------------------------------------------------------- */

// PAGE HEADLINE ALIGNMENT

BoldThemes_Customize_Default::$data['default_page_headline_alignment'] = '';

if ( ! function_exists( 'boldthemes_customize_default_page_headline_alignment' ) ) {
	function boldthemes_customize_default_page_headline_alignment( $wp_customize ) {

		$wp_customize->add_setting( BoldThemesFramework::$pfx . '_theme_options[default_page_headline_alignment]', array(
			'default'           => BoldThemes_Customize_Default::$data['default_page_headline_alignment'],
			'type'              => 'option',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'boldthemes_sanitize_select'
		));
		$wp_customize->add_control( 'default_page_headline_alignment', array(
			'label'     => esc_html__( 'Page Headline Alignment', 'cliniq' ),
			'section'   => BoldThemesFramework::$pfx . '_header_footer_section',
			'settings'  => BoldThemesFramework::$pfx . '_theme_options[default_page_headline_alignment]',
			'priority'  => 100,
			'type'      => 'select',
			'choices'   => array(
				'center' 	=> esc_html__( 'Center', 'cliniq' ),
				'' 			=> esc_html__( 'Left', 'cliniq' ),
				'right' 	=> esc_html__( 'Right', 'cliniq' )
			)
		));
	}
}
add_action( 'customize_register', 'boldthemes_customize_default_page_headline_alignment' );
add_action( 'boldthemes_customize_register', 'boldthemes_customize_default_page_headline_alignment' );


// PAGE HEADLINE OVERLAY

BoldThemes_Customize_Default::$data['default_page_headline_overlay'] = '';

if ( ! function_exists( 'boldthemes_customize_default_page_headline_overlay' ) ) {
	function boldthemes_customize_default_page_headline_overlay( $wp_customize ) {

		$wp_customize->add_setting( BoldThemesFramework::$pfx . '_theme_options[default_page_headline_overlay]', array(
			'default'           => BoldThemes_Customize_Default::$data['default_page_headline_overlay'],
			'type'              => 'option',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'boldthemes_sanitize_select'
		));
		$wp_customize->add_control( 'default_page_headline_overlay', array(
			'label'     => esc_html__( 'Page Headline Overlay', 'cliniq' ),
			'section'   => BoldThemesFramework::$pfx . '_header_footer_section',
			'settings'  => BoldThemesFramework::$pfx . '_theme_options[default_page_headline_overlay]',
			'priority'  => 100,
			'type'      => 'select',
			'choices'   => array(
				'' 				=> esc_html__( 'Dark', 'cliniq' ),
				'light' 		=> esc_html__( 'Light', 'cliniq' ),
				'accent' 		=> esc_html__( 'Accent', 'cliniq' ),
				'alternate' 	=> esc_html__( 'Alternate', 'cliniq' ),
				'none' 			=> esc_html__( 'None', 'cliniq' )
			)
		));
	}
}
add_action( 'customize_register', 'boldthemes_customize_default_page_headline_overlay' );
add_action( 'boldthemes_customize_register', 'boldthemes_customize_default_page_headline_overlay' );


// STICKY LOGO SIZE

if ( ! function_exists( 'boldthemes_customize_sticky_height' ) ) {
	function boldthemes_customize_sticky_height( $wp_customize ) {
		
		$wp_customize->add_setting( BoldThemesFramework::$pfx . '_theme_options[sticky_height]', array(
			'default'           => BoldThemes_Customize_Default::$data['sticky_height'],
			'type'              => 'option',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field'
		));

		$wp_customize->add_control( 'sticky_height', array(
			'label'    => esc_html__( 'Sticky Logo Height (in px)', 'cliniq' ),
			'description'    => esc_html__( 'Define the sticky logo height by setting it’s size in pixels (without px unit)', 'cliniq' ),
			'section'  => BoldThemesFramework::$pfx . '_header_footer_section',
			'settings' => BoldThemesFramework::$pfx . '_theme_options[sticky_height]',
			'priority' => 51,
			'type'     => 'text'
		));
	}
}
add_action( 'customize_register', 'boldthemes_customize_sticky_height' );
add_action( 'boldthemes_customize_register', 'boldthemes_customize_sticky_height' );



// BACK TO TOP BUTTON

if ( ! function_exists( 'boldthemes_customize_back_to_top' ) ) {
	function boldthemes_customize_back_to_top( $wp_customize ) {
		
		$wp_customize->add_setting( BoldThemesFramework::$pfx . '_theme_options[back_to_top]', array(
			'default'           => BoldThemes_Customize_Default::$data['back_to_top'],
			'type'              => 'option',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'boldthemes_sanitize_checkbox'
		));
		$wp_customize->add_control( 'back_to_top', array(
			'label'     => esc_html__( 'Enable Back To Top', 'cliniq' ),
			'description'    => esc_html__( 'Checking this enables the small feature that shows the styled back to top element at the bottom of the page, which appears after some scrolling.', 'cliniq' ),
			'section'   => BoldThemesFramework::$pfx . '_general_section',
			'settings'  => BoldThemesFramework::$pfx . '_theme_options[back_to_top]',
			'priority'  => 110,
			'type'     => 'checkbox'
		));
	}
}
add_action( 'customize_register', 'boldthemes_customize_back_to_top' );
add_action( 'boldthemes_customize_register', 'boldthemes_customize_back_to_top' );


// BACK TO TOP TEXT

if ( ! function_exists( 'boldthemes_customize_back_to_top_text' ) ) {
	function boldthemes_customize_back_to_top_text( $wp_customize ) {
		
		$wp_customize->add_setting( BoldThemesFramework::$pfx . '_theme_options[back_to_top_text]', array(
			'default'           => BoldThemes_Customize_Default::$data['back_to_top_text'],
			'type'              => 'option',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field'
		));
		$wp_customize->add_control( 'back_to_top_text', array(
			'label'    => esc_html__( 'Back To Top Text', 'cliniq' ),
			'description'    => esc_html__( 'You can add text to your back to top button, but if you leave it blank you\'ll get only an arrow pointing upwards, which is also nice.', 'cliniq' ),
			'section'  => BoldThemesFramework::$pfx . '_general_section',
			'settings' => BoldThemesFramework::$pfx . '_theme_options[back_to_top_text]',
			'priority' => 111,
			'type'     => 'text'
		));
	}
}
add_action( 'customize_register', 'boldthemes_customize_back_to_top_text' );
add_action( 'boldthemes_customize_register', 'boldthemes_customize_back_to_top_text' );



// CUSTOM 404 IMAGE

if ( ! function_exists( 'boldthemes_customize_image_404' ) ) {
	function boldthemes_customize_image_404( $wp_customize ) {
		
		$wp_customize->add_setting( BoldThemesFramework::$pfx . '_theme_options[image_404]', array(
			'default'           => BoldThemes_Customize_Default::$data['image_404'],
			'type'              => 'option',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'boldthemes_sanitize_image'
		));
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'image_404', array(
			'label'    => esc_html__( 'Custom Error 404 Page Image', 'cliniq' ),
			'description'    => esc_html__( 'Set static image as a background on Error page. Minimum recommended size: 1920x1080px', 'cliniq' ),
			'section'  => BoldThemesFramework::$pfx . '_general_section',
			'settings' => BoldThemesFramework::$pfx . '_theme_options[image_404]',
			'priority' => 121,
			'context'  => BoldThemesFramework::$pfx . '_image_404'
		)));
	}
}
add_action( 'customize_register', 'boldthemes_customize_image_404' );
add_action( 'boldthemes_customize_register', 'boldthemes_customize_image_404' );




/* TYPO SECTION
-------------------------------------------------------------- */

// BODY WEIGHT

BoldThemes_Customize_Default::$data['default_body_weight'] = 'default';
if ( ! function_exists( 'boldthemes_customize_default_body_weight' ) ) {
	function boldthemes_customize_default_body_weight( $wp_customize ) {

		$wp_customize->add_setting( BoldThemesFramework::$pfx . '_theme_options[default_body_weight]', array(
			'default'           => BoldThemes_Customize_Default::$data['default_body_weight'],
			'type'              => 'option',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'boldthemes_sanitize_select'
		));

		$wp_customize->add_control( 'default_body_weight', array(
			'label'     		=> esc_html__( 'Body Font Weight', 'cliniq' ),
			'section'   		=> BoldThemesFramework::$pfx . '_typo_section',
			'settings'  		=> BoldThemesFramework::$pfx . '_theme_options[default_body_weight]',
			'priority'  		=> 98,
			'type'      		=> 'select',
			'choices'   => array(
				'default'		=> esc_html__( 'Default', 'cliniq' ),
				'thin' 			=> esc_html__( 'Thin', 'cliniq' ),
				'lighter' 		=> esc_html__( 'Lighter', 'cliniq' ),
				'light' 		=> esc_html__( 'Light', 'cliniq' ),
				'normal' 		=> esc_html__( 'Normal', 'cliniq' ),
				'medium' 		=> esc_html__( 'Medium', 'cliniq' ),
				'semi-bold' 	=> esc_html__( 'Semi bold', 'cliniq' ),
				'bold' 			=> esc_html__( 'Bold', 'cliniq' ),
				'bolder' 		=> esc_html__( 'Bolder', 'cliniq' ),
				'black' 		=> esc_html__( 'Black', 'cliniq' )
			)
		));
	}
}
add_action( 'customize_register', 'boldthemes_customize_default_body_weight' );
add_action( 'boldthemes_customize_register', 'boldthemes_customize_default_body_weight' );


// HEADING WEIGHT

BoldThemes_Customize_Default::$data['default_heading_weight'] = 'default';
if ( ! function_exists( 'boldthemes_customize_default_heading_weight' ) ) {
	function boldthemes_customize_default_heading_weight( $wp_customize ) {

		$wp_customize->add_setting( BoldThemesFramework::$pfx . '_theme_options[default_heading_weight]', array(
			'default'           => BoldThemes_Customize_Default::$data['default_heading_weight'],
			'type'              => 'option',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'boldthemes_sanitize_select'
		));

		$wp_customize->add_control( 'default_heading_weight', array(
			'label'     		=> esc_html__( 'Heading Font Weight', 'cliniq' ),
			'section'   		=> BoldThemesFramework::$pfx . '_typo_section',
			'settings'  		=> BoldThemesFramework::$pfx . '_theme_options[default_heading_weight]',
			'priority'  		=> 101,
			'type'      		=> 'select',
			'choices'   => array(
				'default'		=> esc_html__( 'Default', 'cliniq' ),
				'thin' 			=> esc_html__( 'Thin', 'cliniq' ),
				'lighter' 		=> esc_html__( 'Lighter', 'cliniq' ),
				'light' 		=> esc_html__( 'Light', 'cliniq' ),
				'normal' 		=> esc_html__( 'Normal', 'cliniq' ),
				'medium' 		=> esc_html__( 'Medium', 'cliniq' ),
				'semi-bold' 	=> esc_html__( 'Semi bold', 'cliniq' ),
				'bold' 			=> esc_html__( 'Bold', 'cliniq' ),
				'bolder' 		=> esc_html__( 'Bolder', 'cliniq' ),
				'black' 		=> esc_html__( 'Black', 'cliniq' )
			)
		));
	}
}
add_action( 'customize_register', 'boldthemes_customize_default_heading_weight' );
add_action( 'boldthemes_customize_register', 'boldthemes_customize_default_heading_weight' );

// HEADING STYLE

BoldThemes_Customize_Default::$data['heading_style'] = 'default';
if ( ! function_exists( 'boldthemes_customize_heading_style' ) ) {
	function boldthemes_customize_heading_style( $wp_customize ) {

		$wp_customize->add_setting( BoldThemesFramework::$pfx . '_theme_options[heading_style]', array(
			'default'           => BoldThemes_Customize_Default::$data['heading_style'],
			'type'              => 'option',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'boldthemes_sanitize_select'
		));

		$wp_customize->add_control( 'heading_style', array(
			'label'     		=> esc_html__( 'Heading Font Style', 'cliniq' ),
			'section'   		=> BoldThemesFramework::$pfx . '_typo_section',
			'settings'  		=> BoldThemesFramework::$pfx . '_theme_options[heading_style]',
			'priority'  		=> 101,
			'type'      		=> 'select',
			'choices'   => array(
				'default'		=> esc_html__( 'Default', 'cliniq' ),
				'italic' 		=> esc_html__( 'Italic', 'cliniq' )
			)
		));
	}
}
add_action( 'customize_register', 'boldthemes_customize_heading_style' );
add_action( 'boldthemes_customize_register', 'boldthemes_customize_heading_style' );


// SUPERTITLE WEIGHT

BoldThemes_Customize_Default::$data['default_supertitle_weight'] = 'default';
if ( ! function_exists( 'boldthemes_customize_default_supertitle_weight' ) ) {
	function boldthemes_customize_default_supertitle_weight( $wp_customize ) {

		$wp_customize->add_setting( BoldThemesFramework::$pfx . '_theme_options[default_supertitle_weight]', array(
			'default'           => BoldThemes_Customize_Default::$data['default_supertitle_weight'],
			'type'              => 'option',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'boldthemes_sanitize_select'
		));

		$wp_customize->add_control( 'default_supertitle_weight', array(
			'label'     		=> esc_html__( 'Supertitle Font Weight', 'cliniq' ),
			'section'   		=> BoldThemesFramework::$pfx . '_typo_section',
			'settings'  		=> BoldThemesFramework::$pfx . '_theme_options[default_supertitle_weight]',
			'priority'  		=> 102,
			'type'      		=> 'select',
			'choices'   => array(
				'default'		=> esc_html__( 'Default', 'cliniq' ),
				'thin' 			=> esc_html__( 'Thin', 'cliniq' ),
				'lighter' 		=> esc_html__( 'Lighter', 'cliniq' ),
				'light' 		=> esc_html__( 'Light', 'cliniq' ),
				'normal' 		=> esc_html__( 'Normal', 'cliniq' ),
				'medium' 		=> esc_html__( 'Medium', 'cliniq' ),
				'semi-bold' 	=> esc_html__( 'Semi bold', 'cliniq' ),
				'bold' 			=> esc_html__( 'Bold', 'cliniq' ),
				'bolder' 		=> esc_html__( 'Bolder', 'cliniq' ),
				'black' 		=> esc_html__( 'Black', 'cliniq' )
			)
		));
	}
}
add_action( 'customize_register', 'boldthemes_customize_default_supertitle_weight' );
add_action( 'boldthemes_customize_register', 'boldthemes_customize_default_supertitle_weight' );


// SUBTITLE WEIGHT

BoldThemes_Customize_Default::$data['default_subtitle_weight'] = 'default';
if ( ! function_exists( 'boldthemes_customize_default_subtitle_weight' ) ) {
	function boldthemes_customize_default_subtitle_weight( $wp_customize ) {

		$wp_customize->add_setting( BoldThemesFramework::$pfx . '_theme_options[default_subtitle_weight]', array(
			'default'           => BoldThemes_Customize_Default::$data['default_subtitle_weight'],
			'type'              => 'option',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'boldthemes_sanitize_select'
		));

		$wp_customize->add_control( 'default_subtitle_weight', array(
			'label'     		=> esc_html__( 'Subtitle Font Weight', 'cliniq' ),
			'section'   		=> BoldThemesFramework::$pfx . '_typo_section',
			'settings'  		=> BoldThemesFramework::$pfx . '_theme_options[default_subtitle_weight]',
			'priority'  		=> 104,
			'type'      		=> 'select',
			'choices'   => array(
				'default'		=> esc_html__( 'Default', 'cliniq' ),
				'thin' 			=> esc_html__( 'Thin', 'cliniq' ),
				'lighter' 		=> esc_html__( 'Lighter', 'cliniq' ),
				'light' 		=> esc_html__( 'Light', 'cliniq' ),
				'normal' 		=> esc_html__( 'Normal', 'cliniq' ),
				'medium' 		=> esc_html__( 'Medium', 'cliniq' ),
				'semi-bold' 	=> esc_html__( 'Semi bold', 'cliniq' ),
				'bold' 			=> esc_html__( 'Bold', 'cliniq' ),
				'bolder' 		=> esc_html__( 'Bolder', 'cliniq' ),
				'black' 		=> esc_html__( 'Black', 'cliniq' )
			)
		));
	}
}
add_action( 'customize_register', 'boldthemes_customize_default_subtitle_weight' );
add_action( 'boldthemes_customize_register', 'boldthemes_customize_default_subtitle_weight' );


// SUBTITLE STYLE

BoldThemes_Customize_Default::$data['subtitle_style'] = 'default';
if ( ! function_exists( 'boldthemes_customize_subtitle_style' ) ) {
	function boldthemes_customize_subtitle_style( $wp_customize ) {

		$wp_customize->add_setting( BoldThemesFramework::$pfx . '_theme_options[subtitle_style]', array(
			'default'           => BoldThemes_Customize_Default::$data['subtitle_style'],
			'type'              => 'option',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'boldthemes_sanitize_select'
		));

		$wp_customize->add_control( 'subtitle_style', array(
			'label'     		=> esc_html__( 'Subtitle Font Style', 'cliniq' ),
			'section'   		=> BoldThemesFramework::$pfx . '_typo_section',
			'settings'  		=> BoldThemesFramework::$pfx . '_theme_options[subtitle_style]',
			'priority'  		=> 105,
			'type'      		=> 'select',
			'choices'   => array(
				'default'		=> esc_html__( 'Default', 'cliniq' ),
				'italic' 		=> esc_html__( 'Italic', 'cliniq' )
			)
		));
	}
}
add_action( 'customize_register', 'boldthemes_customize_subtitle_style' );
add_action( 'boldthemes_customize_register', 'boldthemes_customize_subtitle_style' );


// BUTTON FONT

if ( ! function_exists( 'boldthemes_customize_button_font' ) ) {
	function boldthemes_customize_button_font( $wp_customize ) {
		
		$wp_customize->add_setting( BoldThemesFramework::$pfx . '_theme_options[button_font]', array(
			'default'           => urlencode( BoldThemes_Customize_Default::$data['button_font'] ),
			'type'              => 'option',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'boldthemes_sanitize_select'
		));
		$wp_customize->add_control( 'button_font', array(
			'label'     => esc_html__( 'Button Font', 'cliniq' ),
			'section'   => BoldThemesFramework::$pfx . '_typo_section',
			'settings'  => BoldThemesFramework::$pfx . '_theme_options[button_font]',
			'priority'  => 106,
			'type'      => 'select',
			'choices'   => BoldThemesFramework::$customize_fonts
		));
	}
}
add_action( 'customize_register', 'boldthemes_customize_button_font' );
add_action( 'boldthemes_customize_register', 'boldthemes_customize_button_font' );


// BUTTON FONT WEIGHT

BoldThemes_Customize_Default::$data['default_button_weight'] = 'default';

if ( ! function_exists( 'boldthemes_customize_default_button_weight' ) ) {
	function boldthemes_customize_default_button_weight( $wp_customize ) {

		$wp_customize->add_setting( BoldThemesFramework::$pfx . '_theme_options[default_button_weight]', array(
			'default'           => BoldThemes_Customize_Default::$data['default_button_weight'],
			'type'              => 'option',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'boldthemes_sanitize_select'
		));
		$wp_customize->add_control( 'default_button_weight', array(
			'label'     => esc_html__( 'Button Font Weight', 'cliniq' ),
			'section'   => BoldThemesFramework::$pfx . '_typo_section',
			'settings'  => BoldThemesFramework::$pfx . '_theme_options[default_button_weight]',
			'priority'  => 107,
			'type'      => 'select',
			'choices'   => array(
				'default'	=> esc_html__( 'Default', 'cliniq' ),
				'thin' 		=> esc_html__( 'Thin', 'cliniq' ),
				'lighter' 	=> esc_html__( 'Lighter', 'cliniq' ),
				'light' 	=> esc_html__( 'Light', 'cliniq' ),
				'normal' 	=> esc_html__( 'Normal', 'cliniq' ),
				'medium' 	=> esc_html__( 'Medium', 'cliniq' ),
				'semi-bold' => esc_html__( 'Semi bold', 'cliniq' ),
				'bold' 		=> esc_html__( 'Bold', 'cliniq' ),
				'bolder' 	=> esc_html__( 'Bolder', 'cliniq' ),
				'black' 	=> esc_html__( 'Black', 'cliniq' )
			)
		));
	}
}
add_action( 'customize_register', 'boldthemes_customize_default_button_weight' );
add_action( 'boldthemes_customize_register', 'boldthemes_customize_default_button_weight' );


// MENU WEIGHT

BoldThemes_Customize_Default::$data['default_menu_weight'] = 'default';

if ( ! function_exists( 'boldthemes_customize_default_menu_weight' ) ) {
	function boldthemes_customize_default_menu_weight( $wp_customize ) {

		$wp_customize->add_setting( BoldThemesFramework::$pfx . '_theme_options[default_menu_weight]', array(
			'default'           => BoldThemes_Customize_Default::$data['default_menu_weight'],
			'type'              => 'option',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'boldthemes_sanitize_select'
		));
		$wp_customize->add_control( 'default_menu_weight', array(
			'label'     => esc_html__( 'Menu Font Weight', 'cliniq' ),
			'section'   => BoldThemesFramework::$pfx . '_typo_section',
			'settings'  => BoldThemesFramework::$pfx . '_theme_options[default_menu_weight]',
			'priority'  => 110,
			'type'      => 'select',
			'choices'   => array(
				'default'	=> esc_html__( 'Default', 'cliniq' ),
				'thin' 		=> esc_html__( 'Thin', 'cliniq' ),
				'lighter' 	=> esc_html__( 'Lighter', 'cliniq' ),
				'light' 	=> esc_html__( 'Light', 'cliniq' ),
				'normal' 	=> esc_html__( 'Normal', 'cliniq' ),
				'medium' 	=> esc_html__( 'Medium', 'cliniq' ),
				'semi-bold' => esc_html__( 'Semi bold', 'cliniq' ),
				'bold' 		=> esc_html__( 'Bold', 'cliniq' ),
				'bolder' 	=> esc_html__( 'Bolder', 'cliniq' ),
				'black' 	=> esc_html__( 'Black', 'cliniq' )
			)
		));
	}
}
add_action( 'customize_register', 'boldthemes_customize_default_menu_weight' );
add_action( 'boldthemes_customize_register', 'boldthemes_customize_default_menu_weight' );


// CAPITALIZE MAIN MENU

BoldThemes_Customize_Default::$data['capitalize_main_menu'] = true;
if ( ! function_exists( 'boldthemes_customize_capitalize_main_menu' ) ) {
	function boldthemes_customize_capitalize_main_menu( $wp_customize ) {
		$wp_customize->add_setting( BoldThemesFramework::$pfx . '_theme_options[capitalize_main_menu]', array(
			'default'           => BoldThemes_Customize_Default::$data['capitalize_main_menu'],
			'type'              => 'option',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'boldthemes_sanitize_checkbox'
		));
		$wp_customize->add_control( 'capitalize_main_menu', array(
			'label'     => esc_html__( 'Capitalize Menu Items', 'cliniq' ),
			'section'   => BoldThemesFramework::$pfx . '_typo_section',
			'settings'  => BoldThemesFramework::$pfx . '_theme_options[capitalize_main_menu]',
			'priority'  => 111,
			'type'      => 'checkbox'
		));
	}
}

add_action( 'customize_register', 'boldthemes_customize_capitalize_main_menu' );
add_action( 'boldthemes_customize_register', 'boldthemes_customize_capitalize_main_menu' );



// HEADER AND FOOTER

// MENU SHAPE
BoldThemes_Customize_Default::$data['menu_shape'] = '';

if ( ! function_exists( 'boldthemes_customize_menu_shape' ) ) {
	function boldthemes_customize_menu_shape( $wp_customize ) {
		
		$wp_customize->add_setting( BoldThemesFramework::$pfx . '_theme_options[menu_shape]', array(
			'default'           => BoldThemes_Customize_Default::$data['menu_shape'],
			'type'              => 'option',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'boldthemes_sanitize_select'
		));
		$wp_customize->add_control( 'menu_shape', array(
			'label'     => esc_html__( 'Menu Shape', 'cliniq' ),
			'description'    => esc_html__( 'Set the menu shape for all the pages on the site. Menu is square shape by default, otherwise is visible when Content below menu is enabled.', 'cliniq' ),
			'section'   => BoldThemesFramework::$pfx . '_header_footer_section',
			'settings'  => BoldThemesFramework::$pfx . '_theme_options[menu_shape]',
			'priority'  => 61,
			'type'      => 'select',
			'choices'   => array(
				''       			=> esc_html__( 'Square', 'cliniq' ),
				'round'     		=> esc_html__( 'Soft Rounded', 'cliniq' ),
				'rounded'     		=> esc_html__( 'Hard Rounded', 'cliniq' )
			)
		));
	}
}
add_action( 'customize_register', 'boldthemes_customize_menu_shape' );
add_action( 'boldthemes_customize_register', 'boldthemes_customize_menu_shape' );




/* Helper function */

if ( ! function_exists( 'cliniq_body_class' ) ) {
	function cliniq_body_class( $extra_class ) {
		if ( boldthemes_get_option( 'default_heading_weight' ) ) {
			$extra_class[] =  'btHeadingWeight' . boldthemes_convert_param_to_camel_case ( boldthemes_get_option( 'default_heading_weight' ) );
		}
		if ( boldthemes_get_option( 'default_supertitle_weight' ) ) {
			$extra_class[] =  'btSupertitleWeight' . boldthemes_convert_param_to_camel_case ( boldthemes_get_option( 'default_supertitle_weight' ) );
		}
		if ( boldthemes_get_option( 'default_subtitle_weight' ) ) {
			$extra_class[] =  'btSubtitleWeight' . boldthemes_convert_param_to_camel_case ( boldthemes_get_option( 'default_subtitle_weight' ) );
		}
		if ( boldthemes_get_option( 'default_button_weight' ) ) {
			$extra_class[] =  'btButtonWeight' . boldthemes_convert_param_to_camel_case ( boldthemes_get_option( 'default_button_weight' ) );
		}
		if ( boldthemes_get_option( 'menu_shape' ) ) {
			$extra_class[] =  'btMenuShape' . boldthemes_convert_param_to_camel_case ( boldthemes_get_option( 'menu_shape' ) );
		}
		return $extra_class;
	}
}