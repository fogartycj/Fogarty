<?php namespace System;

class Auth {

    public static $user;
    private static $key = 'projectNP_uid';

    public static function check() {
        return (!is_null(static::user()));
    }

    public static function user() {
        if(Config::get('session.driver') == '') {
            throw new \Exception("Session driver no specified");
        }

        if(is_null(static::$user) and Session::has(static::$key)) {
            static::$user = call_user_func(Config::get('auth.by_id'), Session::get(static::$key));
        }

        return static::$user;
    }
}
