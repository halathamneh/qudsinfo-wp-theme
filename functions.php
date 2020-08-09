<?php
/**
 *    Sets up theme defaults and registers support for various WordPress features.
 *
 *    Note that this function is hooked into the after_setup_theme hook, which
 *    runs before the init hook. The init hook is too late for some features, such
 *    as indicating support for post thumbnails.
 */

require_once 'inc/autoloader.php';

use QITheme\QITheme;

define('QI_THOUGHTS_CAT_ID', 2351); // خواطر
define('QI_POETRY_CAT_ID', 16254); // شعر


QITheme::getInstance();
