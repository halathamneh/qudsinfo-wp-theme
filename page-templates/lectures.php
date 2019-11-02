<?php
/**
 *    Template name: Lectures
 *
 *    The template for displaying Custom Page Template: No Sidebar.
 *
 * @package WordPress
 * @subpackage QudsInfoTheme
 */
?>
<?php get_header();
get_template_part( 'sections/blog', 'bottom-header' );
?>
<?php
$contact_bar_facebook_url = get_theme_mod( 'illdy_contact_bar_facebook_url', esc_url( '#' ) );

if ( have_posts() ):
	while ( have_posts() ):
		the_post();

		?>
        <div id="lectures">
            <div class="section-group">
                <div class="section-item about-section">
                    <div class="section-title">
                        <h2><i class="fa fa-lightbulb-o"></i> <?= __("The idea of the team", 'qi-theme') ?></h2>
                    </div>
                    <div class="section-content">
						<?php the_content(); ?>
                    </div>
                </div>
                <div class="section-item contact-section section-baige">
                    <div class="section-content">
                        <h2><?= __( "Join Lectures Team", 'qi-theme' ) ?></h2>
                        <p><?= __( "Do you find yourself able to give lectures to the public?", 'qi-theme' ) ?></p>
                        <a href="<?= get_field( 'join_link' ) ?>"
                           class="btn btn-light mt-4"><?= __( "Register now", 'qi-theme' ) ?></a>
                    </div>
                </div>

            </div>
            <div class="section-group">
                <div class="section-item section-dark section-achievements"
                     style="background-image: url(<?= get_template_directory_uri() . '/layout/images/lectures.jpg' ?>);">
                    <div class="section-overlay"></div>
                    <h2><i class="fa fa-2x fa-trophy"></i> <?= __( "The team's achievements", 'qi-theme' ) ?></h2>
                    <div class="list">
                        <ul>
                            <li><b><?php the_field( "numlects" ); ?></b> <?= __( "Jerusalem's Lecture", 'qi-theme' ) ?>
                            </li>
                            <li><b><?php the_field( "numhours" ); ?></b> <?= __( "Hours", 'qi-theme' ) ?></li>
                            <li><b><?php the_field( "aud_sum" ); ?></b> <?= __( "Students", 'qi-theme' ) ?></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="section-group">
                <div class="section-item">
                    <div class="section-title"><b><i class="fa fa-gears"></i> <?= __("Team's Services", 'qi-theme') ?></b></div>
                    <div class="section-content">
                        <ol>
							<?php
							if ( have_rows( 'offers' ) ):

								// loop through the rows of data
								while ( have_rows( 'offers' ) ) : the_row();

									// display a sub field value
									echo "<li><b>" . get_sub_field( 'service_name' ) . "</b> " . get_sub_field( 'short_desc' ) . "</li>";

								endwhile;
							endif;
							?>
                        </ol>
                    </div>
                </div>
                <div class="section-item">
                    <div class="section-title"><b><i
                                    class="fa fa-bullseye"></i> <?= __( "Goals of the team", 'qi-theme' ) ?></b></div>
                    <div class="section-content">
                        <ul>
							<?php
							if ( have_rows( 'goals' ) ):

								// loop through the rows of data
								while ( have_rows( 'goals' ) ) : the_row();

									// display a sub field value
									echo "<li>" . get_sub_field( 'goal_name' ) . "</li>";

								endwhile;
							endif;
							?>
                        </ul>
                    </div>
                </div>
            </div>


            <div class="achievements">


                <div class="slideshow mt-5">
                    <span class="d-block mb-3"><?= __( "Photos from our lectures", 'qi-theme' ) ?></span>
					<?php
					global $post;
					?>
                    <div class="lectures-carousel owl-carousel owl-theme" data-slider-id="1">
						<?php
						$images = get_field( 'gallery' );
						if ( ! empty( $images ) && is_array( $images ) && count( $images ) ) {
							foreach ( $images as $image ) : ?>
                                <a href="<?php echo esc_url( $image['sizes']['large'] ); ?>"
                                   data-fancybox="images"
                                   data-caption="<?= get_the_title() ?>"><img class="img-responsive owl-lazy"
                                                                              data-src="<?php echo esc_url( $image['sizes']['illdy-info-post'] ); ?>"/></a>
							<?php endforeach;
						} else { ?>
                            <a href="<?php echo esc_url( $post_image[0] ); ?>"
                               data-fancybox="images"
                               data-caption="<?= get_the_title() ?>"><img
                                        src="<?php echo esc_url( $post_image[0] ); ?>"/></a>
						<?php } ?>
                    </div>
                </div>

            </div>

            <div class="section-group">
                <div class="section-item section-baige">
                    <div class="section-title">
                        <h2><i class="fa fa-phone"></i> <?= __( "Ask for a lecture", 'qi-theme' ) ?></h2>
                    </div>
                    <div class="section-content">
                        <p><?= __( "You can contact us by", 'qi-theme' ) ?></p>
                        <ul>
                            <li><?= __( "Phone", 'qi-theme' ) ?>: <a href="tel:<?php the_field( 'phone_num' ) ?>"
                                                                     class="phone-num"><?php the_field( 'phone_num' ) ?></a>
                            </li>
                            <li><?= __( "Email", 'qi-theme' ) ?>: <a
                                        href="mailto:<?php the_field( 'email_add' ) ?>"><?php the_field( 'email_add' ) ?></a>
                            </li>
                        </ul>
                        <span><?= __( "or by sending to us on", 'qi-theme' ) ?> <a
                                    href="<?= $contact_bar_facebook_url ?>"><?= __( "our Facebook page", 'qi-theme' ) ?></a>.</span>
                    </div>
                </div>
                <div class="section-item section-dark">
                    <div class="section-title">
                        <h4><b><?= __( "Get a specialized material for the lectures.", 'qi-theme' ) ?></b></h4>
                    </div>
                    <div class="section-content">
                        <p><?= __( "If you are interested in giving Jerusalem lectures, The Qudsinfo team provides specially designed material for the lecturers.", 'qi-theme' ) ?></p>
                        <a href="<?= get_field( 'material' ) ?>"
                           class="btn btn-dark mt-4"><?= __( "GET IT NOW", 'qi-theme' ) ?></a>
                    </div>
                </div>
            </div>
        </div><!--/.container-->
	<?php
	endwhile;
endif;
?>
<?php get_footer(); ?>

