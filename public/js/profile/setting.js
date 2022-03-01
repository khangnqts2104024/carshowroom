$(function() {
   fetchInfo();

   //SHOW MODAL
   $('.showUploadImgModal').on('click',function(){
      $('#editAvatar').appendTo("body").modal('show');
   })
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

   

   // AJAX EDIT FullNAME

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
               if(response.status == 400){
                  $.each(response.errors,function(key,err_values){
                     $('#saveForm_errList_fullname').html();
                     $('#saveForm_errList_fullname').addClass('alert alert-danger');
                     $('#saveForm_errList_fullname').append('<li>'+err_values+'</li>')
                  });
               }else{
                  $('#saveForm_errList_fullname').html("");
                  $('.success_messages').html("");
                  $('.success_messages').addClass('alert alert-success'); 
                  $('.success_messages').text(response.messages);

                  $.each(response.errors,function(key,err_values){
                     $('.model1').text(response.messages);
                  });
                  
                  // var message_en = "Fullname Updated Successfully";
                  // var message_vi = "Họ và tên đã được cập nhật thành công";
                  $('#editFullName').modal("hide");
                  //reset field
                  $('#editFullName').find('input').val("");
                  $('.success_messages').fadeIn();
                  $('.success_messages').delay(700).fadeOut(800);
                  fetchInfo();
                  
                  
               }
               
             }
          })
          
       });

   // AJAX EDIT ADDRESS

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
               if(response.status == 400){
                  $.each(response.errors,function(key,err_values){
                     $('#saveForm_errList_address').html();
                     $('#saveForm_errList_address').addClass('alert alert-danger');
                     $('#saveForm_errList_address').append('<li>'+err_values+'</li>')
                  });
               }else{
                  $('#saveForm_errList_address').html("");
                  $('.success_messages').html(""); 
                  $('.success_messages').addClass('alert alert-success'); 
                  $('.success_messages').text(response.messages); 
                  
                  // var message_en = "Fullname Updated Successfully";
                  // var message_vi = "Họ và tên đã được cập nhật thành công";
                  $('#editAddress').modal("hide");
                  //reset field
                  $('#editAddress').find('input').val("");
                  $('.success_messages').fadeIn();
                  $('.success_messages').delay(700).fadeOut(800);
                  fetchInfo();
                  
               }




             
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
               if(response.status == 400){
                  $.each(response.errors,function(key,err_values){
                     $('#saveForm_errList_phoneNumber').html();
                     $('#saveForm_errList_phoneNumber').addClass('alert alert-danger');
                     $('#saveForm_errList_phoneNumber').append('<li>'+err_values+'</li>')
                  });
               }else{
                  $('#saveForm_errList_phoneNumber').html("");
                  $('.success_messages').html(""); 
                  $('.success_messages').addClass('alert alert-success'); 
                  $('.success_messages').text(response.messages); 
                  $('#editPhoneNumber').modal("hide");
                //reset field
                $('#editPhoneNumber').find('input').val("");
                $('.success_messages').fadeIn();
                  $('.success_messages').delay(700).fadeOut(800);
                fetchInfo();
               }



               
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
               if(response.status == 400){
                  $.each(response.errors,function(key,err_values){
                     $('#saveForm_errList_email').html();
                     $('#saveForm_errList_email').addClass('alert alert-danger');
                     $('#saveForm_errList_email').append('<li>'+err_values+'</li>')
                  });
               }else{
                  $('#saveForm_errList_email').html("");
                  $('.success_messages').html(""); 
                  $('.success_messages').addClass('alert alert-success'); 
                  $('.success_messages').text(response.messages); 
                  $('#editEmail').modal("hide");
                  //reset field
                  $('#editEmail').find('input').val("");
                  $('.success_messages').fadeIn();
                  $('.success_messages').delay(700).fadeOut(800);
                  fetchInfo();
               }

                
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
                  if(response.status == 400){
                  $.each(response.errors,function(key,err_values){
                     $('#saveForm_errList_citizenID').html();
                     $('#saveForm_errList_citizenID').addClass('alert alert-danger');
                     $('#saveForm_errList_citizenID').append('<li>'+err_values+'</li>')
                  });
               }else{
                  $('#saveForm_errList_citizenID').html("");
                  $('.success_messages').html(""); 
                  $('.success_messages').addClass('alert alert-success'); 
                  $('.success_messages').text(response.messages); 
                  $('#editCitizenID').modal("hide");
                  //reset field
                  $('#editCitizenID').find('input').val("");
                  $('.success_messages').fadeIn();
                  $('.success_messages').delay(700).fadeOut(800);
                  fetchInfo();
               }

              
               
             }
          })
          
       });
       
      // AJAX EDIT AVATAR
      $('#formEditAvatar').on('submit',function(e){
         e.preventDefault();
         var form = this;

         $.ajaxSetup({
                   headers: {
                       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                   }
               })
              
                $.ajax({
                   type: "post",
                   url: $('#url').val() + "/user/profile/editAvatar" ,
                   data: new FormData(form),
                   processData:false,
                   dataType: "json",
                   contentType:false,
   
                   success: function (response) {
                     if(response.status == 400){
                        
                        $.each(response.errors,function(key,err_values){
                           $('#editAvatar').modal("show");
                           $('#saveForm_errList_avatar').html();
                           $('#saveForm_errList_avatar').addClass('alert alert-danger');
                           $('#saveForm_errList_avatar').append('<li>'+err_values+'</li>')
                        });
                     }else{
                        $('#saveForm_errList_avatar').html("");
                        $('.success_messages').html(""); 
                        $('.success_messages').addClass('alert alert-success'); 
                        $('.success_messages').text(response.messages); 
                        $('#editAvatar').find('input').val("");
                        $('#saveForm_errList_avatar').hide();
                        $('#editAvatar').modal("hide");
                        $('.success_messages').fadeIn();
                  $('.success_messages').delay(700).fadeOut(800);
                          fetchInfo();
                     }  
                   }
                });

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
               $('.customer_id').val(item.customer_id); //fill customer_id
               $('#fullnameIDforAva').val(item.fullname);
               $('#showFullName').text(item.fullname);
               $('#showAddress').text(item.address);
               $('#showPhone').text(item.phone_number);
               $('#showEmail').text(item.email);
               $('#showCitizenID').text(item.citizen_id);
               $('#fullnameUserLayout').text(item.fullname);
               $('#fullnameEdit').val(item.fullname);
               var pathAvatar = item.avatar;
               $('#showAvatarUser').attr("src", '/storage/files/Avatar_User/'+pathAvatar+'');
              
               
              if(!jQuery.isEmptyObject(response.users)){
                  $('.showcontent').show();  
              }
            })

         }
      });
   }

   //switchLanguage
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
   
 });

 