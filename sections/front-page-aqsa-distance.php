<?php
/**
 *    The template for displaying about section in front page.
 *
 * @package WordPress
 * @subpackage illdy
 */
?>
<?php
?>
<section id="aqsa-distance" class="front-page-section aqsa-distance">
    <div class="container">
        <div class="section-header">
            <img src="<?= get_template_directory_uri() . "/layout/src/images/pin.png" ?>" alt="">
            <?= __("Your distance from Aqsa", 'illdy') ?>
        </div>
<!--        <span>--><?//= __("Please allow location permission to find your distance from Aqsa", 'illdy') ?><!--</span>-->

        <div class="section-content">
            <button class="btn btn-lg btn-aqsa-distance" id="aqsa-distance-button"><?= __('Click to find distance!', 'illdy') ?></button>
            <svg viewBox="0 0 100 150" width="50" height="75">
                <g>
                    <path d="M 50,100 A 1,1 0 0 1 50,0"/>
                </g>
                <g>
                    <path d="M 50,75 A 1,1 0 0 0 50,-25"/>
                </g>
                <defs>
                    <linearGradient id="gradient" x1="0%" y1="0%" x2="0%" y2="100%">
                        <stop offset="0%" style="stop-color:#FF6E41;stop-opacity:1" />
                        <stop offset="100%" style="stop-color:#eab44e;stop-opacity:1" />
                    </linearGradient>
                </defs>
            </svg>
        </div>
    </div>
</section><!--/#aqsa-distance.front-page-section-->