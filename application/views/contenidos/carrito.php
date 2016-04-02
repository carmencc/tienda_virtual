
    <table id='tablacarrito'>
        <tr>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Cantidad</th>
            <th>Subtotal</th>
        </tr>
        <?php 
        $total = 0;
        if(isset($_SESSION['carrito'])){
            foreach ($_SESSION['carrito'] as $producto ) { 
                echo $producto['id'];
        ?>
                <tr>
                    <td><?= $producto['nombre'] ?></td> 
                    <td><?= $producto['precio'] ?></td> 
                    <td><?= $producto['cantidad'] ?></td> 
                    <?php $subtotal = (float)$producto['precio'] * $producto['cantidad']?>
                    <td><?= $subtotal ?></td> 
                </tr>
        <?php
                $total+=$subtotal;			
                }
        }
        ?>
        <tr>
            <th colspan="3" align="right">Total:</th>
            <td><?=$total?></td>
        </tr>
    </table>
    <form action="<?=base_url()?>ctienda/actualizacarrito" method="post">
        <input type="submit" name="saludo"  value= "Saluda">        
        <input type="submit" name="saludo"  value= "Terminar compra">
        <input type="button" value="Regresar" name="volver atrás2" onclick="history.back()" />
    </form>

