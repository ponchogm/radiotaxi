<?php
class Balance_model extends CI_Model{
	
	public function ___construct(){
		parent::___construct();
	}
	/**
     * Guarda Nuevo Ingreso en la base de datos
     */
	function guardarIngreso($data){
		$hoy = date("d/m/Y");
		$mes = date('m');
		$anio = date('Y');
		$data = array(
        		'fecha' => $hoy,
        		'mes' => $mes,
        		'anio' => $anio,
        		'ingreso' => str_replace(".", "", $data['montoIn']),
        		'egreso' => '0',
        		'cuenta' => $data['cuentaIn']
			);
		
		$this->db->insert('balance', $data);
	}
	/**
     * Guarda Nuevo Egreso en la base de datos
     */
	function guardarEgreso($data){
		$hoy = date("d/m/Y");
		$mes = date('m');
		$anio = date('Y');
		$data = array(
        		'fecha' => $hoy,
        		'mes' => $mes,
        		'anio' => $anio,
        		'egreso' => str_replace(".", "", $data['montoEg']),
        		'ingreso' => '0',
        		'cuenta' => $data['cuentaEg']
			);
		
		$this->db->insert('balance', $data);
	}
	/**
     * Muestra todos los Registros de la tabla
     */
	function ver_todo(){

		$mes = date('m');
		//$mes = 1;
		$anio = date('Y');
		$this->db->where('mes', $mes);
		$this->db->where('anio', $anio);
		$query = $this->db->get('balance');
		if($query->num_rows() > 0){
			return $query;
		}else{
			return FALSE;
		}
	}
	/**
     * Suma todos los ingresos
     */
	function sumaIngresos(){
		$query = "SELECT SUM(ingreso) AS TotalIngresos FROM balance";
		$consulta = $this->db->query($query);
		return $consulta->result();
	}
	/**
     * Suma todos los egresos
     */
	function sumaEgresos(){
		$query = "SELECT SUM(egreso) AS TotalEgresos FROM balance";
		$consulta = $this->db->query($query);
		return $consulta->result();
	}
	/**
     * Suma todos los ingresos segun mes y año
     */
	function sumaIngresos2($data){
		$year = $data['year'];
        $mes = $data['month'];
		$query = "SELECT SUM(ingreso) AS TotalIngresos FROM balance WHERE anio = '$year' AND mes = '$mes'";
		$consulta = $this->db->query($query);
		return $consulta->result();
	}
	/**
     * Suma todos los egresos segun mes y año
     */
	function sumaEgresos2($data){
		$year = $data['year'];
        $mes = $data['month'];
		$query = "SELECT SUM(egreso) AS TotalEgresos FROM balance WHERE anio = '$year' AND mes = '$mes'";
		$consulta = $this->db->query($query);
		return $consulta->result();
	}
	 /**
     * Obtiene la suma de los valores que pagan los moviles de manera mensual mes actual
     */
       function sumaValoresMes(){
       	$year = date('Y');
        $mes = date('m');
		$query = "SELECT SUM(valor_mes) AS TotalMovil FROM valor_mensual WHERE anio = $year AND mes = $mes";
		$consulta = $this->db->query($query);
		return $consulta->result();
	}
	/**
     * Muestra todos los Registros de la tabla
     */
	function ver_todo_mes($data){
		$year = $data['year'];
        $mes = $data['month'];
		$query = ("SELECT * FROM balance WHERE anio = '$year' AND mes = '$mes'");
		$consulta = $this->db->query($query);
        return $consulta->result();
	}
	/**
     * Obtiene los valores segun mes y año
     */
        public function buscar_total($data){
        	$year = $data['year'];
        	$mes = $data['month'];
            $sql = ("SELECT SUM(valor_mes) AS TotalMovil FROM valor_mensual WHERE anio = '$year' AND mes = '$mes'");
            $consulta = $this->db->query($sql);
            return $consulta->result();
        }
}