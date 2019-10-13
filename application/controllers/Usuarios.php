<?php defined('BASEPATH') OR exit('No direct script access allowed');



class Usuarios extends CI_Controller {



    public function __construct() {

        parent::__construct();

        // $this->load->library('form_validation');
        $this->load->model('Usuarios_model', 'UsuariosModel');

        $this->form_validation->set_error_delimiters('<p class="invalid-feedback">', '</p>');
    }

    public function index(){
            $data['usuarios'] = $this->UsuariosModel->obtenerUsuarios();

            $this->load->view('sis_header_private.php'); // Header File

            $this->load->view("User/usuarios_view",$data);

            $this->load->view('sis_footer_private.php'); // Footer File

    }
    /**

     * Ingreso de nuevos usuarios

    */
    public function ingresa(){
                $data = array(
                          'rol' => $this->input->post('rol'),
                          'nom' => trim($this->input->post('nom')),
                          'pat' => trim($this->input->post('pat')),
                          'mat' => trim($this->input->post('mat')),
                          'rut' => trim($this->input->post('rut')),
                          'dir' => trim($this->input->post('dir')),
                          'tel' => trim($this->input->post('tel')),
                          'mail' => trim($this->input->post('mail')),
                          'pass' => trim($this->input->post('pass'))
                        );

        //var_dump($data);

        $ingresa = $this->UsuariosModel->guardar($data);

        if($ingresa != false){

            $jsondata = array ('msg'=>'Registro exitoso');

        }else{

            $jsondata = array ('msg'=>'Error de registro');

        }

        header('Content-type: application/json; charset=utf-8');

        echo json_encode($jsondata);
    }
    /**
    * Editar Usuario
    */
    public function actualiza(){

        $data = array(
                          'cod' => $this->input->post('cod'),
                          'ro' => $this->input->post('ro'),
                          'no' => trim($this->input->post('no')),
                          'pa' => trim($this->input->post('pa')),
                          'ma' => trim($this->input->post('ma')),
                          'ru' => trim($this->input->post('ru')),
                          'di' => trim($this->input->post('di')),
                          'te' => trim($this->input->post('te')),
                          'mai' => trim($this->input->post('mai')),
                          'pas' => trim($this->input->post('pas'))
                        );

        //var_dump($data);

        $actualiza = $this->UsuariosModel->editar($data);

        if($actualiza != false){

            $jsondata = array ('msg'=>'Actualizacion exitosa');

        }else{

            $jsondata = array ('msg'=>'Error de actualizacion');

        }

        header('Content-type: application/json; charset=utf-8');

        echo json_encode($jsondata);

    }
    /**

     * Eliminar Usuarios

     */

    public function elimina(){

        $data = $this->input->post('id');

        //var_dump($data);

        $elimina = $this->UsuariosModel->eliminar($data);

        if($elimina){

            $jsondata = array ('msg'=>'Eliminacion exitosa');

        }else{

            $jsondata = array ('msg'=>'Error de Eliminacion');

        }

        header('Content-type: application/json; charset=utf-8');

        echo json_encode($jsondata);

    }
    /**

     * Buscador

     */

    public function buscar(){

        $data = $this->input->post('data');

        //var_dump($data);// si era por el vardump qu no funcionaba e mensaje

        $resultado = $this->UsuariosModel->buscar($data);

        echo json_encode($resultado);

    }
    /**

     * User Registration

     */

    public function registro() {

        $this->form_validation->set_rules('full_name', 'Full Name', 'required');

        $this->form_validation->set_rules('username', 'Username', 'required|is_unique[users.username]', [

            'is_unique' => 'The %s already exists. Please use a different username',

        ]); // Unique Field


        $this->form_validation->set_rules('email', 'Email Address', 'required|valid_email|is_unique[users.email]', [

            'is_unique' => 'The %s already exists. Please use a different email',

        ]); // // Unique Field


        $this->form_validation->set_rules('mobile', 'Mobile Number', 'required|min_length[10]|max_length[10]|numeric');

        $this->form_validation->set_rules('password', 'Password', 'required');

        $this->form_validation->set_rules('passconf', 'Password Confirmation', 'required|matches[password]');


        if ($this->form_validation->run() == FALSE)

        {

            $data['page_title'] = "User Registration";

            $this->load->view('_Layout/home/header.php', $data); // Header File

            $this->load->view("User/registration");

            $this->load->view('_Layout/home/footer.php'); // Footer File

        }

        else

        {   

            $insert_data = array(

                'fullname' => $this->input->post('full_name', TRUE),

                'username' => $this->input->post('username', TRUE),

                'email' => $this->input->post('email', TRUE),

                'mobile' => $this->input->post('mobile', TRUE),

                'password' => password_hash($this->input->post('password', TRUE), PASSWORD_DEFAULT),

                'is_active' => 1,

                'created_at' => time(),

                'update_at' => time(),

            );

            /**

             * Load User Model

             */

            $result = $this->UserModel->insert_user($insert_data);


            if ($result == TRUE) {


                $this->session->set_flashdata('success_flashData', 'You have registered successfully.');

                redirect('User/registration');


            } else {


                $this->session->set_flashdata('error_flashData', 'Invalid Registration.');

                redirect('User/registration');


            }

        }

    }

    /**

     * User Login

     */

	public function login() {

        $this->form_validation->set_rules('user', 'Nombre de Usuario', 'required|trim');

        $this->form_validation->set_rules('pass', 'Contraseña', 'required|trim');


        if ($this->form_validation->run() == FALSE)

        {

            $this->load->view('sis_header.php'); // Header File

            $this->load->view("home.php");

            $this->load->view('sis_footer.php'); // Footer File

        }

        else

        {

            $login_data = array(

                'user' => $this->input->post('user', TRUE),

                'pass' => $this->input->post('pass', TRUE),

            );

            /**

             * Load User Model

             */

            $this->load->model('Usuarios_model', 'UserModel');

            $result = $this->UserModel->check_login($login_data);


            if (!empty($result['status']) && $result['status'] === TRUE) {


                /**

                 * Create Session

                 * -----------------

                 * First Load Session Library

                 */

                $session_array = array(

                    'USER_ID'  => $result['data']->usuario_id,

                    'USER_NAME'  => $result['data']->usuario_rut,

                    'USERNAME'  => $result['data']->usuario_nombres,

                    'USER_AP'  => $result['data']->usuario_pat,

                    'USER_ROL' => $result['data']->usuario_rol

                );

                $this->session->set_userdata($session_array);

                $this->session->set_flashdata('success_flashData', 'Login Exitoso');

                redirect('Usuarios/panel');

            } else {


                $this->session->set_flashdata('error_flashData', 'Usuario/Contraseña Inválidos');

                redirect('Welcome');

            }

        }

    }

    /**

     * User Logout

     */

    public function logout() {

        /**

         * Remove Session Data

         */

        $remove_sessions = array('USER_ID', 'USER_NAME', 'USERNAME','USER_AP','USER_ROL');

        $this->session->unset_userdata($remove_sessions);

        redirect('Usuarios/login');
        //redirect('http://www.yahoo.com', 'refresh');
    }

    /**

     * User Panel

     */

    public function panel() {

        if (empty($this->session->userdata('USER_ID'))) {

            redirect('Usuarios/login');
        }

        $this->load->view('sis_header_private.php'); // Header File

        $this->load->view("User/panel");

        $this->load->view('sis_footer_private.php'); // Footer File

    }
    function valida_session(){
        
        if( !isset($_SESSION['USERNAME'])  ){
            return false;
        }else{
            return true;
        }
    }

}