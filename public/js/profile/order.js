$(function(){
    

  
    $('#models').on('change',function(){
        
        var model_id = $(this).val();       
        var data = {
            _token: $(".idToken").val(),
            'model_id': model_id,
            };
        
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            }
        })

        $.ajax({
            type: "post",
            url: $('#url').val() + "/user/getModelInfo" ,
            data: data,
            dataType: "json",
            success: function (response) {
                $.each(response.model,function(key,item){
                    $('.carname').text(item.model_name);
                    var carprice_nonFormat = item.price;
                    var deposit_nonFormat = carprice_nonFormat*(20/100);
                    var car_price = new Intl.NumberFormat().format(carprice_nonFormat);
                    var deposit_price = new Intl.NumberFormat().format(deposit_nonFormat);
                    $('.carprice').text(car_price + '  '+'VND');
                    $('.deposit').text(deposit_price + '  '+'VND');
                    $('.subtotal').text(car_price+ '  '+'VND');
                    $('#subtotal_price').val(carprice_nonFormat);
                    var pathAvatar = item.image;
                    $('#showImageCar').attr("src", '/storage/files/Image_Car/'+pathAvatar+'');
                    
           
              
                });   
            }
            });   
    });

    $('#warehouses').on('change',function(){
        $('#showrooms').html("");
        $('#showroomAddressText').html("");
        var region_id = $(this).val();       
        var data = {
            _token: $(".idToken").val(),
            'region_id': region_id,
            };
        
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            }
        })

        $.ajax({
            type: "post",
            url: $('#url').val() + "/user/getShowRoom" ,
            data: data,
            dataType: "json",
            success: function (response) {
                $('#showrooms').append('<option value="">Select Show Room</option>');
                $.each(response.showrooms,function(key,item){
                    
                    $('#showrooms').append(
                        '<option value="'+item.id+'">'+item.showroom_name+'</option>'
                        
                    );

                });
                
                
            }
            });   
    });



   
    $('#showrooms').on('change',function(){
        // $('#showroomAddressText').html("");
        var showroom_id = $(this).val();
        var data = {
            _token: $(".idToken").val(),
            'showroom_id': showroom_id,
            };
        
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            }
        })

        $.ajax({
            type: "post",
            url: $('#url').val() + "/user/getShowRoomAddress" ,
            data: data,
            dataType: "json",
            success: function (response) {
                
                $.each(response.showrooms_address,function(key,item){
                    $('#showroomAddressText').html(item.address);
                });
                    
            }
            });
            
    });




    



    var firstSelection = $('#SelectYourModel').text();    
    var carID = $('#carID').val(); 
    if(carID != ""){
        var CarImagePath = $('#CarImagePath').val();
        firstSelection = $('#SelectYourModel').text();
        $("div.Model select").val(firstSelection);
         $("div.Model select").val(carID);
         $('#showImageCar').attr("src", '/storage/files/Image_Car/'+CarImagePath+'');
        
         $('.carname').text(123);
        carprice_nonFormat = 456;
        deposit_nonFormat = carprice_nonFormat*(20/100);
        car_price = new Intl.NumberFormat().format(carprice_nonFormat);
        deposit_price = new Intl.NumberFormat().format(deposit_nonFormat);
        $('.carprice').text(car_price + '  '+'VND');
        $('.deposit').text(deposit_price + '  '+'VND');
        $('.subtotal').text(car_price+ '  '+'VND');
    }else{
        firstSelection = $('#SelectYourModel').text();
        $("div.Model select").val(firstSelection);
        $('#showImageCar').attr("src", '/storage/files/Image_Car/logoVinfast.png');
    
    }
    

})