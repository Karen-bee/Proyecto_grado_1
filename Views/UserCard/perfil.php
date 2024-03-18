<?php
$vistaActual = 1;

include '../Layouts/header.php';?>

<title>Perfil</title>

<section class="home-section">
    <div class="container-perfil">
        <!-- Sección de Cambiar Foto -->
        <div class="content-section">
            <div class="content-title">
                <div class="col-4"><hr></div>
                <div class="col-4"><i class='bx bx-user' ></i><strong>Cambiar Foto</strong></div>
                <div class="col-4"><hr></div>
            </div>

            <div class="content-info">
                <div class="foto">
                    <img src=<?php  echo $row['foto_perfil']?> alt="Foto de perfil">
                </div>
                <div class="info">
                    <strong><?php  echo $row['nombre_completo']?></strong>
                    <h4><?php  echo $row['nombre_rol']?></h4>
                    <div class="btn-info">
                        
                        <button id="subirImagen" class="btn-foto-new"> Cargar nueva foto </button>
                        <button id="borrarImagen" class="btn-delte-new">Eliminar</button>
                    </div>
                    <div id="panelSubirImagen" style="display: none;">
                        <form class="perfil-form" action="/Literagiando/Routes/UserRouter.php" method="POST" enctype="multipart/form-data">
                            <input type="file" name="foto_perfil" id="imagen" accept="image/*">
                            <button id="subirImage"type="submit">Subir Imagen</button>
                            <input type="text" name="accion" value="editarFoto" hidden>
                            <input type="text" name="id_usuario" value="<?php echo $row['id_usuario']; ?>" hidden>
                        </form>
                    </div>
                    <script>
                        document.getElementById("subirImagen").addEventListener("click", function() {
                            document.getElementById("imagen").click();
                        });
                        document.getElementById("borrarImagen").addEventListener("click", function() {
                            document.getElementById("imagen").value = "";
                            document.getElementById("subirImage").click();
                        });
                        document.getElementById("imagen").addEventListener("change", function() {
                            document.getElementById("subirImage").click();
                        });
                    </script>
                </div>
            </div>
        </div>

        <!-- Sección de Cambiar Documento -->
        <div class="content-section">
            <div class="content-title">
                <div class="col-4"><hr></div>
                <div class="col-4"><i class='bx bx-file'></i><strong>Detalles del perfil</strong></div>
                <div class="col-4"><hr></div>
            </div>

            <!-- Agrega aquí el contenido relacionado con la sección de Cambiar Documento -->
            
            <form class="perfil-form" action="/Literagiando/Routes/UserRouter.php" method="POST">
                <div class="displ-block">
                    <span>Email</span>
                    <input class="inputsTxt" type="text" name="correo" value="<?php echo $row['correo']; ?>" readonly>
                </div>

                <div class="displ-block">
                    <span>Telefono</span>
                    <input class="inputsTxt" type="number" name="telefono" value="<?php echo $row['telefono']; ?>">
                </div>

                <div class="displ-block">
                    <span>Nombre Completo</span>
                    <input class="inputsTxt" type="text" name="nombre_completo" value="<?php echo $row['nombre_completo']; ?>">
                </div>

                <div class="displ-block">
                    <span>Rol</span>
                    <input class="inputsTxt" type="text" id="rol" value="<?php echo $row['nombre_rol']; ?>" readonly>
                </div>

                <div class="displ-block">
                    <span>Documento</span>
                    <input class="inputsTxt" type="text" name="identificacion" id="Documento" value="<?php echo $row['identificacion']; ?>" readonly>
                </div>

                <div class="displ-block">
                    <span>Dirección</span>
                    <input class="inputsTxt" type="text" name="direccion_usuario" id="Direccion" value="<?php echo $row['direccion_usuario']; ?>">
                </div>

                <div style="display: flex;">
                    <button type="submit" class="btn-save">Editar</button>
                    <input type="text" name="accion" value="editarPerfil" hidden>
                    <input type="text" name="usuario" value="<?php echo $row['usuario']; ?>" hidden>
                    <input type="text" name="id_usuario" value="<?php echo $row['id_usuario']; ?>" hidden>
                </div>

                <div style="display: flex;">
                    <a class="btn-back" href="/Literagiando/Views/dashboard.php">Volver</a>
                </div>
            </form>

        </div>
    </div>
</section>

<?php include '../Layouts/footer.php';?>
