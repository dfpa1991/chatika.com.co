//AJAX login
function login_into_chatika() {
    var username = $('#modal-username-field').val();
    var password = $('#modal-password-field').val();
    if (username === '') {
        $("#error-usuario-modal").html("<div class='alert alert-danger alert-dismissable'>" +
            "<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>" +
            "<strong>Ooops!</strong> Usuario estar vacio" +
            "</div>");
    } else {
        if (password === '') {
            $("#error-usuario-modal").html("<div class='alert alert-danger alert-dismissable'>" +
                "<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>" +
                "<strong>Ooops!</strong> Password esta vacio" +
                "</div>");
        } else {
            $.ajax({
                url: "login.php",
                method: "POST",
                data: {
                    username: username,
                    password: password
                }, success: function (data) {
                    if (data === 'No') {
                        $("#error-usuario-modal").html("<div class='alert alert-danger alert-dismissable'>" +
                            "<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>" +
                            "<strong>Ooops!</strong> Usuario y/o Password no valido " +
                            "<span class='glyphicon glyphicon-alert'></span>" +
                            "</div>");
                    } else {
                        $('#login-modal').hide();
                        location.reload();
                    }
                }
            });
        }
    }

    if (username === '' && password === '') {
        $("#error-usuario-modal").html("<div class='alert alert-danger alert-dismissable'>" +
            "<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>" +
            "<strong>Ooops!</strong> No puede estar vacio" +
            "</div>");
    }
}

$(document).ready(function () {

    //Button Clicked Modal Login
    $('#modal-btn-login').click(function () {
        login_into_chatika();
    });

    //Enter Clicked into Password Field Modal Login
    $(document).on('keyup', '#modal-password-field', function (key) {
        if(key.which === 13){
            login_into_chatika();
        }
    });

    //Erase Button
    $('#erase-modal-login').click(function () {
        $('#modal-username-field').val('');
        $('#modal-password-field').val('');
    });

    //Call the
    $('#popup-registrarse').click(function () {
        $('#register-modal').modal('show');
        $('#login-modal').modal('hide');
    });

    /*Buttons from the shopping navbar*/

    //Logout
    $('#logout-index-link').click(function () {
        var action = "logout";
        $.ajax({
            url: "login.php", method: "POST", data: {action: action},
            success: function (data) {
                location.reload();
            }
        });
    });

    //Mis Ordenes
    $('#order-index-link').click(function () {
        window.location.href = 'account.php?action=ordenes';
    });

    //Editar Cuenta
    $('#edit-index-link').click(function () {
        window.location.href = 'account.php?editar=editar';
    });

    //Cambiar Password
    $('#change-password-link').click(function () {
        window.location.href = 'account.php?cambiar=cambiar';
    });

    //Erase Account
    $('#erase-account').click(function () {
        //TODO
    });

});
