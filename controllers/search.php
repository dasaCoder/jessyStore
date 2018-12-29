<?php

include "../models/product.php";

    $x=new Product();

    if(isset($_GET['word'])){
        $result=$x->search_product($_GET['word']);
        echo json_encode($result);

    }
    else if(isset($_POST['search'])){
        $result=$x->search_product($_POST['search']);
        echo json_encode($result);
    }
    else echo "No matches found";



?>