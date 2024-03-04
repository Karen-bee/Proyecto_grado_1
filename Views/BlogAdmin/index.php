<?php


require_once (__DIR__ .'/../../App/Controllers/BlogController.php');
$blogController = new BlogController();

$blogs = $blogController->ObtenerAllBlogsController();
$blogsRecibidos = $blogs;
$tipoblogs = $blogController->ObtenerSelectBlogController();


require_once (__DIR__ .'/../../App/Controllers/Login/UserController.php');
$userssController = new UserController();

$userss = $userssController->ObtenerUsersController();

$cantidadDePaginas= 1;
$blogsPorPagina = 5;


if($blogs['state']===true){

  $provi = json_encode($blogsRecibidos['blogs']);
  $cantidadDePaginas= ceil(count($blogs["blogs"])/$blogsPorPagina);

}else{
  echo $blogs['mensaje'];

}


$paginaActual = isset($_GET['pagina']) ? $_GET['pagina'] : 1;



?>

<?php 
include '../Layouts/header.php';
include '../BlogAdmin/create.php';
include '../BlogAdmin/edit.php';
?>

    <title>Administrador Blog</title>
    
    <section class="home-section">
      
      <div class="container-eventos">
        
        <div class="content-evento">
          <div class="col-4"><hr id="line-left"><hr id="line-left"></div>
          <div class="col-4"><h1 id="title-eventos">Administrar Blog </h1></div>
          <div class="col-4"><hr id="line-right"><hr id="line-right"></div>
        </div>

        <div class="content-search">
          <form class="d-flex" role="search">
            <input class="form-control" type="search" placeholder="Search" aria-label="Search" id="searchInput">
          </form>
        </div> 

        <div class="table-evento table-responsive">
          <table class="table table-bordered table-sm">
            <thead>
              <tr>
                <th>Codigo</th>
                <th>Titulo</th>
                <th>Subtitulo/Blog</th>
                <th>Descripcion</th>
                <th>Usuario</th>
                <th>Tipo/Blog</th>
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
            <a id="btn-agregar" href="#" data-bs-toggle="modal" data-bs-target="#BlogsModal">Agregar</a>
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
      var blogsRecibidos = <?php echo $provi; ?>;
      var blogsPorPagina = <?php echo $blogsPorPagina; ?>;
      var paginaActual = <?php echo $paginaActual; ?>;
    </script>
    <script>
  
      var totalPaginas = Math.ceil(blogsRecibidos.length / blogsPorPagina);

      actualizarPaginacion(totalPaginas);

      function mostrarBlogs(resultados){
        var tableBody = document.querySelector('.table-evento tbody');
        // Actualizar la tabla
        resultados.forEach(function (row) {
          tableBody.insertAdjacentHTML('beforeend', `
                <tr>
                    <td>${row.idblog}</td>
                    <td>${row.titulo_blog}</td>
                    <td>${row.subtitulo_blog}</td>
                    <td>${row.detalle_blog}</td>
                    <td>${row.usuarioN}</td>
                    <td>${row.tipoBlog}</td>
                    <td><img src="${row.imagen_blog}" alt="Imagen"></td>
                    <td><input type="checkbox" class="isActive" data-id="${row.idblog}" ${row.estado_blog === 'Activo' ? 'checked' : ''}> ${row.estado_blog}</td>
                    <td>  
                      <a data-id="${row.idblog}" href="/Literagiando/Routes/BlogRouter.php?accion=editar&idblog=${row.idblog}" class="btn btn-outline-dark btn-sm btn-editar-blog" data-bs-toggle="modal" data-bs-target="#EditarBlog"><i class='bx bxs-edit' ></i></a>
                      
                      <form method="POST" action="/Literagiando/Routes/BlogRouter.php">
                            <input type="hidden" name="accion" value="eliminar">
                            <input type="hidden" name="idblog" value="${row.idblog}">
                            <button type="submit" class="btn btn-outline-danger btn-sm" onclick="return confirm('¿Estás seguro de que deseas eliminar este blog?')">
                                <i class='bx bx-trash'></i>
                            </button>
                        </form>              
                    </td>
                </tr>`);

                var checkbox = tableBody.querySelector(`.isActive[data-id="${row.idblog}"]`);
                checkbox.addEventListener('change', function (){
                  console.log(row.idblog, row.estado_blog);
                      fetch('/Literagiando/Routes/BlogRouter.php', {
                          method: 'POST',
                          headers: {
                              'Content-Type': 'application/x-www-form-urlencoded',
                          },
                          // Puedes agregar más parámetros aquí si es necesario
                          body: new URLSearchParams({
                              'accion': 'activarBlog',
                              'idBlog': row.idblog,
                              'estado_blog': row.estado_blog
                          }),
                      })
                      .then(response => response.text())
                      .then(data => {
                          console.log(data);
                          if(data.includes('exito')){
                              alert("Se ha actualizado el estado del blog");
                              location.reload();
                          }else{
                              alert("Error al actualizar el estado");
                          }
                          
                      })
                      .catch(error => {
                          console.error('Error al activar el blog: ', error);
                      });
                });
                // Asignar evento de clic al botón de editar
                $(`.btn-editar-blog[data-id="${row.idblog}"]`).on('click', function() {
                      llenarFormularioBlog(row);
                  });

                  // Función para llenar el formulario con los datos de la blog
                  function llenarFormularioBlog(blog) {
                    blogSelected = blog;
                    console.log(blogSelected);
                    $('#tituloBlog').val(blog.titulo_blog).trigger('change');
                    $('#subtitulo_blog').val(blog.subtitulo_blog);
                    $('#idtipoblog').val(blog.idtipo_blog);
                    $('#id_usuario').val(blog.id_usuario);
                    $('#idblog').val(blog.idblog);
                    $('#detalle_blogE').val(blog.detalle_blog);
                    //$('input[name="accion"]').val('editar');
                    setTimeout(function () {
                        // Activar manualmente el modal
                        $('#EditarBlog').modal('show');
                    }, 100);

                  }
            });
      }
        // Función para realizar la búsqueda
        function buscarBlogs() {
            var searchTerm = document.getElementById('searchInput').value.toLowerCase();

            var resultados = blogsRecibidos.filter(function (blog) {
                var nombreBlog = blog.titulo_blog.toLowerCase();
                var subtituloBlog = blog.subtitulo_blog.toLowerCase();
                var detalleBlog = blog.detalle_blog.toLowerCase();

                return nombreBlog.includes(searchTerm) || subtituloBlog.includes(searchTerm) || detalleBlog.includes(searchTerm);
            });

            // Limpiar la tabla antes de actualizar
            var tableBody = document.querySelector('.table-evento tbody');
            tableBody.innerHTML = '';

            mostrarBlogs(resultados);
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

          var nuevosLista = blogsRecibidos.slice((paginaActual - 1)*blogsPorPagina,blogsPorPagina * paginaActual);
          mostrarBlogs(nuevosLista);

        }

        // Evento de entrada para la búsqueda
        document.getElementById('searchInput').addEventListener('input', buscarBlogs);
        
        document.addEventListener("DOMContentLoaded", actualizarElementosPagina());




    </script>

<?php include '../Layouts/footer.php';?>