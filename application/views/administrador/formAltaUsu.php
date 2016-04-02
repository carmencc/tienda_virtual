    <body>
        <h1>Datos Personales</h1>
        <?=$this->form_validation->error_string();?>
        <?= form_open("/proyecto/altausu/recibirDatos")?>
            <?php 
                //Arreglo de municipio
                $municipios= array('Municipio'=>"Municipio",'Alvaro Obregon'=> "Alvaro Obregon",'Azcapotzalco'=>"Azcapotzalco",
                                   'Benito Juarez'=>"Benito Juarez",'Coyoacan'=>"Coyoacan",
                                   'Cuajimalpa de Morelos'=>"Cuajimalpa de Morelos",'Cuauhtemoc'=>"Cuauhtemoc",
                                   'Gustavo A. Madero'=> "Gustavo A. Madero",'Iztacalco'=>"Iztacalco",
                                   'Iztapalapa'=>"Iztapalapa",'Magdalena Contreras'=>"Magdalena Contreras",
                                   'Miguel Hidalgo'=>"Miguel Hidalgo",'Milpa Alta'=>"Milpa Alta",'Tlahuac'=> "Tlahuac",
                                   'Tlalpan'=>"Tlalpan",'Venustiano Carranza'=>"Venustiano Carranza",'Xochimilco'=>"Xochimilco");
                //Arreglo para la caja de texto nombre,apellido paterno,materno,direccion,boton de aceptar,cancelar
                $nombre=array( 'name' => 'nmpersonal','id'=> 'nmpersonal','placeholder' => 'Nombre. . .','size'=>'20' );
                $ape_paterno=array('name' => 'apepatpersonal','id'=>'apepatpersonal','placeholder' =>'Apellido paterno. . .','size'=>'20');
                $ape_materno=array('name' => 'apematpersonal','id'=>'apematpersonal','placeholder' =>'Apellido materno. . .','size'=>'20');
                $direccion=array('name' => 'direcpersonal','id'=>'direcpersonal','placeholder' =>'Direccion. . .','size'=>'20');
                $baceptar=array('name'=>'aceptar','value'=>'Enviar');
                $bcancelar=array('name'=>'cancelar','value'=>'Cancelar');
            ?>
            <table cellspacing="5" cellpadding="8" align="letf" bordercolor="#8533ff"> <!--border="2">-->
                <tr>
                    <th><?= form_label('Nombre*: ','nom')?></th>
                    <td></td>
                    <td><?= form_input($nombre)?></td>
                </tr>
                <tr>
                    <th><?=form_label('Apellido Paterno*: ','apepaperso')?></th>
                    <td></td>
                    <td><?=form_input($ape_paterno)?></td>
                </tr>
                <tr>
                    <th><?=form_label('Apellido Materno: ','apemaperso')?></th>
                    <td></td>
                    <td><?=form_input($ape_materno)?></td>
                </tr>
                <tr>
                    <th><?=form_label('Correo Electronico*: ', 'emailperso')?></th>
                    <td></td>
                    <td><input type="email" name="emailpersonal" id="emailpersonal" placeholder="Correo electronico. . ." size="20"/></td>
                </tr>
                <tr>
                    <th><?=form_label('Dirección*: ','direcperso')?></th>
                    <td></td>
                    <td><?=form_input($direccion)?></td>
                </tr>
                <tr>
                    <th><?=form_label('Telefono: ','telperso')?></th>
                    <td></td>
                    <td><input type="tel" name="telepersonal" id="telepersonal" placeholder="Telefono. . ." size="20"/> </td>
                </tr>
                <tr>
                    <th><?=form_label('Municipio*: ','muniperso')?></th>
                    <td></td>
                    <td><?=form_dropdown('municipio',$municipios,'Municipio')?></td>
                </tr>
                <tr>
                    <th><?=form_submit($baceptar)?></th>
                    <td></td>
                    <td><?=form_reset($bcancelar)?></td>
                </tr>
                <tr>
                    <td colspan="3" align="center">Nota: Los campos con * son obligatorios</td>
                </tr>
            </table>
        <?= form_close()?>
    </body>
</html>