<?php
include "../models/user.php";

   // session_start();


    $first_name=$_POST['name'];
    $password=$_POST['password'];

    $user=new User();
   $status= $user->login_user($first_name,$password);

   echo $status;

   /*if($status){

       header("Location:../views/index.php");
   }
   else{
       header("Location:../login.php");
   }*/

?>