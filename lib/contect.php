<?php
    $servername = "127.0.0.1";
    $username = "root";
    $database = "php_wd203";
    // Tạo kết nối
    try{
        $conn = new PDO("mysql:host=$servername;dbname=$database", $username);
        $conn ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
       
    }catch(PDOException $e) {
        $e -> getMessage();
    }
?>