<?php   

    require_once __DIR__ . '/autoload/autoload.php'; 
    
    $sqlHome = "SELECT name , id FROM category WHERE home = 1 ORDER BY updated_at ";
    // print_r($sqlHome);
    $CategoryHome = $db -> fetchsql($sqlHome);
    // print_r($CategoryHome);

    
    $data = [];

    foreach( $CategoryHome as $item){
        $cateId = intval($item['id']);
       
        $sql = " SELECT * FROM product WHERE category_id = $cateId ";
      
        $Homeproduct = $db -> fetchsql($sql);
       // print_r($Homeproduct);
        $data[$item['name']] = $Homeproduct;
    }
?>
<?php   require_once __DIR__ . '/layouts/header.php'; ?>
    <div class="col-md-9 bor pull-left ">
        <section id="slide" class="text-center">
            <img src="<?php echo base_url() ?>public/frontend/images/bannerPC.jpg" class="img-thumbnail">
        </section>
        <section class="box-main1 ">
            <?php foreach($data as $key => $value) :?>
                <h3 class="title-main clearfix">
                <a href=""><?php echo $key ?></a>
                </h3>
                <div class="showitem clearfix" style="margin-top:10px; margin-bottom:10px;">
                    <?php foreach($value as $item) : ?>
                    <div class="col-md-3 item-product bor">
                        <a href="chitietSP.php?id=<?php echo $item['id'] ?>">
                            <img src="<?php echo upload()?>product/<?php echo $item['thunbar']?>" class="" width="100%" height="180">
                        </a>
                        <div class="info-item">
                            <a href="chitietSP.php?id=<?php echo $item['id'] ?>"><?php echo $item['name']?></a>
                            <p>
                            <?php if($item['sale']>0): ?>
                           <p>
                                <strike class="sale">
                                    <?php echo $item['sale']?> VND
                                </strike>
                                <b class="price"><?php echo $item['price']?> VND</b>
                            </p>
                            <?php else : ?>
                                <b class="price"><?php echo $item['price']?> VND</b>
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
            <?php endforeach;?>
        </section>
    </div>
<?php   require_once __DIR__ . '/layouts/footer.php'; ?>
         

