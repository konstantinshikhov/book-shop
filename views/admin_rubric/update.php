<?php include ROOT . '/views/layouts/header_admin.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <br/>

            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="/admin">Админпанель</a></li>
                    <li><a href="/admin/rubric">Управление рубриками</a></li>
                    <li class="active">Редактировать рубрику</li>
                </ol>
            </div>


            <h4>Редактировать рубрику "<?php echo $category['name']; ?>"</h4>

            <br/>

            <div class="col-lg-4">
                <div class="login-form">
                    <form action="#" method="post">

                        <p>Родительская рубрика</p>
                        <select name="parent_id">
                            <?php foreach ($rubricsList as $rubric): ?>
                                <?php if ($rubric['id'] != $category['id']): ?>
                                    <option value="<?= $rubric["id"] ?>" <?php if ($category['id'] == $rubric['parent_id']) {
                                        echo ' selected="selected"';
                                    } ?>><?= $rubric['name']; ?>
                                    </option>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </select>


                        <p>Название рубрики:</p>
                        <input type="text" name="name" placeholder="" value="<?php echo $category['name']; ?>">


                        <br><br>

                        <input type="submit" name="submit" class="btn btn-default" value="Сохранить">
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer_admin.php'; ?>

