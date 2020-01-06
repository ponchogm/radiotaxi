<?php
class Cliente_model extends CI_Model{
	
	public function ___construct(){
		parent::___construct();
	}
	/**
     * Guarda Nuevo Registro en la base de datos
     */
	function guardar($data){
		$data = array(
        		'ClienteRut'			=> $data['rut'],
        		'ClienteNombres'		=> $data['nombres'],
        		'ClienteApellidoPat'	=> $data['pat'],
        		'ClienteApellidoMat'	=> $data['mat'],
        		'ClienteDireccion'		=> $data['dir'],
        		'ClienteFonoCasa'		=> $data['telcasa'],
        		'ClienteFonoTrabajo'	=> $data['telpega'],
        		'ClienteFonoCelular'	=> $data['telcel'],
        		'ComunaCodigo'			=> $data['com'],
        		'ClienteFecNac'			=> $data['nac'],
        		'ClienteEmail'			=> $data['email'],
        		'ClienteTipoCodigo'		=> '1',
        		'ClienteClave'			=> $data['clavecli'],
        		'ClienteNumero'			=> $data['numcli']
			);
		
		$this->db->insert('cliente', $data);
	}

	/**
     * Muestra todos los Registros de la base de datos
     */
	function ver_todo(){

		$query = $this->db->get('cliente');
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

		$cod = $data['cod'];
		//echo $id;
			$data = array(
				'ClienteCodigo'      => $cod,
				'ClienteRut'         => $data['rut'],
        		'ClienteNombres'     => $data['nom'],
        		'ClienteApellidoPat' => $data['pat'],
        		'ClienteApellidoMat' => $data['mat'],
        		'ClienteDireccion'   => $data['dir'],
        		'ClienteFonoCasa' 	 => $data['foncasa'],
        		'ClienteFonoTrabajo' => $data['fonpega'],
        		'ClienteFonoCelular' => $data['foncel'],
        		'ComunaCodigo' 		 => $data['com'],
        		'ClienteFecNac'      => $data['nac'],
        		'ClienteEmail' 		 => $data['email'],
        		'ClienteClave' 		 => $data['clavecli'],
        		'ClienteNumero' 	 => $data['numcli']
			);
		$this->db->where('ClienteCodigo', $cod);
		$this->db->update('cliente', $data);
		$query = $this->db->get('cliente');
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
		$this->db->where('ClienteCodigo', $data);
		return $query = $this->db->delete('cliente'); // Le pongo return para que le avise al controlador que hizo o no la eliminación
	}
	/**
     * Retorna cantidad registros de una tabla en la base de datos
     */
	function num_cliente(){
		$number = $this->db->query("select count(*) as number from cliente where ClienteTipoCodigo = '1'")->row()->number;
			return intval($number);
	}
	/**
     * Consulta que genera la paginación de registros en la base de datos
     */
	function get_pagination($number_per_page){
		$this->db->from('comuna');
		$this->db->where('cliente.ComunaCodigo=comuna.ComunaCodigo');
		$this->db->where('cliente.ClienteTipoCodigo = 1');
		return $this->db->get('cliente', $number_per_page, $this->uri->segment(3));
	}
	/**
     * Busqueda de datos en la base
     */
	public function buscar($data){
		$sql = ("SELECT a.*,b.* FROM cliente a LEFT JOIN comuna b ON b.ComunaCodigo = a.ComunaCodigo WHERE a.ClienteApellidoPat LIKE '%$data%'");
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
     * Obtener datos cliente especifico
     */
	public function obtenerCliente($cod){
		$sql = ("SELECT cliente.*, comuna.ComunaNombre FROM cliente, comuna WHERE cliente.ComunaCodigo = comuna.ComunaCodigo AND cliente.ClienteCodigo = $cod");
        $consulta = $this->db->query($sql);
		return $consulta->result();
	}
}