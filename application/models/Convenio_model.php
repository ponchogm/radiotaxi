<?php
class Convenio_model extends CI_Model{
	
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
		
		$this->db->insert('movil', $data);
	}

	/**
     * Muestra todos los Registros de la base de datos
     */
	function ver_todo(){
		$this->db->select('*');
		$this->db->from('convenio');
		$this->db->join('conveniotipo', 'convenio.ConvenioTipoCodigo = conveniotipo.ConvenioTipoCodigo');
		$query = $this->db->get();
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
		$this->db->update('movil', $data);
		$query = $this->db->get('movil');
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
		return $query = $this->db->delete('movil'); // Le pongo return para que le avise al controlador que hizo o no la eliminación
	}
	/**
     * Retorna cantidad registros de una tabla en la base de datos
     */
	function num_convenio(){
		$number = $this->db->query("select count(*) as number from convenio")->row()->number;
			return intval($number);
	}
	/**
     * Consulta que genera la paginación de registros en la base de datos
     */
	function get_pagination($number_per_page){
		return $this->db->get('convenio', $number_per_page, $this->uri->segment(3));
	}
	/**
     * Busqueda de datos en la base
     */
	public function buscar($data){
		//$res = $this->db->query("SELECT * FROM movil WHERE MovilMarca LIKE '%$data%'"); // esta es la forma tradicional que igual funca
		$this->db->from('convenio');
		$this->db->like('ClienteRut',$data,'both');
		$res = $this->db->get();
		return $res->result();
	}
}
?>