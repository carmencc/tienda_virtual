<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">

		<!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame
		Remove this if you use the .htaccess -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		
		<script>var base ='<?php echo base_url();?>';</script>
		<script src="<?php echo base_url() ?>statics/js/productos.js"></script>
		<script src="http://code.jquery.com/jquery-2.2.2.min.js"></script>
		
		<title>Tienda</title>
		<meta name="description" content="">
		<meta name="author" content="root">

		<meta name="viewport" content="width=device-width; initial-scale=1.0">

		<!-- Replace favicon.ico & apple-touch-icon.png in the root of your domain and delete these references -->
		<link rel="shortcut icon" href="/favicon.ico">
		<link rel="apple-touch-icon" href="/apple-touch-icon.png">
	</head>

	<body>
		<div>
			<header>
				<h1>Departamentos Tienda Virtual</h1>
			</header>
			<nav>
				<ol>
  					<?php
  						foreach ($departamentos as $key => $value) { ?>
							  <li onclick="get_productos(this.value)" value="<?php  echo $value['clave_departamento']; ?>"</li?><?php echo $value['nom_departamento'];?></li>
						  <?php } 
  					?>
				</ol>
			</nav>

			<div id="lista_productos">
				
			</div>

			<footer>
				<p>
					&copy; Copyright  by root
				</p>
			</footer>
		</div>
	</body>
</html>
