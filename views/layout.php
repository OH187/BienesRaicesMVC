<?php 
    //Verificar si esta existe la variable o funcion global $_SESSION dentro del archivo e inicia la sesion 
    if(!isset($_SESSION)){
        session_start();
    }
    $autenticado = $_SESSION['login'] ?? false;

    if(!isset($inicio)){
        $inicio = false;
    }
    
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienes Raices</title>
    <link rel="stylesheet" href="../build/css/app.css">
</head>
<body>
    <header class="header <?php echo $inicio ? 'inicio' : ''?>"> <!-- Este codigo php permite colocar la foto al header solo en el index -->
        <div class="contenedor contenido-header">
            <div class="barra">
                <div class="imagen-logo">
                    <a href="/">
                        <img loading="lazy" src="../build/img/logo.svg" alt="Logotipo de bienes Raices">
                    </a>
                </div>
                <div class="mobile-menu">
                    <img src="../build/img/barras.svg" alt="Icono de menu responsive">
                </div>
                
                <div class="derecha">
                    <img class="dark-mode-boton" src="../build/img/dark-mode.svg" alt="Cambio a modo oscuro">
                    <nav data-cy="navegacion-header" class="navegacion mostrar">
                        <a href="/nosotros">Nosotros</a>
                        <a href="/propiedades">Propiedades</a>
                        <a href="/blog">Blog</a>
                        <a href="/contacto">Contacto</a>
                        
                    <!-- Aparece iniciar sesion si no a iniciado si ya inicicio lo quita -->
                        <?php if($autenticado): ?>
                            <a href="/logout">Cerrar Sesión</a>
                        <?php endif; ?>

                    </nav>
                </div>
            </div> <!-- Cierre de barra -->
            <?php echo $inicio ? "<h1 data-cy='heading-sitio'>Venta de Casas y Departamentos Exclusivos de Lujo</h1>" : '';
            //Lo de abajo es lo mismo de arriba solo que con el operador ternario
                /* if($inicio){
                    echo "<h1>Venta de Casas y Departamentos Exclusivos de Lujo</h1>";
                } */
            ?>
        </div>
    </header>

    <?php echo $contenido; /* Esta variable viene del archivo Router */ ?> 

    <footer class="footer seccion">
        <div class="contenedor contenedor-footer">
            <nav data-cy="navegacion-footer" class="navegacion ">
                <a href="/nosotros">Nosotros</a>
                <a href="/propiedades">Propiedades</a>
                <a href="/blog">Blog</a>
                <a href="/contacto">Contacto</a>
            </nav>
        </div>
        
        <p class="copyright">Todos los derechos reservados &copy; GHEO <?php echo date('Y'); ?> </p> 
    </footer>
    <script src="../build/js/bundle.min.js"></script> <!-- Colocamos / antes de la ruta pra que busque desde la raiz del proyecto -->
</body>
</html> 