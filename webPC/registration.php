<?php   

    require_once __DIR__ . '/autoload/autoload.php';  
    
    $name = $email = $phone = $address = $password = "";
	if(isset($_SESSION['name_id'])){
		echo "<script>alert('bạn đã có tài khoản ui ! Nên không vào đây nữa');location.href='indext.php'</script>";
    }

    $data=[
        "name"          =>  PostInput('name'),
        "email"         =>  PostInput('email'),
        "phone"         =>  PostInput("phone"),
        "address"       =>  PostInput("address"),
        "password"      =>  MD5(PostInput("password")),
      
   ];

   $error = [];
   if($_SERVER["REQUEST_METHOD"]=="POST"){
    /**
     * name
     */

    if($data['name'] ==''){
        $error['name'] = 'Mời bạn nhập tên đầy đủ';
    }

    /**
     * email
     */

    if($data['email'] == ""){
        $error['email'] = 'Mời bạn nhập Email đầy đủ';
    }
    else{
        $is_checkEmail = $db->fetchOne("admin"," email = '".$data['email']."' ");
        if($is_checkEmail != NULL){
         $error['email'] = 'Email đã tồn tại mời bạn chọn một email khác';
        }
    }

    /**
     * password
     */


    if($data['password']  == ""){
        $error['password'] = 'Mời bạn nhập password đầy đủ';
    }
    if(PostInput('re_password')  == ""){
        $error['re_password'] = 'Mời bạn nhập password đầy đủ';
    }


    
    if($data['password'] !=  MD5(PostInput("re_password"))){
        $error['password'] = 'Password không khớp';
   }


    /**
     * phone
     */

    if($data['phone']  == ""){
        $error['phone'] = 'Mời bạn nhập phone đầy đủ';
    }

    /**
     * address
     */

    if($data['address']  == ""){
        $error['address'] = 'Mời bạn nhập address đầy đủ';
    }

    if(empty($error)){ 
        $id_insert = $db->insert('users',$data);
        if($id_insert > 0){
            // echo "<script>alert('đăng ký thành công'); location.href = 'login.php'</script>";
            $_SESSION['success'] = "Đăng ký thành công! Mời bạn đăng nhập";
            header("location: login.php");
        }
        else{
            $_SESSION['error'] = 'error';
        }
    }
} 

?>
<?php   require_once __DIR__ . '/layout/header.php'; ?>

<!-- #header -->
<div class="inner-header" style="margin-bottom:40px">
    <div class="container">
        <div class="pull-left">
            <h5 class="inner-title">Đăng kí</h5>
        </div>
        <div class="pull-right">
            <div class="beta-breadcrumb">
                <a href="index.php">Home</a> /
                <span>Đăng kí</span>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>

<div class="container">
    <div class="card">
        <div class="card-body ">
            <form class="" action="" method="POST" enctype="multipart/form-data">
                <!-- Hoten -->
                <div class="form-group row">
                    <label for="inputName" class="col-sm-2 col-form-label">
                        <strong>Họ và tên:</strong>
                    </label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control col-md-10" id="inputName" placeholder="Nguyen van A" name="name" value="<?php echo $data['name']?>">
                        <?php if(isset($error['name'])): ?>
                        <?php echo $error['name']; ?>
                        <?php endif ?>
                    </div>
                </div>


                <!-- Email -->

                <div class="form-group row">
                    <label for="inputGia" class="col-sm-2 col-form-label">
                        <strong>Email: </strong>
                    </label>
                    <div class="col-sm-6">
                        <input type="email" class="form-control col-md-10" id="inputGiaSp" placeholder="abc@gmail.com" name="email" value="<?php echo $data['email']?>">
                        <?php if(isset($error['email'])): ?>
                        <?php echo $error['email']; ?>
                        <?php endif ?>
                    </div>
                </div>

                <!-- adrress -->

                <div class="form-group row">
                    <label for="inputName" class="col-sm-2 col-form-label">
                        <strong>Address:</strong>
                    </label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control col-md-10" id="inputadress" placeholder="so 77 ngo 66 trieu khuc thanh xuan HN" name="address"
                            value="<?php echo $data['address']?>">
                        <?php if(isset($error['address'])): ?>
                        <?php echo $error['address']; ?>
                        <?php endif ?>
                    </div>
                </div>

                <!-- SDT -->

                <div class="form-group row">
                    <label for="inputGia" class="col-sm-2 col-form-label">
                        <strong>SDT:</strong>
                    </label>
                    <div class="col-sm-6">
                        <input type="number" class="form-control col-md-10" id="SL" name="phone" placeholder="0912345676" value="<?php echo $data['phone']?>">
                        <?php if(isset($error['phone'])): ?>
                        <?php echo $error['phone']; ?>
                        <?php endif ?>
                    </div>
                </div>

                <!-- password -->

                <div class="form-group row">
                    <label for="inputGia" class="col-sm-2 col-form-label">
                        <strong>Password:</strong>
                    </label>
                    <div class="col-sm-6">
                        <input type="password" class="form-control col-md-10" id="SL" name="password" placeholder="*************">
                        <?php if(isset($error['password'])): ?>
                        <?php echo $error['password']; ?>
                        <?php endif ?>
                    </div>
                </div>

                <!-- config password -->

                <div class="form-group row">
                    <label for="inputGia" class="col-sm-2 col-form-label">
                        <strong>Config Password:</strong>
                    </label>
                    <div class="col-sm-6">
                        <input type="password" class="form-control col-md-10" id="SL" name="re_password" placeholder="*************" required=''>
                        <?php if(isset($error['re_password'])): ?>
                        <?php echo $error['re_password']; ?>
                        <?php endif ?>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-8">
                        <button type="submit" class="btn btn-primary" style="float:right">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

</div>

<?php   require_once __DIR__ . '/layout/footer.php'; ?>