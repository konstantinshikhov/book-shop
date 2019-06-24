<?php

class m190622_204347 extends Migration
{
	public function up() {
        $this->db->execute( "INSERT INTO `user` (`name`,`email`,`password`,`role`) VALUES ('admin','admin@gmail.com','presentAdmin','admin')");
	}

	public function down() {

	}
}