function inicializarModal(btnInicio, Inicio) {
    var boton = document.getElementById(btnInicio);
    var modal = document.getElementById(Inicio);
  
    boton.addEventListener('mouseenter', function() {
      modal.style.display = 'block';
    });
  
    boton.addEventListener('mouseleave', function() {
      modal.style.display = 'none';
    });
  
    function cerrarModal() {
      modal.style.display = 'none';
    }
  }
    
// Llamar a la función inicializarModal en el evento DOMContentLoaded
document.addEventListener('DOMContentLoaded', function() {
    inicializarModal('btnInicio', 'Inicio');
});

//=============== EVENTO ===================== //

function inicializarModal(btnEventos, Eventos) {
    var boton = document.getElementById(btnEventos);
    var modal = document.getElementById(Eventos);
  
    boton.addEventListener('mouseenter', function() {
      modal.style.display = 'block';
    });
  
    boton.addEventListener('mouseleave', function() {
      modal.style.display = 'none';
    });
  
    function cerrarModal() {
      modal.style.display = 'none';
    }
  }
    
    // Llamar a la función inicializarModal en el evento DOMContentLoaded
    document.addEventListener('DOMContentLoaded', function() {
        inicializarModal('btnEventos', 'Eventos');
    });

//=================PRUEBA============//

function inicializarModal(btnBlog, Blog) {
  var boton = document.getElementById(btnBlog);
  var modal = document.getElementById(Blog);

  boton.addEventListener('mouseenter', function() {
    modal.style.display = 'block';
  });

  boton.addEventListener('mouseleave', function() {
    modal.style.display = 'none';
  });

  function cerrarModal() {
    modal.style.display = 'none';
  }
}
  
  // Llamar a la función inicializarModal en el evento DOMContentLoaded
  document.addEventListener('DOMContentLoaded', function() {
      inicializarModal('btnBlog', 'Blog');
  });


