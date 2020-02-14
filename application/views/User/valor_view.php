<div class="container">
        <div class="table-wrapper">
            <div class="table-title">
               <div class="row">
                    <div class="col-sm-4">
                        <h2>Gestión <b>Valores Móviles</b></h2>
                        <?php
                        $rol = $this->session->userdata('USER_ROL');
                        $nombre = $this->session->userdata('USERNAME');
                        $apellido = $this->session->userdata('USER_AP');

                        echo 'Usuario: '.$nombre." ".$apellido;
                        ?>
                    </div>
                    <div class="col-sm-8">
                        <a href="#valores" data-toggle="modal" class="btn btn-primary"><i class="material-icons">&#xE147;</i> <span>Ingresar Valor</span></a>
                        <a href="#excel" data-toggle="modal" class="btn btn-primary"><i class="material-icons">&#xE147;</i> <span>Anual</span></a>                
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div id="fecha" class="col-sm-6">
                    <?php foreach($valores as $row){ ?>
                        <?php
                        if($row->mes =='1'){$mesnombre = 'Enero';}
                        if($row->mes =='2'){$mesnombre = 'Febrero';}
                        if($row->mes =='3'){$mesnombre = 'Marzo';}
                        if($row->mes =='4'){$mesnombre = 'Abril';}
                        if($row->mes =='5'){$mesnombre = 'Mayo';}
                        if($row->mes =='6'){$mesnombre = 'Junio';}
                        if($row->mes =='7'){$mesnombre = 'Julio';}
                        if($row->mes =='8'){$mesnombre = 'Agosto';}
                        if($row->mes =='9'){$mesnombre = 'Septiembre';}
                        if($row->mes =='10'){$mesnombre = 'Octubre';}
                        if($row->mes =='11'){$mesnombre = 'Noviembre';}
                        if($row->mes =='12'){$mesnombre = 'Diciembre';}
                        $mesactual = $mesnombre;
                        $anioactual = $row->anio;
                        ?>
                    <?php } ?>
                <span id="period"><strong>Vista general de valores móviles del periódo: <?php echo $mesactual." - ".$anioactual;?></strong></span>
                    </div>
                     <div id="select" class="col-sm-6">
                        <form class="form-inline" name="buscar_form" id="buscar_form">
                          <div class="form-group">
                            <label for="email">Mes:&nbsp;</label>
                            <select id="month" name="month" class="form-control">
                                <?php foreach ($meses as $i) {
                                        $mes = date('m');
                                        if($mes == $i->MesesCodigo){
                                        echo '<option value="'. $i->MesesCodigo .'" selected>'. $i->MesesNombre .'</option>';
                                        }else{
                                            echo '<option value="'. $i->MesesCodigo .'">'. $i->MesesNombre .'</option>';
                                        }
                                } ?>
                            </select>
                          </div>
                          <div class="form-group">
                            <label for="pwd">&nbsp;Año:&nbsp;</label>
                            <select id="year" name="year" class="form-control">
                                <option value="2020">2020</option>
                                <option value="2019">2019</option>
                                <option value="2018">2018</option>
                            </select>
                          </div>
                          &nbsp;&nbsp;&nbsp;&nbsp;
                          <button type="submit" class="btn btn-default" id="buscar_btn">Seleccionar</button>

                        </form> 
                     </div>
                    <div class="col-sm-12">
                    <table class="table table-striped table-hover" id="valor_tb">
                     <thead>   
                      <tr>  
                        <th>N° Móvil</th>
                        <th>Valor</th>
                        <th>Acciones</th>
                      </tr>
                     </thead>
                     <tbody>
                         <?php foreach($valores as $row){ ?>
                          <?php $cod = $row->id; ?>
                        <tr>
                            <td><?= $row->id_movil; ?></td>
                            <td>$<?= number_format($row->valor_mes, 0, ',', '.'); ?></td>
                            <td><a href="#editValModal" class="edit" onClick="selValor('<?php echo $row->id."','".$row->id_movil."','".$row->valor_mes."','".$row->mes."','".$row->anio; ?>'); chupalo('ancla');" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Editar">&#xE254;</i></a>
                            <a href="#deleteModal" class="delete" onClick="selValorDel('<?php echo $cod; ?>'); chupalo('ancla');" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Eliminar">&#xE872;</i></a></td>
                        <?php } ?>     
                        </tr>
                     </tbody>   
                    </table>
                </div>
                
        </div>
</div>
<!-- Modal de Ingresos -->
    <div id="valores" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form name="valores_form" id="valores_form">
                    <div class="modal-header">                      
                        <h4 class="modal-title">Asignar Valor a Móvil</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">                                       
                        <div class="form-group">
                            <!-- <input type="hidden" name="cod" id="cod" required> -->
                        </div>
                        <div class="form-group">
                            <label for="sel1">Móvil</label>
                          <select id="mov" name="mov" class="form-control">
                                <?php foreach ($moviles as $i) {
                                    echo '<option value="'. $i->MovilNumero .'">'. $i->MovilNumero .'</option>';
                                } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="sel1">Mes</label>
                          <select id="mes" name="mes" class="form-control">
                                <?php foreach ($meses as $i) {
                                        $mes = date('m');
                                        if($mes == $i->MesesCodigo){
                                        echo '<option value="'. $i->MesesCodigo .'" selected>'. $i->MesesNombre .'</option>';
                                        }else{
                                            echo '<option value="'. $i->MesesCodigo .'">'. $i->MesesNombre .'</option>';
                                        }
                                } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="sel1">Año</label>
                          <select id="ano" name="ano" class="form-control">
                                <option value="2020">2020</option>
                                <option value="2019">2019</option>
                                <option value="2018">2018</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Valor Mes</label>
                            <input type="text" class="form-control" name="valor" id="valor" placeholder ="$" required>
                        </div>            
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
                        <input type="submit" class="btn btn-success" id="guardar_btn" value="Guardar">
                    </div>
                </form>
            </div>
        </div>
    </div>
<!-- Fin Modal de Ingresos -->
<!-- Editar valores -->
 <div id="editValModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form name="editar_form" id="editar_form">
                    <div class="modal-header">                      
                        <h4 class="modal-title">Editar Valores</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="hidden" class="form-control" name="co" id="co">
                        </div>                    
                        <div class="form-group">
                            <label>Móvil</label>
                            <!-- <input type="text" class="form-control" name="mo" id="mo"> -->
                            <select id="mo" name="mo" class="form-control">
                                <?php foreach ($moviles as $i) {
                                    echo '<option value="'. $i->MovilNumero .'">'. $i->MovilNumero .'</option>';
                                } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Mes</label>
                            <input type="text" class="form-control" name="me" id="me" disabled>
                        </div>
                        <div class="form-group">
                            <label>Año</label>
                            <input type="text" class="form-control" name="an" id="an" disabled>
                        </div>
                        <div class="form-group">
                            <label>Valor Mes</label>
                            <input type="text" class="form-control" name="va" id="va">
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
<!-- fin edicion -->
<!-- Anular Modal HTML -->
    <div id="deleteModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form name="delete_form" id="delete_form">
                    <div class="modal-header">                      
                        <h4 class="modal-title">Eliminar Asignación de Valor</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="idt" id="idt">                  
                        <p>¿Está seguro que desea eliminar este valor?</p>
                        <p class="text-warning"><small><!-- Esta acción no se puede deshacer. --></small></p>
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
                        <input type="submit" class="btn btn-danger" id="delete_btn" value="Eliminar">
                    </div>
                </form>
            </div>
        </div>
    </div>
<!-- Fin Anular Modal -->      
<!-- Excel Modal HTML -->
    <div id="excel" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">                      
                    <h4 class="modal-title">Eliminar Asignación de Valor</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                    <div class="modal-body">
                        <table class="table table-striped table-hover" id="movil_tb">
                            <thead>
                                <tr>
                                    <th>Movil</th>
                                    <th>mes</th>
                                    <th>año</th>
                                    <th>Valor</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($anual as $row){ ?>
                                    <?php

                                    $valor1 = $row->valor_mes;
                                    $valor2 = number_format($valor1, 0, '', '.');

                                    ?>
                                <tr>
                                    <td><?= $row->id_movil;?></td>
                                    <td><?= $row->mes;?></td>
                                    <td><?= $row->anio;?></td>
                                    <td>$<?= $valor2;?></td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
                    <input type="submit" class="btn btn-danger" id="delete_btn" value="Eliminar">
                </div>
            </div>
        </div>
    </div>
<!-- Fin Anular Modal -->    
    <script>
        function selValor(cod,mov,val,mes,ano){
            $('#co').val(cod);
            $('#mo').val(mov);
            $('#me').val(mes);
            $('#an').val(ano);
            $('#va').val(val);
            console.log(cod);
        }
        function selValorDel(cod){
            $('#idt').val(cod);
            console.log(cod);
        }
    $(document).ready(function(){
            //  guardar nuevo ingreso
            $("#guardar_btn").click(function(e){
                //alert("Hola");
                e.preventDefault();
                        var datax = $('#valores_form').serializeArray();
                        $.each(datax, function(i, field){
                            console.log("contenido del form = "+ field.name + ":" + field.value + " ");
                        });
                        //console.log($('#rut').val());
                           $.ajax({
                                   data: datax,    // En data se puede utilizar un objeto JSON, un array o un query string
                                   type: "POST",   //Cambiar a type: POST si necesario
                                   dataType: "json",  // Formato de datos que se espera en la respuesta
                                   url: "<?=base_url();?>Valor/guardar",  // URL a la que se enviará la solicitud Ajax
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
                            $('#valores').hide();
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
                                   url: "<?=base_url();?>Valor/actualiza",  // URL a la que se enviará la solicitud Ajax
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
                            $('#editValModal').hide();
                            location.reload();
                        });
            //  envia los nuevos datos para actualizar
            $("#delete_btn").click(function(e){
                //alert("Hola");
                e.preventDefault();
                        var datax = $('#delete_form').serializeArray();
                        $.each(datax, function(i, field){
                            console.log("contenido del form = "+ field.name + ":" + field.value + " ");
                        });
                        console.log($('#idt').val());
                           $.ajax({
                                   data: datax,    // En data se puede utilizar un objeto JSON, un array o un query string
                                   type: "POST",   //Cambiar a type: POST si necesario
                                   dataType: "json",  // Formato de datos que se espera en la respuesta
                                   url: "<?=base_url();?>Valor/elimina",  // URL a la que se enviará la solicitud Ajax
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
                            $('#deleteModal').hide();
                             location.reload();
                        });
            //Búsqueda
            $("#buscar_btn").click(function(e){
                e.preventDefault();
                        var datax = $('#buscar_form').serializeArray();
                        $("#valor_tb tbody").html('');
                        $("#period").html('');
                        $.each(datax, function(i, field){
                            console.log("contenido del form = "+ field.name + ":" + field.value + " ");
                        });
                           $.ajax({
                                   data: datax,    // En data se puede utilizar un objeto JSON, un array o un query string
                                   type: "POST",   //Cambiar a type: POST si necesario
                                   dataType: "json",  // Formato de datos que se espera en la respuesta
                                   url: "<?=base_url();?>Valor/buscar",  // URL a la que se enviará la solicitud Ajax
                            })
                           .done(function( data, textStatus, jqXHR ) {
                                if ( console && console.log ) {
                                    console.log(" data msg : "+ data.msg 
                                    + " \n textStatus : " + textStatus
                                    + " \n jqXHR.status : " + jqXHR.status );
                                }
                                        //Aca formateo la respuesta
                                        var output = '';
                                        $.each(data, function(i,item){
                                            output +=
                                            '<tr>' +
                                                '<td>'+item.id_movil+'</td>'+
                                                '<td>$'+new Intl.NumberFormat("de-DE").format(item.valor_mes)+'</td>'+
                                                '<td><a href="#editValModal" class="edit" onClick="selValor(\''+item.id+'\',\''+item.id_movil+'\',\''+item.valor_mes+'\',\''+item.mes+'\',\''+item.anio+'\'); chupalo(\''+ancla+'\');" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Editar">&#xE254;</i></a>'+
                                                '<a href="#deleteModal" class="delete" onClick="selValorDel(\''+item.id+'\') chupalo(\''+ancla+'\');" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Eliminar">&#xE872;</i></a>'+
                                                '</td>'+
                                            '</tr>';
                                        });
                                        $("#valor_tb tbody").append(output);
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

    });
    </script>