<?php
/**
 *    Template name: Videos
 *
 *    The template for displaying Custom Page Template: No Sidebar.
 *
 * @package WordPress
 * @subpackage QudsInfoTheme
 */
?>
<?php get_header();
get_template_part('sections/blog', 'bottom-header');
?>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <section id="blog">
                    <?php
                    if ( have_posts() ):
                        while ( have_posts() ):
                            the_post();
                            ?>
                            <div class="col-sm-10 mx-auto entry-content">
                                <?php the_content(); ?>
                            </div>
                            <?php
                        endwhile;
                    endif;
                    ?>
                    <div class="audio-posts col-sm-10 mx-auto">
                        <?php wp_reset_query();
                        $post_query_args = array(
                            'post_type'              => array('videos'),
                            'nopaging'               => false,
                            'posts_per_page'         => absint(10),
                            'ignore_sticky_posts'    => true,
                            'cache_results'          => true,
                            'update_post_meta_cache' => true,
                            'update_post_term_cache' => true,
                        );
                        ?>
                        
                        <?php $audio_query = new WP_Query($post_query_args); ?>
                        <?php if ( $audio_query->have_posts() ) : ?>
                            <div class="row">
                                <?php while ( $audio_query->have_posts() ) : $audio_query->the_post(); ?>
                                    <div class="audio-post col-sm-6">
                                        <h3><?php the_title(); ?></h3>
                                        <div class="videoWrapper">
                                            <?php global $wp_embed;
                                            $post_embed = $wp_embed->run_shortcode('[embed width=""]' . get_field("yt_link") . '[/embed]');
                                            echo $post_embed; ?>
                                        </div>
                                    </div>
                                <?php endwhile; ?>
                            </div>
                        <?php else: ?>
                            <?php get_template_part('template-parts/content', 'none'); ?>
                        <?php endif; ?>
                    </div>

                </section><!--/#blog-->
            </div><!--/.col-sm-12-->
        </div><!--/.row-->
    </div><!--/.container-->
<?php get_footer(); ?>