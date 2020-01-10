<div class="container">
        <div class="table-wrapper">
            <div class="table-title">
               <div class="row">
                    <div class="col-sm-4">
                        <h2>Buscar <b>Vales</b></h2>
                        <?php
                        $rol = $this->session->userdata('USER_ROL');
                        $nombre = $this->session->userdata('USERNAME');
                        $apellido = $this->session->userdata('USER_AP');

                        echo 'Usuario: '.$nombre." ".$apellido;
                        ?>
                    </div>
                    <div class="col-sm-8">
                        <form method="POST"><span><input type="text" style="color: #a0a0a0;" class="form-control" name="buscar" id="buscar" placeholder="Ingrese número de vale a buscar"></span></form>                                
                    </div>
                </div>
            </div>
            <div id="resultados">
                                            <table class="table table-striped table-hover">
                                             <thead>
                                              <tr>
                                                 <th> Vale </th> 
                                                 <th> Rut Cliente </th> 
                                                 <th> Nombre </th> 
                                                 <th> Origen </th> 
                                                 <th> Destino </th> 
                                                 <th> Fecha </th> 
                                                 <th> Hora </th> 
                                                 <th> Valor </th> 
                                                 <!-- <th> Acciones </th>  -->
                                              </tr>
                                             </thead>
                                             <tbody>
                                               <tr>
                                                <?php foreach($vales as $row){ ?>
                                                <?php $nombre = $row->ClienteNombres." ".$row->ClienteApellidoPat; ?>   
                                                <td><?= $row->numero_vale;?></td>
                                                <td><?= $row->ClienteRut;?></td>
                                                <td><?= $nombre;?></td>
                                                <td><?= $row->origen;?></td>
                                                <td><?= $row->destino;?></td>
                                                <td><?= $row->fecha;?></td>
                                                <td><?= $row->hora;?></td>
                                                <td>$<?= $row->valor;?></td>
                                                <!-- <td><a href="#editEmployeeModal" class="edit" onClick="selChofer(\data.numero_vale\,\data.origen\,\data.destino\)" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Editar">&#xE254;</i></a>
                                                <a href="#deleteEmployeeModal" class="delete" onClick="selChoferDel(\data.id\)" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Eliminar">&#xE872;</i></a>
                                                </td> -->
                                            </tr>
                                             <?php } ?>
                                            </tbody>
                                            </table>
            </div>
        </div>    
</div>
    <script>
    $(document).ready(function(){     
        $("#buscar").keypress(function(e){
            if(e.which == 13){ //Con esto capturo el enter en el campo de datos
            e.preventDefault();
            var datax = $('#buscar').val();
            console.log(datax);
                            $.ajax({
                                   data: { 'datos' : datax },    // De esta manera paso cualquier valor
                                   type: "POST",   //Cambiar a type: POST si necesario
                                   dataType: "json",  // Formato de datos que se espera en la respuesta
                                   url: "<?=base_url();?>Vale/buscarVale",  // URL a la que se enviará la solicitud Ajax
                            })
                             .done(function( data, textStatus, jqXHR ) {
                                
                                console.log(data.Periodo);
                                console.log(data.origen);
                                console.log(data.destino);
                                var output = '';
                                            output +=
                                            '<span><h5>Resultados de la búsqueda</h5></span>' +
                                            '<table class="table table-striped table-hover">' +
                                             '<thead>'+
                                              '<tr>' +
                                                 '<th> Vale </th>' +
                                                 '<th> Rut Cliente </th>' +
                                                 '<th> Nombre </th>' +
                                                 '<th> Origen </th>' +
                                                 '<th> Destino </th>' +
                                                 '<th> Fecha </th>' +
                                                 '<th> Hora </th>' +
                                                 '<th> Valor </th>' +
                                                 '<th> Acciones </th>' +
                                              '</tr>'+
                                             '</thead>'+
                                             '<tbody>'+
                                               '<tr>'+   
                                                '<td>'+data.numero_vale+'</td>'+
                                                '<td>'+data.ClienteRut+'</td>'+
                                                '<td>'+data.ClienteNombres+' '+data.ClienteApellidoPat+'</td>'+
                                                '<td>'+data.origen+'</td>'+
                                                '<td>'+data.destino+'</td>'+
                                                '<td>'+data.fecha+'</td>'+
                                                '<td>'+data.hora+'</td>'+
                                                '<td>$'+data.valor+'</td>'+
                                                '<td><a href="#editEmployeeModal" class="edit" onClick="selChofer(\''+data.numero_vale+'\',\''+data.origen+'\',\''+data.destino+'\')" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Editar">&#xE254;</i></a>'+
                                                '<a href="#deleteEmployeeModal" class="delete" onClick="selChoferDel(\''+data.id+'\')" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Eliminar">&#xE872;</i></a>'+
                                                '</td>'+
                                            '</tr>'+
                                            '</tbody>'+
                                            '</table>';
                                document.getElementById('resultados').innerHTML = output;
                                        
                            })
                            .fail(function( jqXHR, textStatus, errorThrown ) {
                                    if ( console && console.log ) {
                                        console.log( " La solicitud ha fallado,  textStatus : " +  textStatus 
                                            + " \n errorThrown : "+ errorThrown
                                            + " \n textStatus : " + textStatus
                                            + " \n jqXHR.status : " + jqXHR.status );
                                    }
                            }); 
                        }
            });
    });        
    </script>