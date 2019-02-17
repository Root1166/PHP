<?php 
    $open = "category";
    require_once __DIR__ . '/../../autoload/autoload.php'; 
    $id = intval(getInput('id'));

    $EditCategory =  $db->fetchId('category',$id);

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
            $insertCategory = $db->update('category',$data,array('id' => $id));
            if($insertCategory > 0){
                $_SESSION['success'] = "Cập nhật thành công";
                redirectAdmin("category");
            }
            else{
                $_SESSION['error'] = "Cập nhật thất bại";
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
                <a href="<?php echo modules("admin")?>">
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
<div class="row">
    <div class="col-md-12">
        <form class="" action="" method="POST" enctype="multipart/form-data">
            <!-- Ten danh muc -->

            <div class="form-group row">
                <label for="inputName" class="col-sm-2 col-form-label">Tên danh mục:</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control col-md-10" id="inputName" placeholder="Dell" name="name" value="<?php echo $EditCategory['name']?>">
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

<?php require_once __DIR__ . '/../../layouts/footer.php'; ?>