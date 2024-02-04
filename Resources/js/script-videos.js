// Función para inicializar un modal
function inicializarModal(botonId, modalId) {
  var boton = document.getElementById(botonId);
  var modal = document.getElementById(modalId);


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



// Llamar a la función inicializarModal en el evento DOMContentLoaded
document.addEventListener('DOMContentLoaded', function() {
  inicializarModal('btnInicio', 'Inicio');
  inicializarModal('btnEventos', 'Eventos');
  inicializarModal('btnBlog', 'Blog');
  inicializarModal('btnNoticias', 'Noticias');
  inicializarModal('btnSobreNosotros', 'SobreNosotros');

});
