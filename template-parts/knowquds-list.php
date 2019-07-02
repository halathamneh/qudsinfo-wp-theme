<?php
$args = [
    "post_type" => 'image_point',
    "nopaging" => true,
    "order" => "ASC"
];
$obj = $wp_query->get_queried_object();
if($obj instanceof WP_Post) {
    $terms =  wp_get_post_terms($obj->ID, 'knowquds');
    $term_id =$terms[0]->term_id;
} elseif ($obj instanceof WP_Term)
    $term_id = $obj->term_id;

if (isset($term_id) && !empty($term_id)) {
    $args['tax_query'] = [
        [
            'taxonomy' => "knowquds",
            'terms'    => [$term_id],
        ],
    ];
}
$ips = new WP_Query($args);

if (!wp_is_mobile()) :?>
    <div class="col-md-2 knowquds-list">
        <h3 class="cats-title">اختر:</h3>
        <ul>
            <?php
            while ($ips->have_posts()) : $ip = $ips->next_post(); ?>
                <li <?= $post->ID == $ip->ID ? "class='active'" : "" ?>>
                    <a href="<?= get_permalink($ip) ?>" class="front-category">
                        <div class="front-cat-name"><?= $ip->post_title ?></div>
                    </a>
                </li>
            <?php endwhile; ?>
        </ul>
    </div>
<?php else: ?>
    <div class="col-md-3">
        <div class="knowquds-list dropdown">
            <span>اختر:</span>
            <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenu1"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="selected-value"><?= $post->post_title ?? "اختر" ?></span>
                <span class="caret"></span>
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                <?php
                while ($ips->have_posts()) : $ip = $ips->next_post();
                    ?>
                    <li <?= $post->ID == $ip->ID ? "class='active'" : "" ?>>
                        <a href="<?= get_permalink($ip) ?>" class="front-category">
                            <div class="front-cat-name"><?= $ip->post_title; ?></div>
                        </a><!--/.post-->
                    </li>
                <?php
                endwhile; ?>
            </ul>
        </div>
    </div>
<?php
endif; ?>