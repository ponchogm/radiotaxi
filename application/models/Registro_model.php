<?php
defined('BASEPATH') OR exit('No direct script access allowed');
private $db;class Registro_model extends CI_Model{

	private $db;
	
	public function ___construct(){
		parent::___construct();
		$this->db = $this->load->database('default', TRUE);
	}

	function insertar($data){

		$this->db->insert('usuario',$data);
		return $this->db->insert_id();
	}
}
?>