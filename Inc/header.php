<?php

    
?>
<header>
        <div class="header_text">
            
            <a href="index.php"> <h2>PHP1</h2></a>
        </div>
        <div class="header_icon">
           
           <a href="index.php?page=cart"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a> 
           <?php if(isset($_SESSION['user'])) {?>
                    <a href="./client/logout.php">logout</a>
                    <a href=""><?= $_SESSION['user'] ?></a>
            <?php } else {?>

           <a href="./client/login.php"><i class="fa fa-user" aria-hidden="true"></i></a> 
<?php } ?>
        </div>
        
      
    </header>