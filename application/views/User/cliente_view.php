<div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h2>Administar <b>Clientes</b></h2>
                    </div>
                    <div class="col-sm-3">
                        <a href="<?= base_url('Cliente/registrar');?>" class="btn btn-success"><i class="material-icons">&#xE147;</i> <span>Nuevo Cliente</span></a>           
                    </div>
                    <div class="col-sm-3">
                        <form><span><input type="text" style="color: #a0a0a0;" class="form-control" name="buscar" id="buscar" placeholder="Buscar datos"></span></form>                       
                    </div>
                </div>
            </div>
            <table class="table table-striped table-hover" id="cliente_tb">
                <thead>
                    <tr>
                        <th>Rut Cliente</th>
                        <th>Nombre</th>
                        <th>Dirección</th>
                        <th>Comuna</th>
                        <th>Teléfono</th>
                        <th>Correo</th>
                        <th>Número</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($clientes->result() as $row){ ?>
                        <?php 
                            $cod = $row->ClienteCodigo;
                            $nombre = $row->ClienteNombres. " " .$row->ClienteApellidoPat. " " .$row->ClienteApellidoMat;
                            $fonos = $row->ClienteFonoCasa." / ".$row->ClienteFonoTrabajo." / ".$row->ClienteFonoCelular;
                        ?>
                    <tr>
                        <td><?= $row->ClienteRut;?></td>
                        <td><?= $nombre;?></td>
                        <td><?= $row->ClienteDireccion;?></td>
                        <td><?= $row->ComunaNombre;?></td>
                        <td><?= $fonos;?></td>
                        <td><?= $row->ClienteEmail;?></td>
                        <td><?= $row->ClienteNumero;?></td>
                        <td>
                            <a href="<?=base_url("Cliente/obtenerCliente/$cod");?>" class="edit"><i class="material-icons" title="Editar">&#xE254;</i></a>
                            <a href="#deleteEmployeeModal" class="delete" onClick="selClienteDel('<?php echo $cod; ?>')" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Eliminar">&#xE872;</i></a>
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
     <!-- Fin Delete Modal HTML -->
    <script>
        function selClienteDel(cod){
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
            //  envia los datos para eliminar
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
                                   url: "<?=base_url();?>Cliente/elimina",  // URL a la que se enviará la solicitud Ajax
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
                              $("#cliente_tb tbody").html('');
                                $("#pagination").hide();
                                //alert($("#buscar").val());
                                    console.log(text);
                                    $.post( "<?=base_url();?>Cliente/buscar", 
                                        { data : text }, 
                                        function(data){
                                        var obj = JSON.parse(data);
                                        var output = '';
                                        $.each(obj, function(i,item){
                                            var nombre = item.ClienteNombres+' '+item.ClienteApellidoPat+' '+item.ClienteApellidoMat;
                                            var fonos = item.ClienteFonoCasa+'/'+item.ClienteFonoTrabajo+'/'+item.ClienteFonoCelular;
                                            output +=
                                            '<tr>' +
                                                '</td>'+
                                                '<td>'+item.ClienteRut+'</td>'+
                                                '<td>'+nombre+'</td>'+
                                                '<td>'+item.ClienteDireccion+'</td>'+
                                                '<td>'+item.ComunaNombre+'</td>'+
                                                '<td>'+fonos+'</td>'+
                                                '<td>'+item.ClienteEmail+'</td>'+
                                                '<td>'+item.ClienteNumero+'</td>'+
                                                '<td><a href="<?=base_url();?>Cliente/obtenerCliente/'+item.ClienteCodigo+'" class="edit"><i class="material-icons" title="Editar">&#xE254;</i></a>'+
                                                '<a href="#deleteEmployeeModal" class="delete" onClick="selClienteDel(\''+item.ClienteCodigo+'\')" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Eliminar">&#xE872;</i></a>'+
                                                '</td>'+
                                            '</tr>';
                                        });
                                        $("#cliente_tb tbody").append(output);
                                    });          
                        }
                                
                });
    });
        //var ambas = 'contiene "dobles comillas" y \'comillas simples\' sin problemas (Esto es solo un ejemplo del uso de las comillas dobles y simples)';
        //console.log(ambas);
    </script>