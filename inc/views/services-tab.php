<div style="display: flex; flex-wrap: wrap;">
    <?php foreach ($services as $name => $service) : ?>
        <div style="flex: 1 1 33.33%; max-width: 33.33%;">
            <h3><?= $service['title'] ?></h3>
            <div>
                <label for="<?= $name ?>_ar">
                    <input type="checkbox" name="services[<?= $name ?>][ar]"
                           id="<?= $name ?>_ar" <?= isset($service['ar']) && $service['ar'] ? 'checked' : '' ?>>
                    Enable in Arabic
                </label>
            </div>
            <div>
                <label for="<?= $name ?>_en">
                    <input type="checkbox" name="services[<?= $name ?>][en]"
                           id="<?= $name ?>_en" <?= isset($service['en']) && $service['en'] ? 'checked' : '' ?>>
                    Enable in English
                </label>
            </div>
            <hr>
        </div>
    <?php endforeach; ?>
</div>
<input type="hidden" name="action" value="services_form">
<?php submit_button(); ?>
