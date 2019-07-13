<?php /** @var array $newsList */ ?>
<div class="newsbar-settings">
    <h1>شريط الأخبار</h1>

    <div class="row">

        <div class="col-sm-8">
            <div class="newsbar-app" data-json='{"url": "<?= admin_url('admin-post.php') ?>", "items": <?= json_encode($newsList) ?>}'></div>
        </div>
    </div>

</div>