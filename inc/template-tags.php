<?php
/**
 *	Archive Title
 */
if(!function_exists('illdy_archive_title')) {
	function illdy_archive_title( $before = '', $after = '' ) {
		if ( is_category() ) {
			$title = sprintf( __( '%s', 'qi-theme' ), single_cat_title( '', false ) );
		} elseif ( is_tag() ) {
			$title = sprintf( __( 'تاغ: %s', 'qi-theme' ), single_tag_title( '', false ) );
		} elseif ( is_author() ) {
			$title = sprintf( __( 'الكاتب: %s', 'qi-theme' ), '<span class="vcard">' . get_the_author() . '</span>' );
		} elseif ( is_year() ) {
			$title = sprintf( __( 'السنة: %s', 'qi-theme' ), get_the_date( esc_html_x( 'Y', 'yearly archives date format', 'qi-theme' ) ) );
		} elseif ( is_month() ) {
			$title = sprintf( __( 'الشهر: %s', 'qi-theme' ), get_the_date( esc_html_x( 'F Y', 'monthly archives date format', 'qi-theme' ) ) );
		} elseif ( is_day() ) {
			$title = sprintf( __( 'اليوم: %s', 'qi-theme' ), get_the_date( esc_html_x( 'F j, Y', 'daily archives date format', 'qi-theme' ) ) );
		} elseif ( is_tax( 'post_format' ) ) {
			if ( is_tax( 'post_format', 'post-format-aside' ) ) {
				$title = esc_html_x( 'Asides', 'post format archive title', 'qi-theme' );
			} elseif ( is_tax( 'post_format', 'post-format-gallery' ) ) {
				$title = esc_html_x( 'Galleries', 'post format archive title', 'qi-theme' );
			} elseif ( is_tax( 'post_format', 'post-format-image' ) ) {
				$title = esc_html_x( 'Images', 'post format archive title', 'qi-theme' );
			} elseif ( is_tax('post_format', 'post-format-video' ) ) {
				$title = esc_html_x( 'Videos', 'post format archive title', 'qi-theme' );
			} elseif ( is_tax( 'post_format', 'post-format-quote' ) ) {
				$title = esc_html_x( 'Quotes', 'post format archive title', 'qi-theme' );
			} elseif ( is_tax( 'post_format', 'post-format-link' ) ) {
				$title = esc_html_x( 'Links', 'post format archive title', 'qi-theme' );
			} elseif ( is_tax( 'post_format', 'post-format-status') ) {
				$title = esc_html_x( 'Statuses', 'post format archive title', 'qi-theme' );
			} elseif ( is_tax( 'post_format', 'post-format-audio' ) ) {
				$title = esc_html_x( 'Audio', 'post format archive title', 'qi-theme' );
			} elseif ( is_tax( 'post_format', 'post-format-chat' ) ) {
				$title = esc_html_x( 'Chats', 'post format archive title', 'qi-theme' );
			}
		} elseif ( is_post_type_archive() ) {
			$title = sprintf( __( 'أرشيف: %s', 'qi-theme' ), post_type_archive_title( '', false ) );
		} elseif ( is_tax() ) {
			$tax = get_taxonomy(get_queried_object()->taxonomy);
			/* translators: 1: Taxonomy singular name, 2: Current taxonomy term */
			$title = sprintf(__('%1$s', 'qi-theme'), single_term_title('', false));
		} elseif ( is_search() ) {
			$title = sprintf(__('بحث عن : %1$s','qi-theme'),get_search_query());
		} else {
			$title = __( 'الأرشيف', 'qi-theme' );
		}

		/**
		* Filter the archive title.
		*
		* @param string $title Archive title to be displayed.
		*/
		$title = apply_filters('get_the_archive_title', $title);

		if (!empty($title)) {
			echo $before . $title . $after;  // WPCS: XSS OK.
		}
	}
}


/**
 *	Archive Description
 */
if(!function_exists('illdy_archive_description')) {
	function illdy_archive_description( $before = '', $after = '' ) {
		$description = apply_filters( 'get_the_archive_description', term_description() );
		if ( !empty( $description ) ) {
			echo $before . $description . $after;
		}
	}
}
