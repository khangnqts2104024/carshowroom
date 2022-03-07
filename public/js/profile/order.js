$(function(){
     var order_code = $('#order_code').val();
    if($('.success-message').text() != ""){
        $('#EmailSent').modal('show');
        window.setTimeout(function() {
            window.location.href = $('#url').val() +"/sendmail_ordersuccess/"+ order_code;
        }, 5000);
        
    }
    $('.XCloseBtn').on('click',function(){
        $('#EmailSent').modal('hide');
    });
    $('.cancelBtn').on('click',function(){
        $('#EmailSent').modal('hide');
    });

    //Get URL to detect guest or customer
    var url_Get_ModelInFo = $('.url_Get_ModelInFo').val();
    var url_Get_ShowRoom =  $('.url_Get_ShowRoom').val();
    var url_Get_ShowRoomAddress =  $('.url_Get_ShowRoomAddress').val();
    var url_Get_Fees = $('.url_Get_Fees').val();
    
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
               
                $.each(response.model,function(key,item){
                    $('.carname').text(item.model_name);
                    carprice_nonFormat = item.price;
                    RegistrationFee_nonFormat = carprice_nonFormat * (5 / 100);
                    var car_price = new Intl.NumberFormat().format(carprice_nonFormat);                
                    $('.carprice').html(car_price + '  '+'VND');
                    var pathAvatar = item.image;
                    $('#showImageCar').attr("src", '/storage/files/Image_Car/'+pathAvatar+'');

                });   
                //Call All Fees Ajax 
                var province_matp = $('#provinces').val();

                var data = {
                    _token: $(".idToken").val(),
                    'province_matp': province_matp,
                };
        
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    }
                })
                $.ajax({
                    type: "post",
                    url: $('#url').val() + url_Get_Fees,
                    data: data,
                    dataType: "json",
                    async: false,
                    success: function (response) {
        
                        $.each(response.fees, function (key, item) {
                            
                            //get number non format
                            var carRoadfee_nonFormat = item.Roadusagefee;
                            var carCivilfee_nonFormat = item.Civilliabilityinsurance;
                            var carLicensefee_nonFormat = item.Licenseplatefee;
                            var carInspectionfee_nonFormat = item.Inspectionfee;
                            var allFees_nonFormat = RegistrationFee_nonFormat + carRoadfee_nonFormat + carCivilfee_nonFormat + carLicensefee_nonFormat + carInspectionfee_nonFormat;
                            var EstimatedCost_nonFormat = carprice_nonFormat + allFees_nonFormat;
                            var deposit_nonFormat = EstimatedCost_nonFormat*(5/100);
                            //Format Number
                             var allFees = new Intl.NumberFormat().format(allFees_nonFormat);
                             var deposit_price = new Intl.NumberFormat().format(deposit_nonFormat);
                            var EstimatedCost = new Intl.NumberFormat().format(EstimatedCost_nonFormat);
                            //fill to div
                            
                            $('#OrderPrice').val(EstimatedCost_nonFormat); //get value to send form
                            $('.deposit').html(deposit_price + '  '+'VND');
                            $('#ortherFees').html(allFees + '  '+'VND');
                            $('#CostEstimatedPrice').html(EstimatedCost + '  '+'VND');
        
        
                        });
                    }
                });
            }
            });   
    });

    $('#provinces').on('change', function () {

        var province_matp = $(this).val();

        var data = {
            _token: $(".idToken").val(),
            'province_matp': province_matp,
        };

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            }
        })

        $.ajax({
            type: "post",
            url: $('#url').val() + url_Get_Fees,
            data: data,
            dataType: "json",
            async: false,
            success: function (response) {

                $.each(response.fees, function (key, item) {
                    

                    //get number non format
                    var carRoadfee_nonFormat = item.Roadusagefee;
                    var carCivilfee_nonFormat = item.Civilliabilityinsurance;
                    var carLicensefee_nonFormat = item.Licenseplatefee;
                    var carInspectionfee_nonFormat = item.Inspectionfee;
                    var allFees_nonFormat = RegistrationFee_nonFormat + carRoadfee_nonFormat + carCivilfee_nonFormat + carLicensefee_nonFormat + carInspectionfee_nonFormat;
                    var EstimatedCost_nonFormat = carprice_nonFormat + allFees_nonFormat;
                    deposit_nonFormat = EstimatedCost_nonFormat*(5/100);
                    //Format Number
                    var allFees = new Intl.NumberFormat().format(allFees_nonFormat);
                    var deposit_price = new Intl.NumberFormat().format(deposit_nonFormat);
                    var EstimatedCost = new Intl.NumberFormat().format(EstimatedCost_nonFormat);
                    $('#OrderPrice').val(EstimatedCost_nonFormat); //get value to send form
                    $('.deposit').html(deposit_price + '  '+'VND');
                    $('#ortherFees').html(allFees+ '  '+'VND');
                    $('#CostEstimatedPrice').html(EstimatedCost+ '  '+'VND');


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
                    carprice_nonFormat = item.price;
                    RegistrationFee_nonFormat = carprice_nonFormat * (5 / 100);
                    var car_price = new Intl.NumberFormat().format(carprice_nonFormat);                
                    $('.carprice').html(car_price + '  '+'VND');
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