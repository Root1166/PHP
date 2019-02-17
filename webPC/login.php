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
            echo "<script>alert('đăng nhập thành công'); location.href = 'index.php'</script>";
        }
        else{
            $_SESSION['error'] = "Đăng nhập thất bại";
        }
   }
}  
?>
<?php   require_once __DIR__ . '/layout/header.php'; ?>



<!-- #header -->
<div class="inner-header" style="margin-bottom:40px">
    <div class="container">
        <div class="pull-left">
            <h5 class="inner-title">Đăng nhập</h5>
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

                <!-- <div id="remember" class="checkbox">
                    <label>
                        <input type="checkbox" value="remember-me"> Remember me
                    </label>
                </div> -->

                <div class="form-group">
                    <div class="">
                        <button type="submit" class="btn btn-danger">Sign in</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- .container -->
<?php   require_once __DIR__ . '/layout/footer.php'; ?>