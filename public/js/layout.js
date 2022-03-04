$(function(){
    fetchInfo_Layout();
    fetchInfo_Layout_auth();
    
    var activeLangText =  $('#activeLang').text();

        $('#language-toggle').on('click',function(){
            if(activeLangText == 'VN'){
                changeLang('en');
            }else{
                changeLang('vi');
            }
        });  

        function changeLang(locale){
            window.setTimeout(function() {
                window.location.href = $('#url').val() + "/lang/"+locale;
            }, 400);
        }

        function fetchInfo_Layout(){
            var data = {
                _token: $(".idToken").val(),
                };
            
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                }
            })
      
            $.ajax({
               type: "GET",
               url: $('#url').val() + "/user/fetchInfo_Layout",
               data:data,
               dataType: "json",
               success: function (response) {
                  $.each(response.models_Layout_Page,function(key,item){
                    var carprice_nonFormat = item.price;
                    var car_price = new Intl.NumberFormat().format(carprice_nonFormat);
                    if(activeLangText == 'VN'){
                        $('.menu-show-car').append('\
                             <div class="col">\
                            <img src="/storage/files/Image_Car/'+item.image+'" alt="">\
                             <div class="item-name">'+item.model_name+ '</div>\
                            <div class="item-price"> từ ' + car_price + ' vnđ</div>\
                                <a class="view-detail-a" href="/user/order/'+item.model_id+'">Đặt Xe Ngay</a>\
                            </div>\
                     ');
                    }else{
                        $('.menu-show-car').append('\
                        <div class="col">\
                       <img src="/storage/files/Image_Car/'+item.image+'" alt="">\
                       <div class="item-name">'+item.model_name+ '</div>\
                       <div class="item-price"> from ' + car_price + ' vnđ</div>\
                       <a class="view-detail-a" href="/user/order/'+item.model_id+'">Order Car Now</a>\
                       </div>\
                        ');
                    }
                    
                    })
      
               }
            });
         }

         function fetchInfo_Layout_auth(){
            var data = {
                _token: $(".idToken").val(),
                };
            
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                }
            })
      
            $.ajax({
               type: "GET",
               url: $('#url').val() + "/user/auth/fetchInfo_Layout_auth",
               data:data,
               dataType: "json",
               success: function (response) {
                  $.each(response.models_Layout_Page,function(key,item){
                    var carprice_nonFormat = item.price;
                    var car_price = new Intl.NumberFormat().format(carprice_nonFormat);
                    if(activeLangText == 'VN'){
                        $('.menu-show-car').append('\
                             <div class="col">\
                            <img src="/storage/files/Image_Car/'+item.image+'" alt="">\
                             <div class="item-name">'+item.model_name+ '</div>\
                            <div class="item-price"> từ ' + car_price + ' vnđ</div>\
                                <a class="view-detail-a" href="/user/auth/order/'+item.model_id+'">Đặt Xe Ngay</a>\
                            </div>\
                     ');
                    }else{
                        $('.menu-show-car').append('\
                        <div class="col">\
                       <img src="/storage/files/Image_Car/'+item.image+'" alt="">\
                       <div class="item-name">'+item.model_name+ '</div>\
                       <div class="item-price"> from ' + car_price + ' vnđ</div>\
                       <a class="view-detail-a" href="/user/auth/order/'+item.model_id+'">Order Car Now</a>\
                       </div>\
                        ');
                    }
                    
                    })
      
               }
            });
         }
    
  
});