<?php include ROOT . '/views/layouts/header_admin.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <br/>

            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="/admin">Админпанель</a></li>
                    <li><a href="/admin/published">Управление издательствами</a></li>
                    <li class="active">Редактировать издательство</li>
                </ol>
            </div>


            <h4>Редактировать Автора #<?php echo $id; ?></h4>

            <br/>

            <div class="col-lg-4">
                <div class="login-form">
                    <form action="#" method="post" enctype="multipart/form-data">

                        <p>Название издательства</p>
                        <input type="text" name="name" placeholder="" value="<?= $published['name']?>">

                        <br><br>
                        <p>Адресс издательства</p>
                        <input type="text" name="address" placeholder="" value="<?= $published['address']?>">

                        <br><br>
                        <p>Телефон издательства</p>
                        <input type="tel" name="phone" placeholder="" value="<?= $published['phone']?>">

                        <br><br>

                        <input type="submit" name="submit" class="btn btn-default" value="Сохранить">
                        
                        <br/><br/>
                        
                    </form>
                </div>
            </div>

        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer_admin.php'; ?>

