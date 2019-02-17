<?php 
    $open = "admin";
    require_once __DIR__ . '/../../autoload/autoload.php'; 

    $data=[
        'name'      => PostInput('name'),
        'email'     => PostInput('email'),
        'phone'     => PostInput('phone'),
        'address'   => PostInput('address'),
        'password'  => md5(PostInput('password')),
        'level'     => PostInput('level'),
    ];

    if($_SERVER["REQUEST_METHOD"]=="POST"){

        $error = [];
        if($data['name'] ==''){
            $error['name'] = 'Mời bạn nhập tên';
        }

        if($data['email'] == ''){
            $error['email'] = "Moi ban nhap email";
        }else{
            $is_checked = $db->fetchOne("admin"," email = '".$data['email']."' ");
            if($is_checked != NULL){
                $error['email'] = "Da ton tai";
            }
        }

        if($data['phone'] == ''){
            $error['phone'] = "Mời bạn nhập sdt";
        }
        else{
            $is_checked = $db->fetchOne("admin"," phone = '".$data['phone']."' ");
            if($is_checked != NULL){
                $error['phone'] = "Da ton tai";
            }
        }

        if($data["address"] == ''){
            $error['address'] = "Mời bạn nhâp địa chỉ của bạn";
        }
        if($data["level"] == ''){
            $error['level'] = "Mời bạn chọn level của bạn";
        }

        if(PostInput('password') == '')
        {
            $error['password'] = 'Mời bạn nhập password';
        }
        
        if($data['password'] !=  MD5(PostInput("re_password"))){
            $error['password'] = 'Password không khớp';
       }

       if(!isset($_FILES['avartar'])){
        $error['avartar'] = "Mời bạn chọn hình ảnh";
       }

        // if(empty($error)){
        //     $insertAdmin = $db->insert('admin',$data);
        //     if($insertAdmin > 0){
        //         $_SESSION['success'] = "Thêm mới thành công";
        //         redirectAdmin("admin");
        //     }
        //     else{
        //         $_SESSION['error'] = "Thêm mơi thất bại";
        //         redirectAdmin('admin');
        //     }
        // }

        /**
         * 
         * 
         */
        if(empty($error)){
            if(isset($_FILES['avartar'])){
                $file_name = $_FILES['avartar']['name'];
                $file_tmp  = $_FILES['avartar']['tmp_name'];
                $file_type = $_FILES['avartar']['type'];
                $file_erro = $_FILES['avartar']['error'];
 
                if($file_erro == 0){
                    $part = ROOT ."avartarAdmin/";
                    $data['avartar'] = $file_name;
                }
            }
            $id_insert = $db->insert('admin',$data);
            if($id_insert > 0){
                move_uploaded_file($file_tmp,$part.$file_name);
                $_SESSION['success'] = "Thêm mới thành công";
                redirectAdmin("admin");
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
            Thêm mới Admin
        </h1>
        <ol class="breadcrumb">
            <li class="active" style="margin-right: 5px;margin-left: 5px;">
                <a href="<?php echo modules("admin")?>">
                    <i class="mdi mdi-format-list-bulleted"></i>
                    <span>Admin</span>
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
                    <!-- Hoten -->

                    <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label"><strong>Họ và tên:</strong></label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control col-md-10" id="inputName" placeholder="Nguyen van A" name="name" value="<?php echo $data['name']?>">
                            <?php if(isset($error['name'])): ?>
                            <?php echo $error['name']; ?>
                            <?php endif ?>
                        </div>
                    </div>

                    <!-- Email -->

                    <div class="form-group row">
                        <label for="inputGia" class="col-sm-2 col-form-label"><strong>Email: </strong></label>
                        <div class="col-sm-8">
                            <input type="email" class="form-control col-md-10" id="inputGiaSp" placeholder="abc@gmail.com" name="email" value="<?php echo $data['email']?>">
                            <?php if(isset($error['email'])): ?>
                            <?php echo $error['email']; ?>
                            <?php endif ?>
                        </div>
                    </div>

                    <!-- adrress -->

                    <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label"><strong>Address:</strong></label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control col-md-10" id="inputadress" placeholder="so 77 ngo 68 trieu khuc thanh xuan HN" name="address"
                                value="<?php echo $data['address']?>">
                            <?php if(isset($error['address'])): ?>
                            <?php echo $error['address']; ?>
                            <?php endif ?>
                        </div>
                    </div>

                    <!-- SDT -->

                    <div class="form-group row">
                        <label for="inputGia" class="col-sm-2 col-form-label"><strong>SDT:</strong></label>
                        <div class="col-sm-8">
                            <input type="number" class="form-control col-md-10" id="SL" name="phone" placeholder="0912345678" value="<?php echo $data['phone']?>">
                            <?php if(isset($error['phone'])): ?>
                            <?php echo $error['phone']; ?>
                            <?php endif ?>
                        </div>
                    </div>

                    <!-- password -->

                    <div class="form-group row">
                        <label for="inputGia" class="col-sm-2 col-form-label"><strong>Password:</strong></label>
                        <div class="col-sm-8">
                            <input type="password" class="form-control col-md-10" id="SL" name="password" placeholder="*************">
                            <?php if(isset($error['password'])): ?>
                            <?php echo $error['password']; ?>
                            <?php endif ?>
                        </div>
                    </div>

                    <!-- config password -->

                    <div class="form-group row">
                        <label for="inputGia" class="col-sm-2 col-form-label"><strong>Config Password:</strong></label>
                        <div class="col-sm-8">
                            <input type="password" class="form-control col-md-10" id="SL" name="re_password" placeholder="*************" required=''>
                            <?php if(isset($error['re_password'])): ?>
                            <?php echo $error['re_password']; ?>
                            <?php endif ?>
                        </div>
                    </div>

                    <!-- Level -->

                    <div class="form-group row">
                        <label for="inputGia" class="col-sm-2 col-form-label"><strong>Level:</strong></label>
                        <div class="col-sm-8">
                            <select class="form-control col-md-10" name="level">
                                <option value="1" <?php echo isset($data[ 'level']) && $data[ 'level']==1 ? 'selected = "selected"' : ''?>>CTV</option>
                                <option value="2" <?php echo isset($data[ 'level']) && $data[ 'level']==2 ? 'selected = "selected"' : ''?>>Admin</option>
                            </select>
                            <?php if(isset($error['level'])): ?>
                            <?php echo $error['level']; ?>
                            <?php endif ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputHinhanh" class="col-sm-2 col-form-label"><strong>Avartar</strong></label>
                        <div class="col-sm-1">
                            <input type="file" class="" id="inputHinhanh" name="avartar">
                            <?php if(isset($error['avartar'])): ?>
                            <?php echo $error['avartar']; ?>
                            <?php endif ?>
                        </div>
                    </div>


                    <div class="form-group row">
                        <div class="col-sm-9">
                            <button type="submit" class="btn btn-primary" style="float:right">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    

</div>

<?php require_once __DIR__ . '/../../layouts/footer.php'; ?>