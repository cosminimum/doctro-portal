<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

require_once plugin_dir_path( dirname( __DIR__ ) ) . 'includes/class-aiko-developer-core.php';

class Aiko_Developer_Ajax_Framework {
	public function __construct() {
		if ( class_exists( 'Aiko_Developer_Core_Lite' ) ) {
			$this->core = new Aiko_Developer_Core_Lite();
		} elseif ( class_exists( 'Aiko_Developer_Core' ) ) {
			$this->core = new Aiko_Developer_Core();
		}
	}

	public function aiko_developer_handle_download_zip() {
		if ( isset( $_POST['php_code'], $_POST['js_code'], $_POST['css_code'], $_POST['post_id'] ) ) {
			if ( ! isset( $_POST['nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['nonce'] ) ), 'aiko_developer_nonce' )
			|| ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) ) {
				wp_send_json_error( 'error-unauthorized-access' );
				wp_die();
			}

			if ( ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) || ! $this->core->get_aiko_developer_is_user_admin() ) {
				wp_send_json_error( 'error-unauthorized-access' );
				wp_die();
			}

			$php_code  = $this->core->get_aiko_developer_sanitize_from_post( $_POST, 'php_code' );
			if ( $this->core->get_aiko_developer_is_code_not_allowed( $php_code ) ) {
				wp_send_json_error( 'error-restricted-code' );
			}
			$js_code   = $this->core->get_aiko_developer_sanitize_from_post( $_POST, 'js_code' );
			$css_code  = $this->core->get_aiko_developer_sanitize_from_post( $_POST, 'css_code' );
			$post_id   = intval( sanitize_text_field( wp_unslash( $_POST['post_id'] ) ) );
			$post      = get_post( $post_id );
			$post_slug = sanitize_title( $post->post_name );

			$upload_dir = wp_upload_dir();
			$zip_path   = $upload_dir['path'] . '/' . $post_slug . '.zip';
			$zip_url    = $upload_dir['url'] . '/' . $post_slug . '.zip';

			if ( wp_parse_url( home_url(), PHP_URL_SCHEME ) !== wp_parse_url( $zip_url, PHP_URL_SCHEME ) ) {
				$zip_url = str_replace( wp_parse_url( $zip_url, PHP_URL_SCHEME ) . '://', wp_parse_url( home_url(), PHP_URL_SCHEME ) . '://', $zip_url );
			}

			$php_file = $upload_dir['path'] . '/plugin-file.php';
			$js_file  = $upload_dir['path'] . '/plugin-scripts.js';
			$css_file = $upload_dir['path'] . '/plugin-styles.css';

			global $wp_filesystem;

			if ( empty( $wp_filesystem ) ) {
				WP_Filesystem();
			}

			$wp_filesystem->put_contents( $php_file, $php_code, FS_CHMOD_FILE );
			$wp_filesystem->put_contents( $js_file, $js_code, FS_CHMOD_FILE );
			$wp_filesystem->put_contents( $css_file, $css_code, FS_CHMOD_FILE );

			$zip = new ZipArchive();
			if ( true === $zip->open( $zip_path, ZipArchive::CREATE ) ) {
				$zip->addFile( $php_file, 'plugin-file.php' );
				$zip->addFile( $js_file, 'plugin-scripts.js' );
				$zip->addFile( $css_file, 'plugin-styles.css' );
				$zip->close();

				wp_delete_file( $php_file );
				wp_delete_file( $js_file );
				wp_delete_file( $css_file );

				wp_send_json_success( $zip_url );
			} else {
				wp_send_json_error( 'error-zip-fail' );
			}
		} else {
			wp_send_json_error( 'error-isset-post' );
		}

		wp_die();
	}

	public function aiko_developer_handle_edit() {
		if ( isset( $_POST['edited'], $_POST['type'], $_POST['post_id'] ) ) {
			if ( ! isset( $_POST['nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['nonce'] ) ), 'aiko_developer_nonce' )
			|| ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) ) {
				wp_send_json_error( 'error-unauthorized-access' );
				wp_die();
			}

			if ( ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) || ! $this->core->get_aiko_developer_is_user_admin() ) {
				wp_send_json_error( 'error-unauthorized-access' );
				wp_die();
			}

			$type    = sanitize_text_field( wp_unslash( $_POST['type'] ) );
			$post_id = intval( sanitize_text_field( wp_unslash( $_POST['post_id'] ) ) );

			if ( 'functional-requirements' !== $type ) {
				$edited	= $this->core->get_aiko_developer_sanitize_from_post( $_POST, 'edited' );
				$edited = str_replace( '\\', '\\\\', $edited );
				if ( 'php' === $type ) {
					if ( $this->core->get_aiko_developer_is_code_not_allowed( $edited ) ) {
						wp_send_json_error( 'error-restricted-code' );
					}
				}
				update_post_meta( $post_id, '_' . $type . '_output', $edited );
				update_post_meta( $post_id, '_outdated_flag', true );
			} else {
				$edited                      = $this->core->get_aiko_developer_sanitize_from_post( $_POST, 'edited' );
				$edited                      = str_replace( '\\', '\\\\', $edited );
				$old_functional_requirements = get_post_meta( $post_id, '_functional_requirements', true );
				if ( empty( get_post_meta( $post_id, '_old_functional_requirements', true ) ) && ! empty( $old_functional_requirements ) && $old_functional_requirements !== $edited ) {
					update_post_meta( $post_id, '_old_functional_requirements', $old_functional_requirements );
				}
				update_post_meta( $post_id, '_functional_requirements', $edited );
				update_post_meta( $post_id, '_improvements', 'Functional Requirements were manualy edited.' );
				if ( $old_functional_requirements !== $edited ) {
					update_post_meta( $post_id, '_code_not_generated', true );
				}
			}

			wp_send_json_success( 'success-edit' );
		} else {
			wp_send_json_error( 'error-isset-post' );
		}

		wp_die();
	}

	public function aiko_developer_handle_submit_rephrased() {
		if ( isset( $_POST['functional_requirements'], $_POST['post_id'] ) ) {
			if ( ! isset( $_POST['nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['nonce'] ) ), 'aiko_developer_nonce' )
			|| ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) ) {
				wp_send_json_error( 'error-unauthorized-access' );
				wp_die();
			}

			if ( ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) || ! $this->core->get_aiko_developer_is_user_admin() ) {
				wp_send_json_error( 'error-unauthorized-access' );
				wp_die();
			}

			$post_id                     = intval( sanitize_text_field( wp_unslash( $_POST['post_id'] ) ) );
			$old_functional_requirements = get_post_meta( $post_id, '_functional_requirements', true );
			$functional_requirements     = sanitize_textarea_field( wp_unslash( $_POST['functional_requirements'] ) );
			if ( empty( get_post_meta( $post_id, '_old_functional_requirements', true ) ) && ! empty( $old_functional_requirements ) && $old_functional_requirements !== $functional_requirements ) {
				update_post_meta( $post_id, '_old_functional_requirements', $old_functional_requirements );
			}
			update_post_meta( $post_id, '_functional_requirements', $functional_requirements );
			update_post_meta( $post_id, '_code_not_generated', true );
			wp_send_json_success(
				array(
					'code'      => 'success-rephrase',
				)
			);
		} else {
			wp_send_json_error( 'error-isset-post' );
		}
		wp_die();
	}
}
