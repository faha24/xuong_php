<?php
require"../lib/contect.php";
    $id =$_GET['id'];
    echo $id;
    $sql = "DELETE FROM `products` WHERE `id_pro`={$id}";
    $conn->exec($sql);
    header("Location:list.php");
?>