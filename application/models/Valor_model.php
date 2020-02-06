<?php
class Valor_model extends CI_Model{
	
	public function ___construct(){
		parent::___construct();
	}

	 /**
     * Obtiene los valores por mes y año actual
     */
        public function valores(){
        	$year = date('Y');
        	$mes = date('m');
        	//$mes = '2';
            $sql = ("SELECT * FROM valor_mensual WHERE anio = $year AND mes = $mes ORDER BY id_movil");
            $consulta = $this->db->query($sql);
            return $consulta->result();
        }
     /**
     * Obtiene los valores segun mes y año
     */
        public function buscar($data){
        	$year = $data['year'];
        	$mes = $data['month'];
            $sql = ("SELECT * FROM valor_mensual WHERE anio = '$year' AND mes = '$mes' ORDER BY id_movil");
            $consulta = $this->db->query($sql);
            return $consulta->result();
        }
    
    /**
    * Ingresa nuevos valores al movil
    */
    public function guardarValor($data){
			$data = array(
        		'id_movil' => $data['mov'],
        		'valor_mes' => str_replace(".", "", $data['val']),
        		'mes' => $data['mes'],
        		'anio' => $data['ano']
			);
		
		$this->db->insert('valor_mensual', $data);
    }
    /**
     * Edita un Registro en la base de datos
     */
	function editar($data){

		$id = $data['co'];
		//echo $id;
			$data = array(
				'id' => $id,
        		'id_movil' => $data['mo'],
        		'valor_mes' => $data['va'],
        		'mes' => $data['me'],
        		'anio' => $data['an']
			);
		$this->db->where('id', $id);
		$this->db->update('valor_mensual', $data);
		$query = $this->db->get('valor_mensual');
		if($query->num_rows() > 0){
			return $query;
		}else{
			return FALSE;
		}
	}
	/**
     * Elimina un valor en la base de datos
     */
    function eliminar($data){
        $this->db->where('id', $data);
        return $query = $this->db->delete('valor_mensual'); // Le pongo return para que le avise al controlador que hizo o no la eliminación
    }
}