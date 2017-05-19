/**
 * Created by root on 5/12/17.
 */
function printError(message) {
    $("#error_register").html("<div class='alert alert-danger alert-dismissable'>" +
        "<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>" +
        "<strong>Ooops!</strong> " + message +
        "</div>");
}

function openLoginModal() {
    $('#login-modal').modal('show');
    $('#register-modal').modal('hide');
}

$(document).ready(function () {

    var button = document.getElementById("popup-login");

    $('#modal-register-user').submit(function (e) {
        //Declaration of variables
        e.preventDefault();
        var register_username = $('#register-username').val();
        var register_email = $('#register-email').val();
        var register_password = $('#register-password').val();
        var confirm_password = $('#register-password-confirmation').val();
        var url = $(this).attr("action");
        var message = '';
        //var register_password_confirmation = $('#register-password-confirmation').val();
        if (register_username === "" && register_email === "" && register_password === "" && confirm_password === "") {
            message = "Todos los campos deben estar llenos";
            printError(message);
        } else {
            if (register_username === "" || register_email === "" || register_password === "" || confirm_password === "") {
                message = 'Todos los campos son requeridos';
                printError(message);
            } else {
                if (register_password === confirm_password) {
                    $.ajax({
                        url:url, data:{
                            username:register_username,
                            email:register_email,
                            password:register_password
                        },
                        method:"POST"
                    }).done(function (responseText, statusText, xhr) {
                        if(responseText === 'se pudo') {
                            $('#register-modal').modal('hide');
                            $('#confirmed-register').modal('show');
                        } else{
                            message = 'Usuario ya Existe';
                            printError(message);
                        }
                    }).fail(function (responseText, statusText, xhr) {
                        message = statusText;
                        printError(message);
                    });
                } else {
                    message = 'Los Passwords no Coinciden';
                    printError(message);
                }
            }
        }
    });

    button.addEventListener("click", openLoginModal);
});