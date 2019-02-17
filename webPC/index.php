<?php   

    require_once __DIR__ . '/autoload/autoload.php'; 



    /**
     * count product new
     */

    $num1 = "SELECT COUNT(*) as total1 FROM product  WHERE 1";

    $numProNew = $db->fetchsql($num1);
    foreach($numProNew as $numberNew);
   /**
    * count top product
    */
    $num2 = "SELECT COUNT(*) as total2 FROM product Where price > 900000";

    $numProTop = $db->fetchsql($num2);
    foreach($numProTop as $numberTop);



   
?>
<?php   require_once __DIR__ . '/layout/header.php'; ?>



<!-- #header -->
<div class="rev-slider">
    <div class="fullwidthbanner-container">
        <div class="fullwidthbanner">
            <div class="bannercontainer">
                <div class="banner">
                    <ul>
                        <!-- THE FIRST SLIDE -->
                        <li data-transition="boxfade" data-slotamount="20" class="active-revslide" style="width: 100%; height: 100%; overflow: hidden; z-index: 18; visibility: hidden; opacity: 0;">
                            <div class="slotholder" style="width:100%;height:100%;" data-duration="undefined" data-zoomstart="undefined" data-zoomend="undefined"
                                data-rotationstart="undefined" data-rotationend="undefined" data-ease="undefined" data-bgpositionend="undefined"
                                data-bgposition="undefined" data-kenburns="undefined" data-easeme="undefined" data-bgfit="undefined"
                                data-bgfitend="undefined" data-owidth="undefined" data-oheight="undefined">
                                <div class="tp-bgimg defaultimg" data-lazyload="undefined" data-bgfit="cover" data-bgposition="center center" data-bgrepeat="no-repeat"
                                    data-lazydone="undefined" src="<?php echo base_url() ?>public/frontend/images/thumbs/baner.jpg"
                                    data-src="<?php echo base_url() ?>public/frontend/images/thumbs/baner.jpg" style="background-color: rgba(0, 0, 0, 0); background-repeat: no-repeat; background-image: url('<?php echo base_url() ?>public/frontend/images/thumbs/baner.jpg'); background-size: cover; background-position: center center; width: 100%; height: 100%; opacity: 1; visibility: inherit;">
                                </div>
                            </div>

                        </li>
                        <li data-transition="boxfade" data-slotamount="20" class="active-revslide" style="width: 100%; height: 100%; overflow: hidden; z-index: 18; visibility: hidden; opacity: 0;">
                            <div class="slotholder" style="width:100%;height:100%;" data-duration="undefined" data-zoomstart="undefined" data-zoomend="undefined"
                                data-rotationstart="undefined" data-rotationend="undefined" data-ease="undefined" data-bgpositionend="undefined"
                                data-bgposition="undefined" data-kenburns="undefined" data-easeme="undefined" data-bgfit="undefined"
                                data-bgfitend="undefined" data-owidth="undefined" data-oheight="undefined">
                                <div class="tp-bgimg defaultimg" data-lazyload="undefined" data-bgfit="cover" data-bgposition="center center" data-bgrepeat="no-repeat"
                                    data-lazydone="undefined" src="<?php echo base_url() ?>public/frontend/images/thumbs/baner.jpg"
                                    data-src="<?php echo base_url() ?>public/frontend/images/thumbs/baner.jpg" style="background-color: rgba(0, 0, 0, 0); background-repeat: no-repeat; background-image: url('<?php echo base_url() ?>public/frontend/images/thumbs/baner.jpg'); background-size: cover; background-position: center center; width: 100%; height: 100%; opacity: 1; visibility: inherit;">
                                </div>
                            </div>

                            <li data-transition="boxfade" data-slotamount="20" class="active-revslide" style="width: 100%; height: 100%; overflow: hidden; z-index: 18; visibility: hidden; opacity: 0;">
                                <div class="slotholder" style="width:100%;height:100%;" data-duration="undefined" data-zoomstart="undefined" data-zoomend="undefined"
                                    data-rotationstart="undefined" data-rotationend="undefined" data-ease="undefined" data-bgpositionend="undefined"
                                    data-bgposition="undefined" data-kenburns="undefined" data-easeme="undefined" data-bgfit="undefined"
                                    data-bgfitend="undefined" data-owidth="undefined" data-oheight="undefined">
                                    <div class="tp-bgimg defaultimg" data-lazyload="undefined" data-bgfit="cover" data-bgposition="center center" data-bgrepeat="no-repeat"
                                        data-lazydone="undefined" src="<?php echo base_url() ?>public/frontend/images/thumbs/baner.jpg"
                                        data-src="<?php echo base_url() ?>public/frontend/images/thumbs/baner.jpg" style="background-color: rgba(0, 0, 0, 0); background-repeat: no-repeat; background-image: url('<?php echo base_url() ?>public/frontend/images/thumbs/baner.jpg'); background-size: cover; background-position: center center; width: 100%; height: 100%; opacity: 1; visibility: inherit;">
                                    </div>
                                </div>

                            </li>

                            <li data-transition="boxfade" data-slotamount="20" class="active-revslide current-sr-slide-visible" style="width: 100%; height: 100%; overflow: hidden; visibility: inherit; opacity: 1; z-index: 20;">
                                <div class="slotholder" style="width:100%;height:100%;" data-duration="undefined" data-zoomstart="undefined" data-zoomend="undefined"
                                    data-rotationstart="undefined" data-rotationend="undefined" data-ease="undefined" data-bgpositionend="undefined"
                                    data-bgposition="undefined" data-kenburns="undefined" data-easeme="undefined" data-bgfit="undefined"
                                    data-bgfitend="undefined" data-owidth="undefined" data-oheight="undefined">
                                    <div class="tp-bgimg defaultimg" data-lazyload="undefined" data-bgfit="cover" data-bgposition="center center" data-bgrepeat="no-repeat"
                                        data-lazydone="undefined" src="<?php echo base_url() ?>public/frontend/images/thumbs/baner.jpg"
                                        data-src="<?php echo base_url() ?>public/frontend/images/thumbs/baner.jpg" style="background-color: rgba(0, 0, 0, 0); background-repeat: no-repeat; background-image: url('<?php echo base_url() ?>public/frontend/images/thumbs/baner.jpg'); background-size: cover; background-position: center center; width: 100%; height: 100%; opacity: 1; visibility: inherit;">
                                    </div>
                                </div>

                            </li>
                    </ul>
                </div>
            </div>

            <div class="tp-bannertimer"></div>
        </div>
    </div>
    <!--slider-->
</div>
<div class="container">
    <div id="content" class="space-top-none">
        <div class="main-content">
            <div class="space60">&nbsp;</div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="beta-products-list">
                        <h4>New Products</h4>
                        <div class="beta-products-details">
                            <p class="pull-left">
                                <?php echo $numberNew['total1'] ?> styles found</p>
                            <div class="clearfix"></div>
                        </div>

                        <div class="row">
                            <div class="showitem clearfix">
                                <?php foreach($productNew as $item) : ?>
                                <div class="col-md-3 item-product bor single-item" style="margin-top:2px; margin-bottom:30px;">
                                    <?php if($item['sale']>0): ?>
                                    <div>
                                        <div class="ribbon-wrapper">
                                            <div class="ribbon sale">Sale</div>
                                        </div>

                                        <div class="single-item-header">
                                            <a href="detailProduct.php?id=<?php echo $item['id'] ?>">
                                                <img src="<?php echo upload()?>product/<?php echo $item['thunbar']?>" class="" width="279" height="320">
                                            </a>
                                        </div>

                                        <div class="info-item">
                                            <h5>
                                                <a href="detailProduct.php?id=<?php echo $item['id'] ?>">
                                                    <?php echo $item['name']?>
                                                </a>
                                            </h5>
                                            <div>
                                                <!-- <?php if($item['sale']>0): ?> -->
                                                <p>
                                                    <b>Giá:</b>
                                                    <strike class="sale">
                                                        <?php echo $item['sale']?> VND
                                                    </strike>
                                                    <b class="price">
                                                        <?php echo $item['price']?> VND</b>
                                                </p>
                                                <!-- <?php else : ?> -->
                                                <!-- <b class="price">
                                                <p>Giá:
                                                    <?php echo $item['price']?> VND
                                                </p>
                                            </b> -->
                                                <!-- <?php endif;?> -->
                                            </div>
                                        </div>
                                        <div class="single-item-caption">
                                            <a class="add-to-cart pull-left" href="shopping_cart.html">
                                                <i class="fa fa-shopping-cart"></i>
                                            </a>
                                            <a class="beta-btn primary" href="detailProduct.php?id=<?php echo $item['id'] ?>">Details
                                                <i class="fa fa-chevron-right"></i>
                                            </a>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                    <?php else : ?>
                                    <div>
                                        <div class="single-item-header">
                                            <a href="detailProduct.php?id=<?php echo $item['id'] ?>">
                                                <img src="<?php echo upload()?>product/<?php echo $item['thunbar']?>" class="" width="270" height="320">
                                            </a>
                                        </div>

                                        <div class="info-item">
                                            <h5>
                                                <a href="detailProduct.php?id=<?php echo $item['id'] ?>">
                                                    <?php echo $item['name']?>
                                                </a>
                                            </h5>
                                            <div>
                                                <!-- <?php if($item['sale']>0): ?> -->
                                                <!-- <p>
                                                            <b>Giá:</b>
                                                            <strike class="sale">
                                                                <?php echo $item['sale']?> VND
                                                            </strike>
                                                            <b class="price">
                                                                <?php echo $item['price']?> VND</b>
                                                        </p> -->
                                                <!-- <?php else : ?> -->
                                                <b class="price">
                                                    <p>Giá:
                                                        <?php echo $item['price']?> VND
                                                    </p>
                                                </b>
                                                <!-- <?php endif;?> -->
                                            </div>
                                        </div>
                                        <div class="single-item-caption">
                                            <a class="add-to-cart pull-left" href="shopping_cart.html">
                                                <i class="fa fa-shopping-cart"></i>
                                            </a>
                                            <a class="beta-btn primary" href="detailProduct.php?id=<?php echo $item['id'] ?>">Details
                                                <i class="fa fa-chevron-right"></i>
                                            </a>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                    <?php endif;?>
                                </div>
                                <?php endforeach;?>
                            </div>
                        </div>

                    </div>
                    <!-- .beta-products-list -->

                    <div class="space50">&nbsp;</div>

                    <div class="beta-products-list">
                        <h4>Top Products</h4>
                        <div class="beta-products-details">
                            <p class="pull-left">
                                <?php echo $numberTop['total2'] ?> styles found</p>
                            <div class="clearfix"></div>
                        </div>
                        <div class="row">
                            <div class="showitem clearfix">
                                <?php foreach($ProductTop as $value) : ?>
                                <div class="col-md-3 item-product bor single-item" style="margin-top:2px; margin-bottom:30px;">
                                    <?php if($value['sale']>0): ?>
                                    <div>
                                        <div class="ribbon-wrapper">
                                            <div class="ribbon sale">Sale</div>
                                        </div>
                                        <div class="single-item-header">
                                            <a href="detailProduct.php?id=<?php echo $value['id'] ?>">
                                                <img src="<?php echo upload()?>product/<?php echo $value['thunbar']?>" class="" width="270" height="320">
                                            </a>
                                        </div>
                                        <div class="info-item">
                                            <h5>
                                                <a href="detailProduct.php?id=<?php echo $value['id'] ?>">
                                                    <?php echo $value['name']?>
                                                </a>
                                            </h5>
                                            <div>
                                                <!-- <?php if($value['sale']>0): ?> -->
                                                <div>
                                                    <p>
                                                        <b>Giá:</b>
                                                        <strike class="sale">
                                                            <?php echo $value['sale']?> VND
                                                        </strike>
                                                        <b class="price">
                                                            <?php echo $value['price']?> VND
                                                        </b>
                                                    </p>
                                                </div>
                                                <!-- <?php else : ?>
                                                <b class="price">
                                                    <p>Giá:
                                                        <?php echo $value['price']?> VND
                                                    </p>
                                                </b>
                                                <?php endif;?> -->
                                            </div>

                                        </div>
                                        <div class="single-item-caption">
                                            <a class="add-to-cart pull-left" href="shopping_cart.html">
                                                <i class="fa fa-shopping-cart"></i>
                                            </a>
                                            <a class="beta-btn primary" href="detailProduct.php?id=<?php echo $value['id'] ?>">Details
                                                <i class="fa fa-chevron-right"></i>
                                            </a>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                    <?php else : ?>
                                    <div>
                                        <div class="single-item-header">
                                            <a href="detailProduct.php?id=<?php echo $value['id'] ?>">
                                                <img src="<?php echo upload()?>product/<?php echo $value['thunbar']?>" class="" width="270" height="320">
                                            </a>
                                        </div>
                                        <div class="info-item">
                                            <h5>
                                                <a href="detailProduct.php?id=<?php echo $value['id'] ?>">
                                                    <?php echo $value['name']?>
                                                </a>
                                            </h5>

                                            <div>
                                                <!-- <?php if($value['sale']>0): ?> -->
                                                <!-- <div>
                                                    <p>
                                                        <b>Giá:</b>
                                                        <strike class="sale">
                                                            <?php echo $value['sale']?> VND
                                                        </strike>
                                                        <b class="price">
                                                            <?php echo $value['price']?> VND
                                                        </b>
                                                    </p>
                                                </div>
                                                <?php else : ?> -->
                                                <b class="price">
                                                    <p>Giá:
                                                        <?php echo $value['price']?> VND
                                                    </p>
                                                </b>
                                                <!-- <?php endif;?> -->
                                            </div>

                                        </div>
                                        <div class="single-item-caption">
                                            <a class="add-to-cart pull-left" href="shopping_cart.html">
                                                <i class="fa fa-shopping-cart"></i>
                                            </a>
                                            <a class="beta-btn primary" href="detailProduct.php?id=<?php echo $value['id'] ?>">Details
                                                <i class="fa fa-chevron-right"></i>
                                            </a>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                    <?php endif;?>
                                </div>
                                <?php endforeach;?>
                            </div>
                        </div>
                        <div class="space40">&nbsp;</div>

                    </div>
                    <!-- .beta-products-list -->
                </div>
            </div>
            <!-- end section with sidebar and main content -->


        </div>
        <!-- .main-content -->
    </div>
    <!-- #content -->
</div>
<!-- .container -->



<?php   require_once __DIR__ . '/layout/footer.php'; ?>