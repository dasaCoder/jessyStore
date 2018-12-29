<?php
    session_start();
    //session_destroy();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Elite Shoppy an Ecommerce Online Shopping Category Flat Bootstrap Responsive Website Template | Home :: w3layouts</title>


    <link href="../css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
    <link href="../css/style.css" rel="stylesheet" type="text/css" media="all" />
    <link href="../css/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../css/jquery-ui.css">
    <link rel="stylesheet" href="http://propeller.in/components/card/css/card.css">

    <link href="../css/easy-responsive-tabs.css" rel='stylesheet' type='text/css'/>
    <link rel="stylesheet" href="../css/flexslider.css" type="text/css" media="screen" />
    <!-- //for bootstrap working -->
    <link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800" rel="stylesheet">
    <link href='//fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700,900,900italic,700italic' rel='stylesheet' type='text/css'>

    <script src="../js/jquery-2.1.4.min.js"></script>

    <script>
        var user_id=<?php
            if(isset($_SESSION['user_id'])) {
                echo $_SESSION['user_id'];

            }
            else
                echo 0;
            ?>;
        //console.log(x);
    </script>
    <script src="../js/app.js" type="text/javascript"></script>

</head>