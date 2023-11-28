<!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade" id="LoginModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
  <form action="">
    <div class="modal-content">
    <div class="content-title">
        <strong>¡Bienvenido a Litegiando!</strong>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
        
    <div class="modal-body">

        <div class="container-log">
            <div class="content-logo">
                <div class="col-3"><hr id="left-line"></div>
                <div class="col-6"><i class="bi bi-person-circle"></i><h3 id="title"> UserLogin</h3></div>
                <div class="col-3"><hr id="right-line"></div>
            </div>    

            <div class="group-input">
                <div class="col">
                    <label for=""><i class='bx bx-user'></i> Usuario:</label>
                    <input type="email" name="" id="" class="form-control">
                </div>

                <div class="col">
                    <label for=""><i class='bx bxs-key' ></i> Contraseña:</label>
                    <input type="password" name="" id="" class="form-control">
                </div>

            </div>
            

            <div class="group-pw">
                <div class="checkbox">
                    <input type="checkbox" name="" id="">
                    <label for="check">Recordarme</label>
                </div>
                <div class="recovery">
                    <a href="../Views/envio_correo.php">Olvidaste la contraseña</a>
                </div>

                <div class="btn-submit">
                    <button type="submit" class="btn-log"><strong>Iniciar Sesión</strong></button>
                </div>
            </div>

        </div>
      </div>
    </div>
    </form>
  </div>
</div>