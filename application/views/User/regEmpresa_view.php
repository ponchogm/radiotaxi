<div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h2>Nueva <b>Empresa</b></h2>
                    </div>
                </div>
            </div>
             <div class="row">
                 <form name="nuevo_form" id="nuevo_form">
                    <div class="col-sm-6">              
                        <div class="form-group">
                            <label>Rut Empresa</label>
                            <input type="text" class="form-control" name="rut" id="rut" required>
                        </div>
                        <div class="form-group">
                            <label>Razón Social</label>
                            <input type="text" class="form-control" name="rsoc" id="rsoc" required>
                        </div>
                        <div class="form-group">
                            <label>Dirección</label>
                            <input type="text" class="form-control" name="dir" id="dir" required>
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
                            <label>Teléfono</label>
                            <input type="text" class="form-control" name="fono" id="fono" required>
                        </div>
                    </div>
                   
                    <div class="col-sm-6">    
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" class="form-control" name="email" id="email" required>
                        </div>
                        <div class="form-group">
                            <label>Rut R.L.</label>
                            <input type="text" class="form-control" name="rutrl" id="rutrl" required>
                        </div>                  
                        <div class="form-group">
                            <label>Nombre R.L.</label>
                            <input type="text" class="form-control" name="nomrl" id="nomrl" required>
                        </div>
                        <div class="form-group">
                            <label>Número</label>
                            <input type="text" class="form-control" name="num" id="num" required>
                        </div>
                        <div class="form-group">
                            <label>Clave</label>
                            <input type="password" class="form-control" name="clave" id="clave" required>
                        </div>                   
                    </div>
                    <p>
                    <div class="modal-footer">
                            <input type="reset" class="btn btn-default" value="Borrar Todo">
                            <input type="submit" class="btn btn-success" id="nuevo_btn" value="Guardar datos de Empresa">
                    </div>
                </form>
                </div>
        </div>
</div>
    <script>
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
                                   url: "<?=base_url();?>Empresa/ingresa",  // URL a la que se enviará la solicitud Ajax
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
                            alert("Empresa Ingresada Exitosamente!");
                            location.href="<?=base_url();?>Empresa/mostrar";
                        });
    });
    </script>