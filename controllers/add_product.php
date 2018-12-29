<?php
session_start();
//header('Content-type: image/jpeg');
//echo $_POST["product_title"];
    include "../models/product.php";
    $user_id=$_SESSION['user_id'];
    $title=$_POST["product_title"];

   $description=$_POST['description'];
   $price=$_POST['price'];


   $image = addslashes(file_get_contents($_FILES['pimage']['tmp_name']));
   $type=$_POST['type'];
   $stock=$_POST['current_stock'];
$discount=$_POST['discount'];
   $p=new Product();
   $z=$p->add_one_item($title,$description,$price,$image,$type,$stock,$user_id,$discount);
echo $z;
header("Location:../views/seller_view.php");
   //echo $image;

?>