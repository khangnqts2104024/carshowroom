$(function(){
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