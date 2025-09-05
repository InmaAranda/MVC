
<!--AQUÍ NO HACE FALTA ABRIR NI CERRAR NI PHP NI HTML PORQUE YA LO COGE DE OTROS ARCHIVOS CON SUS FUNCIONALIDADES
form action es la url del sitio donde quiero redirigir

El modelo vista sólo tiene el formulario, lo demás está abstraido
-->
<form action="/altaUsuario" method="post"> 

    <div>
        <label for="nombre usuario">Nombre de usuario: <small>*</small></label>
        <input type="text" name="nombre_usuario" id="nombre_usuario" required>
    </div>

    <div>
        <label for="email">Correo electrónico:<small>*</small> </label>
        <input type="email" name="email" id="email" required> 
    </div>

    <div>
        <label for="password">Contraseña:<small>*</small> </label>
        <input type="password" name="password" id="password" required>
    </div>

    <div>
        <input type="submit" value="Registrarse">
    </div>

</form>