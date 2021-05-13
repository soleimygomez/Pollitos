 <h1> Lista de Visitantes </h1>

       <div class="table-responsive">
       <table id="tablaSus" class="display" style="width:100%;background-color: #fff; width: 70%;margin-left: 80px; border-radius:10px; opacity: 0.8">
            <thead>
                <tr>
                    
                    
                    <th>Nombre</th>
                    <th>Documento</th>
                    <th>Fecha Ingreso</th>
                    <th>Accion</th>
                </tr>
                <tbody>
                    <?php foreach ($listaVisitantes as$visitantes) {?>

                    
                    <tr>
                        <td> <?php echo $visitantes->getNombre();   ?> </td>
                        <td> <?php echo $visitantes->getCedula();   ?> </td>
                        <td> <?php echo $visitantes->getFecha_ingreso() ?> </td>
                        <td>
                            <a class="btn btn-success" href="?controller=visitantes&&action=updateshow&&cedula=<?php 
                                echo $visitantes->getCedula() ?>">Editar
                            </a>

                            <a class="btn btn-danger"  href="?controller=visitantes&&action=delete&&cedula=<?php 
                                echo $visitantes->getCedula() ?>">Eliminar
                            </a>
                         </td>
                    </tr>
                    <?php } ?>
                </tbody>

            </thead>


                             <input type="submit" class="btn btn-reporte mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect" value="Reporte de Vistitantes " onclick="document.getElementById('modal-reguistroU').style.display='block'" style="margin-left:30%;">
                  <hr>
        </table>

        <form  action="?controller=pollito&&action=save" method="POST" class="from-registro">
         <div id="modal-reguistroU" class="w3-modal">
           <div class="w3-modal-content w3-animate-top w3-card-4">
              <header class="w3-container headerModal"> 
                <span onclick="document.getElementById('modal-reguistroU').style.display='none'" 
                class="w3-button w3-display-topright">&times;</span>
                <h2 class="modal-title text-center all-tittles">Reportes de Visitantes</h2>
              </header>
             <div>
                <table border="4" >
                    
                        <td style="padding: 3%">
                           <form  action="../Reportes/reporteIdentificacionTipo.php" method="POST" >
                                <p> <b>Reporte por Identificacion y tipo de visitante</b></p>
                                <input type="text" name="cedula" placeholder="Identificacion" required="" size="7">
                                <input type="box" name="tipo" placeholder="Tipo" required="" size="5">
                                <input type="date" name="desdefecha" placeholder="desde fecha" required=""   
                                                            style="height: 53px; width: 150px; ">
                                <input type="date" name="hastafecha" placeholder="hasta fecha" required=""
                                                              style="height: 53px; width: 150px; ">
                                <input type="submit" name="" value="Generar Reporte">
                             </form>
                        </td>

                    
                    
                        <td style="padding: 3%">
                            <p><b>Reporte por Identificacion</b></p>
                               <form  action="../Reportes/reporteidentiVehiculo.php" method="POST" >
                                  <input type="text" name="cedula" placeholder="Cedula" required="" size="7">
                                  <input type="date" name="desdefecha" placeholder="desde fecha" required=""
                                                              style="height: 53px; width: 150px; ">
                                  <input type="date" name="hastafecha" placeholder="hasta fecha" required=""
                                                                style="height: 53px; width: 150px; ">
                                  <input type="submit" name="" value="Generar Reporte">
                               </form>
                        </td>
                        <tr>
                            <td style="padding: 3%">
                              <p><b>Reporte por Tipo de visitante</b></p> 
                                 <form  action="../Reportes/reporteTipo.php" method="POST" >
                                     <input type="box" name="tipo" placeholder="Tipo" required="">
                                    
                                    <input type="date" name="desdefecha" placeholder="desde fecha" required=""
                                                                          style="height: 53px; width: 150px; ">
                                    <input type="date" name="hastafecha" placeholder="hasta fecha" required=""
                                                                        style="height: 53px; width: 150px; ">
                                     <input type="submit" name="" value="Generar Reporte">
                                   </form>
                            </td>
                            <td style="padding: 3%">
                                <form  action="../Reportes/reporteFV.php" method="POST" >     
                                  <p><b>Reporte por Fechas</b></p>
                                  <input type="date" name="desdefecha" placeholder="desde fecha" required=""
                                                                            style="height: 53px; width: 150px; ">
                                  <input type="date" name="hastafecha" placeholder="hasta fecha" required=""
                                                                             style="height: 53px; width: 150px; ">
                                  <input type="submit" name="" value="Generar Reporte">
                                 </form>

                            </td>
                        </tr>

                </table> 

            
          </div>
       </form>
    </div>





