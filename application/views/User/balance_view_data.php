<div class="container">
        <div class="table-wrapper">
            <div class="table-title">
               <div class="row">
                    <div class="col-sm-4">
                        <h2>Balance <b>Mensual</b></h2>
                        <?php
                        $rol = $this->session->userdata('USER_ROL');
                        $nombre = $this->session->userdata('USERNAME');
                        $apellido = $this->session->userdata('USER_AP');

                        echo 'Usuario: '.$nombre." ".$apellido;
                        ?>
                    </div>
                    <div class="col-sm-6">
                        <a href="<?= base_url('Balance');?>" class="btn btn-primary"><i class="material-icons">&#xE147;</i> <span>Volver</span></a>           
                    </div>
                    <!-- <div class="col-sm-2">
                        <form><span><input type="text" style="color: #a0a0a0;" class="form-control" name="buscar" id="buscar" placeholder="Buscar datos"></span></form>                       
                    </div> -->
                </div>
            </div>
            <div class="row">
                <div id="pinta" class="col-sm-12">
                    <p>
                        <?php foreach($total_movil as $row){ ?>
                                    <?php 
                                        $totalmes = $row->TotalMovil; 
                                        echo "Valor total móviles $<strong>".number_format($totalmes, 0, ',', '.')."</strong>";
                                    ?>
                        <?php } ?>
                    <table class="table table-striped table-hover" id="valor_tb">
                     <thead>   
                      <tr>  
                        <th>Fecha</th>
                        <th>Cuenta</th>
                        <th>Ingresos</th>
                        <th>Egresos</th>
                        <!-- <th>Acciones</th> -->
                      </tr>
                     </thead>
                     <tbody>
                     <?php foreach($ver as $row){ ?>
                        <?php
                            $ingreso = $row->ingreso;
                            $egreso = $row->egreso;

                            if($ingreso != ''){
                                $ingreso = $ingreso;
                                }else{
                                    $ingreso = 0;
                                }
                            if($egreso != ''){
                                $egreso = $egreso;
                                }else{
                                    $egreso = 0;
                                }
                        ?>
                        <tr>
                            <td><?= $row->fecha; ?></td>
                            <td><?= $row->cuenta; ?></td>
                            <td>$<?= number_format($ingreso, 0, ',', '.'); ?></td>
                            <td>$<?= number_format($egreso, 0, ',', '.'); ?></td>
                        </tr>
                        <?php } ?>
                        <tr>
                            <td></td>
                            <td><strong>Totales</strong></td>
                            <?php foreach($ingresos as $row){ ?>
                            <?php
                                $totin = $row->TotalIngresos;
                            ?>
                            <td class="success"><strong>$<?= number_format($totin, 0, ',', '.'); ?></strong></td>
                            <?php } ?>
                            <?php foreach($egresos as $row){ ?>
                            <?php
                                $toteg = $row->TotalEgresos;
                            ?>
                            <td class="danger"><strong>$<?= number_format($toteg, 0, ',', '.'); ?></strong></td>
                            <?php } ?>
                        </tr>
                        <tr>
                            <td></td>
                            <td><strong>Saldo</strong></td>
                            <?php
                                $saldo = ($totin + $totalmes) - $toteg;
                            ?>
                            <td class="warning"><strong>$<?= number_format($saldo, 0, ',', '.'); ?></strong></td>
                            <td></td>
                        </tr>
                     </tbody>   
                    </table>
                    <button class='btn btn-success'>Exportar a Excel</button>
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
    var totIng;
    var totEg;
    var totMes;
    var saldo;
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
            $("#buscar_btn").click(function(e){
                e.preventDefault();
                        var datax = $('#buscar_form').serializeArray();
                        $("#valor_tb tbody").html('');
                        $("#fecha").html('');
                        $.each(datax, function(i, field){
                            console.log("contenido del form = "+ field.name + ":" + field.value + " ");
                        });
                           $.ajax({
                                   data: datax,    // En data se puede utilizar un objeto JSON, un array o un query string
                                   type: "POST",   //Cambiar a type: POST si necesario
                                   dataType: "json",  // Formato de datos que se espera en la respuesta
                                   url: "<?=base_url();?>Balance/buscar_total",  // URL a la que se enviará la solicitud Ajax
                            })
                           .done(function( data, textStatus, jqXHR ) {
                                if ( console && console.log ) {
                                    console.log(" data msg : "+ data.msg 
                                    + " \n textStatus : " + textStatus
                                    + " \n jqXHR.status : " + jqXHR.status );
                                }
                                        var res = JSON.parse(data);
                                        console.log(res);
                                        //Aca formateo la respuesta
                                        var output = '';
                                        $.each(data, function(i,item){
                                            totMes = item.TotalMovil; 
                                            output +=
                                             'El valor total de la Fecha requerida es de: '+

                                             '<p>$ '+new Intl.NumberFormat("de-DE").format(item.TotalMovil)+'</p>';
                                        });
                                        $("#fecha").append(output);
                                })
                            .fail(function( jqXHR, textStatus, errorThrown ) {
                                    if ( console && console.log ) {
                                        console.log( " La solicitud ha fallado,  textStatus : " +  textStatus 
                                            + " \n errorThrown : "+ errorThrown
                                            + " \n textStatus : " + textStatus
                                            + " \n jqXHR.status : " + jqXHR.status );
                                    }
                            });
            });
    });
    </script>
