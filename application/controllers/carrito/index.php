<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//los controladores son clases
class Index extends CI_Controller {
//constructor
    public function __construct() {
        parent::__construct();
        
    }
//metodos
	public function index()
	{
		$this->load->view('vistamipagina');
	}
}
