// Función para desplazarse al principio de la página
function scrollArriba() {
    window.scrollTo({
        top: 0,
        behavior: 'smooth' // Desplazamiento suave
    });
}

var textarea = document.getElementById("textarea"); //asignamos el textarea


textarea.scrollTop = textarea.scrollHeight - textarea
    .clientHeight; //definimos la cantidad de scroll, le restamos la altura de la pantalla ya que siempre será mayor, asi nos muestra la última linea