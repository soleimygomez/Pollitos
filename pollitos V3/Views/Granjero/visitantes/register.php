
<div>
    <form action="?controller=visitantes&&action=save" method="POST" class="from-registro" style="display: inline;">
    <H2 class="from-titulo"> Registro Visitantes </H2>
    <div class="inputs">
       
        

        <input type="text" name="nombre" placeholder="Nombre Completo" required="" class="N">

        <input type="text" name="cedula" placeholder="Documento ID" required="" class="N" style="width: 128px;">
        <input type="text" name="tipo" placeholder="Tipo" required="" class="N" style="width: 100px;">
        <?php $fcha = date("Y-m-d");?>
        <input type="date" name="fecha_ingreso"  value="<?php echo $fcha;?>"  required="" class="N"
                                 style="height: 53px; width: 160px; "> 

        <input type="submit" value="Registrar" class="btn-registroG" style="width: 140px;" >

        
      
    </div>

     </form>
</div> 