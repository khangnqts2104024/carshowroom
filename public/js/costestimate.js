$(function () {
    var url_Get_ModelInFo = $('.url_Get_ModelInFo').val();
    var url_Get_Fees = $('.url_Get_Fees').val();

    $('#models').on('change', function () {

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
            url: $('#url').val() + url_Get_ModelInFo,
            data: data,
            dataType: "json",
            async: false,
            success: function (response) {

                $.each(response.model, function (key, item) {
                    //get number non format
                    carprice_nonFormat = item.price;
                    RegistrationFee_nonFormat = carprice_nonFormat * (5 / 100);
                    //Format Number
                    car_price = new Intl.NumberFormat().format(carprice_nonFormat);
                    RegistrationFee = new Intl.NumberFormat().format(RegistrationFee_nonFormat);
                    //fill to div
                    $('#carPrice').html(car_price + ' ' + '₫');
                    $('.carRegistration-fee').html(RegistrationFee + ' ' + '₫');
                    var pathAvatar = item.image;
                    $('#showImageCar').attr("src", '/storage/files/Image_Car/' + pathAvatar + '');
                });
                //if #models change -> call ajax provinces to update price.
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
                            var allFees = RegistrationFee_nonFormat + carRoadfee_nonFormat + carCivilfee_nonFormat + carLicensefee_nonFormat + carInspectionfee_nonFormat;
                            var EstimatedCost_nonFormat = carprice_nonFormat + allFees;
                            //Format Number
                            var carRoadfee = new Intl.NumberFormat().format(carRoadfee_nonFormat);
                            var carCivilfee = new Intl.NumberFormat().format(carCivilfee_nonFormat);
                            var carLicensefee = new Intl.NumberFormat().format(carLicensefee_nonFormat);
                            var carInspectionfee = new Intl.NumberFormat().format(carInspectionfee_nonFormat);
                            var EstimatedCost = new Intl.NumberFormat().format(EstimatedCost_nonFormat);
                            //fill to div
                            $('.carRoad-fee').html(carRoadfee + ' ' + '₫');
                            $('.carCivil-fee').html(carCivilfee + ' ' + '₫');
                            $('.carLicense-fee').html(carLicensefee + ' ' + '₫');
                            $('.carInspection-fee').html(carInspectionfee + ' ' + '₫');
                            $('#carCostEstimate').html(EstimatedCost + ' ' + '₫');
                            $('#allFees').val(allFees);
                            $('#costEstimated').val(EstimatedCost_nonFormat);
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
                    var allFees = RegistrationFee_nonFormat + carRoadfee_nonFormat + carCivilfee_nonFormat + carLicensefee_nonFormat + carInspectionfee_nonFormat;
                    var EstimatedCost_nonFormat = carprice_nonFormat + allFees;
                    //Format Number
                    var carRoadfee = new Intl.NumberFormat().format(carRoadfee_nonFormat);
                    var carCivilfee = new Intl.NumberFormat().format(carCivilfee_nonFormat);
                    var carLicensefee = new Intl.NumberFormat().format(carLicensefee_nonFormat);
                    var carInspectionfee = new Intl.NumberFormat().format(carInspectionfee_nonFormat);
                    var EstimatedCost = new Intl.NumberFormat().format(EstimatedCost_nonFormat);
                    //fill to div
                    $('.carRoad-fee').html(carRoadfee + ' ' + '₫');
                    $('.carCivil-fee').html(carCivilfee + ' ' + '₫');
                    $('.carLicense-fee').html(carLicensefee + ' ' + '₫');
                    $('.carInspection-fee').html(carInspectionfee + ' ' + '₫');
                    $('#carCostEstimate').html(EstimatedCost + ' ' + '₫');
                    $('#allFees').val(allFees);
                    $('#costEstimated').val(EstimatedCost_nonFormat);


                });
            }
        });
    });


});