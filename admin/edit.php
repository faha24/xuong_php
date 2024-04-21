<?php
require"../lib/contect.php";
$id = $_GET['id'] ;
$select = "SELECT * FROM `products` WHERE `id_pro` = {$id}" ;
$result_select = $conn->query($select);
$row = $result_select->fetch();

$sql_cate = "SELECT * FROM `categories`";
$data = $conn -> Query($sql_cate);
$item = $data ->fetchAll(PDO::FETCH_ASSOC);





if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy dữ liệu từ form
    $name_product = $_POST['name'];
    $price_product = $_POST['price'];
    $quantity_product = $_POST['quantity'];
    $description_product = $_POST['description'];
    $category_product = $_POST['category'];
    $image_product = basename($_FILES['image']['name']);
    $dir = "../public/img/";
    $upload = $dir.$image_product;
    move_uploaded_file($_FILES['image']['tmp_name'], $upload);
     
    // Hiển thị thông tin đã nhập
    if(empty($image_product)){
        $sql ="UPDATE `products` SET
        `name_pro`='$name_product',`price_pro`='$price_product',`qt_pro`='$quantity_product',`dcrp_pro`='$description_product',`id_cate`='$category_product' WHERE `id_pro` = '$id'";
       if ($conn->exec($sql)) {
           header("Location:list.php");
       } else {
           echo "Lỗi: " . $sql . "<br>" ;
       }
    }else{
        $sql ="UPDATE `products` SET
     `name_pro`='$name_product',`price_pro`='$price_product',`qt_pro`='$quantity_product',`dcrp_pro`='$description_product',`img_pro`='$image_product',`id_cate`='$category_product' WHERE `id_pro` = '$id'";
    if ($conn->exec($sql)) {
        header("Location:list.php");
    } else {
        echo "Lỗi: " . $sql . "<br>" ;
    }


    }
    // $sql ="UPDATE `products` SET
    //  `name_pro`='$name_product',`price_pro`='$price_product',`qt_pro`='$quantity_product',`dcrp_pro`='$description_product',`img_pro`='$image_product',`id_cate`='$category_product' WHERE `id_pro` = '$id'";
    // if ($conn->exec($sql)) {
    //     header("Location:list.php");
    // } else {
    //     echo "Lỗi: " . $sql . "<br>" ;
    // }


 
 
}

  
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
<?php require "../Inc/header.php"; ?>
    <h1 class="text-center m-5">EDIT PRODUCT</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="mb-3 text-center">
            <img class="rounded-3" src="../public/img/<?=$row['img_pro']?>" alt="" style="width:500px;height: 200px">
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">Name product</label>
            <input type="text" class="form-control" id="name" name="name" aria-describedby="name" value="<?=$row['name_pro']?>">
            <div id="name" class="form-text" style="color: red">Tên không được để trống</div>
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Price product</label>
            <input type="number" class="form-control" id="price" name="price" value="<?=$row['price_pro']?>">
            <div id="price" class="form-text" style="color: red">Giá không được để trống</div>
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Quantity</label>
            <input type="number" class="form-control" id="price" name="quantity" value="<?=$row['qt_pro']?>">
            <div id="price" class="form-text" style="color: red">Giá không được để trống</div>
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Description</label>
            <input type="text" class="form-control" id="price" name="description" value="<?=$row['dcrp_pro']?>">
            <div id="price" class="form-text" style="color: red">Giá không được để trống</div>
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">category</label>
            <select  class="form-select" name="category" id="" value=>
                <?php foreach($item as $category) { ?>
                <option  value="<?= $category['id_cate']  ?>" <?= $category['id_cate'] === $row['id_cate'] ? 'selected': '' ?> ><?= $category['name_cate'] ?></option>
                <?php } ?>
          
            </select>
           
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Image product</label>
            <input type="file" class="form-control" id="image" name="image" >
            <div id="image" class="form-text" style="color: red">Ảnh không được để trống</div>
        </div>
        <button type="submit" class="btn btn-primary" name="btnSubmit">Submit</button>
        <a class="mx-2 px-3 py-2 bg-danger rounded-3 text-decoration-none text-white" href="list.php">home</a>
    </form>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>