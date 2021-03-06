<?php
/**
 *	The template for displaying the counter section in front page.
 *
 *	@package WordPress
 *	@subpackage QudsInfoTheme
 */

use QITheme\Helpers;

?>

<?php

$counter_background_type = get_theme_mod( 'illdy_counter_background_type', 'image' );
$counter_background_image_url = get_theme_mod( 'illdy_counter_background_image', esc_url( get_template_directory_uri() . '/layout/images/front-page/front-page-counter.jpg' ) );
$counter_background_image_id = Helpers::get_image_id($counter_background_image_url);
$counter_background_image = wp_get_attachment_image_src($counter_background_image_id, 'large');
$counter_background_color = get_theme_mod( 'illdy_counter_background_color', '#000000' );
?>

<?php
if( $counter_background_type == 'image' ):
	$counter_style = 'background-image: url('. esc_url( $counter_background_image[0] ) .');';
elseif( $counter_background_type == 'color' ):
	$counter_style = 'background-color:' . $counter_background_color;
endif;

?>

<section id="counter" class="front-page-section" style="background-image: url(<?= $counter_background_image[0] ?>)">
	<div class="counter-overlay"></div>
	<div class="container">
		<div class="row">
			<?php
			if( is_active_sidebar( 'front-page-counter-sidebar' ) ):
				dynamic_sidebar( 'front-page-counter-sidebar' );
				/*$the_widget_args = array(
						'before_widget'	=> '<div class="col-sm-4 widget_illdy_counter">',
						'after_widget'	=> '</div>',
						'before_title'	=> '',
						'after_title'	=> ''
				);
				the_widget( 'Illdy_Widget_Counter', 'title='. __( 'معلومة على الموقع', 'qi-theme' ) .'&data_from=1&data_to='.$count_posts->publish.'&data_speed=2000&data_refresh_interval=100', $the_widget_args );
				*/
			else:
				$the_widget_args = array(
					'before_widget'	=> '<div class="col-sm-4 widget_illdy_counter">',
					'after_widget'	=> '</div>',
					'before_title'	=> '',
					'after_title'	=> ''
				);

				the_widget( 'Illdy_Widget_Counter', 'title='. __( 'Projects', 'qi-theme' ) .'&data_from=1&data_to=260&data_speed=2000&data_refresh_interval=100', $the_widget_args );
				the_widget( 'Illdy_Widget_Counter', 'title='. __( 'Clients', 'qi-theme' ) .'&data_from=1&data_to=120&data_speed=2000&data_refresh_interval=100', $the_widget_args );
				the_widget( 'Illdy_Widget_Counter', 'title='. __( 'Coffes', 'qi-theme' ) .'&data_from=1&data_to=260&data_speed=2000&data_refresh_interval=100', $the_widget_args );
			endif;
			?>
		</div><!--/.row-->
	</div><!--/.container-->
</section><!--/#counter.front-page-section-->
