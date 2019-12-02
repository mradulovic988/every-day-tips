function sendContact() {

    $body = $("body");
    $(document).on({
        ajaxStart: function() { $body.addClass("loading"); },
        ajaxStop: function() { $body.removeClass("loading"); }
    });

    var valid;
    valid = validateContact();
    if(valid) {
        jQuery.ajax({
            url: "",
            data:'userName='+$("#userName").val()+'&userEmail='+
                $("#userEmail").val()+'&subject='+
                $("#subject").val()+'&content='+
                $(content).val(),
            type: "POST",
            success:function(data){
                $("#mail-status").html('<br><div class="alert alert-success" role="alert">Thank you for your message.</div>');
            },
            error:function (){}
        });
    }

    // Reset success
    setTimeout(function () {
        $("#formName")[0].reset();
        $('.alert-success').css('display','none');
    }, 5000);

}

function validateContact() {
    var valid = true;
    $(".demoInputBox").css('background-color','');
    $(".info").html('');
    if(!$("#userName").val()) {
        $("#userName-info").html("This field is required.");
        $("#userName").css('background-color','#FFFFDF');
        valid = false;
    }
    if(!$("#userEmail").val()) {
        $("#userEmail-info").html("This field is required.");
        $("#userEmail").css('background-color','#FFFFDF');
        valid = false;
    }
    if(!$("#userEmail").val().match(/^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/)) {
        $("#userEmail-info").html("You need to enter valid E-mail address.");
        $("#userEmail").css('background-color','#FFFFDF');
        valid = false;
    }
    if(!$("#subject").val()) {
        $("#subject-info").html("This field is required.");
        $("#subject").css('background-color','#FFFFDF');
        valid = false;
    }
    if(!$("#content").val()) {
        $("#content-info").html("This field is required.");
        $("#content").css('background-color','#FFFFDF');
        valid = false;
    }
    return valid;
}