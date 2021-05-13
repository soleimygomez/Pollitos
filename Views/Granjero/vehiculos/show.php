
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
		</table>
</div>










