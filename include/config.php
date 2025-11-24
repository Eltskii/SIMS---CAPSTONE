<?php
$env_db_host = getenv('DB_HOST') !== false ? getenv('DB_HOST') : 'localhost';
$env_db_user = getenv('DB_USER') !== false ? getenv('DB_USER') : 'root';
$env_db_pass = getenv('DB_PASS') !== false ? getenv('DB_PASS') : '';
$env_db_name = getenv('DB_NAME') !== false ? getenv('DB_NAME') : 'bsu_db';

defined('server') ? null : define("server", $env_db_host);
defined('user') ? null : define("user", $env_db_user);
defined('pass') ? null : define("pass", $env_db_pass);
defined('database_name') ? null : define("database_name", $env_db_name);

$this_file = str_replace('\\', '/', __File__) ;
$doc_root = $_SERVER['DOCUMENT_ROOT'];

$web_root =  str_replace (array($doc_root, "include/config.php") , '' , $this_file);
$server_root = str_replace ('config/config.php' ,'', $this_file);

define ('web_root' , $web_root);
define('server_root' , $server_root);
?>
