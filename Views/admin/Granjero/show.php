
 <h1> Lista de Granjeros </h1>

       <div class="table-responsive table-hover">
       <table id="tablaSus" class="display" style="width:100%;background-color: #fff; width: 70%;margin-left: 80px; border-radius:10px; opacity: 0.8">
            <thead>
                <tr style="text-align: center;">
                    <th>id</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Direccion</th>
                    <th>Cedula</th>
                    <th>Telefono</th>
                    <th>Tipo</th>
                   
                    <th>Accion</th>
                </tr>
                <tbody>
                    <?php foreach ($listaGranjero as$granjero) { ?>

                    
                    <tr>
                        <td> <?php echo $granjero->getIdGranjero();  ?> </td>
                        <td> <?php echo $granjero->getNombre();      ?> </td>
                        <td> <?php echo $granjero->getApellido();    ?> </td>
                        <td> <?php echo $granjero->getDireccion();   ?> </td>
                        <td> <?php echo $granjero->getCedula();      ?> </td>
                        <td> <?php echo $granjero->getTelefono();    ?> </td>
                        <td> <?php echo $granjero->getTipo()?> 
                        </td>
                        
                        <td>
                            <a class="btn btn-success" href="?controller=granjero&&action=updateshow&&id_granjero=<?php echo $granjero->getIdGranjero() ?>">
                                    Editar
                            </a>| 
                            <a class="btn btn-danger" href="?controller=granjero&&action=delete&&id_granjero=<?php echo $granjero->getIdGranjero() ?>">
                                        Eliminar
                            </a> 
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>

            </thead>
        </table>

    </div>  
<div>






