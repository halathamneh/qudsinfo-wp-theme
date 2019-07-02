<?php
/**
 *    Template name: Products
 *
 *    The template for displaying Custom Page Template: No Sidebar.
 *
 * @package WordPress
 * @subpackage illdy
 */
?>
<?php get_header();
get_template_part('sections/blog', 'bottom-header');
?>
    <div id="products-page">
        
        <?php
        $products_query_args = array(
            'post_type'              => array('products'),
            'nopaging'               => true,
            'cache_results'          => true,
            'update_post_meta_cache' => true,
            'update_post_term_cache' => true,
            'orderby'                => 'date',
            'order'                  => 'ASC',
        );
        $products_query = new WP_Query($products_query_args);
        if ( $products_query->have_posts() ) :
            $i = 0;
            while ( $products_query->have_posts() ): $products_query->the_post();
                $i++; ?>
                <?php $product_bg = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full'); ?>
                <div class="product" style="">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-7 col-xs-12 content">
                                <h2><?php the_title(); ?></h2>
                                <div class="desc">
                                    <?php the_content(); ?>
                                </div>
                            </div>
                            <div class="bg-image col-sm-5 col-xs-12">
                                <img src="<?= $product_bg[0]; ?>" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            <?php endwhile;
        endif; ?>
    </div><!--/.container-->
<?php get_footer(); ?>