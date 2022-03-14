$(function() {
    
    var activeLangText =  $('#activeLang').text();
    var order_cancel_title = $('.order_cancel_title');
    var order_payment_title = $('.order_payment_title');
    

        if($('#send_cancel_code_success').val() != ""){
            
            var orderID = $('#send_cancel_code_success').val();
            console
            $('#modal_'+orderID).modal('show');
        }
    
    
    $('.cancelBtn').on('click',function(){
        var getData = $(this).data('order-id-code');
        myArray = getData.split(",");
       
             order_code = myArray[0];
             order_id= myArray[1];

        $('#modal_'+order_id).modal('show');
        
       
    });
    
    $('.CloseBtn').on('click',function(){
        var getData = $(this).data('order-id-code');
        myArray = getData.split(",");
       
             order_code = myArray[0];
             order_id= myArray[1];
        $('#modal_'+order_id).modal('hide');
        
    });
  
    $('.submitCancelBtn').on('click',function(e){
        e.preventDefault();

        var order_id = $(this).data('order-id');
       var text_confirm_value =  $('#text-confirm_'+order_id).val();
       
       var data = {
        _token: $(".idToken").val(),
        'order_id':order_id,
        'text_confirm_value': text_confirm_value,
        };
    
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        }
    })

    $.ajax({
        type: "post",
        url: $('#url').val() + '/user/auth/cancel_contract' ,
        data: data,
        dataType: "json",
        success: function (response) {
           
            $.each(response.errors,function(key,item){
                $('.text-errors').html("");
                $('.text-errors').removeClass('alert alert-warning');
                $('.text-errors').addClass('alert alert-danger');
                $('.text-errors').append('<li>'+item+'</li>');
            });
           
            $('#modal_'+order_id).modal('hide');
            window.location.href = $('#url').val() +"/user/profile/auth/order_history";
            
            
        }

    })
    
});
    

    //CHECK ORDER STATUS
    $("#OrderHistoryList tbody tr").each(function() {
        var order_status = $(this).find("td:nth-child(5)").html(); //get text to check
        var order_payment =  $(this).find("td:nth-child(8)"); //get element
        var order_cancel = $(this).find("td:last-child"); // get element

       if(activeLangText == 'EN'){
            if(order_status == 'checkinfo'){
                //show payment
                order_payment_title.show();
                order_payment.show();
            }else if(order_status == 'deposited'){
                //if deposited => hide payment
                order_payment_title.hide();
                order_payment.hide();
                order_cancel_title.show();
                order_cancel.show();
            }else if(order_status == 'confirm' || order_status == 'released'){
                //if status is confirm or released => hide payment, show cancel button
                order_payment_title.hide();
                order_payment.hide();
                order_cancel_title.show();
                order_cancel.show();
            }
       }else{
           
            order_status = $(this).find("td:nth-child(5)").html(); //get text of order_status
            order_payment =  $(this).find("td:nth-child(8)"); //get element
            order_cancel = $(this).find("td:last-child"); // get element

            if(order_status == "ordered"){
                order_status = $(this).find("td:nth-child(5)").html("Đã Đặt Hàng");
            }
            if(order_status == "checkinfo"){
                order_status = $(this).find("td:nth-child(5)").html("Đã Kiểm Tra Thông Tin");
                 //show payment
                 order_payment_title.show();
                 order_payment.show();
            }
            if(order_status == "deposited"){
                order_status = $(this).find("td:nth-child(5)").html("Đã Đặt Cọc");
                //if deposited => hide payment
                order_payment_title.hide();
                order_payment.hide();
                order_cancel_title.show();
                order_cancel.show();
            }
            if(order_status == "confirm"){
                order_status = $(this).find("td:nth-child(5)").html("Đã Xác Nhận");
                //if status is confirm or released => hide payment, show cancel button
                order_payment_title.hide();
                order_payment.hide();
                order_cancel_title.show();
                order_cancel.show();
            }
            if(order_status == "released"){
                order_status = $(this).find("td:nth-child(5)").html("Đã Xuất Kho");
                order_payment_title.hide();
                order_payment.hide();
                order_cancel_title.show();
                order_cancel.show();
            }
            if(order_status == "checked"){
                order_status = $(this).find("td:nth-child(5)").html("Đã Nhận Đơn");
            }
            if(order_status == "sold"){
                order_status = $(this).find("td:nth-child(5)").html("Đã Giao Xe");
            }
            if(order_status == "canceled"){
                order_status = $(this).find("td:nth-child(5)").html("Đơn Đã Huỷ");
            }
            if(order_status == "custcanceled"){
                order_status = $(this).find("td:nth-child(5)").html("Đang Huỷ Đơn");
            }

          
            
       }
    })

   
  

    //switchLanguage   
       if(activeLangText == 'VN'){
        $('#OrderHistoryList').DataTable({
        
            "language": {
                "lengthMenu": "Hiển thị _MENU_ dòng mỗi trang",
                "zeroRecords": "Không tìm thấy thông tin trùng khớp",
                "info": "Hiển thị _PAGE_ of _PAGES_ bản ghi",
                "infoEmpty": "Không có thông tin nào",
                "infoFiltered": "(lọc từ _MAX_ bản ghi tổng cộng)",
                "search": "Tìm kiếm",
                "paginate": {
                    "next": "Tiếp",
                    'previous':"Trước"
                  }
              
            }
        });
           
       }else{
            $('#OrderHistoryList').DataTable({
            
            });
       }
       
       
     

});