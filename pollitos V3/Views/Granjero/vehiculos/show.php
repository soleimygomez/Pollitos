<h1> Listado de vehiculos </h1>


 <div class="table-responsive table-hover">
 <table id="tablaSus" class="display" style="width:100%;background-color: #fff; width: 70%;margin-left: 80px; border-radius:10px; opacity: 0.8">
        <thead >
            <tr>
                <th>Placa</th>
                <th>Modelo</th>
                <th>Propietario</th>
                <th>Documento</th>
                <th>Fecha ingreso</th>
                <TH>Accion</TH>
                
            </tr> 
        </thead>
        <tbody>
					<?php foreach ($listaVehiculos as$vehiculos) {?>

					
					<tr>
						<td><?php echo $vehiculos->getPlaca(); ?></td>
						<td><?php echo $vehiculos->getModelo(); ?></td>
						<td><?php echo $vehiculos->getPropietario(); ?></td>
						<td><?php echo $vehiculos->getDocumento(); ?></td>
						<td><?php echo $vehiculos->getFecha(); ?></td>
						<td>
							<a class="btn btn-success" href="?controller=vehiculos&&action=updateshow&&placa=<?php 
									echo $vehiculos->getPlaca() ?>">
                                    Editar
                            </a>| 
                            <a class="btn btn-danger" href="?controller=vehiculos&&action=delete&&placa=<?php 
                            		echo $vehiculos->getPlaca() ?>">
                                      Eliminar
                            </a> 

						</td>
					</tr>
					<?php } ?>
				</tbody>

			</thead>


			 <input type="submit" class="btn btn-reporte mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect" value="Reporte de vehiculos " onclick="document.getElementById('modal-reguistroU').style.display='block'" style="margin-left:30%;">
       <hr>

                           

		</table>

         <div id="modal-reguistroU" class="w3-modal">
           <div class="w3-modal-content w3-animate-top w3-card-4">
              <header class="w3-container headerModal"> 
                <span onclick="document.getElementById('modal-reguistroU').style.display='none'" 
                class="w3-button w3-display-topright">&times;</span>
                <h2 class="modal-title text-center all-tittles">Reportes de Vehiculos</h2>
              </header>
             <div>
                <table border="4" >
                    
                        <td style="padding: 3%">
                          <form  action="../Reportes/reportePlacaIdentificacion.php" method="POST" >
                              <p> <b>Reporte por Placa e Identificacion</b></p>
                              <input type="text" name="placa" placeholder="Placa" required="" size="7">
                              <input type="text" name="cedula" placeholder="cedula" required="" size="5">
                              <input type="date" name="desdefecha" placeholder="desde fecha" required=""  
                                                  style="height: 53px; width: 150px; ">
                              <input type="date" name="hastafecha" placeholder="hasta fecha" required=""
                                                   style="height: 53px; ">
                              <input type="submit" name="" value="Generar Reporte">
                          </form>
                        </td>


                    
                    
                        <td style="padding: 3%">
                          <form  action="../Reportes/reportePlaca.php" method="POST">
                            <p><b>Reporte por Placa</b></p>
                            <input type="text" name="placa" placeholder="Placa" required="" size="7">
                            <input type="date" name="desdefecha" placeholder="desde fecha" required=""  
                                                                 style="height: 53px; width: 150px;">
                            <input type="date" name="hastafecha" placeholder="hasta fecha" required="" 
                                                           style="height: 53px; width: 150px; ">
                            <input type="submit" name="" value="Generar Reporte">
                            </input>
                            </form >
                        </td>
                        <tr>
                            <td style="padding: 3%">
                             <form  action="../Reportes/reporteIdentificacion.php" method="POST">
                              <p><b>Reporte por Identificacion</b></p>  
                             <input type="text" name="cedula" placeholder="Cedula" required="">
                            
                            <input type="date" name="desdefecha" placeholder="desde fecha" required="" 
                                                             style="height: 53px; width: 150px; ">
                            <input type="date" name="hastafecha" placeholder="hasta fecha" required="" 
                                                               style="height: 53px; width: 150px; ">
                             <input type="submit" name="" value="Generar Reporte">
                           </form>
                            </td>

                          

                             <td style="padding: 3%">
                                <form action="../Reportes/reporteFechaVehiculo.php"  method="POST">
                                  <p> <b>Reporte por Fechas</b></p>
                                  
                                  <input type="date" name="desdefecha" placeholder="desde fecha" required="" 
                                                             style="height: 53px; width: 150px;">
                                  <input type="date" name="hastafecha" placeholder="hasta fecha" required=""
                                                               style="height: 53px; width: 150px;">
                                  <input type="submit" name="" value="Generar ReporteLm"> 
                               </form>
                            </td>

                        </tr>

                </table> 

            
          </div>
      

</div>








