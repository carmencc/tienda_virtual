<?php if (! defined('BASEPATH') ) exit('No direct script access allowed');

class MaltaProducto extends CI_Model {
	function __construct(){
		parent::__construct();
	}

	public function recibirDatos($datosfrom){
            $inserdatos = array('clave_producto'=>$datosfrom['clveprodu'],'nom_producto'=>$datosfrom['nombprodu'],
                                'marca_producto'=>$datosfrom['marcprodu'],'descripcion'=>$datosfrom['descprodu'],
                                'cantidad_existente'=>$datosfrom['cantprodu'],'precio'=>$datosfrom['precprodu'],
                                'ruta_imagen'=>$datosfrom['ruta'],'dep_clave_departamento'=>$datosfrom['clvedepa'],
                                'dep_nom_departamento'=>$datosfrom['nom_depar']);
            $this->db->insert('producto',$inserdatos);
	}
}
?>