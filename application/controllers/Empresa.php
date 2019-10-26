<?php defined('BASEPATH') OR exit('No direct script access allowed');



class Empresa extends CI_Controller {


    public function __construct() {

        parent::__construct();

        // $this->load->library('form_validation');

        $this->load->model('Empresa_model', 'EmpresaModel');
        $this->load->model('ComboBoxes_Model', 'ComboBoxes');
        $this->load->helper('url');
        $this->form_validation->set_error_delimiters('<p class="invalid-feedback">', '</p>');
    }

    /**

     * Mostrar Clientees

     */
    public function mostrar(){

            $this->load->library('pagination');

            $config['base_url'] = base_url('Empresa/mostrar');

            $config['total_rows'] = $this->EmpresaModel->num_empresa();

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



            $result = $this->EmpresaModel->get_pagination($config['per_page']);

            $data['clientes'] = $result;

            $data['pagination'] = $this->pagination->create_links();

            $data['total_reg'] = $this->EmpresaModel->num_empresa();

            $data['comunas'] = $this->ComboBoxes->getComunas();

            //$data['moviles'] = $this->MovilModel->ver_todo();// funcion que se reemplazó por la de paginacion.

            if($this->session->userdata('USER_ROL') == '1'){
            $this->load->view('sis_header_private.php'); // Header File
            }else{
                $this->load->view('sis_header_private2.php');
            }

            $this->load->view('User/empresa_view', $data);

            $this->load->view('sis_footer_private.php'); // Footer File

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

            $this->load->view("User/empresa_view");

            $this->load->view('sis_footer_private.php'); // Footer File
          }
    }
     public function registrar(){
       if (!$this->session->userdata('USER_NAME')) {
              redirect('Usuarios/logout', 'refresh');
            }else{

            $data['comunas'] = $this->ComboBoxes->getComunas();

            $this->load->view('sis_header_private.php'); // Header File

            $this->load->view("User/regEmpresa_view", $data);

            $this->load->view('sis_footer_private.php'); // Footer File
          }
    }

    /**

     * Ingesa Nuevos Clientes

     */

    public function ingresa(){

        $data = array('rut'       => trim($this->input->post('rut')),
                      'rsoc'      => trim($this->input->post('rsoc')),
                      'dir'       => trim($this->input->post('dir')),
                      'com'       => trim($this->input->post('com')),
                      'fono'      => trim($this->input->post('fono')),
                      'email'     => trim($this->input->post('email')),
                      'rutrl'     => trim($this->input->post('rutrl')),
                      'nomrl'     => trim($this->input->post('nomrl')),
                      'clave'     => trim($this->input->post('clave')),
                      'num'       => trim($this->input->post('num'))
                      );

        //var_dump($data);

        $ingresa = $this->EmpresaModel->guardar($data);

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
                      'rsoc'      => trim($this->input->post('rsoc')),
                      'dir'       => trim($this->input->post('dir')),
                      'com'       => trim($this->input->post('com')),
                      'fono'      => trim($this->input->post('fono')),
                      'email'     => trim($this->input->post('email')),
                      'rutrl'     => trim($this->input->post('rutrl')),
                      'nomrl'     => trim($this->input->post('nomrl')),
                      'clave'     => trim($this->input->post('clave')),
                      'num'       => trim($this->input->post('num'))
                      );

        //var_dump($data);

        $actualiza = $this->EmpresaModel->editar($data);

        if($actualiza != false){
            redirect(base_url('Empresa/mostrar'));
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

        $elimina = $this->EmpresaModel->eliminar($data);

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

        $resultado = $this->EmpresaModel->buscar($data);

        echo json_encode($resultado);

    }
    /**

     * Consulta para Obtener las comunas para el combo box

     */

    public function obtenerComunas(){

        $data['comunas'] = $this->EmpresaModel->obtenerComunas();

        $this->load->view("User/Empresa_view", $data);

        //return $data;
    }
    /**

     * Consulta para Obtener cliente

     */

    public function obtenerEmpresa($cod){

        $data['comunas'] = $this->ComboBoxes->getComunas();
        $data['empresa'] = $this->EmpresaModel->obtenerEmpresa($cod);
         if (!$this->session->userdata('USER_NAME')) {
              redirect('Usuarios/logout', 'refresh');
            }else{
            if($this->session->userdata('USER_ROL') == '1'){
                $this->load->view('sis_header_private.php'); // Header File
                }else{
                    $this->load->view('sis_header_private2.php');
                }
            $this->load->view("User/editEmpresa_view", $data);
            $this->load->view('sis_footer_private.php'); // Footer File
            //return $data;
    }
  }
}