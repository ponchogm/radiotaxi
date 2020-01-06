<div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h2>Editar datos <b>Empresa</b></h2>
                        <?php
                        $rol = $this->session->userdata('USER_ROL');
                        $nombre = $this->session->userdata('USERNAME');
                        $apellido = $this->session->userdata('USER_AP');

                        echo 'Usuario: '.$nombre." ".$apellido;
                        ?>
                    </div>
                </div>
            </div>
             <div class="row">
                 <form name="nuevo_form" id="nuevo_form" action="<?=base_url("Empresa/actualiza");?>" method="post">
                    <div class="col-sm-6">
                    <?php foreach($empresa as $row){ ?>
                        <input type="hidden" name="cod" id="cod" value="<?= $row->ClienteCodigo ?>">            
                        <div class="form-group">
                            <label>Rut Empresa</label>
                            <input type="text" class="form-control" name="rut" id="rut" value="<?= $row->ClienteRut ?>">
                        </div>
                        <div class="form-group">
                            <label>Razón Social</label>
                            <input type="text" class="form-control" name="rsoc" id="rsoc" value="<?= $row->ClienteNombres ?>">
                        </div>
                        <div class="form-group">
                            <label>Dirección</label>
                            <input type="text" class="form-control" name="dir" id="dir" value="<?= $row->ClienteDireccion ?>">
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
                            <input type="text" class="form-control" name="fono" id="fono" value="<?= $row->ClienteFonoCasa ?>">
                        </div>                
                    </div>
                   
                    <div class="col-sm-6">
                        
                        <div class="form-group">
                            <label>Correo Electrónico</label>
                            <input type="text" class="form-control" name="email" id="email" value="<?= $row->ClienteEmail ?>">
                        </div>
                        <div class="form-group">
                            <label>Rut R.L.</label>
                            <input type="text" class="form-control" name="rutrl" id="rutrl" value="<?= $row->ClienteEmpRLRut ?>">
                        </div>                  
                        <div class="form-group">
                            <label>Nombre R.L.</label>
                            <input type="text" class="form-control" name="nomrl" id="nomrl" value="<?= $row->ClienteEmpRLNombres ?>">
                        </div>
                        <div class="form-group">
                            <label>Clave Cliente</label>
                            <input type="password" class="form-control" name="clave" id="clave" value="<?= $row->ClienteClave ?>">
                        </div>
                        <div class="form-group">
                            <label>Número Cliente</label>
                            <input type="text" class="form-control" name="num" id="num" value="<?= $row->ClienteNumero ?>">
                        </div>                    
                    </div>
                    <p>
                    <div class="modal-footer">
                            <a class="btn btn-warning btn-sm" href=<?=base_url("Empresa/mostrar")?>>Volver a Empresas</a>
                            <input type="submit" class="btn btn-success btn-sm" value="Actualizar datos de Empresa">
                    </div>
                    <?php } ?>
                </form>
                </div>
        </div>
    </div>

    <script>
        document.ready = document.getElementById("com").value = '<?=$row->ComunaCodigo?>'; // con esto seteo el valor de la comuna en el option XD ;D
    </script>
    