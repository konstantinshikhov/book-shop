<?php include ROOT . '/views/layouts/header_admin.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <br/>

            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="/admin">Админпанель</a></li>
                    <li class="active">Управление книгами</li>
                </ol>
            </div>

            <a href="/admin/book/create" class="btn btn-default back"><i class="fa fa-plus"></i> Добавить книгу</a>
            
            <h4>Список книг</h4>

            <br/>

            <table class="table-bordered table-striped table">
                <tr>
                    <th>ID книги</th>
                    <th>Название книги</th>
                    <th>Издательство</th>
                    <th>Рубрика</th>
                    <th></th>
                    <th></th>
                </tr>
                <?php foreach ($booksList as $book): ?>
                    <tr>
                        <td><?php echo $book['id']; ?></td>
                        <td><?php echo $book['name']; ?></td>
                        <td><?php echo $book['published_name']; ?></td>
                        <td><?php echo $book['rubric']; ?></td>
                        <td><a href="/admin/book/update/<?php echo $book['id']; ?>" title="Редактировать"><i class="fa fa-pencil-square-o"></i></a></td>
                        <td><a href="/admin/book/delete/<?php echo $book['id']; ?>" title="Удалить"><i class="fa fa-times"></i></a></td>
                    </tr>
                <?php endforeach; ?>
            </table>

        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer_admin.php'; ?>

