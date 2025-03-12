<?php



/**
 * Returns custom 404 image
 *
 * @return string - 404 image path
 */
if ( ! function_exists( 'boldthemes_get_404_image' ) ) {
	function boldthemes_get_404_image() {		
		$image_404 = boldthemes_get_option( 'image_404' );
			if ( is_numeric( $image_404 ) ) {
				$image_404 = wp_get_attachment_image_src( $image_404, 'full' );
				$image_404 = isset($image_404[0]) ? $image_404[0] : BoldThemes_Customize_Default::$data['image_404'];
			}
		return $image_404;
	}
}

// VERTICAL FULLSCREEN MENU BACKGROUND
if ( ! function_exists( 'boldthemes_menu_background' ) ) {
	function boldthemes_menu_background( $menu_type = '' ) {
		if ( $menu_type == 'vertical-fullscreen' ) {
			$menu_background = boldthemes_get_option( 'menu_background' );
			if ( $menu_background ) {
				if ( is_numeric( $menu_background ) ) {
					$menu_background = wp_get_attachment_image_src( $menu_background, 'full' );
					$menu_background = isset($menu_background[0]) ? $menu_background[0] : '';
				}
			}	
			$menu_background_opacity = boldthemes_get_option( 'menu_background_opacity' );
			$menu_background_opacity = $menu_background_opacity != '' ? $menu_background_opacity : '1';
			
			echo '<div class="header_fullscreen_image" style="background-image:url(' . esc_url( $menu_background ) . ');opacity: ' . esc_attr( $menu_background_opacity ) . ';"></div>';
		}
	}
}



// PRODUCT HEADLINE DASH
if ( ! function_exists( 'boldthemes_product_list_headline_dash' ) ) {
	function boldthemes_product_list_headline_dash( $dash ) {
		return 'top';
	}
}
add_filter( 'boldthemes_product_list_headline_dash', 'boldthemes_product_list_headline_dash' );


// PRODUCT HEADLINE SIZE
if ( ! function_exists( 'boldthemes_product_list_headline_size' ) ) {
	function boldthemes_product_list_headline_size( $size ) {
		return 'medium';
	}
}
add_filter( 'boldthemes_product_list_headline_size', 'boldthemes_product_list_headline_size' );


// SINGLE PRODUCT SHARE
if ( ! function_exists( 'boldthemes_shop_share_settings' ) ) {
	function boldthemes_shop_share_settings ( ) {
		return array( 'xsmall', 'filled', 'circle' );
	}
}
add_filter( 'boldthemes_shop_share_settings', 'boldthemes_shop_share_settings' );


// PRODUCT HEADLINE DASH
if ( ! function_exists( 'boldthemes_product_headline_dash' ) ) {
	function boldthemes_product_headline_dash( $dash ) {
		return 'top';
	}
}
add_filter( 'boldthemes_product_headline_dash', 'boldthemes_product_headline_dash' );


/**
 * Preloader HTML output
 */
 if ( ! function_exists( 'boldthemes_preloader_html' ) ) {
	function boldthemes_preloader_html() {
		if ( ! boldthemes_get_option( 'disable_preloader' ) ) { ?>
			<div id="btPreloader" class="btPreloader">
				<div class="animation">
					<h3 class="btLoaderText"><?php echo wp_kses_post( boldthemes_get_option( 'preloader_text' ) ); ?></h3>

					<div class="bt_loader">
						<span></span>
						<span class="bt_loader_02"></span>
						<span class="bt_loader_03"></span>
					</div>

				</div>
			</div><!-- /.preloader -->
		<?php }
	}
}



/**
 * Header headline output
 */

if ( ! function_exists( 'boldthemes_header_headline' ) ) {
	function boldthemes_header_headline( $arg = array() ) {

		$extra_class = 'btPageHeadline';
		
		$dash  = '';
		$use_dash = boldthemes_get_option( 'sidebar_use_dash' );
		if ( is_singular( 'post' ) ) {
			$use_dash = boldthemes_get_option( 'blog_use_dash' );
		} else if ( is_singular( 'product' ) ) {
			$use_dash = boldthemes_get_option( 'shop_use_dash' );
		}  else if ( is_singular( 'portfolio' ) ) {
			$use_dash = boldthemes_get_option( 'pf_use_dash' );
		} 
		if ( $use_dash ) $dash  = apply_filters( 'boldthemes_header_headline_dash', 'top' );
		if ( is_front_page() ) {
			$title = get_bloginfo( 'description' );
		} else if ( is_singular() ) {
			$title = get_the_title();
		} else {
			$title = wp_title( '', false );
		}
		
		$excerpt = '';
		
		if ( BoldThemesFramework::$page_for_header_id != '' ) {
			$feat_image = wp_get_attachment_url( get_post_thumbnail_id( BoldThemesFramework::$page_for_header_id ) );
			
			$excerpt = boldthemes_get_the_excerpt( BoldThemesFramework::$page_for_header_id );
			if ( ! $feat_image ) {
				if ( is_singular() && ! is_singular( 'product' ) ) {
					$feat_image = wp_get_attachment_url( get_post_thumbnail_id() );
				} else {
					$feat_image = false;
				}
			}
		} else {
			if ( is_singular() ) {
				$feat_image = wp_get_attachment_url( get_post_thumbnail_id() );
			} else {
				$feat_image = false;
			}
			if ( is_singular() ) {
				$excerpt = boldthemes_get_the_excerpt( get_the_ID() );
			}
		}
		
		$parallax = isset( $arg['parallax'] ) ? $arg['parallax'] : apply_filters( 'boldthemes_header_headline_parallax', '0.8' );
		$parallax_class = 'bt_bb_parallax';
		if ( wp_is_mobile() ) {
			$parallax = 0;
			$parallax_class = '';
		}
		
		$supertitle = '';
		$subtitle = $excerpt;
		
		$breadcrumbs = isset( $arg['breadcrumbs'] ) ? $arg['breadcrumbs'] : true;
		
		if ( $breadcrumbs ) {
			$heading_args = boldthemes_breadcrumbs( false, $title, $subtitle );
			$supertitle = $heading_args['supertitle'];
			$title = $heading_args['title'];
			$subtitle = $heading_args['subtitle'];
		}
		
		if ( $title != '' || $supertitle != '' || $subtitle != '' ) {
			$extra_class .= $feat_image ? ' bt_bb_background_image ' . apply_filters( 'boldthemes_header_headline_gradient', 'bt_bb_background_overlay_dark_solid' ) . ' ' . $parallax_class . ' ' . apply_filters( 'boldthemes_header_headline_skin', 'btDarkSkin' ) . ' ' : ' ';
			echo '<section class="bt_bb_section gutter bt_bb_vertical_align_top ' . esc_attr( $extra_class ) . '" style="background-image:url(' . esc_url( $feat_image ) . ')" data-parallax="' . esc_attr( $parallax ) . '" data-parallax-offset="0">';
				echo '<div class="bt_bb_port port">';
					echo '<div class="bt_bb_cell">';
						echo '<div class="bt_bb_cell_inner">';
							echo '<div class = "bt_bb_row">';
								echo '<div class="bt_bb_column">';
									echo '<div class="bt_bb_column_content">';
										echo wp_kses_post( boldthemes_get_heading_html( 
											array(
												'superheadline' => $supertitle,
												'headline' => $title,
												'subheadline' => $subtitle,
												'html_tag' => 'h1',
												'size' => apply_filters( 'boldthemes_header_headline_size', 'large' ),
												'dash' => $dash,
												'el_style' => '',
												'el_class' => ''
											)
										) );
										echo '</div><!-- /rowItemContent -->' ;
									echo '</div><!-- /rowItem -->';
							echo '</div><!-- /boldRow -->';
						echo '</div><!-- boldCellInner -->';	
					echo '</div><!-- boldCell -->';			
				echo '</div><!-- port -->';
			echo '</section>';
		}
		
	}
}

/* Add muted to video */

/*function cliniq_video_shortcode_filter( $output, $atts, $video, $post_id, $library ) {
	var_dump( $atts['autoplay'] );
	$output = $atts['autoplay'] != 'on' ? $output : str_replace( '<video', '<video muted', $output );
	return $output;
}

add_filter( 'wp_video_shortcode', 'cliniq_video_shortcode_filter', 10, 5 );*/