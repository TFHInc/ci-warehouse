<?php

namespace TFHInc\Warehouse;

/**
 * Warehouse
 *
 * Get the fork lift - Manage data repositories with cache and database layers in the Codeignitor framework.
 *
 * @package Warehouse
 * @author Colin Rafuse <colin.rafuse@gmail.com>
 */
class Warehouse {
    /**
     * CodeIgnitor instance array
     *
     * @var array
     */
    protected $CI;

    /**
     * Configuration array
     *
     * @var array
     */
    protected $config;

    /**
     * Create an instance of Echelon.
     *
     * @return Echelon
     */
    public function __construct()
    {
        // Get the CodeIgnitor Instance
        $this->CI =& get_instance();

        // Load the Warehouse config file located in application/confw/warehouse.php
        $this->CI->config->load('warehouse', TRUE);

        // TODO: Validate the configuration
        //$this->validateConfiguration();

        // Define the configuration
        $this->config['repositories'] = $this->CI->config->item('repositories', 'warehouse');
        error_log(print_r($this->config['repositories'], true));
    }

/*
|--------------------------------------------------------------------------
| Warehouse
|--------------------------------------------------------------------------
|
| Load a Warehouse class.
|
*/
    /**
     * Load a Warehouse class.
     *
     * @param   string     $repository_name
     * @return  mixed
     */
    public function load(string $repository_name)
    {
        error_log('load warehouse repository: `' . $repository_name . '`');

        if (array_key_exists($repository_name, $this->config['repositories']) === false) {
            // TODO: throw exception
            error_log('repository config doesnt exist');
            return null;
        }

        // Resolve cache and database classes
        $cache_class = $this->config['repositories'][$repository_name]['cache'];
        $database_class = $this->config['repositories'][$repository_name]['database'];

        // Validate that the classes exist
        if (class_exists($cache_class) === false) {
            // TODO: throw exception
            error_log('cache class doesnt exist');
        }

        if (class_exists($database_class) === false) {
            // TODO: throw exception
            error_log('database class doesnt exist');
        }

        return new $cache_class(new $database_class());
    }
}
