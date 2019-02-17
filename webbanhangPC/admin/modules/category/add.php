<?php 
    $open = "category";
    require_once __DIR__ . '/../../autoload/autoload.php'; 

    
    if($_SERVER["REQUEST_METHOD"]=="POST"){
       $data=[
            "name" =>  PostInput('name'),
            "slug" =>   to_slug(PostInput('name'))
       ];

       $error = [];
       if(PostInput('name') == '')
       {
           $error['name'] = 'Moi ban nhap day du thong tin';
       }

       if(empty($error)){
            $isset = $db->fetchOne('category', "name='".$data['name']."' ");
            if(count($isset) > 0){
                $_SESSION['error'] = 'Danh mục đã tồn tại';
            }
            else{
                $id_insert = $db->insert('category',$data);
                if($id_insert > 0){
                    $_SESSION['success'] = "Thêm mới thành công";
                    redirectAdmin("category/indext.php");
                }
                else{
                    $_SESSION['error'] = "false";
                }
            }

       }
    }

?>
<?php require_once __DIR__ . '/../../layouts/header.php'; ?>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Add Category
        </h1>
        <ol class="breadcrumb">
            <li class="active" style="margin-right: 5px;margin-left: 5px;">
                <a href="<?php echo modules(" indext.php ")?>">
                    <i class="fa fa-list"></i>
                    <span>Category</span>
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
        <form class="" action="" method="POST">
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Tên danh mục</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="inputEmail3" placeholder="text" name="name">
                    <?php if(isset($error['name'])): ?>
                    <?php echo $error['name']; ?>
                    <?php endif ?>
                </div>
            </div>
            <!-- <div class="form-group row">
                <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
                <div class="col-sm-8">
                    <input type="password" class="form-control" id="inputPassword3" placeholder="Password">
                </div>
            </div> -->
            <!-- <fieldset class="form-group">
                <div class="row">
                    <legend class="col-form-label col-sm-2 pt-0">Radios</legend>
                    <div class="col-sm-8">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="option1" checked>
                            <label class="form-check-label" for="gridRadios1">
                                First radio
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="option2">
                            <label class="form-check-label" for="gridRadios2">
                                Second radio
                            </label>
                        </div>
                        <div class="form-check disabled">
                            <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios3" value="option3" disabled>
                            <label class="form-check-label" for="gridRadios3">
                                Third disabled radio
                            </label>
                        </div>
                    </div>
                </div>
            </fieldset> -->
            <!-- <div class="form-group row">
                <div class="col-sm-2"></div>
                <div class="col-sm-10">
                    <div class="check">
                        <label class="form-check-label" for="gridCheck1">
                            <input class="form-check-input" type="checkbox" id="gridCheck1"> Remember me
                        </label>
                    </div>
                </div>
            </div> -->
            <div class="form-group row">
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>
        </form>
    </div>

</div>


<?php require_once __DIR__ . '/../../layouts/footer.php'; ?>