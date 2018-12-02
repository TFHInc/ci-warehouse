<?php
if (!function_exists('warehouse')) {
    /**
     * Return an instance of the Warehouse Library.
     *
     * @return TFHInc\Warehouse\Warehouse
     */
    function warehouse(): TFHInc\Warehouse\Warehouse
    {
        $CI =& get_instance();

        if (!isset($CI->warehouse)) {
            $CI->warehouse = new TFHInc\Warehouse\Warehouse();
        } elseif (!$CI->echelon instanceof TFHInc\Warehouse\Warehouse) {
            $CI->warehouse = new TFHInc\Warehouse\Warehouse();
        }

        return $CI->warehouse;
    }
}