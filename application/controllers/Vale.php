<?php defined('BASEPATH') OR exit('No direct script access allowed');



class Vale extends CI_Controller {


    public function __construct() {

        parent::__construct();

        // $this->load->library('form_validation');

        // load Session Library
        //$this->load->library('session');

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

    public function buscarVale(){

        $data = $this->input->post('data');

        var_dump($data);// si era por el vardump qu no funcionaba e mensaje

        $resultado = $this->ValeModel->buscarVale($data);
        if($resultado != FALSE){
          $msg = "Encontré el resultado";
        }else{
          $msg = "No encontré niuna wea";
        }
        $respuesta = array('msg' => $msg);
        echo json_encode($respuesta);
        echo json_encode($resultado);

    }
    /**

     * Pagina de inicio de los vales

     */

    public function vales(){

            $data['talonarios'] = $this->ComboBoxes->getTalonarios();
            $data['meses'] = $this->ComboBoxes->meses();
            $data['meses_bloq'] = $this->ComboBoxes->getMesesBloq();
            $data['meses_hab'] = $this->ComboBoxes->getMesesHab();
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

     * Pagina de inicio de los vales de los clientes

     */

    public function valesCli(){

            $data['talonarios'] = $this->ComboBoxes->getTalonarios();
            $data['meses'] = $this->ComboBoxes->meses();
            $data['meses_bloq'] = $this->ComboBoxes->getMesesBloq();
            $data['meses_hab'] = $this->ComboBoxes->getMesesHab();
            $data['clientes'] = $this->ComboBoxes->getClientes();
            $data['moviles'] = $this->ComboBoxes->getMoviles();
            $data['ultimo_tal'] = $this->ComboBoxes->getLastTal();
            $data['tot_tal'] = $this->ComboBoxes->getTotTal();
            $data['tot_talMov'] = $this->ComboBoxes->getTotTalMov();
            $data['tot_talCli'] = $this->ComboBoxes->getTotTalCli();
            $tot = $this->ComboBoxes->getTotTal();
            $tt = array('tot' => $tot);
            $data['page_title'] = $this->ComboBoxes->getTotTal();
            $data['movilTalonario'] = $this->ComboBoxes->getMovilTalonario();
            $data['clienteTalonario'] = $this->ComboBoxes->getClienteTalonario();

            $this->load->view('sis_header_private.php'); // Header File

            $this->load->view("User/valesCli_view", $data);

            $this->load->view('sis_footer_private.php'); // Footer File

    }
    /**
    * Pagina de busqueda de Vales
    **/
    public function busqueda(){

            $this->load->view('sis_header_private.php'); // Header File

            $this->load->view("User/valesBusca_view");

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
    /**

     * Ingesa Nuevos Vales de Móviles

     */

    public function ingresaVale(){
      $cadena = $this->input->post('movilTalonario');
      $fecha = $this->input->post('fecha');
      $separa = explode("/", $fecha);
      $mes = $separa[1];
      $anio = $separa[2];
      $array = explode(",", $cadena);
      $id_tal = $array[0];
         //print_r($mes);   
          $data = array('movilTalonario' => $id_tal,
                          'vale'      => trim($this->input->post('vale')),
                          'cliente'   => trim($this->input->post('cliente')),
                          'adicional' => trim($this->input->post('adicional')),
                          'tipovale'  => trim($this->input->post('tipovale')),
                          'origen'    => trim($this->input->post('origen')),
                          'destino'   => trim($this->input->post('destino')),
                          'fecha'     => trim($this->input->post('fecha')),
                          'hora'      => trim($this->input->post('hora')),
                          'valor'     => trim($this->input->post('valor')),
                          'obs'       => trim($this->input->post('obs'))
                        );

          //var_dump($data);
          //print_r($data);
        $date = array('mes' => $mes, 'anio' => $anio);
        $res = $this->ValeModel->ingresoValeEstado($date);  // Con esto consulto si puede ingresar o no un vale del mes elegido
        if($res!= FALSE){
          $ingresa = $this->ValeModel->guardarVale($data);
          if($ingresa != false){    
              $msg = 'Registro exitoso';
            }else{
             $msg = "Error de registro";
            }
        }else{
          $msg = 'Error: Periodo NO permitido';
        }
         $response = array('msg' => $msg);
        echo json_encode($response);
    }
    /**

     * Ingesa Nuevos Vales de clientes

     */

    public function ingresaValeCli(){
      //$cadena = $this->input->post('movilTalonario');
      $fecha = $this->input->post('fecha');
      $separa = explode("/", $fecha);
      $mes = $separa[1];
      $anio = $separa[2];
         //print_r($mes);   
          $data = array(  'vale'      => trim($this->input->post('vale')),
                          'cliente'   => trim($this->input->post('cliente')),
                          'adicional' => trim($this->input->post('adicional')),
                          'tipovale'  => trim($this->input->post('tipovale')),
                          'origen'    => trim($this->input->post('origen')),
                          'destino'   => trim($this->input->post('destino')),
                          'fecha'     => trim($this->input->post('fecha')),
                          'hora'      => trim($this->input->post('hora')),
                          'valor'     => trim($this->input->post('valor')),
                          'obs'       => trim($this->input->post('obs')),
                          'tal'       => trim($this->input->post('tal')),
                          'movil'     => trim($this->input->post('movil'))
                        );

          //var_dump($data);
          //print_r($data);
        $date = array('mes' => $mes, 'anio' => $anio);
        $res = $this->ValeModel->ingresoValeEstado($date);  // Con esto consulto si puede ingresar o no un vale del mes elegido
        if($res!= FALSE){
          $ingresa = $this->ValeModel->guardarValeCli($data);
          if($ingresa != false){    
              $msg = 'Registro exitoso';
            }else{
             $msg = "Error: El numero de vale ingresado ya existe!";
            }
        }else{
          $msg = 'Error: Periodo NO permitido';
        }
         $response = array('msg' => $msg);
        echo json_encode($response);
    }
    /**
     * Habilita Mes
    */ 
      public function habilitaMes(){
        $data = $this->input->post();
        $resultado = $this->ValeModel->habilitaMes($data);
          if($resultado != false){    
              echo "Registro exitoso";
          
            }else{
              echo "Error de registro";
            }
      }
    /**
     * Bloquea Mes
    */ 
      public function bloquearMes(){
        $data = $this->input->post();
        $resultado = $this->ValeModel->bloquearMes($data);
          if($resultado != false){    
              echo "Registro exitoso";
          
            }else{
              echo "Error de registro";
            }
      }  
}     