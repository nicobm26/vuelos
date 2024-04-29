<form method="GET" id="buscarHorario">
    <p>Consultar por horario:</p>
    <input type="date" id="fecha" name="fecha">    
    <input type="submit" value="Enviar">
</form>

<form method="GET" id="buscarHorario">
    <p>Consultar por precio:</p>
    <input type="number" id="precio" name="precio">    
    <input type="submit" value="Enviar">
</form>

<?php 
    if($vuelo !== null && !empty($vuelo)){ ?>
        <div class="info" id="infovuelo">
            <p>Id: <?php echo $vuelo[0]->id ?> </p>
            <p>Aeropuerto Origen:  <?php echo $vuelo[0]->aeropuertoOrigen ?> </p>
            <p>Aeropuerto Destino: <?php echo $vuelo[0]->aeropuertoDestino ?> </p>
            <p>Precio: <?php echo $vuelo[0]->precio ?> </p>
            <p>Fecha Salida: <?php echo $vuelo[0]->FechaSalida  . " " . $vuelo[0]->HoraSalida?> </p>
            <p>Fecha LLegada: <?php echo $vuelo[0]->FechaLlegada  . " " . $vuelo[0]->HoraLlegada?> </p>
        </div>   
    <?php }else{?>
        <p>No hay vuelos en esta fecha</p>
    <?php } ?>
    
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
    <?php } ?>
<?php
    $script = "
    <script src='build/js/consultarHorario.js'> </script>"
?>