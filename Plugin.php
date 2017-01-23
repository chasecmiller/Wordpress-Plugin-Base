<?php
/*
Plugin Name: Wordpress Plugin Base
Plugin URI: https://github.com/chasecmiller/Wordpress-Plugin-Base
Description: Description plugin
Version: 1.0
Author: Author Name
Text Domain: crumbls-plugins-skeleton
Domain Path: /Assets/Language/

	License: GNU General Public License v3.0
	License URI: http://www.gnu.org/licenses/gpl-3.0.html
*/

namespace Crumbls\Plugin\Skeleton;

$td = str_replace('\\', '-', strtolower(__NAMESPACE__));
$assets = dirname(__FILE__).'/Assets/';
/**
 * Localization
 */
load_plugin_textdomain($td, false, $assets.'Language/');


require(dirname(__FILE__).'/ClassAutoLoader.php');
$loader = \ClassAutoloader::getLoader();
$loader->add('', $assets);

$plugin = null;
if (is_admin()) {
    $plugin = new Admin();
} else {
    $plugin = new Plugin();
}

// Activation Hook
register_activation_hook(
    __FILE__,
    [$plugin, 'activate']
);

// Deactivation Hook
register_deactivation_hook(
    __FILE__,
    [$plugin, 'deactivate']
);