<?php 

class Usuarios_model extends CI_Model {

    protected $User_table_name = "usuario";

    /**
     * Insert User Data in Database
     * @param: {array} userData
     */
    public function inserta_usuario($userData) {
        return $this->db->insert($this->User_table_name, $userData);
    }

    /**
     * Check User Login in Database
     * @param: {array} userData
     */
    public function check_login($userData) {

        /**
         * First Check User is Exists in Database
         */
        $query = $this->db->get_where($this->User_table_name, array('usuario_rut' => $userData['user']));
        if ($this->db->affected_rows() > 0) {

            $password = $query->row('usuario_pass');

            /**
             * Check Password Hash 
             */
            //if (password_verify($userData['pass'], $password) === TRUE) {
            if ($userData['pass'] === $password) {

                /**
                 * Password and Username Address Valid
                 */
                return [
                    'status' => TRUE,
                    'data' => $query->row(),
                ];

            } else {
                return ['status' => FALSE,'data' => FALSE];
            }

        } else {
            return ['status' => FALSE,'data' => FALSE];
        }
    }
    /**
     * Obtener listado de usuarios en la base de datos
     */
    public function obtenerUsuarios(){
        $query = $this->db->get('usuario');
        if($query->num_rows() > 0){
            return $query;
        }else{
            return FALSE;
        }
    }
}
