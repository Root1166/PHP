<?php 
    $open = "users";
    require_once __DIR__ . '/../../autoload/autoload.php'; 
  
    $id = intval(getInput('id'));

    $Editusers = $db->fetchID('users',$id);

    if(empty($Editusers)){
        $_SESSION['success'] = "Dữ liệu không tồn tại";
        redirectusers("users/indext.php");
    }


    $num  = $db -> delete('users',$id);
    if($num >0){
        $_SESSION['success'] = "xóa thành công";
        redirectusers("users/indext.php");
    }
    else{
        $_SESSION['orror'] = "Dữ liệu không tồn tại";
        redirectusers("users/indext.php");
    }
?>
