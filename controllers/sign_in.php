<?php
    include ("../models/user.php");


    $first_name=$_POST['name'];
   // $last_name=$_POST['last_name'];
    $address=$_POST['email'];
    $telephone=$_POST['telephone'];
    $password=$_POST['password'];

    if(isset($_POST['is_seller']))
         $is_seller=$_POST['is_seller'];
    else
        $is_seller='0';




    $user=new User();
   echo  $user->create_user($first_name,$address,$telephone,$password,$is_seller);




?>