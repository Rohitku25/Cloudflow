$(document).ready(function(){
    $('.submit-btn').click(function(e){
        e.preventDefault();
        $.ajax({
            type:'POST',
            url:'php/signup.php',
            data:{
                fullname:btoa($('#fname').val()),
                username:btoa($('#email').val()),
                password:btoa($('#pass').val()),
            },
            beforeSend:function(){
                $('.submit-btn').html('Proccessing please wait...');
                $('.submit-btn').attr('disabled','disabled');
            },
            success:function(e){
                if(e.trim()=="success"){
                    $("#signup_form").fadeOut(500,function(){
                        $(".activator").removeClass('d-none');
                        // $(".activate-btn").click(function(){
                        //     alert();
                        // });
                    });
                }
                else{
                    var message=document.createElement("DIV");
                    message.className="alert alert-warning";
                    message.innerHTML="Something went wrong";
                    $(".sign_up_error").append(message);
                    $('.submit-btn').html('Register now');
                    $("form").trigger("reset");
                    $(".email-loder").addClass('d-none');
                    setTimeout(function(){
                        $(".sign_up_error").html('');
                    },2000);
                }
            }
        });
    });
});