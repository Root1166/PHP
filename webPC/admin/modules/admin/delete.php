<?php 
    $open = "admin";
    require_once __DIR__ . '/../../autoload/autoload.php'; 
  
    $id = intval(getInput('id'));

    $Editadmin = $db->fetchID('admin',$id);

    if(empty($Editadmin)){
        $_SESSION['success'] = "Dữ liệu không tồn tại";
        redirectAdmin("admin");
    }


    $num  = $db -> delete('admin',$id);
    if($num >0){
        $_SESSION['success'] = "xóa thành công";
        redirectAdmin("admin");
    }
    else{
        $_SESSION['orror'] = "Dữ liệu không tồn tại";
        redirectAdmin("admin");
    }
?>
