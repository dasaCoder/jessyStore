

$(document).ready(function () {
    //alert("D");
	




    function print_selltbl(data2) {
    stuff=" ";
    for(var x=0;x<data2.length;x++){
        stuff+='<tr> <th scope="row">'+data2[x]['product_title']+' </th><td>'+
            data2[x]['quantity']+'</td> <td>'+data2[x]['ordered_at']+'</td><td>';


        if(data2[x]['is_shipped']==0){
            stuff+='<a href="#" id="'+data2[x]['cart_id']+'" class="ship_btn"><i class="fa fa-ship fa-2x" aria-hidden="true"></i></a>';
        }
        else
            stuff+='<i class="fa fa-check fa-2x" aria-hidden="true"></i>';


        stuff+='</td></tr>';

    }

    $("#tbody_con").html(stuff);
}



    $.get('../controllers/seller/view_cart_by_seller.php?seller_id='+user_id,function (data2) {
        data2=$.parseJSON(data2);
       // console.log(data2);

        print_selltbl(data2);

    });

    $("#tbody_con").on('click','.ship_btn',function () {
        //alert();
        $.get('../controllers/seller/mark_ship_item.php?cart_id='+$(this).attr("id"),
            function () {
                $.get('../controllers/seller/view_cart_by_seller.php?seller_id='+user_id,function (data2) {
                    data2=$.parseJSON(data2);
                    console.log(data2);

                    print_selltbl(data2);




                });
            }
        );

    });

    $.get('../controllers/seller/view_product_by_seller.php?seller_id='+user_id,function (tabledata) {
       data2=$.parseJSON(tabledata);
     //  console.log(data2);
        stuff=" ";
        for(var x=0;x<data2.length;x++){
            stuff+='</a> <tr class="get_row_info" id="'+data2[x]['id']+'"> <th scope="row" >'+data2[x]['product_title']+' </th><td>'+
            data2[x]['description']+'</td> <td>'+data2[x]['price']+'</td><td>';

            stuff+=data2[x]['discount']+'</td><td>'+data2[x]['current_stock']+'</td><td>'+data2[x]['sold']+'</td></tr>';

        }

        $("#tbody_all").html(stuff);


    });

    $("#tbody_all").on('click','.get_row_info',function () {

        var id=$(this).attr("id");
        $.get('../controllers/view_one_product.php?product_id='+id,function (data) {
            //  alert("ddd");

            data=$.parseJSON(data);
           // console.log(data);
            $("#title").html(data['product_title']);
            $("#description").val(data['description']);
            $("#price_det").val(data['price']);
            $("#stock_det").val((data['current_stock']-data['sold']));
            $("#discount_det").val(data['discount']);

            var image=new Image();
            image.src='data:image/jpg;base64,'+data['image'];
            $("#image_det").html(image);








        });

        $("#detailModal").modal('toggle');
    });

    $("#stock_det").click(function () {
        $("#update_stock_btn").css('display','block');
    });




});


