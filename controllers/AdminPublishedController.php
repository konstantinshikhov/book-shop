<?php


class AdminPublishedController extends  AdminBase
{
    /**
     * Action для страницы "Управление издательствами"
     */
    public function actionIndex()
    {
        self::checkAdmin();
        // Получаем список издательств
        $publishedHousesList = PublishHouses::getAllPublishHouses();

        require_once(ROOT . '/views/admin_published/index.php');
        return true;
    }

    /**
     * Action для страницы "Добавить издательства"
     */
    public function actionCreate()
    {
        self::checkAdmin();

        if (isset($_POST['submit'])) {
            $name = $_POST['name'];
            $address = $_POST['address'];
            $phone = $_POST['phone'];

            $errors = false;

            if (!isset($name) || empty($name)) {
                $errors[] = 'Заполните поля';
            }


            if ($errors == false) {
                PublishHouses::createPublished($name, $address, $phone);
                header("Location: /admin/published");
            }
        }
        require_once(ROOT . '/views/admin_published/create.php');
        return true;
    }

    /**
     * Action для страницы "Удалить издательство"
     */
    public function actionDelete($id)
    {
        self::checkAdmin();

        if (isset($_POST['submit'])) {
            PublishHouses::deletePublishedById($id);
            header("Location: /admin/published");
        }

        require_once(ROOT . '/views/admin_published/delete.php');
        return true;
    }

    /**
     * Action для страницы "Редактировать издательство"
     */
    public function actionUpdate($id)
    {
        self::checkAdmin();
        $published = PublishHouses::getPublishedById($id);

        if (isset($_POST['submit'])) {
            $name = $_POST['name'];
            $address = $_POST['address'];
            $phone = $_POST['phone'];

            PublishHouses::updatePublishedById($id, $name, $address, $phone);
            header("Location: /admin/published");
        }

        require_once(ROOT . '/views/admin_published/update.php');
        return true;
    }
}