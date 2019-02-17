<?php 
    $open = "product";
    require_once __DIR__ . '/../../autoload/autoload.php'; 


    $id = intval(getInput('id'));

    $Editproduct = $db ->fetchID('product',$id);

    if(empty($Editproduct)){
        $_SESSION['error'] = "Dữ liệu không tồn tại";
        redirectAdmin("product/indext.php");
    }


    $category = $db -> fetchAll('category');
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $data=[
            "name"          =>  PostInput('name'),
            "slug"          =>  to_slug(PostInput('name')),
            "category_id"   =>  PostInput("category_id"),
            "price"         =>  PostInput("price"),
            "content"       =>  PostInput("content"),
            "sale"          =>  PostInput("sale"),
            "number"        =>  PostInput("number"),

       ];

 
        $error = [];
        if(PostInput('name') == '')
       {
           $error['name'] = 'Mời bạn nhập tên sản phẩm';
       }

       if(PostInput('category_id') == '')
       {
           $error['category_id'] = 'Moi ban chọn danh mục sản phẩm';
       }

       if(PostInput('price') == '')
       {
           $error['price'] = 'Mời bạn nhập giá sản phẩm';
       }

       if(PostInput('number') == '')
       {
           $error['number'] = 'Mời bạn nhập sô lượng sản phẩm';
       }

       if(PostInput('content') == '')
       {
           $error['content'] = 'Mời bạn nhập nội dung của sản phẩm';
       }

        if(empty($error)){
            if(isset($_FILES['thunbar'])){
                $file_name = $_FILES['thunbar']['name'];
                $file_tmp  = $_FILES['thunbar']['tmp_name'];
                $file_type = $_FILES['thunbar']['type'];
                $file_erro = $_FILES['thunbar']['error'];
 
                if($file_erro == 0){
                    $part = ROOT ."product/";
                    $data['thunbar'] = $file_name;
                }
            }
        }

        $id_update = $db->update('product',$data,array("id"=>$id));
        if($id_update > 0){
            move_uploaded_file($file_tmp,$part.$file_name);
            $_SESSION['success'] = "Cập nhật thành công";
            redirectAdmin("product");
        }
        else{
            $_SESSION['error'] = "error";
        }
     }

?>
<?php require_once __DIR__ . '/../../layouts/header.php'; ?>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
           Update Product
        </h1>
        <ol class="breadcrumb">
        <li class="active" style="margin-right: 5px;margin-left: 5px;">
                <a href="<?php echo modules("indext.php")?>">
                    <i class="fa fa-list"></i>
                    <span>Product</span>
                </a>
            </li>/
            <li class="active" style="margin-left: 5px;">
                <i class="fa fa-file"></i> Add
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
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Danh mục sản phẩm</label>
                <div class="col-sm-8">
                    <!-- <input type="text" class="form-control" id="inputDanhmuc" placeholder="text" name="category_id"> -->
                    <select class="form-control col-md-10" name="category_id">
                        <option value="">-----------------Mời chọn danh mục sản phẩm----------------------</option>
                        <?php foreach($category as $item):?>
                        <option value="<?php echo $item['id']?>" <?php echo $Editproduct['category_id'] == $item['id'] ? 'selected= "selected' : ''?>>
                            <?php echo $item['name']?>
                        </option>
                        <?php endforeach ?>
                    </select>
                    <?php if(isset($error['category_id'])): ?>
                    <?php echo $error['category_id']; ?>
                    <?php endif ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputName" class="col-sm-2 col-form-label">Tên tên sản phẩm</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control col-md-10" id="inputName" placeholder="tên sản phẩm" name="name" value="<?php echo $Editproduct['name']?>">
                    <?php if(isset($error['name'])): ?>
                    <?php echo $error['name']; ?>
                    <?php endif ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputGia" class="col-sm-2 col-form-label">Giá sản phẩm </label>
                <div class="col-sm-8">
                    <input type="number" class="form-control col-md-10" id="inputGiaSp" placeholder="9.000.000" 
                    name="price" value="<?php echo $Editproduct['price']?>">
                    <?php if(isset($error['price'])): ?>
                    <?php echo $error['price']; ?>
                    <?php endif ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputGia" class="col-sm-2 col-form-label">Số lượng Sp</label>
                <div class="col-sm-8">
                    <input type="number" class="form-control col-md-10" id="SL" 
                    name="number" value="<?php echo $Editproduct['number']?>">
                    <?php if(isset($error['number'])): ?>
                    <?php echo $error['number']; ?>
                    <?php endif ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputGiamGia" class="col-sm-2 col-form-label">Giảm giá</label>
                <div class="col-sm-4">
                    <input type="number" class="form-control" id="inputGiamGia" placeholder="10%" name="sale" value="" value="<?php echo $Editproduct['sale']?>">
                </div>

                <label for="inputHinhanh" class="">Hình ảnh</label>
                <div class="col-sm-4">
                    <input type="file" class="" id="inputHinhanh" name="thunbar">
                    <?php if(isset($error['thunbar'])): ?>
                    <?php echo $error['thunbar']; ?>
                    <?php endif ?>
                    <img src="<?php echo upload()?>product/<?php echo $Editproduct['thunbar']?>" style="width:100px;height:80px">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputcontent" class="col-sm-2 col-form-label">Nội dung</label>
                <div class="col-sm-8">
                    <textarea class="form-control col-md-10" name="content" row="5" ><?php echo $Editproduct['content']?></textarea>
                    <?php if(isset($error['content'])): ?>
                    <?php echo $error['content']; ?>
                    <?php endif ?>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>
        </form>
    </div>

</div>


<?php require_once __DIR__ . '/../../layouts/footer.php'; ?>