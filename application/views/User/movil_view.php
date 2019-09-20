<div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h2>Administar <b>Móviles</b></h2>
                    </div>
                    <div class="col-sm-3">
                        <a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Nuevo Móvil</span></a>
                        <!-- <a href="#deleteEmployeeModal" class="btn btn-danger" data-toggle="modal"><i class="material-icons">&#xE15C;</i> <span>Eliminar</span></a> -->                       
                    </div>
                    <div class="col-sm-3">
                        <form><span><input type="text" style="color: #a0a0a0;" class="form-control" name="buscar" id="buscar" placeholder="Ingrese el número del móvil"></span></form>                       
                    </div>
                </div>
            </div>
            <table class="table table-striped table-hover" id="movil_tb">
                <thead>
                    <tr>
                        <th>
                            <span class="custom-checkbox">
                                <input type="checkbox" id="selectAll">
                                <label for="selectAll"></label>
                            </span>
                        </th>
                        <th>Rut Dueño</th>
                        <th>Patente</th>
                        <th>Marca</th>
                        <th>Modelo</th>
                        <th>Año</th>
                        <th>Número</th>
                        <th>Valor</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($moviles->result() as $row){ ?>
                        <?php $cod = $row->MovilCodigo; ?>
                        <?php

                        $valor1 = $row->MovilValorMes;
                        $valor2 = number_format($valor1, 0, '', '.');

                        ?>
                    <tr>
                        <td>
                            <span class="custom-checkbox">
                                <input type="checkbox" id="checkbox1" name="options[]" value="1">
                                <label for="checkbox1"></label>
                            </span>
                        </td>
                        <td><?= $row->DuenoRut;?></td>
                        <td><?= $row->MovilPatente;?></td>
                        <td><?= $row->MovilMarca;?></td>
                        <td><?= $row->MovilModelo;?></td>
                        <td><?= $row->MovilAnio;?></td>
                        <td><?= $row->MovilNumero;?></td>
                        <td>$<?= $valor2;?></td>
                        <td>
                            <a href="#editEmployeeModal" class="edit" onClick="selMovil('<?php echo $cod."','".$row->DuenoRut."','".$row->MovilPatente."','".$row->MovilMarca."','".$row->MovilModelo."','".$row->MovilAnio."','".$row->MovilNumero."','".$row->MovilValorMes; ?>')" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Editar">&#xE254;</i></a>
                            <a href="#deleteEmployeeModal" class="delete" onClick="selMovilDel('<?php echo $cod; ?>')" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Eliminar">&#xE872;</i></a>
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
        function selMovil(cod,rut,pat,mar,mod,ano,num,val){
            $('#cod').val(cod);
            $('#rut').val(rut);
            $('#pat').val(pat);
            $('#mar').val(mar);
            $('#mod').val(mod);
            $('#ano').val(ano);
            $('#num').val(num);
            $('#val').val(val);
            //console.log(id);
        }
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
                                   url: "<?=base_url();?>Movil/ingresa",  // URL a la que se enviará la solicitud Ajax
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
                        if(lt >= 1){
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
    </script>