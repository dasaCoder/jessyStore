<?php

include("../../models/product.php");
$products=new Product();


if(isset($_GET['seller_id']))
    echo $products->seller_product($_GET['seller_id']);
else /*if(isset($_GET['product_id']))
    echo $products->get_one_category_by_id($_GET['product_id']);*/
    echo "no seller like this";

?>