<?php defined('BASEPATH') OR exit('No direct script access allowed');



class Valor extends CI_Controller {


    public function __construct() {

        parent::__construct();

        // $this->load->library('form_validation');

        $this->load->model('Valor_model', 'ValorModel');

        $this->load->model('ComboBoxes_Model', 'ComboBoxes');

        $this->load->helper('url');

        $this->form_validation->set_error_delimiters('<p class="invalid-feedback">', '</p>');

    }
    /**

     * Pagina de inicio

     */

    public function index(){

            $data['moviles'] = $this->ComboBoxes->getMoviles();
            $data['meses'] = $this->ComboBoxes->meses();
            $data['valores'] = $this->ValorModel->valores();

            if (!$this->session->userdata('USER_NAME')) {
              redirect('Usuarios/logout', 'refresh');
            }else{    

                if($this->session->userdata('USER_ROL') == '1'){
            $this->load->view('sis_header_private.php'); // Header File
            }else{
                $this->load->view('sis_header_private2.php');
            }

                $this->load->view("User/valor_view", $data);

                $this->load->view('sis_footer_private.php'); // Footer File
            }
    }
    public function guardar(){
      $data = array(  'mov' => trim($this->input->post('mov')),
                      'mes' => trim($this->input->post('mes')), 
                      'ano' => trim($this->input->post('ano')),
                      'val' => trim($this->input->post('valor'))
                      );

        //var_dump($data);
        $ingresa = $this->ValorModel->guardarValor($data);
        if($ingresa != false){

            $jsondata = array ('msg'=>'Registro exitoso');
          
          }else{
          
            $jsondata = array ('msg'=>'Error de registro');
          }
          header('Content-type: application/json; charset=utf-8');
          echo json_encode($jsondata);
    }
     /**
     * Actualizar Valores
     */

    public function actualiza(){

        $data = array('co' => trim($this->input->post('co')),
                      'me' => trim($this->input->post('me')), 
                      'an' => trim($this->input->post('an')),
                      'mo' => trim($this->input->post('mo')),
                      'va' => trim($this->input->post('va'))
                      );

        //var_dump($data);

        $actualiza = $this->ValorModel->editar($data);

        if($actualiza != false){

            $jsondata = array ('msg'=>'Actualizacion exitosa');

        }else{

            $jsondata = array ('msg'=>'Error de actualizacion');

        }

        header('Content-type: application/json; charset=utf-8');

        echo json_encode($jsondata);

    }
    /**

     * Eliminar Valores

     */

    public function elimina(){

        $data = $this->input->post('idt');
        var_dump($data);

        $elimina = $this->ValorModel->eliminar($data);

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

        $data = array('month' => trim($this->input->post('month')),
                      'year' => trim($this->input->post('year'))
                      );

        //var_dump($data);// si era por el vardump qu no funcionaba e mensaje

        $resultado = $this->ValorModel->buscar($data);

        echo json_encode($resultado);

    }

}     