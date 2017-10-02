<?php

// This line is our namespace. You want to keep it unique to you. You will use this throughout the plugin.
namespace Crumbls\Plugin\Example;

// Easy trap door.
defined('ABSPATH') || exit(1);

/**
 * Class Admin
 * @package Crumbls\Plugin\Example
 */
class Admin extends Common
{
    /**
     * We override Common's _init method, but still call it to bring
     * it online.
     */
    protected static function _init()
    {
        /**
         * If you want to call the Common's _init to bring any shared code online,
         * then uncomment the following line.
         */
//        parent::_init();

        /**
         * This functions a lot like a __construct in a instantiated class.
         */

        // Add the getFooter method to admin_footer action.
        add_action('admin_footer', [static::$_class, 'getFooter']);
    }

    /**
     * Display code in the administrative footer.
     * It override's the common
     */
    public static function getFooter()
    {
        ?>
        <p>More content in the Admin footer. This code comes from <?php echo __METHOD__; ?></p>
        <?php
    }
}
