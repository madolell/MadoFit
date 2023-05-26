// Obtener el formulario de inicio de sesión
const loginForm = document.getElementById('login-form');

// Agregar un manejador de eventos de submit al formulario de inicio de sesión
$(loginForm).submit(function(event) {
  // Detener la acción por defecto del formulario (enviar una solicitud)
  event.preventDefault();

  // Obtener los datos del formulario
  const username = $('#username').val();
  const password = $('#password').val();

  // Enviar la solicitud de inicio de sesión al servidor utilizando AJAX
  $.ajax({
    url: 'login.php',
    type: 'POST',
    data: {username: username, password: password},
    success: function(response) {
      // Manejar la respuesta del servidor
      console.log(response);
    },
    error: function(xhr, status, error) {
      // Manejar el error
      console.error(error);
    }
  });
});
