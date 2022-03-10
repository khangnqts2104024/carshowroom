$(function() {

    var a = $('.order_price').text();
    
     $('.order_status');
     $('.order_payment');
     $('.order_cancel');

    var order_cancel_title = $('.order_cancel_title');
    var order_payment_title = $('.order_payment_title');

    $(".item-info .order_status").each(function() {
        var value = $(this).text();
        console.log(value);
      })
//    console.log(order_status.text());
    
    
    
    

    //switchLanguage
   var activeLangText =  $('#activeLang').text();

   
       if(activeLangText == 'VN'){
        $('#OrderHistoryList').DataTable({
        
            "language": {
                "lengthMenu": "Hiển thị _MENU_ dòng mỗi trang",
                "zeroRecords": "Không tìm thấy thông tin trùng khớp",
                "info": "Hiển thị _PAGE_ of _PAGES_ bản ghi",
                "infoEmpty": "No records available",
                "infoFiltered": "(filtered from _MAX_ total records)",
                "search": "Tìm kiếm",
                "paginate": {
                    "next": "Tiếp",
                    'previous':"Trước"
                  }
              
            }
        });
           
       }else{
           changeLang('vi');
       }
    

   function changeLang(locale){
       window.setTimeout(function() {
           window.location.href = $('#url').val() + "/lang/"+locale;
       }, 400);
   }
});