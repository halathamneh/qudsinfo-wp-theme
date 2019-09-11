<?php
/**
 *    The template for dispalying the single.
 *
 * @package WordPress
 * @subpackage QudsInfoTheme
 */
?>
<?php get_header();
?>

<?php
if (have_posts()):
    while (have_posts()):
        the_post();
        $desktopWallpaper = get_field('desktop');
        $mobileWallpaper = get_field('mobile');
        if ($desktopWallpaper)
            $bg = $desktopWallpaper['url'];
        elseif ($mobileWallpaper)
            $bg = $mobileWallpaper['url'];
        ?>
        <div class="wallpaper-post" style="background-image: url(<?= isset($bg) ? $bg : '' ?>);">
            <div class="container">
                <div class="d-flex align-items-center flex-md-row flex-column pt-5 pb-3">
                    <h2 class="text-light font-weight-bold flex-fill"><?php the_title(); ?></h2>
                    <div class="d-flex my-3 my-md-0 flex-column flex-md-row align-items-center">
                        <i class="fa fa-arrow-down mx-3 text-light mb-3" style="font-size: 4rem;"></i>
                        <div class="wallpapers-downloads d-flex flex-column">
                            <?= $desktopWallpaper ? '<a href="' . $desktopWallpaper['url'] . '" class="btn btn-success mb-3"><i class="fa fa-download"></i> تنزيل لسطح المكتب</a>' : ''; ?>
                            <?= $mobileWallpaper ? '<a href="' . $mobileWallpaper['url'] . '" class="btn btn-success"><i class="fa fa-download"></i> تنزيل للموبايل</a>' : ''; ?>
                        </div>
                    </div>
                </div>
                <ul class="nav nav-tabs" id="pills-tab" role="tablist">
                    <?php if ($desktopWallpaper) : ?>
                        <li class="nav-item">
                            <a class="nav-link active" id="pills-desktop-tab" data-toggle="tab"
                               href="#pills-desktop"
                               role="tab" aria-controls="pills-desktop" aria-selected="true">سطح المكتب</a>
                        </li>
                    <?php endif; ?>

                    <?php if ($mobileWallpaper) : ?>
                        <li class="nav-item">
                            <a class="nav-link<?= $desktopWallpaper ?: ' active' ?>" id="pills-mobile-tab"
                               data-toggle="tab" href="#pills-mobile"
                               role="tab"
                               aria-controls="pills-mobile"
                               aria-selected="<?= $desktopWallpaper ? 'false' : ' true' ?>">موبايل</a>
                        </li>
                    <?php endif; ?>
                </ul>
                <div class="tab-content p-4" id="pills-tabContent">
                    <?php if ($desktopWallpaper) : ?>
                        <div class="tab-pane fade show active" id="pills-desktop" role="tabpanel"
                             aria-labelledby="pills-desktop-tab">
                            <div class="laptop">
                                <div class="screen"
                                     style="background-image: url(<?= $desktopWallpaper['url'] ?>);"></div>
                                <div class="keyboard"></div>
                            </div>
                        </div>
                    <?php endif; ?>

                    <?php if ($mobileWallpaper) : ?>

                        <div class="tab-pane fade<?= $desktopWallpaper ?: ' show active' ?>" id="pills-mobile"
                             role="tabpanel"
                             aria-labelledby="pills-mobile-tab">
                            <div class="smartphone"
                                 style="background-image: url(<?= $mobileWallpaper['url'] ?>);"></div>
                        </div>
                    <?php endif; ?>
                </div>


            </div>
        </div><!--/.row-->
    <?php endwhile;
endif;
?>
<?php get_footer(); ?>