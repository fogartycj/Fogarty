<?php namespace System;

class Config {

    // Holds all of the loaded config items
    private static $items = array();

    // Does config item or file exist?
    public static function has($key) {
        return ! is_null(static::get($key));
    }

    public static function get($key, $default = null) {

        if(strpos($key, '.') === false) {
            static::load($key);

            return Arrays::get(static::$items, $key, $default);
        }

        list($file, $key) = static::parse($key);

        static::load($file);

        if(!array_key_exists($file, static::$items)) {
            return is_callable($default) ? call_user_function($default) : $default;
        }

        return Arrays::get(static::$items[$file], $key, $default);
    }

    public static function set($key, $value) {
        list($file, $key) = static::parse($key);
        static::load($file);
        static::$items[$file][$key] = $value;
    }

    private static function parse($key) {
        $segments = explode('.', $key);
        if(count($segments) < 2) {
            throw new \Exception("Invalid config key [$key].");
        }
        return array($segments[0], implode('.', array_slice($segments, 1)));
    }

    // Load all config items from file
    public static function load($file) {
        if(!array_key_exists($file, static::$items) and file_exists($path = __DIR__.'/config/'.$file.EXT)) {
            static::$items[$file] = require $path;
        }
    }

}

?>