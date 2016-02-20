<?php

namespace HiroKws\Prodev;

/**
 * Stab class to asing alias when non local environment.
 *
 * @author Hirohisa Kawase
 */
class MethodCallHandler
{
    /**
     * Handle called method by PHP magic method.
     *
     * @param type $name
     * @param type $arguments
     */
    public function __call($name, $arguments)
    {
        // Do nothing!!
    }
}
