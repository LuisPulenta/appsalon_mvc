<h1 class="nombre-pagina">Olvidé Password</h1>
<p class="descripcion-pagina">Reestablece tu Password escribiendo tu email a continuación</p>

<?php
include_once __DIR__ . "/../templates/alertas.php";    
?>

<form class ="formulario" method="POST" action="/olvide">
    <div class="campo">
        <label for="email">Email</label>
        <input type="email" id="email" placeholder="Ingrese Email..." name="email">
    </div>

    <input type="submit" class="boton" value="Enviar instrucciones">
</form>

<div class="acciones">
    <a href="/">¿Ya tienes una Cuenta?. Inicia Sesión</a>
    <a href="/crear-cuenta">¿Aún no tienes una cuenta?. Crea una...</a>
</div>

