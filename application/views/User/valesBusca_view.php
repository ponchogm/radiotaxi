<div class="container">
        <div class="table-wrapper">
            <div class="table-title">
               <div class="row">
                    <div class="col-sm-4">
                        <h2>Buscar <b>Vales</b></h2>
                    </div>
                    <div class="col-sm-8">
                        <form method="POST"><span><input type="text" style="color: #a0a0a0;" class="form-control" name="buscar" id="buscar" placeholder="Ingrese número de vale a buscar"></span></form>                                
                    </div>
                </div>
            </div>
            <div id="resultados"></div>
        </div>    
</div>
    <script>
    $(document).ready(function(){     
        $("#buscar").change(function(e){
            e.preventDefault();
            //alert($('select[id=movilTalonario]').val());
            var datax = $('#buscar').val();
            console.log(datax);
                            $.ajax({
                                   data: { 'datos' : datax },    // De esta manera paso cualquier valor
                                   type: "POST",   //Cambiar a type: POST si necesario
                                   dataType: "json",  // Formato de datos que se espera en la respuesta
                                   url: "<?=base_url();?>Vale/buscarVale",  // URL a la que se enviará la solicitud Ajax
                            })
                             .done(function( data, textStatus, jqXHR ) {
                                
                                console.log(data.id);
                                console.log(data.id_talonarioMovil);
                                console.log(data.numero_vale);
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