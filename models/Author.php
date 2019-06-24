<?php


class Author
{
    /**
     * Получение авторов книги по ее id
     * @param $id - книги
     * @return array - авторы
     */
    public static function getAuthorsByIDBook($id){
        $db = Db::getConnection();
        $sql = 'SELECT a.name FROM `books_authors` b_a JOIN authors a ON a.id = b_a.authors_id WHERE b_a.books_id = :id';

        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);

        $result->setFetchMode(PDO::FETCH_ASSOC);

        $result->execute();
        $authors = array();
         while($row = $result->fetch()){
             $authors[] = $row['name'];
         }

         return $authors;
    }

    public static function getAuthorsList(){
        $db = Db::getConnection();
        $result = $db->query('SELECT * FROM authors ');
        $authors = array();
        $i = 0;
        while ($row = $result->fetch()) {
            $authors[$i]['id'] = $row['id'];
            $authors[$i]['name'] = $row['name'];
            $i++;
        }
        return $authors;
    }

    /**
     * Добавление нового автора
     * @param $name string $name <p>ФИО автора</p>
     * @return bool <p>Результат добавления записи в таблицу</p>
     */
    public static function createAuthor($name){
        $db = Db::getConnection();

        $sql = 'INSERT INTO authors (name) '
            . 'VALUES (:name)';

        $result = $db->prepare($sql);
        $result->bindParam(':name', $name, PDO::PARAM_STR);

        return $result->execute();
    }

    /**
     * Удаляет автора с заданным id
     * @param integer $id
     * @return boolean <p>Результат выполнения метода</p>
     */
    public static function deleteAuthorById($id)
    {
        $db = Db::getConnection();

        $sql = 'DELETE FROM authors WHERE id = :id';

        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        return $result->execute();
    }

    /**
     * Возвращает автора с указанным id
     * @param integer $id <p>id автора</p>
     * @return array <p>Массив с информацией об авторах</p>
     */
    public static function getAuthorById($id)
    {
        $db = Db::getConnection();

        $sql = 'SELECT * FROM authors WHERE id = :id';

        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);

        $result->setFetchMode(PDO::FETCH_ASSOC);

        $result->execute();

        return $result->fetch();
    }

    /**
     * Редактирует автора с заданным id
     * @param integer $id <p>id автора</p>
     * @param array $options <p>Массив с информацей о авторе</p>
     * @return boolean <p>Результат выполнения метода</p>
     */
    public static function updateAuthorById($id, $name)
    {
        $db = Db::getConnection();

        $sql = "UPDATE authors SET name = :name WHERE id = :id";

        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        return $result->execute();
    }

}