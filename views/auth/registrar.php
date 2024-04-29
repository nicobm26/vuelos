<div class="login">
    <!-- <img src="assets/img/login-bg.png" alt="login image" class="login__img"> -->
    <!-- <img src="assets/img/FONDO.jfif" alt="login image" class="login__img"> -->

    <?php
    include_once __DIR__ . "/../templates/alertas.php";
    ?>


    <form class="login__form" method="POST" action="/registrar" >
        <h1 class="login__title">Login</h1>

        <div class="login__content">
            
            <!-- Cedula -->
            <div class="login__box">
                <i class="ri-user-3-line login__icon"></i>

                <div class="login__box-input">
                    <input 
                        type="number" 
                        required 
                        class="login__input" 
                        id="identificacion" 
                        name="identificacion" 
                        placeholder=" "
                        value="<?php echo s($pasajero->identificacion) ?>"
                        >
                        
                    <label for="identificacion" class="login__label">Cedula</label>
                </div>
            </div>
            <!-- Cedula -->

            <!-- Nombre-->
            <div class="login__box">
                <i class="ri-user-3-line login__icon"></i>

                <div class="login__box-input">
                    <input 
                        type="text" 
                        required
                        class="login__input" 
                        id="nombre" 
                        name="nombre" 
                        placeholder=" "
                        value="<?php echo s($pasajero->nombre) ?>"
                        >
                        
                    <label for="nombre" class="login__label">Nombre</label>
                </div>
            </div>
            <!-- Nombre -->

            <!-- correo -->
            <div class="login__box">
                <i class="ri-user-3-line login__icon"></i>

                <div class="login__box-input">
                    <input 
                        type="email" 
                        required 
                        class="login__input" 
                        id="login-email" 
                        name="email" 
                        placeholder=" "
                        value="<?php echo s($pasajero->email) ?>"
                        >
                        
                    <label for="login-email" class="login__label">Email</label>
                </div>
            </div>
            <!-- correo -->

             <!-- pais -->
             <div class="login__box">
                <i class="ri-user-3-line login__icon"></i>

                <div class="login__box-input">
                    <input 
                        type="text" 
                        required 
                        class="login__input" 
                        id="pais" 
                        name="pais"
                        placeholder=" "
                        value="<?php echo s($pasajero->pais)?>"
                        >
                    <label for="pais" class="login__label">País</label>
                </div>
            </div>
            <!-- Pais -->

            <!-- ciudad -->
            <div class="login__box">
                <i class="ri-user-3-line login__icon"></i>

                <div class="login__box-input">
                    <input 
                        type="text" 
                        required 
                        class="login__input" 
                        id="ciudad" 
                        name="ciudad" 
                        placeholder=" "
                        value="<?php echo s($pasajero->ciudad)?>"
                        >
                    <label for="ciudad" class="login__label">Ciudad</label>
                </div>
            </div>
            <!-- Ciudad -->

            <!-- Direccion -->
            <div class="login__box">
                <i class="ri-user-3-line login__icon"></i>

                <div class="login__box-input">
                    <input 
                        type="text" 
                        required 
                        class="login__input" 
                        id="direccion" 
                        name="direccion" 
                        placeholder=" "
                        value="<?php echo s($pasajero->direccion)?>"
                        >
                    <label for="direccion" class="login__label">Direccion</label>
                </div>
            </div>
            <!-- Direccion -->

             <!-- Codigo Postal -->
             <div class="login__box">
                <i class="ri-user-3-line login__icon"></i>

                <div class="login__box-input">
                    <input 
                        type="text" 
                        required 
                        class="login__input" 
                        id="codigoPostal" 
                        name="codigoPostal" 
                        placeholder=" "
                        value="<?php echo s($pasajero->codigoPostal)?>"
                        >
                    <label for="codigoPostal" class="login__label">Codigo Postal</label>
                </div>
            </div>
            <!-- Codigo Postal -->

            <!-- telefono -->
            <div class="login__box">
                <i class="ri-phone-fill login__icon"></i>

                <div class="login__box-input">
                    <input 
                        type="number" 
                        required 
                        class="login__input" 
                        id="numeroTelefonico" 
                        name="numeroTelefonico" 
                        placeholder=" "
                        value="<?php echo s($pasajero->numeroTelefonico)?>"
                        >
                    <label for="numeroTelefonico" class=" login__label">Telefono</label>
                </div>
            </div>
            <!-- telefono -->

            <!-- password -->
            <div class="login__box">
                <i class="ri-lock-2-line login__icon"></i>

                <div class="login__box-input">
                    <input type="password" 
                        required 
                        class="login__input" 
                        id="password" 
                        name="password" 
                        placeholder=" "
                        >
                    <label for="password" class="login__label">Contraseña</label>
                    <i class="ri-eye-off-line login__eye" id="login-eye1"></i>
                </div>
            </div>
            <!-- password -->

             <!-- Repetir clave , para evitar complique-->
             <!-- <div class="login__box">
                <i class="ri-lock-2-line login__icon"></i>

                <div class="login__box-input">
                    <input type="password" required class="login__input" id="clave-repetida" placeholder=" ">
                    <label for="clave-repetida" class="login__label">Repetir Contraseña</label>
                    <i class="ri-eye-off-line login__eye" id="login-eye2"></i>
                </div>
            </div> -->
            <!-- Repetir clave-->
        </div>

        <button type="submit" class="login__button">Crear Cuenta</button>

        <p class="login__register">
            Ya tienes una cuenta? <a href="/login">Entrar</a>
        </p>
    </form>
</div>

<?php
    $script = "
    <script src='build/js/mostrarPassword.js'> </script> 
    ";
?>