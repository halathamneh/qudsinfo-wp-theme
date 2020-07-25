<?php

namespace QITheme;

class Helpers
{
    public static function get_image_id($image_url)
    {
        global $wpdb;
        $attachment = $wpdb->get_col($wpdb->prepare("SELECT ID FROM $wpdb->posts WHERE guid='%s';", $image_url));
        return $attachment[0];
    }

    public static function view(string $template, array $vars = [])
    {
        extract($vars);
        include('views/' . $template . '.php');
    }

    public static function is_avi()
    {
        return is_page_template('page-templates/infos.php') ||
            is_page_template('page-templates/audio.php') || is_page_template('page-templates/videos.php') ||
            get_query_var('cat') != '';
    }

    public static function is_photos() {
        return is_page_template('page-templates/photos.php');
    }

    public static function is_lectures()
    {
        return basename(get_page_template()) === 'lectures.php';
    }

	/**
	 * Show Polylang Languages with Custom Markup
	 * @param  string $class Add custom class to the languages container
	 * @return string|void
	 */
	public static function polylang_languages( $class = '' ) {
		if ( ! function_exists( 'pll_the_languages' ) ) return;
		// Gets the pll_the_languages() raw code
		$languages = pll_the_languages( array(
			'hide_if_no_translation' => 1,
			'raw'                    => true
		) );
		$output = '';
		// Checks if the $languages is not empty
		if ( ! empty( $languages ) ) {
			// Creates the $output variable with languages container
			$output = '
			<div id="polylang-switch" class="widget-odd widget-first widget'. ( $class ? ' ' . $class : '' ) .'">
				<div class="widget-title"><h3>'.__("Language", "qi-theme").'</h3></div>
				<select name="lang_choice_polylang" id="custom-lang-switch" class="form-control">
			';
			$langURLs = [];
			// Runs the loop through all languages
			foreach ( $languages as $language ) {
				// Variables containing language data
				$id             = $language['id'];
				$slug           = $language['slug'];
				$name          = $language['name'];
				$url            = $language['url'];
				$current        = $language['current_lang'];
				$no_translation = $language['no_translation'];
				// Checks if the page has translation in this language
				if ( ! $no_translation ) {
					// Check if it's current language
					if ( $current ) {
						// Output the language in a <span> tag so it's not clickable
						$output .= "<option value='".$slug."' selected class=\"languages__item languages__item--current\">$name</option>";
					} else {
						// Output the language in an anchor tag
						$output .= "<option value='".$slug."' class=\"languages__item\">$name</option>";
					}
				}
				$langURLs[$slug] = $url;
			}
			$output .= '</select>
</div>
		<script type="text/javascript">
					//<![CDATA[
					var urls_polylang2 = '.json_encode($langURLs).';
					document.getElementById( "custom-lang-switch" ).onchange = function() {
						location.href = urls_polylang2[this.value];
					}
					//]]>
				</script>';
		}
		return $output;
	}
}
