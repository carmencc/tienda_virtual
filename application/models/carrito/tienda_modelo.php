<?php
	class Tienda_modelo extends CI_Model{
		public function __construct(){
			parent::__construct();
		}

		public function consulta_articulo($id){
			$this->db->from('producto');
			$this->db->where('clave_producto',$id);
			$consulta=$this->db->get();
			return $consulta->row_array();
		}

		public function listar_productos($limite,$inicio,$dept){
			$consulta=$this->db->get_where('producto',array('dep_clave_departamento'=>$dept),$limite,$inicio);
			return $consulta->result_array();
		}

		public function numero_de_articulos($dep){
			  $sql="select precio from producto where dep_clave_departamento=".$dep;
			  $query=$this->db->query($sql);
			  return $query->num_rows();
		}

		public function departamento(){
            $consulta=$this->db->get('departamento');
            if($consulta->num_rows()>0)
                return $consulta->result_array();
            else
                return false;
        }
	}
?>