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
								Radio Taxi El Molino S.A., nace en el año 1996 por un grupo de empresarios de la Comuna de Lo Barnechea.
								En el año 2000, esta agrupacion decide formalizar legalmente esta sociedad, permitiendonos integrarnos a la "Asociacion Gremial de Radio Taxis Particulares de Chile", que hasta la fecha prestamos servicios de transporte particular a importantes familias y empresas de la Region.
								Radio Taxi El Molino S.A. esta compuesta por 5 socios, y una flota de mas de 30 vehiculos compuesta por Autos Ejecutivos, MiniVan y Van, los cuales estan dispuestos a brindarles un servicio eficiente, seguro y de calidad.  
							</p>
							<!-- <a href="#" class="primary-btn text-uppercase">Rent Car Now</a> -->
						</div>
						<div id="obj1" class="col-lg-5  col-md-6 header-right" style="display:none"> <!-- Form Chico -->
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
							        <div>
							        	<br><a onclick="ocultar()" href="#">[X] Cerrar</a>
							        </div>
							    </div>
							<?= form_close() ?>    
							<!-- </form> -->
						</div><!-- fin form chico -->											
					</div>
				</div>					
			</section>
			<!-- End banner Area -->	

			<!-- Start feature Area -->
			<section class="feature-area section-gap" id="service">
				<div class="container">
					<div class="row d-flex justify-content-center">
						<div class="col-md-8 pb-40 header-text">
							<h1>Nuestros Servicios</h1>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-4 col-md-6">
							<div class="single-feature">
								<h4><span class="lnr lnr-user"></span>Servicios a centros de Ski</h4>
								<p align="justify">
									Santiago es una de las pocas ciudades del mundo que tiene a menos de una hora una serie de centro de SKI, durante toda la temporada ofrecemos servicios de transporte para que disfrutes de todas estas actividades 
								</p>
							</div>
						</div>
						<div class="col-lg-4 col-md-6">
							<div class="single-feature">
								<h4><span class="lnr lnr-license"></span>Viajes al aeropuerto y terminales de buses</h4>
								<p align="justify">
									¿Necesitas viajar y no tienes como llegar al aeropuerto o terminal? Radio Taxis El Molino ofrece servicios de trasnporte hacia y desde el aeropuerto y los principales terminales de buses de la region Metropolitana  
								</p>								
							</div>
						</div>
						<div class="col-lg-4 col-md-6">
							<div class="single-feature">
								<h4><span class="lnr lnr-phone"></span>Servicios de Van y Mini Van</h4>
								<p>
									¿Necesitas viajar en grupo? En radio Taxi el molino, ofrecemos servicios de MiniVan para una capacidad maxima de 7 personas. ¿Y si somos mas de 7? no te preocupes tambien disponemos de van para transportar hasta 15 personas
								</p>								
							</div>
						</div>
						<div class="col-lg-4 col-md-6">
							<div class="single-feature">
								<h4><span class="lnr lnr-rocket"></span>Covenios con empresas</h4>
								<p>
									Radio Taxi el Molino ofrece convenios para empresas e instituciones con facturacion quincenal o mensual
								</p>				
							</div>
						</div>
						<div class="col-lg-4 col-md-6">
							<div class="single-feature">
								<h4><span class="lnr lnr-diamond"></span>Viajes fuera de santiago</h4>
								<p>
									Radio taxi el molino ofrece servicios de transporte dentro y fuera de santiago, ya sea es sus autos ejecutivos como tambien en sus servicios de van
								</p>								
							</div>
						</div>
						<div class="col-lg-4 col-md-6">
							<div class="single-feature">
								<h4><span class="lnr lnr-bubble"></span>Reservas por Whatsapp</h4>
								<p>
									Si necesitas solicitar un Radio Taxi y no te queda saldo en tu telefonos, puedes solicitar tu servicio via Whatsapp a nuestros numeros  .
								</p>									
							</div>
						</div>						
					</div>
				</div>	
			</section>
			<!-- End feature Area -->
<!-- Inicio Area de imagenes -->
	<section class="reviews-area section-gap" id="review">
					<div class="container">
						<div class="row d-flex justify-content-center">
							<div class="col-md-8 pb-40 header-text text-center">
								<h1>Nuestros Vehiculos</h1>
							</div>
						</div>					
						<div class="row">
							<div class="col-lg-4 col-md-6">
							  <div class="single-review">
									<img style="width:100%;" src="assets/img/auto.jpg" alt="">
									<h1 class="text-center">Taxi Ejecutivo</h1>
								<div class="mb-10 text-justify">
									<br>
									Todos nuestros autos cuentan con:
									<br>
									<li>Capacidad de 4 pasajeros</li>
									<li>Aire acondicionado</li>
									<li>Frenos ABS</li>
									<li>Permisos correspondientes al dia</li>
								</div>
							  </div>
							</div>
							<div class="col-lg-4 col-md-6">
								<div class="single-review">
									<img style="width:100%;" src="assets/img/Mini.jpg" alt="">
									<h1 class="text-center">Mini Van</h1>
								<div class="mb-10 text-justify">
									<br>
									Todos nuestros autos cuentan con:
									<br>
									<li>Capacidad de 4 pasajeros</li>
									<li>Aire acondicionado</li>
									<li>Frenos ABS</li>
									<li>Permisos correspondientes al dia</li>
								</div>
								</div>
							</div>
							<div class="col-lg-4 col-md-6">
								<div class="single-review">
									<img style="width:100%;" src="assets/img/Van.jpg" alt="">
									<h1 class="text-center">Van</h1>
								 <div class="mb-10 text-justify">
									<br>
									Todos nuestros autos cuentan con:
									<br>
									<li>Capacidad de 4 pasajeros</li>
									<li>Aire acondicionado</li>
									<li>Frenos ABS</li>
									<li>Permisos correspondientes al dia</li>
								</div>
								</div>
							</div>
						</div>
					</div>
	</section>							
<!-- Fin Area de imagenes -->
		<!-- Start model Area -->
			<section class="model-area section-gap" id="cars">
				<div class="container">
					<div class="row d-flex justify-content-center pb-40">
						<div class="col-md-8 pb-40 header-text">
							<h1 class="text-center pb-10">Nuestros Clientes</h1>
							<p class="text-center">
								Who are in extremely love with eco friendly system.
							</p>
						</div>
					<!--Carousel Wrapper-->
					<div id="multi-item-example" class="carousel slide carousel-multi-item carousel-multi-item-2" data-ride="carousel">

					  <!--Slides-->
					  <div class="carousel-inner" role="listbox">

					    <!--First slide-->
					    <div class="carousel-item active">

					      <div class="col-md-3 mb-3">
					        <div class="card">
					          <img class="img-fluid" src="assets\img\Empresas\ferrari.png"
					            alt="Card image cap">
					        </div>
					      </div>

					      <div class="col-md-3 mb-3">
					        <div class="card">
					          <img class="img-fluid" src="assets\img\Empresas\LiderExpress.png"
					            alt="Card image cap">
					        </div>
					      </div>

					      <div class="col-md-3 mb-3">
					        <div class="card">
					          <img class="img-fluid" src="assets\img\Empresas\Radisson-blu.jpg"
					            alt="Card image cap">
					        </div>
					      </div>

					      <div class="col-md-3 mb-3">
					        <div class="card">
					          <img class="img-fluid" src="assets\img\Empresas\volks.jpg"
					            alt="Card image cap">
					        </div>
					      </div>

					    </div>
					    <!--/.First slide-->

					    <!--Second slide-->
					    <div class="carousel-item">

					      <div class="col-md-3 mb-3">
					        <div class="card">
					          <img class="img-fluid" src="assets\img\Empresas\infiniti.jpg"
					            alt="Card image cap">
					        </div>
					      </div>

					      <div class="col-md-3 mb-3">
					        <div class="card">
					          <img class="img-fluid" src="assets\img\Empresas\Espacio.jpg"
					            alt="Card image cap">
					        </div>
					      </div>

					      <div class="col-md-3 mb-3">
					        <div class="card">
					          <img class="img-fluid" src="assets\img\Empresas\Craighhouse.png"
					            alt="Card image cap">
					        </div>
					      </div>

					      <div class="col-md-3 mb-3">
					        <div class="card">
					          <img class="img-fluid" src="assets\img\Empresas\Zentrum.png"
					            alt="Card image cap">
					        </div>
					      </div>

					    </div>
					    <!--/.Second slide-->

					  </div>
					  <!--/.Slides-->

					</div>
					<!--/.Carousel Wrapper-->
									</div>	
								</section>
			<!-- End model Area -->		

			<!-- Start reviews Area -->
			<!--<section class="reviews-area section-gap" id="review">
				<div class="container">
					<div class="row d-flex justify-content-center">
						<div class="col-md-8 pb-40 header-text text-center">
							<h1>Some Features that Made us Unique</h1>
							<p class="mb-10 text-center">
								Who are in extremely love with eco friendly system.
							</p>
						</div>
					</div>					
					<div class="row">
						<div class="col-lg-4 col-md-6">
							<div class="single-review">
								<h4>Cody Hines</h4>
								<p>
									Accessories Here you can find the best computer accessory for your laptop, monitor, printer, scanner, speaker.
								</p>
								<div class="star">
									<span class="fa fa-star checked"></span>
									<span class="fa fa-star checked"></span>
									<span class="fa fa-star checked"></span>
									<span class="fa fa-star"></span>
									<span class="fa fa-star"></span>
								</div>
							</div>
						</div>
						<div class="col-lg-4 col-md-6">
							<div class="single-review">
								<h4>Chad Herrera</h4>
								<p>
									Accessories Here you can find the best computer accessory for your laptop, monitor, printer, scanner, speaker.
								</p>
								<div class="star">
									<span class="fa fa-star checked"></span>
									<span class="fa fa-star checked"></span>
									<span class="fa fa-star checked"></span>
									<span class="fa fa-star"></span>
									<span class="fa fa-star"></span>
								</div>
							</div>
						</div>
						<div class="col-lg-4 col-md-6">
							<div class="single-review">
								<h4>Andre Gonzalez</h4>
								<p>
									Accessories Here you can find the best computer accessory for your laptop, monitor, printer, scanner, speaker.
								</p>
								<div class="star">
									<span class="fa fa-star checked"></span>
									<span class="fa fa-star checked"></span>
									<span class="fa fa-star checked"></span>
									<span class="fa fa-star"></span>
									<span class="fa fa-star"></span>
								</div>
							</div>
						</div>							
						<div class="col-lg-4 col-md-6">
							<div class="single-review">
								<h4>Jon Banks</h4>
								<p>
									Accessories Here you can find the best computer accessory for your laptop, monitor, printer, scanner, speaker.
								</p>
								<div class="star">
									<span class="fa fa-star checked"></span>
									<span class="fa fa-star checked"></span>
									<span class="fa fa-star checked"></span>
									<span class="fa fa-star"></span>
									<span class="fa fa-star"></span>
								</div>
							</div>
						</div>
						<div class="col-lg-4 col-md-6">
							<div class="single-review">
								<h4>Landon Houston</h4>
								<p>
									Accessories Here you can find the best computer accessory for your laptop, monitor, printer, scanner, speaker.
								</p>
								<div class="star">
									<span class="fa fa-star checked"></span>
									<span class="fa fa-star checked"></span>
									<span class="fa fa-star checked"></span>
									<span class="fa fa-star"></span>
									<span class="fa fa-star"></span>
								</div>
							</div>
						</div>
						<div class="col-lg-4 col-md-6">
							<div class="single-review">
								<h4>Nelle Wade</h4>
								<p>
									Accessories Here you can find the best computer accessory for your laptop, monitor, printer, scanner, speaker.
								</p>
								<div class="star">
									<span class="fa fa-star checked"></span>
									<span class="fa fa-star checked"></span>
									<span class="fa fa-star checked"></span>
									<span class="fa fa-star"></span>
									<span class="fa fa-star"></span>
								</div>
							</div>
						</div>												
					</div>
				</div>	
			</section>-->
			<!-- End reviews Area -->
			

			<!-- Start callaction Area -->
			<section class="callaction-area relative section-gap">
				<div class="overlay overlay-bg"></div>
				<div class="container">
					<div class="row justify-content-center">
						<div class="col-lg-10">
							<h1 class="text-white">Experience Great Support</h1>
							<p>
								Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore  et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.
							</p>
							<a class="callaction-btn text-uppercase" href="#">Reach Our Support Team</a>	
						</div>
					</div>
				</div>	
			</section>
			<!-- End callaction Area -->

			<!-- Start blog Area -->
			<section class="blog-area section-gap" id="blog">
				<div class="container">
					<div class="row d-flex justify-content-center">
						<div class="menu-content pb-70 col-lg-8">
							<div class="title text-center">
								<h1 class="mb-10">Latest From Our Blog</h1>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore  et dolore magna aliqua.</p>
							</div>
						</div>
					</div>					
					<div class="row">
						<div class="col-lg-3 col-md-6 single-blog">
							<div class="thumb">
								<img class="img-fluid" src="img/b1.jpg" alt="">								
							</div>
							<p class="date">10 Jan 2018</p>
							<a href="blog-single.html"><h4>Addiction When Gambling
							Becomes A Problem</h4></a>
							<p>
								inappropriate behavior ipsum dolor sit amet, consectetur.
							</p>
							<div class="meta-bottom d-flex justify-content-between">
								<p><span class="lnr lnr-heart"></span> 15 Likes</p>
								<p><span class="lnr lnr-bubble"></span> 02 Comments</p>
							</div>									
						</div>
						<div class="col-lg-3 col-md-6 single-blog">
							<div class="thumb">
								<img class="img-fluid" src="img/b2.jpg" alt="">								
							</div>
							<p class="date">10 Jan 2018</p>
							<a href="blog-single.html"><h4>Addiction When Gambling
							Becomes A Problem</h4></a>
							<p>
								inappropriate behavior ipsum dolor sit amet, consectetur.
							</p>
							<div class="meta-bottom d-flex justify-content-between">
								<p><span class="lnr lnr-heart"></span> 15 Likes</p>
								<p><span class="lnr lnr-bubble"></span> 02 Comments</p>
							</div>									
						</div>
						<div class="col-lg-3 col-md-6 single-blog">
							<div class="thumb">
								<img class="img-fluid" src="img/b3.jpg" alt="">								
							</div>
							<p class="date">10 Jan 2018</p>
							<a href="blog-single.html"><h4>Addiction When Gambling
							Becomes A Problem</h4></a>
							<p>
								inappropriate behavior ipsum dolor sit amet, consectetur.
							</p>
							<div class="meta-bottom d-flex justify-content-between">
								<p><span class="lnr lnr-heart"></span> 15 Likes</p>
								<p><span class="lnr lnr-bubble"></span> 02 Comments</p>
							</div>									
						</div>
						<div class="col-lg-3 col-md-6 single-blog">
							<div class="thumb">
								<img class="img-fluid" src="img/b4.jpg" alt="">								
							</div>
							<p class="date">10 Jan 2018</p>
							<a href="blog-single.html"><h4>Addiction When Gambling
							Becomes A Problem</h4></a>
							<p>
								inappropriate behavior ipsum dolor sit amet, consectetur.
							</p>
							<div class="meta-bottom d-flex justify-content-between">
								<p><span class="lnr lnr-heart"></span> 15 Likes</p>
								<p><span class="lnr lnr-bubble"></span> 02 Comments</p>
							</div>									
						</div>							
					</div>
				</div>	
			</section>
			<!-- End blog Area -->

<?php
	// Final HTML
	$this->load->view('sis_footer');
?>			