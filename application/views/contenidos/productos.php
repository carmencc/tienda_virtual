<div id='contenido'>
    <?php
    foreach ($datos as $clave) {
    ?>
        <table  id="tablaproducto"cellspacing="5" cellpadding="8" >
            <tr>
                <td><img src="<?=base_url()?><?=$clave['ruta_imagen']?>" width="250px" height="250px"></td>
            </tr>
            <tr>
            <th>
                <a href='<?=base_url()?>ctienda/detalle_producto/<?=$clave['clave_producto']?>/<?=$num_pagina?>' >
                            <?= $clave['nom_producto'] ?>
                </a>
            </th>
            </tr>
        </table>
    <?php
    }
    ?>
    <footer>
            <?=$paginacion?>
    </footer>

	
</div>

