<div class="container">
        <div class="table-wrapper">
            <div class="table-title">
               <div class="row">
                    <div class="col-sm-4">
                        <h2>Administar <b>Vales</b> Clientes</h2>
                    </div>
                    <div class="col-sm-8">
                        <a href="#bloquearMes" data-toggle="modal" class="btn btn-danger"><i class="material-icons">&#xE147;</i> <span>Bloquear Mes</span></a>
                        <a href="#habilitaMes" data-toggle="modal"class="btn btn-success"><i class="material-icons">&#xE147;</i> <span>Habilitar Mes</span></a>
                        <!-- <a href="#talonNuevo" data-toggle="modal" class="btn btn-primary"><i class="material-icons">&#xE147;</i> <span>Ingreso Talonario</span></a> -->           
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-6">
                    <!-- <?php foreach ($ultimo_tal as $i) {
                                        $talonario = $i->TalonarioInicio.'-'.$i->TalonarioTermino;
                                        echo "Último Talonario ingresado: ".$talonario. "<p>";
                                        echo "Con fecha: ".$i->TalonarioFechaIngreso;
                                    } ?>
                    <p>
                    <?php foreach ($tot_tal as $i) {
                                        echo "Total de talonarios ingresados: ".$i->total;
                                    } ?>
                    <p>
                    <?php foreach ($tot_talMov as $i) {
                                        echo "Talonarios asignados a móviles: ".$i->total;
                                    } ?>
                    <p>
                    <?php foreach ($tot_talCli as $i) {
                                        echo "Talonarios asignados a clientes: ".$i->total;
                                    } ?> -->
                    <p><a href="<?= base_url('Vale/vales');?>">Vales Móviles</a>                
                </div>
                <div class="col-xs-6">
                        <h4>Meses Habilitados para el ingreso de Vales</h4>
                        <ul class="list-group list-group-horizontal">
                            <?php foreach ($meses_hab as $i) { echo "<li class='list-group-item-warning'>".$i->MesesNombre."</li>"; } ?> 
                        </ul>
                    
                </div>              
            </div>
            <div class="row">
            <form name="guardarVale_form" id="guardarVale_form" action="">
                <div class="row">
                    <div class="col-xs-6 form-group">
                            <label for="">Selecciones Talonario de Cliente</label>
                                <select id="tal" name="tal" class="form-control">
                                    <!-- <option value="#">Selecione</option> -->
                                    <?php foreach ($clienteTalonario as $i) {
                                        $rut = $i->RutCliente;
                                        $inicio = $i->folio_inicio;
                                        $final = $i->folio_final;
                                        echo '<option value="'. $i->id_talonario.'">Cliente: '. $rut .'  folio: ( '.$inicio.' - '.$final.' )</option>';
                                    } ?>
                                </select>
                        </div>
                </div>
                    <div class="row">
                        <div class="col-xs-6 form-group">
                            <label for="">Móvil</label>
                                <select id="movil" name="movil" class="form-control">
                                    <option value="#">Selecione</option>
                                    <?php foreach ($moviles as $i) {
                                        $numero = $i->MovilNumero;
                                        echo '<option value="'. $i->MovilCodigo.'">'. $numero .'</option>';
                                    } ?>
                                </select>
                        </div>
                        <div class="col-xs-6 form-group">
                            <label for="">N° de Vale: </label>
                            <input class="form-control" type="text" id="vale" name="vale" value="" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-6 form-group">
                            <label for="">Cliente</label>
                               <select id="cliente" name="cliente" class="form-control">
                                    <option value="#">Selecione</option>
                                    <?php foreach ($clientes as $i) {
                                        $nombre = $i->ClienteNombres." ".$i->ClienteApellidoPat." ".$i->ClienteApellidoMat;
                                        echo '<option value="'. $i->ClienteCodigo .'">'. $nombre .'</option>';
                                    } ?>
                                </select>
                        </div>
                        <div class="col-xs-6 form-group">
                            <label for="">Adicional</label>
                                <select id="adicional" name="adicional" class="form-control">
                                    <option value="">Selecione</option>
                                    <!-- <?php foreach ($clientes as $i) {
                                        $nombre = $i->ClienteNombres." ".$i->ClienteApellidoPat." ".$i->ClienteApellidoMat;
                                        echo '<option value="'. $i->ClienteRut .'">'. $nombre .'</option>';
                                    } ?> -->
                                </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-6 form-group">
                            <label for="">Tipo Vale</label>
                                <select id="tipovale" name="tipovale" class="form-control">
                                    <option value="1">Convenio</option>
                                    <option value="2">Comprobante</option>
                                </select>
                        </div>
                        <div class="col-xs-6 form-group">
                            <label for="">Origen</label>
                                <input class="form-control" id="origen" name="origen" type="text" required />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-6 form-group">
                            <label for="">Destino</label>
                                <input class="form-control" id="destino" name="destino" type="text" required />  
                        </div>
                        <div class="col-xs-6 form-group">
                            <label for="">Fecha Carrera</label>
                                <input class="form-control" id="fecha" name="fecha" type="text" placeholder="ej: 12/03/2019" required />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-6 form-group">
                            <label for="">Hora llamado (formato 24 hrs.)</label>
                                <input class="form-control" id="hora" name="hora" type="text" placeholder="ej: 15:45" required />  
                        </div>
                        <div class="col-xs-6 form-group">
                            <label for="">Valor</label>
                                <input class="form-control" id="valor" name="valor" type="text" placeholder="Ingrese valor en pesos" required />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-6 form-group">
                            <label for="">Observaciones</label>
                                <input class="form-control" id="obs" name="obs" type="text" />  
                        </div>
                        <div class="col-xs-6 form-group">
                             <label for="">Guardar todos los datos</label>
                                <input type="submit" class="btn btn-success form-control" id="guardarVale_btn" value="Grabar Vale">
                        </div>
                    </div>
                    </div>
                </form>
            </div>
        </div>
</div>
<!-- Modal de Bloqueo de Mes -->
    <div id="bloquearMes" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form name="bloquearMes_form" id="bloquearMes_form">
                    <div class="modal-header">                      
                        <h4 class="modal-title">Bloqueo de Mes</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">                    
                        <div class="form-group">
                            <label>Meses Habilitados</label>
                                <select id="meseshab" name="meseshab" class="form-control">
                                <?php foreach ($meses_hab as $i) {
                                    echo '<option value="'. $i->MesesCodigo .'">'. $i->MesesNombre .'</option>';
                                } ?>
                            </select>
                        </div>                              
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                        <input type="submit" class="btn btn-success" id="bloquearMes_btn" value="Bloquear Mes">
                    </div>
                </form>
            </div>
        </div>
    </div>
<!-- Fin Modal de Bloqueo de mes -->
<!-- Modal de Habilitar Mes -->
    <div id="habilitaMes" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form name="habilitaMes_form" id="habilitaMes_form">
                    <div class="modal-header">                      
                        <h4 class="modal-title">Habilitar Mes</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">                    
                        <div class="form-group">
                            <label>Meses Bloqueados</label>
                                <select id="mesesbloq" name="mesesbloq" class="form-control">
                                <?php foreach ($meses_bloq as $i) {
                                    echo '<option value="'. $i->MesesCodigo .'">'. $i->MesesNombre .'</option>';
                                } ?>
                            </select>
                        </div>                                    
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                        <input type="submit" class="btn btn-success" id="habilitaMes_btn" value="Habilitar Mes">
                    </div>
                </form>
            </div>
        </div>
    </div>
<!-- Fin Modal de Habilitar mes -->
    <script>
    $(document).ready(function(){
            //  guardar nuevo vale
            $("#guardarVale_btn").click(function(e){
                //alert("Hola");
                e.preventDefault();
                        var datax = $('#guardarVale_form').serializeArray();
                        $.each(datax, function(i, field){
                            console.log("contenido del form = "+ field.name + ":" + field.value + " ");
                        });
                        //console.log($('#rut').val());
                           $.ajax({
                                   data: datax,    // En data se puede utilizar un objeto JSON, un array o un query string
                                   type: "POST",   //Cambiar a type: POST si necesario
                                   dataType: "json",  // Formato de datos que se espera en la respuesta
                                   url: "<?=base_url();?>Vale/ingresaValeCli",  // URL a la que se enviará la solicitud Ajax
                            })
                           .done(function( data, textStatus, jqXHR ) {
                                if ( console && console.log ) {
                                    console.log(" data msg : "+ data.msg
                                    + " \n textStatus : " + textStatus
                                    + " \n jqXHR.status : " + jqXHR.status );
                                }
                                    alert(data.msg);
                                    location.reload();
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
            //  Bloquear Mes
            $("#bloquearMes_btn").click(function(e){
                //alert("Hola");
                e.preventDefault();
                        var datax = $('#bloquearMes_form').serializeArray();
                        $.each(datax, function(i, field){
                            console.log("contenido del form = "+ field.name + ":" + field.value + " ");
                        });
                        //console.log($('#rut').val());
                           $.ajax({
                                   data: datax,    // En data se puede utilizar un objeto JSON, un array o un query string
                                   type: "POST",   //Cambiar a type: POST si necesario
                                   dataType: "json",  // Formato de datos que se espera en la respuesta
                                   url: "<?=base_url();?>Vale/bloquearMes",  // URL a la que se enviará la solicitud Ajax
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
                            $('#bloquearMes_form').hide();
                            location.reload();
                        });
             //  Asigna talonariio a Movil
            $("#habilitaMes_btn").click(function(e){
                //alert("Hola");
                e.preventDefault();
                        var datax = $('#habilitaMes_form').serializeArray();
                        $.each(datax, function(i, field){
                            console.log("contenido del form = "+ field.name + ":" + field.value + " ");
                        });
                        //console.log($('#rut').val());
                           $.ajax({
                                   data: datax,    // En data se puede utilizar un objeto JSON, un array o un query string
                                   type: "POST",   //Cambiar a type: POST si necesario
                                   dataType: "json",  // Formato de datos que se espera en la respuesta
                                   url: "<?=base_url();?>Vale/habilitaMes",  // URL a la que se enviará la solicitud Ajax
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
                            $('#habilitaMes_form').hide();
                            location.reload();
                        });

            //  envia los nuevos datos para actualizar
            $("#editar_btn").click(function(e){
                //alert("Hola");
                e.preventDefault();
                        var datax = $('#editar_form').serializeArray();
                        $.each(datax, function(i, field){
                            console.log("contenido del form = "+ field.name + ":" + field.value + " ");
                        });
                        console.log($('#rut').val());
                           $.ajax({
                                   data: datax,    // En data se puede utilizar un objeto JSON, un array o un query string
                                   type: "POST",   //Cambiar a type: POST si necesario
                                   dataType: "json",  // Formato de datos que se espera en la respuesta
                                   url: "<?=base_url();?>Chofer/actualiza",  // URL a la que se enviará la solicitud Ajax
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
                            $('#editEmployeeModal').hide();
                             location.reload();
                        });
            //  envia los nuevos datos para actualizar
            $("#eliminar_btn").click(function(e){
                //alert("Hola");
                e.preventDefault();
                        var datax = $('#eliminar_form').serializeArray();
                        $.each(datax, function(i, field){
                            console.log("contenido del form = "+ field.name + ":" + field.value + " ");
                        });
                        //console.log($('#id').val());
                           $.ajax({
                                   data: datax,    // En data se puede utilizar un objeto JSON, un array o un query string
                                   type: "POST",   //Cambiar a type: POST si necesario
                                   dataType: "json",  // Formato de datos que se espera en la respuesta
                                   url: "<?=base_url();?>Chofer/elimina",  // URL a la que se enviará la solicitud Ajax
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
                            $('#deleteEmployeeModal').hide();
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