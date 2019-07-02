<?php
/**
 * Created by PhpStorm.
 * User: haitham
 * Date: 10/20/17
 * Time: 9:41 PM
 */
$thoughts_catid = 2351;
do_action('mtl_above_content_after_header'); ?>

<?php
// get all the categories from the database
$category = get_query_var('cat') != '' ? get_query_var('cat') : 0;
$page = get_query_var('paged') != '' ? get_query_var('paged') : 0;
$term = $category != 0 ? get_term($category) : false;

$cats = get_terms(array(
    'taxonomy' => 'category',
    'orderby'  => 'name',
    'order'    => 'ASC',
    'exclude'  => $thoughts_catid,
    'parent'   => 0,
)); ?>


    <div class="container">
        <div class="row">
            <?php if (!wp_is_mobile()) : ?>
                <div class="col-sm-3 cats-list">
                    <h3 class="cats-title"><?= __("اختر الموضوع", "QI") ?></h3>
                    <ul>
                        <li <?= $category == 0 ? 'class="active"' : '' ?>>
                            <a href="javascript:;" data-catid="0"
                               class="front-category">
                                <div class="front-cat-name"><?php echo __('جميع المعلومات'); ?></div>
                            </a><!--/.post-->
                        </li><!--/.col-sm-4-->
                        <?php
                        // loop through the categories
                        foreach ($cats as $cat) :
                            // Make a header for the category
                            ?>
                            <?php
                            $children = get_terms([
                                'taxonomy'   => 'category',
                                'parent'     => $cat->term_id,
                                'hide_empty' => false,
                            ]);
                            $liClasses = "";
                            $liClasses .= ($category == $cat->term_id) ? 'active' : "";
                            $liClasses .= !empty($children) ? " parent" : "";
                            $liClasses .= ($category == $cat->term_id || cat_is_ancestor_of($cat, $category)) ? " expanded" : "";
                            ?>
                            <li <?= $liClasses !== "" ? "class='$liClasses'" : "" ?>>
                                <a href="<?= get_term_link($cat) ?>"
                                   class="front-category" data-catid="<?= $cat->term_id; ?>">
                                    <div class="front-cat-name"><?php echo $cat->name; ?></div>
                                </a><!--/.post-->

                                <?php if (!empty($children)) : ?>
                                    <ul>
                                        <?php foreach ($children as $child) : ?>
                                            <li class="<?= ($category == $child->term_id || cat_is_ancestor_of($child, $category)) ?
                                                'active' : "" ?> child-cat">
                                                <a href="<?= get_term_link($child) ?>" class="front-category"
                                                   data-catid="<?= $child->term_id; ?>" <?= urldecode($child->slug) == "معالم-المسجد-الأقصى" ? "data-override-redirect='/photos'" : "" ?>>
                                                    <div class="front-cat-name"><?php echo $child->name; ?></div>
                                                </a>
                                                <?php $children2 = get_terms([
                                                    'taxonomy'   => 'category',
                                                    'parent'     => $child->term_id,
                                                    'hide_empty' => false,
                                                ]);
                                                ?>
                                                <?php if (!empty($children2)) : ?>
                                                    <ul>
                                                        <?php foreach ($children2 as $child) : ?>
                                                            <li class="<?= ($category == $child->term_id || cat_is_ancestor_of($child, $category)) ?
                                                                'active' : "" ?> child-cat">
                                                                <a href="<?= get_term_link($child) ?>" class="front-category"
                                                                   data-catid="<?= $child->term_id; ?>">
                                                                    <div class="front-cat-name"><?php echo $child->name; ?></div>
                                                                </a>
                                                            </li>
                                                        <?php endforeach; ?>
                                                    </ul>
                                                <?php endif; ?>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                <?php endif; ?>
                            </li><!--/.col-sm-4-->
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php else : ?>
                <div class="col-sm-3 cats-list dropdown">
                    <span>اختر:</span>
                    <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenu1"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="selected-value"><?php echo $category == 0 ? __('جميع المعلومات') : get_term_field('name', intval($category)); ?></span>
                        <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                        <li <?= $category == 0 ? 'class="active"' : '' ?>>
                            <a href="javascript:;" data-catid="0"
                               class="front-category">
                                <div class="front-cat-name"><?php echo __('جميع المعلومات'); ?></div>
                            </a><!--/.post-->
                        </li><!--/.col-sm-4-->
                        <?php
                        // loop through the categries
                        foreach ($cats as $cat) :
                            // Make a header for the cateogry
                            $children = get_terms([
                                'taxonomy'   => 'category',
                                'parent'     => $cat->term_id,
                                'hide_empty' => false,
                            ]);
                            $liClasses = "";
                            $liClasses .= ($category == $cat->term_id) ? 'active' : "";
                            $liClasses .= !empty($children) ? " parent" : "";
                            $liClasses .= ($category == $cat->term_id || cat_is_ancestor_of($cat, $category)) ? " expanded" : "";
                            ?>
                            <li <?= $liClasses !== "" ? "class='$liClasses'" : "" ?>>
                                <a href="<?= get_term_link($cat) ?>"
                                   class="front-category" data-catid="<?= $cat->term_id; ?>">
                                    <div class="front-cat-name"><?php echo $cat->name; ?></div>
                                </a><!--/.post-->

                                <?php if (!empty($children)) : ?>
                                    <ul>
                                        <?php foreach ($children as $child) : ?>
                                            <li class="<?= ($category == $child->term_id || cat_is_ancestor_of($child, $category)) ?
                                                'active' : "" ?> child-cat">
                                                <a href="<?= get_term_link($child) ?>" class="front-category"
                                                   data-catid="<?= $child->term_id; ?>">
                                                    <div class="front-cat-name"><?php echo $child->name; ?></div>
                                                </a>
                                                <?php $children2 = get_terms([
                                                    'taxonomy'   => 'category',
                                                    'parent'     => $child->term_id,
                                                    'hide_empty' => false,
                                                ]);
                                                ?>
                                                <?php if (!empty($children2)) : ?>
                                                    <ul>
                                                        <?php foreach ($children2 as $child) : ?>
                                                            <li class="<?= ($category == $child->term_id || cat_is_ancestor_of($child, $category)) ?
                                                                'active' : "" ?> child-cat">
                                                                <a href="<?= get_term_link($child) ?>" class="front-category"
                                                                   data-catid="<?= $child->term_id; ?>">
                                                                    <div class="front-cat-name"><?php echo $child->name; ?></div>
                                                                </a>
                                                            </li>
                                                        <?php endforeach; ?>
                                                    </ul>
                                                <?php endif; ?>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                <?php endif; ?>
                            </li><!--/.col-sm-4-->
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>
            <div class="col-sm-9 info-list">
                <div class="content">

                    <?php echo render_infos($page, $term); ?>
                </div>
                <?php
                wp_reset_postdata();
                ?>

            </div>
        </div><!--/.row-->
    </div><!--/.container-->

<?php //do_action( 'mtl_after_content_above_footer' ); ?>