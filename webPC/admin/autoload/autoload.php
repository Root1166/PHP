<?php
        session_start();
        require_once __DIR__ . '/../../libraries/Database.php'; 
        require_once __DIR__ . '/../../libraries/Function.php'; 
        $db = new Database ;
 
        if(!$_SESSION['admin_id']){
                header("location: /webPC/login/");
        }
        /**
         * 
         * Lấy ảnh avartar của admin
         * 
         */
        $id =  $_SESSION['admin_id'];
        $sqlAvartar = "SELECT avartar FROM admin Where id = '$id'";
        $AvartarAdmin = $db -> fetchsql($sqlAvartar);
        foreach($AvartarAdmin as $item)
       
        define("ROOT",$_SERVER['DOCUMENT_ROOT']."/webPC/public/uploads/");
?>