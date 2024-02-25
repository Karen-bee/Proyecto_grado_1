<div class="modal fade" id="OlvidoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form id="formEmail" method="post" action="/Literagiando/Views/Login/envio_correo.php">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="imgF">
                    </div>
                    <div class="container-log">
                        <div class="text-center mb-4">
                            <img src="/Literagiando/Storage/Icon/reset_password.png" alt="Reset Password" width="46px">
                            <h3>Recupera tu cuenta</h3>
                            <p>Se enviará un correo para realizar el cambio de contraseña.</p>
                        </div>
                        <div class="form-group mb-3">
                            <label for="txt_email" class="form-label">Correo Electrónico</label>
                            <input type="email" class="form-control" id="txt_email" name="correo" placeholder="Ingrese el correo electrónico" required>
                        </div>
                        <div class="group-pw" >
                            <div class="recovery">
                                <a id="btnVolverAlInicioVideo" class="btn btn-link" href="/Literagiando/Views/Home">Volver a inicio de sesión</a>
                            </div>

                            <div class="btn-submit" >
                                <button type="submit" class="btn-log" name="Enviar_correo">Enviar Correo</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="register-log">
                    <strong>¿No te has registrado?. <a id="btnRegistrateAquiVideo" href="/Literagiando/Views/Login/register_user.php">Registrate Aqui.</a></strong>
                </div>
            </div>
        </form>
    </div>
</div>
