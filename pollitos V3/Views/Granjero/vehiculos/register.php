
<div>
	<form action="?controller=vehiculos&&action=save" method="POST" class="from-registro" style="display: inline;">
		<H2 class="from-titulo"> Registrar vehiculos </H2>
		<div class="inputs">

		    <div>

		    <input type="text" name="placa" placeholder="Placa del Vehiculo" required="" class="N">

		    <input type="text" name="modelo" placeholder="Modelo" required="" class="N">


		    <input type="text" name="propietario" placeholder="Nombre del propietario" required="" class="N">
		    
		    <input type="text" name="documento" placeholder="Cedula del propietario" required="" class="N">

		     <?php $fcha = date("Y-m-d");?>
		    
		    <input type="date" name="fecha" placeholder="fecha" value="<?php echo $fcha;?>"    class="N"  style="height: 53px; width: 170px;">

		 
		    <input type="submit" value="Registrar" class="btn-registroG" style="margin-left: 38%;">
		</div>
		</div>

	</form>
</div>