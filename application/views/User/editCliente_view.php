<div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h2>Editar datos <b>Cliente</b></h2>
                    </div>
                </div>
            </div>
             <div class="row">
                 <form name="nuevo_form" id="nuevo_form" action="<?=base_url("Cliente/actualiza");?>" method="post">
                    <div class="col-sm-6">
                    <?php foreach($cliente as $row){ ?>
                        <input type="hidden" name="cod" id="cod" value="<?= $row->ClienteCodigo ?>">            
                        <div class="form-group">
                            <label>Rut Cliente</label>
                            <input type="text" class="form-control" name="rut" id="rut" value="<?= $row->ClienteRut ?>">
                        </div>
                        <div class="form-group">
                            <label>Nombres</label>
                            <input type="text" class="form-control" name="nombres" id="nombres" value="<?= $row->ClienteNombres ?>">
                        </div>
                        <div class="form-group">
                            <label>Apellido Paterno</label>
                            <input type="text" class="form-control" name="pat" id="pat" value="<?= $row->ClienteApellidoPat ?>">
                        </div>
                        <div class="form-group">
                            <label>Apellido Materno</label>
                            <input type="text" class="form-control" name="mat" id="mat" value="<?= $row->ClienteApellidoMat ?>">
                        </div>
                        <div class="form-group">
                            <label>Dirección</label>
                            <input type="text" class="form-control" name="dir" id="dir" value="<?= $row->ClienteDireccion ?>">
                        </div>
                        <div class="form-group">
                            <label>Teléfono Casa</label>
                            <input type="text" class="form-control" name="telcasa" id="telcasa" value="<?= $row->ClienteFonoCasa ?>">
                        </div>
                        <div class="form-group">
                            <label>Teléfono Trabajo</label>
                            <input type="text" class="form-control" name="telpega" id="telpega" value="<?= $row->ClienteFonoTrabajo ?>">
                        </div>                  
                    </div>
                   
                    <div class="col-sm-6">
                        
                        <div class="form-group">
                            <label>Teléfono Celular</label>
                            <input type="text" class="form-control" name="telcel" id="telcel" value="<?= $row->ClienteFonoCelular ?>">
                        </div>
                        <div class="form-group">
                            <label>Comuna</label>
                             <select id="com" name="com" class="form-control">
                                <?php foreach ($comunas as $i) {
                                    echo '<option value="'. $i->ComunaCodigo .'">'. $i->ComunaNombre .'</option>';
                                } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Fecha de Nacimiento</label>
                            <input type="text" class="form-control" name="nac" id="nac" value="<?= $row->ClienteFecNac ?>">
                        </div>
                        <div class="form-group">
                            <label>Correo Electrónico</label>
                            <input type="text" class="form-control" name="email" id="email" value="<?= $row->ClienteEmail ?>">
                        </div>
                        <div class="form-group">
                            <label>Clave Cliente</label>
                            <input type="password" class="form-control" name="clavecli" id="clavecli" value="<?= $row->ClienteClave ?>">
                        </div>
                        <div class="form-group">
                            <label>Número Cliente</label>
                            <input type="text" class="form-control" name="numcli" id="numcli" value="<?= $row->ClienteNumero ?>">
                        </div>                    
                    </div>
                    <p>
                    <div class="modal-footer">
                            <a class="btn btn-warning btn-sm" href=<?=base_url("Cliente/mostrar")?>>Volver a Clientes</a>
                            <input type="submit" class="btn btn-success btn-sm" value="Actualizar datos de Cliente">
                    </div>
                    <?php } ?>
                </form>
                </div>
        </div>
    </div>
    <!-- Edit Modal HTML -->
    <div id="addEmployeeModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form name="nuevo_form" id="nuevo_form">
                    <div class="modal-header">                      
                        <h4 class="modal-title">Nuevo Móvil</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">                    
                        <div class="form-group">
                            <input type="hidden" class="form-control" name="tco" id="tco" value="2">
                        </div>                    
                        <div class="form-group">
                            <label>Rut Dueño</label>
                            <input type="text" class="form-control" name="ru" id="ru" required>
                        </div>
                        <div class="form-group">
                            <label>Patente</label>
                            <input type="text" class="form-control" name="pa" id="pa" required>
                        </div>
                        <div class="form-group">
                            <label>Marca</label>
                            <input type="text" class="form-control" name="ma" id="ma" required>
                        </div>
                        <div class="form-group">
                            <label>Modelo</label>
                            <input type="text" class="form-control" name="mo" id="mo" required>
                        </div>
                        <div class="form-group">
                            <label>Año</label>
                            <input type="text" class="form-control" name="an" id="an" required>
                        </div>
                        <div class="form-group">
                            <label>Número Móvil</label>
                            <input type="text" class="form-control" name="nu" id="nu" required>
                        </div>
                        <div class="form-group">
                            <label>Valor Mensual</label>
                            <input type="text" class="form-control" name="va" id="va" required>
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
    <!-- Edit Modal HTML -->
    <div id="editEmployeeModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form name="editar_form" id="editar_form">
                    <div class="modal-header">                      
                        <h4 class="modal-title">Editar Móvil</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="hidden" class="form-control" name="cod" id="cod">
                        </div>                    
                        <div class="form-group">
                            <label>Rut Dueño</label>
                            <input type="text" class="form-control" name="rut" id="rut" readonly>
                        </div>
                        <div class="form-group">
                            <label>Patente</label>
                            <input type="text" class="form-control" name="pat" id="pat">
                        </div>
                        <div class="form-group">
                            <label>Marca</label>
                            <input type="text" class="form-control" name="mar" id="mar">
                        </div>
                        <div class="form-group">
                            <label>Modelo</label>
                            <input type="text" class="form-control" name="mod" id="mod">
                        </div>
                        <div class="form-group">
                            <label>Año</label>
                            <input type="text" class="form-control" name="ano" id="ano">
                        </div>
                        <div class="form-group">
                            <label>Número Móvil</label>
                            <input type="text" class="form-control" name="num" id="num">
                        </div>
                        <div class="form-group">
                            <label>Valor Mensual</label>
                            <input type="text" class="form-control" name="val" id="val">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
                        <input type="submit" class="btn btn-info" id="editar_btn" value="Editar">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Delete Modal HTML -->
    <div id="deleteEmployeeModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form name="eliminar_form" id="eliminar_form">
                    <div class="modal-header">                      
                        <h4 class="modal-title">Eliminar Registro</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="id" id="id">                  
                        <p>¿Está seguro que desea eliminar este registro?</p>
                        <p class="text-warning"><small>Esta acción no se puede deshacer.</small></p>
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
                        <input type="submit" class="btn btn-danger" id="eliminar_btn" value="Eliminar">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        function selMovilDel(cod){
            $('#id').val(cod);
            //console.log(id);
        }
    $(document).ready(function(){
        // Activate tooltip
        $('[data-toggle="tooltip"]').tooltip();
            
            // Select/Deselect checkboxes
            var checkbox = $('table tbody input[type="checkbox"]');
            $("#selectAll").click(function(){
                if(this.checked){
                    checkbox.each(function(){
                        this.checked = true;                        
                    });
                } else{
                    checkbox.each(function(){
                        this.checked = false;                        
                    });
                } 
            });
            checkbox.click(function(){
                if(!this.checked){
                    $("#selectAll").prop("checked", false);
                }
            });
            //  envia los nuevos datos para actualizar
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
                                   url: "<?=base_url();?>Cliente/ingresa",  // URL a la que se enviará la solicitud Ajax
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
                            //location.reload();
                            alert("Cliente Ingresado Exitosamente!");
                            location.href="<?=base_url();?>Cliente/mostrar";
                        });

            //  envia los nuevos datos para actualizar
            $("#editar_btn").click(function(e){
                //alert("Hola");
                e.preventDefault();
                        var datax = $('#editar_form').serializeArray();
                        $.each(datax, function(i, field){
                            console.log("contenido del form = "+ field.name + ":" + field.value + " ");
                        });
                        //console.log($('#rut').val());
                           $.ajax({
                                   data: datax,    // En data se puede utilizar un objeto JSON, un array o un query string
                                   type: "POST",   //Cambiar a type: POST si necesario
                                   dataType: "json",  // Formato de datos que se espera en la respuesta
                                   url: "<?=base_url();?>Movil/actualiza",  // URL a la que se enviará la solicitud Ajax
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
                                   url: "<?=base_url();?>Movil/elimina",  // URL a la que se enviará la solicitud Ajax
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
                              $("#movil_tb tbody").html('');
                                $("#pagination").hide();
                                //alert($("#buscar").val());
                                    console.log(text);
                                    $.post( "<?=base_url();?>Movil/buscar", 
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
                                                '<td>'+item.DuenoRut+'</td>'+
                                                '<td>'+item.MovilPatente+'</td>'+
                                                '<td>'+item.MovilMarca+'</td>'+
                                                '<td>'+item.MovilModelo+'</td>'+
                                                '<td>'+item.MovilAnio+'</td>'+
                                                '<td>'+item.MovilNumero+'</td>'+
                                                '<td>$'+item.MovilValorMes+'</td>'+
                                                '<td><a href="#editEmployeeModal" class="edit" onClick="selMovil(\''+item.MovilCodigo+'\',\''+item.DuenoRut+'\',\''+item.MovilPatente+'\',\''+item.MovilMarca+'\',\''+item.MovilModelo+'\',\''+item.MovilAnio+'\',\''+item.MovilNumero+'\',\''+item.MovilValorMes+'\')" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Editar">&#xE254;</i></a>'+
                                                '<a href="#deleteEmployeeModal" class="delete" onClick="selMovilDel(\''+item.MovilCodigo+'\')" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Eliminar">&#xE872;</i></a>'+
                                                '</td>'+
                                            '</tr>';
                                        });
                                        $("#movil_tb tbody").append(output);
                                    });          
                        }
                                
                });
    });
        //var ambas = 'contiene "dobles comillas" y \'comillas simples\' sin problemas (Esto es solo un ejemplo del uso de las comillas dobles y simples)';
        //console.log(ambas);
        document.ready = document.getElementById("com").value = '<?=$row->ComunaCodigo?>'; // con esto seteo el valor de la comuna en el select option XD ;D
    </script>
    