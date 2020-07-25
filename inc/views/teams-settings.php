<?php
/** @var \QITheme\TeamsSettings\Team[] $teams */
?>
<div class="wrap">
    <div id="icon-themes" class="icon32"></div>
    <h2><?= $title ?></h2>
    <!--NEED THE settings_errors below so that the errors/success messages are shown after submission - wasn't working once we started using add_menu_page and stopped using add_options_page so needed this-->
    <?php settings_errors(); ?>
    <form method="POST" action="options.php">

        <nav class="nav-tab-wrapper">
            <?php foreach ($teams as $name => $team) : ?>
                <a href="?page=teams-settings&tab=<?= $name ?>"
                   class="nav-tab <?php if ($tab === $name): ?>nav-tab-active<?php endif; ?>"><?= $team->getTitle() ?></a>
            <?php endforeach; ?>
        </nav>

        <div class="tab-content">
            <?php
            settings_fields('teams_' . $tab . '_settings');
            do_settings_sections('teams_' . $tab . '_settings');
            ?>
        </div>
        <?php submit_button(); ?>
    </form>
</div>
