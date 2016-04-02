<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    class Ctienda extends CI_Controller {
	public function __construct(){
            parent::__construct();
            $this->load->model('carrito/tienda_modelo');
            $departamentos['departamentos']=$this->tienda_modelo->departamento();
            $this->config->set_item('departamentos',$departamentos);
            session_start();
	}

	public function index(){
            if(!isset($_SESSION['usuario']))
                $_SESSION['usuario']=mt_rand();
            else
                $_SESSION['usuario']=mt_rand();
            $this->load->view('fijos/cabecera');
            $this->load->view('fijos/menus',$this->config->item('departamentos'));
            $this->load->view('contenidos/contenido');
            $this->load->view('fijos/cierre');
	}

	public function listar_productos($dep){
            $pagina= !empty($this->uri->segment(4)) ? $pagina=$this->uri->segment(4):0;
            $this->load->library('pagination');
            $opciones['per_page']=$this->config->item('paginas');
            $opciones['base_url']=base_url().'Ctienda/listar_productos/'.$dep;
            $opciones['total_rows']=$this->tienda_modelo->numero_de_articulos($dep);
            $opciones['uri_segment']=4;
            $opciones['first_link']='Primera';
            $opciones['last_link']='Ultima';
            $this->pagination->initialize($opciones);
            $datos['datos']=$this->tienda_modelo->listar_productos($opciones['per_page'],$pagina,$dep);
            $datos['paginacion']=$this->pagination->create_links();
            $datos['num_pagina']=$pagina;
            $this->load->view('fijos/cabecera');
            $this->load->view('fijos/menus',$this->config->item('departamentos'));
            $this->load->view('contenidos/productos',$datos);	
            $this->load->view('fijos/cierre');
	}

	public function detalle_producto($id,$num_pagina){
            $producto=$this->tienda_modelo->consulta_articulo($id);
            $producto['num_pagina']=$num_pagina;
            $this->load->view('fijos/cabecera');
            $this->load->view('fijos/menus',$this->config->item('departamentos'));
            $this->load->view('contenidos/agregar',$producto);	
            $this->load->view('fijos/cierre');
	}

	public function agregar_carrito(){
            $query_producto=$this->tienda_modelo->consulta_articulo($this->input->post('id'));
            $producto = array('id' => $query_producto['clave_producto'],'cantidad' => $this->input->post('cantidad'),
                              'precio' => $query_producto['precio'],'nombre' => $query_producto['nom_producto']);          
            $_SESSION['carrito'][]=$producto;
            $segmento=$this->input->post('num_pagina');
            print_r($segmento);
            print_r();
            redirect(base_url().'Ctienda/listar_productos/'.$query_producto['dep_clave_departamento'].'/'.$segmento);
	}

	public function salir(){
            unset($_SESSION['carrito']);
            unset($_SESSION['usuario']);
            $this->index();
	}

	public function ver_carrito(){
            $this->load->view('fijos/cabecera');
            $this->load->view('fijos/menus',$this->config->item('departamentos'));
            $this->load->view('contenidos/carrito');	
            $this->load->view('fijos/cierre');	
	}
        
        public function actualizacarrito(){
            $boton = $this->input->post('saludo');
            if( $boton === 'Saluda')
                echo 'Hola';
            else
                echo "No a sido este boton".$boton;
        }
    }
?>