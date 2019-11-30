<?php /** @var array $newsList */ ?>
<div class="newsbar-settings">
    <div class="row">
        <div class="col-sm-8">
            <div class="newsbar-app" data-json='{"url": "<?= admin_url('admin-post.php') ?>", "lang": "ar   ", "items": <?= htmlspecialchars(json_encode($newsListAr), ENT_QUOTES, 'UTF-8') ?>}'></div>
        </div>
    </div>
    <br>
    <hr>
    <br>
    <div class="row">
        <div class="col-sm-8">
            <div class="newsbar-app" data-json='{"url": "<?= admin_url('admin-post.php') ?>", "lang": "en", "items": <?= htmlspecialchars(json_encode($newsListEn), ENT_QUOTES, 'UTF-8') ?>}'></div>
        </div>
    </div>

</div>