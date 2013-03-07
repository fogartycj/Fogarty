<?php namespace System;

class Database {

    public static $connections = array();

    public static function connection($connection = null) {

        if(is_null($connection)) {
            $connection = Config::get('database.default');
        }

        if(!array_key_exists($connection, static::$connections)) {
            static::$connections[$connection] = Connector::connect($connection);
        }

        return static::$connections[$connection];
    }

    public static function query($sql, $bindings = array(), $connection = null) {
        $query = static::connection($connection)->prepare($sql);
        $result = $query->execute($bindings);
        if (strpos(strtoupper($sql), 'SELECT') === 0) {
            return $query->fetchAll(\PDO::FETCH_CLASS, 'stdClass');
        } elseif (strpos(strtoupper($sql), 'UPDATE') === 0 or strpos(strtoupper($sql), 'DELETE') === 0) {
            return $query->rowCount();
        } else {
            return $result;
        }
    }



}
