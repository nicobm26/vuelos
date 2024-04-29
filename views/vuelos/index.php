<form method="GET" id="buscarHorario">
    <div>
        <p>Consultar por horario:</p>
        <input type="date" id="fecha" name="fecha">    
    </div>
    <div>
        <p>Consultar por precio:</p>
        <input type="number" id="precio" name="precio">    
    </div>
    <input type="submit" value="Enviar">
</form>
    
    <?php
    if(!empty($vuelos)){
        for($i=0; $i<count($vuelos); $i++) { ?>    
        <div class="info" id="infovuelo">
            <p>iD: <?php echo $vuelos[$i]->id ?> </p>
            <p>Aeropuerto Origen:  <?php echo $vuelos[$i]->aeropuertoOrigen ?> </p>
            <p>Aeropuerto Destino: <?php echo $vuelos[$i]->aeropuertoDestino ?> </p>
            <p>Precio: <?php echo $vuelos[$i]->precio ?> </p>
            <p>Fecha Salida: <?php echo $vuelos[$i]->FechaSalida  . " " . $vuelos[$i]->HoraSalida?> </p>
            <p>Fecha LLegada: <?php echo $vuelos[$i]->FechaLlegada  . " " . $vuelos[$i]->HoraLlegada?> </p>
        </div>   
        <?php } ?>
    <?php }else{ ?>
        <p>No hay vuelos con dicha información</p>
    <?php }?>
<?php
    $script = "
    <script src='build/js/consultarHorario.js'> </script>"
?>