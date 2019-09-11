<?php
/**
 *    Template name: Wallpapers
 *
 *    The template for displaying Custom Page Template: No Sidebar.
 *
 * @package WordPress
 * @subpackage QudsInfoTheme
 */
?>
<?php get_header();
$paged = (get_query_var('paged')) ? absint(get_query_var('paged')) : 1;
$type  = isset($_GET['type']) && ($_GET['type'] == 'desktop' || $_GET['type'] == 'mobile') ? $_GET['type'] : 'desktop';

$post_query_args  = array(
    'post_type'              => array('wallpapers'),
    'posts_per_page'         => 16,
    'paged'                  => $paged,
    'cache_results'          => true,
    'update_post_meta_cache' => true,
    'update_post_term_cache' => true,
    'meta_query'             => array(
        array(
            'key'     => $type,
            'value'   => '',
            'compare' => '!='
        )
    )
);
$post_query       = new WP_Query($post_query_args);
$pagination_query = $post_query;

?>
    <div class="wallpapers">
        <div class="container-fluid">
            <div class="page-heading">
                <h1 class="text-light"><?= get_the_title() ?></h1>
                <ul class="nav nav-pills d-flex justify-content-center" id="pills-tab" role="tablist">
                    <li class="nav-label">نوع الصورة:</li>
                    <li class="nav-item">
                        <a href="/wallpapers/?type=desktop"
                           class="nav-link <?= $type == 'desktop' ? 'active' : '' ?>"><?= __('Desktop', 'qi-theme') ?></a>
                    </li>
                    <li class="nav-item">
                        <a href="/wallpapers/?type=mobile"
                           class="nav-link <?= $type == 'mobile' ? 'active' : '' ?>"><?= __('Mobile', 'qi-theme') ?></a>
                    </li>
                </ul>
            </div>
            <div class="wallpapers-content px-md-5">
                <?php if ($post_query->have_posts()) : ?>
                    <div class="row mb-5 py-3">
                        <?php while ($post_query->have_posts()) : $post_query->the_post();
                            $desktopWallpaper = get_field('desktop');
                            $mobileWallpaper  = get_field('mobile');
                            if ($desktopWallpaper)
                                $thumbnail = $desktopWallpaper['sizes']['thumbnail'];
                            elseif ($mobileWallpaper)
                                $thumbnail = $mobileWallpaper['sizes']['thumbnail'];
                            if (!isset($thumbnail) || empty($thumbnail)) continue;
                            ?>
                            <div class="col-lg-3 col-md-4 col-sm-12 col-12 wallpaper-col">
                                <div class="card">
                                    <a href="<?php the_permalink() ?>">
                                        <img class="card-img" src="<?= $thumbnail ?>"/>
                                        <div class="card-img-overlay d-flex flex-column align-items-center">
                                            <h5 class="card-title"><?php the_title() ?></h5>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    </div>

                    <?php
                    $prev_arrow = is_rtl() ? '&rarr;' : '<i class="fa fa-angle-right"></i>';
                    $next_arrow = is_rtl() ? '&larr;' : '<i class="fa fa-angle-left"></i>';

                    $total = $pagination_query->max_num_pages;
                    $big   = 999999999; // need an unlikely integer
                    if ($total > 1) {
                        if (!$current_page = $pagination_query->get('paged'))
                            $current_page = 1;
                        if (get_option('permalink_structure')) {
                            $format = 'page/%#%/';
                        } else {
                            $format = '&paged=%#%';
                        }
                        ?>
                        <nav class="paginate-links text-muted">
                            <?php
                            echo paginate_links(array(
                                'base'      => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
                                'format'    => $format,
                                'current'   => max(1, $pagination_query->get('paged')),
                                'total'     => $total,
                                'type'      => 'plain',
                                'prev_text' => $prev_arrow,
                                'next_text' => $next_arrow,
                            ));
                            ?>
                        </nav><!--/.paginate-links-->
                        <?php
                    }
                    ?>
                <?php else: ?>
                    <p class="py-5 text-center text-muted">لا يوجد صور خلفيات</p>
                <?php endif; ?>
            </div>
        </div><!--/.container-->
    </div>
<?php get_footer(); ?>