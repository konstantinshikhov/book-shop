<?php include ROOT . '/views/layouts/header_admin.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <br/>

            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="/admin">Админпанель</a></li>
                    <li><a href="/admin/published">Управление издательствами</a></li>
                    <li class="active">Добавить издательство</li>
                </ol>
            </div>


            <h4>Добавить новое издательство</h4>

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
                    <form action="#" method="post">

                        <p>Название издательства</p>
                        <input type="text" name="name" placeholder="" value="">

                        <br><br>
                        <p>Адресс издательства</p>
                        <input type="text" name="address" placeholder="" value="">

                        <br><br>
                        <p>Телефон издательства</p>
                        <input type="tel" name="phone" placeholder="" value="">

                        <br><br>
                        <input type="submit" name="submit" class="btn btn-default" value="Сохранить">
                    </form>
                </div>
            </div>


        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer_admin.php'; ?>

