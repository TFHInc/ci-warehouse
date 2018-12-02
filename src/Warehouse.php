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
     * @var object
     */
    protected $CI;

    /**
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
        //$this->CI->config->load('warehouse', TRUE);

        // Validate the configuration
        //$this->validateConfiguration();

        // Define the configuration
        // $this->config['connections'] = $this->CI->config->item('connections', 'echelon');
        // $this->config['queues'] = $this->CI->config->item('queues', 'echelon');
        // $this->config['delay'] = $this->CI->config->item('delay', 'echelon');
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
     * @param   string     $warehouse_name
     * @return  mixed
     */
    public function load(string $warehouse_name)
    {
        error_log('load warehouse `' . $warehouse_name . '`');

        $database_class = 'Repositories\\Database\\' . $warehouse_name . 'Database';
        $cache_class = 'Repositories\\Cache\\' . $warehouse_name . 'Cache';

        return new $cache_class(new $database_class());
    }
}

//$database_instance = $database_class->newInstance();
//error_log($database_class);

//$cache_class = new \ReflectionClass('Repositories\\Cache\\' . $warehouse_name . 'Cache');
//$cache_instance = $cache_class->newInstance($database_instance);
//error_log($cache_class);
