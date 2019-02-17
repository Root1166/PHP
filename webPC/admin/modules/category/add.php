<?php 
    $open = "category";
    require_once __DIR__ . '/../../autoload/autoload.php'; 

    $data=[
        'name'      => PostInput('name'),
        'slug'      => to_slug(PostInput('name')),
    ];

    if($_SERVER["REQUEST_METHOD"]=="POST"){

        $error = [];
        if($data['name'] ==''){
            $error['name'] = 'Mời bạn nhập tên danh mục';
        }

       

        if(empty($error)){
            $insertCategory = $db->insert('category',$data);
            if($insertCategory > 0){
                $_SESSION['success'] = "Thêm mới thành công";
                redirectAdmin("category");
            }
            else{
                $_SESSION['error'] = "Thêm mơi thất bại";
                redirectAdmin('category');
            }
        }       
    }
?>

<?php require_once __DIR__ . '/../../layouts/header.php'; ?>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Thêm Danh mục
        </h1>
        <ol class="breadcrumb">
            <li class="active" style="margin-right: 5px;margin-left: 5px;">
                <a href="<?php echo modules("category")?>">
                    <i class="mdi mdi-format-list-bulleted"></i>
                    <span>Danh mục</span>
                </a>
            </li>/
            <li class="active" style="margin-left: 5px;">
                <i class="mdi mdi-file"></i> Thêm mới
            </li>
        </ol>
        <div class="clearfix"></div>

        <!-- thông báo lỗi -->
        <?php require_once __DIR__ . '/../../../partials/notification.php'; ?>
    </div>
</div>

<div class="wrapper">
    <div class="center ">
        <div class="card">
            <div class="card-body ">
                <h4 class="card-title">Add Product</h4>
                <p class="card-description">
                    By Admin
                </p>
                <form class="" action="" method="POST" enctype="multipart/form-data">
                    <!-- Ten danh muc -->

                    <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label"><strong>Tên danh mục:</strong></label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control col-md-10" id="inputName" placeholder="Dell" name="name" value="<?php echo $data['name']?>">
                            <?php if(isset($error['name'])): ?>
                            <?php echo $error['name']; ?>
                            <?php endif ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-2">
                            <button type="submit" class="btn btn-primary" style="float:right">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>

<?php require_once __DIR__ . '/../../layouts/footer.php'; ?>