
    <main class="contenedor seccion">
        <h1>Ingresar propiedad</h1>
        
        
    <?php foreach($errores as $error): ?><!-- Permite recorrer el arreglo de errores y guardarlo en un alias -->
            <div class="alerta error">
                <?php echo $error ?> <!-- Muestra el mensaje de error -->
            </div>
        <?php  endforeach;?>

        <a href="/admin" class="boton boton-verde">Volver</a>
        <form class="formulario" method="POST" enctype="multipart/form-data"> <!-- enctype="multipart/form-data" si quieres subir imagenes -->
            <?php include __DIR__ . '/formulario_propiedad.php'; ?>
            <div class="alinear-derecha"><input type="submit" value="Agregar propiedad" class="boton-verde alinear-derecha"></div>
        </form>
    </main>