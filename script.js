// script.js

// Función para la validación del formulario
function validarFormulario() {
  const nombre = document.getElementById('nombre').value;
  const correo = document.getElementById('correo').value;
  const asunto = document.getElementById('asunto').value;
  const comentario = document.getElementById('comentario').value;
  let validado = true;

  // Verificar si todos los campos están completos
  if (!nombre || !correo || !asunto || !comentario) {
    alert('Por favor, complete todos los campos del formulario.');
    validado = false;
  }

  // Validar correo electrónico
  const correoRegex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
  if (!correoRegex.test(correo)) {
    alert('Por favor, ingrese un correo electrónico válido.');
    validado = false;
  }

  return validado;
}

// Evento para cambiar el texto del botón y mostrar un indicador de carga
document.querySelector('form').addEventListener('submit', function(e) {
  e.preventDefault(); // Prevenir el envío del formulario hasta que se valide

  const submitButton = document.querySelector('input[type="submit"]');
  submitButton.value = 'Enviando...'; // Cambiar el texto del botón
  submitButton.classList.add('loading'); // Añadir la clase para el estado de carga

  // Simular un pequeño retraso para la acción de envío
  setTimeout(function() {
    if (validarFormulario()) {
      // Si el formulario es válido, muestra el mensaje de éxito
      document.querySelector('.mensaje-exito')?.classList.remove('hidden');
      submitButton.value = 'Enviar'; // Restablecer el texto del botón
      submitButton.classList.remove('loading');
    } else {
      submitButton.value = 'Enviar'; // Restablecer el texto del botón si no es válido
      submitButton.classList.remove('loading');
    }
  }, 1500); // 1.5 segundos de retraso para simular el proceso de envío
});

// Para mostrar el mensaje de éxito al enviar el formulario
document.addEventListener('DOMContentLoaded', function() {
  const successMessage = document.createElement('div');
  successMessage.classList.add('mensaje-exito', 'hidden');
  successMessage.textContent = 'Mensaje enviado correctamente.';
  document.querySelector('main').appendChild(successMessage);
});
