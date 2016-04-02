<?php
$cantidades = range(0, $cantidad_existente);
unset($cantidades[0]);
?>
<div id='contenido'>
    <?=form_open('ctienda/agregar_carrito')?>
    <?=form_hidden('id',$clave_producto)?>
        <?=form_hidden('num_pagina',$num_pagina)?>
        <table cellspacing="5" cellpadding="8" width="100%">
            <tr  align="center">
                <td colspan="5">
                   <img src="<?=base_url()?><?=$ruta_imagen?>" width='150px' heigth='150px'> 
                </td>
            </tr>
            <tr></tr>
            <tr>
                <th>Nombre</th>
                <td></td>
                <th>Precio</th>
                <td></td>
                <th>Cantidad</th>
            </tr>
            <tr></tr>
            <tr  align="center">
                <td><?=form_label($nom_producto,'nombre')?></td>
                <td></td>
                <td><?=form_label("$".$precio,'precio')?></td>
                <td></td>
                <td><?=form_dropdown('cantidad',$cantidades,1)?></td> 
            </tr>
            <tr></tr>
            <tr>
                <th colspan="5">Descipción</th>
            </tr>
            <tr>
                <td colspan="5" align="justify"><?=  form_label($descripcion,'descrip')?></td>
            </tr>
            <tr></tr>
            <tr></tr>
            <tr align="center">
                <td colspan="3">
                    <input type="button" value="Regresar" name="volver atrás2" onclick="history.back()" />
                </td>
                <td colspan="2">
                    <?=form_submit('carrito','Agregar a Carrito')?>
                </td>
            </tr>
        </table>
    <?=form_close()?>
</div>