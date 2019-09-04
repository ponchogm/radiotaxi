<div class="container">
        <div class="table-wrapper">
            <div class="table-title">
               <div class="row">
                    <div class="col-sm-4">
                        <h2>Administar <b>Talonarios de Vales</b></h2>
                    </div>
                    <div class="col-sm-6">
                        <a href="#talonMovil" data-toggle="modal" class="btn btn-warning"><i class="material-icons">&#xE147;</i> <span>Talonario Móvil</span></a>
                        <a href="#talonCliente" data-toggle="modal"class="btn btn-info"><i class="material-icons">&#xE147;</i> <span>Talonario Cliente</span></a>
                        <a href="#talonNuevo" data-toggle="modal" class="btn btn-primary"><i class="material-icons">&#xE147;</i> <span>Ingreso Talonario</span></a>           
                    </div>
                    <div class="col-sm-2">
                        <form><span><input type="text" style="color: #a0a0a0;" class="form-control" name="buscar" id="buscar" placeholder="Buscar datos"></span></form>                       
                    </div>
                </div>
            </div>
            <div class="row">
                
                <?php foreach ($ultimo_tal as $i) {
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
                                } ?>
            </div>
        </div>
</div>
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
<!-- Modal de Talonario  Móvil -->
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
<!-- Fin Modal de Talonario  Móvil -->
<!-- Modal de Talonario  Móvil -->
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
<!-- Fin Modal de Talonario  Móvil -->   
    <script>
        function selChofer(rut,nom,pat,mat,dir,fon,cel,com){
            $('#rut').val(rut);
            $('#nom').val(nom);
            $('#pat').val(pat);
            $('#mat').val(mat);
            $('#dir').val(dir);
            $('#fon').val(fon);
            $('#cel').val(cel);
            $('#com').val(com);
            console.log(com);
        }
        function selChoferDel(cod){
            $('#id').val(cod);
            //console.log(id);
        }
    $(document).ready(function(){
            //  guardar nuevo talonario
            $("#nuevo_btn").click(function(e){
                //alert("Hola");
                e.preventDefault();
                        var datax = $('#nuevo_form').serializeArray();
                        $.each(datax, function(i, field){
                            console.log("contenido del form = "+ field.name + ":" + field.value + " ");
                        });
                        //console.log($('#rut').val());
                           $.ajax({
                                   data: datax,    // En data se puede utilizar un objeto JSON, un array o un query string
                                   type: "POST",   //Cambiar a type: POST si necesario
                                   dataType: "json",  // Formato de datos que se espera en la respuesta
                                   url: "<?=base_url();?>Vale/ingresa",  // URL a la que se enviará la solicitud Ajax
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
                            $('#talonNuevo').hide();
                             location.reload();
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