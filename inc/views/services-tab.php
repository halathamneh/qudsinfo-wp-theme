<div style="display: flex; flex-wrap: wrap;">
    <?php foreach ($services as $name => $service) : ?>
        <div style="flex: 1 1 33.33%; max-width: 33.33%;">
            <h3><?= $service['title'] ?></h3>
            <div>
                <label for="<?= $name ?>_enable">
                    <input type="checkbox" name="services[<?= $name ?>][enable]"
                           id="<?= $name ?>_enable" <?= $service['enable'] ? 'checked' : '' ?>>
                    Enable
                </label>
            </div>
            <hr>
        </div>
    <?php endforeach; ?>
</div>
<input type="hidden" name="action" value="services_form">
<?php submit_button(); ?>
