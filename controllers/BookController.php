<?php

/**
 * Контроллер BookController
 * Книга
 */
class BookController
{
    /**
     * Action для страницы просмотра книги
     *
     * @param integer $bookId <p>id книги</p>
     */
    public function actionView($bookId)
    {
        // Список категорий для левого меню
        $categories = Rubric::getCategoriesList();

        // Получаем инфомрацию о товаре
        $product = Book::getBookById($bookId);
        $authors = Author::getAuthorsByIDBook($bookId);

        $sliderBook = Photos::getImagesByIDBook($bookId);

        require_once(ROOT . '/views/book/view.php');
        return true;
    }
}