<?php

/**
 * Plugin Name: Cliniq Plugin
 * Description: Shortcodes and widgets by BoldThemes.
 * Version: 1.1.5
 * Author: BoldThemes
 * Author URI: http://bold-themes.com
 * Text Domain: bt_plugin 
 */

require_once( 'framework_bt_plugin/framework.php' );

$bt_plugin_dir = plugin_dir_path( __FILE__ );

function bt_load_plugin_textdomain() {

	$domain = 'bt_plugin';
	$locale = apply_filters( 'plugin_locale', get_locale(), $domain );

	load_plugin_textdomain( $domain, false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );

}
add_action( 'init', 'bt_load_plugin_textdomain' );

function bt_widget_areas() {
	register_sidebar( array (
		'name' 			=> esc_html__( 'Header Left Widgets', 'bt_plugin' ),
		'id' 			=> 'header_left_widgets',
		'before_widget' => '<div class="btTopBox %2$s">', 
		'after_widget' 	=> '</div>'
	));
	register_sidebar( array (
		'name' 			=> esc_html__( 'Header Right Widgets', 'bt_plugin' ),
		'id' 			=> 'header_right_widgets',
		'before_widget' => '<div class="btTopBox %2$s">',
		'after_widget' 	=> '</div>'
	));
	register_sidebar( array (
		'name' 			=> esc_html__( 'Header Menu Widgets', 'bt_plugin' ),
		'id' 			=> 'header_menu_widgets',
		'before_widget' => '<div class="btTopBox %2$s">',
		'after_widget' 	=> '</div>'
	));
	register_sidebar( array (
		'name' 			=> esc_html__( 'Header Logo Widgets', 'bt_plugin' ),
		'id' 			=> 'header_logo_widgets',
		'before_widget' => '<div class="btTopBox %2$s">',
		'after_widget' 	=> '</div>'
	));
	register_sidebar( array (
		'name' 			=> esc_html__( 'Footer Widgets', 'bt_plugin' ),
		'id' 			=> 'footer_widgets',
		'before_widget' => '<div class="btBox %2$s">',
		'after_widget' 	=> '</div>',
		'before_title' 	=> '<h4><span>',
		'after_title' 	=> '</span></h4>',
	));
}
add_action( 'widgets_init', 'bt_widget_areas', 30 );

/* Portfolio */

if ( ! function_exists( 'bt_create_portfolio' ) ) {
	function bt_create_portfolio() {
		register_post_type( 'portfolio',
			array(
				'labels' => array(
					'name'          => __( 'Portfolio', 'bt_plugin' ),
					'singular_name' => __( 'Portfolio Item', 'bt_plugin' )
				),
				'public'        => true,
				'has_archive'   => true,
				'menu_position' => 5,
				'supports'      => array( 'title', 'editor', 'thumbnail', 'author', 'comments', 'excerpt' ),
				'rewrite'       => array( 'with_front' => false, 'slug' => 'portfolio' )
			)
		);
		register_taxonomy( 'portfolio_category', 'portfolio', array( 'hierarchical' => true, 'label' => __( 'Portfolio Categories', 'bt_plugin' ) ) );
	}
}
add_action( 'init', 'bt_create_portfolio' );

if ( ! function_exists( 'bt_rewrite_flush' ) ) {
	function bt_rewrite_flush() {
		// First, we "add" the custom post type via the above written function.
		// Note: "add" is written with quotes, as CPTs don't get added to the DB,
		// They are only referenced in the post_type column with a post entry, 
		// when you add a post of this CPT.
		bt_create_portfolio();

		// ATTENTION: This is *only* done during plugin activation hook in this example!
		// You should *NEVER EVER* do this on every page load!!
		flush_rewrite_rules();
	}
}
register_activation_hook( __FILE__, 'bt_rewrite_flush' );



/* BB BUTTON */

if ( ! class_exists( 'BB_Button_Widget' ) ) {

	class BB_Button_Widget extends WP_Widget {

		function __construct() {
			parent::__construct(
				'bb_button_widget', // Base ID
				__( 'BB Button', 'bt_plugin' ), // Name
				array( 
					'description' => __( 'Button with icon, text and link.', 'bt_plugin' ), 
					'classname' => 'widget_bb_button_widget' 
				) 
			);
		}

		public function widget( $args, $instance ) {

			$icon = ! empty( $instance['icon'] ) ? $instance['icon'] : '';
			$text = ! empty( $instance['text'] ) ? $instance['text'] : '';
			$url = ! empty( $instance['url'] ) ? $instance['url'] : '';
			$target = ! empty( $instance['target'] ) ? $instance['target'] : '_self';
			$size = ! empty( $instance['size'] ) ? $instance['size'] : 'medium';
			$icon_position = ! empty( $instance['icon_position'] ) ? $instance['icon_position'] : 'left';
			$style = ! empty( $instance['style'] ) ? $instance['style'] : 'filled';
			$color_scheme = ! empty( $instance['color_scheme'] ) ? $instance['color_scheme'] : 'accent-light';
			$icon_color_scheme = ! empty( $instance['icon_color_scheme'] ) ? $instance['icon_color_scheme'] : '';
			$extra_class = ! empty( $instance['extra_class'] ) ? $instance['extra_class'] : '';

			$extra_class = array( $extra_class );
			$extra_style = '';
			
			if ( $style == 'outline' ) {
				$extra_class[] = 'bt_bb_style_outline';
			} else if ( $style == 'filled' ) {
				$extra_class[] = ' bt_bb_style_filled';
			} else if ( $style == 'clean' ) {
				$extra_class[] = ' bt_bb_style_clean';
			} else if ( $style == 'special_outline' ) {
				$extra_class[] = ' bt_bb_style_special_outline';
			}

			if ( $icon_position == 'left' ) {
				$extra_class[] = ' bt_bb_icon_position_left';
			} else if ( $icon_position == 'right' ) {
				$extra_class[] = ' bt_bb_icon_position_right';
			}

			if ( $size == 'small' ) {
				$extra_class[] = ' bt_bb_size_small';
			} else if ( $size == 'medium' ) {
				$extra_class[] = ' bt_bb_size_medium';
			} else if ( $size == 'normal' ) {
				$extra_class[] = ' bt_bb_size_normal';
			} else if ( $size == 'large' ) {
				$extra_class[] = ' bt_bb_size_large';
			}


			if ( $color_scheme == 'dark-skin' ) {
				$extra_class[] = ' bt_bb_color_scheme_1';
				$extra_style .= '--primary-color: var(--dark-font-color); --secondary-color: var(--dark-bg-color); ';
			} else if ( $color_scheme == 'light-skin' ) {
				$extra_class[] = ' bt_bb_color_scheme_2';
				$extra_style .= '--primary-color: var(--light-font-color); --secondary-color: var(--light-bg-color); ';
			} else if ( $color_scheme == 'accent-light-skin' ) {
				$extra_class[] = ' bt_bb_color_scheme_3';
				$extra_style .= '--primary-color: var(--accent-color); --secondary-color: var(--dark-bg-color); ';
			} else if ( $color_scheme == 'accent-dark-skin' ) {
				$extra_class[] = ' bt_bb_color_scheme_4';
				$extra_style .= '--primary-color: var(--accent-color); --secondary-color: var(--light-bg-color); ';
			} else if ( $color_scheme == 'light-accent-skin' ) {
				$extra_class[] = ' bt_bb_color_scheme_5';
				$extra_style .= '--primary-color: var(--light-font-color); --secondary-color: var(--accent-color); ';
			} else if ( $color_scheme == 'dark-accent-skin' ) {
				$extra_class[] = ' bt_bb_color_scheme_6';
				$extra_style .= '--primary-color: var(--dark-font-color); --secondary-color: var(--accent-color); ';
			} else if ( $color_scheme == 'alternate-light-skin' ) {
				$extra_class[] = ' bt_bb_color_scheme_7';
				$extra_style .= '--primary-color: var(--alternate-color); --secondary-color: var(--dark-bg-color); ';
			} else if ( $color_scheme == 'alternate-dark-skin' ) {
				$extra_class[] = ' bt_bb_color_scheme_8';
				$extra_style .= '--primary-color: var(--alternate-color); --secondary-color: var(--light-bg-color); ';
			} else if ( $color_scheme == 'light-alternate-skin' ) {
				$extra_class[] = ' bt_bb_color_scheme_9';
				$extra_style .= '--primary-color: var(--light-font-color); --secondary-color: var(--alternate-color); ';
			} else if ( $color_scheme == 'dark-alternate-skin' ) {
				$extra_class[] = ' bt_bb_color_scheme_10';
				$extra_style .= '--primary-color: var(--dark-font-color); --secondary-color: var(--alternate-color); ';
			} else if ( $color_scheme == 'alternate-accent-skin' ) {
				$extra_class[] = ' bt_bb_color_scheme_11';
				$extra_style .= '--primary-color: var(--alternate-color); --secondary-color: var(--accent-color); ';
			} else if ( $color_scheme == 'accent-alternate-skin' ) {
				$extra_class[] = ' bt_bb_color_scheme_12';
				$extra_style .= '--primary-color: var(--accent-color); --secondary-color: var(--alternate-color); ';
			} else if ( $color_scheme == 'gray-background' ) {
				$extra_class[] = ' bt_bb_color_scheme_13';
				$extra_style .= '--primary-color: var(--light-color); --secondary-color: var(--gray-color); ';
			} else if ( $color_scheme == 'accent-lightblue-skin' ) {
				$extra_class[] = ' bt_bb_color_scheme_14';
				$extra_style .= '--primary-color: var(--accent-color); --secondary-color: #f3fcff; ';
			} else if ( $color_scheme == 'alternate-lightblue-skin' ) {
				$extra_class[] = ' bt_bb_color_scheme_15';
				$extra_style .= '--primary-color: var(--alternate-color); --secondary-color: #f3fcff; ';
			} else if ( $color_scheme == 'gray-accent-skin' ) {
				$extra_class[] = ' bt_bb_color_scheme_16';
				$extra_style .= '--primary-color: #a0a0a0; --secondary-color: var(--accent-color); ';
			} else if ( $color_scheme == 'alternate-gray-skin' ) {
				$extra_class[] = ' bt_bb_color_scheme_17';
				$extra_style .= '--primary-color: var(--alternate-color); --secondary-color: #a0a0a0; ';
			}

			if ( $icon_color_scheme == 'dark-skin' ) {
				$extra_class[] = ' bt_bb_icon_color_scheme_1';
			} else if ( $icon_color_scheme == 'light-skin' ) {
				$extra_class[] = ' bt_bb_icon_color_scheme_2';
			} else if ( $icon_color_scheme == 'accent-light-skin' ) {
				$extra_class[] = ' bt_bb_icon_color_scheme_3';
			} else if ( $icon_color_scheme == 'accent-dark-skin' ) {
				$extra_class[] = ' bt_bb_icon_color_scheme_4';
			} else if ( $icon_color_scheme == 'light-accent-skin' ) {
				$extra_class[] = ' bt_bb_icon_color_scheme_5';
			} else if ( $icon_color_scheme == 'dark-accent-skin' ) {
				$extra_class[] = ' bt_bb_icon_color_scheme_6';
			} else if ( $icon_color_scheme == 'alternate-light-skin' ) {
				$extra_class[] = ' bt_bb_icon_color_scheme_7';
			} else if ( $icon_color_scheme == 'alternate-dark-skin' ) {
				$extra_class[] = ' bt_bb_icon_color_scheme_8';
			} else if ( $icon_color_scheme == 'light-alternate-skin' ) {
				$extra_class[] = ' bt_bb_icon_color_scheme_9';
			} else if ( $icon_color_scheme == 'dark-alternate-skin' ) {
				$extra_class[] = ' bt_bb_icon_color_scheme_10';
			} else if ( $icon_color_scheme == 'alternate-accent-skin' ) {
				$extra_class[] = ' bt_bb_icon_color_scheme_11';
			} else if ( $icon_color_scheme == 'accent-alternate-skin' ) {
				$extra_class[] = ' bt_bb_icon_color_scheme_12';
			} else if ( $icon_color_scheme == 'gray-background' ) {
				$extra_class[] = ' bt_bb_icon_color_scheme_13';
			} else if ( $icon_color_scheme == 'accent-lightblue-skin' ) {
				$extra_class[] = ' bt_bb_icon_color_scheme_14';
			} else if ( $icon_color_scheme == 'alternate-lightblue-skin' ) {
				$extra_class[] = ' bt_bb_icon_color_scheme_15';
			} else if ( $icon_color_scheme == 'gray-accent-skin' ) {
				$extra_class[] = ' bt_bb_icon_color_scheme_16';
			} else if ( $icon_color_scheme == 'alternate-gray-skin' ) {
				$extra_class[] = ' bt_bb_icon_color_scheme_17';
			}


			if ( $icon != '' && $icon != 'no_icon' ) {
				$extra_class[] = ' btWithIcon';
			}
			if ( $icon == 'arrow_e900' ) {
				$extra_class[] = ' btWithArrow';
			}


			$wrap_start_tag = '<div class="bt_bb_button ' . esc_attr( implode( ' ', $extra_class ) ) . '">';
			$wrap_end_tag = '</div>';

			if ( $url != '' ) {
				$extra_class[] = ' btWithLink';
				if ( $url != '' && $url != '#' && substr( $url, 0, 4 ) != 'http' && substr( $url, 0, 5 ) != 'https'  && substr( $url, 0, 6 ) != 'mailto' ) {
					$link = boldthemes_get_permalink_by_slug( $url );
				} else {
					$link = $url;
				}
				$wrap_start_tag = '<div class="btButtonWidget bt_bb_button bt_bb_width_inline bt_bb_shape_inherit  bt_bb_align_inherit ' . esc_attr( implode( $extra_class ) ) . '" style="' . esc_attr( $extra_style  ) . '"><a href="' . esc_url( $link ) . '" target="' . esc_attr( $target ) . '" class="bt_bb_link">';
				$wrap_end_tag = '</a></div>';
			} else {
				$wrap_start_tag = '<div class="btButtonWidget bt_bb_button bt_bb_width_inline bt_bb_shape_inherit  bt_bb_align_inherit ' . esc_attr( implode( $extra_class ) ) . '" style="' . esc_attr( $extra_style  ) . '"><a href="#" target="' . esc_attr( $target ) . '" class="bt_bb_link">';
				$wrap_end_tag = '</a></div>';
			}

			


			echo $wrap_start_tag;
				if ( $text != '' ) {
					echo '<span class="bt_bb_button_text">' . $text . '</span>';
				}
				if ( $icon != '' && $icon != 'no_icon' ) {
					echo bt_bb_icon::get_html( $icon );
				}
			echo $wrap_end_tag;
		}

		public function form( $instance ) {
			$icon = ! empty( $instance['icon'] ) ? $instance['icon'] : '';
			$text = ! empty( $instance['text'] ) ? $instance['text'] : '';
			$url = ! empty( $instance['url'] ) ? $instance['url'] : '';
			$target = ! empty( $instance['target'] ) ? $instance['target'] : '';
			$size = ! empty( $instance['size'] ) ? $instance['size'] : 'medium';
			$icon_position = ! empty( $instance['icon_position'] ) ? $instance['icon_position'] : 'left';
			$style = ! empty( $instance['style'] ) ? $instance['style'] : 'filled';
			$color_scheme = ! empty( $instance['color_scheme'] ) ? $instance['color_scheme'] : 'accent-light';
			$icon_color_scheme = ! empty( $instance['icon_color_scheme'] ) ? $instance['icon_color_scheme'] : '';
			$extra_class = ! empty( $instance['extra_class'] ) ? $instance['extra_class'] : '';
			

			if ( function_exists( 'boldthemes_get_icon_fonts_bb_array' ) ) {
				$icon_arr = boldthemes_get_icon_fonts_bb_array();
			} else {
				require_once( dirname(__FILE__) . '/../../content_elements_misc/fa_icons.php' );
				require_once( dirname(__FILE__) . '/../../content_elements_misc/s7_icons.php' );
				$icon_arr = array( 'Font Awesome' => bt_bb_fa_icons(), 'S7' => bt_bb_s7_icons() );
			}

			$clear_display = $icon != '' ? 'block' : 'none';
			
			$icon_set = '';
			$icon_code = '';
			$icon_name = '';

			if ( $icon != '' ) {
				$icon_set = substr( $icon, 0, -5 );
				$icon_code = substr( $icon, -4 );
				$icon_code = '&#x' . $icon_code;
				foreach( $icon_arr as $k => $v ) {
					foreach( $v as $k_inner => $v_inner ) {
						if ( $icon == $v_inner ) {
							$icon_name = $k_inner;
						}
					}
				}
			}


			?>
			<div class="bt_bb_iconpicker_widget_container">
				<label for="<?php echo esc_attr( $this->get_field_id( 'icon' ) ); ?>"><?php _e( 'Icon:', 'bt_plugin' ); ?></label>
				<div class="bt_bb_iconpicker">
					<input type="hidden" id="<?php echo esc_attr( $this->get_field_id( 'icon' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'icon' ) ); ?>" value="<?php echo esc_attr( $icon ); ?>">
					<div class="bt_bb_iconpicker_select">
						<div class="bt_bb_icon_preview bt_bb_icon_preview_<?php echo $icon_set; ?>" data-icon="<?php echo $icon; ?>" data-icon-code="<?php echo $icon_code; ?>"></div>
						<div class="bt_bb_iconpicker_select_text"><?php echo $icon_name; ?></div>
						<i class="fa fa-close bt_bb_iconpicker_clear" style="display:<?php echo $clear_display; ?>"></i>
						<i class="fa fa-angle-down"></i>
					</div>
					<div class="bt_bb_iconpicker_filter_container">
						<input type="text" class="bt_bb_filter" placeholder="<?php _e( 'Filter...', 'bt_plugin' ); ?>">
					</div>
					<div class="bt_bb_iconpicker_icons">
						<?php
						$icon_content = '';
						foreach( $icon_arr as $k => $v ) {
							$icon_content .= '<div class="bt_bb_iconpicker_title">' . $k . '</div>';
							foreach( $v as $k_inner => $v_inner ) {
								$icon = $v_inner;
								$icon_set = substr( $icon, 0, -5 );
								$icon_code = substr( $icon, -4 );
								$icon_content .= '<div class="bt_bb_icon_preview bt_bb_icon_preview_' . esc_attr( $icon_set ) . '" data-icon="' . esc_attr( $icon ) . '" data-icon-code="&#x' . esc_attr( $icon_code ) . '" title="' . esc_attr( $k_inner ) . '"></div>';
							}
						}
						echo $icon_content;
						?>
					</div>
				</div>
			</div>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'text' ) ); ?>"><?php _e( 'Text:', 'bt_plugin' ); ?></label> 
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'text' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'text' ) ); ?>" type="text" value="<?php echo esc_attr( $text ); ?>">
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'size' ) ); ?>"><?php _e( 'Size:', 'bt_plugin' ); ?></label> 
				<select class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'size' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'size' ) ); ?>">
					<?php
					$style_arr = array("Small" => "small", "Medium" => "medium", "Normal" => "normal", "Large" => "large" );
					foreach( $style_arr as $key => $value ) {
						if ( $value == $size ) {
							echo '<option value="' . $value . '" selected>' . $key . '</option>';
						} else {
							echo '<option value="' . $value . '">' . $key . '</option>';
						}
					}
					?>
				</select>
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'icon_position' ) ); ?>"><?php _e( 'Icon Position:', 'bt_plugin' ); ?></label> 
				<select class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'icon_position' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'icon_position' ) ); ?>">
					<?php
					$style_arr = array("Left" => "left", "Right" => "right" );
					foreach( $style_arr as $key => $value ) {
						if ( $value == $icon_position ) {
							echo '<option value="' . $value . '" selected>' . $key . '</option>';
						} else {
							echo '<option value="' . $value . '">' . $key . '</option>';
						}
					}
					?>
				</select>
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'style' ) ); ?>"><?php _e( 'Style:', 'bt_plugin' ); ?></label> 
				<select class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'style' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'style' ) ); ?>">
					<?php
					$style_arr = array("Filled" => "filled", "Outline" => "outline", "Clean" => "clean", "Special Outline" => "special_outline" );
					foreach( $style_arr as $key => $value ) {
						if ( $value == $style ) {
							echo '<option value="' . $value . '" selected>' . $key . '</option>';
						} else {
							echo '<option value="' . $value . '">' . $key . '</option>';
						}
					}
					?>
				</select>
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'color_scheme' ) ); ?>"><?php _e( 'Color scheme:', 'bt_plugin' ); ?></label> 
				<select class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'color_scheme' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'color_scheme' ) ); ?>">
					<?php
					$color_scheme_arr = array("Light font, dark background" => "dark-skin", 
						"Dark font, light background" => "light-skin", 
						"Accent font, dark background" => "accent-light-skin", 
						"Accent font, light background" => "accent-dark-skin", 
						"Dark font, accent background" => "light-accent-skin",
						"Light font, accent background" => "dark-accent-skin",
						"Alternate font, dark background" => "alternate-light-skin",
						"Alternate font, light background" => "alternate-dark-skin",
						"Dark font, alternate background" => "light-alternate-skin",
						"Light font, alternate background" => "dark-alternate-skin",
						"Accent font, alternate background" => "alternate-accent-skin",
						"Alternate font, accent background" => "accent-alternate-skin",
						"Dark font, light gray background" => "gray-background",
						"Accent font, light blue background" => "accent-lightblue-skin",
						"Alternate font, light blue background" => "alternate-lightblue-skin",
						"Gray font, accent background" => "gray-accent-skin",
						"Alternate font, gray background" => "alternate-gray-skin" );
					foreach( $color_scheme_arr as $key => $value ) {
						if ( $value == $color_scheme ) {
							echo '<option value="' . $value . '" selected>' . $key . '</option>';
						} else {
							echo '<option value="' . $value . '">' . $key . '</option>';
						}
					}
					?>
				</select>
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'icon_color_scheme' ) ); ?>"><?php _e( 'Icon color scheme:', 'bt_plugin' ); ?></label> 
				<select class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'icon_color_scheme' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'icon_color_scheme' ) ); ?>">
					<?php
					$icon_color_scheme_arr = array("Inherit" => "",
						"Light font, dark background" => "dark-skin", 
						"Dark font, light background" => "light-skin", 
						"Accent font, dark background" => "accent-light-skin", 
						"Accent font, light background" => "accent-dark-skin", 
						"Dark font, accent background" => "light-accent-skin",
						"Light font, accent background" => "dark-accent-skin",
						"Alternate font, dark background" => "alternate-light-skin",
						"Alternate font, light background" => "alternate-dark-skin",
						"Dark font, alternate background" => "light-alternate-skin",
						"Light font, alternate background" => "dark-alternate-skin",
						"Accent font, alternate background" => "alternate-accent-skin",
						"Alternate font, accent background" => "accent-alternate-skin",
						"Dark font, light gray background" => "gray-background",
						"Accent font, light blue background" => "accent-lightblue-skin",
						"Alternate font, light blue background" => "alternate-lightblue-skin",
						"Gray font, accent background" => "gray-accent-skin",
						"Alternate font, gray background" => "alternate-gray-skin" );
					foreach( $icon_color_scheme_arr as $key => $value ) {
						if ( $value == $icon_color_scheme ) {
							echo '<option value="' . $value . '" selected>' . $key . '</option>';
						} else {
							echo '<option value="' . $value . '">' . $key . '</option>';
						}
					}
					?>
				</select>
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'url' ) ); ?>"><?php _e( 'URL or slug:', 'bt_plugin' ); ?></label> 
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'url' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'url' ) ); ?>" type="text" value="<?php echo esc_attr( $url ); ?>">
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'target' ) ); ?>"><?php _e( 'Target:', 'bt_plugin' ); ?></label> 
				<select class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'target' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'target' ) ); ?>">
					<?php
					$target_arr = array("Self" => "_self", "Blank" => "_blank", "Parent" => "_parent", "Top" => "_top");
					foreach( $target_arr as $key => $value ) {
						if ( $value == $target ) {
							echo '<option value="' . $value . '" selected>' . $key . '</option>';
						} else {
							echo '<option value="' . $value . '">' . $key . '</option>';
						}
					}
					?>
				</select>
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'extra_class' ) ); ?>"><?php _e( 'CSS extra class:', 'bt_plugin' ); ?></label> 
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'extra_class' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'extra_class' ) ); ?>" type="text" value="<?php echo esc_attr( $extra_class ); ?>">
			</p>
			<?php 
		}

		public function update( $new_instance, $old_instance ) {
			$instance = array();
			$instance['icon'] = ( ! empty( $new_instance['icon'] ) ) ? strip_tags( $new_instance['icon'] ) : '';
			$instance['text'] = ( ! empty( $new_instance['text'] ) ) ? strip_tags( $new_instance['text'] ) : '';
			$instance['url'] = ( ! empty( $new_instance['url'] ) ) ? strip_tags( $new_instance['url'] ) : '';
			$instance['target'] = ( ! empty( $new_instance['target'] ) ) ? strip_tags( $new_instance['target'] ) : '';
			$instance['style'] = ( ! empty( $new_instance['style'] ) ) ? strip_tags( $new_instance['style'] ) : '';
			$instance['size'] = ( ! empty( $new_instance['size'] ) ) ? strip_tags( $new_instance['size'] ) : '';
			$instance['icon_position'] = ( ! empty( $new_instance['icon_position'] ) ) ? strip_tags( $new_instance['icon_position'] ) : '';
			$instance['color_scheme'] = ( ! empty( $new_instance['color_scheme'] ) ) ? strip_tags( $new_instance['color_scheme'] ) : '';
			$instance['icon_color_scheme'] = ( ! empty( $new_instance['icon_color_scheme'] ) ) ? strip_tags( $new_instance['icon_color_scheme'] ) : '';
			$instance['extra_class'] = ( ! empty( $new_instance['extra_class'] ) ) ? strip_tags( $new_instance['extra_class'] ) : '';

			return $instance;
		}
	}	
}


/* BB DIVIDER */

if ( ! class_exists( 'BB_Divider_Widget' ) ) {

	class BB_Divider_Widget extends WP_Widget {

		function __construct() {
			parent::__construct(
				'bb_divider_widget', // Base ID
				__( 'BB Divider', 'bt_plugin' ), // Name
				array( 
					'description' => __( 'Divider', 'bt_plugin' ), 
					'classname' => 'widget_bb_divider_widget' 
				) 
			);
		}

		public function widget( $args, $instance ) {

			$left_spacing = ! empty( $instance['left_spacing'] ) ? $instance['left_spacing'] : 'normal';
			$right_spacing = ! empty( $instance['right_spacing'] ) ? $instance['right_spacing'] : 'normal';
			$border_style = ! empty( $instance['border_style'] ) ? $instance['border_style'] : '';
			$border_width = ! empty( $instance['border_width'] ) ? $instance['border_width'] : '';
			$extra_class = ! empty( $instance['extra_class'] ) ? $instance['extra_class'] : '';

			$extra_class = array( $extra_class );
			
			if ( $left_spacing == 'extra_small' ) {
				$extra_class[] = ' bt_bb_left_spacing_extra_small';
			} else if ( $left_spacing == 'small' ) {
				$extra_class[] = ' bt_bb_left_spacing_small';
			} else if ( $left_spacing == 'normal' ) {
				$extra_class[] = ' bt_bb_left_spacing_normal';
			} else if ( $left_spacing == 'large' ) {
				$extra_class[] = ' bt_bb_left_spacing_large';
			} else if ( $left_spacing == 'none' ) {
				$extra_class[] = ' ';
			}

			if ( $right_spacing == 'extra_small' ) {
				$extra_class[] = ' bt_bb_right_spacing_extra_small';
			} else if ( $right_spacing == 'small' ) {
				$extra_class[] = ' bt_bb_right_spacing_small';
			} else if ( $right_spacing == 'normal' ) {
				$extra_class[] = ' bt_bb_right_spacing_normal';
			} else if ( $right_spacing == 'large' ) {
				$extra_class[] = ' bt_bb_right_spacing_large';
			} else if ( $right_spacing == 'none' ) {
				$extra_class[] = ' ';
			}

			if ( $border_style == 'solid' ) {
				$extra_class[] = ' bt_bb_style_solid';
			} else if ( $border_style == 'dotted' ) {
				$extra_class[] = ' bt_bb_style_dotted';
			} else if ( $border_style == 'dashed' ) {
				$extra_class[] = ' bt_bb_style_dashed';
			} else if ( $border_style == 'none' ) {
				$extra_class[] = ' ';
			}

			if ( $border_width == '1px' ) {
				$extra_class[] = ' bt_bb_width_1px';
			} else if ( $border_width == '2px' ) {
				$extra_class[] = ' bt_bb_width_2px';
			} else if ( $border_width == '3px' ) {
				$extra_class[] = ' bt_bb_width_3px';
			} else if ( $border_width == 'none' ) {
				$extra_class[] = ' ';
			}

			$wrap_start_tag = '<div class="bt_bb_divider ' . esc_attr( implode( ' ', $extra_class ) ) . '">';
			$wrap_end_tag = '</div>';

			$wrap_start_tag = '<div class="bt_bb_divider ' . esc_attr( implode( $extra_class ) ) . '">';
			$wrap_end_tag = '</div>';


			echo $wrap_start_tag;
				if ( $border_width != 'none' ) {
					echo '<span class="bt_bb_divider_inner"></span>';
				}
			echo $wrap_end_tag;

			
		}

		public function form( $instance ) {
			$left_spacing = ! empty( $instance['left_spacing'] ) ? $instance['left_spacing'] : 'normal';
			$right_spacing = ! empty( $instance['right_spacing'] ) ? $instance['right_spacing'] : 'normal';
			$border_style = ! empty( $instance['border_style'] ) ? $instance['border_style'] : '';
			$border_width = ! empty( $instance['border_width'] ) ? $instance['border_width'] : '';
			$extra_class = ! empty( $instance['extra_class'] ) ? $instance['extra_class'] : '';


			?>
			
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'left_spacing' ) ); ?>"><?php _e( 'Left spacing:', 'bt_plugin' ); ?></label> 
				<select class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'left_spacing' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'left_spacing' ) ); ?>">
					<?php
					$style_arr = array("None" => "none", "Extra Small" => "extra_small", "Small" => "small", "Normal" => "normal", "Medium" => "medium", "Large" => "large" );
					foreach( $style_arr as $key => $value ) {
						if ( $value == $left_spacing ) {
							echo '<option value="' . $value . '" selected>' . $key . '</option>';
						} else {
							echo '<option value="' . $value . '">' . $key . '</option>';
						}
					}
					?>
				</select>
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'right_spacing' ) ); ?>"><?php _e( 'Right spacing:', 'bt_plugin' ); ?></label> 
				<select class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'right_spacing' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'right_spacing' ) ); ?>">
					<?php
					$style_arr = array("None" => "none", "Extra Small" => "extra_small", "Small" => "small", "Normal" => "normal", "Medium" => "medium", "Large" => "large" );
					foreach( $style_arr as $key => $value ) {
						if ( $value == $right_spacing ) {
							echo '<option value="' . $value . '" selected>' . $key . '</option>';
						} else {
							echo '<option value="' . $value . '">' . $key . '</option>';
						}
					}
					?>
				</select>
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'border_style' ) ); ?>"><?php _e( 'Border style:', 'bt_plugin' ); ?></label> 
				<select class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'border_style' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'border_style' ) ); ?>">
					<?php
					$style_arr = array("None" => "none", "Solid" => "solid", "Dotted" => "dotted", "Dashed" => "dashed" );
					foreach( $style_arr as $key => $value ) {
						if ( $value == $border_style ) {
							echo '<option value="' . $value . '" selected>' . $key . '</option>';
						} else {
							echo '<option value="' . $value . '">' . $key . '</option>';
						}
					}
					?>
				</select>
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'border_width' ) ); ?>"><?php _e( 'Border width:', 'bt_plugin' ); ?></label> 
				<select class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'border_width' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'border_width' ) ); ?>">
					<?php
					$style_arr = array("None" => "none", "1px" => "1px", "2px" => "2px", "3px" => "3px" );
					foreach( $style_arr as $key => $value ) {
						if ( $value == $border_width ) {
							echo '<option value="' . $value . '" selected>' . $key . '</option>';
						} else {
							echo '<option value="' . $value . '">' . $key . '</option>';
						}
					}
					?>
				</select>
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'extra_class' ) ); ?>"><?php _e( 'CSS extra class:', 'bt_plugin' ); ?></label> 
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'extra_class' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'extra_class' ) ); ?>" type="text" value="<?php echo esc_attr( $extra_class ); ?>">
			</p>
			<?php 
		}

		public function update( $new_instance, $old_instance ) {
			$instance = array();
			$instance['left_spacing'] = ( ! empty( $new_instance['left_spacing'] ) ) ? strip_tags( $new_instance['left_spacing'] ) : '';
			$instance['right_spacing'] = ( ! empty( $new_instance['right_spacing'] ) ) ? strip_tags( $new_instance['right_spacing'] ) : '';
			$instance['border_style'] = ( ! empty( $new_instance['border_style'] ) ) ? strip_tags( $new_instance['border_style'] ) : '';
			$instance['border_width'] = ( ! empty( $new_instance['border_width'] ) ) ? strip_tags( $new_instance['border_width'] ) : '';
			$instance['extra_class'] = ( ! empty( $new_instance['extra_class'] ) ) ? strip_tags( $new_instance['extra_class'] ) : '';

			return $instance;
		}
	}	
}


/* Register widgets */

if ( ! function_exists( 'cliniq_register_widgets' ) ) {
	function cliniq_register_widgets() {
		register_widget( 'BB_Divider_Widget' );
		register_widget( 'BB_Button_Widget' );
	}
}
add_action( 'widgets_init', 'cliniq_register_widgets' );


/**
 * Back To Top, shortcode - [bt_back_to_top back_to_top ="true" back_to_top_text="value"]
 */

if ( ! function_exists( 'cliniq_back_to_top' ) ) {
	function cliniq_back_to_top() {
		if ( boldthemes_get_option( 'back_to_top' ) ) {
			$back_to_top_html = do_shortcode( '[bt_back_to_top back_to_top="'. boldthemes_get_option( 'back_to_top' ).'" back_to_top_text="' . boldthemes_get_option( 'back_to_top_text' ) .  '"]' );
			echo $back_to_top_html;			
		}
	}
}

require_once( 'shortcodes/shortcodes.php' );