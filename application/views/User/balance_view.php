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
                    <?php
                    //$dias = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
                    $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
 
                    //echo $dias[date('w')]." ".date('d')." de ".$meses[date('n')-1]. " del ".date('Y') ;
                    //Salida: Viernes 24 de Febrero del 2012
                    ?>
                    Mes: <?php echo $meses[date('n')-1]; ?>
                    <p>
                    Año: <?php echo date('Y'); ?>
                    <table class="table table-striped table-hover">
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
                     <?php foreach($ver_reg->result() as $row){ ?>
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
                            <?php foreach($total_in as $row){ ?>
                            <?php
                                $totin = $row->TotalIngresos;
                            ?>
                            <td class="success"><strong>$<?= number_format($totin, 0, ',', '.'); ?></strong></td>
                            <?php } ?>
                            <?php foreach($total_eg as $row){ ?>
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
                                $saldo = $totin - $toteg;
                            ?>
                            <td class="warning"><strong>$<?= number_format($saldo, 0, ',', '.'); ?></strong></td>
                            <td></td>
                        </tr>
                     </tbody>   
                    </table>
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
<!-- Modal de Talonario  Móvil -->
    <div id="talonMovil" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form name="talonMovil_form" id="talonMovil_form">
                    <div class="modal-header">                      
                        <h4 class="modal-title">Talonario Móvil</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">                    
                        <div class="form-group">
                            <label>Móviles</label>
                                <select id="moviles" name="moviles" class="form-control">
                                <?php foreach ($moviles as $i) {
                                    $numero = $i->MovilNumero;
                                    echo '<option value="'. $i->MovilCodigo .'">'. $numero .'</option>';
                                } ?>
                            </select>
                        </div>                    
                         <div class="form-group">
                          <label for="sel1">Talonarios Disponibles</label>
                            <select id="talonarios" name="talonarios" class="form-control">
                                <?php foreach ($talonarios as $i) {
                                    $talonario = $i->TalonarioInicio .' - '. $i->TalonarioTermino;
                                    echo '<option value="'. $i->TalonarioCodigo .','.$talonario.'">'. $talonario .'</option>';
                                } ?>
                            </select>
                        </div>                 
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                        <input type="submit" class="btn btn-success" id="asignarMov_btn" value="Asignar">
                    </div>
                </form>
            </div>
        </div>
    </div>
<!-- Fin Modal de Talonario  Móvil -->
<!-- Modal de Talonario  Cliente -->
    <div id="talonCliente" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form name="talonCliente_form" id="talonCliente_form">
                    <div class="modal-header">                      
                        <h4 class="modal-title">Talonario Cliente</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">                    
                        <div class="form-group">
                            <label>Clientes</label>
                                <select id="clientes" name="clientes" class="form-control">
                                <?php foreach ($clientes as $i) {
                                    $nombre = $i->ClienteRut.' - '. $i->ClienteNombres .'  '. $i->ClienteApellidoPat.'  '.$i->ClienteApellidoMat;
                                    echo '<option value="'. $i->ClienteRut .'">'. $nombre .'</option>';
                                } ?>
                            </select>
                        </div>                    
                         <div class="form-group">
                          <label for="sel1">Talonarios Disponibles</label>
                            <select id="talonarios" name="talonarios" class="form-control">
                                <?php foreach ($talonarios as $i) {
                                    $talonario = $i->TalonarioInicio .' - '. $i->TalonarioTermino;
                                    echo '<option value="'. $i->TalonarioCodigo .','.$talonario.'">'. $talonario .'</option>';
                                } ?>
                            </select>
                        </div>                 
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                        <input type="submit" class="btn btn-success" id="asignarCli_btn" value="Asignar">
                    </div>
                </form>
            </div>
        </div>
    </div>
<!-- Fin Modal de Talonario  Cliente -->
<!-- Modal de Talonario  Nuevo -->
    <div id="talonNuevo" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form name="nuevo_form" id="nuevo_form">
                    <div class="modal-header">                      
                        <h4 class="modal-title">Nuevo Talonario</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">                    
                        <div class="form-group">
                            <label>Talonario Inicio</label>
                            <input type="text" class="form-control" name="inicio" id="inicio" required>
                        </div>                    
                        <div class="form-group">
                            <label>Talonario Término</label>
                            <input type="text" class="form-control" name="termino" id="termino" required>
                        </div>                 
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                        <input type="submit" class="btn btn-success" id="nuevo_btn" value="Aceptar">
                    </div>
                </form>
            </div>
        </div>
    </div>
<!-- Fin Modal de Talonario Nuevo -->
<!-- Anular Modal HTML -->
    <div id="anularTalonarioModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form name="anular_form" id="anular_form">
                    <div class="modal-header">                      
                        <h4 class="modal-title">Anular Talonario</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="idt" id="idt">                  
                        <p>¿Está seguro que desea anular este Talonario?</p>
                        <p class="text-warning"><small><!-- Esta acción no se puede deshacer. --></small></p>
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
                        <input type="submit" class="btn btn-danger" id="anular_btn" value="Anular">
                    </div>
                </form>
            </div>
        </div>
    </div>
<!-- Fin Anular Modal -->      
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
                            //$('#talonNuevo').hide();
                             //location.reload();
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
                            //$('#talonNuevo').hide();
                            // location.reload();
                        });
            //  Asigna talonariio a cliente
            $("#asignarCli_btn").click(function(e){
                //alert("Hola");
                e.preventDefault();
                        var datax = $('#talonCliente_form').serializeArray();
                        $.each(datax, function(i, field){
                            console.log("contenido del form = "+ field.name + ":" + field.value + " ");
                        });
                        //console.log($('#rut').val());
                           $.ajax({
                                   data: datax,    // En data se puede utilizar un objeto JSON, un array o un query string
                                   type: "POST",   //Cambiar a type: POST si necesario
                                   dataType: "json",  // Formato de datos que se espera en la respuesta
                                   url: "<?=base_url();?>Vale/asignaCli",  // URL a la que se enviará la solicitud Ajax
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
                            $('#talonCliente_form').hide();
                            location.reload();
                        });
             //  Asigna talonariio a Movil
            $("#asignarMov_btn").click(function(e){
                //alert("Hola");
                e.preventDefault();
                        var datax = $('#talonMovil_form').serializeArray();
                        $.each(datax, function(i, field){
                            console.log("contenido del form = "+ field.name + ":" + field.value + " ");
                        });
                        //console.log($('#rut').val());
                           $.ajax({
                                   data: datax,    // En data se puede utilizar un objeto JSON, un array o un query string
                                   type: "POST",   //Cambiar a type: POST si necesario
                                   dataType: "json",  // Formato de datos que se espera en la respuesta
                                   url: "<?=base_url();?>Vale/asignaMov",  // URL a la que se enviará la solicitud Ajax
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
                            $('#talonMovil_form').hide();
                            location.reload();
                        });

            //  envia los nuevos datos para actualizar
            $("#editarTalonario_btn").click(function(e){
                //alert("Hola");
                e.preventDefault();
                        var datax = $('#editTalonario_form').serializeArray();
                        $.each(datax, function(i, field){
                            console.log("contenido del form = "+ field.name + ":" + field.value + " ");
                        });
                        //console.log($('#rut').val());
                           $.ajax({
                                   data: datax,    // En data se puede utilizar un objeto JSON, un array o un query string
                                   type: "POST",   //Cambiar a type: POST si necesario
                                   dataType: "json",  // Formato de datos que se espera en la respuesta
                                   url: "<?=base_url();?>Vale/actualiza",  // URL a la que se enviará la solicitud Ajax
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
                            $('#editTalonarioModal').hide();
                            location.reload();
                        });
            //  envia los nuevos datos para actualizar
            $("#anular_btn").click(function(e){
                //alert("Hola");
                e.preventDefault();
                        var datax = $('#anular_form').serializeArray();
                        $.each(datax, function(i, field){
                            console.log("contenido del form = "+ field.name + ":" + field.value + " ");
                        });
                        //console.log($('#id').val());
                           $.ajax({
                                   data: datax,    // En data se puede utilizar un objeto JSON, un array o un query string
                                   type: "POST",   //Cambiar a type: POST si necesario
                                   dataType: "json",  // Formato de datos que se espera en la respuesta
                                   url: "<?=base_url();?>Vale/anula",  // URL a la que se enviará la solicitud Ajax
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
                            $('#anularTalonarioModal').hide();
                             location.reload();
                        });

            //Búsqueda
            $("#buscar").keyup(function(e){
                e.preventDefault();
                        var text = $('#buscar').val();
                        var lt = $('#buscar').val().length;
                        if(lt >= 3){
                              $("#chofer_tb tbody").html('');
                                $("#pagination").hide();
                                //alert($("#buscar").val());
                                    console.log(text);
                                    $.post( "<?=base_url();?>Chofer/buscar", 
                                        { data : text }, 
                                        function(data){
                                        var obj = JSON.parse(data);
                                        var output = '';
                                        $.each(obj, function(i,item){
                                            output +=
                                            '<tr>' +
                                                '<td>' +
                                                    '<span class="custom-checkbox">' +
                                                        '<input type="checkbox" id="checkbox1" name="options[]" value="1">'+
                                                        '<label for="checkbox1"></label>'+
                                                    '</span>'+
                                                '</td>'+
                                                '<td>'+item.ChoferRut+'</td>'+
                                                '<td>'+item.ChoferApellidoPat+'</td>'+
                                                '<td>'+item.ChoferApellidoMat+'</td>'+
                                                '<td>'+item.ChoferNombres+'</td>'+
                                                '<td>'+item.ChoferDireccion+'</td>'+
                                                '<td>'+item.ChoferFono+'</td>'+
                                                '<td>'+item.ChoferCelular+'</td>'+
                                                '<td>'+item.ComunaNombre+'</td>'+
                                                '<td><a href="#editEmployeeModal" class="edit" onClick="selChofer(\''+item.ChoferRut+'\',\''+item.ChoferApellidoPat+'\',\''+item.ChoferApellidoMat+'\',\''+item.ChoferNombres+'\',\''+item.ChoferDireccion+'\',\''+item.ChoferFono+'\',\''+item.ChoferCelular+'\',\''+item.ComunaNombre+'\')" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Editar">&#xE254;</i></a>'+
                                                '<a href="#deleteEmployeeModal" class="delete" onClick="selChoferDel(\''+item.ChoferRut+'\')" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Eliminar">&#xE872;</i></a>'+
                                                '</td>'+
                                            '</tr>';
                                        });
                                        $("#chofer_tb tbody").append(output);
                                    });          
                        }
                                
                });
    });
    </script>