<?php
    include ("../models/product.php");
    $products=new Product();


    if(isset($_GET['category']))
         echo $products->get_one_category($_GET['category']);
    else if(isset($_GET['product_id']))
        echo $products->get_one_category_by_id($_GET['product_id']);

?>