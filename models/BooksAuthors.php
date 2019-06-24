<?php


class BooksAuthors
{

    public static function addRelationBookAuthors($id_book,$ids_autors){
        $db = Db::getConnection();

        foreach($ids_autors as $author){
            $sql = 'INSERT INTO books_authors
                    (books_id,authors_id)'
                . 'VALUES'
                . "($id_book,$author)";
            $result = $db->prepare($sql);
            $result->bindParam(':count', $count, PDO::PARAM_INT);

            $result->execute();
        }
    }


}