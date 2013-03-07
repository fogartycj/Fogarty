<?php
/**
 * ProjectNP Framework - OOP
 * Chris Fogarty
 *
 * Bootstrap
 */

// Define paths and extensions
define('PUBLIC_PATH', __DIR__);
define('FRAMEWORK_PATH', '\\framework\\');
define('SYS_PATH', '\\framework\\system\\');
define('MODEL_PATH','\\framework\\models\\');
define('VIEW_PATH', '\\framework\\views\\');
define('EXT', '.php');

// Register the autoloader
spl_autoload_register(require SYS_PATH.'autoloader'.EXT);

use System\Database;
$db = new Database();
$db->connection();
// $db->query("INSERT INTO users (id, user, pass) VALUES ('', 'Test2', 'Test2')");
//print_r($config->get('database.connections'));
