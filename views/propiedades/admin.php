<main class="contenedor seccion">
        <h1>Administrador de Bienes Raices</h1>
            <?php 
            if($resultado){
                $mensaje = mostrarNotificaciones(intval($resultado));
                if($mensaje): ?>
                <p class="alerta exito"><?php echo s($mensaje) ?></p>
            <?php 
            endif; 
            }
            ?>

            <a href="propiedades/crear" class="boton boton-verde">Nueva propiedad</a>
            <a href="/vendedores/crear" class="boton boton-amarillo-inline ">Nuevo vendedor</a>
            <a href="blog/crear" class="boton boton-amarillo-inline ">Nuevo blog</a>

                                    <h2>Propiedades</h2>
                <table class="propiedades">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Titulo</th>
                            <th>Imagen</th>
                            <th>Precio</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>

                <tbody> <!-- Mostrar los resultados -->
                <?php foreach($propiedades as $propiedad): ?>
                
                    <tr>
                        <td> <?php echo $propiedad->id; ?> </td>
                        <td> <?php echo $propiedad->titulo; ?> </td>
                        <td><img src="/imagenes/<?php echo $propiedad->imagen; ?>" alt="Imagen de casa" class="imagen-tabla"></td>
                        <td> $<?php echo $propiedad->precio; ?> </td>
                        <td>
                            <form method="POST" class="w-100" action="/propiedades/eliminar">
                            <input type="hidden" name="id" value="<?php echo $propiedad->id; ?>">
                            <input type="hidden" name="tipo" value="propiedad">
                            <input type="submit" class="boton-rojo-block boton-tabla" value="Eliminar">
                            </form>
                            
                            <a href="/propiedades/actualizar?id=<?php echo $propiedad->id ?>" class="boton-amarillo boton-tabla">Actualizar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>

            
                                                    <h2>Vendedores</h2>
            <table class="propiedades">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Telefono</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>

                <tbody> <!-- Mostrar los resultados -->
                <?php foreach($vendedores as $vendedor): ?>
                
                    <tr>
                        <td> <?php echo $vendedor->id; ?> </td>
                        <td> <?php echo $vendedor->nombre; ?> </td>
                        <td> <?php echo $vendedor->apellido; ?> </td>
                        <td> <?php echo $vendedor->telefono; ?> </td>
                        <td>
                            <form method="POST" class="w-100" action="/vendedores/eliminar" >
                            <input type="hidden" name="id" value="<?php echo $vendedor->id; ?>">
                            <input type="hidden" name="tipo" value="vendedor">
                            <input type="submit" class="boton-rojo-block boton-tabla" value="Eliminar">
                            </form>
                            
                            <a href="/vendedores/actualizar?id=<?php echo $vendedor->id ?>" class="boton-amarillo boton-tabla">Actualizar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>

             
                                <h2>Blog</h2>
            <table class="propiedades">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Titulo</th>
                            <th>Imagen</th>
                            <th>Texto</th>
                            <th>Acciones</th>

                        </tr>
                    </thead>

                <tbody> <!-- Mostrar los resultados -->
                <?php foreach($entradas as $entrada): ?>
                
                    <tr>
                        <td class="td-blog"> <?php echo $entrada->id; ?> </td>
                        <td class="td-blog"> <?php echo $entrada->titulo; ?> </td>
                        <td class="td-blog"><img src="/imagenesBlog/<?php echo $entrada->imagen; ?>" alt="Imagen de casa" class="imagen-tabla"></td>
                        <td class="td-blog"> <?php echo $entrada->texto; ?> </td>
                        <td>
                            <form method="POST" class="w-100" action="/blog/eliminar" >
                            <input type="hidden" name="id" value="<?php echo $entrada->id; ?>">
                            <input type="hidden" name="tipo" value="entrada">
                            <input type="submit" class="boton-rojo-block boton-tabla" value="Eliminar">
                            </form>
                            
                            <a href="/blog/actualizar?id=<?php echo $entrada->id ?>" class="boton-amarillo boton-tabla">Actualizar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>

</main>