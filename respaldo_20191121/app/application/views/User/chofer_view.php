<div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h2>Administar <b>Choferes</b></h2>
                        <?php
                        $rol = $this->session->userdata('USER_ROL');
                        $nombre = $this->session->userdata('USERNAME');
                        $apellido = $this->session->userdata('USER_AP');

                        echo 'Usuario: '.$nombre." ".$apellido;
                        ?>
                    </div>
                    <div class="col-sm-3">
                        <a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Nuevo Chofer</span></a>
                        <!-- <a href="#deleteEmployeeModal" class="btn btn-danger" data-toggle="modal"><i class="material-icons">&#xE15C;</i> <span>Eliminar</span></a> -->                        
                    </div>
                    <div class="col-sm-3">
                        <form><span><input type="text" style="color: #a0a0a0;" class="form-control" name="buscar" id="buscar" placeholder="Ingrese apellido del chofer"></span></form>                       
                    </div>
                </div>
            </div>
            <table class="table table-striped table-hover"  id="chofer_tb">
                <thead>
                    <tr>
                        <th>
                            <span class="custom-checkbox">
                                <input type="checkbox" id="selectAll">
                                <label for="selectAll"></label>
                            </span>
                        </th>
                        <th>Rut Chofer</th>
                        <th>Ap. Paterno</th>
                        <th>Ap. Materno</th>
                        <th>Nombres</th>
                        <th>Dirección</th>
                        <th>Teléfono</th>
                        <th>Celular</th>
                        <th>Comuna</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($choferes->result() as $row){ ?>
                        <?php $rut = $row->ChoferRut; ?>
                    <tr>
                        <td>
                            <span class="custom-checkbox">
                                <input type="checkbox" id="checkbox1" name="options[]" value="1">
                                <label for="checkbox1"></label>
                            </span>
                        </td>
                        <td><?= $rut;?></td>
                        <td><?= $row->ChoferApellidoPat;?></td>
                        <td><?= $row->ChoferApellidoMat;?></td>
                        <td><?= $row->ChoferNombres;?></td>
                        <td><?= $row->ChoferDireccion;?></td>
                        <td><?= $row->ChoferFono;?></td>
                        <td><?= $row->ChoferCelular;?></td>
                        <td><?=$row->ComunaNombre;?></td>
                        <td>
                            <a href="#editEmployeeModal" class="edit" onClick="selChofer('<?php echo $rut."','".$row->ChoferNombres."','".$row->ChoferApellidoPat."','".$row->ChoferApellidoMat."','".$row->ChoferDireccion."','".$row->ChoferFono."','".$row->ChoferCelular."','".$row->ComunaCodigo; ?>')" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Editar">&#xE254;</i></a>
                            <a href="#deleteEmployeeModal" class="delete" onClick="selChoferDel('<?php echo $rut; ?>')" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Eliminar">&#xE872;</i></a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
            <div class="clearfix" id="pagination">
                <div class="hint-text">Mostrando <b>10</b> de <b><?php echo $total_reg; ?></b> registros</div>
                    <?php echo $pagination; ?>
            </div>
        </div>
    </div>
    <!-- Edit Modal HTML -->
    <div id="addEmployeeModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form name="nuevo_form" id="nuevo_form">
                    <div class="modal-header">                      
                        <h4 class="modal-title">Nuevo Chofer</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">                    
                        <div class="form-group">
                            <label>Rut Chofer</label>
                            <input type="text" class="form-control" name="ru" id="ru" required>
                        </div>                    
                        <div class="form-group">
                            <label>Nombres</label>
                            <input type="text" class="form-control" name="no" id="no" required>
                        </div>
                        <div class="form-group">
                            <label>Apellido Paterno</label>
                            <input type="text" class="form-control" name="pa" id="pa" required>
                        </div>
                        <div class="form-group">
                            <label>Apellido Materno</label>
                            <input type="text" class="form-control" name="ma" id="ma" required>
                        </div>
                        <div class="form-group">
                            <label>Dirección</label>
                            <input type="text" class="form-control" name="di" id="di" required>
                        </div>
                        <div class="form-group">
                            <label>Teléfono Fijo</label>
                            <input type="text" class="form-control" name="tf" id="tf" required>
                        </div>
                        <div class="form-group">
                            <label>Celular</label>
                            <input type="text" class="form-control" name="ce" id="ce" required>
                        </div>
                         <div class="form-group">
                          <label for="sel1">Comuna</label>
                            <select id="co" name="co" class="form-control">
                                <?php foreach ($comunas as $i) {
                                    echo '<option value="'. $i->ComunaCodigo .'">'. $i->ComunaNombre .'</option>';
                                } ?>
                            </select>
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
                        <h4 class="modal-title">Editar Chofer</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="hidden" class="form-control" name="rut" id="rut">
                        </div>                    
                        <div class="form-group">
                            <label>Nombres</label>
                            <input type="text" class="form-control" name="nom" id="nom" readonly>
                        </div>
                        <div class="form-group">
                            <label>Apellido Paterno</label>
                            <input type="text" class="form-control" name="pat" id="pat">
                        </div>
                        <div class="form-group">
                            <label>Apellido Materno</label>
                            <input type="text" class="form-control" name="mat" id="mat">
                        </div>
                        <div class="form-group">
                            <label>Dirección</label>
                            <input type="text" class="form-control" name="dir" id="dir">
                        </div>
                        <div class="form-group">
                            <label>Teléfono</label>
                            <input type="text" class="form-control" name="fon" id="fon">
                        </div>
                        <div class="form-group">
                            <label>Celular</label>
                            <input type="text" class="form-control" name="cel" id="cel">
                        </div>
                        <div class="form-group">
                          <label for="sel1">Comuna</label>
                          <select id="com" name="com" class="form-control">
                                <?php foreach ($comunas as $i) {
                                    echo '<option value="'. $i->ComunaCodigo .'">'. $i->ComunaNombre .'</option>';
                                } ?>
                            </select>
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
                                   url: "<?=base_url();?>Chofer/ingresa",  // URL a la que se enviará la solicitud Ajax
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
                            $('#addEmployeeModal').hide();
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