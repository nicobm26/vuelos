<a href="/" class="boton">Volver</a>
<div class="card" id="infovuelo">
    <div class="card--card">
        <p>Aeropuerto Origen:  <?php echo $vuelo->aeropuertoOrigen ?> </p>
        <p>Aeropuerto Destino: <?php echo $vuelo->aeropuertoDestino ?> </p>
    </div>
    <div class="card--card">
        <p>Fecha Salida: <?php echo $vuelo->FechaSalida  . " " . $vuelo->HoraSalida?> </p>
        <p>Fecha LLegada: <?php echo $vuelo->FechaLlegada  . " " . $vuelo->HoraLlegada?> </p>
    </div>
    <div class="card--card">
        <p>Asientos Disponibles: <?php echo $asientosDisponibles ?></p>
        <p>Precio: <?php echo $vuelo->precio ?> </p>
    </div>            
    <form method="post" class="card--centrar-diferente">
            <select name="metodo_pago" id="metodo_pago">
                <?php foreach($tarjetas as $tarjeta) {?>
                    <option value="<?php echo $tarjeta->id?>"><?php echo $tarjeta->nombre ?></option>                
                <?php } ?>
            </select>
       
        <input type="hidden" name="idVuelo" value="<?php echo $vuelo->id ?>">
        <input type="submit" value="Reservar">
    </form>
</div>   

        