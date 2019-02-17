<?php   
    require_once __DIR__ . '/autoload/autoload.php'; 
    
    $data=[
        "email"         =>  PostInput('email'),
        "password"      =>  PostInput("password"),

   ];
    
    if($_SERVER["REQUEST_METHOD"]=="POST"){
       
        /**
         * email
         */

       $error = [];
       if(PostInput('email') == '')
       {
           $error['email'] = 'Mời bạn nhập email';
       }

       /**
        * password
        */

       if(PostInput('password') == '')
       {
           $error['password'] = 'Mời bạn nhập password';
       }


       if(empty($error)){
            $is_check = $db->fetchOne("users"," email = '".$data['email']."' AND password = '".$data['password']."'");
            if($is_check != NULL){
                $_SESSION['name_user'] = $is_check['name'];
                $_SESSION['name_id']   = $is_check['id'];
                echo "<script>alert('đăng nhập thành công');location.href = 'indext.php'</script>";
            }
            else{
                $_SESSION['error'] = "Đăng nhập thất bại";
            }
       }
    }

?>
<?php   require_once __DIR__ . '/layouts/header.php'; ?>
<div class="col-md-9 bor">
    <section class="box-main1">
        <h3 class="title-main" style="margin-bottom:20px">
            <a href="">Login</a>
        </h3>

        <?php require_once __DIR__ . '/partials/notification.php'; ?>
        <form class="" action="" method="POST" enctype="multipart/form-data">

            <div class="form-group row">
                <label for="inputName" class="col-sm-2 col-form-label">Email:</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control col-md-10" id="inputEmail" placeholder="vancong1166@gmail.com" name="email">
                    <?php if(isset($error['email'])): ?>
                    <?php echo $error['email']; ?>
                    <?php endif ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputGia" class="col-sm-2 col-form-label">Password: </label>
                <div class="col-sm-8">
                    <input type="password" class="form-control col-md-10" id="inputGiaSp" placeholder="************" name="password">
                    <?php if(isset($error['password'])): ?>
                    <?php echo $error['password']; ?>
                    <?php endif ?>
                </div>
            </div>
            <!-- Material unchecked -->
            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="materialUnchecked">
                <label class="form-check-label" for="materialUnchecked">Material unchecked</label>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-danger">Log in</button>
                </div>
            </div>
        </form>
    </section>
</div>
<?php   require_once __DIR__ . '/layouts/footer.php'; ?>