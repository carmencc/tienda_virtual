<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mostrar_productos_m extends CI_Model {
		
	public function __construct() {
		parent::__construct();
		$this->load->database();
	}
	
	public function get_departamentos()
	{
		$consulta = $this->db->SELECT('*')->
			FROM('departamento')->
     		GET();
		
		if ($consulta->num_rows()>0) {
			return $consulta->result_array();
		} else {
			return null;
		}
		
		
	}
	
	public function get_productos($id_departamento)
	{
		if ($id_departamento!=null) {
				
			$consulta = $this->db->SELECT('*')->
				FROM('producto')->
				WHERE('dep_clave_departamento', $id_departamento)->
     			GET();
		
			if ($consulta->num_rows()>0) {
				return $consulta->result_array();
			} else {
				return null;
			}
		} else {
			return null;
		}
		
	}
}