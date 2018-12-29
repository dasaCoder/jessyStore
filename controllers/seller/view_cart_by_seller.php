<?php
    include ("../../models/cart.php");

    $result=new Cart();
    echo json_encode($result->showCart_by_seller($_GET['seller_id']));

?>