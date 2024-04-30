<div class="info" id="infovuelo">
    <div>
        <p>Aeropuerto Origen:  <?php echo $vuelo->aeropuertoOrigen ?> </p>
        <p>Aeropuerto Destino: <?php echo $vuelo->aeropuertoDestino ?> </p>
    </div>
    <div>
        <p>Fecha Salida: <?php echo $vuelo->FechaSalida  . " " . $vuelo->HoraSalida?> </p>
        <p>Fecha LLegada: <?php echo $vuelo->FechaLlegada  . " " . $vuelo->HoraLlegada?> </p>
    </div>
    <div>
        <p>Asientos Disponibles: <?php echo $asientosDisponibles ?></p>
        <p>Precio: <?php echo $vuelo->precio ?> </p>
    </div>            
    <form method="post">
        <select name="metodo_pago" id="metodo_pago">
            <?php foreach($tarjetas as $tarjeta) {?>
                <option value="<?php echo $tarjeta->id?>"><?php echo $tarjeta->nombre ?></option>                
            <?php } ?>
        </select>
        <input type="hidden" name="idVuelo" value="<?php echo $vuelo->id ?>">
        <input type="submit" value="Reservar">
    </form>
</div>   

        