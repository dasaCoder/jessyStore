<?php include "head.php";
    $product_id=$_GET['product_id'];
?>

<body>
<?php include "nav.php" ?>


<script>
    var product_id=<?php echo $product_id ; ?>
</script>
<script src="../js/single.js" type="text/javascript"></script>
<div class="page-head_agile_info_w3l">
		<div class="container">
			<h3>Single <span>Page </span></h3>
			<!--/w3_short-->
				 <div class="services-breadcrumb">
						<div class="agile_inner_breadcrumb">

						   <ul class="w3_short">
								<li><a href="index.php">Home</a><i>|</i></li>
								<li>Single Page</li>
							</ul>
						 </div>
				</div>
	   <!--//w3_short-->
	</div>
</div>


<div class="banner-bootom-w3-agileits">
	<div class="container">
	     <div class="col-md-4 single-right-left ">
			<div class="grid images_3_of_2">

					
					<ul class="slides">
						<li data-thumb="">
							<div id="picture_div" class="thumb-image">  </div>
						</li>

					</ul>
					<div class="clearfix"></div>

			</div>
		</div>
		<div class="col-md-8 single-right-left simpleCart_shelfItem">
					<h3 id="product_title"></h3>
					<p><span id="price" class="item_price">rs </span> <del id="pre-price">- rs </del></p>
					<div class="rating1">
						<span class="starRating">
							<input id="rating5" type="radio" name="rating" value="5">
							<label for="rating5">5</label>
							<input id="rating4" type="radio" name="rating" value="4">
							<label for="rating4">4</label>
							<input id="rating3" type="radio" name="rating" value="3" checked="">
							<label for="rating3">3</label>
							<input id="rating2" type="radio" name="rating" value="2">
							<label for="rating2">2</label>
							<input id="rating1" type="radio" name="rating" value="1">
							<label for="rating1">1</label>
						</span>
					</div>

					<div class="color-quality">
						<div id="quantity_div" class="color-quality-right">
							<h5>Quantity:</h5>
							<select id="quantity"  class="frm-field required sect">

							</select>
						</div>
					</div>

					<div class="occasion-cart">
						<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out button2">
															<form id="form_add_to_cart" method="post">
																<fieldset id="addtocart_field">


																</fieldset>
															</form>
														</div>
																			
					</div>
					<ul class="social-nav model-3d-0 footer-social w3_agile_social single_page_w3ls">
						                                   <li class="share">Share On : </li>
															<li><a href="#" class="facebook">
																  <div class="front"><i class="fa fa-facebook" aria-hidden="true"></i></div>
																  <div class="back"><i class="fa fa-facebook" aria-hidden="true"></i></div></a></li>
															<li><a href="#" class="twitter"> 
																  <div class="front"><i class="fa fa-twitter" aria-hidden="true"></i></div>
																  <div class="back"><i class="fa fa-twitter" aria-hidden="true"></i></div></a></li>
															<li><a href="#" class="instagram">
																  <div class="front"><i class="fa fa-instagram" aria-hidden="true"></i></div>
																  <div class="back"><i class="fa fa-instagram" aria-hidden="true"></i></div></a></li>
															<li><a href="#" class="pinterest">
																  <div class="front"><i class="fa fa-linkedin" aria-hidden="true"></i></div>
																  <div class="back"><i class="fa fa-linkedin" aria-hidden="true"></i></div></a></li>
														</ul>
					
		      </div>
	 			<div class="clearfix"> </div>
				<!-- /new_arrivals --> 
	<div class="responsive_tabs_agileits"> 
				<div id="horizontalTab">
						<ul class="resp-tabs-list">
							<li>Description</li>
							<li>Reviews</li>
							<li>Information</li>
						</ul>
					<div class="resp-tabs-container">
					<!--/tab_one-->
					   <div class="tab1">

							<div id="description_div" class="single_page_agile_its_w3ls">


							</div>
						</div>
						<!--//tab_one-->
						<div class="tab2">
							
							<div class="single_page_agile_its_w3ls">
								<div id="review_div" class="bootstrap-tab-text-grids">
									<div class="bootstrap-tab-text-grid">

										<div id="review_show" class="bootstrap-tab-text-grid-right">


										</div>
										<div class="clearfix"> </div>
						             </div>
                                    <?php
                                        if(isset($_SESSION['logged_in'])){
                                            if($_SESSION['logged_in'])
                                            echo '<div class="add-review">
										<h4>add a review</h4>
										<form id="review_form" class="revform" action="../controllers/review/add_review.php" method="post">
                                                <input type="hidden" name="product_id" value="'.$product_id.'" >
												<input type="hidden" name="user_name" value="'.$_SESSION["user_id"].'" >
												<textarea name="Message" required=""></textarea>
											<input type="submit" value="SEND">
										</form>
										<script>
                                        $("document").ready(function () {
                                            $("#review_form").submit(function (e) {
                                                e.preventDefault();
                                                $.ajax({
                                                   url:\'../controllers/review/add_review.php\',
                                                    type:\'POST\',
                                                    data:$(this).serialize(),
                                                    success:function() {
                                                      $("#review_form")[0].reset();
                                                       $.get(
        \'../controllers/review/show.php?product_id=\'+product_id,
        function (data) {
            data=$.parseJSON(data);

           // alert(data.length);
            var rev=" ";
            for(var x=0;x<data.length;x++){
                rev+=\'<div class="user_id"><h4>\'+data[x][\'first_name\']+
                        \'</h4><h3>\'+data[x][\'review\']+\'</h3></div><br>\';


            }
            $("#review_show").html(rev);



        }
    );
                                                    }
                                                    
                                                });
                                            })
                                        });
                                    </script>
									</div>';
                                        }
                                    ?>


								 </div>
								 
							 </div>
						 </div>
						   <div class="tab3">

							<div class="single_page_agile_its_w3ls">
							  <h6>Big Wing Sneakers (Navy)</h6>
							   <p>Lorem ipsum dolor sit amet, consectetur adipisicing elPellentesque vehicula augue eget nisl ullamcorper, molestie blandit ipsum auctor. Mauris volutpat augue dolor.Consectetur adipisicing elit, sed do eiusmod tempor incididunt ut lab ore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco. labore et dolore magna aliqua.</p>
							   <p class="w3ls_para">Lorem ipsum dolor sit amet, consectetur adipisicing elPellentesque vehicula augue eget nisl ullamcorper, molestie blandit ipsum auctor. Mauris volutpat augue dolor.Consectetur adipisicing elit, sed do eiusmod tempor incididunt ut lab ore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco. labore et dolore magna aliqua.</p>
							</div>
						</div>
					</div>
				</div>	
			</div>
	<!-- //new_arrivals --> 
	  	<!--/slider_owl-->
	
			<div class="w3_agile_latest_arrivals">
			<h3 id="related_item_div" class="wthree_text_info">Featured <span>Arrivals</span></h3>


							<div class="clearfix"> </div>
					<!--//slider_owl-->
		         </div>
	        </div>
 </div>

<div class="coupons">
		<div class="coupons-grids text-center">
			<div class="w3layouts_mail_grid">
				<div class="col-md-3 w3layouts_mail_grid_left">
					<div class="w3layouts_mail_grid_left1 hvr-radial-out">
						<i class="fa fa-truck" aria-hidden="true"></i>
					</div>
					<div class="w3layouts_mail_grid_left2">
						<h3>FREE SHIPPING</h3>
						<p>Lorem ipsum dolor sit amet, consectetur</p>
					</div>
				</div>
				<div class="col-md-3 w3layouts_mail_grid_left">
					<div class="w3layouts_mail_grid_left1 hvr-radial-out">
						<i class="fa fa-headphones" aria-hidden="true"></i>
					</div>
					<div class="w3layouts_mail_grid_left2">
						<h3>24/7 SUPPORT</h3>
						<p>Lorem ipsum dolor sit amet, consectetur</p>
					</div>
				</div>
				<div class="col-md-3 w3layouts_mail_grid_left">
					<div class="w3layouts_mail_grid_left1 hvr-radial-out">
						<i class="fa fa-shopping-bag" aria-hidden="true"></i>
					</div>
					<div class="w3layouts_mail_grid_left2">
						<h3>MONEY BACK GUARANTEE</h3>
						<p>Lorem ipsum dolor sit amet, consectetur</p>
					</div>
				</div>
					<div class="col-md-3 w3layouts_mail_grid_left">
					<div class="w3layouts_mail_grid_left1 hvr-radial-out">
						<i class="fa fa-gift" aria-hidden="true"></i>
					</div>
					<div class="w3layouts_mail_grid_left2">
						<h3>FREE GIFT COUPONS</h3>
						<p>Lorem ipsum dolor sit amet, consectetur</p>
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>

		</div>
</div>
<!--grids-->
<!-- footer -->
<?php include "footer.php"?>
</body>
</html>
