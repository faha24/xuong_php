<?php
$data = getDataFromDatabase($id);
$sql = "SELECT * FROM `categories` WHERE `id_cate` = '$id'";
$result_select = $conn->query($sql);
$row = $result_select->fetch();

?>




<div class="product">

    <div class="product_text">
        <h3><?= $row['name_cate'] ?></h3>
    </div>
    <div class="product_child"> 
        <?php




        foreach ($data as $item) { ?>
            <div class="product_content">
                <a href="index.php?page=Details&id=<?= $item['id_pro'] ?>">
                    <div class="product_img">
                        <img src="public\img\<?= $item['img_pro'] ?>" alt="">
                    </div>
                </a>
                <div class="product_name">
                    <p><?= $item['name_pro'] ?></p>
                </div>
                <div class="product_price">
                    <p><?= $item['price_pro'] ?></p>
                </div>
            </div>
        <?php } ?>
    </div>

</div>