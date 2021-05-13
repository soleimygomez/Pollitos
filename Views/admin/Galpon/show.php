
 <h1> Lista de Galpones </h1>

       <div class="table-responsive">
       <table id="tablaSus" class="display" style="width:100%;background-color: #fff; width: 70%;margin-left: 80px; border-radius:10px; opacity: 0.8">
            <thead>
                <tr>
                    <th>id</th>
					
					<th>Cantidad de aves</th>
					<th>Linea Genetica</th>
					<th>Granjero</th>
                    <th>Accion</th>
                </tr>
                <tbody>
                    <?php foreach ($listaCriadero as$galpon) {?>

                    
                    <tr>
                        <td> <?php echo $galpon->getIdCriadero();   ?> </td>
                        <td> <?php echo $galpon->getNumeroAves();   ?> </td>
                        <td> <?php echo $galpon->getLineaGenetica() ?> </td>
                       	<td> <?php echo $galpon->getId_granjero();  ?> </td>
                        <td>
                            <a class="btn btn-success" href="?controller=galpon&&action=updateshow&&idCriadero=<?php 
                                echo $galpon->getIdCriadero() ?>">Editar
                            </a>

                            <a class="btn btn-danger"  href="?controller=galpon&&action=delete&&idCriadero=<?php 
                                echo $galpon->getIdCriadero() ?>">Eliminar
                            </a>
                         </td>
                    </tr>
                    <?php } ?>
                </tbody>

            </thead>
        </table>

    </div>  
<div>






