<?php
/**
 *    Template Name: news
 *
 *    The template for dispalying Custom Page Template: Blog.
 *
 * @package WordPress
 * @subpackage illdy
 */
?>

<?php
$singleGroup = false;
if (isset($_GET['group']) && !empty($_GET['group'])) {
    $terms = get_terms([
        'taxonomy' => 'news-groups',
        'slug'     => $_GET['group'],
    ]);
    $singleGroup = true;
} else {
    $terms = get_terms('news-groups');
}
?>

<?php get_header();
?>

    <div class="news-page__header">
        <svg viewBox="0 0 2600 650" preserveAspectRatio="xMinYMin meet">
            <defs>
                <clipPath id="jerusalemMask">
                    <path
                            d="m -1.47852,-3.21094 -5.06054,778.24056 h 608.35934 l 0.0528,-10.22884 c 11.29416,0 22.62223,-0.14652 33.92968,0.0527 3.28195,0.0531 2.01952,-5.934 2.05274,-9.35547 0.0598,-7.54051 5.08269,-11.1075 12.25781,-9.22071 2.2389,0.58464 2.91634,2.11896 3.0625,4.23828 0.14616,2.11933 0.36499,3.57487 3.49414,2.14649 5.8796,-2.65745 8.96286,-0.66535 9.90625,5.66601 0.13952,0.96997 0.17264,1.99391 1.07617,2.5254 1.7672,0.9899 3.85908,1.24899 5.36719,-0.0996 2.15918,-1.92665 7.07706,0.20684 6.83789,-5.4336 -0.42519,-9.86578 -0.12109,-19.75179 -0.12109,-29.63086 0,-1.60775 0.17272,-3.32271 -1.6875,-4.08007 -6.27822,-2.49136 -7.61903,-7.65236 -7.88477,-13.69141 -0.2126,-4.80999 -0.18078,-9.56693 -1.23047,-14.47656 -0.8371,-3.93967 -1.32862,-7.12845 -3.70703,-10.72266 -2.15254,-3.23544 -1.09446,-8.33792 -0.37695,-12.62305 0.21259,-1.26894 1.40679,-2.09955 2.80859,-2.23242 1.10949,-0.1063 2.22608,-0.14608 3.32227,-0.16601 10.62981,-0.17938 10.63086,-0.17909 10.63086,-11.08789 0,-4.65054 -0.15287,-9.25534 0.13281,-13.85938 0.3056,-4.93621 2.27128,-8.94346 7.05469,-11.3418 3.23544,-1.62769 4.22575,-4.89494 4.26562,-8.3164 0.0864,-3.24209 1.31483,-5.12229 4.80274,-5.0625 3.19558,0.0598 6.81013,-0.5186 6.86328,4.33789 0,2.65745 2.07312,3.86614 3.62109,5.31445 4.12569,3.89317 6.38374,8.31062 6.04492,14.2168 -0.35876,6.35131 0.2404,12.76392 -0.125,19.11523 -0.24582,4.18548 1.28851,5.16186 5.11524,4.84961 3.82673,-0.31225 7.64007,0 11.4668,0 2.92984,0 4.19791,1.3678 4.49023,4.32422 0.63114,6.49746 -0.61776,11.61956 -7.11523,15.00781 -3.03613,1.58782 -2.139,5.90018 -2.28516,8.9961 -0.33883,7.15519 -0.19845,14.33739 -0.17188,21.50586 0,2.74382 -0.32039,4.92186 -3.5957,5.79882 -2.35184,0.6245 -3.1824,2.61876 -3.20898,5.20313 -0.11294,9.52032 0.73817,19.07267 -0.75,28.5664 -0.42519,2.70399 0.107,4.79714 3.63476,4.23243 3.654,-0.57799 6.99443,0.66512 9.80469,2.6582 2.81025,1.99309 5.8999,1.40761 8.7168,0.98242 2.8169,-0.42519 4.44494,-2.65636 4.39843,-5.86523 -0.093,-5.8929 0.37916,-11.82079 -0.0859,-17.67383 -0.34546,-4.33164 1.3679,-8.04394 2.37109,-11.95703 0.96332,-3.73372 4.64995,-2.45892 7.36719,-2.5918 2.40499,-0.11958 5.13727,-0.13347 5.6289,3.04883 1.52803,9.91893 8.40345,18.74163 5.97852,29.48437 -0.59128,2.65745 1.38233,4.18035 3.32227,5.31641 2.31198,1.32872 2.13774,-1.99327 3.32031,-2.19922 4.80334,-0.66436 8.85624,-3.14334 13.20117,-4.92383 1.60776,-0.66436 4.17961,0.0675 4.3457,1.92774 0.40526,4.41801 3.32143,3.65427 6.0586,3.6543 2.22922,-0.10308 4.46162,-0.0905 6.68945,0.0391 4.49773,0.4717 7.63467,-4.5e-4 6.99023,-5.91992 -0.34546,-3.1225 2.41875,-3.6668 5.00977,-3.66016 9.08183,0 18.19631,-0.41241 27.23828,0.25195 4.82327,0.35876 8.67718,-2.46455 13.38086,-2.25195 4.9495,0.22588 9.39905,2.10622 14.10938,3.04297 3.42811,0.66436 10.81719,-3.98556 10.81054,-7.40039 0,-1.7207 -0.0345,-3.03001 -2.37304,-3.18946 -2.88998,-0.20595 -3.32032,-2.43757 -3.32032,-4.86914 0,-2.29205 0.61681,-4.36635 3.20117,-4.50586 3.11586,-0.16609 2.60398,-2.25819 2.45118,-4.02539 -1.02976,-11.82565 2.06653,-22.7005 7.83984,-32.83203 3.46133,-6.07891 7.62071,-11.33436 13.67969,-15.66601 5.94612,-4.25192 12.31638,-7.30776 18.52148,-10.88867 2.9299,-1.6875 3.98633,-4.99724 3.98633,-8.51172 0.08,-5.97926 6.43082,-9.22096 11.66602,-6.0586 1.9931,1.20914 1.92708,3.18977 1.80078,5.08985 -0.2657,3.98617 1.78012,5.79191 4.98242,8.11718 10.1049,7.30799 22.18968,12.35883 29.51758,23.10157 3.5256,5.13019 6.17515,10.80851 7.83984,16.80664 1.7805,6.43767 1.59404,12.76311 1.74024,19.1875 -0.0666,1.27995 0.4183,2.52697 1.33007,3.42773 3.8799,3.67392 2.94951,8.11883 1.44141,12.29102 -0.8039,2.23891 -1.59433,4.77042 -0.29883,6.25195 1.3885,1.58118 4.03854,0.90278 6.17774,-0.0606 5.9793,-2.65745 13.77343,-1.38763 18.15823,3.23633 3.0561,3.22216 6.9086,4.71644 11.2402,6.35742 0,-8.14509 0.1465,-15.94453 -0.053,-23.71093 -0.1196,-4.50438 1.621,-6.33717 6.1719,-6.21094 7.4807,0.21259 14.9689,0.21259 22.4629,0 4.5974,-0.12623 6.2508,1.81361 6.1113,6.27148 -0.206,6.52404 -0.067,13.06112 0,19.5918 0,0.88361 -0.4321,1.9927 0.5645,2.58398 0.9965,0.59129 1.8329,-8.4e-4 2.5371,-0.73828 3.8068,-3.91309 8.5308,-5.06229 13.8125,-4.65039 1.5812,0.11294 3.2368,-0.28567 4.7715,0 6.5703,1.26894 12.7142,-2.45658 19.0722,-1.73242 5.9793,0.66436 12.0724,1.16784 17.8457,3.1875 1.7074,0.59792 3.8327,1.0693 5.002,-0.14648 3.9862,-4.15227 10.1915,-6.9958 8.8828,-14.57618 -0.6644,-3.747 0.9561,-6.09149 5.3144,-5.8789 4.0991,0.20596 4.5387,2.86267 4.3594,5.94531 -0.3123,5.54743 0.405,10.63138 4.8496,14.66406 3.0694,2.77039 6.3836,4.36997 10.5957,4.26367 5.4146,-0.14616 10.8421,-0.16609 16.25,0 4.9694,0.1528 9.5469,-0.33744 14.0313,-3.05468 3.1292,-1.90672 7.5485,-1.59427 10.7109,-0.46485 5.2019,1.85357 10.6301,0.92347 16.0313,2.59766 0,-5.97926 0.153,-11.83993 -0.053,-17.71289 -0.1462,-4.41137 1.4284,-6.43678 6.0723,-6.31055 7.7996,0.21259 15.6118,0.12586 23.418,0.0527 3.6009,-0.0399 5.241,1.52022 5.2011,5.15429 -0.073,6.85622 0,13.70707 0,20.55664 0,1.74063 -0.178,3.46109 1.3301,4.84961 1.2092,1.0962 2.1312,1.99395 3.0215,-0.20507 0.1447,-0.28625 0.3622,-0.53003 0.6309,-0.70508 3.8733,-2.9099 10.1715,-3.78663 9.082,-10.88868 -0.033,-0.25246 0.7308,-0.95042 1.0098,-0.89062 6.4974,1.37523 10.969,-4.84936 17.2207,-4.53711 2.7172,0.13287 5.0557,0.49757 6.205,3.28125 0.4916,-0.31889 0.9773,-0.49133 0.9707,-0.66406 -0.5514,-11.26095 9.5539,-14.00478 15.7989,-19.83789 3.0362,-2.84347 6.9746,-4.15915 10.3496,-6.35157 5.3747,-3.50117 8.1798,-8.91546 8.791,-15.33984 0.4053,-4.25192 2.2057,-5.98024 6.2051,-4.75781 3.5477,1.0962 8.0707,1.94121 7.3066,7.56836 -0.1063,0.74409 -0.073,1.94594 0.3789,2.27148 4.6971,3.38825 6.2927,9.30171 11.8535,12.4375 12.0316,6.84957 20.8192,16.96162 24.1211,31.01953 0.8703,3.70715 4.1332,2.03267 5.834,1.47461 7.3079,-2.40499 14.5429,-2.09968 21.791,-0.21289 1.1693,0.30561 1.7016,-0.33275 2.5254,-0.45898 6.8695,-1.06298 13.7786,-1.9136 20.5352,0.53125 1.5065,0.45067 3.0813,0.62896 4.6504,0.52539 9.8724,0.0531 19.7584,0.19931 29.6308,0 4.3781,-0.0731 7.215,1.39536 8.7696,5.60742 0.7042,1.90672 2.1578,3.75348 4.4433,3.83984 2.5644,0.093 4.1728,-1.88029 4.7774,-3.98632 0.8504,-2.98299 2.8308,-3.90723 5.3554,-3.46875 3.634,0.63114 5.3142,-1.32684 6.1446,-4.1836 0.7773,-2.65745 2.3848,-3.42298 4.8828,-3.5625 2.498,-0.13952 5.9201,1.21608 7.3086,-0.66406 2.6574,-3.57427 6.1789,-7.01553 6.8964,-11.5332 0.1741,-1.14607 0.4617,-2.27177 0.8575,-3.36133 v -1.44141 c 0.5597,-0.62347 1.1684,-1.20227 1.8203,-1.72851 2.9328,-3.24078 8.0223,-3.24078 10.9551,0 0.6519,0.52624 1.2606,1.10504 1.8203,1.72851 v 1.52735 c 0.3958,1.08956 0.6832,2.21524 0.8574,3.36132 0.7175,4.51767 4.2569,7.97223 6.8945,11.53321 1.4084,1.91337 4.8306,0.55306 7.3086,0.66601 2.4781,0.11294 4.1055,0.88981 4.8828,3.56055 0.8305,2.84347 2.5124,4.8167 6.1465,4.18555 2.5245,-0.43848 4.5031,0.4838 5.3535,3.46679 0.6046,2.10603 2.2118,4.07934 4.7696,3.98633 2.2921,-0.0864 3.7488,-1.93312 4.4531,-3.83984 1.5546,-4.21206 4.3913,-5.6805 8.7695,-5.60742 9.8724,0.17273 19.7499,0 29.6289,0 1.5691,0.10358 3.1459,-0.0728 4.6524,-0.52344 6.7565,-2.44485 13.6656,-1.59618 20.5351,-0.5332 0.8238,0.12623 1.3284,0.76459 2.5176,0.45898 7.2549,-1.88679 14.4822,-2.19211 21.7969,0.21289 1.7007,0.55806 4.9637,2.23253 5.834,-1.47461 3.3218,-14.05791 12.0914,-24.16995 24.123,-31.01953 5.5607,-3.16236 7.1553,-9.04925 11.8457,-12.4375 0.4517,-0.32554 0.4911,-1.5274 0.3848,-2.27148 -0.7972,-5.62715 3.7277,-6.47021 7.2754,-7.56641 3.9861,-1.23572 5.7998,0.50394 6.205,4.75586 0.6112,6.42439 3.4144,11.83865 8.7891,15.33984 3.3684,2.1924 7.3088,3.50809 10.3516,6.35156 6.245,5.8331 16.3483,8.57695 15.7968,19.8379 0,0.1528 0.4792,0.32523 0.9708,0.66406 1.1491,-2.78368 3.4886,-3.14838 6.1992,-3.28125 6.2583,-0.31225 10.7224,5.91234 17.2265,4.53711 0.2791,-0.0598 1.0419,0.66474 1.002,0.89062 -1.0895,7.10203 5.2166,7.97212 9.0898,10.88867 0.2687,0.17505 0.4862,0.41884 0.6309,0.70508 0.8903,2.21897 1.8143,1.32785 3.0234,0.20508 1.528,-1.38852 1.3282,-3.10898 1.3282,-4.84961 0,-6.84958 0.073,-13.69846 0,-20.55469 -0.04,-3.63406 1.6002,-5.19611 5.2011,-5.15625 7.8062,0.0731 15.6202,0.15982 23.4199,-0.0527 4.6505,-0.12623 6.2173,1.89918 6.0645,6.31055 -0.1993,5.87296 -0.045,11.7602 -0.045,17.71289 5.4013,-1.67419 10.8225,-0.74408 16.0312,-2.59766 3.1623,-1.12941 7.5798,-1.44188 10.709,0.46484 4.4778,2.71724 9.0626,3.20944 14.0254,3.05665 5.4145,-0.16612 10.8354,-0.14617 16.25,0 4.2187,0.10626 7.5329,-1.49524 10.5957,-4.26563 4.4512,-4.03268 5.1697,-9.11469 4.8574,-14.66211 -0.1793,-3.08265 0.2583,-5.74133 4.3574,-5.94726 4.3648,-0.21259 5.9788,2.13385 5.3145,5.88085 -1.3288,7.58038 4.8708,10.42392 8.877,14.57618 1.1759,1.21579 3.3223,0.74441 5.0097,0.14648 5.7734,-1.99308 11.8646,-2.5118 17.8438,-3.18945 6.358,-0.72415 12.5036,3.0033 19.0742,1.73437 1.5346,-0.29896 3.1883,0.0996 4.7695,0 5.2817,-0.38533 10.0057,0.76387 13.8125,4.65039 0.7042,0.72415 1.5804,1.28111 2.5371,0.73633 0.9566,-0.54478 0.5597,-1.70038 0.5664,-2.58398 6.2078,-12.86113 3.1541,20.34453 18.4317,20.34179 l 618.0429,-0.0605 -0.045,-777.96094 z"
                    ></path>
                </clipPath>
                <linearGradient id="lgrad" x1="35%" y1="100%" x2="65%" y2="0%">
                    <stop offset="0%" style="stop-color:rgb(94,65,117);stop-opacity:0.85"/>
                    <stop offset="36%" style="stop-color:rgb(94,65,117);stop-opacity:0.85"/>
                    <stop offset="100%" style="stop-color:rgb(66,40,124);stop-opacity:0.85"/>
                </linearGradient>

            </defs>
            <g clip-path="url(#jerusalemMask)">
                <image xlink:href="<?= get_template_directory_uri() ?>/layout/src/images/bg2.jpg"
                       preserveAspectRatio="xMinYMin slice" width="100%" y="-70%"/>
                <rect x="0" y="0" width="100%" height="100%" fill="url(#lgrad)"/>
            </g>
        </svg>
        <div class="news-page__header-content">
            <div class="container">
                <h1><?= __('Quds News', 'illdy') ?></h1>
            </div>
        </div>
    </div>

    <div class="container">

        <?php foreach ($terms as $term) : ?>
            <div class="news-header mt-5 pb-3 mb-3 border-bottom"
                 style="border-color: #eee;">
                <h1 class="mb-0"><?= $term->name ?></h1>
            </div>
            <section <?= $singleGroup ? 'id="blog"' : '' ?> class="news-team__latest ">
                <?php
                $news = true;
                do_action('mtl_above_content_after_header'); ?>
                <?php
                $paged = (get_query_var('paged')) ? absint(get_query_var('paged')) : 1;
                $wp_query_args = array(
                    'post_type'              => array('news'),
                    'cache_results'          => true,
                    'update_post_meta_cache' => true,
                    'update_post_term_cache' => true,
                    'tax_query'              => [
                        [
                            'taxonomy' => 'news-groups',
                            'field'    => 'term_id', // Since WP 3.5
                            'terms'    => $term->term_id,
                        ],
                    ],
                );
                if ($singleGroup) {
                    $wp_query_args['paged'] = $paged;
                } else {
                    $wp_query_args['posts_per_page'] = 6;
                }


                $wp_query = new WP_Query($wp_query_args);

                if ($wp_query->have_posts()): ?>
                    <div class="<?= $singleGroup ? 'row' : 'owl-carousel' ?>">
                        <?php while ($wp_query->have_posts()): $wp_query->the_post(); ?>
                            <?php $post_thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'illdy-front-page-latest-news'); ?>
                            <div class="<?= $singleGroup ? 'col-md-4 col-sm-6 col-12 mb-5' : 'owl-item' ?>">
                                <div class="post card shadow h-100 <?= $singleGroup ?: 'm-3' ?>"
                                     style="<?php if (!$post_thumbnail): echo 'padding-top: 40px;'; endif; ?>">
                                    <?php if ($post_thumbnail): ?>
                                        <div class="post-image card-img-top"
                                             style="background-image: url(<?php echo esc_url($post_thumbnail[0]); ?>)"></div>
                                    <?php endif; ?>
                                    <div class="card-body d-flex flex-column">
                                        <div class="post-meta">
                                            <span class="post-meta-time"><i
                                                        class="fa fa-clock-o"></i> <?= get_the_date(); ?></span>
                                        </div>
                                        <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"
                                           class="post-title card-title"><?php the_title(); ?></a>
                                        <div class="post-entry">
                                            <?php the_excerpt(); ?>
                                        </div><!--/.post-entry-->
                                        <a href="<?php the_permalink(); ?>"
                                           title="<?php _e('أكمل القراءة', 'illdy'); ?>"
                                           class="btn btn-outline-success mb-3 mt-auto"><?php _e('أكمل القراءة ', 'illdy'); ?>
                                            <i
                                                    class="fa fa-chevron-circle-left"></i></a>
                                    </div>
                                </div><!--/.post-->
                            </div><!--/.col-sm-4-->

                            <?php // get_template_part('template-parts/content', 'news'); ?>
                        <?php endwhile; ?>
                    </div>
                <?php else:
                    get_template_part('template-parts/content', 'none');
                endif;

                wp_reset_postdata();
                ?>

                <?php if ($singleGroup) : ?>
                    <?php do_action('mtl_after_content_above_footer'); ?>
                <?php else: ?>
                    <div class="d-flex align-items-center justify-content-center my-4">
                        <a href="/qudsnews/?group=<?= $term->slug ?>"
                           class="btn btn-lg btn-success d-inline-flex align-items-center justify-content-center"
                        ><?= __('Show More', 'illdy') ?></a>
                    </div>
                <?php endif; ?>
            </section><!--/#blog-->
        <?php endforeach; ?>
    </div><!--/.container-->
<?php get_footer(); ?>