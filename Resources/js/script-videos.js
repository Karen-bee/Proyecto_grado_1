// Función para inicializar un modal
function inicializarModal(botonId, modalId) {
  var boton = document.getElementById(botonId);
  var modal = document.getElementById(modalId);

  if (boton && modal) {
      boton.addEventListener('mouseenter', function() {
          // Muestra el modal para calcular sus dimensiones
          modal.style.visibility = 'hidden';
          modal.style.display = 'block';

          var botonRect = boton.getBoundingClientRect();
          var modalRect = modal.getBoundingClientRect();

          var scrollTop = window.scrollY || document.documentElement.scrollTop;
          var scrollLeft = window.scrollX || document.documentElement.scrollLeft;

          // Calcula la posición inicial debajo del botón
          var topPos = botonRect.bottom + scrollTop;
          var leftPos = botonRect.left + scrollLeft;

          // Verifica si el modal cabe debajo del botón
          if (window.innerHeight + scrollTop < topPos + modalRect.height) {
              // No cabe debajo, verifica a la derecha
              if (window.innerWidth > botonRect.right + modalRect.width) {
                  leftPos = botonRect.right + scrollLeft;
                  // Alinea verticalmente al centro del botón
                  topPos = botonRect.top + scrollTop + (botonRect.height / 2) - (modalRect.height / 2);
              } else if (botonRect.left - modalRect.width > 0) { // Verifica a la izquierda
                  leftPos = botonRect.left - modalRect.width + scrollLeft;
                  // Alinea verticalmente al centro del botón
                  topPos = botonRect.top + scrollTop + (botonRect.height / 2) - (modalRect.height / 2);
              }
          }

          // Ajustes para asegurar que el modal no se extienda fuera del viewport
          if (topPos < scrollTop) {
              topPos = scrollTop + 10; // Margen superior
          } else if (topPos + modalRect.height > window.innerHeight + scrollTop) {
              topPos = window.innerHeight + scrollTop - modalRect.height - 10; // Margen inferior
          }

          // Aplica la posición calculada
          modal.style.top = topPos + 'px';
          modal.style.left = leftPos + 'px';
          modal.style.visibility = 'visible';
      });

      boton.addEventListener('mouseleave', function() {
          modal.style.display = 'none';
      });
  }
}






// Llamar a la función inicializarModal en el evento DOMContentLoaded
document.addEventListener('DOMContentLoaded', function() {
  inicializarModal('btnInicio', 'Inicio');
  inicializarModal('btnEventos', 'Eventos');
  inicializarModal('btnBlog', 'Blog');
  inicializarModal('btnVerMasBlogVideo', 'VerMasBlogVideo');
  inicializarModal('btnNoticias', 'Noticias');
  inicializarModal('btnSobreNosotros', 'SobreNosotros');
  inicializarModal('btnBiblioteca', 'Biblioteca');
  inicializarModal('btnObjetivoVideo', 'objetivoVideo');
  inicializarModal('btnHistoriaVideo', 'historiaVideo');
  inicializarModal('btnGenerosVideo', 'generosVideo');
  inicializarModal('btnProfesorasVideo', 'profesorasVideo');
  inicializarModal('btnRegistrateVideo', 'registrateVideo');
  inicializarModal('btnRegistrateAquiVideo', 'registrateAquiVideo');
  inicializarModal('btnIncioDeSesionVideo', 'incioDeSesionVideo');
  inicializarModal('btnOlvidarContraseñaVideo', 'olvidarContraseñaVideo');
  inicializarModal('btnVolverAlInicioVideo', 'volverAlInicioVideo');
  inicializarModal('btnDashboardVideo', 'dashboardVideo');
  inicializarModal('btnEditarPerfilVideo', 'editarPerfilVideo');

  inicializarModal('btnAdminUsuariosVideo', 'userAdminVideo');
  inicializarModal('btnAdminNoticiasVideo', 'noticiasAdminVideo');
  inicializarModal('btnAdminEventosVideo', 'eventosAdminVideo');
  inicializarModal('btnAdminBlogVideo', 'blogsAdminVideo');
  inicializarModal('btnBibliotecaVideo', 'Biblioteca');
  inicializarModal('btnMisEventosVideo', 'misEventosAdminVideo');
});

