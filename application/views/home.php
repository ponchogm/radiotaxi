<?php

	// Inicio HTML

	$this->load->view('sis_header');

?>
<!-- start banner Area -->

			<section class="banner-area relative" id="home">

				<div class="overlay overlay-bg"></div>	

				<div class="container">

					<div class="row fullscreen d-flex align-items-center justify-content-center">

						<div class="banner-content col-lg-7 col-md-6 ">

							<h6 class="text-white ">Radio Taxi El Molino</h6>

							<h1 class="text-white text-uppercase">

								Servicio de Excelencia				

							</h1>

							<p class="pt-20 pb-20 text-white">

								Mas de 20 años de experiencia transportando a nuestros clientes.

							</p>

							<!-- <a href="#" class="primary-btn text-uppercase">Rent Car Now</a> -->

						</div>

						<div id="obj1" class="col-lg-5  col-md-6 header-right"> <!-- Form Chico -->

							<h4 class="text-white pb-30">Ingrese sus datos</h4>

							<!-- <form class="form" role="form" autocomplete="off"> -->

								<!-- Include Flash Data File -->

    							<?php $this->load->view('flash_alert.php') ?>

    							

							<?= form_open('usuarios/login') ?>						    

							    <div class="from-group">

							    	<input class="form-control txt-field <?= (form_error('user') == "" ? '':'is-invalid') ?>" type="text" name="user" id="user" value="<?= set_value('user'); ?>" placeholder="Nombre de Usuario">

							    	<?= form_error('user'); ?>  

							    	<input class="form-control txt-field <?= (form_error('pass') == "" ? '':'is-invalid') ?>" type="password" name="pass" id="pass" value="<?= set_value('pass'); ?>" placeholder="Contraseña">

							    	<?= form_error('pass'); ?>  

							    </div>

							    <div class="form-group row">

							        <div class="col-md-12">

							            <button type="submit" class="btn btn-default btn-lg btn-block text-center text-uppercase">Ingresar</button>

							        </div>

							    </div>

							<?= form_close() ?>    

							<!-- </form> -->

						</div><!-- fin form chico -->											

					</div>

				</div>					

			</section>

			<!-- End banner Area -->	

<?php

	// Final HTML

	$this->load->view('sis_footer');

?>