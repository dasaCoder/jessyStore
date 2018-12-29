<?php
include ("../models/product.php");
//echo $_GET['product_id'];
    $thisproduct=new Product();
    $item=$thisproduct->get_oneitem($_GET['product_id']);

    echo json_encode($item);


/*print_r($item);

echo "<div id='view_item'><h1>";
echo $item['product_title'];
echo "</h1><h3>";
echo $item['description'];
echo "</h3><h3>rs ";
echo $item['price']."</h3>";
echo '<button class="add_to_cart_btn">Buy</button>';

echo "</div>";
*/



?>