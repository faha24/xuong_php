<?php 
require"../lib/contect.php";
$sql = "SELECT * FROM `categories`";
$data = $conn -> Query($sql);
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
    if( move_uploaded_file($_FILES['image']['tmp_name'], $upload)){
        echo "ok";
    }else{
        echo "chưa đc bạn ới cố thêm tí đi";
    }
    // Kiểm tra xem tất cả các trường đã được điền đầy đủ chưa
 if (empty($name_product) || empty($price_product) || empty($quantity_product) || empty($description_product) || empty($category_product) || empty($image_product)) {
   header('location:add.php');
    // Có thể thêm mã HTML hoặc JavaScript để chuyển hướng người dùng về trang trước đó hoặc trang khác ở đây
} else {
    // Kiểm tra xem tệp ảnh đã được tải lên chưa
    if (!isset($_FILES['image']) || $_FILES['image']['error'] !== UPLOAD_ERR_OK) {
        header('location:add.php');
    } else {
        $sql ="INSERT INTO `products`( `name_pro`, `price_pro`, `qt_pro`, `dcrp_pro`, `img_pro`, `id_cate`) 
        VALUES ('$name_product','$price_product','$quantity_product','$description_product','$image_product','$category_product')";
        if ($conn->exec($sql)) {
            header("Location:list.php");
        } else {
            echo "Lỗi: " . $sql . "<br>" ;
        }
    
    }
}

    // Hiển thị thông tin đã nhập
  

 
 
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <h1 class="text-center m-5">ADD PRODUCT</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="name" class="form-label">Name product</label>
            <input type="text" class="form-control" id="name" name="name" aria-describedby="name">
            <div id="name" class="form-text" style="color: red">Tên không được để trống</div>
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Price product</label>
            <input type="number" class="form-control" id="price" name="price">
            <div id="price" class="form-text" style="color: red">Giá không được để trống</div>
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Quantity</label>
            <input type="number" class="form-control" id="price" name="quantity">
            <div id="price" class="form-text" style="color: red">Giá không được để trống</div>
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Description</label>
            <input type="text" class="form-control" id="price" name="description">
            <div id="price" class="form-text" style="color: red">Giá không được để trống</div>
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">category</label>
            <select  class="form-select" name="category" id="">
                <?php foreach($item as $category) { ?>
                <option value="<?= $category['id_cate'] ?>"><?= $category['name_cate'] ?></option>
                <?php } ?>
            </select>
           
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Image product</label>
            <input type="file" class="form-control" id="image" name="image">
            <div id="image" class="form-text" style="color: red">Ảnh không được để trống</div>
        </div>
        <button type="submit" class="btn btn-primary" name="btnSubmit">Submit</button>
        <a class="mx-2 px-3 py-2 bg-danger rounded-3 text-decoration-none text-white" href="list.php">home</a>

    </form>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>