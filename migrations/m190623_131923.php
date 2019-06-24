<?php

class m190623_131923 extends Migration
{
	public function up() {
        $this->db->execute("INSERT INTO `rubrics` (`id`, `name`, `parent_id`) VALUES
                                                                                  (1, 'Программирование', 0),
                                                                                  (2, 'PHP', 1),
                                                                                  (3, 'JAVA', 1),
                                                                                  (4, 'История', 0),
                                                                                  (5, 'Мировая', 4),
                                                                                  (6, 'Средних веков', 4),
                                                                                  (7, 'Страны', 6),
                                                                                  (8, 'Украина', 7),
                                                                                  (9, 'США', 7);");
	}

	public function down() {

	}
}