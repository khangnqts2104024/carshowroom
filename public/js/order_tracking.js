$(function () {
   
    $("#order_code_input").on("keyup", function (e) {
        $('#show_order_tracking').html("");
        e.preventDefault();
        var order_code_input = $('#order_code_input').val();
       
        console.log(order_code_input);
        var data = {
            _token: $(".idToken").val(),
            'order_code_input': order_code_input,
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
                console.log(response);
                if(response.order_infos != ""){
                   
                $.each(response.order_infos, function (key, item) {
                    
                    var x =1;
                    $('#show_order_tracking').append('<tr>\
                    <td>'+ x++ +'</td>\
                    <td>'+item.order_code+'</td>\
                    <td>'+item.order_date+'</td>\
                    <td>'+item.order_price+'</td>\
                    <td>'+item.order_status+'</td>\
                    <td>'+item.fullname+'</td>\
                    <td><button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="">\
                        Launch\
                      </button></td>\
                    </tr>');
                });
             }else{
                $('#show_order_tracking').html('No info found');
             }

            },
        });
    });

    //switchLanguage
    var activeLangText = $("#activeLang").text();

    if (activeLangText == "VN") {
        $("#OrderHistoryList").DataTable({
            language: {
                lengthMenu: "Hiển thị _MENU_ dòng mỗi trang",
                zeroRecords: "Không tìm thấy thông tin trùng khớp",
                info: "Hiển thị _PAGE_ of _PAGES_ bản ghi",
                infoEmpty: "No records available",
                infoFiltered: "(filtered from _MAX_ total records)",
                search: "Tìm kiếm",
                paginate: {
                    next: "Tiếp",
                    previous: "Trước",
                },
            },
        });
    }
    function changeLang(locale) {
        window.setTimeout(function () {
            window.location.href = $("#url").val() + "/lang/" + locale;
        }, 400);
    }
});
