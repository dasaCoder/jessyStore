<?php
    include ("../models/cart.php");

    $c=new Cart();
    $cart_items=$c->showCart($_POST['user_id']);
    echo json_encode($cart_items);

?>



