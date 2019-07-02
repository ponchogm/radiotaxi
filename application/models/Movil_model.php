<?php
class Movil_model extends CI_Model{
	
	public function ___construct(){
		parent::___construct();
	}

	function guardar($data){
		$data = array(
        		'MovilTipoCodigo' => $data['tco'],
        		'DuenoRut' => $data['ru'],
        		'MovilPatente' => $data['pa'],
        		'MovilMarca' => $data['ma'],
        		'MovilModelo' => $data['mo'],
        		'MovilAnio' => $data['an'],
        		'MovilNumero' => $data['nu'],
        		'MovilValorMes' => $data['va']
			);
		
		$this->db->insert('movil', $data);
	}


	function ver_todo(){

		$query = $this->db->get('movil');
		if($query->num_rows() > 0){
			return $query;
		}else{
			return FALSE;
		}
	}

	function editar($data){

		$id = $data['cod'];
		//echo $id;
			$data = array(
        		'MovilPatente' => $data['pat'],
        		'MovilMarca' => $data['mar'],
        		'MovilModelo' => $data['mod'],
        		'MovilAnio' => $data['ano'],
        		'MovilNumero' => $data['num'],
        		'MovilValorMes' => $data['val']
			);
		$this->db->where('MovilCodigo', $id);
		$this->db->update('movil', $data);
		$query = $this->db->get('movil');
		if($query->num_rows() > 0){
			return $query;
		}else{
			return FALSE;
		}
	}

	function eliminar($id){
		$this->db->where('MovilCodigo', $id);
		$query = $this->db->delete('movil');
	}

	function num_movil(){
		$number = $this->db->query("select count(*) as number from movil")->row()->number;
			return intval($number);
	}

	function get_pagination($number_per_page){
		return $this->db->get('movil', $number_per_page, $this->uri->segment(3));
	}
}
?>