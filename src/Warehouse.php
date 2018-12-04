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
     * Create an instance of Warehouse.
     *
     * @return Warehouse
     */
    public function __construct()
    {
        // Get the CodeIgnitor Instance
        $this->CI =& get_instance();

        // Load the Warehouse config file located in application/confw/warehouse.php
        $this->CI->config->load('warehouse', TRUE);

        // Validate the configuration
        $this->validateConfiguration();

        // Define the configuration
        $this->config['repositories'] = $this->CI->config->item('repositories', 'warehouse');
    }

/*
|--------------------------------------------------------------------------
| Warehouse
|--------------------------------------------------------------------------
|
| Hanlde the Warehouse class.
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
        // Get cache config
        if (array_key_exists('cache', $this->config['repositories'][$repository_name]) === true) {
            $cache_class = $this->config['repositories'][$repository_name]['cache'];
        } else {
            throw new Exceptions\InvalidConfigurationException('The `' . $repository_name . '` repository configuration does not contain a `cache` array key.');
        }

        // Get database config
        if (array_key_exists('database', $this->config['repositories'][$repository_name]) === true) {
            $database_class = $this->config['repositories'][$repository_name]['database'];
        } else {
            throw new Exceptions\InvalidConfigurationException('The `' . $repository_name . '` repository configuration does not contain a `database` array key.');
        }

        // Validate that the cache class exists
        if (class_exists($cache_class) === false) {
            throw new Exceptions\ClassNotFoundException('The class ' . $cache_class . ' does not exist and cannot be constructed.');
        }

        // Validate that the database class exists
        if (class_exists($database_class) === false) {
            throw new Exceptions\ClassNotFoundException('The class ' . $database_class . ' does not exist and cannot be constructed.');
        }

        return new $cache_class(new $database_class());
    }

/*
|--------------------------------------------------------------------------
| Validations
|--------------------------------------------------------------------------
|
| Validations for the Warehouse.
|
*/
    /**
     * Validate the configuration file.
     *
     * @return void
     */
    private function validateConfiguration(): void
    {
        if (!$this->CI->config->item('repositories', 'warehouse')) {
            throw new Exceptions\InvalidConfigurationException('The Warehouse configuration does not contain a `repositories` array.');
        }
    }
}
