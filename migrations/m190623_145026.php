<?php

class m190623_145026 extends Migration
{
	public function up() {
        $this->db->execute("CREATE TABLE IF NOT EXISTS `publishing_houses` ( `id` INT NOT NULL AUTO_INCREMENT , `name` VARCHAR(255) NOT NULL , `address` VARCHAR(50) NOT NULL , `phone` VARCHAR(20) NOT NULL , PRIMARY KEY (`id`)) ENGINE = MyISAM;");
	}

	public function down() {
        $this->db->execute("DROP TABLE IF EXISTS  `publishing_houses`");
	}
}