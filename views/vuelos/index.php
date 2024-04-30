<a href="/logout" class="boton">Cerrar Sesion</a>
<form method="GET" id="buscarHorario">
    <div class="opciones">
        <div>
            <p>Consultar por horario:</p>
            <input type="date" id="fecha" name="fecha">    
        </div>
        <div>
            <p>Consultar por precio:</p>
            <input type="number" id="precio" name="precio" placeholder="Ejemplo: 400000">    
        </div>
    </div>    
    <input type="submit" value="Consultar" class="boton">
</form>
    
    <?php
    if(!empty($vuelos)){
        for($i=0; $i<count($vuelos); $i++) { ?>    
        <div class="card" id="infovuelo">
            <div class="card--card">
                <p>Aeropuerto Origen:  <?php echo $vuelos[$i]->aeropuertoOrigen ?> </p>
                <p>Aeropuerto Destino: <?php echo $vuelos[$i]->aeropuertoDestino ?> </p>
            </div>
            <div class="card--card">
                <p>Fecha Salida: <?php echo $vuelos[$i]->FechaSalida  . " " . $vuelos[$i]->HoraSalida?> </p>
                <p>Fecha LLegada: <?php echo $vuelos[$i]->FechaLlegada  . " " . $vuelos[$i]->HoraLlegada?> </p>
            </div>
            <div class="card--centrar">
                <p>Precio: <?php echo $vuelos[$i]->precio ?> </p>
            </div>
            <a class="card--centrar" href="/vuelo?id=<?php echo $vuelos[$i]->id ?>">Ver mas información</a>    
        </div>   
        <?php } ?>
    <?php }else{ ?>
        <p>No hay vuelos con dicha información</p>
    <?php }?>
<?php
    $script = "
    <script src='build/js/consultarHorario.js'> </script>"
?>