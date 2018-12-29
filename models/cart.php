<?php
    include ("connect.php");

    class Cart{



        public function addToCart($product_id,$user_id,$quantity){
            $x=new Connection();
            $conn=$x->getConnection();
            if($result=$conn->query('update products set sold=sold+'.$quantity.' where product_id="'.$product_id.'"')){
                echo $result;
            }
            else{
                echo $conn->error;
            }
            if($stmt=$conn->prepare("insert into cart(user_id,product_id,quantity) values(?,?,?)")){
                $stmt->bind_param("ssi",$user_id,$product_id,$quantity);
               if( $stmt->execute()) {
                   // echo 'tre';
                   echo "trre";
               }else
                   echo $stmt->error;
            }
            else{
                echo 'aaaa';
               // return false;
            }





        }
        public function removeFromCart($cart_id){
            $x=new Connection();
            $conn=$x->getConnection();

            $sql="DELETE FROM cart WHERE cart_id ='".$cart_id."'";

            if($conn->query($sql)){
                echo "deleted";
            }


        }

        public function showCart($user_id){
            $x=new Connection();
            $conn=$x->getConnection();
            $sql="SELECT p.product_title,p.price,c.quantity,c.cart_id from products p, cart c WHERE p.product_id=c.product_id && c.user_id=".$user_id." && c.payed=0";
            if($result=$conn->query($sql)){
                    $row=array();
                if($result->num_rows>0){
                    while($r=$result->fetch_assoc()){
                        $row[]=$r;
                    }
                           }

            }
           return $row;


        }

        public function showCart_by_seller($seller_id){
            $x=new Connection();
            $conn=$x->getConnection();
            $sql="SELECT p.product_title,c.quantity,c.cart_id,c.ordered_at,c.is_shipped from products p, cart c WHERE p.product_id=c.product_id && p.seller_id=".$seller_id." && c.payed=0";
            if($result=$conn->query($sql)){
                $row=array();
                if($result->num_rows>0){
                    while($r=$result->fetch_assoc()){
                        $row[]=$r;
                    }
                }

            }
            return $row;


        }

        function mark_ship($cart_id){
            $x=new Connection();
            $conn=$x->getConnection();
            $sql="update cart set is_shipped=1 where cart_id='".$cart_id."'";

            if($conn->query($sql)){
                echo "success";
            }
            else echo $conn->error;
        }


    }



?>