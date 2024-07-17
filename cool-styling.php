<?php

/*
Plugin Name: Cool Styling
Plugin URL: https://plugins.cool/cool-styling
Description: Custom styling for your WordPress admin area.
Version: 0.1
Author: Cool Plugins Team
Author URI: https://plugins.cool
Text Domain: cool_styling
*/

/**
 * UML :
 *
 * Create a Cool_Styling class to serve as the bootstrap for the plugin.
 * Add a panel to write options (TPS: add syntax highlighting) via the Cool_Settings class
 * Create a type of button that allows you to click on an element to get its selector.
 * Ensure that the style is applied immediately to see the changes directly.
 */

/**
 * TODO:
 * - Saves Options
 * - Preview Changes every time the textarea is updated
 * - Dont select the updateButton lol
 *
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

// -- CONSTANTS -- //
define('cool_styling_version', '0.1.0');
define('cool_styling_url', plugin_dir_url(__FILE__)); // URL to the plugin directory.
define('cool_styling_path', plugin_dir_path(__FILE__)); // Path to the plugin directory.

// -- IMPORTS -- //
require_once "admin/settings.php";

/**
 * Class Cool_Styling :
 *
 * Init the others class
 * Create an instance of itself
 *
 * @since 0.1.0
 */
class Cool_Styling
{
    // Refers to a single instance of this class
    private static ?Cool_Styling $instance = null;

    /**
     * Creates or returns a single instance of this class
     *
     * @return Cool_Styling|null a single instance of this class
     * @since 0.1.0
     */
    public static function self(): ?Cool_Styling
    {
        if (null == self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function __construct()
    {
        // Init the options page
        new Cool_Settings();
    }
}

Cool_Styling::self();