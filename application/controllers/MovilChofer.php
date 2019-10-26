<?php defined('BASEPATH') OR exit('No direct script access allowed');



class MovilChofer extends CI_Controller {


    public function __construct() {

        parent::__construct();

        // $this->load->library('form_validation');

        $this->load->model('MovilChofer_model', 'MovilChoferModel');

        $this->load->model('ComboBoxes_Model', 'ComboBoxes');

        $this->load->helper('url');

        $this->form_validation->set_error_delimiters('<p class="invalid-feedback">', '</p>');

    }

    /**

     * Mostrar Choferes

     */

    public function mostrar(){



            $this->load->library('pagination');

            $config['base_url'] = base_url('MovilChofer/mostrar');

            $config['total_rows'] = $this->MovilChoferModel->num_movilchofer();

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



            $result = $this->MovilChoferModel->get_pagination($config['per_page']);

            $data['movileschoferes'] = $result;
            $data['ver'] = $this->MovilChoferModel->ver_todo();
            $data['pagination'] = $this->pagination->create_links();
            $data['total_reg'] = $this->MovilChoferModel->num_movilchofer();            
            $data['choferes'] = $this->ComboBoxes->getChoferes();
            $data['moviles'] = $this->ComboBoxes->getMoviles();
            $data['movildisp'] = $this->ComboBoxes->getMovilDisponible();
            $data['choferdisp'] = $this->ComboBoxes->getChoferDisponible();

            //$data['moviles'] = $this->MovilModel->ver_todo();// funcion que se reemplazó por la de paginacion.
             if (!$this->session->userdata('USER_NAME')) {
              redirect('Usuarios/logout', 'refresh');
            }else{
                    if($this->session->userdata('USER_ROL') == '1'){
                    $this->load->view('sis_header_private.php'); // Header File
                    }else{
                        $this->load->view('sis_header_private2.php');
                    }

                    $this->load->view('User/movilchofer_view', $data);

                    $this->load->view('sis_footer_private.php'); // Footer File
                }
    }

    /**

     * Pagina de inicio

     */

    public function index(){
    		$data['ver'] = $this->MovilChoferModel->ver_todo();
    		  
        //echo json_encode($jsondata);
            if (!$this->session->userdata('USER_NAME')) {
              redirect('Usuarios/logout', 'refresh');
            }else{  

            if($this->session->userdata('USER_ROL') == '1'){
            $this->load->view('sis_header_private.php'); // Header File
            }else{
                $this->load->view('sis_header_private2.php');
            }

            $this->load->view("User/movilchofer_view");

            $this->load->view('sis_footer_private.php'); // Footer File
        }
    }

    /**

     * Ingesa Nuevos Móviles

     */

    public function ingresa(){

        $data = array('cho' => trim($this->input->post('cho')),

                      'mov' => trim($this->input->post('mov'))

                        );

        //var_dump($data);

        $ingresa = $this->MovilChoferModel->guardar($data);

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

        $data = array('ch' => trim($this->input->post('ch')),

                      'mo' => trim($this->input->post('mo'))

                      );

        //var_dump($data);

        $actualiza = $this->MovilChoferModel->editar($data);

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

        $elimina = $this->MovilChoferModel->eliminar($data);

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
    /**

     * Consulta para Obtener las comunas para el combo box

     */

    public function getMovilDisponible(){

        $data['movildisp'] = $this->ComboBoxes->getMovilDisponible();

        $this->load->view("User/movilchofer_view", $data);

        //return $data;
    }

}     