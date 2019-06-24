<?php
/**
 * Class AdminAuthorController - класс для работы с авторами книг
 */

class AdminAuthorController extends  AdminBase
{
    /**
     * Action для страницы "Управление авторами"
     */
    public function actionIndex()
    {
        // Проверка доступа
        self::checkAdmin();

        // Получаем список авторов
        $authorList = Author::getAuthorsList();

        require_once(ROOT . '/views/admin_author/index.php');
        return true;
    }

    /**
     * Action для страницы "Добавить автора"
     */
    public function actionCreate()
    {
        // Проверка доступа
        self::checkAdmin();

        if (isset($_POST['submit'])) {
            $name = $_POST['name'];

            // Флаг ошибок в форме
            $errors = false;

            if (!isset($name) || empty($name)) {
                $errors[] = 'Заполните поля';
            }


            if ($errors == false) {
                Author::createAuthor($name);
                header("Location: /admin/author");
            }
        }

        require_once(ROOT . '/views/admin_author/create.php');
        return true;
    }

    /**
     * Action для страницы "Удалить автора"
     */
    public function actionDelete($id)
    {
        // Проверка доступа
        self::checkAdmin();

        // Обработка формы
        if (isset($_POST['submit'])) {
            Author::deleteAuthorById($id);
            header("Location: /admin/author");
        }

        require_once(ROOT . '/views/admin_author/delete.php');
        return true;
    }
    /**
     * Action для страницы "Редактировать автора"
     */
    public function actionUpdate($id)
    {
        // Проверка доступа
        self::checkAdmin();

        $author = Author::getAuthorById($id);

        if (isset($_POST['submit'])) {
            $name = $_POST['name'];
            Author::updateAuthorById($id, $name );
            header("Location: /admin/author");
        }

        require_once(ROOT . '/views/admin_author/update.php');
        return true;
    }
}