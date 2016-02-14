$(document).ready(function(){
    $("#usuarios-email").focus();
    $("#btEntrar").click(function () {
        var url     = base + '/usuarios/criar_assinante/';
        var email   = $("#usuarios-email").val();
    });
});
