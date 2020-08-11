<div class="wrap">
    <div id="icon-themes" class="icon32"></div>
    <h2><?= $title ?></h2>
    <!--NEED THE settings_errors below so that the errors/success messages are shown after submission - wasn't working once we started using add_menu_page and stopped using add_options_page so needed this-->
    <?php settings_errors(); ?>
    <form method="POST" action="options.php">

        <nav class="nav-tab-wrapper">
            <?php foreach ($tabs as $name => $tab) : ?>
                <a href="?page=qudsinfo-settings&tab=<?= $name ?>"
                   class="nav-tab <?= $tab['active'] ? 'nav-tab-active' : '' ?>"><?= $tab['title'] ?></a>
            <?php endforeach; ?>
        </nav>

        <div class="tab-content">
            <?php $activeTab['instance']->render(); ?>
        </div>
    </form>
</div>
