<main class="contenedor seccion contenido-centrado">

       <h1>Nuestro Blog</h1>
        <?php foreach($entradas as $entrada): ?>
            <section class="blog">
                    <article  class="entrada-blog">
                        <div class="imagen">
                                    <img loading="lazy" src="/imagenesBlog/<?php echo $entrada->imagen; ?>" alt="Texto entrada blog">
                        </div>
                        <div class="texto-entrada">
                            <a href="/entrada?id=<?php echo $entrada->id;?>">
                                <h4><?php echo $entrada->titulo; ?></h4>
                                <p class="informacion-meta">Escrito el: <span><?php echo s($entrada->fecha); ?></span> por: 
                                    <span>
                                        <?php
                /* El siguiente codigo me sirve para obtener el nombrey apellido del vendedor segun el id asociado
                (llave foranea) al vendedor en la columna de vendedorId*/
                                            foreach($vendedores as $vendedor){
                                                if($entrada->vendedorId == $vendedor->id){
                                                    echo  $vendedor->nombre. ' '. $vendedor->apellido;
                                                }
                                            }
                                            ?>
                                    </span></p>
                                <p><?php echo $entrada->texto; ?></p>
                            </a>
                        </div>
                    </article>
            </section>
        <?php endforeach; ?>   
    </main>
