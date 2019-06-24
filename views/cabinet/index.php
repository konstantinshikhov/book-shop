<?php include ROOT . '/views/layouts/header.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <h3>Кабинет пользователя</h3>
            
            <h4>Привет, <?php echo $user['name'];?>!</h4>
            <ul class="nav ">
                <li><a href="/cabinet/edit">Редактировать данные</a></li>
                <?php if($user["role"]=="admin"):?>
                <li><a href="/admin/index">Админпанель</a></li>
                <?php endif;?>
            </ul>
            
        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer.php'; ?>