<div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h2>Nuevo <b>Cliente</b></h2>
                    </div>
                </div>
            </div>
             <div class="row">
                 <form name="nuevo_form" id="nuevo_form">
                    <div class="col-sm-6">              
                        <div class="form-group">
                            <label>Rut Cliente</label>
                            <input type="text" class="form-control" name="rut" id="rut" required>
                        </div>
                        <div class="form-group">
                            <label>Nombres</label>
                            <input type="text" class="form-control" name="nombres" id="nombres" required>
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
                            <label>Dirección</label>
                            <input type="text" class="form-control" name="dir" id="dir" required>
                        </div>
                        <div class="form-group">
                            <label>Teléfono Casa</label>
                            <input type="text" class="form-control" name="telcasa" id="telcasa" required>
                        </div>
                        <div class="form-group">
                            <label>Teléfono Trabajo</label>
                            <input type="text" class="form-control" name="telpega" id="telpega" required>
                        </div>                  
                    </div>
                   
                    <div class="col-sm-6">
                        
                        <div class="form-group">
                            <label>Teléfono Celular</label>
                            <input type="text" class="form-control" name="telcel" id="telcel" required>
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
                            <input type="text" class="form-control" name="nac" id="nac" required>
                        </div>
                        <div class="form-group">
                            <label>Correo Electrónico</label>
                            <input type="text" class="form-control" name="email" id="email" required>
                        </div>
                        <div class="form-group">
                            <label>Clave Cliente</label>
                            <input type="password" class="form-control" name="clavecli" id="clavecli" required>
                        </div>
                        <div class="form-group">
                            <label>Número Cliente</label>
                            <input type="text" class="form-control" name="numcli" id="numcli" required>
                        </div>                    
                    </div>
                    <p>
                    <div class="modal-footer">
                            <input type="reset" class="btn btn-default" value="Borrar Todo">
                            <input type="submit" class="btn btn-success" id="nuevo_btn" value="Guardar datos de Cliente">
                    </div>
                </form>
                </div>
        </div>
    </div>
    <script>
    $(document).ready(function(){
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
    });
    </script>