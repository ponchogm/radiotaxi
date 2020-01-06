<?php defined('BASEPATH') OR exit('No direct script access allowed');



class Cliente extends CI_Controller {


    public function __construct() {

        parent::__construct();

        // $this->load->library('form_validation');

        $this->load->model('Cliente_model', 'ClienteModel');
        $this->load->model('ComboBoxes_Model', 'ComboBoxes');
        $this->load->helper('url');
        $this->form_validation->set_error_delimiters('<p class="invalid-feedback">', '</p>');
    }

    /**

     * Mostrar Clientees

     */
    public function mostrar(){

            $this->load->library('pagination');

            $config['base_url'] = base_url('Cliente/mostrar');

            $config['total_rows'] = $this->ClienteModel->num_cliente();

            $config['per_page'] = 10;

            $config['uri_segment'] = 3;

            $config['num_links'] = 5;

            $config['full_tag_open'] = '<ul class="pagination">';

            $config['full_tag_close'] = '</ul>';

            $config['first_link'] = false;

            $config['last_link'] = false;

            $config['first_tag_open'] = '<li>';

            $config['first_tag_close'] = '</li>';

            $config['prev_link'] = '&laquo';

            $config['prev_tag_open'] = '<li class="prev">';

            $config['prev_tag_close'] = '</li>';

            $config['next_link'] = '&raquo';

            $config['next_tag_open'] = '<li>';

            $config['next_tag_close'] = '</li>';

            $config['last_tag_open'] = '<li>';

            $config['last_tag_close'] = '</li>';

            $config['cur_tag_open'] = '<li class="active"><a href="#">';

            $config['cur_tag_close'] = '</a></li>';

            $config['num_tag_open'] = '<li>';

            $config['num_tag_close'] = '</li>';



            $this->pagination->initialize($config);



            $result = $this->ClienteModel->get_pagination($config['per_page']);

            $data['clientes'] = $result;

            $data['pagination'] = $this->pagination->create_links();

            $data['total_reg'] = $this->ClienteModel->num_cliente();

            $data['comunas'] = $this->ComboBoxes->getComunas();

            //$data['moviles'] = $this->MovilModel->ver_todo();// funcion que se reemplazó por la de paginacion.
           if (!$this->session->userdata('USER_NAME')) {
              redirect('Usuarios/logout', 'refresh');
            }else{
              if($this->session->userdata('USER_ROL') == '1'){
              $this->load->view('sis_header_private.php'); // Header File
              }else{
                  $this->load->view('sis_header_private2.php');
              }

              $this->load->view('User/cliente_view', $data);

              $this->load->view('sis_footer_private.php'); // Footer File
            }
    }

    /**

     * Pagina de inicio

     */

    public function index(){
      if (!$this->session->userdata('USER_NAME')) {
              redirect('Usuarios/logout', 'refresh');
            }else{  

            if($this->session->userdata('USER_ROL') == '1'){
            $this->load->view('sis_header_private.php'); // Header File
            }else{
                $this->load->view('sis_header_private2.php');
            }

            $this->load->view("User/cliente_view");

            $this->load->view('sis_footer_private.php'); // Footer File
          }
    }
     public function registrar(){

            $data['comunas'] = $this->ComboBoxes->getComunas();

            if($this->session->userdata('USER_ROL') == '1'){
            $this->load->view('sis_header_private.php'); // Header File
            }else{
                $this->load->view('sis_header_private2.php');
            }

            $this->load->view("User/regCliente_view", $data);

            $this->load->view('sis_footer_private.php'); // Footer File

    }

    /**

     * Ingesa Nuevos Clientes

     */

    public function ingresa(){

        $data = array('rut'       => trim($this->input->post('rut')),
                      'nombres'   => trim($this->input->post('nombres')),
                      'pat'       => trim($this->input->post('pat')),
                      'mat'       => trim($this->input->post('mat')),
                      'dir'       => trim($this->input->post('dir')),
                      'telcasa'   => trim($this->input->post('telcasa')),
                      'telpega'   => trim($this->input->post('telpega')),
                      'telcel'    => trim($this->input->post('telcel')),
                      'com'       => trim($this->input->post('com')),
                      'nac'       => trim($this->input->post('nac')),
                      'email'     => trim($this->input->post('email')),
                      'clavecli'  => trim($this->input->post('clavecli')),
                      'numcli'    => trim($this->input->post('numcli'))
                      );

        //var_dump($data);

        $ingresa = $this->ClienteModel->guardar($data);

        if($ingresa != false){

            $jsondata = array ('msg'=>'Registro exitoso');

        }else{

            $jsondata = array ('msg'=>'Error de registro');

        }

        header('Content-type: application/json; charset=utf-8');

        echo json_encode($jsondata);

    }
    /**

     * Actualizar Clientes

     */

    public function actualiza(){

        $data = array('cod'       => trim($this->input->post('cod')),
                      'rut'       => trim($this->input->post('rut')),
                      'nom'       => trim($this->input->post('nombres')),
                      'pat'       => trim($this->input->post('pat')),
                      'mat'       => trim($this->input->post('mat')),
                      'dir'       => trim($this->input->post('dir')),
                      'foncasa'   => trim($this->input->post('telcasa')),
                      'fonpega'   => trim($this->input->post('telpega')),
                      'foncel'    => trim($this->input->post('telcel')),
                      'com'       => trim($this->input->post('com')),
                      'nac'       => trim($this->input->post('nac')),
                      'email'     => trim($this->input->post('email')),
                      'clavecli'  => trim($this->input->post('clavecli')),
                      'numcli'    => trim($this->input->post('numcli'))
                      );

        //var_dump($data);

        $actualiza = $this->ClienteModel->editar($data);

        if($actualiza != false){
            redirect(base_url('Cliente/mostrar'));
            //$jsondata = array ('msg'=>'Actualizacion exitosa');

        }else{

            $jsondata = array ('msg'=>'Error de actualizacion');

        }

        header('Content-type: application/json; charset=utf-8');

        echo json_encode($jsondata);

    }
    /**

     * Eliminar Móviles

     */

    public function elimina(){

        $data = $this->input->post('id');

        //var_dump($data);

        $elimina = $this->ClienteModel->eliminar($data);

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

        $resultado = $this->ClienteModel->buscar($data);

        echo json_encode($resultado);

    }
    /**

     * Consulta para Obtener las comunas para el combo box

     */

    public function obtenerComunas(){

        $data['comunas'] = $this->ClienteModel->obtenerComunas();

        $this->load->view("User/Cliente_view", $data);

        //return $data;
    }
    /**

     * Consulta para Obtener cliente

     */

    public function obtenerCliente($cod){

        $data['comunas'] = $this->ComboBoxes->getComunas();
        $data['cliente'] = $this->ClienteModel->obtenerCliente($cod);
     if (!$this->session->userdata('USER_NAME')) {
              redirect('Usuarios/logout', 'refresh');
            }else{
               if($this->session->userdata('USER_ROL') == '1'){
                    $this->load->view('sis_header_private.php'); // Header File
                    }else{
                        $this->load->view('sis_header_private2.php');
                    }
                $this->load->view("User/editCliente_view", $data);
                $this->load->view('sis_footer_private.php'); // Footer File
                //return $data;
    }
   } 

}     