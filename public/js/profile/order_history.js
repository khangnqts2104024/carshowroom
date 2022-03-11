$(function() {
    
    var activeLangText =  $('#activeLang').text();
    var order_cancel_title = $('.order_cancel_title');
    var order_payment_title = $('.order_payment_title');
    
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
           
       }
    
       //function change language
   function changeLang(locale){
       window.setTimeout(function() {
           window.location.href = $('#url').val() + "/lang/"+locale;
       }, 400);
   }


   
    $("input[name=text-confirm]")[0].oninvalid = function () {
        if(activeLangText =='VN'){
            this.setCustomValidity("Vui lòng nhập đúng định dạng được yêu cầu 'Cancel'");
            
           
        }else{
            this.setCustomValidity("Please enter the correct format required 'Cancel'");
            his.setCustomValidity("");
        }
    };

});