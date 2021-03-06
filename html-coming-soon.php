<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              mailto:ialvsconcelos@gmail.com
 * @since             1.0.0
 * @package           Html_Coming_Soon
 *
 * @wordpress-plugin
 * Plugin Name:       HTML Coming Soon
 * Plugin URI:        https://alvsconcelos.me
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            Alvaro Vasconcelos - @alvsconcelos
 * Author URI:        mailto:ialvsconcelos@gmail.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       html-coming-soon
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if (!defined('WPINC')) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define('HTML_COMING_SOON_VERSION', '1.0.0');
define('HTML_COMING_SOON_PATH', plugin_dir_path(__FILE__));
define('HTML_COMING_SOON_URL', plugin_dir_url(__FILE__));
define('HTML_COMING_SOON_SLUG', 'html-coming-soon');

require __DIR__ . '/vendor/autoload.php';

use PluginNamePlugin\Html_Coming_Soon;
new Html_Coming_Soon(__FILE__);