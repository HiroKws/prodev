<?php

namespace HiroKws\Prodev;

/**
 * Stab class to asing alias when non local environment.
 *
 * @author Hirohisa Kawase
 */
class MethodCallHandler
{
    private static $instance = null;

    public function __construct()
    {
        self::$instance = $this;
    }
    /**
     * Handle called method by PHP magic method.
     *
     * @param type $name
     * @param type $arguments
     */
    public function __call($name, $arguments)
    {
        return $this;
    }

    /**
     * Handle static called method by PHP magic method.
     *
     * @param type $name
     * @param type $arguments
     */
    public static function __callStatic($name, $arguments)
    {
        if (is_null(self::$instance)) {
            self::$instance = new MethodCallHandler();
        }

        return self::$instance;
    }
}
