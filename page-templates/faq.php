<?php
/**
 *    Template name: FAQ
 *
 *    The template for displaying Custom Page Template: Frequently Asked Questions.
 *
 * @package WordPress
 * @subpackage illdy
 */
?>
<?php get_header();
//get_template_part('sections/blog', 'bottom-header');

$categories = get_terms('faq-category');

?>
    <div style="background-color: rgba(0,0,0,0.03);">
        <div class="container bg-white">
            <section id="blog">
                <div class="faq-heading">
                    <h1 class="flex-fill"><?php the_title() ?></h1>
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle d-flex align-items-center" type="button"
                                id="dropdownMenuButton"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            انتقل إلى
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <?php foreach ($categories as $category) : /** @var WP_Term $category */ ?>
                                <a class="dropdown-item" href="#<?= $category->slug ?>"><?= $category->name ?></a>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
                <article>
                    <?php
                    foreach ($categories as $category) : /** @var WP_Term $category */
                        $questions = new WP_Query([
                            'post_type' => 'faq',
                            'tax_query' => [
                                [
                                    'taxonomy' => "faq-category",
                                    'field' => 'term_id',
                                    'terms' => $category->name,
                                ],
                            ]
                        ]);
                        if ($questions->have_posts()) : ?>

                            <h3 id="<?= $category->slug ?>"><?= $category->name ?> <a
                                        href="#<?= $category->slug ?>"><i class="fa fa-link"></i></a></h3>
                            <div class="accordion faq-list" id="accordionFaq">
                                <?php
                                $i = 0;
                                while ($questions->have_posts()) : $questions->the_post();
                                    ?>
                                    <div class="faq-item <?= $i > 0 ? "" : "expanded" ?>">
                                        <div id="heading-<?= $i ?>">
                                            <button class="btn" type="button" data-toggle="collapse"
                                                    data-target="#collapse-<?= $i ?>" <?= $i > 0 ? 'aria-expanded="false"' : 'aria-expanded="true"' ?>
                                                    aria-controls="collapse-<?= $i ?>">
                                                <h2 class="mb-0 font-weight-bold">
                                                    <?php the_title(); ?>
                                                </h2>
                                            </button>
                                        </div>

                                        <div id="collapse-<?= $i ?>"
                                             class="collapse <?= $i > 0 ? "" : "show" ?>"
                                             aria-labelledby="heading-<?= $i ?>">
                                            <div class="faq-content">
                                                <?php the_content() ?>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                    $i++;
                                endwhile;
                                ?>
                            </div>

                        <?php endif; ?>
                    <?php endforeach; ?>

                </article>
            </section><!--/#blog-->

        </div><!--/.container-->
    </div>
<?php get_footer(); ?>