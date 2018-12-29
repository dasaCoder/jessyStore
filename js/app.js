$(document).ready(function () {


    $("#login_form").on('submit',function (e) {
        e.preventDefault();

     //   var name=$("#login_name").val();
       // var pas=$("#login_pas").val();

        $.ajax({
            url:'../controllers/loginuser.php',
            type:'POST',
            data:$("#login_form").serialize(),
            success:function (data) {

                if(data) {
                    location.reload();// alert("submit");
                }
                else{// alert(data);
                    $("#login_form")[0].reset();

                    $("#aler_login_div").css('display','block').html("something wrong happend. re-enter your user name and password....");
                }
            }
        });

    });

    $("#logout_btn").click(function () {
        //alert("dddd");
        $.get("../controllers/logout.php",{log:"false"},function () {
            location.reload();
        });


    });
    function validateEmail(email)
    {
        var re = /\S+@\S+\.\S+/;
        return re.test(email);
    }

    function validateMobile(mobile)
    {
        var re = /^(\+\d{1,2}\s)?\(?\d{3}\)?[\s.-]?\d{3}[\s.-]?\d{4}$/;
        return re.test(mobile);
    }

    function login(name,password) {

        $.ajax({
            url:'../controllers/loginuser.php',
            type:'POST',
            data:{
              'name':name,
                'password':password,
            },
            success:function (data) {

                if(data) {
                    location.reload();// alert("submit");
                }

            }
        });
    }

    $("#signin_form").on('submit',function (e) {
        e.preventDefault();


        var name=$("#name").val();
        var email=$("#email").val();
        var pas=$("#password").val();
        var pasagain=$("#passwordA").val();
        var tel=$("#telephone").val();
        checke=validateEmail(email);
        checkt=validateMobile(tel);
        //alert(email);
        if(name==""|| email=="" || pas=="" || pasagain=="" || tel==""){
            $("#error_div").html('<div class="alert alert-warning"><strong>Error!</strong>have to fill all the fields</div>');
        }else if(!checke){
        $("#error_div").html('<div class="alert alert-warning"><strong>Error!</strong>not valid email</div>');
        }else if(!checkt){
        $("#error_div").html('<div class="alert alert-warning"><strong>Error!</strong>not valid mobile</div>');
        }else if(pas!=pasagain){
        $("#error_div").html('<div class="alert alert-warning"><strong>Error!</strong>password not matching</div>');
        }

        else{
            $.ajax({
                url:'../controllers/sign_in.php',
                type:'POST',
                data:$("#signin_form").serialize(),
                success:function () {

                    login($("#signin_form").find("#name").val(),$("#signin_form").find("#password").val());
                }
            });
        }




    });



    function show_cart() {
        $.ajax({
            url: "../controllers/view_cart.php",
            type: 'POST',
            data: {
                "user_id":user_id,
    },
        success: function (data) {

            $("#CartTable").html(" ");


            var data = $.parseJSON(data);
            console.log(data);
            //alert(data.length);
            var stuff="";
            var total=0;
            if(data.length==0){
                stuff+='<div class="alert alert-danger" role="alert" >Your cart is empty</div>';
            }
            else {

                for (var y = 0; y < data.length; y++) {
                    /* stuff+=' <li class="list-group-item"><div class="media-left"> <a href="javascript:void(0);" class="avatar-list-img"> <img alt="40x40" data-src="';
                     stuff += 'holder.js/40x40';
                     stuff +=' " class="img-responsive" src="';
                     stuff += ' http://propeller.in/components/list/img/40x40.png';
                     stuff += ' " data-holder-rendered="true"> </a> </div> <div class="media-body media-middle">';
                     stuff +='<table><tr><td>';
                     stuff += data[y]['product_title'];
                     stuff += '</td><td>';
                     stuff += data[y]['price'];
                     stuff += '</td></tr></table>';
                     stuff += ' </div> </li>';*/
                    total += data[y]['price'] * data[y]['quantity'];
                    stuff += '<tr >';
                    stuff += '<td class="text-center" style="width: 30px;"><img width="30px" height="30px" src="#"/></td>' +
                        '<td>' + data[y]['product_title'] + '</td>' +
                        '<td title="Unit Price">' + data[y]['price'] + '</td>' +
                        '<td title="Quantity"><form class="quantity_form"><input type="number" value="' + data[y]['quantity'] + '"><input type="submit" class="update btn btn-xs btn-info" value="update"> </form></td>' +
                        '<td title="Total" > ' + data[y]['price'] * data[y]['quantity'] + '</td>' +
                        '<td title="Remove from Cart" class="text-center" style="width: 30px;"><button class="remove_from_cart btn btn-danger btn-xs"  data-link="../controllers/delete_from_cart.php?cart_id=' + data[y]['cart_id'] + '" >X</button></td>' +
                        '</tr>';


                }

                stuff += '<tr>' +
                    '<td></td>' +
                    '<td><strong>Total</strong></td>' +
                    '<td></td>' +
                    '<td></td>' +
                    '<td><strong >rs ' + total + '</strong></td>' +
                    '<td></td>' +
                    '</tr>';
            }
            $("#CartTable").html(stuff);


        }
    });
    };

    $("#viewcart").click(function () {
        //alert("r");
        show_cart();
    });

    $("#CartTable").on('click','.remove_from_cart',function (e) {
        // alert($(this).data('link'));
        e.preventDefault();
        $.get($(this).data('link'),function () {
            show_cart();
        });

    });

    $("#cartTable").on('click','.update',function () {
        alert("ddd");
    });

    //alert(user_id);

});