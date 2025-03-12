<?php

BoldThemes_Customize_Default::$data['body_font'] = 'Inter';
BoldThemes_Customize_Default::$data['heading_supertitle_font'] = 'Inter';
BoldThemes_Customize_Default::$data['heading_font'] = 'Inter'; 
BoldThemes_Customize_Default::$data['heading_subtitle_font'] = 'Inter';
BoldThemes_Customize_Default::$data['menu_font'] = 'Inter';


BoldThemes_Customize_Default::$data['button_font'] = 'Inter';
BoldThemes_Customize_Default::$data['buttons_shape'] = 'soft-rounded';

BoldThemes_Customize_Default::$data['accent_color'] = '#01cab8';
BoldThemes_Customize_Default::$data['alternate_color'] = '#142958';
BoldThemes_Customize_Default::$data['logo_height'] = '80';

BoldThemes_Customize_Default::$data['sticky_height'] = '65';

BoldThemes_Customize_Default::$data['menu_type'] = 'horizontal-right';
BoldThemes_Customize_Default::$data['menu_background'] = '';
BoldThemes_Customize_Default::$data['menu_background_opacity'] = '';

BoldThemes_Customize_Default::$data['back_to_top'] = false;
BoldThemes_Customize_Default::$data['back_to_top_text'] = '';

BoldThemes_Customize_Default::$data['image_404'] = get_template_directory_uri() . '/gfx/404.jpg';


require_once( get_template_directory() . '/php/after_framework/functions.php' );
require_once( get_template_directory() . '/php/after_framework/customize_params.php' );