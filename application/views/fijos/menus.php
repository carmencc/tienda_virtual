        <div id="barra-lateral">Menu <br><br/>
            <?php
            if($departamentos){
                foreach ($departamentos  as $columna){
                    $clave = $columna['clave_departamento'];
                    $depa = $columna['nom_departamento']; 
            ?>
                    <a href="<?=base_url()?>ctienda/listar_productos/<?=$clave?>">
                        <?=$depa?>
                    </a>
                    <br/><br/>
            <?php
                }
                unset($columna);
            }
            ?>  
        </div>
