<?php

class m190623_150701 extends Migration
{
	public function up() {
        $this->db->execute("CREATE TABLE IF NOT EXISTS `books`(
                                                              id INT PRIMARY KEY AUTO_INCREMENT,
                                                              name VARCHAR(100) NOT NULL,
                                                              description VARCHAR(255),
                                                              publishing_houses_id INT(11) ,
                                                              rubric_id INT(11) ,
                                                              date_publish DATE NOT NULL ,
                             FOREIGN KEY (`publishing_houses_id`) REFERENCES `publishing_houses`(`id`) ON DELETE CASCADE ON UPDATE CASCADE ,
                             FOREIGN KEY (`rubric_id`) REFERENCES `rubrics` (`id`) ON DELETE CASCADE ON UPDATE CASCADE 
                                                    
                                                              )ENGINE = MyISAM;");
	}

	public function down() {
        $this->db->execute("DROP TABLE IF EXISTS `books`");
	}
}