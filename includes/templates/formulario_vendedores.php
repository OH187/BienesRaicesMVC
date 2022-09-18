<fieldset>
    <legend>Información General</legend>

    <label for="nombre">Nombre:</label>
    <input type="text" id="nombre" name="vendedor[nombre]" placeholder="Nombre Vendedor(a)" 
    value="<?php echo s($vendedor->nombre); ?>"> 

    <label for="apellido">Apellido:</label>
    <input type="text" id="apellido" name="vendedor[apellido]" placeholder="Apellido Vendedor(a)" 
    value="<?php echo s($vendedor->apellido); ?>"> 

    <label for="telefono">Telefono:</label>
    <input type="tel" class="margin-auto" id="telefono" name="vendedor[telefono]" placeholder="Telefono" 
    value="<?php echo s($vendedor->telefono); ?>"> 
</fieldset>
<!-- 
<fieldset>
    <legend>Informacion adicional</legend>

    <label for="correo">Email</label>
                <input id="correo" type="email" name="vendedor[email]" class="margin-auto" 
                placeholder="Escriba el correo electrónico (Opcional)" value="">

</fieldset> -->