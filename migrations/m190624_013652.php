<?php

class m190624_013652 extends Migration
{
	public function up() {
        $this->db->execute("CREATE TABLE IF NOT EXISTS  books_authors ( `id` INT NOT NULL AUTO_INCREMENT , books_id INT ,authors_id INT,PRIMARY KEY (`id`),FOREIGN KEY(books_id) REFERENCES tbl_books(id),FOREIGN KEY(authors_id) REFERENCES authors(id))ENGINE = MyISAM;") ;
	}

	public function down() {
        $this->db->execute("DROP TABLE IF EXISTS books_authors");
	}
}