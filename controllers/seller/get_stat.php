<?php

    include "../../models/product.php";
$user_id=$_GET['user_id'];
    $x=new Product();
    echo $x->statistic($user_id);

?>