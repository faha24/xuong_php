<?php 

require"lib/contect.php";
    $id =$_GET['id'];
    $user = $_SESSION['user'];
    echo $id;
    $sql = "DELETE FROM `carts`  WHERE `cart_id` = {$id} and `user` = '$user'";
    $xoa = $conn -> prepare($sql);
    $xoa -> execute();
   
    if(isset($_SERVER['HTTP_REFERER']) && !empty($_SERVER['HTTP_REFERER'])){
        // Chuyển hướng người dùng quay lại trang trước đó
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    } else {
        // Nếu không có trang trước đó, chuyển hướng về trang chính
        header('Location: index.php'); // Điều hướng về trang chính hoặc trang mặc định khác
    }
     
?>
