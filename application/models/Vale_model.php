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

		$id = $data['cod'];
		echo $id;
			$data = array(
				'TalonarioInicio' => $data['ini'],
        		'TalonarioTermino' => $data['fin'],
        		'TalonarioEstado' => $data['est']
			);
		$this->db->where('TalonarioCodigo', $id);
		$this->db->update('talonario', $data);
		$query = $this->db->get('talonario');
		if($query->num_rows() > 0){
			return $query;
		}else{
			return FALSE;
		}
	}
	/**
     * Elimina un Registro en la base de datos
     */
	function anular($data){

		$id = $data['cod'];
		//echo $id;
			$data = array(
        		'TalonarioEstado' => '0'
			);
		$this->db->where('TalonarioCodigo', $id);
		$this->db->update('talonario', $data);
		$query = $this->db->get('talonario');
		if($query->num_rows() > 0){
			return $query;
		}else{
			return FALSE;
		}
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
	/**
     * Guarda Vale de móvil en la base de datos
     */
	function guardarVale($data){
		$hoy = date("d/m/Y");
		$array = explode("/", $hoy);
		$mes_actual = $array[1];
		$anio_actual = $array[2];
		$data = array(
        		'id_talonarioMovil' => $data['movilTalonario'],
        		'id_cliente' 		=> $data['cliente'],
        		'id_adicional' 		=> $data['adicional'],
        		//'id_convenio' 		=> $data['convenio'],
        		'numero_vale' 		=> $data['vale'],
        		//'direccion' 			=> $data['direccion'],
        		'origen' 			=> $data['origen'],
        		'destino' 			=> $data['destino'],
        		'fecha' 			=> $data['fecha'],
        		'hora' 				=> $data['hora'],
        		'valor' 			=> $data['valor'],
        		'observaciones' 	=> $data['obs'],
        		'fecha_ingreso' 	=> $hoy,
        		'MesCodigo'			=> $mes_actual,
        		'Periodo'			=> $anio_actual
        		//'usuario' 			=> $data['user']
			);
		//print_r($data);
		if($this->db->insert('vales_movil', $data)){
			return TRUE;
		}
		else{
			return FALSE;
		}


	}
	/**
     * Guarda Vale de cliente en la base de datos
     */
	function guardarValeCli($data){
		$hoy = date("d/m/Y");
		$array = explode("/", $hoy);
		$mes_actual = $array[1];
		$anio_actual = $array[2];
		$vale = $data['vale'];
		$data = array(
        		'id_talonarioCliente' => $data['tal'],
        		'id_cliente' 		=> $data['cliente'],
        		'id_adicional' 		=> $data['adicional'],
        		//'id_convenio' 		=> $data['convenio'],
        		'numero_vale' 		=> $data['vale'],
        		//'direccion' 			=> $data['direccion'],
        		'origen' 			=> $data['origen'],
        		'destino' 			=> $data['destino'],
        		'fecha' 			=> $data['fecha'],
        		'hora' 				=> $data['hora'],
        		'valor' 			=> $data['valor'],
        		'observaciones' 	=> $data['obs'],
        		'fecha_ingreso' 	=> $hoy,
        		'MesCodigo'			=> $mes_actual,
        		'Periodo'			=> $anio_actual
        		//'usuario' 			=> $data['user']
			);
		//print_r($data);
		$sql = ("SELECT vales_cliente.numero_vale FROM vales_cliente WHERE vales_cliente.numero_vale = $vale");
		$consulta = $this->db->query($sql);
		if($consulta->num_rows() > 0){
			return false;
		}else{
			if($this->db->insert('vales_cliente', $data)){
			return TRUE;
		}
			else{
			return FALSE;
			}
		}
		


	}
	/**
     * Habilita Mes para guardar Vales
     */
	function habilitaMes($data){
			$cod = $data['mesesbloq'];
			$data = array(
				'estado' => 1
			);
		$this->db->where('MesesCodigo', $cod);
		$this->db->update('meses', $data);
		$query = $this->db->get('meses');
		if($query->num_rows() > 0){
			return $query;
		}else{
			return FALSE;
		}
	}
	/**
     * Bloque Mes para guardar Vales
     */
	function bloquearMes($data){
			$cod = $data['meseshab'];
			$data = array(
				'estado' => 0
			);
		$this->db->where('MesesCodigo', $cod);
		$this->db->update('meses', $data);
		$query = $this->db->get('meses');
		if($query->num_rows() > 0){
			return $query;
		}else{
			return FALSE;
		}
	}
	/**
	* Consulta si se puede ingresar vale
	**/
	public function ingresoValeEstado($date){
		$mes = $date['mes'];
		$year = $date['anio'];
		$anio = date('Y');
			if($year==$anio){
			$sql = ("SELECT * FROM meses WHERE MesesCodigo = $mes AND estado = 1");
			$consulta = $this->db->query($sql);
			if($consulta->num_rows() > 0){
				return TRUE;
			}else{
				return FALSE;
			}
		}else{
			return false;
		}
	}
	/**
	* Buscar vale
	**/
	public function buscarVale($data){
			$vale = $data;
			
			/*if(isset($vale)){
				echo $vale;
			}else{
				return false;
			}*/
			$sql = ("SELECT * FROM comuna, cliente, vales_movil WHERE vales_movil.numero_vale = $vale AND vales_movil.id_cliente = cliente.ClienteCodigo AND comuna.ComunaCodigo = cliente.ComunaCodigo UNION SELECT * FROM comuna, cliente, vales_cliente WHERE vales_cliente.numero_vale = $vale AND cliente.ClienteCodigo = vales_cliente.id_cliente AND comuna.ComunaCodigo = cliente.ComunaCodigo");
			$consulta = $this->db->query($sql);
			if($consulta->num_rows() > 0){
				return $consulta->result();
			}else{
				return FALSE;
			}
	}

}