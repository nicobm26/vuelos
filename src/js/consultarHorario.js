const vuelo= {
    id: '',
    nombre: '',
    fecha: '',
    hora: '',
    servicios: []
}

document.addEventListener('DOMContentLoaded', function(){
    iniciarApp();
})

function iniciarApp(){
    mostrarSeccion();  //muestra y oculta secciones
 
    consultarAPI();  //Consulta la API en el backend de PHP
    
    idCliente();
    nombreCliente(); //Añande el nombre del cliente al objeto cita
    seleccionarFecha(); //Añade la fecha de la cita en el objeto
    seleccionarHora();
}


    function consultar(vuelos=[], fecha=""){
        // console.log("fecha:"+ fecha);
        // Filtrar los vuelos cuya fecha de salida o llegada sea anterior a la fecha deseada
        console.log("holaaaaaaaaaaaa")
        console.log(vuelos)
        if(vuelos.length > 0){
            let vuelosFiltrados = vuelos.filter(function(vuelo) {
                // Convertir la fecha de salida y la fecha de llegada a objetos Date
                let fechaBusqueda = new Date(fecha);
                // console.log("fechaBusqueda: " + fechaBusqueda);
                
                let fechaSalida = new Date(vuelo.FechaSalida);
                // console.log("fechaSalida: " + fechaSalida);
                // Comparar las fechas
                return fechaSalida.getTime() == fechaBusqueda.getTime();
            });   
            console.log(vuelosFiltrados);
            
            actualizarHml2(vuelosFiltrados);
        }
        
    }

    function actualizarHml2(vuelosFiltrados){
        let divVuelo = document.querySelector("#infovuelo");
        let parrafos = divVuelo.getElementsByTagName("p");

    // Iterar sobre la lista de elementos <p> y eliminarlos uno por uno
        for (let i = parrafos.length - 1; i >= 0; i--) {
            let parrafo = parrafos[i];
            parrafo.parentNode.removeChild(parrafo);
        }

        console.log("Vuelosss:" + vuelosFiltrados);

        // if(vuelosFiltrados.length>0){
            // Convertir los vuelos filtrados de nuevo a JSON
            let vuelosJson = JSON.stringify(vuelosFiltrados);

            // Crear un formulario y agregar los datos de vuelos como un campo oculto
            let formulario = document.createElement('form');
            formulario.setAttribute('method', 'post');
            // formulario.setAttribute('action', 'controlador.php');

            let inputVuelos = document.createElement('input');
            inputVuelos.setAttribute('type', 'hidden');
            inputVuelos.setAttribute('name', 'vuelos');
            inputVuelos.setAttribute('value', vuelosJson);

            formulario.appendChild(inputVuelos);

            // Adjuntar el formulario al cuerpo del documento y enviarlo
            document.body.appendChild(formulario);
            formulario.submit();
        // }
    }
