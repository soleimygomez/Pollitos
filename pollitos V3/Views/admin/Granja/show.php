
 <h1> Lista de Granjas </h1>


 <div class="table-responsive table-hover">
 <table id="tablaSus" class="display" style="width:100%;background-color: #fff; width: 70%;margin-left: 80px; border-radius:10px; opacity: 0.8">
        <thead >
            <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>Direccion</th>
                <th>Telefono</th>
                <th>Cantidad de Hectareas</th>
                <TH>Accion</TH>
                
            </tr> 
        </thead>
        <tbody>
					<?php foreach ($listaGranja as$granja) {?>

					
					<tr>
						<td><?php echo $granja->getIdGranja(); ?></td>
						<td><?php echo $granja->getNombre(); ?></td>
						<td><?php echo $granja->getDireccion(); ?></td>
						<td><?php echo $granja->getTelefono(); ?></td>
						<td><?php echo $granja->getCantidadhectareas(); ?></td>
						<td>
							<a class="btn btn-success" href="?controller=granja&&action=updateshow&&idGranja=<?php 
									echo $granja->getIdGranja() ?>">
                                    Editar
                            </a>| 
                            <a class="btn btn-danger" href="?controller=granja&&action=delete&&idGranja=<?php 
                            		echo $granja->getIdGranja() ?>">
                                      Eliminar
                            </a> 

						</td>
					</tr>
					<?php } ?>
				</tbody>

			</thead>
		</table>
</div>










