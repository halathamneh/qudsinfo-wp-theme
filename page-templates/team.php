<?php
/**
 *    Template name: team
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
                    <div class="row">
                        <?php if (get_field('members')): ?>
                            <?php while (has_sub_field('members')): ?>
                                <div class="col-md-3 col-6">
                                    <div class="card team-member-card mb-3">
                                        <img src="<?php the_sub_field('picture'); ?>"
                                             alt=""<?php the_sub_field('name'); ?> class="card-img-top">
                                        <div class="card-body">
                                            <h3 class="card-title"><?php the_sub_field('name'); ?></h3>
                                            <p class="card-text"><?php the_sub_field('job'); ?></p>
                                            <?php
                                            $contact = get_sub_field('contact');
                                            if (filter_var($contact, FILTER_VALIDATE_EMAIL)) : ?>
                                                <a href="mailto:<?= $contact ?>" class="btn btn-link"><i class="fa fa-envelope"></i> للتواصل</a>
                                            <?php else : ?>
                                                <a href="<?= $contact ?>" class="btn btn-link"><i class="fa fa-link"></i> للتواصل</a>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                        <?php endif; ?>
                    </div>
                </section><!--/#blog-->
            </div><!--/.col-sm-12-->
        </div><!--/.row-->
    </div><!--/.container-->
<?php get_footer(); ?>