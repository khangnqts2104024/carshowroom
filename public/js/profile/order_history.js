$(function() {

  

    $(window).on('keydown',function(event){
        if(event.key === 'Enter') {
          event.preventDefault();
          return false;
        }
      });
      
      


      
    
    var activeLangText =  $('#activeLang').text();
    var order_cancel_title = $('.order_cancel_title');
    var order_payment_title = $('.order_payment_title');
    
    

        $('.modal_cancel').on('hidden.bs.modal', function (e) {
        
                
        })
        

      
    $('.cancelBtn').on('click',function(){
        
        var getData = $(this).data('order-id-code');
        myArray = getData.split(",");
       
         var order_code = myArray[0];
         var order_id= myArray[1];

        $('#modal_'+order_id).modal('show');
        $('#send_email_'+order_id).on('click',function(e){
            
            var order_code_sendmail = $('.order_code').val();
           
            var $this = $(this);
            var loadingText = '<i class="fa fa-circle-o-notch fa-spin"></i> sending...';
    
          if ($(this).html() !== loadingText) {
              $this.data('original-text', $(this).html());
              $this.html(loadingText);
          }
          setTimeout(function(){
              $this.html($this.data('original-text'));
          }, 9000);

          var data = {
            _token: $(".idToken").val(),
            'order_code':order_code_sendmail,
            };

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                }
            })
            $.ajax({
                type: "post",
                url: $('#url').val() + '/send_cancel_code/'+order_code_sendmail ,
                data: data,
                dataType: "json",
                success: function (response) {
                   console.log(response);
                }
        
            })
        });


        $('#formcancel_'+order_id).on('submit',function(e){
            e.preventDefault();
            console.log(order_id);
           var text_confirm_value =  $('#text-confirm_'+order_id).val();
           console.log(text_confirm_value);
           var data = {
            _token: $(".idToken").val(),
            'order_id':order_id,
            'input': text_confirm_value,
            };
        
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            }
        })
    
        $.ajax({
            type: "post",
            url: $('#url').val() + '/user/cancel_contract' ,
            data: data,
            dataType: "json",
            success: function (response) {
                   if(response.status == 400){
                        $.each(response.errors,function(key,item){
                            $('.text-errors').html("");
                            $('.text-errors').removeClass('alert alert-warning');
                            $('.text-errors').addClass('alert alert-danger');
                            $('.text-errors').text(item);
                           
                        });
                    }else if(response.status == 404){
                        $('.text-errors').html("");
                        $('.text-errors').removeClass('alert alert-warning');
                        $('.text-errors').addClass('alert alert-danger');
                        $('.text-errors').text(response.message);
                        
                    
                    }else{
                        
                        $('#modal_'+order_id).modal('hide');
                        $('.text-errors').html("");
                        window.location.href = $('#url').val() +"/user/profile/auth/order_history";
                    
                   }

                  
                
                
            }
    
        })
        
        });
        
       
    });

    
    $('.CloseBtn').on('click',function(){
        var getData = $(this).data('order-id-code');
        myArray = getData.split(",");
       
             order_code = myArray[0];
             order_id= myArray[1];
            //  $(this).find('#formcancel_'+order_id)[0].reset();
        $('#modal_'+order_id).modal('hide');
        
        $('#modal_'+order_id).on('hidden.bs.modal', function () {
           
        
        });
        
        
        // formcancel_{{ $order_info->order_id }}
    });  

   
  

    //CHECK ORDER STATUS
    $("#OrderHistoryList tbody tr").each(function() {
        var order_status = $(this).find("td:nth-child(4)").html(); //get text to check
        var order_payment =  $(this).find("td:nth-child(7)"); //get element
        var order_cancel = $(this).find("td:nth-child(8)"); // get element
      
       

    if(activeLangText == 'EN'){
            
        if(order_status == 'ordered'){
            //show payment
            order_payment.html('Waiting for information check');  
            order_cancel.html('None');
        }else if(order_status == 'checked'){
            order_payment.html('Waiting for information check');     
        }else if(order_status == 'checkinfo'){      
        }else if(order_status == 'deposited'){
            order_payment.html('Canceled');
            order_payment.html('Deposited');
        }else if(order_status == 'canceled'){
            order_payment.html('Canceled');
            order_cancel.html('Canceled');
        }else if(order_status == 'custcanceled'){
            order_payment.html('Canceled');
            order_cancel.html('Canceled');
        }else if(order_status == 'confirm' || order_status == 'released'){
            order_payment.html('Deposited');
        }else if(order_status == 'sold'){
            order_payment.html('Paid');
            order_cancel.html('None');
        }
    }else{
        if(order_status == 'ordered'){
            //show payment
            order_status = $(this).find("td:nth-child(4)").html("Đã Đặt Hàng");
            order_payment.html('Chờ Kiểm Tra Thông Tin');
            order_cancel.html('Không');
            // order_cancel.html('Không');
        }else if(order_status == 'checked'){
            order_status = $(this).find("td:nth-child(4)").html("Đã Nhận Đơn");
            order_payment.html('Chờ Kiểm Tra Thông Tin');
           
        }else if(order_status == 'checkinfo'){
            order_status = $(this).find("td:nth-child(4)").html("Đã Kiểm Tra Thông Tin");
            // order_cancel.html('None');
        }else if(order_status == 'deposited'){
            order_status = $(this).find("td:nth-child(4)").html("Đã Đặt Cọc");
            order_payment.html('Đã Đặt Cọc');
            
        }else if(order_status == 'canceled'){
            order_status = $(this).find("td:nth-child(4)").html("Đã Huỷ Đơn");
            order_payment.html('Đã Huỷ');
            order_cancel.html('Đã Huỷ');

        }else if(order_status == 'custcanceled'){
            order_status = $(this).find("td:nth-child(4)").html("Đã Huỷ Đơn");
            order_payment.html('Đã Huỷ');
            order_cancel.html('Đã Huỷ');

        }else if(order_status == 'confirm' ){
            order_status = $(this).find("td:nth-child(4)").html("Xác Nhận Lấy Xe ");
            order_payment.html('Đã Đặt Cọc');
            

        }else if(order_status == 'released'){
            order_status = $(this).find("td:nth-child(4)").html("Xe Đã Rời Kho");
            order_payment.html('Đã Đặt Cọc');

        }else if(order_status == 'sold'){
            order_status = $(this).find("td:nth-child(4)").html("Đã Giao Xe");
            order_payment.html('Đã Thanh Toán');
            order_cancel.html('Không');
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