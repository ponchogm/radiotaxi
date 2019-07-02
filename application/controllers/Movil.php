<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Movil extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // $this->load->library('form_validation');
        $this->load->model('Movil_model', 'MovilModel');
        $this->load->helper('url');

        $this->form_validation->set_error_delimiters('<p class="invalid-feedback">', '</p>');
    }

    /**
     * Mostrar Móviles
     */
    public function mostrar(){

            $this->load->library('pagination');
            $config['base_url'] = base_url('Movil/mostrar');
            $config['total_rows'] = $this->MovilModel->num_movil();
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

            $result = $this->MovilModel->get_pagination($config['per_page']);
            $data['moviles'] = $result;
            $data['pagination'] = $this->pagination->create_links();
            //$data['moviles'] = $this->MovilModel->ver_todo();// funcion que se reemplazó por la de paginacion.
            $this->load->view('sis_header_private.php'); // Header File
            $this->load->view('user/movil_view', $data);
            $this->load->view('sis_footer_private.php'); // Footer File
    }

    /**
     * Editar Móviles
     */
    public function editar(){

            $id = $this->uri->segment(3);
            $obtenerMovil = $this->MovilModel->consulta($id);
            if($obtenerMovil != FALSE){
                $data = array('info' => $obtenerMovil);
            }else{
                return FALSE;
            }
            $this->load->view('sis_header_private.php'); // Header File
            $this->load->view('user/movil_view', $data);
            $this->load->view('sis_footer_private.php'); // Footer File
    }

    /**
     * Pagina de inicio
     */
    public function index(){

            $this->load->view('sis_header_private.php'); // Header File
            $this->load->view("user/movil_view");
            $this->load->view('sis_footer_private.php'); // Footer File
    }
    /**
     * Ingesa Nuevos Móviles
     */
    public function ingresa(){
        $data = array('tco' => $this->input->post('tco'),
                      'ru' => $this->input->post('ru'),
                      'pa' => trim($this->input->post('pa')),
                      'ma' => trim($this->input->post('ma')),
                      'mo' => trim($this->input->post('mo')),
                      'an' => trim($this->input->post('an')),
                      'nu' => trim($this->input->post('nu')),
                      'va' => trim($this->input->post('va'))
                        );
        //var_dump($data);
        $ingresa = $this->MovilModel->guardar($data);
        if($ingresa != false){
            $jsondata = array ('msg'=>'Registro exitoso');
        }else{
            $jsondata = array ('msg'=>'Error de registro');
        }
        header('Content-type: application/json; charset=utf-8');
        echo json_encode($jsondata);
    }

    /**
     * Actualizar Móviles
     */
    public function actualiza(){
        $data = array('cod' => $this->input->post('cod'),
                      'rut' => $this->input->post('rut'),
                      'pat' => trim($this->input->post('pat')),
                      'mar' => trim($this->input->post('mar')),
                      'mod' => trim($this->input->post('mod')),
                      'ano' => trim($this->input->post('ano')),
                      'num' => trim($this->input->post('num')),
                      'val' => trim($this->input->post('val'))
                        );
        //var_dump($data);
        $actualiza = $this->MovilModel->editar($data);
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
    public function elimina($data){
        var_dump($data);
    }
}