<main class="contenedor seccion contenido-centrado">
        <h1 data-cy="heading-login">Iniciar Sesión</h1>
        <?php foreach($errores as $error): ?>
            <div data-cy="alerta-login" class="alerta error"><?php echo $error;?></div>
        <?php endforeach; ?>

        <form data-cy="formulario-login" method="POST" action="/login" class="formulario" novalidate>
                    <label  for="email">E-mail</label>
                    <input data-cy="input-correo" type="email" name="email" placeholder="Correo" id="email" class=" margin-auto" >

                    <label for="password">Password</label>
                    <input data-cy="input-password" type="password" name="password" placeholder="Escriba su contraseña" id="password" class=" margin-auto" >

                <div class="alinear-derecha">
                    <input type="submit" class="boton-verde alinear-derecha" value="Iniciar Sesión">
                </div>
        </form>

    </main>