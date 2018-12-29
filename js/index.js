$(document).ready(function () {
    //alert('dd');
    $.get('../controllers/view_all_product.php',function (data1) {
        var data=$.parseJSON(data1);
         //alert(data);
        stuff="";
        for(var y=0;y<data.length;y++){
            stuff+='<div id="product_div" class="tab1"> <div class="col-md-3 product-men"> <div class="men-pro-item simpleCart_shelfItem">';
            stuff+='<div class="men-thumb-item"> <img src="data:image/png;base64, '+ data[y]['image']+'" alt="" class="pro-image-front img-responsive"> <img src="data:image/png;base64, '+ data[y]['image']+'" alt="" class="img-responsive pro-image-back">';
            stuff+='<div class="men-cart-pro"> <div class="inner-men-cart-pro">';
            stuff+='  <a href="single.php?product_id='+data[y]['product_id'] +'" class="link-product-add-cart">Quick View</a>';
            stuff+=' </div></div><span class="product-new-top">New</span></div><div class="item-info-product ">';
            stuff+='<h4><a href="single.php">'+data[y]['product_title']+'</a></h4><div class="info-product-price">' ;
            stuff+=' <span class="item_price"> rs '+data[y]['price']*95/100 +' </span><del> rs '+data[y]['price']+'</del></div>';
            stuff+=' <div id="add_to_cart" class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out button2">';

            stuff+='<form class="form_add_to_cart" method="post"><input type="hidden" name="user_id" value='+ user_id+'> ';
            stuff+='<input type="hidden" name="product_id" value='+data[y]['product_id']+'>';
            stuff+='<input type="hidden" name="quantity" value="1">';
            stuff+='<input type="submit"  value="Add to cart" class="button" /></form>';
            stuff+=' </div></div> </div></div>';

        }
        $("#product_div").append(stuff);

    });

    $("#product_div").on('submit','.form_add_to_cart',function (e) {
        e.preventDefault();
       // alert(user_id);

        if(user_id!=0){
            $.ajax({
            url:'../controllers/add_to_cart.php',
            type:'POST',
            data:$(this).serialize(),
            success:function () {
                  alert("added");

            }

        });}
        else{

            alert("please sign in for buy");
        }

    });

})