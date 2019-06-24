<?php include ROOT . '/views/layouts/header_admin.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <br/>

            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="/admin">Админпанель</a></li>
                    <li><a href="/admin/product">Управление книгами</a></li>
                    <li class="active">Редактировать книгу</li>
                </ol>
            </div>


            <h4>Добавить новую книгу</h4>

            <br/>

            <?php if (isset($errors) && is_array($errors)): ?>
                <ul>
                    <?php foreach ($errors as $error): ?>
                        <li> - <?php echo $error; ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>

            <div class="col-lg-4">
                <div class="login-form">
                    <form action="#" method="post" enctype="multipart/form-data">

                        <p>Название книги</p>
                        <input type="text" name="name" placeholder="" value="">
                        <div class="rows" id="author">
                            <p>Автор(ы) книги</p>
                            <div class="rows">
                                <select name="authors[]" >
                                    <option></option>
                                    <?php if(is_array($authorsList)):?>
                                        <?php foreach($authorsList as $item ):?>
                                            <option value="<?= $item['id'];?>"><?= $item['name']?></option>
                                        <?php endforeach;?>
                                    <?php endif;?>
                                </select>
                            </div>
                        </div>
                        <p>Дата публикации:</p>
                        <input type="date" name="date_publish">
                        <p>Издательство:</p>
                        <select name="id_published">
                            <option></option>
                            <?php if(is_array($publishHousesList)):?>
                            <?php foreach($publishHousesList as $item ):?>
                                <option value="<?= $item['id'];?>"><?= $item['name']?></option>
                            <?php endforeach;?>
                            <?php endif;?>
                        </select>

                        <div class="row" style="margin: 10px; border: 1px solid grey;">
                        <p>Выберите категорию:</p>
                        <?php Rubric::view_cat_book( $categoriesList);?>
                        </div>
                        <br/><br/>
                        <div class="row img-book">
                            <p>Изображение книги</p>
                            <input type="file" name="image[]" placeholder="">
                            <button id="add_img">Добавить</button>

                        </div>

                        <p>Детальное описание книги</p>
                        <textarea name="description"></textarea>

                        <br/><br/>

                        <br/><br/>

                        <input type="submit" name="submit" class="btn btn-default" value="Сохранить">

                        <br/><br/>

                    </form>
                </div>
            </div>

        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer_admin.php'; ?>

