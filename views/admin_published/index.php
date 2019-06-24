<?php include ROOT . '/views/layouts/header_admin.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <br/>

            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="/admin">Админпанель</a></li>
                    <li class="active">Управление издательствами</li>
                </ol>
            </div>

            <a href="/admin/published/create" class="btn btn-default back"><i class="fa fa-plus"></i> Добавить издательство</a>

            <h4>Список Издательств</h4>

            <br/>

            <table class="table-bordered table-striped table">
                <tr>
                    <th>ID издательства</th>
                    <th>Название издательства</th>
                    <th>Адресс издательства</th>
                    <th>Телефон издательства</th>
                    <th>Редактировать</th>
                    <th>Удалить</th>
                </tr>
                <?php foreach ($publishedHousesList as $published): ?>
                    <tr>
                        <td><?php echo $published['id']; ?></td>
                        <td><?php echo $published['name']; ?></td>
                        <td><?php echo $published['address']; ?></td>
                        <td><?php echo $published['phone']; ?></td>
                        <td><a href="/admin/published/update/<?php echo $published['id']; ?>" title="Редактировать"><i class="fa fa-pencil-square-o"></i></a></td>
                        <td><a href="/admin/published/delete/<?php echo $published['id']; ?>" title="Удалить"><i class="fa fa-times"></i></a></td>
                    </tr>
                <?php endforeach; ?>
            </table>

        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer_admin.php'; ?>

