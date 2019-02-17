<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bán hàng online</title>
    <link href='http://fonts.googleapis.com/css?family=Dosis:300,400' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>public/frontend/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>public/frontend/vendors/colorbox/example3/colorbox.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>public/frontend/rs-plugin/css/settings.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>public/frontend/rs-plugin/css/responsive.css">
    <link rel="stylesheet" title="style" href="<?php echo base_url() ?>public/frontend/css/style.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>public/frontend/css/animate.css">
    <link rel="stylesheet" title="style" href="<?php echo base_url() ?>public/frontend/css/huong-style.css">
    <link rel="shortcut icon" href="<?php echo base_url() ?>public/admin/images/congthanh.jpg" />
</head>

<body>

    <div id="header">
        <div id="header">
            <div class="header-top">
                <div class="container">
                    <div class="pull-left auto-width-left">
                        <ul class="top-menu menu-beta l-inline">
                            <li>
                                <a href="">
                                    <i class="fa fa-home"></i>
                                    <strong> số 77 ngõ 68 triều khúc thanh xuân hà nội</strong>
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    <i class="fa fa-phone"></i>
                                    <strong>0345271166</strong>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="pull-right auto-width-right">
                        <?php  if(isset($_SESSION['name_user'] )):?>
                        <ul class="top-details menu-beta l-inline">

                            <li>
                                <a>
                                    <strong>Hello</strong>
                                    <?php echo $_SESSION['name_user'] ?>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fa fa-user"></i>
                                    <strong>Tài khoản</strong>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <strong>Thông tin</strong>
                                </a>
                            </li>
                            <li>
                                <a href="logout.php">
                                    <strong>logout</strong>
                                </a>
                            </li>
                        </ul>
                        <?php else: ?>
                        <ul class="top-details menu-beta l-inline">
                            <li>
                                <a href="registration.php">
                                    <strong>Registration</strong>
                                </a>
                            </li>
                            <li>
                                <a href="login.php">
                                    <strong>Login</strong>
                                </a>
                            </li>
                        </ul>
                        <?php endif?>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <!-- .container -->
            </div>


        </div>
        <!-- #header -->
        <!-- .header-top -->
        <div class="header-body">
            <div class="container beta-relative">
                <div class="pull-left">
                    <a href="index.html" id="logo">
                        <img src="<?php echo upload()?>avartarAdmin/avatar.jpg" class="" style="max-width: 200px;max-height: 100px;">
                    </a>
                </div>
                <div class="pull-right beta-components space-left ov">
                    <!-- <div class="space10">&nbsp;</div> -->
                    <div class="beta-comp">
                        <form role="search" method="get" id="searchform" action="/">
                            <input type="text" value="" name="s" id="s" placeholder="Nhập từ khóa..." />
                            <button class="fa fa-search" type="submit" id="searchsubmit"></button>
                        </form>
                    </div>

                    <div class="beta-comp">
                        <div class="cart">
                            <div class="beta-select">
                                <i class="fa fa-shopping-cart"></i> Giỏ hàng (Trống)
                                <i class="fa fa-chevron-down"></i>
                            </div>
                            <div class="beta-dropdown cart-body">
                                <div class="cart-item">
                                    <div class="media">
                                        <a class="pull-left" href="#">
                                            <img src="<?php echo base_url() ?>public/frontend/images/products/cart/1.png" alt="">
                                        </a>
                                        <div class="media-body">
                                            <span class="cart-item-title">Sample Woman Top</span>
                                            <span class="cart-item-options">Size: XS; Colar: Navy</span>
                                            <span class="cart-item-amount">1*
                                                <span>$49.50</span>
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                <div class="cart-item">
                                    <div class="media">
                                        <a class="pull-left" href="#">
                                            <img src="<?php echo base_url() ?>public/frontend/images/products/cart/2.png" alt="">
                                        </a>
                                        <div class="media-body">
                                            <span class="cart-item-title">Sample Woman Top</span>
                                            <span class="cart-item-options">Size: XS; Colar: Navy</span>
                                            <span class="cart-item-amount">1*
                                                <span>$49.50</span>
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                <div class="cart-item">
                                    <div class="media">
                                        <a class="pull-left" href="#">
                                            <img src="<?php echo base_url() ?>public/frontend/images/products/cart/3.png" alt="">
                                        </a>
                                        <div class="media-body">
                                            <span class="cart-item-title">Sample Woman Top</span>
                                            <span class="cart-item-options">Size: XS; Colar: Navy</span>
                                            <span class="cart-item-amount">1*
                                                <span>$49.50</span>
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                <div class="cart-caption">
                                    <div class="cart-total text-right">Tổng tiền:
                                        <span class="cart-total-value">$34.55</span>
                                    </div>
                                    <div class="clearfix"></div>

                                    <div class="center">
                                        <div class="space10">&nbsp;</div>
                                        <a href="checkout.html" class="beta-btn primary text-center">Đặt hàng
                                            <i class="fa fa-chevron-right"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- .cart -->
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
            <!-- .container -->
        </div>
        <!-- .header-body -->
        <div class="header-bottom" style="background-color: #222222;">
            <div class="container">

                <nav class="navbar-inverse" id="stick">
                    <div class="container-fluid">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                                <i class="fa fa-bars"></i>
                            </button>
                            <a class="navbar-brand" href="#">Logo</a>
                        </div>
                        <div class="collapse navbar-collapse" id="myNavbar">
                            <ul class="nav navbar-nav">
                                <li class="active">
                                    <a href="index.php">Home</a>
                                </li>
                                <li>
                                    <a href="CategoryProduct.php">Sản phẩm</a>
                                </li>
                                <li>
                                    <a href="about.php">About</a>
                                </li>
                                <li>
                                    <a href="#">Diễn đàn</a>
                                </li>
                                <li>
                                    <a href="">Liên hệ</a>
                                </li>

                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
            <!-- .container -->
        </div>
        <!-- .header-bottom -->
        <!-- .header-bottom -->
    </div>