<div class="container">

    <!-- Include Flash Data File -->
    <!-- <?php $this->load->view('flash_alert.php') ?> -->
    
    <div class="jumbotron">
    	<br>
    	<br>
        <h1 class="display-6">Bienvenido <?= $this->session->userdata('USERNAME') ?></h1>
        <p>CodeIgnier 3 login and registration full application.</p>
        <hr class="my-4">
        <p>
        	Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nemo doloribus ducimus, vel a aut quod ipsa, voluptas debitis cum quis quam numquam. Tempora ea, totam, quibusdam velit iste consequuntur aliquid.
        </p>
        <p>
        	Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nemo doloribus ducimus, vel a aut quod ipsa, voluptas debitis cum quis quam numquam. Tempora ea, totam, quibusdam velit iste consequuntur aliquid.
        </p>
        <a class="btn btn-primary btn-lg" href="#" role="button">Source Code</a>
        <a class="btn btn-danger btn-lg" href="#" role="button">Video Tutorials</a>
        <a href="<?= base_url('Usuarios/logout') ?>" class="btn btn-danger btn-lg">Logout</a>
    </div>
</div>