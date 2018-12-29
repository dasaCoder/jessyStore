<?php

    interface conn{
        public function getConnection();
    }

    class Connection implements conn{

        private $host="localhost";
        private $user="root";
        private $pass="";
        private $db="webcart";
        private $conn=null;


        public  function __construct()
        {


        }

        public function getConnection(){
            $conn=mysqli_connect($this->host,$this->user,$this->pass,$this->db);

            if($conn->connect_error){
                echo "error occured".$conn->error;
            }
            return $conn;
        }
    }

?>