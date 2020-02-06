<?php defined('BASEPATH') OR exit('No direct script access allowed');



class Balance extends CI_Controller {


    public function __construct() {

        parent::__construct();

        // $this->load->library('form_validation');
        // load Session Library
        $this->load->library('session');

        $this->load->model('Balance_model', 'BalanceModel');

        $this->load->model('ComboBoxes_Model', 'ComboBoxes');

        $this->load->helper('url');

        $this->form_validation->set_error_delimiters('<p class="invalid-feedback">', '</p>');

    }

    /**

     * Pagina de inicio

     */

    public function index(){

            $data['meses'] = $this->ComboBoxes->meses();
            $data['ver_reg'] = $this->BalanceModel->ver_todo();
            $data['total_in'] = $this->BalanceModel->sumaIngresos();
            $data['total_eg'] = $this->BalanceModel->sumaEgresos();
            $data['total_movil'] = $this->BalanceModel->sumaValoresMes();

            if (!$this->session->userdata('USER_NAME')) {
              redirect('Usuarios/logout', 'refresh');
            }else{    

                if($this->session->userdata('USER_ROL') == '1'){
            $this->load->view('sis_header_private.php'); // Header File
            }else{
                $this->load->view('sis_header_private2.php');
            }

                $this->load->view("User/balance_view", $data);

                $this->load->view('sis_footer_private.php'); // Footer File
            }
    }

    /**

     * Ingesa Nuevos Talonarios

     */

    public function ingresaIngreso(){

        $data = array('cuentaIn' => trim($this->input->post('cuentaIn')),

                      'montoIn' => trim($this->input->post('montoIn'))
                      );

        //var_dump($data);
        $ingresa = $this->BalanceModel->guardarIngreso($data);
        if($ingresa != false){

            $jsondata = array ('msg'=>'Registro exitoso');
          
          }else{
          
            $jsondata = array ('msg'=>'Error de registro');
          }
          header('Content-type: application/json; charset=utf-8');
          echo json_encode($jsondata);
    }
    /**

     * Ingesa Nuevos Talonarios

     */

    public function ingresaEgreso(){

        $data = array('cuentaEg' => trim($this->input->post('cuentaEg')),

                      'montoEg' => trim($this->input->post('montoEg'))
                      );

        //var_dump($data);
        $ingresa = $this->BalanceModel->guardarEgreso($data);
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

    public function buscar_total(){

        $data = array('month' => trim($this->input->post('month')),
                      'year' => trim($this->input->post('year'))
                      );

        $resultado = array( // Guardo todos los resultados en un array
            $this->BalanceModel->buscar_total($data),
            $this->BalanceModel->sumaEgresos2($data),
            $this->BalanceModel->sumaIngresos2($data),
            $this->BalanceModel->ver_todo_mes($data)
        );

        //echo json_encode($resultado);
            $data['meses'] = $this->ComboBoxes->meses();
            $data['total_movil'] = $this->BalanceModel->buscar_total($data);
            $data['egresos'] = $this->BalanceModel->sumaEgresos2($data);
            $data['ingresos'] = $this->BalanceModel->sumaIngresos2($data);
            $data['ver'] = $this->BalanceModel->ver_todo_mes($data);

            if (!$this->session->userdata('USER_NAME')) {
              redirect('Usuarios/logout', 'refresh');
            }else{    

                if($this->session->userdata('USER_ROL') == '1'){
            $this->load->view('sis_header_private.php'); // Header File
            }else{
                $this->load->view('sis_header_private2.php');
            }

                $this->load->view("User/balance_view_data", $data);

                $this->load->view('sis_footer_private.php'); // Footer File
            }

    }
    public function view_list(){
        $data = array('month' => trim($this->input->post('month')),
                      'year' => trim($this->input->post('year'))
                      );

        $resultado = array( // Guardo todos los resultados en un array
            $this->BalanceModel->buscar_total($data),
            $this->BalanceModel->sumaEgresos2($data),
            $this->BalanceModel->sumaIngresos2($data),
            $this->BalanceModel->ver_todo_mes($data)
        );

        //echo json_encode($resultado);
            $data['meses'] = $this->ComboBoxes->meses();
            $data['total_movil'] = $this->BalanceModel->buscar_total($data);
            $data['egresos'] = $this->BalanceModel->sumaEgresos2($data);
            $data['ingresos'] = $this->BalanceModel->sumaIngresos2($data);
            $data['ver'] = $this->BalanceModel->ver_todo_mes($data);
        $this->load->view('User/list',$data);
    }

}     