<?php
include ("../models/cart.php");

$c=new Cart();
$delete_status=$c->removeFromCart($_GET['cart_id']);
echo $delete_status;


?>