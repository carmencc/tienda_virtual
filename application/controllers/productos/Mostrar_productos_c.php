<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Mostrar_productos_c extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		$this->load->model('productos/mostrar_productos_m');
	}
	
	public function index(){
		// echo "Aqui >>>>>>>>>>>>>>>";
		$departamentos=$this->mostrar_productos_m->get_departamentos();
		$data['departamentos']=$departamentos;
		// var_dump($productos);
		$this->load->view('productos/Tienda_v', $data);
		
	}
	
	public function get_productos()
	{
		$id_departamento = $this->input->post('id_departamento');
		
		if ($id_departamento!=null) {
				
			$productos=$this->mostrar_productos_m->get_productos($id_departamento);
			
			if ($productos==null) {
				echo '<h3>No existen articulos en este departamento.</h3>';
			}else{
			
			$respuesta = 	'<table style="width:100%">
  						<tr>
    						<th>Nombre del producto</th>
    						<th>Marca</th>
    						<th>Descripción</th>
    						<th>Precio</th>
    						<th>Existencia</th>
  						</tr>';
			foreach ($productos as $key => $value) {
				$respuesta.= '<tr>
    						<td>'.$value['nom_producto'].'</td>
    						<td>'.$value['marca_producto'].'</td>
    						<td>'.$value['descripcion'].'</td>
    						<td>$'.$value['precio'].'.00</td>
    						<td>'.$value['cantidad_existente'].'</td>
  						</tr>';
			};
			
			$respuesta.=		'</table>';
					
			echo $respuesta;
			};
		} else {
			return null;
		}
		
	}
	
}