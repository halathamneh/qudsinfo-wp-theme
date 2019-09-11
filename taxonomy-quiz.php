<?php
/**
 *    The template for dispalying the archive.
 *
 * @package WordPress
 * @subpackage QudsInfoTheme
 */

/** @var WP_Term $quiz */
$quiz = $wp_query->get_queried_object();
?>
<?php
get_header('quizzes');

$level = false;
if (isset($_GET['level']) && term_exists($_GET['level'], 'quiz-levels')
&& isset($_GET['type']) && term_exists($_GET['type'], 'quiz-types')) {
    $level = $_GET['level'];
    $type = $_GET['type'];

    $quizImage = false;
    if (function_exists('z_taxonomy_image_url'))
        $quizImage = z_taxonomy_image_url($quiz->term_id, 'full');
    ?>
    <div class="quiz-container" <?= $quizImage ? 'style="background-image: url(' . $quizImage . ');"' : '' ?>>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <section id="blog">
                        <div class="text-center mb-5">
                            <span class="d-inline-block badge badge-light mb-4">مسابقات معلومة مقدسية</span>
                            <h1><?= $quiz->name; ?></h1>
                        </div>
                        <?= do_shortcode('[HDquiz quiz="' . $quiz->term_id . '" level="' . $level . '" type="'.$type.'"]') ?>
                    </section><!--/#blog-->
                </div>
            </div><!--/.row-->
        </div><!--/.container-->

    </div>
    <?php
} else { ?>
    <div class="container">
        لم يتم العثور على المسابقة
    </div>
<?php } ?>
<?php get_footer(); ?>
