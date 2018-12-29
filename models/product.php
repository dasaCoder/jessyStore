
<?php

include ("connect.php");
//$x=new Product();
//echo $x->get_one_category_by_id('f5');

    class Product{

    private $host="localhost";
        private $user="root";
        private $pass="";
        private $db="webcart";
        public $conn=null;
        public $tree=null;

        public function  __construct()
        {

        }

        function getresult_to_div(){

           $x=new Connection();
           $conn=$x->getConnection();
            $sql="select * from products";

            $result=$conn->query($sql);
               // $tree="<div class=\"mdl-grid\">";
            $product=array();
            $x=-1;
            if($result->num_rows>0){
                 while($row=$result->fetch_assoc()){
                     $x++;
                      $product[$x]['product_id']=$row['product_id'];
                      $product[$x]['product_title']=$row['product_title'];
                     $product[$x]['description']=$row['description'];
                     $product[$x]['price']=$row['price'];
                     $product[$x]['current_stock']=$row['current_stock'];
                     $product[$x]['image']= base64_encode($row['image']);
                     //echo $row['image'];

                 }
            }
            $conn->close();
           // $tree.="</div>";
            return json_encode($product);
        }

        function get_oneitem($product_id){
            $conn=mysqli_connect($this->host,$this->user,$this->pass,$this->db);

            if($conn->connect_error){
                echo "error occured".$conn->error;
            }
            $sql="select product_id,product_title,description,price,image,current_stock,sold,discount from products where product_id='".$product_id."'";


            $stmt=$conn->prepare($sql);
            //$stmt->bind_param("s",$product_id);
            $stmt->execute();
            $stmt->bind_result($product_id,$product_title,$description,$price,$image,$current_stock,$sold,$discount);
            $stmt->fetch();
            //$product1=array();

                $product1['id']=$product_id;
                $product1['product_title']=$product_title;
                $product1['description']=$description;
                $product1['price']=$price;
                $product1['image']=base64_encode($image);
                $product1['current_stock']=$current_stock;
                $product1['sold']=$sold;
                $product1['discount']=$discount;


            return  $product1;

        }

        function get_one_category($category){
            $x=new Connection();
            $conn=$x->getConnection();

            $sql="select * from products where category='".$category."'";
            $product1=array();
            if($result=$conn->query($sql)){
                if($result->num_rows>0){
                    $x=0;
                    while($row=$result->fetch_assoc()){
                        $product1[$x]['id']=$row['product_id'];
                        $product1[$x]['product_title']=$row['product_title'];
                        $product1[$x]['description']=$row['description'];
                        $product1[$x]['price']=$row['price'];
                        $product1[$x]['discount']=$row['discount'];
                        $product1[$x]['image']=base64_encode($row['image']);
                        $product1[$x]['current_stock']=$row['current_stock'];
                        $product1[$x]['sold']=$row['sold'];
                        $x++;
                    }
                }else {
                    echo "no results";
                }
            }else{
                echo $conn->error;
            }
            return json_encode($product1) ;

        }


        function get_one_category_by_id($product_id){
            $x=new Connection();
            $conn=$x->getConnection();

            $stmt="select category from products where product_id='".$product_id."'";
            $category="";
            if($result=$conn->query($stmt))
                if($result->num_rows>0)
                    while($row=$result->fetch_assoc())
                    $category=$row['category'];

//$category='l';
            $sql="select * from products where category='".$category."'";
            $product1=array();
            if($result=$conn->query($sql)){
                if($result->num_rows>0){
                    $x=0;
                    while($row=$result->fetch_assoc()){
                        $product1[$x]['id']=$row['product_id'];
                        $product1[$x]['product_title']=$row['product_title'];
                        $product1[$x]['description']=$row['description'];
                        $product1[$x]['price']=$row['price'];
                        $product1[$x]['image']=base64_encode($row['image']);
                        $product1[$x]['current_stock']=$row['current_stock'];
                        $product1[$x]['sold']=$row['sold'];
                        $x++;
                    }
                }else {
                    echo "no results";
                }
            }else{
                echo $conn->error;
            }
            return json_encode($product1) ;

        }

        function add_one_item($title,$description,$price,$image,$type,$stock,$seller_id,$discount){
            $x=new Connection();
            $conn=$x->getConnection();

            $sql="insert into products(product_title,description,price,image,current_stock,category,seller_id,discount) values('{$title}','{$description}','{$price}','{$image}','{$stock}','{$type}','{$seller_id}','{$discount}')";
            if($conn->query($sql)){
                echo "success";
            }
            else
                echo $conn->error;


        }

        function seller_product($seller_id){
            $x=new Connection();
            $conn=$x->getConnection();

            $sql="SELECT * from products where seller_id='{$seller_id}'";

            if($result=$conn->query($sql)){
                if($result->num_rows>0){
                    $x=0;
                    while($row=$result->fetch_assoc()){
                        $product1[$x]['id']=$row['product_id'];
                        $product1[$x]['product_title']=$row['product_title'];
                        $product1[$x]['description']=$row['description'];
                        $product1[$x]['price']=$row['price'];
                        $product1[$x]['discount']=$row['discount'];
                        $product1[$x]['current_stock']=$row['current_stock'];
                        $product1[$x]['sold']=$row['sold'];
                        $x++;

                    }
                    return json_encode($product1);
                }
                return "no such seller";
            }
            return $conn->error;
        }

        function add_review($product_id,$user_id,$review){
            $x=new Connection();
            $conn=$x->getConnection();

            $sql="insert into reviews(user_id,product_id,review) values('".$user_id."','".$product_id."','".$review."')";

            if($conn->query($sql)){
                echo "success";
            }
            else echo $conn->error;

        }

        function show_review($product_id){
            $sql="select u.first_name,r.review from users u,reviews r,products p where r.product_id='".$product_id."' && p.product_id=r.product_id && r.user_id=u.user_id";
            $x=new Connection();
            $conn=$x->getConnection();

            if($result=$conn->query($sql)){
                $x=0;
                if($result->num_rows>0){
                    while($row=$result->fetch_assoc()){
                        $product[$x]=$row;
                        $x++;
                    }
                    echo json_encode($product);
                }
                else echo "no result";
            }
            else echo $conn->error;
        }

        function statistic($seller_id){
            $x=new Connection();
            $conn=$x->getConnection();

            $sql="select product_title,sold from products where  seller_id='".$seller_id."'";

            if($result=$conn->query($sql)){
                if($result->num_rows>0){
                    $x=0;
                    while($row=$result->fetch_assoc()){
                        $stat[$x]=$row;
                        $x++;
                    }
                    echo json_encode($stat);
                }
                else echo "no such seller";
            }else $conn->error;
        }

        function search_product($word){
            $x=new Connection();
            $conn=$x->getConnection();

            $sql="SELECT product_id,product_title,price,image,description FROM products WHERE product_title like '%{$word}%' or category like '%{$word}%'";

            if($result=$conn->query($sql)){
                if($result->num_rows>0){
                    $x=0;
                    while($row=$result->fetch_assoc()){
                        $product[$x]['title']=$row['product_title'];
                        $product[$x]['id']=$row['product_id'];
                        $product[$x]['price']=$row['price'];
                        $product[$x]['description']=$row['description'];
                        $product[$x]['image']=base64_encode($row['image']);
                        $x++;
                    }
                    return $product;
                }return  "no result found";
            }return $conn->error;
        }




    }

?>