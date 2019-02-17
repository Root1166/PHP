<?php

    require_once __DIR__ . '/autoload/autoload.php'; 

?>
<?php require_once __DIR__ . '/layouts/header.php'; ?>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Xin chào admin: <?php echo $_SESSION['admin_name']?>
        </h1>
        <ol class="breadcrumb">
            <li style="margin-right: 5px; margin-left: 5px;">
                <i class="mdi mdi-format-list-bulleted"></i>
                <a href="<?php echo modules("admin/")?>">Admin</a>
            </li> /
            <li class="active" style="margin-right: 5px; margin-left: 5px;">
                <i class="mdi mdi-file"></i> Blank Page
            </li>
        </ol>
    </div>
    <div class="col-lg-12">
        <h1 class="page-header">
          Chào mừng bạn đến với trang của Admin
        </h1>
        
    </div>
    
</div>
<?php require_once __DIR__ . '/layouts/footer.php'; ?>