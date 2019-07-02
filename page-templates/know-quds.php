<?php
/**
 *    Template name: Know Quds
 *
 *    The template for displaying Custom Page Template: About Us.
 *
 * @package WordPress
 * @subpackage illdy
 */
?>
<?php get_header();
get_template_part('sections/blog', 'bottom-header');
?>
<?php
if (have_posts()):
    while (have_posts()):
        the_post(); ?>


        <div class="know-quds-list row">
        <?php

        $args = array(
            'post_type'      => 'page',
            'posts_per_page' => -1,
            'post_parent'    => $post->ID,
            'order'          => 'DESC',
            'orderby'        => 'menu_order',
        );


        $parent = new WP_Query($args);

        if ($parent->have_posts()) : ?>

            <?php while ($parent->have_posts()) :
                $parent->the_post();
                $thumb = wp_get_attachment_image_src(get_post_thumbnail_id(), 'illdy-info');
                ?>

                <a href="<?= get_permalink() ?>" id="parent-<?php the_ID(); ?>" class="child-page col-md-6"
                   style="background-image: url(<?= $thumb[0] ?>);">
                    <h3><?php the_title(); ?></h3>
                </a>


            <?php endwhile; ?>
            </div>
        <?php endif;
        wp_reset_postdata(); ?>
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <section id="blog">

                        <article id="post-<?php the_ID(); ?>" <?php post_class('blog-post'); ?>>
                            <div class="blog-post-entry markup-format">
                                <?php the_content(); ?>
                            </div><!--/.blog-post-entry.markup-format-->
                        </article><!--/#post-<?php the_ID(); ?>.blog-post-->


                    </section><!--/#blog-->
                </div><!--/.col-sm-12-->
            </div><!--/.row-->
        </div><!--/.container-->
    <?php endwhile;
endif;
?>
<?php get_footer(); ?>