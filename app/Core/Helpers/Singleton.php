<?php

namespace App\Core\Helpers;

/**
 * Trait Singleton
 * @package App\Core\Helpers
 */
trait Singleton
{
    private static $instance;

    /**
     * @return static
     */
    public static function getInstance()
    {
        if (empty(self::$instance)) self::$instance = new static();

        return self::$instance;
    }

    private function __construct() {}
    private function __clone() {}
    private function __wakeup() {}
}