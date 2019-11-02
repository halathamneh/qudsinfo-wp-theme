<?php
/**
 *    Template Name: Photos
 *
 *    The template for dispalying Custom Page Template: Blog.
 *
 * @package WordPress
 * @subpackage QudsInfoTheme
 */
?>
<?php get_header();
get_template_part('sections/blog', 'bottom-header');
?>
    <div class="container photo-page">
        <?php do_action('mtl_above_content_after_header'); ?>
        <?php
        // get all the categories from the database
        $cats = get_terms('pics-cats'); ?>
        <ul class="nav nav-pills mb-3 d-flex" id="pills-tab" role="tablist">
            <?php
            $firstItem = null;
            foreach ($cats as $cat) :
                $checked = false;
                if ($cat->parent == "0") :
                    if (strpos($cat->name, "الأقصى") > -1 || strpos($cat->name, "Al-Aqsa") > -1) {
                        $firstItem = $cat->term_id;
                        $checked = true;
                    } ?>
                    <li class="nav-item px-2">
                        <button type="button" data-filter=".category-<?= $cat->term_id ?>"
                                class="btn btn-lg btn-outline-info<?php echo ($checked ? " mixitup-control-active" : "") ?>"><?= $cat->name ?></button>
                    </li>
                    <?php
                    $i++;
                endif;
            endforeach; ?>
        </ul>

        <div class="section-content">
            <div class="cats-container" data-default=".category-<?= $firstItem ?>">
                <div class="row no-gutters">
                    <?php
                    // loop through the categries
                    foreach ($cats as $cat) :
                        if ($cat->parent == "0") {
                            $children = get_terms($cat->taxonomy, array(
                                'parent'     => $cat->term_id,
                                'hide_empty' => false
                            ));
                            if (count($children))
                                continue;
                        }
                        // Make a header for the cateogry
                        if (function_exists('z_taxonomy_image_url'))
                            $cimage = z_taxonomy_image_url($cat->term_id, 'illdy-image-cat');
                        ?>
                        <div class="col-sm-3 col-12 mix category-<?= $cat->parent == "0" ? $cat->term_id : $cat->parent ?>">
                            <div class="card text-white text-center">
                                <img class="card-img" src="<?php echo $cimage; ?>" alt="<?php echo $cat->name; ?>">
                                <a href="<?= get_term_link($cat) ?>" class="card-img-overlay">
                                    <h4 class="card-title"><?php echo $cat->name; ?></h4>
                                </a>
                            </div>
                        </div><!--/.col-sm-4-->
                    <?php
                    endforeach; ?>
                </div><!--/.row-->
            </div><!--/.container-->
        </div><!--/.section-content-->

        <?php //do_action( 'mtl_after_content_above_footer' ); ?>

    </div><!--/.container-->
<?php
wp_enqueue_script('mixitup', get_template_directory_uri() . '/layout/js/mixitup.min.js', [], '3', true);
get_footer(); ?>