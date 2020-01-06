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
        		'ChoferRut' => $data['ru'],
        		'ChoferNombres' => $data['no'],
        		'ChoferApellidoPat' => $data['pa'],
        		'ChoferApellidoMat' => $data['ma'],
        		'ChoferDireccion' => $data['di'],
        		'ChoferFono' => $data['tf'],
        		'ChoferCelular' => $data['ce'],
        		'ComunaCodigo' => $data['co']
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

		$id = $data['rut'];
		//echo $id;
			$data = array(
				'ChoferRut' => $id,
        		'ChoferNombres' => $data['nom'],
        		'ChoferApellidoPat' => $data['pat'],
        		'ChoferApellidoMat' => $data['mat'],
        		'ChoferDireccion' => $data['dir'],
        		'ChoferFono' => $data['fon'],
        		'ChoferCelular' => $data['cel'],
        		'ComunaCodigo' => $data['com']
			);
		$this->db->where('ChoferRut', $id);
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
		$this->db->where('ChoferRut', $data);
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
		$this->db->from('comuna');
		$this->db->where('chofer.ComunaCodigo=comuna.ComunaCodigo');
		return $this->db->get('chofer', $number_per_page, $this->uri->segment(3));
	}
	/**
     * Busqueda de datos en la base
     */
	public function buscar($data){
		$sql = ("SELECT a.*,b.* FROM chofer a LEFT JOIN comuna b ON b.ComunaCodigo = a.ComunaCodigo WHERE a.ChoferApellidoPat LIKE '%$data%'");
		$consulta = $this->db->query($sql);
		return $consulta->result();
	}
	/**
     * Obtener listado de comunas en la base de datos
     */
	public function obtenerComunas(){
        $query = $this->db->get('comuna');
		if($query->num_rows() > 0){
			return $query;
		}else{
			return FALSE;
		}
	}
}