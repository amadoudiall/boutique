<?php

namespace App;

class Autoloader
{

    static function register()
    {
        spl_autoload_register(array(__CLASs__, 'Autoload'));
    }

    static function Autoload($class)
    {
        if (strpos($class, __NAMESPACE__ . '\\') === 0) {

            $class = str_replace(__NAMESPACE__ . '\\', '', $class);
            // $class = str_replace('\\', '/', $class);
            require('../src/' . $class . '.php');
        }
    }

    static function registerHome()
    {
        spl_autoload_register(array(__CLASs__, 'AutoloadHome'));
    }

    static function AutoloadHome($class)
    {
        if (strpos($class, __NAMESPACE__ . '\\') === 0) {

            $class = str_replace(__NAMESPACE__ . '\\', '', $class);
            // $class = str_replace('\\', '/', $class);
            require('./src/' . $class . '.php');
        }
    }
}
