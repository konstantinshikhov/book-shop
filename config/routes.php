<?php

return array(
    // Товар:
    'product/([0-9]+)' => 'product/view/$1', // actionView в ProductController
    //Книга
    'book/([0-9]+)' => 'book/view/$1', // actionView в ProductController
    // Каталог:
    'catalog' => 'catalog/index', // actionIndex в CatalogController
    // Категория товаров:
    'category/([0-9]+)/page-([0-9]+)' => 'catalog/category/$1/$2', // actionCategory в CatalogController   
    'category/([0-9]+)' => 'catalog/category/$1', // actionCategory в CatalogController
    // Корзина:
    'cart/checkout' => 'cart/checkout', // actionAdd в CartController    
    'cart/delete/([0-9]+)' => 'cart/delete/$1', // actionDelete в CartController    
    'cart/add/([0-9]+)' => 'cart/add/$1', // actionAdd в CartController    
    'cart/addAjax/([0-9]+)' => 'cart/addAjax/$1', // actionAddAjax в CartController
    'cart' => 'cart/index', // actionIndex в CartController
    // Пользователь:
    'user/register' => 'user/register',
    'user/login' => 'user/login',
    'user/logout' => 'user/logout',
    'cabinet/edit' => 'cabinet/edit',
    'cabinet' => 'cabinet/index',
    // Управление издательствами:
    'admin/published/create' => 'adminPublished/create',
    'admin/published/update/([0-9]+)' => 'adminPublished/update/$1',
    'admin/published/delete/([0-9]+)' => 'adminPublished/delete/$1',
    'admin/published' => 'adminPublished/index',
    // Управление авторами
    'admin/author/create' => 'adminAuthor/create',
    'admin/author/update/([0-9]+)' => 'adminAuthor/update/$1',
    'admin/author/delete/([0-9]+)' => 'adminAuthor/delete/$1',
    'admin/author' => 'adminAuthor/index',
    //Управление книгами
    'admin/book/create' => 'adminBook/create',
    'admin/book/update/([0-9]+)' => 'adminBook/update/$1',
    'admin/book/delete/([0-9]+)' => 'adminBook/delete/$1',
    'admin/book' => 'adminBook/index',
    // Управление рубриками:
    'admin/rubric/create' => 'adminRubric/create',
    'admin/rubric/update/([0-9]+)' => 'adminRubric/update/$1',
    'admin/rubric/delete/([0-9]+)' => 'adminRubric/delete/$1',
    'admin/rubric' => 'adminRubric/index',
    // Управление заказами:    
    'admin/order/update/([0-9]+)' => 'adminOrder/update/$1',
    'admin/order/delete/([0-9]+)' => 'adminOrder/delete/$1',
    'admin/order/view/([0-9]+)' => 'adminOrder/view/$1',
    'admin/order' => 'adminOrder/index',
    // Админпанель:
    'admin' => 'admin/index',
    // О магазине
    'contacts' => 'site/contact',
    'about' => 'site/about',
    // Главная страница
    'index.php' => 'site/index', // actionIndex в SiteController
    '' => 'site/index', // actionIndex в SiteController
);
