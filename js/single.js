$(document).ready(function () {
   // alert("ddd");
    var data;

    $.get('../controllers/view_one_product.php?product_id='+product_id,function (data1) {
        data=$.parseJSON(data1);
        //console.log(data);

        $("#product_title").html(data['product_title']);
        $("#price").append(data['price']*95/100);
        $("#pre-price").append(data['price']);
        var image=new Image();
        image.src='data:image/jpg;base64,'+data['image'];
        image.className='img-responsive';
        //image.setAttribute('data-imagezoom','true');
        //var src=""+;
        $("#picture_div").append(image);

        var x=data['current_stock']-data['sold'];

        //alert(data['sold']);
        var stuff='';
        if(x>0) {
            //alert(x);
            for (var y = 1; y <= x; y++) {
                stuff += ' <option value="';
                stuff += y;
                stuff += '"';

                if (y == 1) {
                    stuff += 'selected';
                }

                stuff += '>';
                stuff += y;
                stuff += '</option>';
                $("#quantity").html(stuff);
                var input='<input type="submit" name="submit" value="Add to cart" class="button">';
                $("#addtocart_field").html(input);
            }

        }
        else{
           var dstuff='<div class="bg-danger">sorry... This item is out of Stock </div>';

           $("#quantity_div").html(dstuff);

        }

        $("#description_div").html(data['description']);

    });

    $("#form_add_to_cart").on('submit',function (e) {
        e.preventDefault();

        $.ajax({
            url:'../controllers/add_to_cart.php',
            type:'post',
            data:{
                'user_id':user_id,
                'product_id':product_id,
                'quantity':$("#quantity").val(),
            },
            success:function (data) {
                //alert(data);
                location.reload();
            }


        })

    });
    $("#related_item_div").on('submit',"#form_add_to_cart_relative",function (e) {
        e.preventDefault();

        $.ajax({
            url:'../controllers/add_to_cart.php',
            type:'post',
            data:$(this).serialize(),
            success:function (data) {
                //alert(data);
              //  location.reload();
            }


        })

    });

    $.get('../controllers/view_category.php?product_id='+product_id,function (data1) {

        var data=$.parseJSON(data1);
        console.log(data);
        stuff="";
        for(var y=0;y<data.length;y++){
            stuff+='<div id="product_div" class="tab1"> <div class="col-md-3 product-men"> <div class="men-pro-item simpleCart_shelfItem">';
            stuff+='<div class="men-thumb-item"> <img src="data:image/png;base64, '+ data[y]['image']+'" alt="" class="pro-image-front"> <img src="data:image/png;base64, '+ data[y]['image']+'" alt="" class="pro-image-back">';
            stuff+='<div class="men-cart-pro"> <div class="inner-men-cart-pro">';
            stuff+='  <a href="single.php?product_id='+data[y]['id'] +'" class="link-product-add-cart">Quick View</a>';
            stuff+=' </div></div><span class="product-new-top">New</span></div><div class="item-info-product ">';
            stuff+='<h4><a href="single.php">'+data[y]['product_title']+'</a></h4><div class="info-product-price">' ;
            stuff+=' <span class="item_price"> rs '+data[y]['price']*95/100 +' </span><del> rs '+data[y]['price']+'</del></div>';
            stuff+=' <div id="add_to_cart" class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out button2">';

            stuff+='<form class="form_add_to_cart_relative"  method="post"><input type="hidden" name="user_id" value='+ user_id+'> ';
            stuff+='<input type="hidden" name="product_id" value='+data[y]['id']+'>';
            stuff+='<input type="hidden" name="quantity" value="1">';
            stuff+='<input type="submit"  value="Add to cart" class="button" /></form>';
            stuff+=' </div></div> </div></div>';

        }
        $("#related_item_div").append(stuff);


    });

    $.get(
        '../controllers/review/show.php?product_id='+product_id,
        function (data) {
            data=$.parseJSON(data);

           // alert(data.length);
            var rev=" ";
            for(var x=0;x<data.length;x++){
                rev+='<div class="user_id"><h4>'+data[x]['first_name']+
                        '</h4><h3>'+data[x]['review']+'</h3></div><br>';


            }
            $("#review_show").html(rev);



        }
    );




});