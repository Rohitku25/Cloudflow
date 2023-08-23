$(document).ready(function(){
    $(".activate-btn").click(function(){
        var code=btoa($("#code").val());
        var email=btoa($("#email").val());
        $.ajax({
            type:"POST",
            url:"php/activate_code.php",
            data:{
                code:code,
                email:email
            },
            beforeSend:function(){
                $(this).html("Please wait...");
            },
            success:function(e){
                // if("User verified"==e){
                //     $(".activate-btn").setAttr("disabled");
                //     $(".activator").addClass("d-none");
                // }
                // let message=$(".activate_notif").html(e);
                $(".activate_notif").html(e);
                if(e.trim()=="User verified"){
                    $(".activate_notif").removeClass("alert-warning");
                    $(".activate_notif").addClass("alert-success");
                    $(".activate_notif").html(e+"  login now!");
                }
                else{
                    $(".activate_notif").removeClass("alert-success");
                    $(".activate_notif").addClass("alert-warning");
                    $(".activate_notif").html(e);
                }
            }
        });
    });
});