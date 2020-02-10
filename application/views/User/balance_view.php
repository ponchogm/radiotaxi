<div class="container">
        <div class="table-wrapper">
            <div class="table-title">
               <div class="row">
                    <div class="col-sm-4">
                        <h2>Gestión <b>Ingresos / Egresos</b></h2>
                        <?php
                        $rol = $this->session->userdata('USER_ROL');
                        $nombre = $this->session->userdata('USERNAME');
                        $apellido = $this->session->userdata('USER_AP');

                        echo 'Usuario: '.$nombre." ".$apellido;
                        ?>
                    </div>
                    <div class="col-sm-6">
                        <a href="#talonMovil" data-toggle="modal" class="btn btn-warning"><i class="material-icons">&#xE147;</i> <span>Periodos</span></a>
                        <a href="#egresos" data-toggle="modal"class="btn btn-danger"><i class="material-icons">&#xE147;</i> <span>Egresos</span></a>
                        <a href="#ingresos" data-toggle="modal" class="btn btn-primary"><i class="material-icons">&#xE147;</i> <span>Ingresos</span></a>           
                    </div>
                    <!-- <div class="col-sm-2">
                        <form><span><input type="text" style="color: #a0a0a0;" class="form-control" name="buscar" id="buscar" placeholder="Buscar datos"></span></form>                       
                    </div> -->
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div id="fecha" class="col-sm-5">
                        <?php
                        //$dias = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
                        $meses1 = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
     
                        //echo $dias[date('w')]." ".date('d')." de ".$meses[date('n')-1]. " del ".date('Y') ;
                        //Salida: Viernes 24 de Febrero del 2012
                        ?>
                        Mes: <?php echo $meses1[date('n')-1]; ?>
                        <p>
                        Año: <?php echo date('Y'); ?>
                        <p>
                        <?php foreach($total_movil as $row){ ?>
                                    <?php 
                                        $totalmes = $row->TotalMovil; 
                                        echo "Valor total móviles mes actual $<strong>".number_format($totalmes, 0, ',', '.')."</strong>";
                                    ?>
                        <?php } ?>
                    </div>
                    <div id="select" class="col-sm-7">
                        <form class="form-inline" name="buscar_form" id="buscar_form" method="POST" action="<?=base_url();?>Balance/buscar_total"> 
                          <div class="form-group">
                            <label for="email">Seleccionar Periódo - Mes:&nbsp;</label>
                            <select id="month" name="month" class="form-control">
                                <?php foreach ($meses as $i) {
                                        echo '<option value="'. $i->MesesCodigo .'">'. $i->MesesNombre .'</option>';
                                } ?>
                            </select>
                          </div>
                          <div class="form-group">
                            <label for="pwd">&nbsp;Año:&nbsp;</label>
                            <select id="year" name="year" class="form-control">
                                <option value="2020">2020</option>
                                <option value="2019">2019</option>
                                <option value="2018">2018</option>
                            </select>
                          </div>
                          &nbsp;&nbsp;&nbsp;&nbsp;
                          <button type="submit" class="btn btn-default" id="buscar_btn">Seleccionar</button>

                        </form> 
                    </div>
           <!-- aca va la tabla -->
                </div>
                
        </div>
</div>
<!-- Modal de Ingresos -->
    <div id="ingresos" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form name="ingresos_form" id="ingresos_form">
                    <div class="modal-header">                      
                        <h4 class="modal-title">Nuevo Ingreso</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">                                       
                        <div class="form-group">
                            <!-- <input type="hidden" name="cod" id="cod" required> -->
                        </div>
                        <div class="form-group">
                            <label>Detalle</label>
                            <input type="text" class="form-control" name="cuentaIn" id="cuentaIn" required>
                        </div>
                        <div class="form-group">
                            <label>Monto</label>
                            <input type="text" class="form-control" name="montoIn" id="montoIn" placeholder ="$" required>
                        </div>            
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
                        <input type="submit" class="btn btn-success" id="guardarIngreso_btn" value="Salvar Ingreso">
                    </div>
                </form>
            </div>
        </div>
    </div>
<!-- Fin Modal de Ingresos -->
<!-- Modal de Engresos -->
    <div id="egresos" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form name="egresos_form" id="egresos_form">
                    <div class="modal-header">                      
                        <h4 class="modal-title">Nuevo Egreso</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">                                       
                        <div class="form-group">
                            <!-- <input type="hidden" name="cod" id="cod" required> -->
                        </div>
                        <div class="form-group">
                            <label>Detalle</label>
                            <input type="text" class="form-control" name="cuentaEg" id="cuentaEg" required>
                        </div>
                        <div class="form-group">
                            <label>Monto</label>
                            <input type="text" class="form-control" name="montoEg" id="montoEg" placeholder ="$" required>
                        </div>            
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
                        <input type="submit" class="btn btn-success" id="guardarEgreso_btn" value="Salvar Egreso">
                    </div>
                </form>
            </div>
        </div>
    </div>
<!-- Fin Modal de Engresos -->

    <script>
        function selTalonario(cod,ini,fin,est){
            $('#cod').val(cod);
            $('#id').val(cod);
            $('#ini').val(ini);
            $('#fin').val(fin);
            $('#est').val(est);
            console.log(cod);
        }
        function selTalonarioNull(cod){
            $('#idt').val(cod);
            //console.log(id);
        }
    $(document).ready(function(){
            //  guardar nuevo ingreso
            $("#guardarIngreso_btn").click(function(e){
                //alert("Hola");
                e.preventDefault();
                        var datax = $('#ingresos_form').serializeArray();
                        $.each(datax, function(i, field){
                            console.log("contenido del form = "+ field.name + ":" + field.value + " ");
                        });
                        //console.log($('#rut').val());
                           $.ajax({
                                   data: datax,    // En data se puede utilizar un objeto JSON, un array o un query string
                                   type: "POST",   //Cambiar a type: POST si necesario
                                   dataType: "json",  // Formato de datos que se espera en la respuesta
                                   url: "<?=base_url();?>Balance/ingresaIngreso",  // URL a la que se enviará la solicitud Ajax
                            })
                           .done(function( data, textStatus, jqXHR ) {
                                if ( console && console.log ) {
                                    console.log(" data msg : "+ data.msg 
                                    + " \n textStatus : " + textStatus
                                    + " \n jqXHR.status : " + jqXHR.status );
                                }
                                })
                            .fail(function( jqXHR, textStatus, errorThrown ) {
                                    if ( console && console.log ) {
                                        console.log( " La solicitud ha fallado,  textStatus : " +  textStatus 
                                            + " \n errorThrown : "+ errorThrown
                                            + " \n textStatus : " + textStatus
                                            + " \n jqXHR.status : " + jqXHR.status );
                                    }
                            });                        
                            $('#ingresos').hide();
                            location.reload();
                        });
            $("#guardarEgreso_btn").click(function(e){
                //alert("Hola");
                e.preventDefault();
                        var datax = $('#egresos_form').serializeArray();
                        $.each(datax, function(i, field){
                            console.log("contenido del form = "+ field.name + ":" + field.value + " ");
                        });
                        //console.log($('#rut').val());
                           $.ajax({
                                   data: datax,    // En data se puede utilizar un objeto JSON, un array o un query string
                                   type: "POST",   //Cambiar a type: POST si necesario
                                   dataType: "json",  // Formato de datos que se espera en la respuesta
                                   url: "<?=base_url();?>Balance/ingresaEgreso",  // URL a la que se enviará la solicitud Ajax
                            })
                           .done(function( data, textStatus, jqXHR ) {
                                if ( console && console.log ) {
                                    console.log(" data msg : "+ data.msg 
                                    + " \n textStatus : " + textStatus
                                    + " \n jqXHR.status : " + jqXHR.status );
                                }
                                })
                            .fail(function( jqXHR, textStatus, errorThrown ) {
                                    if ( console && console.log ) {
                                        console.log( " La solicitud ha fallado,  textStatus : " +  textStatus 
                                            + " \n errorThrown : "+ errorThrown
                                            + " \n textStatus : " + textStatus
                                            + " \n jqXHR.status : " + jqXHR.status );
                                    }
                            });                        
                            $('#egresos').hide();
                            location.reload();
                        });
            //Búsqueda

    });
    </script>