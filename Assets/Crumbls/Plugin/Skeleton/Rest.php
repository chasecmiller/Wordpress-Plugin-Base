<?php
namespace Crumbls\Plugin\Skeleton;

defined('ABSPATH') or exit(1);

/**
 * Class Plugin
 * @package Crumbls\Plugin\Skeleton
 */
class Rest {
    private $namespace;

    /**
     * Plugin constructor.
     */
    public function __construct()
    {
        // REST Namespace overload.
        $this->namespace = str_replace('\\', '/', __NAMESPACE__);

        // Bring routes online.
        add_action( 'rest_api_init', [&$this, 'registerRoutes']);
    }

    /**
     * Route registration
     */
    public function registerRoutes() {
        /**
         * Route: Browse
         */
        register_rest_route(
            $this->namespace,
            '/browse',
            [
                [
                    'methods' => \WP_REST_Server::READABLE,
                    'callback' => [$this, 'browse'],
                    'permission_callback' => [$this, 'canBrowse'],
                    'args' => [],
                ]
            ]
        );

        /**
         * Route: Read
         */
        register_rest_route(
            $this->namespace,
            '/read',
            [
                [
                    'methods' => \WP_REST_Server::READABLE,
                    'callback' => [$this, 'read'],
                    'permission_callback' => [$this, 'canRead'],
                    'args' => [],
                ]
            ]
        );

        /**
         * Route: Edit
         */
        register_rest_route(
            $this->namespace,
            '/edit',
            [
                [
                    'methods' => \WP_REST_Server::READABLE,
                    'callback' => [$this, 'edit'],
                    'permission_callback' => [$this, 'canEdit'],
                    'args' => [],
                ]
            ]
        );

        /**
         * Route: Add
         */
        register_rest_route(
            $this->namespace,
            '/add',
            [
                [
                    'methods' => \WP_REST_Server::READABLE,
                    'callback' => [$this, 'add'],
                    'permission_callback' => [$this, 'canAdd'],
                    'args' => [],
                ]
            ]
        );

        /**
         * Route: Delete
         */
        register_rest_route(
            $this->namespace,
            '/delete',
            [
                [
                    'methods' => \WP_REST_Server::READABLE,
                    'callback' => [$this, 'delete'],
                    'permission_callback' => [$this, 'canDelete'],
                    'args' => [],
                ]
            ]
        );


    }

    /**
     *
     * @param WP_REST_Request $request
     * @return \WP_REST_Response
     */
    public function browse(\WP_REST_Request $request) {
        $data = ['success' => true, 'function' => __FUNCTION__];
        return new \WP_REST_Response( $data, 200);
    }

    /**
     * @param WP_REST_Request $request
     * @return bool
     */
    public function canBrowse(\WP_REST_Request $request) {
        return true;
    }

    /**
     *
     * @param WP_REST_Request $request
     * @return \WP_REST_Response
     */
    public function read(\WP_REST_Request $request) {
        $data = ['success' => true, 'function' => __FUNCTION__];
        return new \WP_REST_Response( $data, 200);
    }

    /**
     * @param WP_REST_Request $request
     * @return bool
     */
    public function canRead(\WP_REST_Request $request) {
        return true;
    }


    /**
     *
     * @param WP_REST_Request $request
     * @return \WP_REST_Response
     */
    public function edit(\WP_REST_Request $request) {
        $data = ['success' => true, 'function' => __FUNCTION__];
        return new \WP_REST_Response( $data, 200);
    }

    /**
     * @param WP_REST_Request $request
     * @return bool
     */
    public function canEdit(\WP_REST_Request $request) {
        return true;
    }


    /**
     *
     * @param WP_REST_Request $request
     * @return \WP_REST_Response
     */
    public function add(\WP_REST_Request $request) {
        $data = ['success' => true, 'function' => __FUNCTION__];
        return new \WP_REST_Response( $data, 200);
    }

    /**
     * @param WP_REST_Request $request
     * @return bool
     */
    public function canAdd(\WP_REST_Request $request) {
        return true;
    }


    /**
     *
     * @param WP_REST_Request $request
     * @return \WP_REST_Response
     */
    public function delete(\WP_REST_Request $request) {
        $data = ['success' => true, 'function' => __FUNCTION__];
        return new \WP_REST_Response( $data, 200);
    }

    /**
     * @param WP_REST_Request $request
     * @return bool
     */
    public function canDelete(\WP_REST_Request $request) {
        return false;
    }


}