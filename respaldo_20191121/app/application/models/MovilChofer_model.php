<?php
class MovilChofer_model extends CI_Model{
	
	public function ___construct(){
		parent::___construct();
	}
	/**
     * Guarda Nuevo Registro en la base de datos
     */
	function guardar($data){
		$data = array(
        		'ChoferRut' => $data['cho'],
        		'MovilCodigo' => $data['mov']
			);
		
		$this->db->insert('movilchofer', $data);
	}

	/**
     * Muestra todos los Registros de la base de datos
     */
	function ver_todo(){

		$sql = ("SELECT * FROM movilchofer, movil, chofer WHERE movilchofer.MovilCodigo = movil.MovilCodigo AND movilchofer.ChoferRut = chofer.ChoferRut");
		$consulta = $this->db->query($sql);
		//return $consulta->result();// Según leí el result() solo se puede usar o en el modelo o en el controller OJO a eso.
		return $consulta;
	}
	/**
     * Edita un Registro en la base de datos
     */
	function editar($data){

		$id = $data['ch'];
		//echo $id;
			$data = array(
				'ChoferRut' => $id,
        		'MovilCodigo' => $data['mo']
			);
		$this->db->where('ChoferRut', $id);
		$this->db->update('movilchofer', $data);
		$query = $this->db->get('movilchofer');
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
		return $query = $this->db->delete('movilchofer'); // Le pongo return para que le avise al controlador que hizo o no la eliminación
	}
	/**
     * Retorna cantidad registros de una tabla en la base de datos
     */
	function num_movilchofer(){
		$number = $this->db->query("select count(*) as number from movilchofer")->row()->number;
			return intval($number);
	}
	/**
     * Consulta que genera la paginación de registros en la base de datos
     */
	function get_pagination($number_per_page){
		/*$this->db->from('comuna');
		$this->db->where('chofer.ComunaCodigo=comuna.ComunaCodigo');*/
		return $this->db->get('movilchofer', $number_per_page, $this->uri->segment(3));
	}
	/**
     * Busqueda de datos en la base
     */
	public function buscar($data){
		$sql = ("SELECT a.*,b.* FROM chofer a LEFT JOIN comuna b ON b.ComunaCodigo = a.ComunaCodigo WHERE a.ChoferApellidoPat LIKE '%$data%'");
		$consulta = $this->db->query($sql);
		return $consulta->result();
	}
}