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
		$data = array(
        		'fecha' => $hoy,
        		'Ingreso' => str_replace(".", "", $data['montoIn']),
        		'cuenta' => $data['cuentaIn']
			);
		
		$this->db->insert('balance', $data);
	}
	/**
     * Guarda Nuevo Egreso en la base de datos
     */
	function guardarEgreso($data){
		$hoy = date("d/m/Y");
		$data = array(
        		'fecha' => $hoy,
        		'Egreso' => str_replace(".", "", $data['montoEg']),
        		'cuenta' => $data['cuentaEg']
			);
		
		$this->db->insert('balance', $data);
	}
	/**
     * Muestra todos los Registros de la tabla
     */
	function ver_todo(){

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
}