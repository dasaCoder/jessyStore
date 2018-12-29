<script src="../js/search.js"></script>



<div class="header" id="home">
    <div class="container">
        <ul>
            <?php
            if(isset($_SESSION['logged_in'])) {
                if ($_SESSION['logged_in']) {
                    $user_name=$_SESSION['user_name'];
                    echo '<li> <a href="#" data-toggle="modal" data-target="#loginModal"><i class="fa fa-user" aria-hidden="true"></i> ' . $user_name . '  </a><span id="logout_btn" class="fa fa-sign-out"></span></li>';

                } else {
                    echo '<li> <a href="#" data-toggle="modal" data-target="#loginModal"><i class="fa fa-unlock-alt" aria-hidden="true"></i> Sign In </a></li>';
                    echo '<li> <a href="#" data-toggle="modal" data-target="#signupModal"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Sign Up </a></li>';
                }
            }else{
                $_SESSION['logged_in']=false;
                echo '<li> <a href="#" data-toggle="modal" data-target="#loginModal"><i class="fa fa-unlock-alt" aria-hidden="true"></i> Sign In </a></li>';
                echo '<li> <a href="#" data-toggle="modal" data-target="#signupModal"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Sign Up </a></li>';
            }
                ?>


            <li><i class="fa fa-phone" aria-hidden="true"></i> Call : 0713252338</li>
            <li><i class="fa fa-envelope-o" aria-hidden="true"></i> <a href="mailto:info@example.com">dilusha@gmail.com</a></li>
        </ul>
    </div>
</div>
<!-- //header -->
<!-- header-bot -->
<div class="header-bot"  >
    <div class="header-bot_inner_wthreeinfo_header_mid">
        <div class="col-md-4 header-middle">
            <form id="form_search" action="../controllers/search.php" method="post">
                <input type="search" id="search" name="search" placeholder="Search here..." required="">
                <input type="submit" value=" ">
                <div class="clearfix"></div>
            </form>
        </div>

        <!-- header-bot -->
        <div class="col-md-4 logo_agile">
            <h1><a href="index.php">jessy<span>B</span> <i class="fa fa-paw top_logo_agile_bag" aria-hidden="true"></i></a></h1>
        </div>
        <!-- header-bot -->
        <div class="col-md-4 agileits-social top_content">
            <ul class="social-nav model-3d-0 footer-social w3_agile_social">
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
        <div class="clearfix"></div>
    </div>
</div>


<div class="ban-top" >
    <div class="container">
        <div class="top_nav_left">
            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse menu--shylock" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav menu__list">
                            <li class="active menu__item menu__item--current"><a class="menu__link" href="index.php">Home <span class="sr-only">(current)</span></a></li>


                            <li class="dropdown menu__item">
                                <a href="#" class="dropdown-toggle menu__link" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">cats <span class="caret"></span></a>
                                <ul class="dropdown-menu multi-column columns-3">
                                    <div class="agile_inner_drop_nav_info">
                                        <div class="col-sm-3 multi-gd-img">
                                            <ul class="multi-column-dropdown">
                                                <li><a href="category.php?category=Cats Bowls & feeders">Cats Bowls & feeders</a></li>
                                                <li><a href="category.php?category=Cats leads & collars">Cats leads & collars </a></li>
                                                <li><a href="category.php?category=Cats foods">Cats foods</a></li>

                                            </ul>
                                        </div>

                                        <div class="col-sm-6 multi-gd-img multi-gd-text ">
                                            <img src="../image/cat.jpg" alt=" "/>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </ul>
                            </li>


                            <li class="dropdown menu__item">
                                <a href="#" class="dropdown-toggle menu__link" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dogs <span class="caret"></span></a>
                                <ul class="dropdown-menu multi-column columns-3">
                                    <div class="agile_inner_drop_nav_info">
                                        <div class="col-sm-3 multi-gd-img">
                                            <ul class="multi-column-dropdown">
                                                <li><a href="category.php?category=dog bowls">Dog Bowls & feeders</a></li>
                                                <li><a href="category.php?category=dog leads">Dog leads & collars </a></li>
                                                <li><a href="category.php?category=dog food">Dog foods</a></li>

                                            </ul>
                                        </div>

                                        <div class="col-sm-6 multi-gd-img multi-gd-text ">
                                            <img src="../image/top1.jpg" alt=" "/>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </ul>
                            </li>

                            <li class="dropdown menu__item">
                                <a href="#" class="dropdown-toggle menu__link" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Birds<span class="caret"></span></a>
                                <ul class="dropdown-menu multi-column columns-3">
                                    <div class="agile_inner_drop_nav_info">
                                        <div class="col-sm-3 multi-gd-img">
                                            <ul class="multi-column-dropdown">
                                                <li><a href="category.php?category=dog_bowls">Dog Bowls & feeders</a></li>
                                                <li><a href="category.php?category=dog_feeders">Dog leads & collars </a></li>
                                                <li><a href="category.php?category=dog_food">Dog foods</a></li>

                                            </ul>
                                        </div>

                                        <div class="col-sm-6 multi-gd-img multi-gd-text ">
                                            <img src="../image/top1.jpg" alt=" "/>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </ul>
                            </li>

                            <li class="menu__item dropdown">
                                <a class="menu__link" href="#" class="dropdown-toggle" data-toggle="dropdown">Others <b class="caret"></b></a>
                                <ul class="dropdown-menu agile_short_dropdown">
                                    <li><a href="icons.html">Web Icons</a></li>
                                    <li><a href="typography.html">Typography</a></li>
                                </ul>
                            </li>

                            <li class=" menu__item"><a class="menu__link" href="about.html">About</a></li>

                            <li class=" menu__item"><a href="category.php?category=phone" class="menu__link" href="contact.html">Contact</a></li>


                            <?php
                                if(isset($_SESSION["is_seller"])){
                                    if($_SESSION["is_seller"]==1){
                                        echo '<li class=" menu__item"><a class="menu__link" href="seller_view.php">Admin</a></li>';
                                    }
                                }

                            ?>


                        </ul>
                    </div>
                </div>
            </nav>
        </div>
        <div class="top_nav_right">
            <div class="wthreecartaits wthreecartaits2 cart cart box_1">

                <button id="viewcart" data-target="#cartModal" data-toggle="modal"  class="w3view-cart" type="submit" name="submit" value=""><i class="fa fa-cart-arrow-down" aria-hidden="true"></i></button>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<!-- //banner-top -->
<!-- Modal1 -->
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body modal-body-sub_agile">
                <div class="col-md-8 modal_body_left modal_body_left1">
                    <h3 class="agileinfo_sign">Sign In <span>Now</span></h3>


                    <form id="login_form" action="../controllers/loginuser.php" method="post">
                        <div id="aler_login_div" class="alert alert-danger" style="display: none"></div>
                        <div class="styled-input agile-styled-input-top">
                            <input type="text" id="login_name" name="name" required="">
                            <label>Name</label>
                            <span></span>
                        </div>
                        <div class="styled-input">
                            <input type="password" id="login_pas" name="password" >
                            <label>Password</label>
                            <span></span>
                        </div>
                        <input type="submit" value="Sign In">
                    </form>

                    <div class="clearfix"></div>
                    <p><a href="#" data-toggle="modal" data-target="#signupModal" > Don't have an account?</a></p>

                </div>
                <div class="col-md-4 modal_body_right modal_body_right1">
                    <img src="../image/log.jpg" alt=" "/>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        <!-- //Modal content-->
    </div>
</div>
<!-- //Modal1 -->
<!-- Modal2 -->
<div class="modal fade" id="signupModal" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body modal-body-sub_agile">
                <div class="col-md-8 modal_body_left modal_body_left1">
                    <h3 class="agileinfo_sign">Sign Up <span>Now</span></h3>
                    <form action="../controllers/sign_in.php" id="signin_form" method="post">
                       <div id="error_div"></div>
                        <div class="styled-input agile-styled-input-top">
                            <input type="text" id="name" name="name" required="">
                            <label>Name</label>
                            <span></span>
                        </div>
                        <div class="styled-input">
                            <input type="email" id="email" name="email" required="">
                            <label>Email</label>
                            <span></span>
                        </div>
                        <div class="styled-input">
                            <input  type="password" id="password" name="password" required="">
                            <label>Password</label>
                            <span></span>
                        </div>
                        <div class="styled-input">
                            <input type="password" id="passwordA" name="passwordA" required="">
                            <label>Confirm Password</label>
                            <span></span>
                        </div>

                        <div class="styled-input">
                            <input  type="checkbox" id="is_seller" name="is_seller" value="1">
                            <label>Are you wish to sell something here?</label>
                            <span></span>
                        </div>


                        <div class="styled-input">
                            <input type="text" id="telephone" name="telephone" required="">
                            <label>Telephone</label>
                            <span></span>
                        </div>
                        <input type="submit" value="Sign Up">
                    </form>
                    <ul class="social-nav model-3d-0 footer-social w3_agile_social top_agile_third">
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
                    <div class="clearfix"></div>
                    <p><a href="#">By clicking register, I agree to your terms</a></p>

                </div>
                <div class="col-md-4 modal_body_right modal_body_right1">
                    <img src="../image/log.jpg" alt=" "/>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        <!-- //Modal content-->
    </div>
</div>
<!-- //Modal2 -->

<div class="modal fade" id="cartModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel"><span class="glyphicon glyphicon-shopping-cart"></span> My Cart</h4>
            </div>
            <div class="modal-body">
                <table class="table table-hover table-responsive" id="CartTable"></table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" >Buy</button>

            </div>
        </div>
    </div>
</div>




<div class="col-md-9 col-md-offset-1" style="z-index: 4;background-color: #AFAFAF;position: relative" id="search_result_div">


</div>

