

<html>
<?php
include "head.php";
?>


<body>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">


    google.charts.load('current', {'packages':['corechart']});

    google.charts.setOnLoadCallback(getdata);

    function drawChart(chartdata) {






        // Create the data table.
        var data = new google.visualization.DataTable();



        data.addColumn('string', 'Title');
        data.addColumn('number', 'Sold');
       // console.log(chartdata);
        data.addRows(chartdata);

        // Set chart options
        var options = {'title':'Your sells..',
            is3D:true,

            'width':'50%',
            'height':'500'};

        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
        chart.draw(data, options);
    }



    function getdata() {

        $.get('../controllers/seller/get_stat.php?user_id='+user_id,function (data) {
            data=$.parseJSON(data);
           // console.log(data);
            //alert("get");
            var chartdata=[];

            for(var c=0;c<data.length;c++){
                chartdata[c]=[];
                chartdata[c][0]=data[c]['product_title'];
                chartdata[c][1]=parseInt(data[c]['sold']);
            }
            drawChart(chartdata);


        });
    }




</script>

<!--Div that will hold the pie chart-->


<script src="../js/seller.js">


</script>



<?php include "nav.php" ?>
<div class="row" style="padding:20px;">
    <div class="col-md-4">
        <div style="background-color:#AFAFAF" class="pmd-card pmd-card-media-inline pmd-card-default pmd-z-depth">
            <!-- Card media-->
            <div class="pmd-card-media">
                <!-- Card media heading -->
                <div class="media-body">
                    <h2 class="pmd-card-title-text">View your orders...</h2>
                    <span class="pmd-card-subtitle-text">Your customers expects quick and valuable service from you...</span>
                </div>

                <!-- Card media image -->
                <div class="media-right media-middle">
                    <a href="javascript:void(0);">
                        <img width="112" height="112" src="../image/order.png">
                    </a>
                </div>
            </div>

            <!-- Card action -->
            <div class="pmd-card-actions">
                <button data-target="#ordersModal" data-toggle="modal" class="btn pmd-btn-flat pmd-ripple-effect btn-default" type="button">View Orders</button>

            </div>
        </div>
    </div>

    <!--add product-->
    <div  class="col-md-4">
        <div style="background-color:#AFAFAF" class="pmd-card pmd-card-media-inline pmd-card-default pmd-z-depth">
            <!-- Card media-->
            <div class="pmd-card-media">
                <!-- Card media heading -->
                <div class="media-body">
                    <h2 class="pmd-card-title-text">Add product</h2>
                    <span class="pmd-card-subtitle-text">More products in your store.. its more profit in your pocket</span>
                </div>

                <!-- Card media image -->
                <div class="media-right media-middle">
                    <a href="javascript:void(0);">
                        <img width="112" height="112" src="../image/add.png">
                    </a>
                </div>
            </div>

            <!-- Card action -->
            <div class="pmd-card-actions">
                <button data-target="#addModal" data-toggle="modal" class="btn pmd-btn-flat pmd-ripple-effect btn-default" type="button">Add Product</button>

            </div>
        </div>
    </div>

    <div  class="col-md-4">
        <div style="background-color:#AFAFAF" class="pmd-card pmd-card-media-inline pmd-card-default pmd-z-depth">
            <!-- Card media-->
            <div class="pmd-card-media">
                <!-- Card media heading -->
                <div class="media-body">
                    <h2 class="pmd-card-title-text">remove product</h2>
                    <span class="pmd-card-subtitle-text">remove wht you didt want</span>
                </div>

                <!-- Card media image -->
                <div class="media-right media-middle">
                    <a href="javascript:void(0);">
                        <img width="112" height="112" src="../image/add.png">
                    </a>
                </div>
            </div>

            <!-- Card action -->
            <div class="pmd-card-actions">
                <button data-target="#addModal" data-toggle="modal" class="btn pmd-btn-flat pmd-ripple-effect btn-default" type="button">Add Product</button>

            </div>
        </div>
    </div>
</div>
<div class="row" style="padding-top: 30px;  padding-left: 10px;">

<div class="row">
    <div class="col-md-6" id="chart_div"></div>
</div>
<div class="row" >
   <div class="col-md-12">
       <table class="table table-striped">
           <thead >
           <tr>
               <th>Product name</th>
                <th>Description</th>
               <th>Price</th>
               <th>Discount</th>

               <th>Startin stock</th>
               <th>Sold</th>

           </tr>
           </thead>
           <tbody id="tbody_all">


           </tbody>
       </table>
   </div>


</div>

<div id="table_div"></div>



<div class="modal fade" id="detailModal" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body modal-body-sub_agile">
                <div class="col-md-8 modal_body_left modal_body_left1">
                    <h3 id="title" class="agileinfo_sign"></h3>
                    <form action="#" id="detail_form" method="post">
                        <!--<div class="styled-input agile-styled-input-top">
                            <input type="text" id="title" name="title" required="">
                            <label>Product title</label>
                            <span></span>
                        </div>-->
                        <div class="styled-input">
                            <textarea name="description" id="description" cols="40" rows="10"></textarea>
                            <label>Description</label>
                            <span></span>
                        </div>
                        <div class="styled-input">
                            <input  type="text" id="price_det" name="price_det" required="">
                            <label>Price</label>
                            <span></span>
                        </div>
                        <div class="styled-input">
                            <input type="text" name="stock_det" id="stock_det" required="">
                            <label>Current stock</label>
                            <span></span>

                        </div><button id="update_stock_btn" class="btn btn-xs btn-success" style="display: none">update</button>
                        <div class="styled-input">
                            <input type="text" name="discount_det" id="discount_det" required="">
                            <label>Discount</label>
                            <span></span>
                        </div>
<!--                        <input type="submit" value="Sign Up">-->
                    </form>

                    <div class="clearfix"></div>


                </div>
                <div id="image_det" class="col-md-4 modal_body_right modal_body_right1">
                  <!--  <img src="../images/log_pic.jpg" alt=" "/>-->


                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        <!-- //Modal content-->
    </div>
</div>

<div class="modal fade" id="ordersModal" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body ">
                <div class="col-md-12 modal_body_left modal_body_left1">
                    <h3>  your current orders.....</h3>
                    <table class="table table-striped">
                        <thead >
                        <tr>
                            <th>Product name</th>

                            <th>Quantity</th>
                            <th>Ordered at</th>
                            <th>Is shipped?</th>

                        </tr>
                        </thead>
                        <tbody id="tbody_con">


                        </tbody>
                    </table></div>

                </div>

                <div class="clearfix"></div>
            </div>
        </div>
        <!-- //Modal content-->
    </div>

    <div class="modal fade" id="addModal" tabindex="-1" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body ">
                    <div class="col-md-12 modal_body_left modal_body_left1">

                        <div class="col-md-12 contact-form" >

                            <h4 class="white-w3ls">Add <span>product</span></h4>
                            <form id="add_product_form_seller" action="../controllers/add_product" method="post" enctype="multipart/form-data">
                                <div class="styled-input agile-styled-input-top">
                                    <input type="text" name="product_title" required="">
                                    <label>Product title</label>
                                    <span></span>
                                </div>
                                <div class="styled-input">
                                    <textarea name="description" required=""></textarea>
                                    <label>description</label>
                                    <span></span>
                                </div>
                                <div class="styled-input">
                                    <input type="text" name="price" required="">
                                    <label>Price</label>
                                    <span></span>
                                </div>
                                <div class="styled-input">
                                    <input type="text" name="discount" required="">
                                    <label>Discount</label>
                                    <span></span>
                                </div>
                                <div class="styled-input">
                                    <br><input type="file" name="pimage" >
                                    <label>Preview</label>
                                    <span></span>
                                </div>

                                <div class="styled-input">
                                    <br><select name="type" id="">
                                        <option value="dog food">Dog food</option>
                                        <option value="dog leads">Dog Collars & leads</option>
                                        <option value="dog bowls and feeders">Dog Bowls and feeders</option>

                                        <option value="cat food">Cat food</option>
                                        <option value="cat collar and tranceport">Cats Bowls & feeders</option>
                                        <option value="Cat Bowls & Cat Fountains">Cats leads & collars</option>
                                    </select>
                                    <label>Product Type</label>
                                    <span></span>
                                </div>

                                <div class="styled-input">
                                    <br><input type="text" name="current_stock" required="">
                                    <label>Stock</label>
                                    <span></span>
                                </div>

                                <input type="submit" value="SEND">
                            </form>
                        </div>

                </div>

                <div class="clearfix"></div>
            </div>
        </div>
        <!-- //Modal content-->
    </div>
</div>



<?php include "footer.php"; ?>
</body>
</html>
