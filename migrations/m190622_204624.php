<?php

class m190622_204624 extends Migration
{
    public function up()
    {
        $this->db->execute("CREATE TABLE IF NOT EXISTS `rubrics` ( `id` INT NOT NULL AUTO_INCREMENT , `name` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL , `parent_id` INT(11) NOT NULL , PRIMARY KEY (`id`)) ENGINE = MyISAM;");

    }

    public function down()
    {
        $this->db->execute("DROP TABLE IF  EXISTS `rubrics`");
    }
}