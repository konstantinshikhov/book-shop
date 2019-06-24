<?php

class m190622_205537 extends Migration
{
	public function up() {
        $this->db->execute('CREATE TABLE IF NOT EXISTS `authors` (
                                                            `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
                                                            `name` varchar(255) NOT NULL
                                                            ) ENGINE=MyISAM DEFAULT CHARSET=utf8;');
	}

	public function down() {
        $this->db->execute('DROP TABLE IF  EXISTS `authors`');
	}
}