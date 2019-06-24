<?php

/**
 * Контроллер AdminProductController
 * Управление книгами в админпанели
 */
class AdminBookController extends AdminBase
{

    /**
     * Action для страницы "Управление книгами"
     */
    public function actionIndex()
    {
        self::checkAdmin();

        // Получаем список книг
        $booksList = Book::getProductsList();
        require_once(ROOT . '/views/admin_book/index.php');
        return true;
    }

    /**
     * Action для страницы "Добавить книгу"
     */
    public function actionCreate()
    {
        self::checkAdmin();

        // Получаем список рубрик для выпадающего списка
        $categoriesList = Rubric::getCategoriesListAdmin();
        //Получаем список Издательств
        $publishHousesList = PublishHouses::getListOfPublishHouses();
        // Список авторов
        $authorsList = Author::getAuthorsList();
        // Обработка формы
        if (isset($_POST['submit'])) {

            $options['name'] = $_POST['name'];
            $options['date_publish'] = $_POST['date_publish'];
            $options['id_published'] = $_POST['id_published'];
            $options['rubric_id'] = $_POST['rubric'];
            $options['description'] = $_POST['description'];

            $errors = false;

            if (!isset($options['name']) || empty($options['name'])) {
                $errors[] = 'Заполните поля';
            }

            if ($errors == false) {
                $id = Book::createBook($options);
                if ($id) {
                    BooksAuthors::addRelationBookAuthors($id,$_POST['authors']);
                    $i = 0;
                    $img = $_FILES["image"];
                    foreach ($img["name"] as $item) {
                        if (is_uploaded_file($img["tmp_name"][$i])) {
                            Photos::addPhotos($id, "{$id}-{$item}", $i);
                            move_uploaded_file($img["tmp_name"][$i],
                                $_SERVER['DOCUMENT_ROOT'] . "/upload/images/books/{$id}-{$item}");
                            $i++;
                        }

                    }
                };

               header("Location: /admin/book");
            }
        }

        require_once(ROOT . '/views/admin_book/create.php');
        return true;
    }

    /**
     * Action для страницы "Редактировать книгу"
     */
    public function actionUpdate($id)
    {
        // Проверка доступа
        self::checkAdmin();

        // Получаем список категорий для выпадающего списка
        $rubricsList = Rubric::getAllRubric();
        //Получаем список Издательств
        $publishHousesList = PublishHouses::getListOfPublishHouses();

        $rubricsList = Rubric::getAllRubric();
        // Список авторов
        $authorsList = Author::getAuthorsList();
        // Получаем данные о конкретном заказе
        $book = Book::getBookById($id);

        // Обработка формы
        if (isset($_POST['submit'])) {

            $options['name'] = $_POST['name'];
            $options['date_publish'] = $_POST['date_publish'];
            $options['id_published'] = $_POST['id_published'];
            $options['rubric_id'] = $_POST['rubric_id'];
            $options['description'] = $_POST['description'];

            // Сохраняем изменения
            if (Book::updateBookById($id, $options)) {

                $i = 0;
                $img = $_FILES["image"];
                foreach ($img["name"] as $item) {
                    // echo'<pre>';   var_dump($item); echo '</pre>';die();
                    if (is_uploaded_file($img["tmp_name"][$i])) {
                        Photos::addPhotos($id, "{$id}-{$item}", $i);
                        move_uploaded_file($img["tmp_name"][$i],
                            $_SERVER['DOCUMENT_ROOT'] . "/upload/images/books/{$id}-{$item}");
                        $i++;
                    }

                }
            }
            header("Location: /admin/book");
        }
        require_once(ROOT . '/views/admin_book/update.php');
        return true;
    }

    /**
     * Action для страницы "Удалить книгу"
     */
    public function actionDelete($id)
    {
        self::checkAdmin();
        if (isset($_POST['submit'])) {
            Book::deleteBookById($id);
            header("Location: /admin/book");
        }
        require_once(ROOT . '/views/admin_book/delete.php');
        return true;
    }



}
