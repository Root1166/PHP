<?php

    require_once __DIR__ . '/autoload/autoload.php'; 

?>
<?php require_once __DIR__ . '/layouts/header.php'; ?>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Xin chào  admin:  <?php echo $_SESSION['admin_name']?>
           
        </h1>
        <ol class="breadcrumb">
            <li style="margin-right: 5px; margin-left: 5px;">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <a href="<?php echo modules("admin/indext.php ")?>">Admin</a>
            </li> /
            <li class="active" style="margin-right: 5px; margin-left: 5px;">
                <i class="fa fa-file"></i> Blank Page
            </li>
        </ol>
    </div>
</div>
<?php require_once __DIR__ . '/layouts/footer.php'; ?>