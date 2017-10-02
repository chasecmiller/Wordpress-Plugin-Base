<?php
/*
Plugin Name: Example OOP Plugin
Plugin URI: https://crumbls.com/writing-wordpress-plugins-the-object-oriented-way/
Description: A very basic OOP plugin example.
Version: 0.1.0
Author: Chase C. Miller
Author URI: https://crumbls.com
*/

// This line is our namespace. You want to keep it unique to you. You will use this throughout the plugin.
namespace Crumbls\Plugin\Example;


// Easy trap door.
defined('ABSPATH') || exit(1);

/**
 * This is our autoloader.
 * It does all of the heavy lifting to find files you are looking for.
 * It searches in the plugin/src directory for classes to automatically include as you call them.
 * That helps keep unneeded classes from hogging resources.
 **/
spl_autoload_register(function ($class) {

    // Simple Sanitization
    $class = str_replace(' ', '', ucwords(preg_replace('#[^\da-z/]#i', ' ', str_replace('\\', '/', $class))));
    // Set file path
    $file = __DIR__ . '/src/' . $class . '.php';

    if (file_exists($file)) {
        require_once($file);
        return true;
    }

    return false;
});

// This is a simple switch to load code if you're in the /wp-admin side of things, or floating around on the front end. We are calling the static getInstance method to get our actual plugin rolling.
if (is_admin()) {
    Admin::getInstance();
} else {
    Common::getInstance();
}

