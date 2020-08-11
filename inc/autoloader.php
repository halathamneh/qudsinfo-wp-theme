<?php
/**
 * Dynamically loads the class attempting to be instantiated elsewhere in the
 * plugin.
 *
 * @package QudsinfoAppApi\Inc
 */

spl_autoload_register('qi_theme_autoload');

/**
 * Dynamically loads the class attempting to be instantiated elsewhere in the
 * plugin by looking at the $class_name parameter being passed as an argument.
 *
 * The argument should be in the form: QITheme\Namespace. The
 * function will then break the fully-qualified class name into its pieces and
 * will then build a file to the path based on the namespace.
 *
 * The namespaces in this plugin map to the paths in the directory structure.
 *
 * @param string $class_name The fully-qualified name of the class to load.
 */
function qi_theme_autoload($class_name)
{
    
    // If the specified $class_name does not include our namespace, duck out.
    if ( false === strpos($class_name, 'QITheme') ) {
        return;
    }
    
    $file = str_replace('QITheme\\','',$class_name);
    $file = str_replace('\\','/',$file);
    $filepath = trailingslashit(dirname(__FILE__)) . "$file.php";
    if ( file_exists($filepath) ) {
        include_once($filepath);
    } else {
        wp_die(
            esc_html("The file attempting to be loaded at $filepath does not exist.")
        );
    }
    
}
