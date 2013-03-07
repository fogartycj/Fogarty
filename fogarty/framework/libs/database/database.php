<?php

use \Config;

class Database {
    private $driver;
    private $host;
    private $database;
    private $user;
    private $pass;

    protected static $db;

    // PDO Connector Options
    public static $options = array(
        \PDO::ATTR_CASE => \PDO::CASE_LOWER,
        \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
        \PDO::ATTR_ORACLE_NULLS => \PDO::NULL_NATURAL,
        \PDO::ATTR_STRINGIFY_FETCHES => false,
        \PDO::ATTR_EMULATE_PREPARES => false,
    );

    public static function connect($connection){
        $config = static::configuration($connection);

    }

    public function __construct(){
        $this->driver = 'mysql';
        $this->host = 'localhost';
        $this->database = 'userdb';
        $this->user = 'root';
        $this->pass = '';
        self::$db = new PDO($this->driver.':host='.$this->host.';dbname='.$this->database.'',
            $this->user,
            $this->pass);
        $dsn = $this->driver.':host='.$this->host.';dbname='.$this->database;

        if (isset($this->port))
        {
            $dsn .= ';port='.$this->port;
        }

        $connection = new \PDO($dsn, $this->user, $this->pass, static::$options);

        if (isset($this->charset))
        {
            $connection->prepare("SET NAMES '".$this->charset."'")->execute();
        }
        self::$db = $connection;
    }

    public function query(){
        $db = self::$db;
        $sql = "INSERT INTO users (id, user, pass) VALUES ('', 'Test', 'test')";
        $state = $db->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
        $state->execute();
    }
}

$db = new Database;
$db->query();
print_r($db);

?>