<?php

namespace QITheme\Components;

use QITheme\Lib\Singleton;

/**
 * Class Pagination
 * @package QITheme\Components
 */
class Pagination extends Singleton
{


    protected function __construct()
    {
        parent::__construct();

            // add the action hook to generate the HTML output
            add_action('QITheme/AfterContentAboveFooter', array($this, 'pagination_output'), 1);
        }


    /**
     * Custom pagination function
     *
     * Illdy 1.09
     */

    function pagination_output()
    {

        $prev_arrow = is_rtl() ? '&rarr;' : '<i class="fa fa-angle-left"></i>';
        $next_arrow = is_rtl() ? '&larr;' : '<i class="fa fa-angle-right"></i>';

        global $wp_query;
        $total = $wp_query->max_num_pages;
        $big = 999999999; // need an unlikely integer
        if ($total > 1) {
            if (!$current_page = get_query_var('paged'))
                $current_page = 1;
            if (get_option('permalink_structure')) {
                $format = 'page/%#%/';
            } else {
                $format = '&paged=%#%';
            }

            echo '<nav class="paginate-links">';
            echo paginate_links(array(
                'base'      => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
                'format'    => $format,
                'current'   => max(1, get_query_var('paged')),
                'total'     => $total,
                'mid_size'  => 3,
                'type'      => 'plain',
                'prev_text' => $prev_arrow,
                'next_text' => $next_arrow,
            ));
            echo '</nav><!--/.paginate-links-->';

        }
    }

} // actual class
