<div class="modal fade" id="register-modal" tabindex="-1" role="dialog" aria-labelledby="register-modal"
     aria-hidden="true" style="display: none">
    <div class="modal-dialog modal-sm" id="div-register">
        <div class="modal-content">
            <div class="modal-header">
                <button class="close" type="button" data-dismiss="modal" aria-label="close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title text-center">Registrarse</h4>
            </div>
            <form id="modal-register-user" class="form-horizontal" method="post" action="modal-register.php">
                <div class="modal-body">
                    <div class="container-fluid">
                        <h4>Registrate Con Nosotros</h4>
                        <p>Registrate con tu Usuario, Email y Password</p>
                        <hr>

                        <div class="form-group has-feedback">
                            <!--<label for="username" id="username-field">Usuario: </label>-->
                            <input type="text" class="form-control" id="register-username"
                                   name="username_register"
                                   placeholder="Usuario">
                            <i class="form-control-feedback glyphicon glyphicon-user"></i>
                        </div>
                        <div class="form-group has-feedback">
                            <!--<label for="text" id="email-field">Email: </label>-->
                            <span id="error_register_email"></span>
                            <input type="email" class="form-control" id="register-email"
                                   name="register_email"
                                   placeholder="Email">
                            <i class="form-control-feedback glyphicon glyphicon-star"></i>
                        </div>
                        <div class="form-group has-feedback">
                            <!--<label for="password" id="password-field">Password: </label>-->
                            <span id="error_register_password"></span>
                            <input type="password" class="form-control" id="register-password"
                                   name="register_password"
                                   placeholder="Password">
                            <i class="form-control-feedback glyphicon glyphicon-lock"></i>
                        </div>
                        <div class="form-group has-feedback">
                            <!--<label for="password" id="password-field">Confirmar Password:</label>-->
                            <span id="error_register_password_confirmation"></span>
                            <input type="password" class="form-control" id="register-password-confirmation"
                                   name="register_password_confirmation"
                                   placeholder="Confirmar Password">
                            <i class="form-control-feedback glyphicon glyphicon-lock"></i>
                        </div>
                        <div class="form-group">
                            <span id="error_register"></span>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <p class="modal-login-popup">Ya tienes Cuenta? <a href="#" role="button"
                                                                          id="popup-login">Login</a></p>
                        <div align="right">
                            <button class="btn btn-default" type="reset">Borrar</button>
                            <button type="submit" name="insert-new-user" class="btn btn-primary"
                                    id="btn-register">Registrarse
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

