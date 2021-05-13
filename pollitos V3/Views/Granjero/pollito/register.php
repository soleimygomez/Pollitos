<?php
  $mysqli = new mysqli('localhost','root','','pollitos');
?>


<div>
	
		<H2 class="from-titulo"> Administracion de Galpón</H2>
		<div class="inputs">
<div style="color: white;">
     <label style=" background: #d2221c; width: 225px; border-radius: 1em; text-align: center;"> <h3> id Galpón							</h3> </label> 
     <label style=" background: #d2221c; width: 225px; border-radius: 1em; text-align: center;"> <h3> Linea Genetica 				</h3> </label>
 	   <label style=" background: #d2221c; width: 225px; border-radius: 1em; text-align: center;"> <h3> Dias para sacrificio  </h3> </label> 
 		 <label style=" background: #d2221c; width: 225px; border-radius: 1em; text-align: center;"> <h3> Cantidad de Pollos 		</h3> </label>

		    <div style="color: black; text-align: center;">

		    	
          <?php
		          $query = $mysqli -> query ("SELECT * FROM galpon");
		          while ($valores = mysqli_fetch_array($query)) {

	echo ' <input type="text" name="" placeholder="Numero de Id Galpon" required="" class="N"  value="'.$valores["idCriadero"].'">';
	echo ' <input type="text" name="" placeholder="Linea Genetica" required="" class="N"  value="'.$valores["lineaGenetica"].'">';
	           }
        	?>

        	<input type="text" name="" placeholder="dias"  class="N" value="44">

<?php  
					$sql = "SELECT COUNT(*) total FROM pollito";
					$result = $mysqli -> query($sql);
					$fila = mysqli_fetch_assoc($result);
					
        	echo ' <input type="text" name=""   class="N"  value="'.$fila['total'].'">';
?>

        </div>
       
		    
		   

		    <input type="submit" value="Ingresar Pollos" class="btn-registroG"  onclick="document.getElementById('modal-reguistroU').style.display='block'" style="margin-left: 0%;" >
        
        
		    <!-- <input type="text" name="idAdministrador" placeholder="idAdministrador"  class="N"> -->

		    
		    
		</div>
		</div>

		<form  action="?controller=pollito&&action=save" method="POST" class="from-registro">
         <div id="modal-reguistroU" class="w3-modal">
           <div class="w3-modal-content w3-animate-top w3-card-4">
              <header class="w3-container headerModal"> 
                <span onclick="document.getElementById('modal-reguistroU').style.display='none'" 
                class="w3-button w3-display-topright">&times;</span>
                <h2 class="modal-title text-center all-tittles">Ingresar Pollo</h2>
              </header>
              <div style="margin-top: 5%; margin-left: 10%">
                

             <input type="text" name="id_pollo" placeholder="identificador" required="" class="N" size="7px">
             <input type="text" name="peso" placeholder="Peso Actual(kg)" required="" class="N"   size="9px">
             <input type="text" name="linea_genetica" placeholder="linea Genetica" required=""     size="9px">

             <select name="galpon" style="background:#E3E2D3;
                                          color:#0C0C0C;
                                          padding: 10px;
                                          width: 210px;
                                          height: 50px;
                                          border:none; 
                                          font-size: 20px;
                                          box-shadow: 0 5px 25px rgba(201, 200, 187);">
                 <option  value="0">Galpon:</option>
                    <?php
                    $query = $mysqli -> query ("SELECT * FROM galpon");
                    while ($valores = mysqli_fetch_array($query)) {
                     echo '<option value="'.$valores[idCriadero].'">'.$valores[idCriadero].'</option>';
                    
                        }
                     ?>
          
              </select>


             <input type="checkbox" name="" value="Galpon Limpio" required="" class="N"> Galpon Limpio<br>
                
              </div>
              <footer class="w3-container headerModal" style="margin-top:20px; height: 60px">
                <button type="submit" class="btn btn-primary boton-modal" style="background-color:#472E2E" data-dismiss="modal"><i class="zmdi zmdi-thumb-up"></i> &nbsp; Registrar</button>

             </div>

      	  </div>
       </form>
</div>