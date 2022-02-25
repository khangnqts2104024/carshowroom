$(function() {
   fetchInfo();

   //SHOW MODAL

   $('.showFullNameModalButton').on('click',function(){
      $('#editFullName').modal("show");
   })

   $('.showAddressModalButton').on('click',function(){
      $('#editAddress').modal("show");
   })
   $('.showPhoneModalButton').on('click',function(){
      $('#editPhoneNumber').modal("show");
   })
   $('.showEmailModalButton').on('click',function(){
      $('#editEmail').modal("show");
   })
   $('.showCitizenModalButton').on('click',function(){
      $('#editCitizenID').modal("show");
   })
   $('.XCloseModal').on('click',function(){
      $('.modal').modal("hide");
   })

   // AJAX EDIT FULLNAME

   $('#updateAddressBtn').on('click', function(e){
     
     e.preventDefault();
     var customer_id = $('.customer_id').val(); //in settings view
   
      var data = {
         _token: $(".idToken").val(),
         'customer_id': customer_id,
         'address': $('#addressEdit').val(),
      };
     
      $.ajaxSetup({
         headers: {
             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
         }
     })
    
      $.ajax({
         type: "post",
         url: $('#url').val() + "/user/profile/editaddress" ,
         data: data,
         dataType: "json",
         success: function (response) {
            $('#editAddress').modal("hide");
            //reset field
            $('#editAddress').find('input').val("");
            fetchInfo();
         }
      })
      
   });

      // AJAX EDIT ADDRESS

      $('#updateFullnameBtn').on('click', function(e){
     
         e.preventDefault();
         var customer_id = $('.customer_id').val(); //in settings view
       
          var data = {
             _token: $(".idToken").val(),
             'customer_id': customer_id,
             'fullname': $('#fullnameEdit').val(),
          };
         
          $.ajaxSetup({
             headers: {
                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
             }
         })
        
          $.ajax({
             type: "post",
             url: $('#url').val() + "/user/profile/editfullname" ,
             data: data,
             dataType: "json",
             success: function (response) {
               
                $('#editFullName').modal("hide");
                //reset field
                $('#editFullName').find('input').val("");
                fetchInfo();
             }
          })
          
       });

         // AJAX EDIT PhoneNumber

      $('#updatePhoneBtn').on('click', function(e){
     
         e.preventDefault();
         var customer_id = $('.customer_id').val(); //in settings view
       
          var data = {
             _token: $(".idToken").val(),
             'customer_id': customer_id,
             'phone_number': $('#phoneNumberEdit').val(),
          };
         
          $.ajaxSetup({
             headers: {
                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
             }
         })
        
          $.ajax({
             type: "post",
             url: $('#url').val() + "/user/profile/editphone" ,
             data: data,
             dataType: "json",
             success: function (response) {
                $('#editPhoneNumber').modal("hide");
                //reset field
                $('#editPhoneNumber').find('input').val("");
                fetchInfo();
             }
          })
          
       });

        // AJAX EDIT Email

      $('#updateEmailBtn').on('click', function(e){
     
         e.preventDefault();
         var customer_id = $('.customer_id').val(); //in settings view
       
          var data = {
             _token: $(".idToken").val(),
             'customer_id': customer_id,
             'email': $('#emailEdit').val(),
             'password':$('#currentPassWord').val(),
          };
         
          $.ajaxSetup({
             headers: {
                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
             }
         })
        
          $.ajax({
             type: "post",
             url: $('#url').val() + "/user/profile/editEmail" ,
             data: data,
             dataType: "json",
             success: function (response) {
               console.log(response);
                $('#editEmail').modal("hide");
                //reset field
                $('#editEmail').find('input').val("");
                fetchInfo();
             }
          })
          
       });

        // AJAX EDIT Citizen ID

      $('#updateCitizenIDBtn').on('click', function(e){
     
         e.preventDefault();
         var customer_id = $('.customer_id').val(); //in settings view
       
          var data = {
             _token: $(".idToken").val(),
             'customer_id': customer_id,
             'citizen_id': $('#citizen_id').val(),
             
          };
         
          $.ajaxSetup({
             headers: {
                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
             }
         })
        
          $.ajax({
             type: "post",
             url: $('#url').val() + "/user/profile/editCitizenID" ,
             data: data,
             dataType: "json",
             success: function (response) {
               console.log(response);
                $('#editCitizenID').modal("hide");
                //reset field
                $('#editCitizenID').find('input').val("");
                fetchInfo();
             }
          })
          
       });

   // AJAX FETCH DATA 

   function fetchInfo(){
      
      $.ajax({
         type: "GET",
         url: $('#url').val() + "/user/profile/fetch-data",
         
         dataType: "json",
         success: function (response) {
            $.each(response.users,function(key,item){
             
               // response.users = null;
               $('.customer_id').val(item.customer_id);
               $('#showFullName').text(item.fullname);
               $('#showAddress').text(item.address);
               $('#showPhone').text(item.phone_number);
               $('#showEmail').text(item.email);
               $('#showCitizenID').text(item.citizen_id);
               $('#fullnameUserLayout').text(item.fullname);
               
              if(!jQuery.isEmptyObject(response.users)){
                  $('.showcontent').show();  
              }
            })

         }
      });
   }
   
   
 });