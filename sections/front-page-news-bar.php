<?php
/**
 *    The template for displaying the latest news section in front page.
 *
 * @package WordPress
 * @subpackage illdy
 */
?>

<?php
/** @var NewsBar $newsBar */
global $newsBar;
$newsList = $newsBar->getNewsList();
if(count($newsList)) :
?>
<section id="news-bar" class="front-page-section">
        <div class="container">
            <div class="news-bar-content">
                <h3><?= __('Latest News', 'illdy') ?></h3>
                <div class="news-list-wrapper">
                    <ul class="news-list">
                        <?php foreach ($newsList as $item) : ?>
                            <li><?= stripslashes($item) ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div><!--/.container-->
</section><!--/#latest-news.front-page-section-->
<?php
endif;