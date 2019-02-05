<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct(){
        
        parent::__construct();
 
        //cargamos la base de datos por defecto
        $this->load->database('default');
        
        //cargamos el helper url y el helper form
        $this->load->helper(array('url'));
       
        //cargamos los modelos
        $this->load->model(array('Mcrud'));
	}

    /**/
	
	public function index()
	{
		$this->load->view('welcome_message');
	}

	/**/

	public function ajaxGetMaestros(){
		$datos['maestros'] = $this->Mcrud->getMaestros();
		$this->load->view('maestros_lista', $datos);
	}

	/**/

	public function ajaxSaveMaestros(){
		
		$post = $this->input->post();
		$return = $this->Mcrud->saveMaestros($post);
		echo $return;
	}

	/**/
}
