                <div id="pinta" class="col-sm-12">
                    <div id="fecha" class="col-sm-6">
                        <?php
                        //$dias = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
                        $meses1 = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
     
                        //echo $dias[date('w')]." ".date('d')." de ".$meses[date('n')-1]. " del ".date('Y') ;
                        //Salida: Viernes 24 de Febrero del 2012
                        ?>
                        Mes: <!-- <?php echo $meses1[date('n')-1]; ?> -->
                        <p>
                        Año: <!-- <?php echo date('Y'); ?> -->
                        <p>
                        <?php foreach($total_movil as $row){ ?>
                                    <?php 
                                        $totalmes = $row->TotalMovil; 
                                        echo "Valor total móviles $<strong>".number_format($totalmes, 0, ',', '.')."</strong>";
                                    ?>
                        <?php } ?>
                    </div>
                    <div id="select" class="col-sm-6">
                        <form class="form-inline" name="buscar_form" id="buscar_form">
                          <div class="form-group">
                            <label for="email">Mes:&nbsp;</label>
                            <select id="month" name="month" class="form-control">
                                <?php foreach ($meses as $i) {
                                        echo '<option value="'. $i->MesesCodigo .'">'. $i->MesesNombre .'</option>';
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
                    <table class="table table-striped table-hover" id="valor_tb">
                     <thead>   
                      <tr>  
                        <th>Fecha</th>
                        <th>Cuenta</th>
                        <th>Ingresos</th>
                        <th>Egresos</th>
                        <!-- <th>Acciones</th> -->
                      </tr>
                     </thead>
                     <tbody>
                     <?php foreach($ver as $row){ ?>
                        <?php
                            $ingreso = $row->ingreso;
                            $egreso = $row->egreso;

                            if($ingreso != ''){
                                $ingreso = $ingreso;
                                }else{
                                    $ingreso = 0;
                                }
                            if($egreso != ''){
                                $egreso = $egreso;
                                }else{
                                    $egreso = 0;
                                }
                        ?>
                        <tr>
                            <td><?= $row->fecha; ?></td>
                            <td><?= $row->cuenta; ?></td>
                            <td>$<?= number_format($ingreso, 0, ',', '.'); ?></td>
                            <td>$<?= number_format($egreso, 0, ',', '.'); ?></td>
                        </tr>
                        <?php } ?>
                        <tr>
                            <td></td>
                            <td><strong>Totales</strong></td>
                            <?php foreach($ingresos as $row){ ?>
                            <?php
                                $totin = $row->TotalIngresos;
                            ?>
                            <td class="success"><strong>$<?= number_format($totin, 0, ',', '.'); ?></strong></td>
                            <?php } ?>
                            <?php foreach($egresos as $row){ ?>
                            <?php
                                $toteg = $row->TotalEgresos;
                            ?>
                            <td class="danger"><strong>$<?= number_format($toteg, 0, ',', '.'); ?></strong></td>
                            <?php } ?>
                        </tr>
                        <tr>
                            <td></td>
                            <td><strong>Saldo</strong></td>
                            <?php
                                $saldo = ($totin + $totalmes) - $toteg;
                            ?>
                            <td class="warning"><strong>$<?= number_format($saldo, 0, ',', '.'); ?></strong></td>
                            <td></td>
                        </tr>
                     </tbody>   
                    </table>
                </div>




                         <table class="table table-striped table-hover" id="valor_tb">
                     <thead>   
                      <tr>  
                        <th>Fecha</th>
                        <th>Cuenta</th>
                        <th>Ingresos</th>
                        <th>Egresos</th>
                        <!-- <th>Acciones</th> -->
                      </tr>
                     </thead>
                     <tbody>
                     <?php foreach($ver_reg->result() as $row){ ?>
                        <?php
                            $ingreso = $row->ingreso;
                            $egreso = $row->egreso;

                            if($ingreso != ''){
                                $ingreso = $ingreso;
                                }else{
                                    $ingreso = 0;
                                }
                            if($egreso != ''){
                                $egreso = $egreso;
                                }else{
                                    $egreso = 0;
                                }
                        ?>
                        <tr>
                            <td><?= $row->fecha; ?></td>
                            <td><?= $row->cuenta; ?></td>
                            <td>$<?= number_format($ingreso, 0, ',', '.'); ?></td>
                            <td>$<?= number_format($egreso, 0, ',', '.'); ?></td>
                        </tr>
                        <?php } ?>
                        <tr>
                            <td></td>
                            <td><strong>Totales</strong></td>
                            <?php foreach($total_in as $row){ ?>
                            <?php
                                $totin = $row->TotalIngresos;
                            ?>
                            <td class="success"><strong>$<?= number_format($totin, 0, ',', '.'); ?></strong></td>
                            <?php } ?>
                            <?php foreach($total_eg as $row){ ?>
                            <?php
                                $toteg = $row->TotalEgresos;
                            ?>
                            <td class="danger"><strong>$<?= number_format($toteg, 0, ',', '.'); ?></strong></td>
                            <?php } ?>
                        </tr>
                        <tr>
                            <td></td>
                            <td><strong>Saldo</strong></td>
                            <?php
                                $saldo = ($totin + $totalmes) - $toteg;
                            ?>
                            <td class="warning"><strong>$<?= number_format($saldo, 0, ',', '.'); ?></strong></td>
                            <td></td>
                        </tr>
                     </tbody>   
                    </table>