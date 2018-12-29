<?php
session_start();

    $product_id=$_POST['product_id'];
    $review=$_POST['Message'];
    $user_id=$_SESSION['user_id'];



include "../../models/product.php";

    $p=new Product();
    echo $p->add_review($product_id,$user_id,$review);


?>