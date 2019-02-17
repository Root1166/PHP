<?php 

    $open = "category";

    require_once __DIR__ .'/../../autoload/autoload.php';

    $id = intval(getInput('id'));

    $EditCategory = $db->fetchID('category',$id);

    if(empty($EditCategory) ){
        $_SESSION['error'] =  "Dữ liệu không tồn tại";
        redirectAdmin('category/indext.php');
    }


    $home = $EditCategory['home'] == 0 ? 1 : 0;

    $updateHome = $db->update("category" , array("home" => $home),array("id" =>$id));
    if($updateHome > 0){
        $_SESSION['success'] = "Cập nhật thành công";
        redirectAdmin("category/indext.php");
    }
    else{
        $_SESSION['error'] = "Dũ liệu không thay đổi";
        redirectAdmin("category/indext.php");
    }

?>