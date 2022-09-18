        <fieldset>
                <legend>Informacion general</legend>
                <label for="titulo">Titulo</label>
                <input id="titulo" type="text" name="propiedad[titulo]" placeholder="Titulo de propiedad" value="<?php echo s($propiedad->titulo) ?>">

                <label for="precio">Precio:</label>
                <input id="precio" type="number" name="propiedad[precio]" class="margin-auto" min="1" 
                placeholder="Precio de propiedad" value="<?php echo s($propiedad->precio) ?>">

                <label for="imagen">Imagen</label>
                <input id="imagen" name="propiedad[imagen]" type="file" class="margin-auto" accept="image/jpeg, image/png" value="<?php echo s($propiedad->imagen) ?>">
                    <?php if($propiedad->imagen): ?>
                        <img src="/imagenes/<?php echo s($propiedad->imagen) ?>" class="image-small" alt="Imagen de la propiedad"><!-- Muestra la imagen -->
                    <?php endif; ?>

                <label for="descripcion">Descripcion</label>
                <textarea id="descripcion" name="propiedad[descripcion]" placeholder="Escriba la descipción de la propiedad..." ><?php echo s($propiedad->descripcion) ?></textarea>
            </fieldset>

            <fieldset>
                <legend>Información de propiedad</legend>

                <label for="habitaciones">Habitaciones:</label>
                <input type="number" name="propiedad[habitaciones]" class="margin-auto" id="habitaciones" 
                placeholder="Ejemplo: 3" min="1" max="9" value="<?php echo s($propiedad->habitaciones) ?>">

                <label for="wc">Baños</label>
                <input type="number" name="propiedad[wc]" class="margin-auto" id="wc" placeholder="Ejemplo: 3"
                min="1" max="20" value="<?php echo s($propiedad->wc) ?>">

                <label for="garaje">Estacionamientos:</label>
                <input type="number" name="propiedad[estacionamiento]" class="margin-auto" id="garage" 
                placeholder="Ejemplo: 3" min="1" max="9" value="<?php echo s($propiedad->estacionamiento) ?>">

            </fieldset>

            <fieldset>
                <legend>Vendedor</legend>
                <label for="vendedor">Vendedores</label>
                <select class="margin-auto" name="propiedad[vendedores_id]" id="vendedor">
                    <option value="" selected disabled>Selecione</option>
                    
                    <?php  foreach ($vendedores as $vendedor) : ?>
                        <!-- Con la variable se obtiene el id del vendedor y si se a seleccionado algun vendedor le coloca la propiedad
                        selected, por si tiene un error o actualiza no se pierde la selección. (Con el operador ternario)  -->
                        <option 
                            <?php echo $propiedad->vendedores_id === $vendedor->id ? 'selected' : ''; ?>
                            value="<?php echo s($vendedor->id); ?>">
                            <!-- Muestra los nombres de los vendedores en las opciones de select-->
                            <?php echo s($vendedor->nombre) . " " . s($vendedor->apellido); ?>
                        </option>
                    <?php endforeach; ?>

                </select>
            </fieldset>