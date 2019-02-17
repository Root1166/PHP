<?php 
    $open = "category";
    require_once __DIR__ . '/../../autoload/autoload.php';

    $id = intval(getInput('id'));

    $EditCategory = $db ->fetchID('category',$id);
    if(empty($EditCategory)){
        $_SESSION['error'] = "Du lieu khong ton tai";
        redirectAdmin('category');
    }

    $home = $EditCategory['home'] == 0 ? 1 : 0;

    $UpdateHome = $db -> update('category', array('home' => $home), array('id' => $id));
    if($UpdateHome >0){
        $_SESSION['success'] = "Cập nhật thành công";
        redirectAdmin('category');
    }
    else{
        $_SESSION['error'] = "Cập nhật thất bại";
        redirectAdmin('category');
    }


?>