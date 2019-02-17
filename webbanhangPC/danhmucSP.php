<?php   

    require_once __DIR__ . '/autoload/autoload.php'; 

    $id = intval(getInput('id'));
    $EditCategory = $db->fetchID('category',$id);
    
    if(isset($_GET['p'])){
        $p = $_GET['p'];
    }
    else{
        $p = 1;
    }

    $sql = "SELECT * FROM product WHERE category_id = $id";

    $total = count($db ->fetchsql($sql));

    $product = $db->fetchJones("product",$sql,$total,$p,4,true);
    $sotrang = $product['page'];
    unset($product['page']);

    $path = $_SERVER['SCRIPT_NAME'];

?>
<?php   require_once __DIR__ . '/layouts/header.php'; ?>
<div class="col-md-9 bor">
    <section class="box-main1">
        <h3 class="title-main">
            <a href=""> <?php echo $EditCategory['name'] ?></a>
        </h3>
        <div class="showitem clearfix" >
            <?php foreach($product as $item): ?>
                <div class="col-md-3 item-product bor">
                    <a href=" chitietSP.php?id=<?php echo $item['id'] ?>">
                        <img src="<?php echo upload()?>product/<?php echo $item['thunbar']?>" class="" width="100%" height="180">
                    </a>
                    <div class="info-item">
                        <a href="chitietSP.php?id=<?php echo $item['id'] ?>"><?php echo $item['name'] ?></a>
                        <p>
                            <strike class="sale"><?php echo $item['sale'] ?><?php echo $item['sale']== 0 ? '':'VND' ?></strike>
                            <b class="price"><?php echo $item['price']?> VND</b>
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
            <?php endforeach; ?>
        </div>
        <nav aria-label="Page navigation example" class="text-center">
            <ul class="pagination justify-content-end">
                <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1">Previous</a>
                </li>
                <?php for($i = 1;$i <= $sotrang; $i++):?>
                <li class="<?php echo ($i == $p) ? 'active' : ''?> page-item">
                    <a href="<?php echo $path?>?id=<?php echo $id ?>&&p=<?php echo $i?>"><?php echo $i ?></a>
                </li>
                <?php endfor; ?>
                <li>
                <a class="page-link" href="#">Next</a>
                </li>
            </ul>
        </nav>
    </section>
</div>

<?php   require_once __DIR__ . '/layouts/footer.php'; ?>