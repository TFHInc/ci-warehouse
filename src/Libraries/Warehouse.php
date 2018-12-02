<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Warehouse
 *
 * A CI wrapper library to load Warehouse.
 *
 * @package RealRedis
 * @author Colin Rafuse <colin.rafuse@gmail.com>
 */
class Warehouse extends \TFHInc\Warehouse\Warehouse {
    /**
     * Class constructor
     *
     * @return    void
     */
    public function __construct() {
        parent::__construct();
    }
}
