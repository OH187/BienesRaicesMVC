<main class="contenedor seccion" data-cy="contacto">
        <h1 data-cy="heading-contacto">¡Contáctanos!</h1>

        <picture >
            <source srcset="build/img/destacada3.webp" type="image/webp">
            <source srcset="build/img/destacada3.jpg" type="image/jpeg">
            <img loading="lazy" src="build/img/destacada3.jpg" alt="Imagen contacto">
        </picture>

       

        <h3>Por favor llene el formulario</h3>
        <?php if($mensaje){ ?>
            <p data-cy="alerta-exito" class='alerta exito'><?php echo $mensaje;?></p>
        <?php } ?> 
        
        <form data-cy="formulario-contacto" class="formulario" action="/contacto" method="POST">
            <fieldset>
                <legend>Información personal</legend>
                <label for="nombre">Nombre</label>
                <input data-cy="input-nombre" type="text" placeholder="Nombre" id="nombre" name="contacto[nombre]" required>                

                <label for="mensaje">Mensaje</label>
                <textarea data-cy="input-mensaje" id="mensaje" name="contacto[mensaje]" required></textarea>
            </fieldset>

            <fieldset>
                <legend>Informacion de la propiedad</legend>
                <label for="opciones">Vende o Compra</label>
            
                <select data-cy="input-opciones" id="opciones" class="margin-auto" name="contacto[tipo]" required>
                    <option value="" disabled selected>Seleccione</option>
                    <option value="vende">Vende</option>
                    <option value="compra">Compra</option>
                </select>

                <label for="presupuesto">Precio o Presupuesto</label>
                <input data-cy="input-precio" type="number" placeholder="Tu pecio o presupuesto" id="presupuesto" class="margin-auto" name="contacto[precio]" required>
            </fieldset>

            <fieldset>
                <legend>Contacto</legend>
                <p>¿Como desea ser contactado?</p>
                        <div class="form-contacto">
                            
                <label for="contacto-telefono">Telefono</label>
                <input data-cy="forma-contacto" type="radio" value="telefono" id="contacto-telefono" name="contacto[contacto]" required>
                
                <label for="contacto-email">E-mail</label>
                <input data-cy="forma-contacto" type="radio" value="email" id="contacto-email" name="contacto[contacto]" required>
                
                </div>
                <div id="contacto"></div> <!-- El contenido viene de app.js -->

            </fieldset>
            
            <div class="alinear-derecha"><input data-cy="boton-formulario" type="submit" value="Enviar" class="boton-verde alinear-derecha"></div>
        </form>
    </main>
