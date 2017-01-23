<?php

namespace Crumbls\Plugin\Skeleton;

defined('ABSPATH') or exit(1);

/**
 * Class Plugin
 * @package Crumbls\Plugin\Skeleton
 */
class Plugin {
    public function __construct() {
        // Bring our rest interface online, example only.
        new Rest();

    }

    /**
     * Plugin activation hook
     */
    public function activate() {

    }

    /**
     * Plugin deactivation hook
     */
    public function deactivate() {

    }
}