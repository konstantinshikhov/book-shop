<?php include ROOT . '/views/layouts/header_admin.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <br/>

            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="/admin">Админпанель</a></li>
                    <li class="active">Управление рубриками</li>
                </ol>
            </div>

            <a href="/admin/rubric/create" class="btn btn-default back"><i class="fa fa-plus"></i> Добавить рубрику</a>
            
            <h4>Список рубрик</h4>

            <br/>

            <table class="table-bordered table-striped table">
                <tr>
                    <th>ID рубрики</th>
                    <th>Название рубрики</th>
                    <th>Родительская рубрика</th>
                    <th></th>
                    <th></th>
                </tr>
                <?php foreach ($rubricsList as $rubric): ?>
                    <tr>
                        <td><?php echo $rubric['id']; ?></td>
                        <td><?php echo $rubric['name']; ?></td>
                        <td><?php echo $rubric['parent']; ?></td>

                        <td><a href="/admin/rubric/update/<?php echo $rubric['id']; ?>" title="Редактировать"><i class="fa fa-pencil-square-o"></i></a></td>
                        <td><a href="/admin/rubric/delete/<?php echo $rubric['id']; ?>" title="Удалить"><i class="fa fa-times"></i></a></td>
                    </tr>
                <?php endforeach; ?>
            </table>
            
        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer_admin.php'; ?>

