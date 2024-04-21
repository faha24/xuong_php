<?php
session_start();
   $user = $_SESSION['user'];

    $id = $_GET['id'];
    require "../lib/contect.php";
    $sql = "SELECT * FROM `products` WHERE `id_pro` = {$id}";
    $data = $conn -> prepare($sql);
    $data -> execute();
    $list = $data ->fetch();
    
    
    $validate = "SELECT * FROM `carts` WHERE `id_pro` = {$id} and `user` = '$user'";  
    $validatedata = $conn -> prepare($validate);
    $validatedata -> execute();
    $test = $validatedata ->fetch();
   
   
    if(empty($test)){
      $id_pro = $list['id_pro'];
    $img_pro = $list['img_pro'];
    $name_pro = $list['name_pro'];
    $price_pro = $list['price_pro'];
    $qt_pro = $_POST['soluong'];
  
      $cartsql= "INSERT INTO `carts`( `id_pro`, `img_pro`, `name_pro`, `price_pro`, `qt_pro`, `user`)
      VALUES ('$id_pro','$img_pro','$name_pro','$price_pro','$qt_pro','$user')";

       $cartdata = $conn -> prepare($cartsql);
       $cartdata -> execute();
       
       if(isset($_SERVER['HTTP_REFERER']) && !empty($_SERVER['HTTP_REFERER'])){
        // Chuyển hướng người dùng quay lại trang trước đó
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    } else {
        // Nếu không có trang trước đó, chuyển hướng về trang chính
        header('Location: index.php'); // Điều hướng về trang chính hoặc trang mặc định khác
    }
     

    }else{
        $oldqt_pro =$list['qt_pro'];
         $cartid = $test['cart_id'];
         $qt_pro = $test['qt_pro'];
         $i = $qt_pro+$_POST['soluong'];
         $newqt_pro = $oldqt_pro - $_POST['soluong'];
         $cartsql= "UPDATE `carts` SET`qt_pro`='$i' WHERE `cart_id` = $cartid ";
         $cartdata = $conn-> prepare($cartsql);
         $cartdata -> execute();
         
         if(isset($_SERVER['HTTP_REFERER']) && !empty($_SERVER['HTTP_REFERER'])){
          // Chuyển hướng người dùng quay lại trang trước đó
          header('Location: ' . $_SERVER['HTTP_REFERER'] );
      } else {
          // Nếu không có trang trước đó, chuyển hướng về trang chính
          header('Location: index.php'); // Điều hướng về trang chính hoặc trang mặc định khác
      }
       
  
    }
    $_SESSION['mes'] = "thêm thành công";
  
    
    

    
?>
