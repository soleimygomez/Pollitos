


<div>
  <form action="?controller=vehiculos&&action=update" method="POST" class="from-registro" style="display: inline;">
    <H2 class="from-titulo"> <a href="ir-tabla.php" class="btn btn-info" 
                            style="float: left; 
                                   background: white;
                                   color: black;                  
                                   ">volver</a> Actualizar datos </H2>
    <div class="inputs">

        <div>

        <input type="text" name="placa" required="" class="N" value="<?php echo $vehiculos->getPlaca(); ?>">

        <input type="text" name="modelo"  required="" class="N" value="<?php echo $vehiculos->getModelo(); ?>">


        <input type="text" name="propietario"  required="" class="N" value="<?php echo $vehiculos->getModelo(); ?>">
        
        <input type="text" name="documento" required="" class="N" value="<?php echo $vehiculos->getDocumento(); ?>">

        
        <input type="date" name="fecha"  class="N" value="<?php echo $vehiculos->getFecha(); ?>">

     
        <input type="submit" value="Registrar" class="btn-registroG" style="margin-left: 38%;">
    </div>
    </div>

  </form>
</div>
