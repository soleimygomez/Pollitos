<?php
  $mysqli = new mysqli('localhost','root','','pollitos');
?>



<h1> Listado del Galpón </h1>

 

 <table id="tablaSus" class="display " style="width:100%;background-color:#E3E2D3; color: black;  width: 70%;margin-left: 80px; border-radius:10px; opacity: 0.8">
        <thead style="background-color:; color: black;">
            <tr>
                <th>Id del Galpon</th>
                <th>Linea Genetica</th>
                <th>Cantidad de Pollos</th>
                <th>Dias Restantes </th>
               
                
                
            </tr>
        </thead>
        <tbody>
            <tr>
               <?php
                  $query = $mysqli -> query ("SELECT * FROM galpon");
                  while ($valores = mysqli_fetch_array($query)) {

                     echo ' <td>'.$valores["idCriadero"].   '</td>';
                     echo ' <td>'.$valores["lineaGenetica"].'</td>';

                     $sql = "SELECT COUNT(*) total FROM pollito";
                     $result = $mysqli -> query($sql);
                     $fila = mysqli_fetch_assoc($result);
                    
                     echo ' <td> '.$fila['total'].'</td>';
                }

               ?>           
                            <td>44</td>
                            
            </tr>
            
            
        </tbody> 
        <br>

            
                             <input type="submit" class="btn btn-reporte mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect" value="Reportes de  Mortalidad " onclick="document.getElementById('modal-reguistroU').style.display='block'" style="margin-right: 15%;">


                         
                        

                         
                             <input type="submit" class="btn btn-reporte mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect" value="Reporte de Pollos " onclick="document.getElementById('modal-reguistroP').style.display='block'" style="margin-right: 15%">
                                
                                <hr>


                            
    </table>




                   
               






          
 
         <div id="modal-reguistroU" class="w3-modal">
           <div class="w3-modal-content w3-animate-top w3-card-4">
              <header class="w3-container headerModal"> 
                <span onclick="document.getElementById('modal-reguistroU').style.display='none'" 
                class="w3-button w3-display-topright">&times;</span>
                <h2 class="modal-title text-center all-tittles">Reportes de Mortalidad</h2>
              </header>
             <div>
                <table border="4" >
                    
                        <td style="padding: 3%">
                          <form action="../Reportes/reporteLineaGeneticaMortalidad.php"  method="POST">
                            <center>   <p> <b>Reporte por Linea Genetica y Mortalidad</b></p> </center>   
                            <input type="text" name="lineaGenetica" placeholder="Linea Genetica" required="" size="7"> 
                            <input type="text" name="causa" placeholder="Descripcion de Muerte" required="" size="5">
                            <input type="date" name="desdefecha" placeholder="desde fecha" required=""
                                                        style="height: 53px; ">
                            <input type="date" name="hastafecha" placeholder="hasta fecha" required=""  
                                                        style="height: 53px; ">
                            <input type="submit" name="" value="Generar Reporte"  > 
                         </form>
                        </td>

                    
                    
                        <td style="padding: 3%">
                           <form action="../Reportes/reporteMortalidad.php"  method="POST">
                              <center>   <p><b>Reporte por Mortalidad</b></p> </center>  
                              <input type="text" name="causa" placeholder="Causa" size="7">
                              <input type="date" name="desdefecha" placeholder="desde fecha"  style="height: 53px; ">
                              <input type="date" name="hastafecha" placeholder="hasta fecha"  
                                                                    style="height: 53px;  width: 166px; ">
                              <input type="submit" name="" value="Generar Reporte" style="width:  140px; ">                             
                            </form>
                        </td>

                        <tr>
                            <td style="padding: 3%">
                               <form action="../Reportes/reporteLineaGenetica.php"  method="POST"> 
                                  <center><p><b>Reporte por Linea Genetica</b></p></center>    
                                   <input type="text" name="lineaGenetica" placeholder="Linea Genetica" >
                                   <input type="date" name="desdefecha" placeholder="desde fecha" style="height: 53px; ">
                                   <input type="date" name="hastafecha" placeholder="hasta fecha" style="height: 53px; ">
                                   <input type="submit" name="" value="Generar Reporte">
                                </form>
                            </td>

                            <td style="padding: 3%">
                               <form action="../Reportes/reportePorFechas.php"  method="POST"> 
                                 <center><p><b>Reporte por Fechas</b></p></center> 
                                  <input type="date" name="desdefecha" placeholder="desde fecha" 
                                                    style="height: 53px; width: 167px;">
                                  <input type="date" name="hastafecha" placeholder="hasta fecha" 
                                                    style="height: 53px; width: 167px;  ">
                                  <input type="submit" name="" value="Generar Reporte" >
                               </form>
                            </td>
                        </tr>

                </table> 
            </div>
          </div>
        </div>
      
<!-- ------------------------------------------------------------------------------------------------------------------ -->

         <div id="modal-reguistroP" class="w3-modal">
           <div class="w3-modal-content w3-animate-top w3-card-4">
              <header class="w3-container headerModal"> 
                <span onclick="document.getElementById('modal-reguistroP').style.display='none'" 
                class="w3-button w3-display-topright">&times;</span>
                <h2 class="modal-title text-center all-tittles">Reportes de Pollos</h2>
              </header>
             <div>
                <table border="4" >
                    
                        <td style="padding: 3%">
                           <form action="../Reportes/reporteLineaGeneticaGalpon.php"  method="POST"> 
                              <p> <b>Reporte por Linea Genetica y Galpon</b></p>
                              <input type="text" name="lineaGenetica" placeholder="Linea Genetica" required="" size="12px">

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

                             
                              <input type="date" name="desdefecha" placeholder="desde fecha" required="" size="5" 
                                       style="height: 53px; ">
                              <input type="date" name="hastafecha" placeholder="hasta fecha" required=""
                                         style="height: 53px; ">
                              <input type="submit" name="" value="Generar Reporte">
                            </form>
                        </td>

                    
                    
                        <td style="padding: 3%">
                          <form action="../Reportes/reporteLineaGeneticaP.php"  method="POST"> 
                            <p><b>Reporte por Linea Genetica</b></p>
                            <input type="date" name="desdefecha" placeholder="desde fecha" required=""  style="height: 53px;
                                                                                                               width: 160px; ">
                            <input type="date" name="hastafecha" placeholder="hasta fecha" required=""  style="height: 53px;
                                                                                                               width: 160px; ">
                            <input type="submit" name="" value="Generar Reporte">
                          </form>
                        </td>


                        <tr>
                            <td style="padding: 3%">
                              <form action="../Reportes/reporteGalpon.php"  method="POST"> 
                                <p><b>Reporte por Galpon</b></p>  
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
                                <input type="date" name="desdefecha" placeholder="desde fecha" required=""  style="height: 53px; ">
                                <input type="date" name="hastafecha" placeholder="hasta fecha" required=""  style="height: 53px; ">
                                <input type="submit" name="" value="Generar Reporte">
                               </form>
                            </td>


                            <td style="padding: 3%">
                              <form action="../Reportes/reportePorFechasP.php"  method="POST"> 
                                <p><b>Reporte por Fechas</b></p>
                                <input type="date" name="desdefecha" placeholder="desde fecha" required=""  
                                                                style="height: 53px; width: 150px;">
                                <input type="date" name="hastafecha" placeholder="hasta fecha" required=""  
                                                                style="height: 53px; width: 150px; ">
                                <input type="submit" name="" value="Generar Reporte">
                               </form>
                            </td>
                        </tr>

                </table> 

            </div>
          </div>
      
      </div>
           
            
        