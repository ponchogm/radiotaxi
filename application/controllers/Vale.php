<?php defined('BASEPATH') OR exit('No direct script access allowed');



class Vale extends CI_Controller {


    public function __construct() {

        parent::__construct();

        // $this->load->library('form_validation');

        $this->load->model('Vale_model', 'ValeModel');

        $this->load->model('ComboBoxes_Model', 'ComboBoxes');

        $this->load->helper('url');

        $this->form_validation->set_error_delimiters('<p class="invalid-feedback">', '</p>');

    }

    /**

     * Pagina de inicio

     */

    public function index(){

            $data['talonarios'] = $this->ComboBoxes->getTalonarios();
            $data['clientes'] = $this->ComboBoxes->getClientes();
            $data['moviles'] = $this->ComboBoxes->getMovilDisponibleTalonario();
            $data['ultimo_tal'] = $this->ComboBoxes->getLastTal();
            $data['tot_tal'] = $this->ComboBoxes->getTotTal();
            $data['tot_talMov'] = $this->ComboBoxes->getTotTalMov();
            $data['tot_talCli'] = $this->ComboBoxes->getTotTalCli();
            $tot = $this->ComboBoxes->getTotTal();
            $tt = array('tot' => $tot);
            $data['page_title'] = $this->ComboBoxes->getTotTal();

            $this->load->view('sis_header_private.php'); // Header File

            $this->load->view("User/vale_view", $data);

            $this->load->view('sis_footer_private.php'); // Footer File

    }

    /**

     * Ingesa Nuevos Talonarios

     */

    public function ingresa(){

        $data = array('inicio' => trim($this->input->post('inicio')),

                      'termino' => trim($this->input->post('termino'))
                      );

        //var_dump($data);
        $ingresa = $this->ValeModel->guardar($data);
        if($ingresa != false){

            $jsondata = array ('msg'=>'Registro exitoso');
          
          }else{
          
            $jsondata = array ('msg'=>'Error de registro');
          }
          header('Content-type: application/json; charset=utf-8');
          echo json_encode($jsondata);
    }
    /**

     * Asigna talonarios a Clientes

     */

    public function asignaCli(){

        $data = array('clientes' => trim($this->input->post('clientes')),

                      'talonarios' => trim($this->input->post('talonarios'))
                      );

        //var_dump($data);
        $ingresa = $this->ValeModel->asignaCli($data);
        if($ingresa != false){

            $jsondata = array ('msg'=>'Registro exitoso');
          
          }else{
          
            $jsondata = array ('msg'=>'Error de registro');
          }
          header('Content-type: application/json; charset=utf-8');
          echo json_encode($jsondata);
    }
    /**

     * Asigna Talonarios a Móviles

     */

    public function asignaMov(){

        $data = array('moviles' => trim($this->input->post('moviles')),

                      'talonarios' => trim($this->input->post('talonarios'))
                      );

        //var_dump($data);
        $ingresa = $this->ValeModel->asignaMov($data);
        if($ingresa != false){

            $jsondata = array ('msg'=>'Registro exitoso');
          
          }else{
          
            $jsondata = array ('msg'=>'Error de registro');
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

     * Pagina de inicio de los vales

     */

    public function vales(){

            $data['talonarios'] = $this->ComboBoxes->getTalonarios();
            $data['clientes'] = $this->ComboBoxes->getClientes();
            $data['moviles'] = $this->ComboBoxes->getMovilDisponibleTalonario();
            $data['ultimo_tal'] = $this->ComboBoxes->getLastTal();
            $data['tot_tal'] = $this->ComboBoxes->getTotTal();
            $data['tot_talMov'] = $this->ComboBoxes->getTotTalMov();
            $data['tot_talCli'] = $this->ComboBoxes->getTotTalCli();
            $tot = $this->ComboBoxes->getTotTal();
            $tt = array('tot' => $tot);
            $data['page_title'] = $this->ComboBoxes->getTotTal();
            $data['movilTalonario'] = $this->ComboBoxes->getMovilTalonario();

            $this->load->view('sis_header_private.php'); // Header File

            $this->load->view("User/vales_view", $data);

            $this->load->view('sis_footer_private.php'); // Footer File

    }
    /**

     * Ingesa Nuevos Talonarios

     */

    public function getValeNum(){

        $data = $this->input->post(); //ahi si paso el dato solo que esperba
        $cadena = $data['datos'];
        $array = explode(",", $cadena);
        $id_tal = $array[0];
        $f_inicio = $array[1];
        

        $resultado = $this->ValeModel->getValeNum($id_tal);
        
        if ($resultado == FALSE){
          echo $f_inicio;
         }
        else{
          echo json_encode($resultado[0]);
        }
    }
}     