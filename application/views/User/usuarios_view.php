<div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h2>Administar <b>Usuarios</b></h2>
                    </div>
                    <div class="col-sm-3">
                        <a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Nuevo Usuario</span></a>
                        <!-- <a href="#deleteEmployeeModal" class="btn btn-danger" data-toggle="modal"><i class="material-icons">&#xE15C;</i> <span>Eliminar</span></a> -->                       
                    </div>
                    <div class="col-sm-3">
                        <form><span><input type="text" style="color: #a0a0a0;" class="form-control" name="buscar" id="buscar" placeholder="Ingrese el apellido del usuario"></span></form>                       
                    </div>
                </div>
            </div>
            <table class="table table-striped table-hover" id="user_tb">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Apellido Paterno</th>
                        <th>Apellido Materno</th>
                        <th>Rut</th>
                        <th>Dirección</th>
                        <th>Teléfono</th>
                        <th>Correo</th>
                        <th>Rol</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($usuarios->result() as $row){ ?>
                        <?php $cod = $row->usuario_id; ?>
                        <?php $nombre = $row->usuario_nombres." ".$row->usuario_pat." ".$row->usuario_mat; ?>
                    <tr>
                                                    <td><?= $row->usuario_nombres;?></td>
                                                    <td><?= $row->usuario_pat;?></td>
                                                    <td><?= $row->usuario_mat;?></td>
                                                    <td><?= $row->usuario_rut;?></td>
                                                    <td><?= $row->usuario_dir;?></td>
                                                    <td><?= $row->usuario_fono;?></td>
                                                    <td><?= $row->usuario_correo;?></td>
                                                    <td><?= $row->usuario_rol;?></td>
                                                    <td>
                            <a href="#editEmployeeModal" class="edit" onClick="selUser('<?php echo $cod."','".$row->usuario_nombres."','".$row->usuario_pat."','".$row->usuario_mat."','".$row->usuario_rut."','".$row->usuario_dir."','".$row->usuario_fono."','".$row->usuario_correo."','".$row->usuario_pass."','".$row->usuario_rol; ?>')" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Editar">&#xE254;</i></a>
                            <a href="#deleteEmployeeModal" class="delete" onClick="selUserDel('<?php echo $cod."','".$nombre; ?>')" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Eliminar">&#xE872;</i></a>
                                                    </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <!-- Edit Modal HTML -->
    <div id="addEmployeeModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form name="nuevo_form" id="nuevo_form">
                    <div class="modal-header">                      
                        <h4 class="modal-title">Nuevo Usuario</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">                    
                        <div class="form-group">
                            <input type="hidden" class="form-control" name="rol" id="rol" value="2">
                        </div>                    
                        <div class="form-group">
                            <label>Nombres</label>
                            <input type="text" class="form-control" name="nom" id="nom" required>
                        </div>
                        <div class="form-group">
                            <label>Apellido Paterno</label>
                            <input type="text" class="form-control" name="pat" id="pat" required>
                        </div>
                        <div class="form-group">
                            <label>Apellido Materno</label>
                            <input type="text" class="form-control" name="mat" id="mat" required>
                        </div>
                        <div class="form-group">
                            <label>Rut</label>
                            <input type="text" class="form-control" name="rut" id="rut" required>
                        </div>
                        <div class="form-group">
                            <label>Dirección</label>
                            <input type="text" class="form-control" name="dir" id="dir" required>
                        </div>
                        <div class="form-group">
                            <label>Teléfono</label>
                            <input type="text" class="form-control" name="tel" id="tel" required>
                        </div>
                        <div class="form-group">
                            <label>Correo</label>
                            <input type="text" class="form-control" name="mail" id="mail" required>
                        </div>  
                        <div class="form-group">
                            <label>Contraseña</label>
                            <input type="text" class="form-control" name="pass" id="pass" required>
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
                        <h4 class="modal-title">Editar Usuario</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="hidden" class="form-control" name="cod" id="cod">
                        </div>
                        <div class="form-group">
                            <label>Rol Usuario</label>
                            <input type="text" class="form-control" name="ro" id="ro" required>
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
                            <label>Rut</label>
                            <input type="text" class="form-control" name="ru" id="ru" required>
                        </div>
                        <div class="form-group">
                            <label>Dirección</label>
                            <input type="text" class="form-control" name="di" id="di" required>
                        </div>
                        <div class="form-group">
                            <label>Teléfono</label>
                            <input type="text" class="form-control" name="te" id="te" required>
                        </div>
                        <div class="form-group">
                            <label>Correo</label>
                            <input type="text" class="form-control" name="mai" id="mai" required>
                        </div>  
                        <div class="form-group">
                            <label>Contraseña</label>
                            <input type="text" class="form-control" name="pas" id="pas" required>
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
                        <h4 class="modal-title">Eliminar Usuario</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="id" id="id">                  
                        <p>¿Está seguro que desea eliminar este usuario?</p>
                        <p>
                        <p id="nombre"></p>
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
        function selUser(cod,no,pa,ma,ru,di,te,mai,pas,ro){
            $('#cod').val(cod);
            $('#no').val(no);
            $('#pa').val(pa);
            $('#ma').val(ma);
            $('#ru').val(ru);
            $('#di').val(di);
            $('#te').val(te);
            $('#mai').val(mai);
            $('#pas').val(pas);
            $('#ro').val(ro);
            //console.log(id);
        }
        function selUserDel(cod,nombre){
            $('#id').val(cod);
            $('#nombre').text(nombre);
            //console.log(id);
        }
    $(document).ready(function(){
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
                                   url: "<?=base_url();?>Usuarios/ingresa",  // URL a la que se enviará la solicitud Ajax
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
                        //console.log($('#rut').val());
                           $.ajax({
                                   data: datax,    // En data se puede utilizar un objeto JSON, un array o un query string
                                   type: "POST",   //Cambiar a type: POST si necesario
                                   dataType: "json",  // Formato de datos que se espera en la respuesta
                                   url: "<?=base_url();?>Usuarios/actualiza",  // URL a la que se enviará la solicitud Ajax
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
                                   url: "<?=base_url();?>Usuarios/elimina",  // URL a la que se enviará la solicitud Ajax
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
                        if(lt >= 1){
                              $("#user_tb tbody").html('');
                                $("#pagination").hide();
                                //alert($("#buscar").val());
                                    console.log(text);
                                    $.post( "<?=base_url();?>Usuarios/buscar", 
                                        { data : text }, 
                                        function(data){
                                        var obj = JSON.parse(data);
                                        var output = '';
                                        $.each(obj, function(i,item){
                                            var nombre = item.usuario_nombres+' '+item.usuario_pat+' '+item.usuario_mat;
                                            output +=
                                            '<tr>' +
                                                '<td>'+item.usuario_nombres+'</td>'+
                                                '<td>'+item.usuario_pat+'</td>'+
                                                '<td>'+item.usuario_mat+'</td>'+
                                                '<td>'+item.usuario_rut+'</td>'+
                                                '<td>'+item.usuario_dir+'</td>'+
                                                '<td>'+item.usuario_fono+'</td>'+
                                                '<td>'+item.usuario_correo+'</td>'+
                                                '<td>'+item.usuario_rol+'</td>'+
                                                '<td><a href="#editEmployeeModal" class="edit" onClick="selUser(\''+item.usuario_id+'\',\''+item.usuario_nombres+'\',\''+item.usuario_pat+'\',\''+item.usuario_mat+'\',\''+item.usuario_rut+'\',\''+item.usuario_dir+'\',\''+item.usuario_fono+'\',\''+item.usuario_correo+'\',\''+item.usuario_pass+'\',\''+item.usuario_rol+'\')" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Editar">&#xE254;</i></a>'+
                                                '<a href="#deleteEmployeeModal" class="delete" onClick="selUserDel(\''+item.usuario_id+'\',\''+nombre+'\')" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Eliminar">&#xE872;</i></a>'+
                                                '</td>'+
                                            '</tr>';
                                        });
                                        $("#user_tb tbody").append(output);
                                    });          
                        }
                                
                });
    });
        //var ambas = 'contiene "dobles comillas" y \'comillas simples\' sin problemas (Esto es solo un ejemplo del uso de las comillas dobles y simples)';
        //console.log(ambas);
    </script>