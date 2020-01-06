<?php
class ComboBoxes_Model extends CI_Model{
    	
	public function ___construct(){
        parent::___construct();
    }
	/**
     * Obtiene las comunas
     */
        public function getComunas() {
        $this->db->from('comuna');
        $this->db->order_by("ComunaNombre", "asc");
        $comunas = $this->db->get(); 
        //return $query->result();
        if($comunas->num_rows() > 0){
            return $comunas->result();
        }
    }
    /**
     * Obtiene los choferes
     */
        public function getChoferes() {
        $this->db->from('chofer');
        $this->db->order_by("ChoferApellidoPat", "asc");
        $choferes = $this->db->get(); 
        //return $query->result();
        if($choferes->num_rows() > 0){
            return $choferes->result();
        }
    }
    /**
     * Obtiene todos los móviles
     */
        public function getMoviles() {
        $this->db->from('movil');
        $this->db->order_by("MovilCodigo", "asc");
        $moviles = $this->db->get(); 
        //return $query->result();
        if($moviles->num_rows() > 0){
            return $moviles->result();
        }
    }
    /**
     * Obtiene los móviles que no están asignados a ningún chofer
     */
        public function getMovilDisponible(){
            $sql = ("SELECT movil.MovilCodigo, movil.MovilPatente FROM movil WHERE MovilCodigo Not In (SELECT MovilCodigo from movilchofer)");
            $consulta = $this->db->query($sql);
            return $consulta->result();
        }
     /**
     * Obtiene los móviles que no están asignados a ningún chofer
     */
        public function getChoferDisponible(){
            $sql = ("SELECT chofer.ChoferRut, chofer.ChoferNombres, chofer.ChoferApellidoPat FROM chofer WHERE ChoferRut Not In (SELECT ChoferRut from movilchofer)");
            $consulta = $this->db->query($sql);
            return $consulta->result();
        }
    /**
     * Obtiene los Talonarios disponibles
     */
        public function getTalonarios() {
        $sql = ("SELECT talonario.TalonarioCodigo, talonario.TalonarioInicio, talonario.TalonarioTermino FROM talonario WHERE talonario.TalonarioCodigo NOT IN (SELECT id_talonario FROM talonario_cliente WHERE id_talonario = talonario.TalonarioCodigo) AND talonario.TalonarioCodigo NOT IN (SELECT id_talonario FROM talonario_movil WHERE id_talonario = talonario.TalonarioCodigo) ORDER BY TalonarioInicio");
            $consulta = $this->db->query($sql);
            return $consulta->result();
        }
    /**
     * Obtiene el último talonario ingresado
     */
        public function getLastTal() {
        $sql = ("SELECT * FROM talonario WHERE TalonarioCodigo = (SELECT MAX(TalonarioCodigo) FROM talonario) ORDER BY TalonarioCodigo");
            $consulta = $this->db->query($sql);
            return $consulta->result();
        }
    /**
     * Cuenta la cantidad de taloarios ingresados al sistema
     */
        public function getTotTal() {
        $sql = ("SELECT COUNT(*) AS total FROM talonario");
            $consulta = $this->db->query($sql);
            return $consulta->result();
        }
    /**
     * Cuenta la cantidad de taloarios de moviles ingresados al sistema
     */
        public function getTotTalMov() {
        $sql = ("SELECT COUNT(*) AS total FROM talonario_movil");
            $consulta = $this->db->query($sql);
            return $consulta->result();
        }
    /**
     * Cuenta la cantidad de taloarios de clientes ingresados al sistema
     */
        public function getTotTalCli() {
        $sql = ("SELECT COUNT(*) AS total FROM talonario_cliente");
            $consulta = $this->db->query($sql);
            return $consulta->result();
        }      
    /**
     * Obtiene los Clientes
     */
        public function getClientes() {
        $sql = ("SELECT cliente.ClienteCodigo, cliente.ClienteRut, cliente.ClienteNombres, cliente.ClienteApellidoPat, cliente.ClienteApellidoMat FROM cliente ORDER BY ClienteRut");
            $consulta = $this->db->query($sql);
            return $consulta->result();
        }
    /**
     * Obtiene los móviles que no están asignados a ningún talonario en uso
     */
        public function getMovilDisponibleTalonario(){
            $sql = ("SELECT movil.MovilCodigo, movil.MovilNumero FROM movil WHERE movil.MovilCodigo Not In (SELECT id_movil FROM talonario_movil WHERE id_movil = movil.MovilCodigo AND estado = 1)");
            $consulta = $this->db->query($sql);
            return $consulta->result();
        }
    /**
     * Obtiene los móviles que están asignados a un talonario en uso
     */
        public function getMovilTalonario(){
            $sql = ("SELECT talonario_movil.id_talonario, talonario_movil.folio_inicio, movil.MovilCodigo, movil.MovilNumero FROM talonario_movil, movil WHERE talonario_movil.id_movil = movil.MovilCodigo AND talonario_movil.estado = 1");
            $consulta = $this->db->query($sql);
            return $consulta->result();
        }
    /**
     * Obtiene los clientes que están asignados a un talonario en uso
     */
        public function getClienteTalonario(){
            $sql = ("SELECT * FROM talonario_cliente WHERE talonario_cliente.estado = 1");
            $consulta = $this->db->query($sql);
            return $consulta->result();
        }    
    /**
     *   Obtiene listado de meses del año y sus codigos
     */
        public function meses(){
            $this->db->from('meses');
            $this->db->order_by("MesesCodigo", "asc");
            $meses = $this->db->get(); 
        
            if($meses->num_rows() > 0){
                return $meses->result();
            }
        }
    /**
     * Obtiene los meses bloqueados
     */
        public function getMesesBloq(){
            $sql = ("SELECT * FROM meses WHERE estado = 0 ORDER BY MesesCodigo");
            $consulta = $this->db->query($sql);
            return $consulta->result();
        }
    /**
     * Obtiene los meses habilitados
     */
        public function getMesesHab(){
            $sql = ("SELECT * FROM meses WHERE estado = 1 ORDER BY MesesCodigo");
            $consulta = $this->db->query($sql);
            return $consulta->result();
        }
    /**
     * Obtiene todos los Talonarios
     */
        public function getTalonariosTot() {
        $this->db->from('talonario');
        $this->db->order_by("TalonarioCodigo", "asc");
        $choferes = $this->db->get(); 
        //return $query->result();
        if($choferes->num_rows() > 0){
            return $choferes->result();
        }
    }            
}