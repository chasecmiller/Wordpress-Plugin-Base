<?php

// This line is our namespace. You want to keep it unique to you. You will use this throughout the plugin.
namespace Crumbls\Plugin\Example;

// Easy trap door.
defined('ABSPATH') || exit(1);

/**
 * Class Common
 * @package Crumbls\Plugin\Example
 */
class Common
{

    /**
     * Placeholder for our instance.
     * @var null
     */
    protected static $_instance = NULL;

    /**
     * An easy way to get our current class name
     * @var null
     */
    protected static $_class = NULL;

    /**
     * Prevent direct object creation.
     */
    final private function __construct()
    {
    }

    /**
     * Prevent object cloning.
     */
    final private function __clone()
    {
    }

    /**
     * Returns new or existing Singleton instance.
     * @return Singleton
     */
    final public static function getInstance()
    {
        if (null !== static::$_instance) {
            // Instance already exists, return it.
            return static::$_instance;
        }
        // Declare our instance.
        static::$_instance = new static();
        /**
         * Late model binding to get our class name.
         * Useful for when you extend.
         **/
        static::$_class = get_called_class();
        // Execute our _init method.
        static::_init();
        return static::$_instance;
    }

    /**
     * A static method that executes any time the common code is generated.
     */
    protected static function _init()
    {
        /**
         * This functions a lot like a __construct in a instantiated class.
         */

        // Add the getFooter method to get_footer action.
        add_action('get_footer', [static::$_class, 'getFooter']);
    }

    /**
     * Display code in the administrative footer.
     * It override's the common
     */
    public static function getFooter()
    {
        ?>
        <p>Content in the front end's footer. This code comes from <?php echo __METHOD__; ?></p>
        <?php
    }
}
