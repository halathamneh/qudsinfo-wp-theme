<?php
/**
 *    The template for displaying the search.
 *
 * @package WordPress
 * @subpackage QudsInfoTheme
 */
?>
<?php
get_header();
?>
    <div class="col-sm-8 mx-auto">
        <div class="header-search">
            <?php
            get_search_form();
            ?>
        </div>
        <?php
        /*if( $first_button_title && $first_button_url ): ?>
            <a href="<?php echo esc_url( $first_button_url ); ?>" title="<?php echo esc_attr( $first_button_title ); ?>" class="header-button-one"><?php echo esc_html( $first_button_title ); ?></a>
        <?php endif; ?>
        <?php if( $second_button_title && $second_button_url ): ?>
            <a href="<?php echo esc_url( $second_button_url ); ?>" title="<?php echo esc_attr( $second_button_title ); ?>" class="header-button-two"><?php echo esc_html( $second_button_title ); ?></a>
        <?php endif;*/ ?>
    </div><!--/.col-sm-8.col-sm-offset-2-->
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <section id="blog" class="search-posts">
                    <?php do_action('mtl_above_content_after_header'); ?>
                    <?php /*
				if( have_posts() ):
					while( have_posts() ):
						the_post();
						get_template_part( 'template-parts/content', get_post_format() );
					endwhile;
				else:
					get_template_part( 'template-parts/content', 'none' );
				endif;*/
                    ?>
                    <?php
                    $ptypes = array(
                        'post' => [__("Information", 'qi-theme'), "success"],
                        'pics' => [__("Photos", 'qi-theme'), "warning"],
                    );
                    if(pll_current_language() === 'ar') {
                        $ptypes['news'] = [__("News", 'qi-theme'), "primary"];
	                    $ptypes['book'] = [__("Books", 'qi-theme'), "info"];
                    }
                    if (have_posts()): ?>
                        <div class="card-columns">
                            <?php while (have_posts()):
                                the_post();
                                //get_template_part( 'template-parts/content', get_post_format() );
                                $post_thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'illdy-info-post');
                                $post_image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'large');
                                $cats = get_the_category($post);
                                ?>

                                <div class="card">
                                    <?php if (has_post_thumbnail()) : ?>
                                        <a href="<?= get_permalink() ?>">
                                            <img class="card-img-top" src="<?= $post_thumbnail[0] ?>" alt="">
                                        </a>
                                    <?php endif; ?>
                                    <div class="card-body">
                                        <?php if (get_post_type() == "news") : ?>
                                            <span class="post-meta-time d-inline-block mb-2"><i
                                                        class="fa fa-clock-o"></i> <?= get_the_date(); ?></span>
                                            &nbsp;&bull;&nbsp;
                                        <?php endif; ?>
                                        <span class="badge badge-<?= $ptypes[get_post_type()][1] ?> d-inline-block mb-2 px-2 py-1"><?= $ptypes[get_post_type()][0] ?></span>
                                        <a href="<?= get_permalink() ?>">
                                            <h4 class="card-title text-dark"><?= get_the_title() ?></h4>
                                        </a>
                                        <p class="card-text"><?= get_the_excerpt() ?></p>
                                        <a href="<?= get_permalink() ?>" class="btn btn-light"><?= __('Continue Reading', 'qi-theme') ?></a>
                                    </div>
                                    <?php if (!empty($cats)) : ?>
                                        <div class="card-footer">
                                            <?php foreach ($cats as $cat) : ?>
                                                <a href="<?= get_term_link($cat) ?>"
                                                   class="badge badge-secondary px-2 py-1"><?= $cat->name ?></a>
                                            <?php endforeach; ?>
                                        </div>
                                    <?php endif; ?>
                                </div>

                            <?php
                            endwhile; ?>
                        </div>
                    <?php else:
                        get_template_part('template-parts/content', 'none');
                    endif;
                    ?>
                    <?php do_action('mtl_after_content_above_footer'); ?>
                </section><!--/#blog-->

            </div><!--/.col-sm-7-->
        </div><!--/.row-->
    </div><!--/.container-->
<?php get_footer(); ?>