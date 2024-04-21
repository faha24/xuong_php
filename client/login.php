<?php 
require"../lib/contect.php";
session_start();
if (isset($_SESSION['user'])){
    header('Location:../index.php');
}
     if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Lấy dữ liệu từ form

        $user = $_POST['username'];
   
        $pass = $_POST['password'];
        
        if(!empty($user) && !empty($pass)){
            $sql = "SELECT * FROM `user` WHERE `user_name` = '$user' and `password` = '$pass'";
            $data = $conn ->query($sql);
            $item = $data ->fetch();
          if (!empty($item)){
        echo"vl";
            if(isset($item) && $item['role'] == 'admin' ) {
                $_SESSION['user'] = $user;
                $_SESSION['role'] = 'admin';
                header("Location:../admin/list.php");
            }else {

                $_SESSION['user'] = $user;
                header("Location:../index.php");
            }
          }else{
            header("Location:login.php");
          }
            
        }else {
            header("Location:login.php");
        }
      

        }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .form-signin {
            width: 100%;
            max-width: 330px;
            padding: 15px;
            margin: auto;
        }
        .form-signin .form-floating:focus-within {
            z-index: 2;
        }
        .form-signin input[type="email"] {
            margin-bottom: -1px;
            border-bottom-right-radius: 0;
            border-bottom-left-radius: 0;
        }
        .form-signin input[type="password"] {
            margin-bottom: 10px;
            border-top-left-radius: 0;
            border-top-right-radius: 0;
        }
    </style>
</head>
<body>
<div class="container">

    <main class="form-signin "> 
        <form action="" method="POST">
            <h1 class="h3 mb-3 fw-normal text-center">Login</h1>

            <div class="form-floating">
                <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com" name="username">
                <label for="floatingInput">Username</label>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password">
                <label for="floatingPassword">Password</label>
            </div>
            <div  class="form-text" style="color: red">Thông tin đăng nhập không chính xác</div>
            <button class="w-100 btn btn-lg btn-primary" type="submit" name="btnSubmit">Sign in</button>
        </form>
    </main>
</div>
</body>
</html>
