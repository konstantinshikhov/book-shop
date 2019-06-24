<?php

require_once(dirname(__FILE__) . '/inc/MySQL_DB.php');
require_once(dirname(__FILE__) . '/inc/Migration.php');
require_once(dirname(__FILE__) . '/inc/MigrationManager.php');

$db_params = include_once (dirname(__FILE__). '/config/db_params.php');
//$db = new MySQL_DB('localhost', 'root', 'афлгдеуе', 'test', '');
$db = new MySQL_DB($db_params['host'], $db_params['user'], $db_params['password'],$db_params['dbname'], '');
$command = new MigrationManager($db);
$command->path = dirname(__FILE__) . '/migrations';

$action = isset($argv[1]) ?  ucfirst($argv[1]) : 'help';
$params = array_slice($argv, 2);

if (method_exists($command, $action)) {
	if ($exitCode = call_user_func_array(array($command, $action), $params)) {
		exit($exitCode);
	}
} else {
	$command->help();
	exit(1);
}