$(document).ready(function () {
    $("#pass__").click(function () {
        let v = $("#pass__").is(':checked');
        v == true ? $("#contraseña").attr('type', 'text') :
            $("#contraseña").attr('type', 'password');
    });
    $("#btn-init-session").click(function () {
        let nombre = $("#nombre_").val();
        let contraseña = $("#contraseña_").val();
        if (nombre.length == 0 || contraseña.length == 0) {
            window.alert('¡Debe completar los campos obligatorios!');
        } else {
            $("#formulario-1a").prop('action', "../../capa-negocios/backend.php");
            $("#formulario-1a").submit();
            alert()
        }
    });
    $("#btn-btn-create").click(function () {
        let nombre = $("#nombre").val();
        let contraseña = $("#contraseña").val();
        if (nombre.length == 0 || contraseña.length == 0 || $("#contraseña_").val().length == 0) {
            window.alert('¡Debe completar los campos obligatorios!');
        } else {
            if ($("#contraseña").val() == $("#contraseña_").val()) {
                $("#formulario-1b").prop("action", "../../capa-negocios/backend.php");
                $("#formulario-1b").submit();
            } else {
                $("#formulario-1b").removeAttr('action');
                window.alert('¡Las contraseñas no coinciden!');
            }
        }
    })
    $("#pass_").click(function () {
        let x = $("#pass_").is(':checked');
        x == true ? $("#contraseña_").attr('type', 'text') :
            $("#contraseña_").attr('type', 'password');
    });
});