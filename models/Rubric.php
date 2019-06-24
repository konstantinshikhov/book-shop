<?php
/**
 * Класс Category - модель для работы с категориями(рубриками) книг
 */

class Rubric
{
    /**
     * Возвращает массив рубрик для списка на сайте
     *
     * @return array <p>Массив с категориями</p>
     */
    public static function getCategoriesList()
    {
        $db = Db::getConnection();

        $result = $db->query('SELECT * FROM rubrics ');

        $categoryList = array();
        while ($row = $result->fetch()) {
            if (empty($categoryList[$row['parent_id']])) {
                $categoryList[$row['parent_id']] = array();
            }
            $categoryList[$row['parent_id']][] = $row;
        }
        return $categoryList;
    }

    /**
     * Вывод бокового меню на стартовой странице
     *
     * @param $arr
     * @param int $parent_id
     */
    public static function view_cat($arr, $parent_id = 0)
    {
        //Условия выхода из рекурсии
        if (empty($arr[$parent_id])) {
            return;
        }
        echo '<ul>';
        //перебираем в цикле массив и выводим на экран
        for ($i = 0; $i < count($arr[$parent_id]); $i++) {
            echo '<li><input type="radio" name="rubric" value="' . $arr[$parent_id][$i]['id'] . ' "> <a href="/category/' . $arr[$parent_id][$i]['id'] .
                '">'
                . $arr[$parent_id][$i]['name'] . '</a>';
            //рекурсия - проверяем нет ли дочерних категорий
            self:: view_cat($arr, $arr[$parent_id][$i]['id']);
            echo '</li>';
        }
        echo '</ul>';
    }

    /**
     * Возвращает массив рубрик для списка в админпанели <br/>
     *
     * @return array <p>Массив рубрик</p>
     */
    public static function getCategoriesListAdmin()
    {
        $db = Db::getConnection();

        $result = $db->query('SELECT * FROM rubrics ');

        $categoryList = array();
        while ($row = $result->fetch()) {
            if (empty($categoryList[$row['parent_id']])) {
                $categoryList[$row['parent_id']] = array();
            }
            $categoryList[$row['parent_id']][] = $row;
        }
        return $categoryList;
    }

    /**
     * Вывод бокового меню на стартовой странице
     *
     * @param $arr
     * @param int $parent_id
     */
    public static function view_cat_book($arr, $parent_id = 0)
    {
        //Условия выхода из рекурсии
        if (empty($arr[$parent_id])) {
            return;
        }
        echo '<ul>';
        //перебираем в цикле массив и выводим на экран
        for ($i = 0; $i < count($arr[$parent_id]); $i++) {
            echo '<label style="display: block"><input type="radio" class="rubric" name="rubric" value="' . $arr[$parent_id][$i]['id'] . ' "><span>' . $arr[$parent_id][$i]['name'] . '</span></label>';
            //рекурсия - проверяем нет ли дочерних категорий
            self:: view_cat_book($arr, $arr[$parent_id][$i]['id']);
            echo '</li>';
        }
        echo '</ul>';
    }

    public static function getAllRubric()
    {
        $sql = "SELECT rubrics.*,r2.name AS parent FROM `rubrics` LEFT JOIN rubrics r2 ON r2.id = rubrics.parent_id";
        $db = Db::getConnection();
        $categoryList = array();
        $result = $db->query($sql);
        while ($row = $result->fetch()) {
            $categoryList[] = $row;
        }
        return $categoryList;
    }

    public static function getCategoryById($id)
    {
        $db = Db::getConnection();

        $sql = 'SELECT * FROM rubrics WHERE id = :id';

        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);

        $result->setFetchMode(PDO::FETCH_ASSOC);

        $result->execute();

        return $result->fetch();
    }

    /**
     * Редактирование рубрики с заданным id
     *
     * @param integer $id <p>id рубрики</p>
     * @param string $name <p>Название</p>
     * @param integer $parent_id <p>Родительская рубрика  </p>
     * @return boolean <p>Результат выполнения метода</p>
     */
    public static function updateCategoryById($id, $name, $parent_id)
    {

        $db = Db::getConnection();

        $sql = "UPDATE rubrics
            SET 
                name = :name, 
                parent_id = :parent_id 
            WHERE id = :id";

        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':parent_id', $parent_id, PDO::PARAM_INT);

        return $result->execute();
    }

    /**
     * Добавляет новую рубрику
     *
     * @param string $name <p>Название рубрики</p>
     * @param integer $parent_id <p>Родительская рубрика</p>
     * @return boolean <p>Результат добавления записи в таблицу</p>
     */
    public static function createRubric($name, $parent_id)
    {
        $db = Db::getConnection();

        $sql = 'INSERT INTO rubrics (name, parent_id) '
            . 'VALUES (:name, :parent_id)';

        $result = $db->prepare($sql);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':parent_id', $parent_id, PDO::PARAM_INT);
        return $result->execute();
    }

}