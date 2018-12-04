<?php

namespace TFHInc\Warehouse\Exceptions;

/**
 * Invalid Configuration Exception
 *
 * The warehouse configuration is invalid.
 *
 */
class InvalidConfigurationException extends \Exception {
    /**
     * Construct the exception.
     *
     * @param   string              $message
     * @param   integer             $code
     * @param   Exception|null      $previous
     * @return  InvalidConfigurationException
     */
    public function __construct($message, $code = 0, Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

    /**
     * Construct the event.
     *
     * @return  string
     */
    public function __toString(): string
    {
        return __CLASS__ . ": [{$this->code}]: {$this->message}\n";
    }
}
