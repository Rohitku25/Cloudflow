$(document).ready(function(){
    $("#email").on('change',function(){
        if($(this).val()!=''){
            $.ajax({
                type:'POST',
                url:'php/check_user.php',
                data:{
                    username:btoa($(this).val()),
                },
                beforeSend:function(){
                    $('.email-loder').removeClass('d-none');
                },
                success:function(e){
                    if(e.trim()=='0'){
                        $('.email-loder').removeClass('fa fa-circle-o-notch fa-spin');
                        $('.email-loder').addClass('fa fa-times-circle text-warning');
                        $('.submit-btn').addAttr('disabled');
                    }
                    else{
                        $('.email-loder').removeClass('fa fa-circle-o-notch fa-spin');
                        $('.email-loder').addClass('fa fa-check-circle text-success');
                        $('.submit-btn').removeAttr('disabled');
                    }
                }
            });
        }
    })
});