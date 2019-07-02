<?php
/**
 *    Template Name: Books
 *
 *    The template for dispalying Custom Page Template: Blog.
 *
 * @package WordPress
 * @subpackage illdy
 */
?>
<?php
$category = get_query_var('cat') != '' ? get_query_var('cat') : 0;
$page = get_query_var('paged') != '' ? get_query_var('paged') : 0;

get_header();
get_template_part('sections/blog', 'bottom-header');
?>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <section id="blog">
                    <?php do_action('mtl_above_content_after_header'); ?>
                    
                    
                    <?php
                    // get all the categories from the database
                    $cats = get_terms('library_sections'); ?>

                    <div class="section-content">
                        <div class="container">

                            <div class="row">
                                <?php if ( ! wp_is_mobile() ) : ?>
                                    <div class="col-sm-3 cats-list books">
                                        <h3 class="cats-title">اختر الموضوع</h3>
                                        <ul>
                                            <li <?php if ( $category == 0 ) {
                                                echo 'class="active"';
                                            } ?>>
                                                <a href="javascript:;" data-catid="0"
                                                   class="front-category">
                                                    <div class="front-cat-name"><?php echo __('جميع الكتب'); ?></div>
                                                </a><!--/.post-->
                                            </li><!--/.col-sm-4-->
                                            <?php
                                            // loop through the categries
                                            foreach ($cats as $cat) :
                                                // Make a header for the cateogry
                                                ?>
                                                <li <?php if ( $category == $cat->term_id ) {
                                                    echo 'class="active"';
                                                } ?>>
                                                    <a href="javascript:;" data-catid="<?= $cat->term_id ?>"
                                                       class="front-category">
                                                        <div class="front-cat-name"><?= $cat->name; ?></div>
                                                    </a><!--/.post-->
                                                </li><!--/.col-sm-4-->
                                            <?php endforeach; ?>
                                        </ul>
                                    </div>
                                <?php else : ?>
                                    <div class="col-sm-3 cats-list dropdown books">
                                        <span>اختر:</span>
                                        <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <span class="selected-value"><?php echo $category == 0 ? __('جميع الكتب') : get_term_field('name', intval($category)); ?></span>
                                            <span class="caret"></span>
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                            <li <?php if ( $category == 0 ) {
                                                echo 'class="active"';
                                            } ?>>
                                                <a href="javascript:;" data-catid="0" class="front-category">
                                                    <div class="front-cat-name"><?php echo __('جميع الكتب'); ?></div>
                                                </a><!--/.post-->
                                            </li><!--/.col-sm-4-->
                                            <?php
                                            // loop through the categries
                                            foreach ($cats as $cat) :
                                                // Make a header for the cateogry
                                                ?>
                                                <li <?php if ( $category == $cat->term_id ) {
                                                    echo 'class="active"';
                                                } ?>>
                                                    <a href="javascript:;"
                                                       class="front-category" data-catid="<?= $cat->term_id; ?>">
                                                        <div class="front-cat-name"><?php echo $cat->name; ?></div>
                                                    </a><!--/.post-->
                                                </li><!--/.col-sm-4-->
                                            <?php endforeach; ?>
                                        </ul>
                                    </div>
                                <?php endif; ?>
                                <div class="col-sm-9 info-list books">
                                    <div class="content">
                                        <?php echo render_books($page,$category); ?>
                                    </div>
                                </div>
                            </div><!--/.row-->
                        </div><!--/.container-->
                    </div><!--/.section-content-->
                    
                    <?php //do_action( 'mtl_after_content_above_footer' ); ?>
                </section><!--/#blog-->
            </div><!--/.col-sm-12-->
        </div><!--/.row-->
    </div><!--/.container-->
<?php get_footer(); ?>