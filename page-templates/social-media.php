<?php
/**
 *    Template name: Social Media
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
<div id="socialmedia" class="container">

    <section id="blog">
        <?php
        if ( have_posts() ):
            while ( have_posts() ):
                the_post();
                
                ?>
                <div class="entry-content">
                    <div class="text-content">
                        <?php the_content(); ?>
                    </div>
                    <?php if ( have_rows('social_links') ): ?>
                        <div class="social-icons row no-gutters">
                            
                            <?php while ( have_rows('social_links') ): the_row();
                                // vars
                                $classes = get_sub_field('classes');
                                $link = get_sub_field('social_link');
                                $icon = get_sub_field('ico_class');
                                ?>
                                <div class="icon col-sm-4 col-6 <?= strtolower( $classes ) ?>">
                                    <div class="sm-content">
                                        <div class="sm-icon">
                                            <i class="fa fa-<?= $icon ?>"></i>
                                        </div>
                                        <div class="sm-name"><?= $classes ?></div>
                                    </div>
                                    <div class="sm-link"><a href="<?= $link ?>"><?= !empty($link) ? $link : "@qudsinfo" ?></a></div>
                                </div>
                            <?php endwhile; ?>

                        </div>
                    <?php endif; ?>

                </div>
                <?php
            endwhile;
        endif;
        ?>
    </section><!--/#blog-->
</div><!--/.container-->
<?php get_footer(); ?>

