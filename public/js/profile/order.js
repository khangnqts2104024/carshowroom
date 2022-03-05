$(function(){

    //Get URL to detect guest or customer
    var url_Get_ModelInFo = $('.url_Get_ModelInFo').val();
    var url_Get_ShowRoom =  $('.url_Get_ShowRoom').val();
    var url_Get_ShowRoomAddress =  $('.url_Get_ShowRoomAddress').val();
    
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
            url: $('#url').val() +url_Get_ModelInFo ,
            data: data,
            dataType: "json",
            success: function (response) {
                console.log(response);
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
            url: $('#url').val() + url_Get_ShowRoom ,
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
            url: $('#url').val() + url_Get_ShowRoomAddress ,
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
    var model_id = $('#model_id').val(); 
    if(model_id != ""){
              
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
            url: $('#url').val() + url_Get_ModelInFo ,
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
                    
                });   
            }
        });   
        //get image path
        var CarImagePath = $('#CarImagePath').val();
        //default selection
        firstSelection = $('#SelectYourModel').text();
        $("div.Model select").val(firstSelection);
        //select model by id 
         $("div.Model select").val(model_id);
         //show car image by id
         $('#showImageCar').attr("src", '/storage/files/Image_Car/'+CarImagePath+'');
   
    }else{
        firstSelection = $('#SelectYourModel').text();
        $("div.Model select").val(firstSelection);
        $('#showImageCar').attr("src", '/storage/files/Image_Car/logoVinfast.png');
    }
    

})