<?php

class m131204_144711 extends Migration
{
	public function up() {
        $this->db->execute("CREATE TABLE IF NOT EXISTS `user` ( `id` INT NOT NULL AUTO_INCREMENT , `name` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL , `email` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL , `password` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL , `role` VARCHAR(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL , PRIMARY KEY (`id`)) ENGINE=MyISAM DEFAULT CHARSET=utf8;");
	}

	public function down() {
        $this->db->execute("DROP TABLE IF EXISTS `user`");
	}
}