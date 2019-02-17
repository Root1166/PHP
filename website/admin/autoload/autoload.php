<?php
        session_start();
        require_once __DIR__ . '/../../libraries/Database.php'; 
        require_once __DIR__ . '/../../libraries/Function.php'; 
        $db = new Database ;
        
        if(!$_SESSION['admin_id']){
                header("location: /website/login/indext.php");
        }
    
        define("ROOT",$_SERVER['DOCUMENT_ROOT']."/website/public/uploads/");
?>