document.addEventListener('DOMContentLoaded', function(){
        // eventListeners();
        darkMode();
});

function darkMode(){
    const preferDarkMode = window.matchMedia('(prefers-color-scheme: dark)');//Toma el tema del sistema
    // console.log(preferDarkMode.matches);
    
    //Permite tomar el tema por defecto del sistema operativo del usuario
    if (preferDarkMode.matches) {
        document.body.classList.add('dark-mode'); //Selecciona todo el documento y le agrega la clase
    }
    else{
        document.body.classList.remove('dark-mode'); //Remueve la clase de dark-mode
    }

    /* Este código me permite colocar el modo oscuro automaticamente si el usuario lo habilita
     en su computadora */
    preferDarkMode.addEventListener('change', function (){ //Esto automaticamente coloca el color predeterminado
        if (preferDarkMode.matches) {
            document.body.classList.add('dark-mode');
        }
        else{
            document.body.classList.remove('dark-mode');
        }
    });

    //Boton para poner modo oscuro 
    const botonDarkMode = document.querySelector(".dark-mode-boton");
    //Agregando o quitando el modo oscuro
    botonDarkMode.addEventListener('click', function(){
        document.body.classList.toggle("dark-mode");
    });
}


    var mobilMenu = document.querySelector(".mobile-menu"); //Debemos poner dobles comillas si queremos seleccionar con clase
    mobilMenu.addEventListener('click', function(){
        var navegacion = document.querySelector(".navegacion");
       navegacion.classList.toggle("mostrar"); //Una alternativa al código de abajo, el toggle ayuda a quitar o mostrar como el if
        });
        


        function mostrarMetodoContacto(evento){
            const contactoDiv = document.querySelector('#contacto');

            console.log(evento);

            if(evento.target.value ==='telefono'){ //Esto lo tomamos al mandar a consola el evento y buscar el target y su valor
                contactoDiv.innerHTML  = `

                <label for="telefono">Digite su telefono</label>
                <input data-cy="input-telefono" type="tel" placeholder="Telefono" id="telefono" name="contacto[telefono]">
                
                <p>Elija fecha y hora para la llamada</p>

                <label for="fecha">Fecha</label>
                <input data-cy="input-fecha" type="date"  id="fecha" class="margin-auto" name="contacto[fecha]">

                <label for="hora">Hora</label>
                <input data-cy="input-hora" type="time"  id="hora" min="09:00" max="18:00" class="margin-auto" name="contacto[hora]"> 
                `;
            }else{
                contactoDiv.innerHTML = `
                <label for="email">Escriba su  E-mail</label>
                <input data-cy="input-email" type="email" placeholder="Correo electrónico" id="email" name="contacto[email]" required>

                `;
            }
        }

        //Muestra el campo de telefono si el usuario da click en esa opcion
        const metodoContacto = document.querySelectorAll('input[name="contacto[contacto]"]'); //selecciona todos los elementos que contienen ese nombre
        metodoContacto.forEach(input => input.addEventListener('click', mostrarMetodoContacto)); //Debes iterar para leer los datos cuando usas querySelectorAll. Porque es una serie de elementos


    /*  if(navegacion.classList.contains('mostrar')){
        navegacion.classList.remove('mostrar');
    }else{
        navegacion.classList.add('mostrar');
    } */
