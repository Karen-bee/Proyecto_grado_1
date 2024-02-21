// Función para inicializar un modal
function inicializarModal(botonId, modalId) {
  var boton = document.getElementById(botonId);
  var modal = document.getElementById(modalId);

  try {
  if (boton && modal) {

    boton.addEventListener('mouseenter', function() {
        // Posiciona el modal debajo del botón
        var rect = boton.getBoundingClientRect();
        var scrollTop = window.pageYOffset || document.documentElement.scrollTop || document.body.scrollTop || 0;
        modal.style.left = rect.left + 'px';
        modal.style.top = rect.bottom + scrollTop + 'px';
        modal.style.display = 'block';
    });

    boton.addEventListener('mouseleave', function() {
        modal.style.display = 'none';
    });
    
  }
  } catch (error) {
      console.log("Error: "+error)
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

