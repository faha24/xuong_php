<?php

$id = $_GET['id'];
require "lib/contect.php";
$select = "SELECT * FROM `products` WHERE `id_pro` = {$id}";
$result_select = $conn->query($select);
$row = $result_select->fetch();
?>


<div class="product">
<div id="customAlert" class="custom-alert"></div>
    <div class="product_child">
        <div class="product_content_ct">
            <div class="product_img_child">
                <img src="public/img/<?= $row['img_pro'] ?>" alt="" style="  width:100%; height: 330px;">
            </div>
            <div class="product_review">

                <form action="client/add_to_cart.php?&id=<?=$id?>" method="POST">
                    <div class="product_name">
                        <p class="prd-name" name="prd_name"><?= $row['name_pro'] ?></p>
                    </div>
                    <div class="product_price">
                        <p><?= $row['price_pro'] ?></p>
                    </div>
                    <div class="prd_review_text">
                        <p>Mã sản phẩm: <span> VIETSOZ#123</span></p>
                        <p>Mô tả sản phẩm:</p>
                        <p> <?= $row['dcrp_pro'] ?>
                        </p>

                        <label for="number">Số lượng:</label>
                        <input type="number" name="soluong" class="number" value="1" min = "0"  max="<?= $row['qt_pro']  ?>"  >
                    <button type="submit">add to cart</button>
                       <!-- <button><a href="index.php?page=add_to_cart&id=<?=$id?>">add to cart</a></button> -->

                    </div>
                </form>

            </div>


        </div>

    </div>
</div>
