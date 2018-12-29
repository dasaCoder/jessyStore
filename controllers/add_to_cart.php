<?php

    include ("../models/cart.php");

//echo $_POST['user_id'];
    $product_id=$_POST["product_id"];
    $user_id=$_POST['user_id'];
    $quantity=$_POST['quantity'];
echo $user_id;
/*$product_id=$_GET["product_id"];
$user_id=$_GET['user_id'];
$quantity=$_GET['quantity'];*/

    $c=new Cart();
    $status=$c->addToCart($product_id,$user_id,$quantity);

   // echo $status;

?>
