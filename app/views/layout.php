<?PHP
    require_once __DIR__ . ('/../../config/config.php');
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TechZone - Tienda de infomática</title> <!--Esta es la plantilla de la web, la vista. por lo que es importante rellenar todo el esqueleto para no repetirlo todo el rato-->
    <link rel="stylesheet" href=<?php echo BASE_URL; ?> '/../../public/assests/style.css'> <!--tienes que coger y salir de la ruta y entrar en public así-->
</head>
<body>
    <header>

        <h1>TechZone - Tu tienda de informática  </h1>

            <nav>
                <ul>
                    <li><a href="/">Inicio</a></li> <!--Se utiliza en href= / porque de esta manera se busca el index-->
                </ul>
            </nav>

        <div class="botones-login">
            <a href=<?PHP echo BASE_URL; ?> "/registro">Registro</a>
        </div>

    </header>

    <main>
        <?php if (isset($vista)) include $vista; ?>
    </main>

    <footer>
        <p>$copy; <?=date('Y') ?> TechZone. Todos los derechos reservados. </p>
    </footer>
</body>
</html>