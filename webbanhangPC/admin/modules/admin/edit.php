<?php 
    $open = "admin";
    require_once __DIR__ . '/../../autoload/autoload.php'; 
    $id = intval(getInput('id'));

    $EditAdmin = $db->fetchID('admin',$id);
    

    if(empty($EditAdmin)){
        $_SESSION['success'] = "Dữ liệu không tồn tại";
        redirectAdmin("category/indext.php");
    }

    $data=[
        "name"          =>  PostInput('name'),
        "email"         =>  PostInput('email'),
        "phone"         =>  PostInput("phone"),
        "address"       =>  PostInput("address"),
        "password"      =>  MD5(PostInput("password")),
        "level"         =>  PostInput("level"),

   ];
    
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $data=[
            "name"          =>  PostInput('name'),
            "email"         =>  PostInput('email'),
            "phone"         =>  PostInput("phone"),
            "address"       =>  PostInput("address"),
            // "password"      =>  MD5(PostInput("password")),
            "level"         =>  PostInput("level"),
    
       ];

       $error = [];
       if(PostInput('name') == '')
       {
           $error['name'] = 'Mời bạn nhập họ và tên';
       }

       if(PostInput('email') == '')
       {
           $error['email'] = 'Mời bạn nhập email';
       }
       else{
           if(PostInput('email') != $EditAdmin['email']){
                $is_checkEmail = $db->fetchOne("admin"," email = '".$data['email']."' ");
                if($is_checkEmail != NULL){
                    $error['email'] = 'Email đã tồn tại';
                }
           }
       }

       if(PostInput('address') == '')
       {
           $error['address'] = 'Mời bạn nhập địa chỉ';
       }

       if(PostInput('phone') == '')
       {
           $error['phone'] = 'Mời bạn nhập số điện thoại';
       }
    //    if(PostInput('password') == '')
    //    {
    //        $error['password'] = 'Mời bạn nhập password';
    //    }

       if(PostInput('level') == '')
       {
           $error['level'] = 'Mời bạn chọn level';
       }

       if(PostInput('password') != NULL && PostInput('re_password') != NULL){
           if(PostInput('password') != PostInput('re_password')){
               $error['password']  = "Mật khẩu không khớp";
           }
           else{
            $data['password'] =  MD5(PostInput("password"));
           }
       }
      print_r($data);
    //    if($data['password'] !=  MD5(PostInput("re_password"))){
    //         $error['password'] = 'Password không khớp';
    //    }

       if(empty($error)){ 
           $id_update = $db->update('admin',$data,array("id"=>$id));
           if($id_update > 0){
             
               $_SESSION['success'] = "Cập nhật thành công";
               redirectAdmin("admin/indext.php");
           }
           else{
               $_SESSION['error'] = "Cập nhật thất bại";
               redirectAdmin("admin/indext.php");
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
                <a href="<?php echo modules(" admin/indext.php ")?>">
                    <i class="fa fa-list"></i>
                    <span>Admin</span>
                </a>
            </li>/
            <li class="active" style="margin-left: 5px;">
                <i class="fa fa-file"></i> Thêm mới
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
                <label for="inputEmail" class="col-sm-2 col-form-label">Email: </label>
                <div class="col-sm-8">
                    <input type="email" class="form-control col-md-10" id="inputGiaSp" placeholder="abc@gmail.com" name="email" value="<?php echo $EditAdmin['email']?>">
                    <?php if(isset($error['email'])): ?>
                    <?php echo $error['email']; ?>
                    <?php endif ?>
                </div>
            </div>

            <!-- adrress -->

            <div class="form-group row">
                <label for="inputAddress" class="col-sm-2 col-form-label">Address:</label>
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
                <label for="inputSDT" class="col-sm-2 col-form-label">SDT:</label>
                <div class="col-sm-8">
                    <input type="number" class="form-control col-md-10" id="SDT" name="phone" placeholder="0912345678" value="<?php echo $EditAdmin['phone']?>">
                    <?php if(isset($error['phone'])): ?>
                    <?php echo $error['phone']; ?>
                    <?php endif ?>
                </div>
            </div>

            <!-- password -->

            <div class="form-group row">
                <label for="inputPass" class="col-sm-2 col-form-label">Password:</label>
                <div class="col-sm-8">
                    <input type="password" class="form-control col-md-10" id="password" name="password" placeholder="*************">
                    <?php if(isset($error['password'])): ?>
                    <?php echo $error['password']; ?>
                    <?php endif ?>
                </div>
            </div>

            <!-- config password -->

            <div class="form-group row">
                <label for="inputRe_pass" class="col-sm-2 col-form-label">Config Password:</label>
                <div class="col-sm-8">
                    <input type="password" class="form-control col-md-10" id="re_password" name="re_password" placeholder="*************">
                    <?php if(isset($error['re_password'])): ?>
                    <?php echo $error['re_password']; ?>
                    <?php endif ?>
                  
                </div>
            </div>

            <!-- Level -->

            <div class="form-group row">
                <label for="inputLevel" class="col-sm-2 col-form-label">Level:</label>
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
                <div class="col-sm-9">
                    <button type="submit" class="btn btn-primary" style="float:right">Save</button>
                </div>
            </div>
        </form>
    </div>

</div>

<?php require_once __DIR__ . '/../../layouts/footer.php'; ?>