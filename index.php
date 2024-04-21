<?php
session_start();
if (!isset($_SESSION['user'])){
    header('Location:client/login.php');
}
 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>asmgd1_ph47431</title>
    <link rel="stylesheet" href="public\style.css">
    <link rel="stylesheet" href="public\chitiet.css">
    <link rel="stylesheet" href="public\cart.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        .custom-alert {
            display: none;
            background-color: yellow;
            padding: 10px;
            margin-bottom: 10px;
        }
    </style>
   
</head>

<body>

    <?php
    require"lib\contect.php";
   require"lib\sevice.php";
    ?>
    <?php require "Inc\header.php"; ?>
    <main>
        
    <?php require "Inc\sidebar.php"; ?>
            <?php 
   $page = !empty($_GET['page']) ? $_GET['page'] : 'home';
   $path = "client/{$page}.php";
   $id = !empty($_GET['id']) ? $_GET['id'] : '';
   

      
        if(file_exists($path)){
            require $path;
        }else{
            echo "$path";
        }
        ?>
    
      
    </main>
</body>
<?php require "Inc/footer.php"; ?>
<?php if(isset($_SESSION['mes'])){
     $mes = $_SESSION['mes'];
     ?>
    <script> 
     function showCustomAlert() {
            var customAlertDiv = document.getElementById("customAlert");
            customAlertDiv.textContent = "<?= $mes?>";
            customAlertDiv.style.display = "block";
        }
        function hideCustomAlert() {
            var customAlertDiv = document.getElementById("customAlert");
            customAlertDiv.style.display = "none";
        }
      
        showCustomAlert();
        setTimeout(hideCustomAlert,3000);
        

    </script>

    
<?php unset($_SESSION['mes']);  } ?>


</html>