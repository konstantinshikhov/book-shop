<?php

abstract class Migration
{
	/**
	 * @var DB
	 */
	protected $db;

	public function __construct(IDB $db) {
		$this->db = $db;
	}

	public function up() {

	}

	public function down() {

	}
}