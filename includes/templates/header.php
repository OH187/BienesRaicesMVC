<?php 
    //Verificar si esta existe la variable o funcion global $_SESSION dentro del archivo e inicia la sesion 
    if(!isset($_SESSION)){
        session_start();
    }
    $autenticado = $_SESSION['login'] ?? false;
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienes Raices</title>
    <link rel="stylesheet" href="/build/css/app.css">
</head>
<body>
    <header class="header <?php echo $inicio ? 'inicio' : ''?>"> <!-- Este codigo php permite colocar la foto al header solo en el index -->
        <div class="contenedor contenido-header">
            <div class="barra">
                <div class="imagen-logo">
                    <a href="index.php">
                        <img src="/build/img/logo.svg" alt="Logotipo de bienes Raices">
                    </a>
                </div>
                <div class="mobile-menu">
                    <img src="/build/img/barras.svg" alt="Icono de menu responsive">
                </div>
                
                <div class="derecha">
                    <img class="dark-mode-boton" src="/build/img/dark-mode.svg" alt="Cambio a modo oscuro">
                    <nav class="navegacion mostrar">
                        <a href="index.php">Inicio</a>
                        <a href="nosotros.php">Nosotros</a>
                        <a href="anuncios.php">Anuncios</a>
                        <a href="blog.php">Blog</a>
                        <a href="contacto.php">Contacto</a>
                        <?php if($autenticado): ?>
                            <a href="cerrar-sesion.php">Cerrar Sesión</a>
                        <?php endif; ?>
                    </nav>
                </div>
            </div> <!-- Cierre de barra -->
            <?php echo $inicio ? "<h1>Venta de Casas y Departamentos Exclusivos de Lujo</h1>" : '';
            //Lo de abajo es lo mismo de arriba solo que con el operador ternario
                /* if($inicio){
                    echo "<h1>Venta de Casas y Departamentos Exclusivos de Lujo</h1>";
                } */
            ?>
        </div>
    </header>