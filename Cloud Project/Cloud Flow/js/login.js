$(document).ready(function(){
    $('.login-submit-btn').click(function(e){
        e.preventDefault();
        var email=btoa($('#login-email').val());
        var pass=btoa($('#login-pass').val());
        $.ajax({
            type:"POST",
            url:"php/login.php",
            data:{
                email:email,
                password:pass
            },
            beforeSend:function(){
                $('.login-submit-btn').html('Processing please wait...');
                $('.login-submit-btn').attr('disabled','disabled');
            },
            success:function(e){
                //login success
                if(e.trim()=="Login success"){
                    window.location="profile/profiles.php";
                }

                // login pending
                else if(e.trim()=="login pending"){
                    $("#login_form").fadeOut(500,function(){
                        $('.login-activator').removeClass('d-none');
                        $('.login-activate-btn').click(function(){
                            $.ajax({
                                type:"POST",
                                url:"php/activate_code.php",
                                data:{
                                    code:btoa($('#login-code').val()),
                                    email:btoa($('#login-email').val())
                                },
                                beforeSend:function(){
                                    $('.login-activate-btn').html('please wait...');
                                    $('.login-activate-btn').attr('disabled','disabled');
                                },
                                success:function(e){
                                    if(e.trim()=="User verified"){
                                        window.location="profile/profiles.php";
                                    }
                                    else{
                                        $('.login-activate-btn').html("Activate now");
                                        $('.login-activate-btn').removeAttr("disabled");
                                        $("#login-code").val("");
                                        var notice=document.createElement("DIV");
                                        notice.className="alert alert-warning";
                                        notice.innerHTML="<b>Wrong activation code</b>";
                                        $(".login-notice").append(notice);
                                        setTimeout(function(){
                                            $(".login-notice").html('');
                                        },3000);
                                    }
                                }
                            });
                        });
                    })
                }

                //wrong password
                else if(e.trim()=="wrong password"){
                    var message=document.createElement("DIV");
                    message.className="alert alert-warning";
                    message.innerHTML="<b>"+e+"</b>";
                    $(".login-notice").append(message);
                    $("#login_form").trigger("reset");
                    $('.login-submit-btn').html("Login now");
                    $('.login-submit-btn').removeAttr("disabled");
                    setTimeout(function(){
                        $(".login-notice").html('');
                    },3000);
                }

                //user not found
                else{
                    message=document.createElement('DIV');
                    message.className="alert alert-warning";
                    message.innerHTML="<b>"+e+"</b>";
                    $(".login-notice").append(message);
                    $("#login_form").trigger("reset");
                    $('.login-submit-btn').html("Login now");
                    $('.login-submit-btn').removeAttr("disabled");
                    setTimeout(function(){
                        $(".login-notice").html('');
                    },3000);
                }
                
            }
        });
    });
});