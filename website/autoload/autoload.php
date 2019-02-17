<?php
        session_start();
        require_once __DIR__ . '/../libraries/Database.php'; 
        require_once __DIR__ . '/../libraries/Function.php'; 
        $db = new Database ;

        define("ROOT",$_SERVER['DOCUMENT_ROOT']."/website/public/uploads/");
        $category = $db->fetchAll('category');


        /**
         * lấy ds sản phẩm mới
         */

         $sqlNew = "SELECT * FROM product WHERE 1 ORDER BY ID DESC LIMIT 4";

         $productNew = $db->fetchsql($sqlNew);
        //  print_r($productNew);
?>