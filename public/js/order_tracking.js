$(function () {
    $('#formCancel').on('keydown',function(event){
        if(event.key === 'Enter') {
          event.preventDefault();
          return false;
        }
      });
    $("#searchOrderBtn").on("click", function (e) {
        $("#show_order_tracking").html("");
        e.preventDefault();
        var order_code_input = $("#order_code_input").val();
        var data = {
            _token: $(".idToken").val(),
            order_code_input: order_code_input,
        };

        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });

        $.ajax({
            type: "post",
            url: $("#url").val() + "/user/getOrderCode",
            data: data,
            dataType: "json",
            success: function (response) {
                
                if (response.order_infos != "") {
                    $.each(response.order_infos, function (key, item) {
                        var x = 1;
                        var deposit;
                        $("#show_order_tracking").append(
                            "<tr>\
                    <td>" +
                            x++ +
                            "</td>\
                    <td>" +
                            item.order_code +
                            "</td>\
                    <td>" +
                            item.order_date +
                            "</td>\
                    <td>" +
                            item.order_price +
                            "</td>\
                    <td>" +
                            item.order_status +
                            "</td>\
                    <td>" +
                            item.fullname +
                            '</td>\
                    <td>\
                    <button type="button" id="showDetailBtn_' +
                            item.order_code +
                            '" class="btn btn-primary btn-sm">\
                        Show\
                      </button>\
                        <div class="modal fade" id="modal_' +
                            item.order_code +
                            '" tabindex="-1" role="dialog"\
                                aria-labelledby="modelTitleId" aria-hidden="true">\
                                <div class="modal-dialog modal-lg" role="document">\
                                    <div class="modal-content">\
                                        <div class="modal-header">\
                                            <h5 class="modal-title">ORDER DETAIL</h5>\
                                            <button type="button" class="close" data-dismiss="modal"\
                                                aria-label="Close">\
                                                <span aria-hidden="true">&times;</span>\
                                            </button>\
                                        </div>\
                                        <div class="modal-body">\
                                            <div class="container-fluid">\
                                                <div class="row d-flex flex-row">\
                                                    <div class="col-md-6">\
                                                        <img width="100%" height="auto"\
                                                            src="/storage/files/Image_Car/' +
                            item.image +
                            '" alt="">\
                                                    </div>\
                                                    <div class="col-md-6 d-flex flex-column">\
                                                        <ul class="d-flex flex-row justify-content-between">\
                                                            <li>MODEL NAME:</li>\
                                                            <li style="list-style-type: none;">\
                                                               ' +
                            item.model_name +
                            " - " +
                            item.color +
                            '</li>\
                                                        </ul>\
                                                        <ul class="d-flex flex-row justify-content-between">\
                                                            <li>LISTED PRICE:</li>\
                                                            <li style="list-style-type: none;">\
                                                            ' +
                            item.price +
                            '\
                                                                VNĐ\
                                                            </li>\
                                                        </ul>\
                                                        <ul class="d-flex flex-row justify-content-between">\
                                                            <li><a\
                                                                    href="/user/auth/CostEstimate/' +
                            item.model_id +
                            "/" +
                            item.matp +
                            '">ORTHER FEE:</a>\
                                                            </li>\
                                                            <li style="list-style-type: none;"> +\
                                                                    ' +
                            (item.order_price -
                                item.price +
                                item.price * (10 / 100)) +
                            ' VND\
                                                            </li>\
                                                        </ul>\
                                                        <ul class="d-flex flex-row justify-content-between">\
                                                            <li>OFFER:</li>\
                                                            <li style="list-style-type: none;"> -\
                                                                    ' +
                            item.price * (10 / 100) +
                            ';\
                                                                VNĐ\
                                                            </li>\
                                                        </ul>\
                                                        <ul class="d-flex flex-row justify-content-between">\
                                                            <li>Quantity:</li>\
                                                            <li style="list-style-type: none;">1</li>\
                                                        </ul>\
                                                    </div>\
                                                </div>\
                                            </div>\
                                        </div>\
                                        <div class="modal-footer">\
                                            <button type="button" class="btn btn-secondary"\
                                                data-dismiss="modal">Close</button>\
                                        </div>\
                                    </div>\
                                </div>\
                            </div>\
                        </td>\
                        \
                        <td class="text-center" class="order_payment">\
                                    <a href="http://127.0.0.1:8000/user/momo_payment/'+item.order_id+'/'+(item.order_price * (1/100))+'">\
                                    <button class="btn btn-info btn-sm">Momo</button>\
                                    </a>\
                         </td>\
                         <td class="text-center" class="order_cancel">\
                                    <!-- Button trigger modal -->\
                                    <button type="button" class="btn btn-danger btn-sm cancelBtn"\>\
                                        Cancel\
                                    </button>\
                                    \
                        </td>\
                    </tr>'
                        );
                        

                        $("#showDetailBtn_" + item.order_code).on(
                            "click",
                            function () {
                                $("#modal_" + item.order_code).modal("show");
                            }
                        );

                        var order_id_form_cancel = $('#order_id_form_cancel').val(item.order_id);
                        var order_code_form_cancel = $('#order_code_form_cancel').val(item.order_code);

                        $('.cancelBtn').on('click',function(){
                            $("#cancelModal").modal("show");
                            $('#send_email').on('click',function(e){
                                e.preventDefault();
                                
                            })
                            $('#send_email').on('click',function(){
                                window.location.href = $('#url').val() + "/send_cancel_code/"+item.order_code;
                            })
                            
                            
                        })
                        
                    });
                } else {
                    $("#show_order_tracking").html("No info found");
                }
            },
        });
    });


   
    
    var order_code = $('#order_code_mail_success').val();
    var order_id = $('#order_id_mail_success').val();
    console.log(order_id);
    
    if($('#order_code_mail_success').val() != null){
        
        $('#order_code_input').val(order_code);
        $('#searchOrderBtn').trigger('click');
        $("#cancelModal").modal("show");

    }
   

    $('.submitCancelBtn').on('click',function(e){
        e.preventDefault();
       var text_confirm_value =  $('#text-confirm').val();
       
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
        url: $('#url').val() + '/user/auth/cancel_contract' ,
        data: data,
        dataType: "json",
        success: function (response) {

            if(response.status == 400){
                $.each(response.errors,function(key,item){
                    $('.text-errors').html("");
                    $('.text-errors').removeClass('alert alert-warning');
                    $('.text-errors').addClass('alert alert-danger');
                    $('.text-errors').append('<li>'+item+'</li>');
                });
            }else if(response.status == 404){
                $('.text-errors').html("");
                $('.text-errors').removeClass('alert alert-warning');
                $('.text-errors').addClass('alert alert-danger');
                $('.text-errors').append('<li>'+response.message+'</li>');
            
            }else{
                $('#cancelModal').modal('hide');
                $('#order_code_input').val(order_code);
                $('#searchOrderBtn').trigger('click');
                
            
           }
           
           
        
            
        }

    })
    
});

   

    //switchLanguage
    var activeLangText = $("#activeLang").text();
});
