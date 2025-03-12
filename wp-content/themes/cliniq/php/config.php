<?php

/**
 * Color schemes
 */

if ( ! function_exists( 'cliniq_color_schemes' ) ) {
	function cliniq_color_schemes( $color_scheme_arr ) {

		$theme_color_schemes = array();
		/* Color Scheme 01 */ $theme_color_schemes[] = 'dark-skin;Light font, dark background;#ffffff;#1d1e21';
		/* Color Scheme 02 */ $theme_color_schemes[] = 'light-skin;Dark font, light background;#1d1e21;#ffffff';
		
		/* Color Scheme 03 */ $theme_color_schemes[] = 'accent-light-skin;Accent font, dark background (or details);var(--accent-color);#1d1e21';
		/* Color Scheme 04 */ $theme_color_schemes[] = 'accent-dark-skin;Accent font, light background (or details);var(--accent-color);#ffffff';
		/* Color Scheme 05 */ $theme_color_schemes[] = 'light-accent-skin;Dark font, accent background (or details);#1d1e21;var(--accent-color)';
		/* Color Scheme 06 */ $theme_color_schemes[] = 'dark-accent-skin;Light font, accent background (or details);#ffffff;var(--accent-color)';
		
		/* Color Scheme 07 */ $theme_color_schemes[] = 'alternate-light-skin;Alternate font, dark background (or details);var(--alternate-color);#1d1e21';
		/* Color Scheme 08 */ $theme_color_schemes[] = 'alternate-dark-skin;Alternate font, light background (or details);var(--alternate-color);#ffffff';
		/* Color Scheme 09 */ $theme_color_schemes[] = 'light-alternate-skin;Dark font, alternate background (or details);#1d1e21;var(--alternate-color)';
		/* Color Scheme 10 */ $theme_color_schemes[] = 'dark-alternate-skin;Light font, alternate background (or details);#ffffff;var(--alternate-color)';

		/* Color Scheme 11 */ $theme_color_schemes[] = 'alternate-accent-skin;Accent font, alternate background (or details);var(--accent-color);var(--alternate-color)';
		/* Color Scheme 12 */ $theme_color_schemes[] = 'accent-alternate-skin;Alternate font, accent background (or details);var(--alternate-color);var(--accent-color)';
		
		/* Color Scheme 13 */ $theme_color_schemes[] = 'gray-background;Dark font, light gray background (or details);#1d1e21;#eaf0f0';

		/* Color Scheme 14 */ $theme_color_schemes[] = 'accent-lightblue-skin;Accent font, light blue background (or details);var(--accent-color);#f3fcff';
		/* Color Scheme 15 */ $theme_color_schemes[] = 'alternate-lightblue-skin;Alternate font, light blue background (or details);var(--alternate-color);#f3fcff';

		/* Color Scheme 16 */ $theme_color_schemes[] = 'gray-accent-skin;Gray font, accent background (or details);#a0a0a0;var(--accent-color)';
		/* Color Scheme 17 */ $theme_color_schemes[] = 'alternate-gray-skin;Alternate font, gray background (or details);var(--alternate-color);#f3f3f3';

		/* Color Scheme 18 */ $theme_color_schemes[] = 'dark-purple-skin;Light font, purple background (or details);#ffffff;#7961d9';
		/* Color Scheme 19 */ $theme_color_schemes[] = 'purple-dark-skin;Purple font, light background (or details);#7961d9;#ffffff';
		/* Color Scheme 20 */ $theme_color_schemes[] = 'alternate-purple-skin;Alternate font, purple background (or details);var(--alternate-color);#7961d9';
		/* Color Scheme 21 */ $theme_color_schemes[] = 'accent-purple-skin;Accent font, purple background (or details);var(--accent-color);#7961d9';
		/* Color Scheme 22 */ $theme_color_schemes[] = 'gray-light-skin;Gray font, light background (or details);#a0a0a0;#ffffff';
		/* Color Scheme 23 */ $theme_color_schemes[] = 'accent-cream-skin;Accent font, cream background (or details);var(--accent-color);#faf6ee';


		return array_merge( $theme_color_schemes, $color_scheme_arr );
	}
}

/*

Black/White;#000;#fff
White/Black;#fff;#000
LightGray/Black;#e2e2e2;#000
Black/LightGray;#000;#e2e2e2
DarkGray/White;#333335;#fff
White/DarkGray;#fff;#333335

*/

/*
* set content width
*/
if ( ! isset( $content_width ) ) {
	$content_width = 1200;
}

/**
 * Change number of related products
 */
if ( ! function_exists( 'boldthemes_change_number_related_products' ) ) {
	function boldthemes_change_number_related_products( $args ) {
		$args['posts_per_page'] = 4; // # of related products
		$args['columns'] = 4; // # of columns per row
		return $args;
	}
}

/**
 * Loop shop per page
 */
 
if ( ! function_exists( 'boldthemes_loop_shop_per_page' ) ) {
	function boldthemes_loop_shop_per_page( $cols ) {
		return 9;
	}
}

/**
 * Loop columns
 */
if ( ! function_exists( 'boldthemes_loop_shop_columns' ) ) {
	function boldthemes_loop_shop_columns() {
		return 3; // 3 products per row
	}
}