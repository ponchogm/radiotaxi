<?php defined('BASEPATH') OR exit('No direct script access allowed');



class Chofer extends CI_Controller {


    public function __construct() {

        parent::__construct();

        // $this->load->library('form_validation');

        $this->load->model('Chofer_model', 'ChoferModel');

        $this->load->model('ComboBoxes_Model', 'ComboBoxes');

        $this->load->helper('url');



        $this->form_validation->set_error_delimiters('<p class="invalid-feedback">', '</p>');

    }

    /**

     * Mostrar Choferes

     */

    public function mostrar(){



            $this->load->library('pagination');

            $config['base_url'] = base_url('Chofer/mostrar');

            $config['total_rows'] = $this->ChoferModel->num_chofer();

            $config['per_page'] = 20;

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



            $result = $this->ChoferModel->get_pagination($config['per_page']);

            $data['choferes'] = $result;

            $data['pagination'] = $this->pagination->create_links();

            $data['total_reg'] = $this->ChoferModel->num_chofer();

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

                $this->load->view('User/chofer_view', $data);

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
        if (!$this->session->userdata('USER_NAME')) {
              redirect('Usuarios/logout', 'refresh');
            }else{  

            if($this->session->userdata('USER_ROL') == '1'){
            $this->load->view('sis_header_private.php'); // Header File
            }else{
                $this->load->view('sis_header_private2.php');
            }

            $this->load->view("User/chofer_view");

            $this->load->view('sis_footer_private.php'); // Footer File
        }
       } 
    }

    /**

     * Ingesa Nuevos Móviles

     */

    public function ingresa(){

        $data = array('ru' => trim($this->input->post('ru')),

                      'no' => trim($this->input->post('no')),

                      'pa' => trim($this->input->post('pa')),

                      'ma' => trim($this->input->post('ma')),

                      'di' => trim($this->input->post('di')),

                      'tf' => trim($this->input->post('tf')),

                      'ce' => trim($this->input->post('ce')),

                      'co' => trim($this->input->post('co'))

                        );

        //var_dump($data);

        $ingresa = $this->ChoferModel->guardar($data);

        if($ingresa != false){

            $jsondata = array ('msg'=>'Registro exitoso');

        }else{

            $jsondata = array ('msg'=>'Error de registro');

        }

        header('Content-type: application/json; charset=utf-8');

        echo json_encode($jsondata);

    }
    /**

     * Actualizar Choferes

     */

    public function actualiza(){

        $data = array('rut' => $this->input->post('rut'),

                      'nom' => trim($this->input->post('nom')),

                      'pat' => trim($this->input->post('pat')),

                      'mat' => trim($this->input->post('mat')),

                      'dir' => trim($this->input->post('dir')),

                      'fon' => trim($this->input->post('fon')),

                      'cel' => trim($this->input->post('cel')),

                      'com' => $this->input->post('com')

                        );

        //var_dump($data);

        $actualiza = $this->ChoferModel->editar($data);

        if($actualiza != false){

            $jsondata = array ('msg'=>'Actualizacion exitosa');

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

        $elimina = $this->ChoferModel->eliminar($data);

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

        $resultado = $this->ChoferModel->buscar($data);

        echo json_encode($resultado);

    }
    /**

     * Consulta para Obtener las comunas para el combo box

     */

    public function obtenerComunas(){

        $data['comunas'] = $this->ChoferModel->obtenerComunas();

        $this->load->view("User/chofer_view", $data);

        //return $data;
    }

}     