<?php namespace System;

class Connector {

    public static $options = array(
        \PDO::ATTR_CASE => \PDO::CASE_LOWER,
        \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
        \PDO::ATTR_ORACLE_NULLS => \PDO::NULL_NATURAL,
        \PDO::ATTR_STRINGIFY_FETCHES => false,
        \PDO::ATTR_EMULATE_PREPARES => false,
    );

    public static function connect($connection) {
        $config = static::configuration($connection);

        switch($config->driver) {
            case 'mysql':
                return static::connect_to_server($config);
        }
    }

    private static function connect_to_server($config) {
        $pdo = $config->driver.':host='.$config->host.';dbname='.$config->database;

        if(isset($config->port)) {
            $pdo .= ';port='.$config->port;
        }

        $connection = new \PDO($pdo, $config->username, $config->password, static::$options);

        if(isset($config->charset)) {
            $connection->prepare("SET NAMES '".$config->charset."'")->execute();
        }

        return $connection;
    }

    private static function configuration($connection) {
        $config = Config::get('database.connections');
        if(!array_key_exists($connection, $config)) {
            throw new \Exception("Database connection [$connection] is not defined");
        }

        return (object) $config[$connection];
    }

}
