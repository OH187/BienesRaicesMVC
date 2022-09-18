<main class="contenedor seccion">
        <h2 data-cy="heading-nosotros">Más sobre nosotros</h2>
        <?php

use Model\Vendedores;

    include 'iconos.php'; ?>
    </main>

    <section class="seccion contenedor">
        <h2>Casas y Departamentos en Venta</h2>

        <?php 
        include 'listado.php' 
        ?>
        
        <div class="alinear-derecha">
            <a href="/propiedades" class="boton-verde alinear-derecha" data-cy="todas-propiedades">Ver todas</a>
        </div>

    </section >

    <section data-cy="bloque-contacto" class="imagen-contacto">
        <h3>Encuentra la casa de tus sueños</h3>
        <p>Llena el formulario y un asesor se pondrá en contacto contigo lo antes posible</p>
        <a data-cy="enlace-contacto" href="/contacto" class="boton-amarillo-inline">Contáctanos</a>
    </section>

    <div class="contenedor seccion seccion-inferior">
        <section data-cy="blog" class="blog">
            <h3>Nuestro blog</h3>

    <?php foreach($entradas as $entrada): ?>
                <article class="entrada-blog">
                    <div class="imagen">
                                <img loading="lazy" src="/imagenesBlog/<?php echo $entrada->imagen; ?>" alt="Texto entrada blog">
                    </div>
                    <div  class="texto-entrada">
                    
                        <a href="/entrada">
                            <h4><?php echo $entrada->titulo; ?></h4>
                            <p class="informacion-meta">Escrito el: <span><?php echo $entrada->fecha; ?></span> por: 
                            <span> 
                            <?php
                            foreach($vendedores as $vendedor){
                                if($entrada->vendedorId == $vendedor->id){
                                    echo  $vendedor->nombre. ' '. $vendedor->apellido;
                                }
                            }
                            ?>
                            </span></p>
                            <p><?php echo $entrada->texto; ?> </p>
                        </a>
                    </div>
                </article>
        <?php endforeach; ?>
        </section>
        
        <section data-cy="testimoniales" class="testimmoniales">
            <h3>¿Que dicen nuestros clientes?</h3>
            <div class="testimonial">
                <blockquote>
                    El personal muy bien capacitado y con muy buena atención. La casa que me ofrecieron
                    cumple con todas mis expectativas
                </blockquote>
                <p>- Francisco Sandoval</p>
            </div>
        </section>
    </div>    