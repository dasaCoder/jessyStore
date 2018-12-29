<?php

    $product_id=$_GET['product_id'];

    include "../../models/product.php";

    $p=new Product();
    echo $p->show_review($product_id);

?>