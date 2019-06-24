<?php

require_once "IDB.php";
require_once "QueryResult.php";

class MySQL_DB implements IDB
{
	private $_id;
	public $prefix;

	public function __construct($host, $username, $password, $database, $prefix='', $names='utf8') {
		$this->connect($host, $username, $password, $database);
		$this->execute('SET NAMES "' . $this->escape($names) . '"');
		$this->prefix = $prefix;
	}

	public function execute($sql) {
        mysqli_query( $this->_id,$this->handleSql($sql));
		$this->checkErrors();
	}

	public function query($sql) {
        $result = mysqli_query($this->_id,$this->handleSql($sql) );
		$this->checkErrors();
		return new QueryResult($result);
	}

	public function escape($value) {
        return mysqli_escape_string($this->_id,$value);
	}

	public function affected() {
		return mysqli_affected_rows($this->_id);
	}

	public function insertId() {
		return mysqli_insert_id($this->_id);
	}

	private function handleSql($sql) {
		return preg_replace_callback('#\{\{(.+?)\}\}#', function($matches) {
			return $this->prefix . $matches[1];
		}, $sql);
	}

	private function checkErrors() {
		if (mysqli_errno($this->_id)) {
			throw new Exception(mysqli_error($this->_id));
		}
	}

	private function connect($host, $username, $password, $database) {

        $this->_id = mysqli_connect($host, $username, $password, $database);

        if (!$this->_id) {
            echo "Ошибка: Невозможно установить соединение с MySQL." . PHP_EOL;
            echo "Код ошибки errno: " . mysqli_connect_errno() . PHP_EOL;
            echo "Текст ошибки error: " . mysqli_connect_error() . PHP_EOL;
            exit;
        }
	}
}

