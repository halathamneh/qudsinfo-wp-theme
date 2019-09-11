<?php
/**
 *    Template Name: Quizzes
 *
 *    The template for displaying Custom Page Template: Blog.
 *
 * @package WordPress
 * @subpackage QudsInfoTheme
 */
?>
<?php get_header('quizzes'); ?>
    <div class="container quizzes-page pt-5">

        <h2><?php the_title() ?></h2>

        <hr>

        <?php do_action('mtl_above_content_after_header'); ?>
        <?php
        // get all the categories from the database
        $quizzes = get_terms('quiz');
        $levels = get_terms([
            'hide_empty' => false,
            'taxonomy' => 'quiz-levels',
            'orderby' => 'term_id'
        ]);
        $types = get_terms([
            'hide_empty' => false,
            'taxonomy' => 'quiz-types',
            'orderby' => 'term_id'
        ]); ?>

        <div class="cats-container my-5">
            <div class="row">
                <?php
                if (count($quizzes)) :
                    // loop through the categries
                    foreach ($quizzes as $quiz) :
                        /** @var WP_Term $quiz */
                        // Make a header for the cateogry
                        if (function_exists('z_taxonomy_image_url'))
                            $quizImage = z_taxonomy_image_url($quiz->term_id, 'illdy-image-cat');
                        ?>
                        <div class="col-sm-3 col-12">

                            <div class="quiz-card card text-center">
                                <div class="card__face card__face--front">
                                    <div class="card-img">
                                        <?php if ($quizImage) : ?>
                                            <img src="<?php echo $quizImage; ?>"
                                                 alt="<?php echo $quiz->name; ?>">
                                        <?php endif; ?>
                                    </div>
                                    <div class="card-body">
                                        <h2 class="card-title"><?php echo $quiz->name; ?></h2>
                                    </div>
                                </div>
                                <div class="card__face card__face--back">
                                    <div class="quiz-select-level w-100">
                                        <form action="<?= get_term_link($quiz, 'quiz') ?>" method="get">
                                            <span class="d-inline-block mb-4 font-weight-bold"><?= $quiz->name ?></span>
                                            <hr class="my-1">
                                            <small class="d-inline-block mb-2">اختر المستوى</small>
                                            <div class="btn-group-toggle btn-group-sm" data-toggle="buttons">
                                                <?php $i = 0; foreach ($levels as $level) : /** @var WP_Term $level */ ?>
                                                    <label class="btn btn-outline-secondary<?= $i == 0 ? ' active' : '' ?>">
                                                        <input type="radio" name="level" id="level_<?= $level->term_id ?>" autocomplete="off"
                                                               value="<?= $level->slug ?>" <?= $i++ == 0 ? 'checked' : '' ?>> <?= $level->name ?>
                                                    </label>
                                                <?php endforeach; ?>
                                            </div>
                                            <small class="d-inline-block my-2">نوع المسابقة</small>
                                            <div class="btn-group-toggle btn-group-sm" data-toggle="buttons">
                                                <?php $i = 0; foreach ($types as $type) : /** @var WP_Term $type */ ?>
                                                    <label class="btn btn-outline-secondary<?= $i == 0 ? ' active' : '' ?>">
                                                        <input type="radio" name="type" id="level_<?= $type->term_id ?>" autocomplete="off"
                                                               value="<?= $type->slug ?>" <?= $i++ == 0 ? 'checked' : '' ?>> <?= $type->name ?>
                                                    </label>
                                                <?php endforeach; ?>
                                            </div>
                                            <hr class="mt-3 mb-4">
                                            <button type="submit" class="btn btn-sm btn-success">بدء المسابقة</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div><!--/.col-sm-4-->
                    <?php
                    endforeach;
                else : ?>
                    <div class="text-center text-muted p-5 w-100"><i class="fa fa-exclamation-triangle"></i> لا يوجد أي
                        مسابقات
                    </div>
                <?php endif; ?>
            </div><!--/.row-->
        </div><!--/.container-->

        <?php //do_action( 'mtl_after_content_above_footer' ); ?>

    </div><!--/.container-->
    <script>
        var cards = document.querySelectorAll('.quiz-card');
        cards.forEach(card => {
            card.addEventListener('click', function () {
                cards.forEach(innerCard => innerCard.classList.remove('is-flipped'));
                card.classList.add('is-flipped');
            });
        });
        document.addEventListener('click', e => {
            if (e.target.matches('.quiz-card, .quiz-card *')) return;
            cards.forEach(innerCard => innerCard.classList.remove('is-flipped'));
        })
    </script>
<?php get_footer(); ?>