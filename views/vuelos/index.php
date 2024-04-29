<form method="get" id="buscarHorario">
    <p>Consultar por horario</p>
    <input type="date" id="fecha" name="fecha">
    <input type="hidden" name="vuelos" id="vuelos" value='<?php echo json_encode($vuelos) ?>'>    
    <input type="submit" value="Enviar">
</form>

<?php 
    if(!empty($vuelos)){
        foreach($vuelos as $vuelo) { ?>    
        <div class="info" id="infovuelo">
            <p>iD: <?php echo $vuelo->id ?> </p>
            <p>Aeropuerto Origen:  <?php echo $vuelo->aeropuertoOrigen ?> </p>
            <p>Aeropuerto Destino: <?php echo $vuelo->aeropuertoDestino ?> </p>
            <p>Precio: <?php echo $vuelo->precio ?> </p>
            <p>Fecha Salida: <?php echo $vuelo->FechaSalida  . " " . $vuelo->HoraSalida?> </p>
            <p>Fecha LLegada: <?php echo $vuelo->FechaLlegada  . " " . $vuelo->HoraLlegada?> </p>
        </div>   
        <?php } ?>
    <?php }else{ ?>
        <p>No hay vuelos en esta fecha</p>     
    <?php } ?>

<?php
    $script = "
    <script src='build/js/consultarHorario.js'> </script>"
?>