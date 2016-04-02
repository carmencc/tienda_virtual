    <body>
        <h1 align="center">Alta nuevo Producto</h1>
        <?=$this->form_validation->error_string();?>
        <?php
                //Arreglos para las cajas de texto
                $clvepro = array('id'=>'clveprod','name'=>'clveprod','placeholder'=>'Clave del producto . . . ','size'=>'30');
                $nombpro = array('id'=>'nombprod','name'=>'nombprod','placeholder'=>'Nombre del producto . .  .','size'=>'30');
                $marcpro = array('id'=>'marcprod','name'=>'marcprod','placeholder'=>'Marca del producto . . .','size'=>'30');
                $clvedep = array('id'=>'clvedepa','name'=>'clvedepa','placeholder'=>'Departamento . . .','size'=>'30');
                $depapro = array ('Departamento'=>'Departamento','Electronica'=>'Electronica','Autos'=>'Autos','Celulares'=>'Celulares',
                                  'Deportes'=>'Deportes','Electrodomesticos'=>'Electrodomesticos','Peliculas'=>'Peliculas','Mascotas'=>'Mascotas',
                                  'Videojuegos'=>'Videojuegos');
                $descpro = array('id'=>'descprod','name'=>'descprod','placeholder'=>'Descripcion del producto . . .','size'=>'30');
                $precpro = array('id'=>'precprod','name'=>'precprod','placeholder'=>'Precio . . .','size'=>'10');
                $imgapro = array('id'=>'imagprod','name'=>'imagprod','value'=>'Subir imagen','size'=>'10');
                $bacepta = array('id'=>'btnacep','name'=>'btnacep','value'=>'Aceptar');
                $bcancel = array('id'=>'btncancel','name'=>'btncancel','value'=>'Cancelar');
                $cantpro = array('0'=>'0');
                for ($i=1; $i <=60 ; $i++)
                        $cantpro[$i]= $i;
        ?>
        <?=form_open_multipart("caltaProducto/recibirFormulario")?>
            <table border="2" cellspacing="5" cellpadding="8" bordercolor="#8533ff" align="center">
                <tr>
                    <th><?=form_label('Clave del producto *','clveproduc')?></th>
                    <td></td>
                    <td><?=form_input($clvepro)?></td>
                </tr>
                <tr>
                    <th><?=form_label('Nombre del producto*:','nomproduc')?></th>
                    <td></td>
                    <td><?=form_input($nombpro)?></td>
                </tr>
                <tr>
                    <th><?=form_label('Marca del producto*:','marcproduc')?></th>
                    <td></td>
                    <td><?=form_input($marcpro)?></td>
                </tr>
                <tr>
                    <th><?=form_label('Departamento*:','clvedepar')?></th>
                    <td></td>
                    <td><?=  form_dropdown('deparprod',$depapro,'Departamento')?></td>
                </tr>
                <tr>
                    <th><?=form_label('Cantidad de producto*:','cantproduc')?></th>
                    <td></td>
                    <td><?=form_dropdown('cantprod',$cantpro,'0')?></td>
                </tr>
                <tr>
                    <th><?=form_label('Precio del producto*:','precproduc')?></th>
                    <td></td>
                    <td>$ <?=form_input($precpro)?></td>
                </tr>
                <tr>
                    <th><?=form_label('Imagen del producto*:','imgproduc')?></th>
                    <td></td>
                    <td><?=form_upload($imgapro)?></td>
                </tr>
                <tr>
                    <th><?=form_label('Descripcion del producto*:','descproduc')?></th>
                    <td></td>
                    <td><?=form_input($descpro)?></td>
                </tr>
                <tr align="center">
                    <td><?=form_submit($bacepta)?></td>
                    <td></td>
                    <td><?=form_reset($bcancel)?></td>
                </tr>	
                <tr >
                    <td colspan="3" align="center">Nota: Los campos con * son obligatorios</td>
                </tr>
            </table>
        <?=form_close()?>
    </body>
</html>