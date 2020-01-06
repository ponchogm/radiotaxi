<div class="container">

    <!-- Include Flash Data File -->
    <!-- <?php $this->load->view('flash_alert.php') ?> -->
    
    <div class="jumbotron">
    	<br>
    	<br>
        <h1 class="display-6">Bienvenido: <?= $this->session->userdata('USERNAME')." ".$this->session->userdata('USER_AP') ?></h1>
        <p>Sistema de Administración de Radio Taxi el Molino</p>
        <hr class="my-4">
        <p>
        	Este sistema está diseñado para poder administrar los moviles, conductores, vales, talonarios y clientes.
        </p>
        <p>
        	Si usted es un conductor podrá ingresar todos sus vales, y si tiene alguna o consulta puede consultar con el administrador.
        </p>
    </div>
</div>