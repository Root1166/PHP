
<!DOCTYPE html>
<html>

<head>
    <title>Bán hàng</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>public/frontend/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>public/frontend/css/bootstrap.min.css">

    <script src="<?php echo base_url() ?>public/frontend/js/jquery-3.2.1.min.js"></script>
    <script src="<?php echo base_url() ?>public/frontend/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url() ?>public/frontend/js/jquery.elevatezoom.js"></script>
    <!---->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>public/frontend/css/slick.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>public/frontend/css/slick-theme.css" />
    <!--slide-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>public/frontend/css/style.css">

</head>

<body>
    <div id="wrapper">
        <!---->
        <!--HEADER-->
        <div id="header">
            <div id="header-top">
                <div class="container">
                    <div class="row clearfix">
                        <div class="col-md-6" id="header-text">
                            <a>Công thành</a>
                            <b>Email: vancong1166@gmail.com</b>
                        </div>
                        <div class="col-md-6">
                            <nav id="header-nav-top">
                                <ul class="list-inline pull-right" id="headermenu">
                                    <?php  if(isset($_SESSION['name_user'] )):?>
                                        <li><strong>Hello <?php echo $_SESSION['name_user'] ?></strong></li>
                                        <li>
                                            <a href="">
                                                <i class="fa fa-user"></i> Tài khoản
                                                <i class="fa fa-caret-down"></i>
                                            </a>
                                            <ul id="header-submenu">
                                                <li>
                                                    <a href="">Thông tin</a>
                                                </li>
                                                <li>
                                                    <a href="">Liên hệ</a>
                                                </li>
                                                <li>
                                                    <a href="Logout.php"><i class="fa fa-share-square-o"></i>Log out</a>
                                                </li>
                                            </ul>
                                        </li>
                                    <?php else: ?>
                                        <li>
                                            <a href="login.php">
                                                <i class="fa fa-unlock"></i> Login
                                            </a>
                                        </li>
                                        <li>
                                            <a href="registration.php">
                                                <i class="fa fa-unlock"></i> Registration
                                            </a>
                                        </li>

                                    <?php endif?>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- <div class="container">
                <div class="row" id="header-main">
                    <div class="col-md-4">
                        <form class="form-inline">
                            <div class="form-group">
                                <label>
                                <select class="form-control col-md-10" name="category_id">
                                    <option value="">All Category</option>
                                    <?php foreach($category as $item):?>
                                    <option value="<?php echo $item['id']?>">
                                        <?php echo $item['name']?>
                                    </option>
                                    <?php endforeach ?>
                                </select>
                                </label>
                                <input type="text" name="keywork" placeholder=" input keywork" class="form-control">
                                <button type="submit" class="btn btn-default">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-4">
                        <a class="img-thumbnail">
                            <img src="<?php echo base_url() ?>public/frontend/images/conthanh.jpg" style="width: 600px;height: 200px">
                        </a>
                    </div>
                    <div class="col-md-4" id="header-right">
                        <div class="pull-right">
                            <div class="pull-left">
                                <i class="glyphicon glyphicon-phone-alt"></i>
                            </div>
                            <div class="pull-right">
                                <p id="hotline">HOTLINE</p>
                                <p>0345271166</p>
                            </div>

                        </div>
                    </div>
                </div>
            </div> -->
        </div>
        <!--END HEADER-->


        <!--MENUNAV-->
        <div id="menunav" style="position: sticky;top: 0;padding: 5px;left: 0px;top: 0px;z-index: 17;" >
            <div class="container ">
                <nav >
                    <div class="home pull-left">
                        <a href="indext.php">Trang chủ</a>
                    </div>
                    <!--menu main-->
                    <ul id="menu-main">
                        <li>
                            <a href="">Tin tuc</a>
                        </li>
                        <li>
                            <a href="">Mobile</a>
                        </li>
                        <li>
                            <a href="">Liên hệ</a>
                        </li>
                        <li>
                            <a href="aboutUs.php">About us</a>
                        </li>
                    </ul>
                    <!-- end menu main-->
                </nav>
            </div>
        </div>
        <!--ENDMENUNAV-->

        <div id="maincontent">
            <div class="container">
                <div class="col-md-3  fixside">
                    <div class="box-left box-menu">
                        <h3 class="box-title">
                            <i class="fa fa-list"></i>Category
                        </h3>

                        <ul>
                            <?php foreach( $category as $item) :?>
                            <li>
                                <a href="danhmucSP.php?id=<?php echo $item['id']?>">
                                    <?php echo $item['name'] ?>
                                </a>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>

                    <div class="box-left box-menu">
                        <h3 class="box-title">
                            <i class="fa fa-warning"></i> Product New </h3>
                     
                        <ul>
                            <?php foreach($productNew as $item): ?>
                            <li class="clearfix">
                                <a href="">
                                    <img src="<?php echo upload()?>product/<?php echo $item['thunbar']?>" class="img-responsive pull-left" width="60" height="60">
                                    <div class="info pull-right">
                                        <p class="name">
                                            <?php echo $item['name']?>
                                        </p>
                                        <b class="price">Giảm giá: <?php echo $item['price']?> VND</b>
                                        <br>
                                        <b class="sale">Giá sốc: <?php echo $item['sale'] ?></b>
                                        <br>
                                        
                                    </div>
                                </a>
                            </li>
                            <?php endforeach;?>
                        </ul>
                        <!-- </marquee> -->
                    </div>

                </div>