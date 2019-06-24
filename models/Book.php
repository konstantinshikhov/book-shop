<?php

/**
 * Класс Book - модель для работы с книгами
 */
class Book
{
    // Количество отображаемых книг по умолчанию
    const SHOW_BY_DEFAULT = 6;

    /**
     * Возвращает массив последних книг
     *
     * @param type $count [optional] <p>Количество</p>
     * @param type $page [optional] <p>Номер текущей страницы</p>
     * @return array <p>Массив с товарами</p>
     */
    public static function getLatestProducts($count = self::SHOW_BY_DEFAULT)
    {
        $db = Db::getConnection();

        $sql = 'SELECT id, name  FROM books '
            . ' ORDER BY id DESC '
            . 'LIMIT :count';

        $result = $db->prepare($sql);
        $result->bindParam(':count', $count, PDO::PARAM_INT);

        $result->setFetchMode(PDO::FETCH_ASSOC);

        $result->execute();
        $i = 0;
        $productsList = array();
        while ($row = $result->fetch()) {
            $productsList[$i]['id'] = $row['id'];
            $productsList[$i]['name'] = $row['name'];

            $i++;
        }
        return $productsList;
    }

    /**
     * Возвращает путь к изображению
     *
     * @param integer $id
     * @return string <p>Путь к изображению</p>
     */
    public static function getImage($id)
    {
        // Название изображения-пустышки
        $noImage = 'no-image.jpg';

        // Путь к папке с книгами
        $path = '/upload/images/books/';
        @$name = Photos::getName($id);

        // Путь к изображению книги
        if ($name):
            $pathToProductImage = $path . $name ;

            if (file_exists($_SERVER['DOCUMENT_ROOT'] . $pathToProductImage)) {
                // Если изображение для товара существует
                // Возвращаем путь изображения товара
                return $pathToProductImage;
            }
        endif;

        // Возвращаем путь изображения-пустышки
        return $path . $noImage;
    }

    public static function getImageSlider($name)
    {
        // Название изображения-пустышки
        $noImage = 'no-image.jpg';

        // Путь к папке с товарами
        $path = '/upload/images/books/';
        //@$name = Photos::getName($id);
        // var_dump($name); die("hello");
        // Путь к изображению товара
        if ($name):
            $pathToProductImage = $path . $name ;

            if (file_exists($_SERVER['DOCUMENT_ROOT'] . $pathToProductImage)) {
                // Если изображение для товара существует
                // Возвращаем путь изображения товара
                return $pathToProductImage;
            }
        endif;
        // Возвращаем путь изображения-пустышки
        return $path . $noImage;
    }
    /**
     * Возвращает книгу с указанным id
     *
     * @param integer $id <p>id товара</p>
     * @return array <p>Массив с информацией о книге</p>
     */
    public static function getBookById($id)
    {

        $db = Db::getConnection();

        $sql = 'SELECT b.*, p_h.name AS name_publish, p_h.address,p_h.phone 
            FROM `books` b JOIN publishing_houses p_h ON p_h.id = b.publishing_houses_id WHERE b.id = :id';
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);

        $result->setFetchMode(PDO::FETCH_ASSOC);

        $result->execute();

        return $result->fetch();
    }

    /**
     * Возвращает список книг
     *
     * @return array <p>Массив с книгами</p>
     */
    public static function getProductsList()
    {
        $db = Db::getConnection();

        $result = $db->query('SELECT b.id, b.name,b.description,p_h.name AS published_name,r.name AS rubric  FROM books b 
              join  publishing_houses p_h ON p_h.id = b.publishing_houses_id
              join rubrics r ON r.id = b.rubric_id
                ORDER BY id ASC');
        $productsList = array();
        $i = 0;
        while ($row = $result->fetch()) {
            $productsList[$i]['id'] = $row['id'];
            $productsList[$i]['name'] = $row['name'];
            $productsList[$i]['published_name'] = $row['published_name'];
            $productsList[$i]['rubric'] = $row['rubric'];
            $i++;
        }
        return $productsList;
    }

    /**
     * Удаляет книгу с указанным id
     *
     * @param integer $id <p>id книги</p>
     * @return boolean <p>Результат выполнения метода</p>
     */
    public static function deleteProductById($id)
    {
        $db = Db::getConnection();

        $sql = 'DELETE FROM books WHERE id = :id';

        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        return $result->execute();
    }

    /**
     * Добавляет новую книгу
     *
     * @param array $options <p>Массив с информацией о книге</p>
     * @return integer <p>id добавленной в таблицу записи</p>
     */
    public static function createBook($options)
    {
        $db = Db::getConnection();

        $sql = 'INSERT INTO books '
            . '(name, date_publish, publishing_houses_id, rubric_id, description)'
            . 'VALUES '
            . '(:name, :date_publish, :id_published, :rubric_id, :description)';

        $result = $db->prepare($sql);
        $result->bindParam(':name', $options['name'], PDO::PARAM_STR);
        $result->bindParam(':date_publish', $options['date_publish'], PDO::PARAM_STR);
        $result->bindParam(':id_published', $options['id_published'], PDO::PARAM_STR);
        $result->bindParam(':rubric_id', $options['rubric_id'], PDO::PARAM_INT);
        $result->bindParam(':description', $options['description'], PDO::PARAM_STR);

        if ($result->execute()) {
            // Если запрос выполенен успешно, возвращаем id добавленной записи
            return $db->lastInsertId();
        }
        // Иначе возвращаем 0
        return 0;
    }

    /**
     * Редактирует книгу с заданным id
     * @param integer $id <p>id книги</p>
     * @param array $options <p>Массив с информацей о книге</p>
     * @return boolean <p>Результат выполнения метода</p>
     */
    public static function updateBookById($id, $options)
    {
        $db = Db::getConnection();

        $sql = "UPDATE books
            SET 
                name = :name, 
                date_publish = :date_publish, 
                publishing_houses_id = :id_published, 
                rubric_id = :rubric_id, 
                description = :description 
            WHERE id = :id";

        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':name', $options['name'], PDO::PARAM_STR);
        $result->bindParam(':date_publish', $options['date_publish'], PDO::PARAM_STR);
        $result->bindParam(':id_published', $options['id_published'], PDO::PARAM_INT);
        $result->bindParam(':rubric_id', $options['rubric_id'], PDO::PARAM_INT);
        $result->bindParam(':description', $options['description'], PDO::PARAM_STR);

        return $result->execute();
    }

}