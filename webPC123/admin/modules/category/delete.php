<?php
    $open = "category";
    require_once __DIR__ . '/../../autoload/autoload.php'; 

    $id = intval(getInput('id'));

    $deleteCategory = $db->fetchID('category',$id);

    if(empty($deleteCategory)){
        $_SESSION['error'] == "Dữ liệu không tồn tại";
        redirectAdmin("category");
    }

    /**
     * kiểm tra danh mục có sản phẩm không nếu có thì không cho xóa ngược lại thì được xóa
     */
    $is_product = $db -> fetchOne('product' , " category_id = $id ");
    if($is_product == Null){
        $num = $db ->delete("category",$id);
        if($num >0){
            $_SESSION['success']="Xóa thành công";
            redirectAdmin('category');
        }
        else{
            $_SESSION['error']="Xóa không thành công";
            redirectAdmin('category');
        }
    }else{
        $_SESSION['error']="Danh mục có sản phẩm không thể xóa";
        redirectAdmin('category');
    }
?>