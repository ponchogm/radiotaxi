<?php
class Vale_model extends CI_Model{
	
	public function ___construct(){
		parent::___construct();
	}
	/**
     * Guarda Nuevo Registro en la base de datos
     */
	function guardar($data){
		$hoy = date("d-m-Y");
		$data = array(
        		'TalonarioInicio' => $data['inicio'],
        		'TalonarioTermino' => $data['termino'],
        		'TalonarioEstado' => '1',
        		'TalonarioFechaIngreso' => $hoy
			);
		
		$this->db->insert('talonario', $data);
	}
	/**
     * Guarda asignacion de talonarios a clientes
     */
	function asignaCli($data){

		$cadena = $data['talonarios'];
		$array = explode(",", $cadena);
		$id_tal = $array[0];
		$cad_talon = $array[1];
		$array2 = explode(" - ", $cad_talon);
		$f_inicio = $array2[0];
		$f_final = $array2[1];

		$data = array(
			'RutCliente'	=> $data['clientes'],
			'id_talonario'	=> $id_tal,
			'estado'		=> '1',
			'folio_inicio'	=> $f_inicio,
			'folio_final'	=> $f_final
			);
		$this->db->insert('talonario_cliente', $data);
	}
	/**
     * Guarda asignacion de talonarios a moviles
     */
	function asignaMov($data){

		$cadena = $data['talonarios'];
		$array = explode(",", $cadena);
		$id_tal = $array[0];
		$cad_talon = $array[1];
		$array2 = explode(" - ", $cad_talon);
		$f_inicio = $array2[0];
		$f_final = $array2[1];

		$data = array(
			'id_movil'		=> $data['moviles'],
			'id_talonario'	=> $id_tal,
			'estado'		=> '1',
			'folio_inicio'	=> $f_inicio,
			'folio_final'	=> $f_final
		);

		$this->db->insert('talonario_movil', $data);

		$data2 = array(
			'MovilCodigo'		=> $data2['moviles'],
			'TalonarioCodigo'	=> $id_tal,
			'ValeNumero'		=> $f_inicio
		);

		$this->db->insert('vale', $data2);
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
	/**
     * Obtener numero del vale
     */
	public function getValeNum($id_tal){

		$sql = ("SELECT * FROM vales_movil WHERE id_talonarioMovil = $id_tal ORDER BY numero_vale DESC LIMIT 1");
		$consulta = $this->db->query($sql);

		if($consulta->num_rows() > 0){

			return $consulta->result();
		}else{
			return FALSE;
		}
	}
}