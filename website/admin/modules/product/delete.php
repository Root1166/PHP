<?php 
    $open = "product";
    require_once __DIR__ . '/../../autoload/autoload.php'; 
  
    $id = intval(getInput('id'));

    $Editproduct = $db->fetchID('product',$id);

    if(empty($Editproduct)){
        $_SESSION['success'] = "Dữ liệu không tồn tại";
        redirectAdmin("product/indext.php");
    }


    $num  = $db -> delete('product',$id);
    if($num >0){
        $_SESSION['success'] = "xóa thành công";
        redirectAdmin("product/indext.php");
    }
    else{
        $_SESSION['orror'] = "Dữ liệu không tồn tại";
        redirectAdmin("product/indext.php");
    }
?>
