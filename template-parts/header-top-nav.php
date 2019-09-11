<?php
/**
 *    The template for dispalying the content.
 *
 * @package WordPress
 * @subpackage qudsinfo
 */
?>
<nav class="header-navigation">
    <ul class="clearfix">
        <?php
        wp_nav_menu(array(
            'theme_location'  => 'primary-menu',
            'menu'            => '',
            'container'       => '',
            'container_class' => '',
            'container_id'    => '',
            'menu_class'      => '',
            'menu_id'         => '',
            'items_wrap'      => '%3$s',
            'walker'          => new MTL_Extended_Menu_Walker(),
            'fallback_cb'     => 'MTL_Extended_Menu_Walker::fallback',
        ));
        ?>
        <li class="search-menu-button">
            <div class="search-menu-content">
                <form role="search" method="get" class="search-form header-menu"
                      action="<?php echo home_url('/'); ?>">
                    <?php
                    $placeholder = __('Search...', 'qi-theme'); ?>
                    <input type="search" id="s"
                           placeholder="<?php echo $placeholder; ?>"
                           value="<?php echo esc_attr(get_search_query()); ?>" name="s"
                           title="<?php echo __('Search for:', 'qi-theme'); ?>"/>
                    <span class="sbutton"><i class="fa fa-search"></i></span>
                </form><!--/.search-form-->
            </div>
        </li>
    </ul><!--/.clearfix-->
    <div class="menu-cursor"></div>
</nav><!--/.header-navigation-->
<button class="open-responsive-menu transparent-nav">
    <div class="wrapper">
        <div class="bar1"></div>
        <div class="bar2"></div>
        <div class="bar3"></div>
    </div>
</button>