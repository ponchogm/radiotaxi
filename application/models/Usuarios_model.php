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
    /**
     * Guarda Nuevo Usuario en la base de datos
     */
    function guardar($data){
        $data = array(
                'usuario_rut' => $data['rut'],
                'usuario_pat' => $data['pat'],
                'usuario_mat' => $data['mat'],
                'usuario_nombres' => $data['nom'],
                'usuario_pass' => $data['pass'],
                'usuario_dir' => $data['dir'],
                'usuario_fono' => $data['tel'],
                'usuario_rol' => $data['rol'],
                'usuario_correo' => $data['mail']
            );
        
        $result = $this->db->insert('usuario', $data);
        if($result){
            return TRUE;
        }else{
            return FALSE;
        }
    }
    /**
     * Edita Usuario en la base de datos
     */
    function editar($data){

        $id = $data['cod'];
        //echo $id;
            $data = array(
                'usuario_rut' => $data['ru'],
                'usuario_pat' => $data['pa'],
                'usuario_mat' => $data['ma'],
                'usuario_nombres' => $data['no'],
                'usuario_pass' => $data['pas'],
                'usuario_dir' => $data['di'],
                'usuario_fono' => $data['te'],
                'usuario_rol' => $data['ro'],
                'usuario_correo' => $data['mai']
            );
        $this->db->where('usuario_id', $id);
        $this->db->update('usuario', $data);
        $query = $this->db->get('usuario');
        if($query->num_rows() > 0){
            return $query;
        }else{
            return FALSE;
        }
    }
    /**
     * Elimina un usuario en la base de datos
     */
    function eliminar($data){
        $this->db->where('usuario_id', $data);
        return $query = $this->db->delete('usuario'); // Le pongo return para que le avise al controlador que hizo o no la eliminación
    }
    /**
     * Busqueda de datos en la base
     */
    public function buscar($data){
        $sql = ("SELECT * FROM usuario WHERE usuario_pat LIKE '%$data%'");
        $consulta = $this->db->query($sql);
        return $consulta->result();
    }
}
