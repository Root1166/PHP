<?php 
     require_once __DIR__ . '/autoload/autoload.php'; 
     $id = intval(getInput('id'));
     $product = $db->fetchID('product',$id);

     
    $cateid = intval($product['category_id']);
    // print_r($cateid); 

    $sql = "SELECT * FROM product WHERE category_id = $cateid ORDER BY ID DESC LIMIT 3";
    $RelatedProducts = $db->fetchsql($sql);
    // print_r($RelatedProducts); 

?>

<?php   require_once __DIR__ . '/layout/header.php'; ?>
<div class="inner-header">
    <div class="container">
        <div class="pull-left">
            <h6 class="inner-title">Product</h6>
        </div>
        <div class="pull-right">
            <div class="beta-breadcrumb font-large">
                <a href="index.php">Home</a> /
                <span>Product</span>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>


<div class="container">
    <div id="content">
        <div class="row">
            <div class="col-sm-9">

                <div class="row">
                    <div class="single-item">
                        <div class="col-md-4 item-product bor single-item ">
                            <div class="single-item-header">
                                <a href="detailProduct.php?id=<?php echo $item[ 'id'] ?>">
                                    <img src="<?php echo upload()?>product/<?php echo $product['thunbar']?>" class="" id="imgmain" width="270" height="320">
                                </a>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="single-item-body">
                                <p class="single-item-title">
                                    <h3>Tên sản phẩm:
                                        <?php echo $product['name'] ?>
                                    </h3>
                                </p>
                                <?php if($product['sale']>0): ?>
                                <div>
                                    <p>
                                        <h5>Giá:
                                            <strike class="sale">
                                                <?php echo $product['sale']?> VND
                                            </strike>
                                            <b class="price">
                                                <?php echo $product['price']?> VND
                                            </b>
                                        </h5>
                                    </p>
                                </div>
                                <?php else : ?>
                                <b class="price">
                                    <p>
                                        <h3>Giá:
                                            <?php echo $product['price']?> VND</h3>
                                    </p>
                                </b>
                                <?php endif;?>

                            </div>

                            <div class="clearfix"></div>
                            <div class="space20">&nbsp;</div>

                            <div class="single-item-desc">
                                <p>
                                    <?php echo $product['content'] ?>
                                </p>
                            </div>
                            <div class="space20">&nbsp;</div>

                            <p>Options:</p>
                            <div class="single-item-options">
                                <div class="single-item-caption">
                                    <h5>
                                        <span style="color: red; ">
                                            Giỏ hàng:
                                        </span>
                                    </h5>
                                </div>
                                <div class="single-item-caption">
                                    <a class="add-to-cart pull-left" href="product.html">

                                        <i class="fa fa-shopping-cart"></i>
                                    </a>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="space40">&nbsp;</div>
                <div class="woocommerce-tabs">
                    <ul class="tabs">
                        <li>
                            <a href="#tab-description">Description</a>
                        </li>
                        <li>
                            <a href="#tab-reviews">Reviews (0)</a>
                        </li>
                    </ul>

                    <div class="panel" id="tab-description">
                        <p>
                            <?php echo $product['content'] ?>
                        </p>
                    </div>
                    <div class="panel" id="tab-reviews">
                        <p>No Reviews</p>
                    </div>
                </div>
                <div class="space50">&nbsp;</div>
                <div class="beta-products-list">
                    <h4>Related Products</h4>
                    </br>
                    <div class="row">
                        <?php foreach($RelatedProducts as $item):?>
                        <div class="col-sm-4">
                            <div class="single-item">
                                <?php if($item['sale']>0): ?>
                                <div class="ribbon-wrapper">
                                    <div class="ribbon sale">Sale</div>
                                </div>
                                <div class="single-item-header">
                                    <a href="detailProduct.php?id=<?php echo $item['id'] ?>">
                                        <img src="<?php echo upload()?>product/<?php echo $item['thunbar']?>" class="" width="100%" height="180">
                                    </a>
                                </div>
                                <?php else : ?>
                                <div class="single-item-header">
                                    <a href="detailProduct.php?id=<?php echo $item['id'] ?>">
                                        <img src="<?php echo upload()?>product/<?php echo $item['thunbar']?>" class="" width="100%" height="180">
                                    </a>
                                </div>
                                <?php endif;?>
                                <div class="info-item">
                                    <h5>
                                        <a href="detailProduct.php?id=<?php echo $item['id'] ?>">
                                            <?php echo $item['name']?>
                                        </a>
                                    </h5>
                                    <div>
                                        <?php if($item['sale']>0): ?>
                                        <div>
                                            <p>
                                                <b>Giá:</b>
                                                <strike class="sale">
                                                    <?php echo $item['sale']?> VND
                                                </strike>
                                                <b class="price">
                                                    <?php echo $item['price']?> VND
                                                </b>
                                            </p>
                                        </div>
                                        <?php else : ?>
                                        <b class="price">
                                            <p>Giá:
                                                <?php echo $item['price']?> VND
                                            </p>
                                        </b>
                                        <?php endif;?>
                                    </div>

                                </div>
                                <div class="single-item-caption">
                                    <a class="add-to-cart pull-left" href="product.html">
                                        <i class="fa fa-shopping-cart"></i>
                                    </a>
                                    <a class="beta-btn primary" href="detailProduct.php?id=<?php echo $item['id'] ?>">Details
                                        <i class="fa fa-chevron-right"></i>
                                    </a>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>

                    </div>
                </div>
                <!-- .beta-products-list -->
            </div>
            <div class="col-sm-3 aside">
                <div class="widget">
                    <h3 class="widget-title" style="background-color: cyan;">Best Sellers</h3>
                    <div class="widget-body">
                        <div class="beta-sales beta-lists">
                            <?php foreach($ProductTop as $item ):?>
                            <div class="media beta-sales-item">
                                <a class="pull-left" href="detailProduct.php?id=<?php echo $item['id'] ?>">
                                    <img src="<?php echo upload()?>product/<?php echo $item['thunbar']?>" class="" width="56" height="70">
                                </a>
                                <div class="media-body">
                                    Sample Woman Top
                                    <span class="beta-sales-price">$34.55</span>
                                </div>
                            </div>
                            <?php endforeach;?>

                        </div>
                    </div>
                </div>
                <!-- best sellers widget -->
                <div class="widget">
                    <h3 class="widget-title" style="background-color: cyan;">New Products</h3>
                    <div class="widget-body">
                        <div class="beta-sales beta-lists">
                            <?php foreach($productNew as $item) : ?>
                            <div class="media beta-sales-item">
                                <a class="pull-left" href="detailProduct.php?id=<?php echo $item['id'] ?>">
                                    <img src="<?php echo upload()?>product/<?php echo $item['thunbar']?>" class="" width="56" height="70">
                                </a>
                                <div class="media-body">
                                    <span class="beta-sales-price">
                                        <a href="detailProduct.php?id=<?php echo $item['id'] ?>">
                                            <?php echo $item['name']?>
                                        </a>
                                        <p>
                                            <?php if($item['sale']>0): ?>
                                            <p>
                                                <strike class="sale">
                                                    <?php echo $item['sale']?> VND
                                                </strike>
                                                <b class="price">
                                                    <?php echo $item['price']?> VND</b>
                                            </p>
                                            <?php else : ?>
                                            <b class="price">
                                                <?php echo $item['price']?> VND</b>
                                            <?php endif;?>
                                        </p>
                                    </span>
                                </div>
                            </div>
                            <?php endforeach;?>

                        </div>
                    </div>
                </div>
                <!-- best sellers widget -->
            </div>
        </div>
    </div>
    <!-- #content -->
</div>
<!-- .container -->

<?php   require_once __DIR__ . '/layout/footer.php'; ?>