<div class="container">
        <div class="table-wrapper">
            <div class="table-title">
               <div class="row">
                    <div class="col-sm-4">
                        <h2>Administar <b>Vales</b></h2>
                    </div>
                    <div class="col-sm-8">
                        <a href="#talonMovil" data-toggle="modal" class="btn btn-warning"><i class="material-icons">&#xE147;</i> <span>Vales Móvil</span></a>
                        <a href="#talonCliente" data-toggle="modal"class="btn btn-success"><i class="material-icons">&#xE147;</i> <span>Vales Cliente</span></a>
                        <!-- <a href="#talonNuevo" data-toggle="modal" class="btn btn-primary"><i class="material-icons">&#xE147;</i> <span>Ingreso Talonario</span></a> -->           
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
            <div class="row">
                <form name="test" action="">
                    <div class="row">
                        <div class="col-xs-6 form-group">
                            <label for="">Móvil</label>
                                <select id="movilTalonario" name="movilTalonario" class="form-control">
                                    <option value="#">Selecione</option>
                                    <?php foreach ($movilTalonario as $i) {
                                        $numero = $i->MovilNumero;
                                        echo '<option value="'. $i->id_talonario .','.$i->folio_inicio.'">'. $numero .'</option>';
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
                                        echo '<option value="'. $i->ClienteRut .'">'. $nombre .'</option>';
                                    } ?>
                                </select>
                        </div>
                        <div class="col-xs-6 form-group">
                            <label for="">Adicional</label>
                                <select id="adicional" name="adicional" class="form-control">
                                    <option value="#">Selecione</option>
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
                                <input class="form-control" id="origen" name="origen" type="text" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-6 form-group">
                            <label for="">Destino</label>
                                <input class="form-control" id="destino" name="destino" type="text" />  
                        </div>
                        <div class="col-xs-6 form-group">
                            <label for="">Fecha Carrera</label>
                                <input class="form-control" id="fecha" name="fecha" type="text" placeholder="ej: 12/03/2019" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-6 form-group">
                            <label for="">Hora llamado</label>
                                <input class="form-control" id="hora" name="hora" type="text" placeholder="ej: 15:45" />  
                        </div>
                        <div class="col-xs-6 form-group">
                            <label for="">Valor</label>
                                <input class="form-control" id="valor" name="valor" type="text" placeholder="Ingrese valor en pesos" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-6 form-group">
                            <label for="">Observaciones</label>
                                <input class="form-control" id="obs" name="obs" type="text" />  
                        </div>
                        <div class="col-xs-6 form-group">
                             <label for=""></label>
                                <input type="submit" class="btn btn-success form-control" id="guardarVale_btn" value="Grabar Vale">
                        </div>
                    </div>
                    </div>
                </form>
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
    $(document).ready(function(){
        //Selecciona el movil y carga el número de vale correspondiente
         $("#movilTalonario").change(function(){
            //alert($('select[id=movilTalonario]').val());
            var datax = $('select[id=movilTalonario]').val();
            //console.log(datax);
                            $.ajax({
                                   data: { 'datos' : datax },    // De esta manera paso cualquier valor
                                   type: "POST",   //Cambiar a type: POST si necesario
                                   dataType: "json",  // Formato de datos que se espera en la respuesta
                                   url: "<?=base_url();?>Vale/getValeNum",  // URL a la que se enviará la solicitud Ajax
                            })
                             .done(function( data, textStatus, jqXHR ) {
                                
                                console.log(data.id);
                                console.log(data.id_talonarioMovil);
                                console.log(data.numero_vale);
                                var numInicial = data.numero_vale;
                                var numVale = parseInt(numInicial, 10);
                                var numVale = numVale+1;
                                    if (typeof data.numero_vale !== 'undefined'){
                                    //if(data.numero_vale != ""){
                                        $('#vale').val(numVale);
                                    }else{
                                        $('#vale').val(data);
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

            });
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