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
        "password"      =>  PostInput("password"),

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

		/**
		 * phone
		 */

		if($data['phone']  == ""){
			$error['phone'] = 'Mời bạn nhập phone đầy đủ';
		}

		/**
		 * Address
		 */
		
	
		if($data['address']  == ""){
			$error['address'] = 'Mời bạn nhập address đầy đủ';
		}

		if(empty($error)){ 
			$id_insert = $db->insert('users',$data);
			if($id_insert > 0){
				// echo "<script>alert('đăng ký thành công');location.href='login.php'</script>";
				$_SESSION['success'] = "Đăng ký thành công! Mời bạn đăng nhập";
				header("location: login.php");
			}
			else{
				$_SESSION['error'] = 'error';
			}
		}
	} 
	
	

?>
<?php   require_once __DIR__ . '/layouts/header.php'; ?>
<div class="col-md-9 bor">
	<section class="box-main1">
		<h3 class="title-main" style="margin-bottom:20px">
			<a href=""> Đăng ký </a>
		</h3>

		<form class="form-horizontal " action="" method="POST" role="form">
		<div class="form-group">
				<label for="inputName" class="col-sm-2 control-label">Tên thành viên: </label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="inputName" placeholder="Cong thanh" name="name" >
					<?php if(isset($error['name'])): ?>
                    <?php echo $error['name']; ?>
                    <?php endif ?>
				</div>
			</div>
			<div class="form-group">
				<label for="inputEmail3" class="col-sm-2 control-label">Email: </label>
				<div class="col-sm-10">
					<input type="email" class="form-control" id="inputEmail3" placeholder="vancong1166@gmail.com" name="email" >
					<?php if(isset($error['email'])): ?>
                    <?php echo $error['email']; ?>
                    <?php endif ?>				
				</div>
			</div>
			<div class="form-group">
				<label for="inputPassword3" class="col-sm-2 control-label">Password: </label>
				<div class="col-sm-10">
					<input type="password" class="form-control" id="inputPassword3" placeholder="************" name="password" >
					<?php if(isset($error['password'])): ?>
                    <?php echo $error['password']; ?>
                    <?php endif ?>
				</div>
			</div>
			<div class="form-group">
				<label for="inputPassword3" class="col-sm-2 control-label">Phone: </label>
				<div class="col-sm-10">
					<input type="number" class="form-control" id="inputPassword3" placeholder="0912345678" name="phone" >
					<?php if(isset($error['phone'])): ?>
                    <?php echo $error['phone']; ?>
                    <?php endif ?>
				</div>
			</div>
			<div class="form-group">
				<label for="inputPassword3" class="col-sm-2 control-label">Address: </label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="inputPassword3" placeholder="so 77 ngo 68 trieu khcu thanh xuan ha noi" name="address">
					<?php if(isset($error['address'])): ?>
                    <?php echo $error['address']; ?>
                    <?php endif ?>
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-offset-2 col-sm-10">
					<button type="submit" class="btn btn-danger">Sign in</button>
				</div>
			</div>
		</form>

	</section>
</div>
<?php   require_once __DIR__ . '/layouts/footer.php'; ?>