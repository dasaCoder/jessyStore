<?php

    $cart_id=$_GET['cart_id'];
include "../../models/cart.php";
    $x=new Cart();
    echo $x->mark_ship($cart_id);

?>