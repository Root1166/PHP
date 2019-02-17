<?php 
    $open = "admin";
    require_once __DIR__ . '/../../autoload/autoload.php'; 
    $id = intval(getInput('id'));

    $EditAdmin =  $db->fetchId('admin',$id);

   

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
        }

        if($data['phone'] == ''){
            $error['phone'] = "Mời bạn nhập sdt";
        }
        else{
            if(PostInput('phone') != $EditAdmin['phone']){
                 $is_checkPhone = $db->fetchOne("admin"," phone = '".$data['phone']."' ");
                 if($is_checkPhone != NULL){
                     $error['phone'] = 'Email đã tồn tại';
                 }
            }
        }
      

        if($data["address"] == ''){
            $error['address'] = "Mời bạn nhâp địa chỉ của bạn";
        }
        else{
            if(PostInput('email') != $EditAdmin['email']){
                 $is_checkEmail = $db->fetchOne("admin"," email = '".$data['email']."' ");
                 if($is_checkEmail != NULL){
                     $error['email'] = 'Email đã tồn tại';
                 }
            }
        }

        if($data["level"] == ''){
            $error['level'] = "Mời bạn chọn level của bạn";
        }
        if(!isset($_FILES['avartar'])){
            $error['avartar'] = "Mời bạn chọn hình ảnh";
        }

        if(PostInput('password') != NULL && PostInput('re_password') != NULL){
            if(PostInput('password') != PostInput('re_password')){
                $error['password']  = "Mật khẩu không khớp";
            }
            else{
             $data['password'] =  md5(PostInput("password"));
            }
        }

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
        }

        $$is_update = $db->update('admin',$data,array("id"=>$id));
            if($$is_update > 0){
                move_uploaded_file($file_tmp,$part.$file_name);
                $_SESSION['success'] = "Thêm mới thành công";
                redirectAdmin("admin");
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
            Cập nhật Admin
        </h1>
        <ol class="breadcrumb">
            <li class="active" style="margin-right: 5px;margin-left: 5px;">
                <a href="<?php echo modules("admin")?>">
                    <i class="mdi mdi-format-list-bulleted"></i>
                    <span>Admin</span>
                </a>
            </li>/
            <li class="active" style="margin-left: 5px;">
                <i class="mdi mdi-file"></i> Update
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
            <!-- Hoten -->

            <div class="form-group row">
                <label for="inputName" class="col-sm-2 col-form-label">Họ và tên:</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control col-md-10" id="inputName" placeholder="Nguyen van A" name="name" value="<?php echo $EditAdmin['name']?>">
                    <?php if(isset($error['name'])): ?>
                    <?php echo $error['name']; ?>
                    <?php endif ?>
                </div>
            </div>

            <!-- Email -->

            <div class="form-group row">
                <label for="inputGia" class="col-sm-2 col-form-label">Email: </label>
                <div class="col-sm-8">
                    <input type="email" class="form-control col-md-10" id="inputGiaSp" placeholder="abc@gmail.com" name="email" value="<?php echo $EditAdmin['email']?>">
                    <?php if(isset($error['email'])): ?>
                    <?php echo $error['email']; ?>
                    <?php endif ?>
                </div>
            </div>

            <!-- adrress -->

            <div class="form-group row">
                <label for="inputName" class="col-sm-2 col-form-label">Address:</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control col-md-10" id="inputadress" placeholder="so 77 ngo 68 trieu khuc thanh xuan HN" name="address"
                        value="<?php echo $EditAdmin['address']?>">
                    <?php if(isset($error['address'])): ?>
                    <?php echo $error['address']; ?>
                    <?php endif ?>
                </div>
            </div>

            <!-- SDT -->

            <div class="form-group row">
                <label for="inputGia" class="col-sm-2 col-form-label">SDT:</label>
                <div class="col-sm-8">
                    <input type="number" class="form-control col-md-10" id="SL" name="phone" placeholder="0912345678" value="<?php echo $EditAdmin['phone']?>">
                    <?php if(isset($error['phone'])): ?>
                    <?php echo $error['phone']; ?>
                    <?php endif ?>
                </div>
            </div>

            <!-- password -->

            <div class="form-group row">
                <label for="inputGia" class="col-sm-2 col-form-label">Password:</label>
                <div class="col-sm-8">
                    <input type="password" class="form-control col-md-10" id="SL" name="password" placeholder="*************">
                    <?php if(isset($error['password'])): ?>
                    <?php echo $error['password']; ?>
                    <?php endif ?>
                </div>
            </div>

            <!-- config password -->

            <div class="form-group row">
                <label for="inputGia" class="col-sm-2 col-form-label">Config Password:</label>
                <div class="col-sm-8">
                    <input type="password" class="form-control col-md-10" id="SL" name="re_password" placeholder="*************" required=''>
                    <?php if(isset($error['re_password'])): ?>
                    <?php echo $error['re_password']; ?>
                    <?php endif ?>
                </div>
            </div>

            <!-- Level -->

            <div class="form-group row">
                <label for="inputGia" class="col-sm-2 col-form-label">Level:</label>
                <div class="col-sm-8">
                    <select class="form-control col-md-10" name="level">
                        <option value="1" <?php echo isset($EditAdmin[ 'level']) && $EditAdmin[ 'level']==1 ? 'selected = "selected"' : ''?>>CTV</option>
                        <option value="2" <?php echo isset($EditAdmin[ 'level']) && $EditAdmin[ 'level']==2 ? 'selected = "selected"' : ''?>>Admin</option>
                    </select>
                    <?php if(isset($error['level'])): ?>
                    <?php echo $error['level']; ?>
                    <?php endif ?>
                </div>
            </div>

            <div class="form-group row">
                <label for="inputHinhanh" class="col-sm-2 col-form-label">Avartar</label>
                <div class="col-sm-1">
                    <input type="file" class="" id="inputHinhanh" name="avartar">
                    <?php if(isset($error['avartar'])): ?>
                    <?php echo $error['avartar']; ?>
                    <?php endif ?>
                    <img src="<?php echo upload()?>avartarAdmin/<?php echo $EditAdmin['avartar']?>" style="width:100px;height:80px">
                </div>
            </div>


            <div class="form-group  row">
                <div class="col-sm-7">
                    <button type="submit" class="btn btn-primary" style="float:right">Save</button>
                </div>
                <div class="col-sm-2">
                    <button type="button" class="btn btn-primary" style="float:right" >Cancel</button>
                </div>
            </div>
          
        </form>
    </div>

</div>

<?php require_once __DIR__ . '/../../layouts/footer.php'; ?>