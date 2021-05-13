
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
                            <a class="btn btn-success" href="?controller=visitantes&&action=updateshow&&id=<?php 
                                echo $visitantes->getId() ?>">Editar
                            </a>

                            <a class="btn btn-danger"  href="?controller=visitantes&&action=delete&&id=<?php 
                                echo $visitantes->getId() ?>">Eliminar
                            </a>
                         </td>
                    </tr>
                    <?php } ?>
                </tbody>

            </thead>
        </table>

    </div>  
<div>






