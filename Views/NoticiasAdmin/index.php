<?php


require_once (__DIR__ .'/../../App/Controllers/NoticiaController.php');
$noticiaController = new NoticiaController();

$noticias = $noticiaController->ObtenerTodasNoticiasController();
$todasLasNoticias = $noticias;
$tiponoticias = $noticiaController->ObtenerSelectNoticiaController();


require_once (__DIR__ .'/../../App/Controllers/Login/UserController.php');
$userssController = new UserController();

$userss = $userssController->ObtenerUsersController();


if($noticias['state']===true){

  $provi = json_encode($todasLasNoticias['noticias']);

}else{
  echo $noticias['mensaje'];

}

$noticiasPorPagina = 5;
$cantidadDePaginas= ceil(count($noticias["noticias"])/$noticiasPorPagina);


$paginaActual = isset($_GET['pagina']) ? $_GET['pagina'] : 1;





?>





<?php 
include '../Layouts/header.php';
include '../NoticiasAdmin/edit.php';
include '../NoticiasAdmin/create.php';
?>





    <title>Administrador Noticias</title>
    
    <section class="home-section">
      
      <div class="container-eventos">
        
        <div class="content-evento">
          <div class="col-4"><hr id="line-left"><hr id="line-left"></div>
          <div class="col-4"><h1 id="title-eventos">Administrar Noticias </h1></div>
          <div class="col-4"><hr id="line-right"><hr id="line-right"></div>
        </div>

        <div class="content-search">
          <form class="d-flex" role="search">
            <!-- Campo de búsqueda -->
            <input class="form-control" type="search" placeholder="Search" aria-label="Search" id="searchInput">
          </form>
        </div> 

        <div class="table-evento table-responsive">
          <table class="table table-bordered table-sm">
            <thead>
              <tr>
                <th>Codigo</th>
                <th>Titulo</th>
                <th>Fecha</th>
                <th>Tipo/Noticia</th>
                <th>Autor</th>
                <th>Descripción</th>
                <th>Imagen</th>
                <th>Estado</th>
                <th>Acción</th>
              </tr>
            </thead>
            <tbody>
            
            </tbody>
          </table>
        </div>

        <div class="peg-button-arrow">

          <div class="col-4" id="agregar">
          <a id="btn-agregar" href="#" data-bs-toggle="modal" data-bs-target="#NoticiasModal">Agregar</a>
          </div>

          <div class="col-4" id="arrow">
            <a href='?pagina=<?php echo ($paginaActual-2 + $cantidadDePaginas)%($cantidadDePaginas)+1 ?>'><i class='bx bxs-left-arrow'></i></a>
            <a href='?pagina=<?php echo ($paginaActual)%($cantidadDePaginas)+1 ?>'><i class='bx bxs-right-arrow'></i></a> 
          </div>

          <div class="col-4" id="page">
          <nav aria-label="Page navigation example">
            <ul class="pagination">
              
            </ul>
          </nav>
          </div>
        </div>
      </div>

    </section>

    <script>
      var todasLasNoticias = <?php echo $provi; ?>;
      var noticiasPorPagina = <?php echo $noticiasPorPagina; ?>;
      var paginaActual = <?php echo $paginaActual; ?>;
    </script>
    <script>
      var noticiaSelected = null;
      var totalPaginas = Math.ceil(todasLasNoticias.length / noticiasPorPagina);

      actualizarPaginacion(totalPaginas);

      function mostrarNoticias(resultados){
        var tableBody = document.querySelector('.table-evento tbody');
        // Actualizar la tabla
        resultados.forEach(function (row) {
                tableBody.insertAdjacentHTML('beforeend', `
                <tr>
                    <td>${row.idnoticias}</td>
                    <td>${row.nombre_Noticia}</td>
                    <td>${row.fecha_publicacion}</td>
                    <td>${row.tipoNoticia}</td>
                    <td>${row.usuarioN}</td>
                    <td>${row.detalle_noticias}</td>
                    <td><img src="${row.imagen_card}" alt="Imagen"></td>
                    <td><input type="checkbox" class="isActive" data-id="${row.idnoticias}" ${row.estado_noticia === 'Activo' ? 'checked' : ''}> ${row.estado_noticia}</td>
                    <td>
                        <a href="#" data-id="${row.idnoticias}" class="btn btn-outline-dark btn-sm btn-editar-noticia" data-bs-toggle="modal" data-bs-target="#EditarNoticia" ><i class='bx bxs-edit'></i></a>
        
                        <form method="POST" action="/Literagiando/Routes/NoticiaRouter.php">
                            <input type="hidden" name="accion" value="eliminar">
                            <input type="hidden" name="idnoticias" value="${row.idnoticias}">
                            <button type="submit" class="btn btn-outline-danger btn-sm" onclick="return confirm('¿Estás seguro de que deseas eliminar esta noticia?')">
                                <i class='bx bx-trash'></i>
                            </button>
                        </form>
                    </td>
                </tr>`);
                var checkbox = tableBody.querySelector(`.isActive[data-id="${row.idnoticias}"]`);
                checkbox.addEventListener('change', function () {
                  console.log(row.idnoticias, row.estado_noticia);
                      fetch('/Literagiando/Routes/NoticiaRouter.php', {
                          method: 'POST',
                          headers: {
                              'Content-Type': 'application/x-www-form-urlencoded',
                          },
                          // Puedes agregar más parámetros aquí si es necesario
                          body: new URLSearchParams({
                              'accion': 'activarNoticia',
                              'idNoticia': row.idnoticias,
                              'estado_noticia': row.estado_noticia
                          }),
                      })
                      .then(response => response.text())
                      .then(data => {
                          console.log(data);
                          if(data.includes('exito')){
                              alert("Se ha actualizado el estado de la noticia");
                              location.reload();
                          }else{
                              alert("Error al actualizar el estado");
                          }
                          
                      })
                      .catch(error => {
                          console.error('Error al activar la noticia: ', error);
                      });
                });

                // Asignar evento de clic al botón de editar
                  $(`.btn-editar-noticia[data-id="${row.idnoticias}"]`).on('click', function() {
                      llenarFormularioNoticia(row);
                  });

                  // Función para llenar el formulario con los datos de la noticia
                  function llenarFormularioNoticia(noticia) {
                    noticiaSelected = noticia;
                    console.log(noticiaSelected);
                    $('#titulo_noticia').val(noticia.nombre_Noticia).trigger('change');
                    $('#subtitulo_noticias').val(noticia.subtitulo_noticias);
                    $('#idtiponoticia').val(noticia.idtipo_Noticia);
                    $('#id_usuario').val(noticia.id_usuario);
                    $('#idnoticias').val(noticia.idnoticias);
                    $('#detalle_noticias').val(noticia.detalle_noticias);
                    //$('input[name="accion"]').val('editar');
                    setTimeout(function () {
                        // Activar manualmente el modal
                        $('#EditarNoticia').modal('show');
                    }, 100);

                  }
            });
      }
        // Función para realizar la búsqueda
        function buscarNoticias() {
            var searchTerm = document.getElementById('searchInput').value.toLowerCase();

            var resultados = todasLasNoticias.filter(function (noticia) {
                var nombreNoticia = noticia.nombre_Noticia.toLowerCase();
                var subtituloNoticia = noticia.subtitulo_noticias.toLowerCase();
                var detalleNoticia = noticia.detalle_noticias.toLowerCase();

                return nombreNoticia.includes(searchTerm) || subtituloNoticia.includes(searchTerm) || detalleNoticia.includes(searchTerm);
            });

            // Limpiar la tabla antes de actualizar
            var tableBody = document.querySelector('.table-evento tbody');
            tableBody.innerHTML = '';

            mostrarNoticias(resultados);
        }
        function actualizarPaginacion(totalPaginas) {
            var paginacion = document.querySelector('.pagination');
            paginacion.innerHTML = '';

            for (var i = 1; i <= totalPaginas; i++) {
                paginacion.innerHTML += `<li class="page-item"><a class="page-link ${i}" data-pagina="${i}" href="?pagina=${i}">${i}</a></li>`;
            }

            if(paginaActual){
              paginacion.querySelector('.page-link[data-pagina="' + paginaActual + '"]').style.backgroundColor = 'orange';


            }
        }
        function actualizarElementosPagina(){

          var nuevosLista = todasLasNoticias.slice((paginaActual - 1)*noticiasPorPagina,noticiasPorPagina * paginaActual);
          mostrarNoticias(nuevosLista);

        }

        // Evento de entrada para la búsqueda
        document.getElementById('searchInput').addEventListener('input', buscarNoticias);
        
        document.addEventListener("DOMContentLoaded", actualizarElementosPagina());





    </script>


    <?php include '../Layouts/footer.php';?>