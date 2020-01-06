<div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h2>Administar <b>Empresas</b></h2>
                        <?php
                        $rol = $this->session->userdata('USER_ROL');
                        $nombre = $this->session->userdata('USERNAME');
                        $apellido = $this->session->userdata('USER_AP');

                        echo 'Usuario: '.$nombre." ".$apellido;
                        ?>
                    </div>
                    <div class="col-sm-3">
                        <a href="<?= base_url('Empresa/registrar');?>" class="btn btn-success"><i class="material-icons">&#xE147;</i> <span>Nueva Empresa</span></a>           
                    </div>
                    <div class="col-sm-3">
                        <form><span><input type="text" style="color: #a0a0a0;" class="form-control" name="buscar" id="buscar" placeholder="Ingrese Razón Social"></span></form>                       
                    </div>
                </div>
            </div>
            <table class="table table-striped table-hover" id="empresas_tb">
                <thead>
                    <tr>
                        <th>Rut Empresa</th>
                        <th>Razón Social</th>
                        <th>Dirección</th>
                        <th>Comuna</th>
                        <th>Teléfono</th>
                        <th>Rut R.L.</th>
                        <th>Nombre R.L.</th>
                        <th>Número</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($clientes->result() as $row){ ?>
                        <?php 
                            $cod = $row->ClienteCodigo;
                            $fonos = $row->ClienteFonoCasa;
                        ?>
                    <tr>
                        <td><?= $row->ClienteRut;?></td>
                        <td><?= $row->ClienteNombres;?></td>
                        <td><?= $row->ClienteDireccion;?></td>
                        <td><?= $row->ComunaNombre;?></td>
                        <td><?= $fonos;?></td>
                        <td><?= $row->ClienteEmpRLRut;?></td>
                        <td><?= $row->ClienteEmpRLNombres;?></td>
                        <td><?= $row->ClienteNumero;?></td>
                        <td>
                            <a href="<?=base_url("Empresa/obtenerEmpresa/$cod");?>" class="activar"><i class="material-icons" title="Editar">&#xE86C;</i></a>
                            <a href="<?=base_url("Empresa/obtenerEmpresa/$cod");?>" class="edit"><i class="material-icons" title="Editar">&#xE254;</i></a>
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
                                   url: "<?=base_url();?>Empresa/elimina",  // URL a la que se enviará la solicitud Ajax
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
                              $("#empresas_tb tbody").html('');
                                $("#pagination").hide();
                                //alert($("#buscar").val());
                                    console.log(text);
                                    $.post( "<?=base_url();?>Empresa/buscar", 
                                        { data : text }, 
                                        function(data){
                                        var obj = JSON.parse(data);
                                        var output = '';
                                        $.each(obj, function(i,item){
                                            var nombre = item.ClienteNombres;
                                            var fonos = item.ClienteFonoCasa;
                                            output +=
                                            '<tr>' +
                                                '</td>'+
                                                '<td>'+item.ClienteRut+'</td>'+
                                                '<td>'+nombre+'</td>'+
                                                '<td>'+item.ClienteDireccion+'</td>'+
                                                '<td>'+item.ComunaNombre+'</td>'+
                                                '<td>'+fonos+'</td>'+
                                                '<td>'+item.ClienteEmpRLRut+'</td>'+
                                                '<td>'+item.ClienteEmpRLNombres+'</td>'+
                                                '<td>'+item.ClienteNumero+'</td>'+
                                                '<td><a href="<?=base_url();?>Empresa/obtenerEmpresa/'+item.ClienteCodigo+'" class="edit"><i class="material-icons" title="Editar">&#xE254;</i></a>'+
                                                '<a href="#deleteEmployeeModal" class="delete" onClick="selClienteDel(\''+item.ClienteCodigo+'\')" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Eliminar">&#xE872;</i></a>'+
                                                '</td>'+
                                            '</tr>';
                                        });
                                        $("#empresas_tb tbody").append(output);
                                    });          
                        }
                                
                });
    });
        //var ambas = 'contiene "dobles comillas" y \'comillas simples\' sin problemas (Esto es solo un ejemplo del uso de las comillas dobles y simples)';
        //console.log(ambas);
    </script>