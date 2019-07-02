<?php
/*
YARPP Template: Qudsinfo Related
Description: Requires a theme which supports post thumbnails
Author: Haitham Athamneh
*/ ?>
<h3><?= __('See more:', 'illdy') ?></h3>
<?php if (have_posts()): ?>
    <ul>
        <?php while (have_posts()) : the_post(); ?>
            <?php if (has_post_thumbnail()): ?>
                <li>
                    <a href="<?php the_permalink() ?>" rel="bookmark"
                       title="<?php the_title_attribute(); ?>">
                        <?php the_post_thumbnail(); ?>
                        <span><?php the_title(); ?> </span>
                    </a>
                </li>
            <?php endif; ?>
        <?php endwhile; ?>
    </ul>

<?php else: ?>
    <p>No related photos.</p>
<?php endif; ?>
