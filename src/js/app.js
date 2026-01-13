console.log("Desde JS");

/*Como comentar varias lineas de codigo*/

document.addEventListener('DOMContentLoaded', function() {
  eventListeners();

  darkMode();
});

function eventListeners() {
  const mobileMenu = document.querySelector('.mobile-menu');
  mobileMenu.addEventListener('click', menuresponsive);

  ////Muestra de campos 
  const metodoContacto = document.querySelectorAll('input[name="contacto[contacto]"]');
  //console.log(metodoContacto);
  metodoContacto.forEach(input => input.addEventListener('click', mostrarMetodosDeContacto));


}

function menuresponsive () {
  const navegacion = document.querySelector('.navegacion');

  /* Metodo para nuevos usuarios
  if(navegacion.classList.contains('mostrar')) {
    navegacion.classList.remove('mostrar');
  } else {
    navegacion.classList.add('mostrar');
  }

  */

  //Metodo para ususarios un poco mas experimentados
  navegacion.classList.toggle('mostrar');
}


function darkMode () {

  //configuracion automatica de dark mode mediante la lectura de las preferencias del sistema
  const aparienciaDarkMode = window.matchMedia('(prefers-color-scheme: dark)');
  //console.log(aparienciaDarkMode);

  if (aparienciaDarkMode.matches) {
    document.body.classList.add('dark-mode');
  } else {
    document.body.classList.remove('dark-mode');
  }

  aparienciaDarkMode.addEventListener('change', () => {
    if (aparienciaDarkMode.matches) {
      document.body.classList.add('dark-mode');
      } else {
        document.body.classList.remove('dark-mode');
    }
  });



  const botonDarckMode = document.querySelector('.dark-mode-boton');

    botonDarckMode.addEventListener('click', function() {
      document.body.classList.toggle('dark-mode');
      console.log('Click en icono darkmode')
  });
}

function mostrarMetodosDeContacto (event) {
  //console.log('Seleccionando modo');
  const contactoDiv = document.querySelector('#contacto');
  //contactoDiv.textContent = 'Diste Click'; //comprobacion de comunicacion
  //console.log(event);


  if(event.target.value === 'telefono') {
    //console.log('Selecciono telefono');
    contactoDiv.innerHTML = `
      <label for="telefono">Num tel:</label>
      <input type="tel" placeholder="Tu telefono" id="telefono"  name="contacto[telefono]">

      <p>Elija la fecha y la hora</p>

      <label for="fecha">Fecha</label>
      <input type="date" placeholder="Fecha" id="fecha"  name="contacto[fecha]">

      <label for="hora">Hora</label>
      <input type="time" placeholder="hora" id="hora" min="09:00" max="18:00"  name="contacto[hora]">
    `;
  } else if(event.target.value === 'email') {
    //console.log('Selecciono el modo email');
    contactoDiv.innerHTML = `
    <label for="mail">E-mail</label>
    <input type="email" placeholder="Tu e-mail" id="mail" name="contacto[email]"a>
    `;
  }
}

