<?php
class Chofer_model extends CI_Model{
	
	public function ___construct(){
		parent::___construct();
	}
	/**
     * Guarda Nuevo Registro en la base de datos
     */
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
		
		$this->db->insert('chofer', $data);
	}

	/**
     * Muestra todos los Registros de la base de datos
     */
	function ver_todo(){

		$query = $this->db->get('chofer');
		if($query->num_rows() > 0){
			return $query;
		}else{
			return FALSE;
		}
	}
	/**
     * Edita un Registro en la base de datos
     */
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
		$this->db->update('chofer', $data);
		$query = $this->db->get('chofer');
		if($query->num_rows() > 0){
			return $query;
		}else{
			return FALSE;
		}
	}
	/**
     * Elimina un Registro en la base de datos
     */
	function eliminar($data){
		$this->db->where('MovilCodigo', $data);
		return $query = $this->db->delete('chofer'); // Le pongo return para que le avise al controlador que hizo o no la eliminación
	}
	/**
     * Retorna cantidad registros de una tabla en la base de datos
     */
	function num_chofer(){
		$number = $this->db->query("select count(*) as number from chofer")->row()->number;
			return intval($number);
	}
	/**
     * Consulta que genera la paginación de registros en la base de datos
     */
	function get_pagination($number_per_page){
		/*return $this->db->get('chofer', $number_per_page, $this->uri->segment(3));*/
		return $this->db->query("SELECT  * FROM chofer AS ch, comuna as co WHERE ch.ComunaCodigo = co.ComunaCodigo ORDER BY ch.ComunaCodigo", $number_per_page, $this->uri->segment(3));
	}
}
?>