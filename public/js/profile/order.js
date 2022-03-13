$(function(){
    
   
      order_code = $('#order_code').val();
    if($('.success-message').text() != ""){
        window.location.href = $('#url').val() +"/sendmail_ordersuccess/"+ order_code;
        $('#EmailSent').modal('show');
       
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
                    offers_price_nonFormat = carprice_nonFormat * (10 / 100);
                    RegistrationFee_nonFormat = carprice_nonFormat * (5 / 100);
                    //format number
                    var offers_price = new Intl.NumberFormat().format(offers_price_nonFormat);
                    var car_price = new Intl.NumberFormat().format(carprice_nonFormat);     
                    //fill div           
                    $('.carprice').html(car_price + '  '+'VND');
                    $('#offers_span').html('-'+offers_price+ ' ' + 'VND');
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
                            var offers_price_nonFormat = carprice_nonFormat * (10 / 100);
                            var allFees_nonFormat = RegistrationFee_nonFormat + carRoadfee_nonFormat + carCivilfee_nonFormat + carLicensefee_nonFormat + carInspectionfee_nonFormat;
                            var EstimatedCost_nonFormat = carprice_nonFormat + allFees_nonFormat -offers_price_nonFormat;
                            var deposit_nonFormat = EstimatedCost_nonFormat*(1/100);
                            //Format Number
                            var offers_price = new Intl.NumberFormat().format(offers_price_nonFormat);
                             var allFees = new Intl.NumberFormat().format(allFees_nonFormat);
                             var deposit_price = new Intl.NumberFormat().format(deposit_nonFormat);
                            var EstimatedCost = new Intl.NumberFormat().format(EstimatedCost_nonFormat);
                            //fill to div
                            
                            $('#OrderPrice').val(EstimatedCost_nonFormat); //get value to send form
                            $('.deposit').html(deposit_price + '  '+'VND');
                            $('#offers_span').html('-'+offers_price+ ' ' + 'VND');
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
                    var offers_price_nonFormat = carprice_nonFormat * (10 / 100);
                    var allFees_nonFormat = RegistrationFee_nonFormat + carRoadfee_nonFormat + carCivilfee_nonFormat + carLicensefee_nonFormat + carInspectionfee_nonFormat;
                    var EstimatedCost_nonFormat = carprice_nonFormat + allFees_nonFormat -offers_price_nonFormat;
                    deposit_nonFormat = EstimatedCost_nonFormat*(1/100);
                    //Format Number
                    var offers_price = new Intl.NumberFormat().format(offers_price_nonFormat);
                    var allFees = new Intl.NumberFormat().format(allFees_nonFormat);
                    var deposit_price = new Intl.NumberFormat().format(deposit_nonFormat);
                    var EstimatedCost = new Intl.NumberFormat().format(EstimatedCost_nonFormat);
                    $('#OrderPrice').val(EstimatedCost_nonFormat); //get value to send form
                    $('.deposit').html(deposit_price + '  '+'VND');
                    $('#offers_span').html('-'+offers_price+ ' ' + 'VND');
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


    var firstSelection_Model = $('#SelectYourModel').text();    
    var firstSelection_Province = $('#SelectYourProvince').text();    
    var model_id = $('#model_id').val(); 
    var province_matp_cost_estimate = $('#province_matp_cost_estimate').val();
    if(model_id != null || province_matp_cost_estimate != null){
              
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
                    var offers_price_nonFormat = carprice_nonFormat * (10 / 100);
                    RegistrationFee_nonFormat = carprice_nonFormat * (5 / 100);
                    var offers_price_nonFormat = carprice_nonFormat * (10 / 100);
                    var offers_price = new Intl.NumberFormat().format(offers_price_nonFormat);
                    var car_price = new Intl.NumberFormat().format(carprice_nonFormat);                
                    $('.carprice').html(car_price + '  '+'VND');
                });   

                var province_matp = province_matp_cost_estimate;

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
                            var offers_price_nonFormat = carprice_nonFormat * (10 / 100);
                            var allFees_nonFormat = RegistrationFee_nonFormat + carRoadfee_nonFormat + carCivilfee_nonFormat + carLicensefee_nonFormat + carInspectionfee_nonFormat;
                            var EstimatedCost_nonFormat = carprice_nonFormat + allFees_nonFormat - offers_price_nonFormat;
                            deposit_nonFormat = EstimatedCost_nonFormat*(1/100);
                            //Format Number
                            var offers_price = new Intl.NumberFormat().format(offers_price_nonFormat);
                            var allFees = new Intl.NumberFormat().format(allFees_nonFormat);
                            var deposit_price = new Intl.NumberFormat().format(deposit_nonFormat);
                            var EstimatedCost = new Intl.NumberFormat().format(EstimatedCost_nonFormat);
                            $('#OrderPrice').val(EstimatedCost_nonFormat); //get value to send form
                            $('.deposit').html(deposit_price + '  '+'VND');
                            $('#offers_span').html('-'+offers_price+ ' ' + 'VND');
                            $('#ortherFees').html(allFees+ '  '+'VND');
                            $('#CostEstimatedPrice').html(EstimatedCost+ '  '+'VND');
        
        
                        });
                    }
                });
        
            }
        });   




        //get image path
        var CarImagePath = $('#CarImagePath').val();
        //default selection
        firstSelection_Model = $('#SelectYourModel').text();
        firstSelection_Province = $('#SelectYourProVince').text();

        $("div.Model select").val(firstSelection_Model);
        $("div.Province select").val(firstSelection_Province);
        //select model by id 
         $("div.Model select").val(model_id);
          //select province by id 
          $("div.Province select").val(province_matp_cost_estimate);
         //show car image by id
         $('#showImageCar').attr("src", '/storage/files/Image_Car/'+CarImagePath+'');
   
    }else{
        firstSelection_Model = $('#SelectYourModel').text();
        $("div.Model select").val(firstSelection);
        $("div.Province select").val(firstSelection_Province);
        $('#showImageCar').attr("src", '/storage/files/Image_Car/logoVinfast.png');
    }

   

})