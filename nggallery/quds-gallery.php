<?php
/**
 * Template Page for the gallery overview
 *
 * Follow variables are useable :
 *
 * $gallery     : Contain all about the gallery
 * $images      : Contain all images, path, title
 * $pagination  : Contain the pagination content
 *
 * You can check the content when you insert the tag <?php var_dump($variable) ?>
 * If you would like to show the timestamp of the image ,you can use <?php echo $exif['created_timestamp'] ?>
 **/
?>
<?php if ( ! defined('ABSPATH') ) die ('No direct access allowed'); ?><?php if ( ! empty ($gallery) ) : ?>

    <div class="ngg-galleryoverview" id="<?php echo $gallery->anchor ?>">
        
        <!-- Thumbnails -->
        <?php foreach ($images as $image) : ?>

            <div id="ngg-image-<?php echo $image->pid ?>"
                 class="ngg-gallery-thumbnail-box" <?php echo $image->style ?> >
                <div class="ngg-gallery-thumbnail">
                    <a href="<?php echo $image->imageURL ?>"
                       title="<?php echo (trim($image->description) == '') ? $image->alttext : $image->description; ?>" <?php echo $image->thumbcode ?>
                       data-fancybox="group" data-caption="<?= $gallery->title ?>">
                        <?php if ( ! $image->hidden ) { ?>
                            <img title="<?php echo $image->alttext ?>" alt="<?php echo $image->alttext ?>"
                                 src="<?php echo $image->thumbnailURL ?>" <?php echo $image->size ?> />
                        <?php } ?>
                        <?php /* <div class="photo-title"><?php echo (trim($image->description) == '') ? $image->alttext : $image->description; ?></div>  ?>
				<div class="photo-overlay"><i class="fa fa-search-plus" aria-hidden="true"></i></div> */ ?>
                    </a>
                </div>
            </div>
            
            <?php if ( $image->hidden ) continue; ?>
            <?php if ( $gallery->columns > 0 && ++$i % $gallery->columns == 0 ) { ?>
                <br style="clear: both"/>
            <?php } ?>
        
        <?php endforeach; ?>

        <!-- Pagination -->
        <?php echo $pagination ?>

    </div>

<?php endif; ?>