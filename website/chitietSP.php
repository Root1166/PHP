<?php   

    require_once __DIR__ . '/autoload/autoload.php'; 
    $id = intval(getInput('id'));
    $product = $db->fetchID('product',$id);
    //  print_r($product); 



    $cateid = intval($product['category_id']);
    // print_r($cateid); 

    $sql = "SELECT * FROM product WHERE category_id = $cateid ORDER BY ID DESC LIMIT 4";
    $sanphamkemtheo = $db->fetchsql($sql);
    // print_r($sanphamkemtheo); 

    
?>
<?php   require_once __DIR__ . '/layouts/header.php'; ?>
<div class="col-md-9 bor">

    <section class="box-main1">
        <div class="col-md-6 text-center">
            <img src="<?php echo upload()?>product/<?php echo $product['thunbar']?>" class="img-responsive bor" id="imgmain" width="320"
                height="320" data-zoom-image="<?php echo upload()?>product/<?php echo $product['thunbar']?>">

            <?php foreach($sanphamkemtheo as $item) : ?>
            <div class="col-md-3 item-product bor">
                <a href="chitietSP.php?id=<?php echo $item['id'] ?>">
                    <img src="<?php echo upload()?>product/<?php echo $item['thunbar']?>" class="" width="100%" height="110">
                </a>
                <div class="hidenitem">
                    <p>
                        <a href="chitietSP.php?id=<?php echo $item['id'] ?>">
                            <i class="fa fa-search"></i>
                        </a>
                    </p>
                    <p>
                        <a href="">
                            <i class="fa fa-heart"></i>
                        </a>
                    </p>
                    <p>
                        <a href="">
                            <i class="fa fa-shopping-basket"></i>
                        </a>
                    </p>
                </div>
            </div>
            <?php endforeach;?>
        </div>
        <div class="col-md-6 bor" style="margin-top: 20px;padding: 30px;">
            <ul id="right">
                <li>
                    <h3>Tên sản phẩm:
                        <?php echo $product['name'] ?>
                    </h3>
                </li>
                <?php if($product['sale']>0): ?>
                <p>
                    <strike class="sale">
                        Giá:
                        <?php echo $product['sale']?> VND
                    </strike>
                    Giá:
                    <b class="price">
                        <?php echo $product['price']?> VND</b>
                </p>
                <?php else : ?> Giá:
                <b class="price">
                    <?php echo $product['price']?> VND</b>
                <?php endif;?>
                <li>
                    <a href="" class="btn btn-default">
                        <i class="fa fa-shopping-basket"></i>Add TO Cart
                    </a>
                </li>
            </ul>
        </div>

    </section>
    <div class="col-md-12" id="tabdetail">
        <div class="row">

            <ul class="nav nav-tabs">
                <li class="active">
                    <a data-toggle="tab" href="#home">Nội dung của sản phẩm </a>
                </li>
                <li>
                    <a data-toggle="tab" href="#menu1">Thông tin khác </a>
                </li>
                <li>
                    <a data-toggle="tab" href="#menu2">Menu 2</a>
                </li>
                <li>
                    <a data-toggle="tab" href="#menu3">Menu 3</a>
                </li>
            </ul>
            <div class="tab-content">
                <div id="home" class="tab-pane fade in active">
                    <h3>Nội dung</h3>
                    <p>
                        <?php echo $product['content']?>
                    </p>
                </div>
                <div id="menu1" class="tab-pane fade">
                    <h3> Thông tin khác </h3>
                    <p></p>
                </div>
                <div id="menu2" class="tab-pane fade">
                    <h3>Menu 2</h3>
                    <p></p>
                </div>
                <div id="menu3" class="tab-pane fade">
                    <h3>Menu 3</h3>
                    <p></p>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-12">
        <div class="showitem clearfix" style="margin-top:10px; margin-bottom:10px;">
            <?php foreach($sanphamkemtheo as $item) : ?>
            <div class="col-md-3 item-product bor">
                <a href="chitietSP.php?id=<?php echo $item['id'] ?>">
                    <img src="<?php echo upload()?>product/<?php echo $item['thunbar']?>" class="" width="100%" height="160">
                </a>
                <div class="info-item">
                    <a href="chitietSP.php?id=<?php echo $item['id'] ?>">
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
                </div>
                <div class="hidenitem">
                    <p>
                        <a href="chitietSP.php?id=<?php echo $item['id'] ?>">
                            <i class="fa fa-search"></i>
                        </a>
                    </p>
                    <p>
                        <a href="">
                            <i class="fa fa-heart"></i>
                        </a>
                    </p>
                    <p>
                        <a href="">
                            <i class="fa fa-shopping-basket"></i>
                        </a>
                    </p>
                </div>
            </div>
            <?php endforeach;?>
        </div>
    </div>

</div>
<?php   require_once __DIR__ . '/layouts/footer.php'; ?>