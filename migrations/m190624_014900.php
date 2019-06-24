<?php

class m190624_014900 extends Migration
{
	public function up() {
        $this->db->execute("CREATE TABLE IF NOT EXISTS `photos`(
                                                                  `id` INT  NOT NULL AUTO_INCREMENT ,
                                                                  `name` VARCHAR(255) NOT NULL,
                                                                  `title` TINYINT(1) NULL,
                                                                  `books_id` INT(11) NOT NULL,
                                                              PRIMARY KEY (`id`),     
                                                              FOREIGN KEY (`books_id`) REFERENCES `books`(`id`) ON DELETE CASCADE ON UPDATE CASCADE)ENGINE = MyISAM;"
                                                                );
	}

	public function down() {
        $this->db->execute("DROP TABLE IF EXISTS `photos`");
	}
}