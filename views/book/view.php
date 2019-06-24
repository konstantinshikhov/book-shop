<?php include ROOT . '/views/layouts/header.php'; ?>

<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="left-sidebar">
                    <h2>Каталог</h2>
                    <div class="panel-group category-products">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <?php Rubric::view_cat($categories);?>
                                    </h4>
                                </div>
                            </div>

                    </div>
                </div>
            </div>

            <div class="col-sm-9 padding-right">
                <div class="product-details"><!--product-details-->
                    <div class="row">
                        <div class="col-sm-5">
                            <div class="view-product">
                                <img src="<?php echo Book::getImage($product['id']); ?>" alt="" />
                            </div>
                        </div>
                        <div class="col-sm-7">
                            <div class="product-information"><!--/product-information-->

<!--                                --><?php //if ($product['is_new']): ?>
<!--                                    <img src="/template/images/product-details/new.jpg" class="newarrival" alt="" />-->
<!--                                --><?php //endif; ?>

                                <h2><?php echo $product['name']; ?></h2>
                                <p><b>Авторы:</b>
                                    <?= implode(',',$authors);
                                    ?>
                                </p>
                                <p><b>Дата публикации:</b> <?php echo $product['date_publish']; ?></p>

<!--                                <span>-->
<!--                                    <span>US $--><?php //echo $product['price']??0; ?><!--</span>-->
<!--                                    <a href="#" data-id="--><?php //echo $product['id']; ?><!--"-->
<!--                                       class="btn btn-default add-to-cart">-->
<!--                                        <i class="fa fa-shopping-cart"></i>В корзину-->
<!--                                    </a>-->
<!--                                </span>-->
<!--                                <p><b>Наличие:</b> --><?php //echo Product::getAvailabilityText($product['availability']); ?><!--</p>-->
                                <p><b>Издатель:</b> <?= $product['name_publish']; ?></p>
                                <p><b>Адресс издательства:</b> <?= $product['address']; ?></p>
                                <p><b>Телефон:</b> <?= $product['phone']; ?></p>
                            </div><!--/product-information-->
                        </div>

                    </div>
                    <div class="row">
                                        <div class="recommended_items"><!--recommended_items -->
                                            <h2 class="title text-center">Фотографии книги</h2>

                                            <div class="cycle-slideshow"
                                                 data-cycle-fx=carousel
                                                 data-cycle-timeout=5000
                                                 data-cycle-carousel-visible=3
                                                 data-cycle-carousel-fluid=true
                                                 data-cycle-slides="div.item"
                                                 data-cycle-prev="#prev"
                                                 data-cycle-next="#next"
                                                 >
                                                    <?php ;?>
                                                     <?php foreach ($sliderBook as $sliderItem): ?>

                                                    <div class="item" >
                                                        <div class="product-image-wrapper">
                                                            <div class="single-products">
                                                                <div class="productinfo text-center" style="width: auto;">
                                                                    <img src="<?php echo Book::getImageSlider($sliderItem); ?>" alt="" />

                                                                    <br/><br/>

                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php endforeach; ?>
                                            </div>

                                            <a class="left recommended-item-control" id="prev" href="#recommended-item-carousel" data-slide="prev">
                                                <i class="fa fa-angle-left"></i>
                                            </a>
                                            <a class="right recommended-item-control" id="next"  href="#recommended-item-carousel" data-slide="next">
                                                <i class="fa fa-angle-right"></i>
                                            </a>

                                        </div>
                    </div>

                    <div class="row">                                
                        <div class="col-sm-12">
                            <br/>
                            <h5>Описание товара</h5>
                            <?php echo $product['description']; ?>
                        </div>
                    </div>
                </div><!--/product-details-->

            </div>
        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer.php'; ?>