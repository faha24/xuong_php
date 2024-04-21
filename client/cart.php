    <?php
    require "lib/contect.php";
    $user = $_SESSION['user'];
    $sql = "SELECT * FROM `carts` WHERE `user` = '$user'";
    $data = $conn->prepare($sql);
    $data->execute();
    $list = $data->fetchAll();
    $tong = 0;

    ?>
    <div class="main">

        <div class="cart">
            <h1>GIỎ HÀNG</h1>
        </div>
        <table>
            <tr>
                <th>Mã sản phẩm</th>
                <th>Ảnh sản phẩm</th>
                <th>Tên sản phẩm</th>
                <th>Giá sản phẩm</th>
                <th>Số lượng</th>
                <th>Thành tiền</th>
            </tr>
            <?php foreach ($list as $key) { ?>
                <tr>
                    <td><?= $key['id_pro'] ?></td>
                    <td class="img"> <img src="public/img/<?= $key['img_pro'] ?>" alt="" style="width: 100px;"></td>
                    <td class="name"><?= $key['name_pro'] ?></td>
                    <td><?= $key['price_pro'] ?></td>
                    <td><?= $key['qt_pro'] ?> </td>
                    <td><?php
                        $gia = $key['price_pro'] * $key['qt_pro'];
                        echo $gia;
                        $tong += $gia;
                        ?></td>
                    <td><a href="index.php?page=delete_cart&id=<?=$key['cart_id'] ?>"><i class="fa fa-trash-o" aria-hidden="true"></i></a></td>
                </tr>

            <?php } ?>



        </table>
        <div class="sum">
            <div class="text-sum">
                <p><span>Tổng giá:</span> <span class="price">
                    <?= $tong ?>
                </span></p>
            </div>
            <div class="btn-cart">
                <input type="submit" value="cập nhập giỏ hàng" name="update">
                <input type="submit" value="Thanh toán" name="buy">
            </div>
            <div class="cart-link">
                <p><a href="">Mua hàng</a></p>
                <p><a href="index.php?page=delete_cart&id=<?=$item['id_pro'] ?>">Xóa hàng</a></p>
            </div>
        </div>



    </div>