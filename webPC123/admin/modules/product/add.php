<?php 
    $open = "product";
    require_once __DIR__ . '/../../autoload/autoload.php'; 


    $category = $db ->fetchAll("category");
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

       if(!isset($_FILES['thunbar'])){
        $error['thunbar'] = "Mời bạn chọn hình ảnh";
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
           $id_insert = $db->insert('product',$data);
           if($id_insert > 0){
               move_uploaded_file($file_tmp,$part.$file_name);
               $_SESSION['success'] = "Thêm mới thành công";
               redirectAdmin("product");
           }
           else{
               $_SESSION['error'] = "error";
           }

       }
    }

?>
<?php require_once __DIR__ . '/../../layouts/header.php'; ?>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Add product
        </h1>
        <ol class="breadcrumb">
            <li class="active" style="margin-right: 5px;margin-left: 5px;">
                <a href="<?php echo modules(" product/indext.php ")?>">
                    <i class="fa fa-list"></i>
                    <span>Sản phẩm</span>
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
<div class="wrapper">
    <div class="center ">
        <div class="card">
            <div class="card-body ">
                <h4 class="card-title">Add Product</h4>
                <p class="card-description">
                    By Admin
                </p>
                <form class="" action="" method="POST" enctype="multipart/form-data">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label"><strong>Danh mục sản phẩm</strong></label>
                        <div class="col-sm-8">
                            <!-- <input type="text" class="form-control" id="inputDanhmuc" placeholder="text" name="category_id"> -->
                            <select class="form-control col-md-10" name="category_id">
                                <option value="">------------------------------Mời chọn danh mục sản phẩm-------------------------------</option>
                                <?php foreach($category as $item):?>
                                <option value="<?php echo $item['id']?>">
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
                        <label for="inputName" class="col-sm-3 col-form-label"><strong>Tên tên sản phẩm:</strong></label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control col-md-10" id="inputName" placeholder="text" name="name">
                            <?php if(isset($error['name'])): ?>
                            <?php echo $error['name']; ?>
                            <?php endif ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputGia" class="col-sm-3 col-form-label"><strong>Giá sản phẩm:</strong> </label>
                        <div class="col-sm-8">
                            <input type="number" class="form-control col-md-10" id="inputGiaSp" placeholder="9.000.000" name="price">
                            <?php if(isset($error['price'])): ?>
                            <?php echo $error['price']; ?>
                            <?php endif ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputGia" class="col-sm-3 col-form-label"><strong>Số lượng Sp:</strong></label>
                        <div class="col-sm-8">
                            <input type="number" class="form-control col-md-10" id="SL" name="number">
                            <?php if(isset($error['number'])): ?>
                            <?php echo $error['number']; ?>
                            <?php endif ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputGiamGia" class="col-sm-3 col-form-label"><strong>Giảm giá:</strong></label>
                        <div class="col-sm-4">
                            <input type="number" class="form-control" id="inputGiamGia" placeholder="10%" name="sale" value="">
                        </div>

                        <label for="inputHinhanh" class=""><strong>Hình ảnh</strong></label>
                        <div class="col-sm-4">
                            <input type="file" class="" id="inputHinhanh" name="thunbar">
                            <?php if(isset($error['thunbar'])): ?>
                            <?php echo $error['thunbar']; ?>
                            <?php endif ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputcontent" class="col-sm-3 col-form-label"><strong>Nội dung:</strong></label>
                        <div class="col-sm-8">
                            <textarea class="form-control col-md-10" name="content" row="5"> </textarea>
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
    </div>

</div>

<?php require_once __DIR__ . '/../../layouts/footer.php'; ?>