            <fieldset>
                <legend>Informacion general</legend>
                <label for="titulo">Titulo</label>
                <input id="titulo" type="text" name="entrada[titulo]" placeholder="Titulo del blog" value="<?php echo s($entrada->titulo) ?>">

                <label for="descripcion">Contenido del blog</label>
                <textarea id="descripcion" name="entrada[texto]" placeholder="Escriba el contenido del blog..." ><?php echo s($entrada->texto) ?></textarea>
                

                <label for="imagen">Imagen</label>
                <input id="imagen" name="entrada[imagen]" type="file" class="margin-auto" accept="image/jpeg, image/png" value="<?php echo s($entrada->imagen) ?>">
                    <?php if($entrada->imagen): ?>
                        <img src="/imagenesBlog/<?php echo $entrada->imagen ?>" class="image-small" alt="Imagen del blog"><!-- Muestra la imagen -->
                    <?php endif; ?>
                        
            </fieldset>
            
            <fieldset>
                <legend>Vendedor</legend>
                <label for="vendedor">Vendedores</label>
                <select class="margin-auto" name="entrada[vendedorId]" id="vendedor">
                    <option value="" selected disabled>Selecione</option>
                    
                    <?php  foreach ($vendedores as $vendedor) : ?>
                        <!-- Con la variable se obtiene el id del vendedor y si se a seleccionado algun vendedor le coloca la propiedad
                        selected, por si tiene un error o actualiza no se pierde la selección. (Con el operador ternario)  -->
                        <option 
                            <?php echo $entrada->vendedorId === $vendedor->id ? 'selected' : ''; ?>
                            value="<?php echo s($vendedor->id); ?>">
                            <!-- Muestra los nombres de los vendedores en las opciones de select-->
                            <?php echo s($vendedor->nombre) . " " . s($vendedor->apellido); ?>
                        </option>
                    <?php endforeach; ?>

                </select>
            </fieldset>
        