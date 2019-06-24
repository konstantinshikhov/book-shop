<?php


class AdminRubricController extends AdminBase
{
    /**
     * Action для страницы "Обзор рубрик"
     */
    public function actionIndex()
    {
        $userId = User::checkLogged();
        $user = User::getUserById($userId);

        $rubricsList = Rubric::getAllRubric();
        require_once(ROOT . '/views/admin_rubric/index.php');
        return true;
    }

    /**
     * Action для страницы "Добавить рубрику"
     */
    public function actionCreate()
    {
        self::checkAdmin();
        $rubricsList = Rubric::getAllRubric();

        if (isset($_POST['submit'])) {
            $name = $_POST['name'];
            $parent_id = $_POST['parent_id'];

            $errors = false;

            if (!isset($name) || empty($name)) {
                $errors[] = 'Заполните поля';
            }


            if ($errors == false) {
                Rubric::createRubric($name, $parent_id);

                header("Location: /admin/rubric");
            }
        }

        require_once(ROOT . '/views/admin_rubric/create.php');
        return true;
    }

    /**
     * Action для страницы "Редактировать рубрику"
     */
    public function actionUpdate($id)
    {
        self::checkAdmin();

        $category = Rubric::getCategoryById($id);
        $rubricsList = Rubric::getAllRubric();
        // Обработка формы
        if (isset($_POST['submit'])) {
            $name = $_POST['name'];
            $parent_id = $_POST['parent_id'];

            Rubric::updateCategoryById($id, $name, $parent_id);
            header("Location: /admin/rubric");
        }

        require_once(ROOT . '/views/admin_rubric/update.php');
        return true;
    }

    /**
     * Action для страницы "Удалить РУБРИКУ"
     */
    public function actionDelete($id)
    {
        self::checkAdmin();
        if (isset($_POST['submit'])) {
            Rubric::deleteCategoryById($id);
            header("Location: /admin/rubric");
        }
        require_once(ROOT . '/views/admin_rubric/delete.php');
        return true;
    }

}