<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="login-modal" aria-hidden="true"
     style="display: none" xmlns="http://www.w3.org/1999/html">
    <div class="modal-dialog modal-lg" id="div-register">
        <div class="modal-content">
            <div class="modal-header">
                <button class="close" type="button" data-dismiss="modal" aria-label="close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title text-center">Login</h4>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <h4>Ingresa a tu Cuenta</h4>
                    <p>Ingresa con tu Usuario y Password</p>
                    <hr/>
                    <form class="form-horizontal">
                        <div class="form-group has-feedback has-feedback-left">
                            <!--<label for="username" id="username-field">Usuario</label>-->
                            <input type="text" class="form-control" id="modal-username-field" name="user"
                                   placeholder="Usuario" required>
                            <i class="glyphicon glyphicon-user form-control-feedback"></i>
                        </div>
                        <div class="form-group has-feedback">
                            <!--<label for="password" id="password-field">Password</label>-->
                            <input type="password" class="form-control" id="modal-password-field" name="password"
                                   placeholder="Password" required>
                            <i class="glyphicon glyphicon-lock form-control-feedback"></i>
                        </div>
                        <div class="form-group">
                            <span id="error-usuario-modal"></span>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <p class="modal-login-popup">No tienes Cuenta? <a href="#" role="button" id="popup-registrarse">Registrate</a>
                </p>
                <button type="reset" id="erase-modal-login" class="btn btn-default">Borrar</button>
                <button class="btn btn-primary" type="submit" id="modal-btn-login" name="btn-login"><span
                            class="glyphicon"></span>Ingresar
                </button>
            </div>
        </div>
    </div>
</div>
<script>
</script>