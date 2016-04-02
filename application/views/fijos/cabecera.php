<!DOCTYPE html>
<html lang="es">
<head>
<title>Tienda</title>
<link href='<?=base_url()?>css/estilo.css' rel="stylesheet" type="text/css">
</head>
<body>
	<div id="contenedor">
                <div id="cabecera">
                	<a href="<?=base_url()?>ctienda/ver_carrito">
                		<img id='carrito' src="<?=base_url()?>imagenes/carrito.gif" title='Consultar Carrito'>
                	</a>
                	USUARIO: <?php print_r($_SESSION['usuario'])  ?> 
                	<br>
					<a href="<?=base_url()?>ctienda/salir">Salir</a>
                </div>