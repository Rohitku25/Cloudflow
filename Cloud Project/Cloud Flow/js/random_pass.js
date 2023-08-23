$(document).ready(function(){
    $('.generate-btn').click(function(e){
        e.preventDefault();
        $("#pass").attr("type","text");
        $(".show-icon").css({"color":"black"});
        $.ajax({
            type:'POST',
            url:'php/random_pass.php',
            beforeSend:function(){
                $(".show-icon").removeClass("fa-eye");
                $(".show-icon").addClass("fa-circle-o-notch fa-spin");
            },
            success:function(e){
                $(".show-icon").removeClass("fa-circle-o-notch fa-spin");
                $(".show-icon").addClass("fa-eye");
                $("#pass").val(e);
            }
        });
    });
});