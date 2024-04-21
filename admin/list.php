<?php
session_start();
if (!isset($_SESSION['user'])){
    header('Location:../client/login.php');
  
}
if($_SESSION['role'] != 'admin'){
    header('Location:../index.php');
}
 
require"../lib/contect.php";
    $sql = "SELECT * FROM `products`";
    $data = $conn -> Query($sql);
    $item = $data ->fetchAll(PDO::FETCH_ASSOC);
    $i = 0;
 ?> 
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link rel="stylesheet" href="../public/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<div class="container">

    <h1 class="text-center m-5">LIST PRODUCT</h1>
    <div class="row">
        <div class="col">
            <a href="add.php"><button class="btn btn-success mb-4" >Add product</button></a>
        </div>
        <div class="col text-end">
            <a href="../client/logout.php"><button class="btn btn-dark mb-4" >Logout</button></a>
        </div>
    </div>

    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">Stt</th>
            <th scope="col">Name</th>
            <th scope="col">Image</th>
            <th scope="col">Price</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        <?php  foreach ($item as $key ) { $i++ ?>
            <tr>
      
                <th scope="row"><?= $i ?></th>
                <td><?= $key['name_pro'] ?></td>
                <td><img src="../public/img/<?=$key['img_pro']?>" class="rounded-3" alt="" style="width: 100px;height: 70px"></td>
                <td><?= $key['price_pro'] ?></td>
                <td>
                    <a href="edit.php?id=<?=$key['id_pro']?>"><button class="btn btn-primary">Edit</button></a>
                    <a href="delete.php?id=<?=$key['id_pro']?>"><button class="btn btn-danger">Delete</button></a>
                </td>
              
            </tr>
            <?php } ?>
            
        </tbody>
    </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>