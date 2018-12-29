<?php
   //


   // $first_name=$_POST['first_name'];
   //=$_POST['password'];
include ("connect.php");
session_start();


        class User{
            private $user_status;
            private $user_name;
            public $fName;
            public function __construct(){
                $fName=null;
            }
            public function login_user($first_name,$password){
                $x=new Connection();
                $conn=$x->getConnection();



                if($stmt=$conn->prepare("select first_name,user_id,is_seller from users where first_name=? && password=?")) {

                    $stmt->bind_param('ss',$first_name,$password);
                    $stmt->execute();
                    $stmt->bind_result($fName,$user_id,$is_seller);

                   if($stmt->fetch()) {
                     //  echo $fName;

                       $_SESSION["logged_in"]=true;
                       $_SESSION["user_name"]=$fName;
                       $_SESSION["user_id"]=$user_id;
                       $_SESSION["is_seller"]=$is_seller;
                       //echo $_SESSION["user_name"];
                       //echo $_SESSION["user_id"];
                      return true;
                   }
                   else{
                      $_SESSION["logged_in"]=false;
                       $_SESSION["user_name"]="unknown";
                       //$_SESSION["user_id"]=0;
                       return false;
                   }



            }
       }

            public function create_user($name,$email,$telephone,$password,$is_seller){
                $x=new Connection();
                $conn=$x->getConnection();



               if($stmt=$conn->prepare("insert into users(first_name,email,telephone,password,is_seller) VALUE (?,?,?,?,?)")){
                   $stmt->bind_param("sssss",$name,$email,$telephone,$password,$is_seller);
                  if($stmt->execute()) {

                      echo "successfull";
                      return "true";
                  }
                  else
                      echo $stmt->error;
               }


                    else{
                   echo "unsuccessfull";
                        return "false";
                    }
            }

        }









?>