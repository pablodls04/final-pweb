
function validarFormulario() {
  const nombre = document.getElementById('nombre').value;
  const correo = document.getElementById('correo').value;
  const asunto = document.getElementById('asunto').value;
  const comentario = document.getElementById('comentario').value;
  let validado = true;

  
  if (!nombre || !correo || !asunto || !comentario) {
    alert('Por favor, complete todos los campos del formulario.');
    validado = false;
  }

 
  const correoRegex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
  if (!correoRegex.test(correo)) {
    alert('Por favor, ingrese un correo electrónico válido.');
    validado = false;
  }

  return validado;
}


document.querySelector('form').addEventListener('submit', function(e) {
  e.preventDefault(); 

  const submitButton = document.querySelector('input[type="submit"]');
  submitButton.value = 'Enviando...'; 
  submitButton.classList.add('loading'); 

  setTimeout(function() {
    if (validarFormulario()) {

      document.querySelector('.mensaje-exito')?.classList.remove('hidden');
      submitButton.value = 'Enviar'; 
      submitButton.classList.remove('loading');
    } else {
      submitButton.value = 'Enviar'; 
      submitButton.classList.remove('loading');
    }
  }, 1500); 
});


document.addEventListener('DOMContentLoaded', function() {
  const successMessage = document.createElement('div');
  successMessage.classList.add('mensaje-exito', 'hidden');
  successMessage.textContent = 'Mensaje enviado correctamente.';
  document.querySelector('main').appendChild(successMessage);
});
