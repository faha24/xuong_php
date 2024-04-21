<div class="product">

            <div class="product_text">
                <h3>LAPTOP</h3>
            </div>
            <div class="product_child">
                <?php 
               
                $data = getDataFromDatabase(1);
             

                foreach ($data as $item) { ?>
                    <div class="product_content">
                        <a href="index.php?page=Details&id=<?=$item['id_pro'] ?>"> 
                            <div class="product_img">
                                <img src="public/img/<?= $item['img_pro'] ?>" alt="">
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
            <div class="product_text">
                <h3>điêm thoại</h3>
            </div>
            <div class="product_child">
                
                <?php
                $data1 = getDataFromDatabase(2);
                 foreach ($data1 as $item) { ?>
                    <div class="product_content">
                        <a href="index.php?page=Details&id=<?=$item['id_pro'] ?>"> 
                            <div class="product_img">
                                <img src="public/img/<?= $item['img_pro'] ?>" alt="">
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
            <div class="product_text">
                <h3>rerach</h3>
            </div>
            <div class="product_child">
                
                <?php
                $data1 = getDataFromDatabase(3);
                 foreach ($data1 as $item) { ?>
                    <div class="product_content">
                        <a href="index.php?page=Details&id=<?=$item['id_pro'] ?>"> 
                            <div class="product_img">
                                <img src="public/img/<?= $item['img_pro'] ?>" alt="">
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