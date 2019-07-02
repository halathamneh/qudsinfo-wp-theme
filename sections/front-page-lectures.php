<?php
/**
 *    The template for displaying the counter section in front page.
 *
 * @package WordPress
 * @subpackage illdy
 */
?>

<?php
$lec_page = get_page_by_path('lectures-team');

$counter_background_image = get_the_post_thumbnail_url($lec_page, 'large');
?>

<?php
$counter_style = 'background-image: url("' . $counter_background_image . '");';
//$count_posts = wp_count_posts();
?>

<section id="lectures" class="front-page-section" style='<?= $counter_style ?>'>
    <div class="lectures-overlay"></div>
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-3 text-center">
                <h3><b><?= __("Lectures Team", "illdy") ?></b><br><span class="small"><?= __("QudsInfo", 'illdy') ?></span></h3>
                <a href="/lectures-team" class="btn btn-warning"><?= __('More About the Team', 'illdy') ?></a>
            </div>
            <div class="col-sm-9">
                <div class="list">
                    <ul>
                        <li><b><?php the_field("numlects", $lec_page->ID); ?></b> <?= __("Lecture", 'illdy') ?></li>
                        <li><b><?php the_field("numhours", $lec_page->ID); ?></b> <?= __("Hour", 'illdy') ?></li>
                        <li><b><?php the_field("aud_sum", $lec_page->ID); ?></b> <?= __("Student", 'illdy') ?></li>
                    </ul>
                </div>
            </div>
        </div><!--/.row-->
    </div><!--/.container-->
</section><!--/#counter.front-page-section-->