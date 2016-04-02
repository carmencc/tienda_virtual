<?php if (! defined('BASEPATH') ) exit('No direct script access allowed');

class CaltaProducto extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('carrito/maltaProducto');
	}

	public function index(){
		$this->load->view("administrador/headers");
		$this->load->view("administrador/formAltaProdu");
	}

	public function recibirFormulario(){
		//Se obtiene la ruta de la imagen
 		$rutaimg = $this->subirImagenRuta();
		//Reglas de validacion
		$regvalidacion = array('clveprod'=>'required|min_length[2]','nombprod'=>'required|min_length[2]',
                                       'marcprod'=>'required|min_length[2]','precprod'=>'required|numeric',
                                       'descprod'=>'required|min_length[2]');
		//Etiquetas para mostrar los mensajes de error
		$etiformulari =  array('Clave del producto','Nombre del producto','Marca del producto',
                                       'Precio del producto','Descripcion del producto');
		//mensajes de  error 
		$mensaj_error = array('required'=>'El campo %s es obligatorio',
                                      'min_length'=>'El campo %s debe tener por lo menos 2 caracteres',
                                      'numeric'=>'El campo Precio solo debe de contener numeros');

		$i=0;
		//validacion  el formulario
		foreach ($regvalidacion as $clave => $condicion) {
			$this->form_validation->set_rules($clave,$etiformulari[$i],$condicion);
			$i++;
		}

		//Se muestran los mensajes de error si es que existen
		foreach ($mensaj_error as $clave => $valor)
			$this->form_validation->set_message($clave,$valor);
		$cantidad = $this->input->post('cantprod');
                $departamento = $this->input->post('deparprod');
 		//Si el formulario es valido se inserta en la base
 		if($this->form_validation->run() != FALSE && $cantidad > 0 && $departamento != 'Departamento'){
                    $depapro = array ('Electronica','Autos','Celulares','Deportes','Electrodomesticos','Peliculas','Mascotas','Videojuegos');
                    $cont = 0;
                    while($departamento != $depapro[$cont])
                        $cont++;
                    $cont++;
                    //Se crean los array que se va a insertar en la base de datos
                    $datosprodu = array('clveprodu'=>$this->input->post('clveprod'),'nombprodu'=>$this->input->post('nombprod'),
                                        'marcprodu'=>$this->input->post('marcprod'),'descprodu'=>$this->input->post('descprod'),
                                        'cantprodu'=>$cantidad,'precprodu'=>$this->input->post('precprod'),'ruta'=>$rutaimg,
                                        'clvedepa'=>$cont,'nom_depar'=>$departamento);
 			/*foreach ($datosprodu as $indice => $valor) {
 				echo "$valor<br>";
 			}*/

                    //se agregan los registros en la base de datos
                    $this->maltaProducto->recibirDatos($datosprodu);
                    echo "Registro exitoso";
                    $this->index();

 		}
 		else{//En caso contrario se redirecciona al formulario
 			echo "<h1 align = \"center\">Error en el formulario</h1>";
 			if ($cantidad == 0)
                            echo "El campo Cantidad debe ser mayor que 0";
                        if($departamento == 'Departamento')
                            echo "<br>Debe elegir un departamento para el producto";
 			$this->index();
 		}
	}

	/*
	Funcion que obtiene la imagen
	*/
	private function subirImagenRuta(){

		if($_FILES['imagprod']['error']>0){
			echo "No se selecciono una imagen";
		}
		else{
			//Se verifica que el tipo de imagen este permitida
			$imgpermitidas = array('image/jpg', 'image/jpeg', 'image/gif', 'image/png');
		  	//y que la capacidad no exeda mas de los 16 Mb 
		  	$imglimitemb   = 16384*1024;
		  	if(in_array($_FILES['imagprod']['type'],$imgpermitidas) && $_FILES['imagprod']['size'] <= $imglimitemb){
		  		//se hace un archivo temporal
			  	$imgtemporal = $_FILES['imagprod']['tmp_name'];
			  	//ruta en donde se va a guardar el archivo con el nombre de la imagen
			    $ruta_imagen = "imagenes/".$_FILES['imagprod']['name'];
			    //se mueve la imagen temporal a la ruta anterior
			    move_uploaded_file($imgtemporal, $ruta_imagen);
			    //regresamos la ruta para que la guarde la base de datos
				return $ruta_imagen;
			 }
		}
	}
}

?>