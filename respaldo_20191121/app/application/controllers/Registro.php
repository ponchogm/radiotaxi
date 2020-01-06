<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registro extends CI_Controller {

	public function ___construct(){
		parent::___construct();
		$this->load->library('form_validation');
		$this->load->library('encrypt');
		$this->load->model('Registro_model');
	}

	public function index(){
		$this->load->view('registrar_users');
	}

	function validacion(){
		$this->form_validation->set_rules('rut','Rut','required|trim');
		$this->form_validation->set_rules('correo','Correo Electronico','required|trim|valid_email|is_unique[usuario.usuario_correo]');
		$this->form_validation->set_rules('pass','Password','required|trim');

		if($this->form_validation->run()){

			$verificacion_clave = md5(rand());
			$pass_encriptada = $this->encrypt->encode($this->input->post('pass'));

			$data = array(
				'rut'					=>	$this->input->post('rut'),
				'correo'				=>	$this->input->post('correo'),
				'password'				=>	$this->input->post('pass'),
				'verificacion_clave' 	=>	$verificacion_clave
			);

				$id = $this->Registro_model->insertar($data);
					if($id > 0){

					}else{

					}
		}else{

			$this->index();

		}
	}
}

?>