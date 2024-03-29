<?php
    include_once __DIR__ . '/../Login/olvido_contraseña.php';
    ?>

<!-- Modal -->
<div class="modal fade" id="LoginModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">

  <form action="/Literagiando/App/Controllers/Login/AuthController.php" method="POST">

    <div class="modal-content">
        <div class="content-title">
            <strong>¡Bienvenido a Litegiando!</strong>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        
        <div class="modal-body">
            <div class="imgF">

            </div>
            <div class="container-log">
                <div class="content-logo">
                    <div class="col-3"><hr id="left-line"></div>
                    <div class="col-6"><i class="bi bi-person-circle"></i><h3 id="title"> UserLogin</h3></div>
                    <div class="col-3"><hr id="right-line"></div>
                </div>    

                <div class="group-input">
                    <div class="col" style="margin: 20px;">
                        <label for="correo"><i class='bx bx-user'></i> Usuario:</label>
                        <br>
                        <input type="correo" name="correo" id="correo" class="form-control">
                    </div>

                    <div class="col" style="margin: 20px;">
                        <label for="password"><i class='bx bxs-key' ></i> Contraseña:</label>
                        <input type="password" name="password" id="password" class="form-control">
                    </div>

                </div>
                

                <div class="group-pw" style="margin: 20px;">
                    <div class="recovery">
                        <a id="btnOlvidarContraseñaVideo" href="#" data-bs-toggle="modal" data-bs-target="#OlvidoModal">Olvidaste la contraseña</a>
                    </div>

                    <div class="btn-submit" style="margin: 20px;">
                        <button type="btnSubmit" name="btnSubmit" class="btn-log">Iniciar Sesión</button>
                    </div>
                </div>

        </div>
        
    </div>
    <div class="register-log">
        <strong>¿No te has registrado?. <a id="btnRegistrateVideo" href="/Literagiando/Views/Login/register_user.php">Registrate</a></strong>
    </div>
    </div>
    </form>
  </div>
</div>