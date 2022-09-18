<main class="contenedor seccion contenido-centrado">
   
        <h1><?php echo $entrada->titulo; ?></h1>


            <img loading="lazy" src="/imagenesBlog/<?php echo $entrada->imagen; ?>" alt="Imagen del blog">
    
        <p class="informacion-meta">Escrito el: <span><?php echo $entrada->fecha; ?></span> por: 
            <span>   <?php
                /* El siguiente codigo me sirve para obtener el nombrey apellido del vendedor segun el id asociado
                (llave foranea) al vendedor en la columna de vendedorId*/
                foreach($vendedores as $vendedor){
                    if($entrada->vendedorId == $vendedor->id){
                    echo  $vendedor->nombre. ' '. $vendedor->apellido;
                    }
                }
            ?>
            </span>
        </p>

        <div class="resumen-propiedad">
            <p><?php echo $entrada->texto; ?></p>
            
            
        </div>
    </main>