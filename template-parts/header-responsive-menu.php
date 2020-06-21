<nav class="responsive-menu">
    <div class="responsive-menu-overlay"></div>
    <div class="responsive-menu-content">
        <form role="search" method="get" class="search-form responsive-menu-search"
              action="<?php echo pll_home_url(); ?>">
            <?php
            $placeholder = esc_attr_x('Search...', 'placeholder', 'qi-theme'); ?>
            <input type="search" id="s"
                   placeholder="<?php echo $placeholder; ?>"
                   value="<?php echo esc_attr(get_search_query()); ?>" name="s"
                   title="<?php echo esc_attr_x('Search for:', 'label', 'qi-theme'); ?>"/>
            <span class="sbutton"><i class="fa fa-search"></i></span>
        </form><!--/.search-form-->
        <ul>
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
        </ul>
    </div>
</nav><!--/.responsive-menu-->