

// function add_compare(id){
//     var id_product = $('#view_model_id').val();

    
//     if(id_product != undefined){
//         var name = document.getElementById('view_model_type+'+id_product).val();
//         var seats = document.getElementById('view_seats+'+id_product).val();
//         var exhaust_pipe = document.getElementById('view_exhaust_pipe+'+id_product).val();
//         var size = document.getElementById('view_size+'+id_product).val();
//         var weight = document.getElementById('view_weight+'+id_product).val();
//         var engine = document.getElementById('view_engine+'+id_product).val();
//         var watage = document.getElementById('view_watage+'+id_product).val();
//         var engine_shutdown_function = document.getElementById('view_engine_shutdown_function+'+id_product).val();
//         var car_gearbox = document.getElementById('view_car_gearbox+'+id_product).val();
//         var Fuel_Consumption = document.getElementById('view_Fuel_Consumption+'+id_product).val();
//         var lamp = document.getElementById('view_lamp+'+id_product).val();
//         var automatic_lights = document.getElementById('view_automatic_lights+'+id_product).val();
//         var aluminum_alloy_lazang = document.getElementById('view_aluminum_alloy_lazang+'+id_product).val();
//         var central_screen = document.getElementById('view_central_screen+'+id_product).val();
//         var air_conditioning = document.getElementById('view_air_conditioning+'+id_product).val();
//         var front_wheel_brake = document.getElementById('view_front_wheel_brake+'+id_product).val();
//         var rear_wheel_brake = document.getElementById('view_rear_wheel_brake+'+id_product).val();
       
//         var newCar = {
//             'name' : name,
//             'seats':seats,
//             'exhaust_pipe':exhaust_pipe,
//             'size':size,
//             'weight':weight,
//             'engine':engine,
//             'watage':watage,
//             'engine_shutdown_function':engine_shutdown_function,
//             'car_gearbox':car_gearbox,
//             'Fuel_Consumption':Fuel_Consumption,
//             'lamp':lamp,
//             'automatic_lights':automatic_lights,
//             'aluminum_alloy_lazang':aluminum_alloy_lazang,
//             'central_screen':central_screen,
//             'air_conditioning':air_conditioning,
//             'front_wheel_brake':front_wheel_brake,
//             'rear_wheel_brake':rear_wheel_brake
//         }
//         if(localStorage.getItem('compare') == null){
//             localStorage.setItem('compare','[]');
//         }

//         var itemCompare = JSON.parse(localStorage.getItem(compare));
//         itemCompare.push(newCar);
//         $('#dimension').find('.test1').append(newCar.size);
//     }
// }

// $(function(){
//     $('vehicle-picker-1').on('click',function(){
//         $('modal_compare1').modal("show");
//     })

//     $('#view_model_id').on('click', function(e){
//         e.preventDefault();
//         var modelID = $('')
//     })
// })