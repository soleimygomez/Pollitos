


<div>
  <form action="?controller=visitantes&&action=update" method="POST" class="from-registro" style="display: inline;">
    <H2 class="from-titulo"> <a href="ir-tabla.php" class="btn btn-info" 
                            style="float: left; 
                                   background: white;
                                   color: black;                  
                                   ">volver</a> Actualizar datos </H2>
    <div class="inputs">

        <div>

        <input type="text" name="placa" required="" class="N" value="<?php echo $vehiculos->getNombre(); ?>">

        <input type="text" name="modelo"  required="" class="N" value="<?php echo $vehiculos->getCedula(); ?>">


        <input type="text" name="propietario"  required="" class="N" value="<?php echo $vehiculos->getFecha_ingreso(); ?>">
        
      s

     
        <input type="submit" value="Registrar" class="btn-registroG" style="margin-left: 38%;">
    </div>
    </div>

  </form>
</div>
