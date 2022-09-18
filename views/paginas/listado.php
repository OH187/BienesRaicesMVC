<div class="contenedor-anuncios">
        <?php foreach($propiedades as $propiedad): ?> <!-- Esto para iterar en la tabla -->
            <div class="anuncio" data-cy="anuncio">

                    <img loading="lazy" src="/imagenes/<?php echo $propiedad->imagen; ?>" alt="Imagen 1 anuncio">

                <div class="contenido-anuncio">
                    <h2><?php echo $propiedad->titulo; ?></h2>
                    <p><?php echo $propiedad->descripcion; ?></p>
                    <p class="precio"><?php echo $propiedad->precio; ?></p>
                    <ul class="iconos-caracteristicas">
                        <li>
                            <img class="icono" loading="lazy" src="build/img/icono_wc.svg" alt="icono wc">
                            <p><?php echo $propiedad->wc; ?></p>
                        </li>
                        <li>
                            <img class="icono" loading="lazy" src="build/img/icono_estacionamiento.svg" alt="icono estacionamiento">
                            <p><?php echo $propiedad->estacionamiento; ?></p>
                        </li>
                        <li>
                            <img class="icono" loading="lazy" src="build/img/icono_dormitorio.svg" alt="icono icono habitaciones">
                            <p><?php echo $propiedad->habitaciones; ?></p>
                        </li>
                    </ul>
                    <a data-cy="enlace-propiedad" href="/propiedad?id=<?php echo $propiedad->id; ?>" class="boton-amarillo">Ver propiedad</a>
                </div> <!-- contenido-anuncio -->
            </div> <!-- anuncio -->
          <?php endforeach; ?>  
        </div> <!-- contenedor-anuncios -->
