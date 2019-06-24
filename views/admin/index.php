<?php include ROOT . '/views/layouts/header_admin.php'; ?>

<section>
    <div class="container">
        <div class="row">
            
            <br/>
            
            <h4>Добрый день, администратор!</h4>
            
            <br/>
            
            <p>Вам доступны такие возможности:</p>
            
            <br/>
            
            <ul class="nav nav-tabs" style="background: #333;">
                <li><a href="/admin/author">Управление авторами</a></li>
                <li><a href="/admin/published">Управление издательствами</a></li>
                <li><a href="/admin/rubric">Управление рубриками</a></li>
                <li><a href="/admin/book">Управление книгами</a></li>
            </ul>
            
        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer_admin.php'; ?>

