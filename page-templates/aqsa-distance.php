<?php
/**
 *    Template name: Aqsa Distance
 *
 *    The template for displaying Custom Page Template: No Sidebar.
 *
 * @package WordPress
 * @subpackage illdy
 */
?>
<?php get_header(); ?>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <section id="blog">
                    <?php
                    if ( have_posts() ):
                        while ( have_posts() ):
                            the_post();
                            ?>
                            <h2><?php the_title() ?></h2>
                            <section id="aqsa-distance" class="front-page-section aqsa-distance" style="display: none;">
                                <div class="container">
                                    <div class="section-header">
                                        بعدك عن الأقصى
                                    </div>
                                    <span>قم بتفعيل خدمة الموقع (GPS) لحساب بعدك عن الأقصى</span>
                                    <div class="section-content">

                                    </div>
                                </div>
                            </section>
                            
                            <?php
                        endwhile;
                    endif;
                    ?>
                </section><!--/#blog-->
            </div><!--/.col-sm-12-->
        </div><!--/.row-->
    </div><!--/.container-->
<?php get_footer(); ?>