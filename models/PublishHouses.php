<?php
/**
 * Class PublishHouses - для работы с издателями(табл publishing_houses )
 */

class PublishHouses
{
    /**
     * Получение всех издательств
     * @return array
     */
    public static function getAllPublishHouses()
    {
        // Соединение с БД
        $db = Db::getConnection();
        // Запрос к БД
        $result = $db->query('SELECT * FROM publishing_houses ');
        $publish_houses = array();
        $i = 0;
        while ($row = $result->fetch()) {
            $publish_houses[$i]['id'] = $row['id'];
            $publish_houses[$i]['name'] = $row['name'];
            $publish_houses[$i]['address'] = $row['address'];
            $publish_houses[$i]['phone'] = $row['phone'];
            $i++;
        }
        return $publish_houses;
    }

    /**
     * Получения перечня всех названий издательств для создания новой книги
     *
     * @return array
     */
    public static function getListOfPublishHouses()
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Запрос к БД
        $result = $db->query('SELECT id,name FROM publishing_houses ');

        $publish_houses = array();
        $i = 0;
        while ($row = $result->fetch()) {
            $publish_houses[$i]['id'] = $row['id'];
            $publish_houses[$i]['name'] = $row['name'];
            $i++;
        }
        return $publish_houses;
    }

    /**
     * Добавление нового издательства
     * @param $name string $name <p>Название издательства</p>
     * @return bool <p>Результат добавления записи в таблицу</p>
     */
    public static function createPublished($name,$address,$phone){
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = 'INSERT INTO publishing_houses (name,address,phone) '
            . 'VALUES (:name,:address,:phone)';

        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':address', $address, PDO::PARAM_STR);
        $result->bindParam(':phone', $phone, PDO::PARAM_STR);
        return $result->execute();
    }

    /**
     * Удаляет издательство с заданным id
     * @param integer $id
     * @return boolean <p>Результат выполнения метода</p>
     */
    public static function deletePublishedById($id)
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = 'DELETE FROM publishing_houses WHERE id = :id';

        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        return $result->execute();
    }

    /**
     * Возвращает издательство с указанным id
     * @param integer $id <p>id издательство</p>
     * @return array <p>Массив с информацией об издательстве</p>
     */
    public static function getPublishedById($id)
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = 'SELECT * FROM publishing_houses WHERE id = :id';

        // Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);

        // Указываем, что хотим получить данные в виде массива
        $result->setFetchMode(PDO::FETCH_ASSOC);

        // Выполнение коменды
        $result->execute();

        // Получение и возврат результатов
        return $result->fetch();
    }

    /**
     * Редактирует издательство с заданным id
     * @param integer $id <p>id издательство</p>
     * @param array $options <p>Массив с информацей о авторе</p>
     * @return boolean <p>Результат выполнения метода</p>
     */
    public static function updatePublishedById($id, $name,$address,$phone)
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = "UPDATE publishing_houses SET name = :name,address = :address,phone = :phone WHERE id = :id";

        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':address', $address, PDO::PARAM_STR);
        $result->bindParam(':phone', $phone, PDO::PARAM_STR);
        return $result->execute();
    }

}