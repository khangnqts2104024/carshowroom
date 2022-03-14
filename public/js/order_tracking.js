$(function () {
    
    //Prevent Enter submit
    $('#formCancel').on('keydown', function (event) {
        if (event.key === 'Enter') {
            event.preventDefault();
            return false;
        }
    });
    //Enter Order Code And Search
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
                        if(activeLangText == 'VN'){
                            var orderDetail_title = "Chi Tiết Đơn Hàng";
                            var modelName_title = "Dòng Xe";
                            var listedPrice_title = "Giá Niêm Yết";
                            var otherFees_title = "Phí Khác";
                            var offer_title = "Ưu Đãi";
                            var quantity_title = "Số Lượng";
                         }
                        var x = 1;
                        var order_price = new Intl.NumberFormat().format(item.order_price);
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
                            order_price +
                            " VNĐ</td>\
                    <td>" +
                            item.order_status +
                            "</td>\
                    <td>" +
                            item.fullname +
                    "</td>\
                            <td>"+item.model_name +
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
                                            <h5 class="modal-title">'+orderDetail_title+'</h5>\
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
                                                            <li>'+modelName_title+'</li>\
                                                            <li style="list-style-type: none;">\
                                                               ' +
                            item.model_name +
                            " - " +
                            item.color +
                            '</li>\
                                                        </ul>\
                                                        <ul class="d-flex flex-row justify-content-between">\
                                                            <li>'+listedPrice_title+'</li>\
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
                            '">'+otherFees_title+':</a>\
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
                                                            <li>'+offer_title+':</li>\
                                                            <li style="list-style-type: none;"> -\
                                                                    ' +
                            item.price * (10 / 100) +
                            ';\
                                                                VNĐ\
                                                            </li>\
                                                        </ul>\
                                                        <ul class="d-flex flex-row justify-content-between">\
                                                            <li>'+quantity_title+':</li>\
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
                                    <a href="http://127.0.0.1:8000/user/momo_payment/'+ item.order_id + '/' + (item.order_price * (1 / 100)) + '">\
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
                        checkStatus();

                        $("#showDetailBtn_" + item.order_code).on(
                            "click",
                            function () {
                                $("#modal_" + item.order_code).modal("show");
                            }
                        );

                        $('.cancelBtn').on('click', function () {
                            $("#cancelModal").modal("show");
                            $('#send_email').on('click', function (e) {
                                e.preventDefault();

                            })
                            $('#send_email').on('click', function () {
                                window.location.href = $('#url').val() + "/send_cancel_code/" + item.order_code;
                            })
                        })
                    });
                } else {
                    if (activeLangText == "VN") {
                        $("#show_order_tracking").html("Không Tìm Thấy");
                    } else {
                        $("#show_order_tracking").html("No Info Found");
                    }
                }
            },
        });
    });


    var order_code = $('#order_code_mail_success').val();
    var order_id = $('#order_id_mail_success').val();
    //trigger event, show modal again, submit form auto when email sent
    if ($('#order_code_mail_success').val() != null) {
        $('#order_code_input').val(order_code);
        $('#searchOrderBtn').trigger('click');
        $("#cancelModal").modal("show");
    }

    //Click Submit Cancel Btn
    $('.submitCancelBtn').on('click', function (e) {
        e.preventDefault();
        var text_confirm_value = $('#text-confirm').val();
        var data = {
            _token: $(".idToken").val(),
            'order_id': order_id,
            'input': text_confirm_value,
        };
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            }
        })

        $.ajax({
            type: "post",
            url: $('#url').val() + '/user/auth/cancel_contract',
            data: data,
            dataType: "json",
            success: function (response) {

                if (response.status == 400) {
                    $.each(response.errors, function (key, item) {
                        $('.text-errors').html("");
                        $('.text-errors').removeClass('alert alert-warning');
                        $('.text-errors').addClass('alert alert-danger');
                        $('.text-errors').append('<li>' + item + '</li>');
                    });
                } else if (response.status == 404) {
                    $('.text-errors').html("");
                    $('.text-errors').removeClass('alert alert-warning');
                    $('.text-errors').addClass('alert alert-danger');
                    $('.text-errors').append('<li>' + response.message + '</li>');

                } else {
                    var $this = $(this);
                    var loadingText = '<i class="fa fa-circle-o-notch fa-spin"></i> sending...';
                    if ($(this).html() !== loadingText) {
                        $this.data('original-text', $(this).html());
                        $this.html(loadingText);
                    }
                    setTimeout(function () {
                        $this.html($this.data('original-text'));
                    }, 3000);

                    $('#cancelModal').modal('hide');
                    $('#order_code_input').val(order_code);
                    $('#searchOrderBtn').trigger('click');
                }
            }
        })
    });
    //loading btn
    $('#send_email').on('click', function () {
        var $this = $(this);
        var loadingText = '<i class="fa fa-circle-o-notch fa-spin"></i> sending...';
        if ($(this).html() !== loadingText) {
            $this.data('original-text', $(this).html());
            $this.html(loadingText);
        }
        setTimeout(function () {
            $this.html($this.data('original-text'));
        }, 8000);
    });

    //check status and change language
    function checkStatus() {
        $("#OrderHistoryList tbody tr").each(function() {
            var order_status = $(this).find("td:nth-child(5)").html(); //get text to check
            var order_payment =  $(this).find("td:nth-child(9)"); //get element
            var order_cancel = $(this).find("td:nth-child(10)"); // get element
            console.log(order_cancel);
           
    
        if(activeLangText === 'EN'){
                
            if(order_status == 'ordered'){
                //show payment
                order_payment.html('Waiting for information check');  
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
                order_status = $(this).find("td:nth-child(5)").html("Đã Đặt Hàng");
                order_payment.html('Chờ Kiểm Tra Thông Tin');
                // order_cancel.html('Không');
            }else if(order_status == 'checked'){
                order_status = $(this).find("td:nth-child(5)").html("Đã Nhận Đơn");
                order_payment.html('Chờ Kiểm Tra Thông Tin');
               
            }else if(order_status == 'checkinfo'){
                order_status = $(this).find("td:nth-child(5)").html("Đã Kiểm Tra Thông Tin");
                // order_cancel.html('None');
            }else if(order_status == 'deposited'){
                order_status = $(this).find("td:nth-child(5)").html("Đã Đặt Cọc");
                order_payment.html('Đã Đặt Cọc');
                
            }else if(order_status == 'canceled'){
                order_status = $(this).find("td:nth-child(5)").html("Đã Huỷ Đơn");
                order_payment.html('Đã Huỷ');
                order_cancel.html('Đã Huỷ');
    
            }else if(order_status == 'custcanceled'){
                order_status = $(this).find("td:nth-child(5)").html("Đã Huỷ Đơn");
                order_payment.html('Đã Huỷ');
                order_cancel.html('Đã Huỷ');
    
            }else if(order_status == 'confirm' ){
                order_status = $(this).find("td:nth-child(5)").html("Xác Nhận Lấy Xe ");
                order_payment.html('Đã Đặt Cọc');
                
    
            }else if(order_status == 'released'){
                order_status = $(this).find("td:nth-child(5)").html("Xe Đã Rời Kho");
                order_payment.html('Đã Đặt Cọc');
    
            }else if(order_status == 'sold'){
                order_status = $(this).find("td:nth-child(5)").html("Đã Giao Xe");
                order_payment.html('Đã Thanh Toán');
                order_cancel.html('Không');
            }
    
        }
    });
    }

    //switchLanguage
    var activeLangText = $("#activeLang").text();
});
