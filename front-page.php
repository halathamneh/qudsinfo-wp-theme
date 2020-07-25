<?php
/**
 *    Template Name: Front Page
 *
 *    The template for dispalying Custom Page Template: Blog.
 *
 * @package WordPress
 * @subpackage QudsInfoTheme
 */
$sections_order_first_section = get_theme_mod('illdy_general_sections_order_first_section', 1);
$sections_order_second_section = get_theme_mod('illdy_general_sections_order_second_section', 2);
$sections_order_third_section = get_theme_mod('illdy_general_sections_order_third_section', 3);
$sections_order_fourth_section = get_theme_mod('illdy_general_sections_order_fourth_section', 4);
$sections_order_fifth_section = get_theme_mod('illdy_general_sections_order_fifth_section', 5);
$sections_order_sixth_section = get_theme_mod('illdy_general_sections_order_sixth_section', 6);
$sections_order_seventh_section = get_theme_mod('illdy_general_sections_order_seventh_section', 7);
$sections_order_eighth_section = get_theme_mod('illdy_general_sections_order_eighth_section', 9);
$sections_order_ninth_section = get_theme_mod('illdy_general_sections_order_ninth_section', 8);

get_header();
/*
if( get_option( 'show_on_front' ) == 'page'  ):
	if( is_page_template( 'page-templates/blog.php' ) ):
		get_template_part( 'page-templates/blog' );
	elseif( is_page_template( 'page-templates/left-sidebar.php' ) ):
		get_template_part( 'page-templates/left', 'sidebar' );
	elseif( is_page_template( 'page-templates/no-sidebar.php' ) ):
		get_template_part( 'page-templates/no', 'sidebar' );
	else:
		get_template_part( 'page' );
	endif;
else:
*/
get_template_part('sections/front-page', 'hero');

get_template_part('sections/front-page', 'news-bar');

?>
    <section class="info-of-today-section">
        <div class="container">
            <div class="row">
                <div class="mb-4 col-lg-9">
                    <div id="info-of-today"></div>
                </div>
                <div class="mb-4 col-lg-3">
                    <div id="on-this-day"></div>
                </div>
            </div>
        </div>
    </section>
    <section id="aqsa-distance-section"></section>
    <section id="services-section"></section>
    <section id="teams-section"></section>
<?php
//get_template_part('sections/front-page', 'bottom-header');


//get_template_part('sections/front-page', 'aqsa-distance');



//if (is_rtl()) {
//    get_template_part('sections/front-page', 'slider');
//}

//if ($sections_order_first_section):
//    illdy_sections_order($sections_order_first_section);
//endif;

//if ($sections_order_second_section):
//    illdy_sections_order($sections_order_second_section);
//endif;
//
//if ($sections_order_third_section):
//    illdy_sections_order($sections_order_third_section);
//endif;
//
//if ($sections_order_fourth_section):
//    illdy_sections_order($sections_order_fourth_section);
//endif;
//
//if ($sections_order_fifth_section):
//    illdy_sections_order($sections_order_fifth_section);
//endif;
//
//if ($sections_order_sixth_section):
//    illdy_sections_order($sections_order_sixth_section);
//endif;
//
//if ($sections_order_seventh_section):
//    illdy_sections_order($sections_order_seventh_section);
//endif;
//
//if ($sections_order_eighth_section):
//    illdy_sections_order($sections_order_eighth_section);
//endif;
//if ($sections_order_ninth_section):
//    illdy_sections_order($sections_order_ninth_section);
//endif;
//endif;

get_footer();