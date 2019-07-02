<?php
/**
 *    Template name: Content Team
 *
 *    The template for displaying Custom Page Template: No Sidebar.
 *
 * @package WordPress
 * @subpackage illdy
 */
?>
<?php get_header();
get_template_part('sections/blog', 'bottom-header');
?>
<div id="content-team" class="team-page">
    <div class="row">
        <section id="blog">
            <?php
            if ( have_posts() ):
                while ( have_posts() ):
                    the_post();
                    
                    ?>
                    <div class="entry-content container">
                        <?php the_content(); ?>
                    </div>
                    <?php
                    // check if the flexible content field has rows of data
                    if ( have_rows('sections') ):
                        ?>
                        <div class="container">
                            <div class="sections">
                                <?php
                                // loop through the rows of data
                                while ( have_rows('sections') ) : the_row();
                                    ?>
                                    <div class="section <?= get_row_layout() ?>">
                                        <div class="container">
                                            <h3><?php the_sub_field('text'); ?></h3>
                                            <img src="<?php the_sub_field('image') ?>" alt="" class="">
                                        </div>
                                    </div>
                                    <?php
                                endwhile; ?>
                            </div>
                        </div>
                    <?php endif;
                endwhile;
            endif;
            ?>
        </section><!--/#blog-->
    </div><!--/.row-->
</div><!--/.container-->
<?php get_footer(); ?>

