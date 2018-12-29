$(document).ready(function () {


    $("#form_search").submit(function (e) {
        e.preventDefault();
        //alert("stop");
        $.ajax({
            url:'../controllers/search.php',
            type:'POST',
            data:$(this).serialize(),
            success:function (data) {
                data=$.parseJSON(data);
                //console.log(is_array(data) );
                var stuff=" ";
                for(var x=0;x<data.length;x++){
                    stuff+='<div  class="pmd-card pmd-card-media-inline pmd-card-default pmd-z-depth"><div class="pmd-card-media"> <div class="media-body">'+

                       '<h2 class="pmd-card-title-text">'+data[x]['title']+'</h2><span class="pmd-card-subtitle-text">'+data[x]['description']+
                   ' </span> </div> <div class="media-right media-middle"><a href="javascript:void(0);">'+
                            '<img width="112" height="112" src="data:image/jpg;base64, '+data[x]['image']+'"></a></div></div><div class="pmd-card-actions">' +
                            ' <button  class="btn pmd-btn-flat pmd-ripple-effect btn-default" type="button">View</button> </div></div>';


                }

                $("#search_result_div").html(stuff);

            }
        });
    });

    $("#search").keyup(function () {
        if($(this).val()!=""){



        $.get('../controllers/search.php?word=' + $(this).val(), function (data) {
            data = $.parseJSON(data);
            //console.log(is_array(data) );
            var stuff = " ";
            for (var x = 0; x < data.length; x++) {
                stuff += '<div  class="pmd-card pmd-card-media-inline pmd-card-default pmd-z-depth"><div class="pmd-card-media"> <div class="media-body">' +

                    '<h2 class="pmd-card-title-text">' + data[x]['title'] + '</h2><span class="pmd-card-subtitle-text">' + data[x]['description'] +
                    ' </span> </div> <div class="media-right media-middle"><a href="javascript:void(0);">' +
                    '<img width="112" height="112" src="data:image/jpg;base64, ' + data[x]['image'] + '"></a></div></div><a class="pmd-card-actions">' +
                    '<a href="single.php?product_id='+data[x]['id']+'"> <button  class="btn pmd-btn-flat pmd-ripple-effect btn-default" type="button">View</button></a> </div></div>';


            }

            $("#search_result_div").html(stuff);
        });
        }else {
            var stuff=""
            $("#search_result_div").html(stuff);

        };
    });


});