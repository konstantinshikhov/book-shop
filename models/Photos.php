<?php


class Photos
{
    public static function addPhotos($id_book, $name_photo, $isTitle)
    {
        $db = Db::getConnection();

        $sql = "SELECT COUNT(id)count FROM `photos` WHERE `books_id`= 1 AND title=1";

        $result = $db->query($sql);
        $count = $result->fetch();

        $isTitle = $count['count'] == 0 ? true : 0;

        $sql = 'INSERT INTO photos
                    (books_id,name,title)'
            . 'VALUES'
            . "($id_book,\"$name_photo\",$isTitle)";

        $result = $db->prepare($sql);

        $result->execute();
    }

    public static function getName($id_books)
    {
        $db = Db::getConnection();

        $sql = "SELECT * FROM photos WHERE books_id = $id_books";


        $result = $db->query($sql);
        // Получение и возврат результатов

        $nameImg = array();

        while ($row = $result->fetch()) {
            $nameImg[] = $row['name'];
        }

        return $nameImg[0];
    }


    public static function getImagesByIDBook($id_book)
    {
        $db = Db::getConnection();
        $sql = "SELECT * FROM photos WHERE books_id = $id_book AND title = 0 ";

        $result = $db->query($sql);

        $photoList = array();
        while ($row = $result->fetch()) {

            $photoList[] = $row["name"];

        }
        return $photoList;
    }
}