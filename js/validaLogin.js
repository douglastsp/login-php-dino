$(function() {
    var btnLogar = $("#btn_logar");
    var email = $('input[name=email]');
    var pw = $('input[name=pw]');

    email.on('focus', function(e) {
        var emailVal =  email.val();
        if (emailVal == 'É necessário preencher o e-mail') {
            email.removeClass("border-2 border-red-300").val("");
        }
    });
    pw.on('focus', function(e) {
        var pwVal = pw.val();
        if (pwVal == 'A senha é necessário') {
            pw.removeClass("border-2 border-red-300").prop("type", "password").val("");
        }
    });

    btnLogar.on('click', function(e) {
        var emailVal =  email.val();
        var pwVal = pw.val();
        
        if (emailVal == '') {
            e.preventDefault();
            email.addClass("border-2 border-red-300").val("É necessário preencher o e-mail");
        } else if (pwVal == '') {
            e.preventDefault();
            pw.addClass("border-2 border-red-300").prop("type", "text").val("A senha é necessário");
        }
    });
});