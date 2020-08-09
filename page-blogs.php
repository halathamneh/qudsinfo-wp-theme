<?php
/**
 *    Template Name: Blogs
 *
 *    The template for dispalying Custom Page Template: Blog.
 *
 * @package WordPress
 * @subpackage QudsInfoTheme
 */
?>
<?php get_header();
//get_template_part('sections/blog', 'bottom-header');
?>
<div class="blogs-page">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <section id="blog">
                    <h1 class="py-5 text-center font-weight-bold text-secondary"><?= the_title(); ?></h1>
                    <hr>
                    <?php
                    $news = true;
                    do_action('mtl_above_content_after_header'); ?>
                    <?php
                    $paged = (get_query_var('paged')) ? absint(get_query_var('paged')) : 1;
                    $wp_query_args = array(
                        'post_type' => array('blogs'),
                        'cache_results' => true,
                        'update_post_meta_cache' => true,
                        'update_post_term_cache' => true,
                        'paged' => $paged
                    );

                    $wp_query = new WP_Query($wp_query_args);

                    if ($wp_query->have_posts()): ?>
                        <div class="blogs-list">

                            <?php while ($wp_query->have_posts()):
                                $wp_query->the_post();
                                get_template_part('template-parts/content-blog', get_post_format());
                            endwhile; ?>
                        </div>
                    <?php else: ?>
                        <div class="alert alert-light my-5 py-5 px-3 text-center">
                            لا يوجد مدونات
                        </div>
                    <?php endif;

                    wp_reset_postdata();
                    ?>
                    <?php do_action('QITheme/AfterContentAboveFooter'); ?>
                </section><!--/#blog-->
            </div><!--/.col-sm-7-->
            <?php //get_sidebar(); ?>
        </div><!--/.row-->
    </div><!--/.container-->
</div>
<?php get_footer(); ?>
