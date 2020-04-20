<?php
/**
 * Helper functions.
 *
 * @since 1.0.0
 * @package refresh-blog
 */

if ( ! function_exists( 'refresh_blog_custom_logo' ) ) :
	/**
	 * Custom Logo
	 *
	 * @since 1.0.0
	 */
	function refresh_blog_custom_logo() {

		if ( function_exists( 'the_custom_logo' ) ) {
			the_custom_logo();
		}

	}
endif;

if ( ! function_exists( 'refresh_blog_menu_fallback_cb' ) ) :

	/**
	 * Fallback for primary navigation.
	 *
	 * @since 1.0.0
	 */
	function refresh_blog_menu_fallback_cb( $args ) {
		if ( ! current_user_can( 'edit_theme_options' ) ) {
			return;
		}

		switch ( $args['theme_location'] ) {
			case 'primary':
				$label = __( 'Add primary menu', 'refresh-blog' );
				break;
			case 'social':
				$label = __( 'Add social menu', 'refresh-blog' );
				break;
			case 'topleft':
				$label = __( 'Add top left menu', 'refresh-blog' );
				break;
			default:
				$label = __( 'Add a menu', 'refresh-blog' );
				break;
		}
		// see wp-includes/nav-menu-template.php for available arguments.
		$link = '<a href="' . esc_url( admin_url( 'nav-menus.php' ) ) . '">' . $args['link_before'] . $args['before'] . esc_html( $label ) . $args['after'] . $args['link_after'] . '</a>';

		if ( false !== stripos( $args['items_wrap'], '<ul' ) || false !== stripos( $args['items_wrap'], '<ol' )
		) {
			$link = "<li>$link</li>";
		}
		$output = sprintf( $args['items_wrap'], $args['menu_id'], $args['menu_class'], $link );
		if ( ! empty( $args['container'] ) ) {
			$output = sprintf( '<%1$s class="%2$s" id="%3$s">%4$s</%1$s>', $args['container'], $args['container_class'], $args['container_id'], $output );
		}
		if ( $args['echo'] ) {
			echo $output;
		}
		return $output;
	}

endif;

if ( ! function_exists( 'refresh_blog_strings' ) ) {
	/**
	 * Return All Theme Strings.
	 *
	 * @since 1.0.0
	 *
	 * Return Array of Strings.
	 */
	function refresh_blog_strings() {
		$strings = array(
			'enable'     => __( 'Enable', 'refresh-blog' ),
			'contact_no' => __( 'Contact Number', 'refresh-blog' ),
		);

		return apply_filters( 'refresh_blog_filter_strings', $strings );
	}
}


if ( ! function_exists( 'refresh_blog_get_post_thumbnail' ) ) {
	/**
	 * Return Post Thumbnails.
	 *
	 * @since 1.0.0
	 *
	 * @return Array of Strings.
	 */
	function refresh_blog_get_post_thumbnail( $post_id, $image_size = 'thumbnail' ) {
		if ( ! $post_id ) {
			global $post;
			$post_id = $post->ID;
		}

		$thumbnail_id = get_post_thumbnail_id( $post_id );
		if ( $thumbnail_id && ! is_page( $post_id ) ) { // Only for post
			return get_the_post_thumbnail( $post_id, $image_size );
		} elseif ( refresh_blog_get_header_image() ) {

			return refresh_blog_get_header_image();
		}

		// default image;
		return refresh_blog_get_default_thumbnail();

	}
}

if ( ! function_exists( 'refresh_blog_get_post_thumbnail_url' ) ) {
	/**
	 * Return Post Thumbnails.
	 *
	 * @since 1.0.0
	 *
	 * @return Array of Strings.
	 */
	function refresh_blog_get_post_thumbnail_url( $post_id, $image_size = 'thumbnail', $default_src = '', $return_header_image_if_no_thumbnail = true ) {
		if ( ! $post_id ) {
			global $post;
			$post_id = $post->ID;
		}

		$thumbnail_id = get_post_thumbnail_id( $post_id );
		if ( $thumbnail_id && ! is_page( $post_id ) && get_the_post_thumbnail_url( $post_id, $image_size ) ) { // Only for post
			return get_the_post_thumbnail_url( $post_id, $image_size );
		}

		if ( is_page() && $return_header_image_if_no_thumbnail ) {
			return refresh_blog_get_header_image( true, $default_src, false );
		}
		
		// default image;
		return refresh_blog_get_default_thumbnail( true, $default_src );
	}
}

if ( ! function_exists( 'refresh_blog_get_default_thumbnail' ) ) {
	/**
	 * Return Default Thumbnail image.
	 *
	 * @since 1.0.0
	 *
	 * @return HTML.
	 */
	function refresh_blog_get_default_thumbnail( $return_url = false, $src = '' ) {
		if ( ! $src ) {
			$src = sprintf( '%s/assets/images/default-header.jpg', get_template_directory_uri() );
		}
		if ( $return_url ) {
			return $src;
		}
		return sprintf( '<img src="%s" >', esc_url( $src ) );
	}
}

if ( ! function_exists( 'refresh_blog_get_header_image' ) ) {
	/**
	 * Return Header image.
	 *
	 * @since 1.0.0
	 *
	 * @return HTML.
	 */
	function refresh_blog_get_header_image( $return_url = false, $default_src = '', $return_default_if_no_header = true ) {
		$header_image = get_header_image();
		if ( $header_image ) {
			if ( $return_url ) {
				return $header_image; // return src.
			}
			return sprintf( '<img src="%s" >', $header_image );
		}

		$header_images = get_uploaded_header_images();
		if ( $return_default_if_no_header && ( empty( $header_images ) || empty( $header_image ) ) ) {

			if ( $return_url ) {
				return refresh_blog_get_default_thumbnail( true, $default_src ); // return src.
			}
			// Return default thumbnail.
			return refresh_blog_get_default_thumbnail( false, $default_src );
		}
		return false;
	}
}

if ( ! function_exists( 'refresh_blog_has_woocommerce' ) ) :

	/**
	 * Check if WooCommerce exists.
	 *
	 * @since 1.0.2
	 *
	 * @return bool Active status.
	 */
	function refresh_blog_has_woocommerce() {
		if ( class_exists( 'WooCommerce' ) ) {
			return true;
		}
		return false;
	}

endif;
