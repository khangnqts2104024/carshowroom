$(function () {
    var url_Get_ModelInFo = $(".url_Get_ModelInFo").val();
    var url_Get_Fees = $(".url_Get_Fees").val();

    $("#models").on("change", function () {
        var model_id = $(this).val();
        $('#link-view-details').attr('href','/user/modeldetails/'+model_id);
        var data = {
            _token: $(".idToken").val(),
            'model_id': model_id,
        };

        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });

        $.ajax({
            type: "post",
            url: $("#url").val() + url_Get_ModelInFo,
            data: data,
            dataType: "json",
            async: false,
            success: function (response) {
                $.each(response.model, function (key, item) {
                    //get number non format
                    carprice_nonFormat = item.price;
                    RegistrationFee_nonFormat = carprice_nonFormat * (5 / 100);
                    offers_price_nonFormat = carprice_nonFormat * (10 / 100);
                    //Format Number
                    car_price = new Intl.NumberFormat().format(
                        carprice_nonFormat
                    );
                    offers_price = new Intl.NumberFormat().format(
                        offers_price_nonFormat
                    );
                    RegistrationFee = new Intl.NumberFormat().format(
                        RegistrationFee_nonFormat
                    );
                    //fill to div
                    $("#carPrice").html(car_price + " " + "₫");
                    $(".carRegistration-fee").html(RegistrationFee + " " + "₫");
                    $("#offers_span").html("-" + offers_price + " " + "₫");
                    var pathAvatar = item.image;
                    $("#showImageCar").attr(
                        "src",
                        "/storage/files/Image_Car/" + pathAvatar + ""
                    );
                    console.log('change');
                });
                //if #models change -> call ajax provinces to update price.
                var province_matp = $("#provinces").val();

                var data = {
                    _token: $(".idToken").val(),
                    province_matp: province_matp,
                };

                $.ajaxSetup({
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                            "content"
                        ),
                    },
                });

                $.ajax({
                    type: "post",
                    url: $("#url").val() + url_Get_Fees,
                    data: data,
                    dataType: "json",
                    async: false,
                    success: function (response) {
                        $.each(response.fees, function (key, item) {
                            //get number non format
                            var carRoadfee_nonFormat = item.Roadusagefee;
                            var carCivilfee_nonFormat =
                                item.Civilliabilityinsurance;
                            var carLicensefee_nonFormat = item.Licenseplatefee;
                            var carInspectionfee_nonFormat = item.Inspectionfee;
                            var allFees =
                                RegistrationFee_nonFormat +
                                carRoadfee_nonFormat +
                                carCivilfee_nonFormat +
                                carLicensefee_nonFormat +
                                carInspectionfee_nonFormat;
                            var EstimatedCost_nonFormat =
                                carprice_nonFormat +
                                allFees -
                                offers_price_nonFormat;

                            //Format Number
                            var carRoadfee = new Intl.NumberFormat().format(
                                carRoadfee_nonFormat
                            );
                            var carCivilfee = new Intl.NumberFormat().format(
                                carCivilfee_nonFormat
                            );
                            var carLicensefee = new Intl.NumberFormat().format(
                                carLicensefee_nonFormat
                            );
                            var carInspectionfee =
                                new Intl.NumberFormat().format(
                                    carInspectionfee_nonFormat
                                );
                            var EstimatedCost = new Intl.NumberFormat().format(
                                EstimatedCost_nonFormat
                            );
                            //fill to div
                            $(".carRoad-fee").html(carRoadfee + " " + "₫");
                            $(".carCivil-fee").html(carCivilfee + " " + "₫");
                            $(".carLicense-fee").html(
                                carLicensefee + " " + "₫"
                            );
                            $(".carInspection-fee").html(
                                carInspectionfee + " " + "₫"
                            );
                            $("#carCostEstimate").html(
                                EstimatedCost + " " + "₫"
                            );
                            $("#allFees").val(allFees);
                            $("#costEstimated").val(EstimatedCost_nonFormat);
                            
                        });
                    },
                });
            },
        });
    });

    $("#provinces").on("change", function () {
        var province_matp = $(this).val();

        var data = {
            _token: $(".idToken").val(),
            'province_matp': province_matp,
        };

        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });

        $.ajax({
            type: "post",
            url: $("#url").val() + url_Get_Fees,
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
                    var allFees =
                        RegistrationFee_nonFormat +
                        carRoadfee_nonFormat +
                        carCivilfee_nonFormat +
                        carLicensefee_nonFormat +
                        carInspectionfee_nonFormat;
                    var EstimatedCost_nonFormat =
                        carprice_nonFormat + allFees - offers_price_nonFormat;
                    //Format Number
                    var carRoadfee = new Intl.NumberFormat().format(
                        carRoadfee_nonFormat
                    );
                    var carCivilfee = new Intl.NumberFormat().format(
                        carCivilfee_nonFormat
                    );
                    var carLicensefee = new Intl.NumberFormat().format(
                        carLicensefee_nonFormat
                    );
                    var carInspectionfee = new Intl.NumberFormat().format(
                        carInspectionfee_nonFormat
                    );
                    var EstimatedCost = new Intl.NumberFormat().format(
                        EstimatedCost_nonFormat
                    );
                    //fill to div
                    $(".carRoad-fee").html(carRoadfee + " " + "₫");
                    $(".carCivil-fee").html(carCivilfee + " " + "₫");
                    $(".carLicense-fee").html(carLicensefee + " " + "₫");
                    $(".carInspection-fee").html(carInspectionfee + " " + "₫");
                    $("#carCostEstimate").html(EstimatedCost + " " + "₫");
                    $("#allFees").val(allFees);
                    $("#costEstimated").val(EstimatedCost_nonFormat);
                });
            },
        });
    });

    var firstSelection_Model = $('#SelectYourModel').text();   
    var firstSelection_Province = $('#SelectYourProVince').text();    
    var model_id_from_url = $("#model_id_from_url").val();
    var matp_from_url = $("#matp_from_url").val();
    if (model_id_from_url != null && matp_from_url != null) {
        
        var data = {
            _token: $(".idToken").val(),
            'model_id': model_id_from_url,
        };

        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });

        $.ajax({
            type: "post",
            url: $("#url").val() + url_Get_ModelInFo,
            data: data,
            dataType: "json",
            async: false,
            success: function (response) {
                $.each(response.model, function (key, item) {
                    //get number non format
                    carprice_nonFormat = item.price;
                    RegistrationFee_nonFormat = carprice_nonFormat * (5 / 100);
                    offers_price_nonFormat = carprice_nonFormat * (10 / 100);
                    //Format Number
                    car_price = new Intl.NumberFormat().format(
                        carprice_nonFormat
                    );
                    offers_price = new Intl.NumberFormat().format(
                        offers_price_nonFormat
                    );
                    RegistrationFee = new Intl.NumberFormat().format(
                        RegistrationFee_nonFormat
                    );
                    //fill to div
                    $("#carPrice").html(car_price + " " + "₫");
                    $(".carRegistration-fee").html(RegistrationFee + " " + "₫");
                    $("#offers_span").html("-" + offers_price + " " + "₫");
                    var pathAvatar = item.image;
                    $("#showImageCar").attr(
                        "src",
                        "/storage/files/Image_Car/" + pathAvatar + ""
                    );
                    console.log(456);
                });

                //if #models change -> call ajax provinces to update price.
                
                var data = {
                    _token: $(".idToken").val(),
                    'province_matp': matp_from_url,
                };

                $.ajaxSetup({
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                            "content"
                        ),
                    },
                });

                $.ajax({
                    type: "post",
                    url: $("#url").val() + url_Get_Fees,
                    data: data,
                    dataType: "json",
                    async: false,
                    success: function (response) {
                        $.each(response.fees, function (key, item) {
                            //get number non format
                            var carRoadfee_nonFormat = item.Roadusagefee;
                            var carCivilfee_nonFormat =
                                item.Civilliabilityinsurance;
                            var carLicensefee_nonFormat = item.Licenseplatefee;
                            var carInspectionfee_nonFormat = item.Inspectionfee;
                            var allFees =
                                RegistrationFee_nonFormat +
                                carRoadfee_nonFormat +
                                carCivilfee_nonFormat +
                                carLicensefee_nonFormat +
                                carInspectionfee_nonFormat;
                            var EstimatedCost_nonFormat =
                                carprice_nonFormat +
                                allFees -
                                offers_price_nonFormat;

                            //Format Number
                            var carRoadfee = new Intl.NumberFormat().format(
                                carRoadfee_nonFormat
                            );
                            var carCivilfee = new Intl.NumberFormat().format(
                                carCivilfee_nonFormat
                            );
                            var carLicensefee = new Intl.NumberFormat().format(
                                carLicensefee_nonFormat
                            );
                            var carInspectionfee =
                                new Intl.NumberFormat().format(
                                    carInspectionfee_nonFormat
                                );
                            var EstimatedCost = new Intl.NumberFormat().format(
                                EstimatedCost_nonFormat
                            );
                            //fill to div
                            $(".carRoad-fee").html(carRoadfee + " " + "₫");
                            $(".carCivil-fee").html(carCivilfee + " " + "₫");
                            $(".carLicense-fee").html(
                                carLicensefee + " " + "₫"
                            );
                            $(".carInspection-fee").html(
                                carInspectionfee + " " + "₫"
                            );
                            $("#carCostEstimate").html(
                                EstimatedCost + " " + "₫"
                            );
                            $("#allFees").val(allFees);
                            $("#costEstimated").val(EstimatedCost_nonFormat);
                        });
                    },
                });
            },
        });

        //get image path
        var CarImagePath = $("#CarImagePath").val();
        //default selection
        firstSelection_Model = $("#SelectYourModel").text();
       
        firstSelection_Province = $("#SelectYourProVince").text();
        

        $("div.Model select").val(firstSelection_Model);
        $("div.Province select").val(firstSelection_Province);
        //select model by id
        $("div.Model select").val(model_id_from_url);
        //select province by id
        $("div.Province select").val(matp_from_url);
        //show car image by id
        $("#showImageCar").attr(
            "src",
            "/storage/files/Image_Car/" + CarImagePath + ""
        );
        
    }
    
    // $("#showImageCar").attr(
    //     "src",
    //     "/storage/files/Image_Car/logoVinfast.png"
    // );
       
       
       
});
