<?php include ROOT . '/views/layouts/header_admin.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <br/>

            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="/admin">Админпанель</a></li>
                    <li><a href="/admin/product">Управление товарами</a></li>
                    <li class="active">Редактировать товар</li>
                </ol>
            </div>


            <h4>Редактировать товар #<?php echo $id; ?></h4>

            <br/>

            <div class="col-lg-4">
                <div class="login-form">
                    <form action="#" method="post" enctype="multipart/form-data">

                        <p>Название книги</p>
                        <input type="text" name="name" placeholder="" value="<?= $book['name'];?>">
                        <div class="rows" id="author">
                            <p>Автор(ы) книги</p>
                            <div class="rows">
                                <select name="authors[]" >
                                    <option></option>
                                    <?php if(is_array($authorsList)):?>
                                        <?php foreach($authorsList as $item ):?>
                                            <option value="<?= $item['id'];?>" ><?= $item['name']?></option>
                                        <?php endforeach;?>
                                    <?php endif;?>
                                </select>
                            </div>
                        </div>
                        <p>Дата публикации:</p>
                        <input type="date" name="date_publish" value="<?= $book['date_publish']?>">
                        <p>Издательство:</p>
                        <select name="id_published">
                            <option></option>
                            <?php if(is_array($publishHousesList)):?>
                                <?php foreach($publishHousesList as $item ):?>
                                    <option value="<?= $item['id'];?>" <?php if($book['publishing_houses_id']==$item['id']) echo 'selected'?>><?= $item['name']?></option>
                                <?php endforeach;?>
                            <?php endif;?>
                        </select>

                        <div class="row" style="margin: 10px; border: 1px solid grey;">
                            <p>Выберите рубрику:</p>
                            <select name="rubric_id">
                                <?php foreach ($rubricsList as $rubric): ?>
                                        <option value="<?= $rubric["id"] ?>" <?php if ($book['rubric_id'] == $rubric['id']) {
                                            echo ' selected="selected"';
                                        } ?>><?= $rubric['name']; ?>
                                        </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <br/><br/>
                        <div class="row img-book">
                            <p>Изображение книги</p>
                            <input type="file" name="image[]" placeholder="">
                            <button id="add_img">Добавить</button>

                        </div>

                        <p>Детальное описание книги</p>
                        <textarea name="description" value="<?= $book['description']?>"><?= $book['description']?></textarea>

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

