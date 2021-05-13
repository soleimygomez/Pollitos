
<div>
<form action="?controller=granja&&action=update" method="POST" class="from-registro" style="display: inline;" >
        <H2 class="from-titulo"> 
            <a href="ir-tabla.php" class="btn btn-info" 
                            style="float: left; 
                                   background: white;
                                   color: black;                  
                                   ">volver</a> Actualizar Datos de Granja </H2>
        <div class="inputs">
            
            <input type="text" name="idGranja"
                     value="<?php echo $granja->getIdGranja() ?>" 
                      placeholder="id De la Granja" 
                       required="" class="N">

             <input type="text" name="nombre" 
                    value="<?php echo $granja->getNombre() ?>"
                     placeholder="Nombre De la Granja" 
                      required="" class="N">

            <input type="text" name="direccion" 
                    value="<?php echo $granja->getDireccion(); ?>"
                      placeholder="Direccion" 
                       required="" class="N">

             <input type="text" name="telefono" 
                     value="<?php echo $granja->getTelefono(); ?>"
                      placeholder="TelefonoG"
                       required="" class="N">

           <input type="text" name="cantidadhectareas" 
                     value="<?php echo $granja->getCantidadhectareas(); ?>"
                        placeholder="Cantidad de Hectareas" 
                         required="" class="N">
         
             
         
   <input type="submit" value="Registrar" class="btn-registroG" style="margin-left: 53%;">

        </div>

 </form>
