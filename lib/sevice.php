<?php 

    function getDataFromDatabase($a) {
        // Kết nối với cơ sở dữ liệu
        require"contect.php";
            $category = $a;
            $query = "SELECT * FROM `products` INNER JOIN `categories` on `products`.id_cate = `categories`.id_cate WHERE `products`.id_cate = $category";
            
            // Thực thi truy vấn
            $statement = $conn->query($query);
            // Lấy kết quả dưới dạng mảng kết hợp
            $result = $statement->fetchAll();
            return $result;
         
    }
?>