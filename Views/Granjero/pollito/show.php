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
|
        				 
                         
                         <form action="../Reportes/index.php">
                             <input type="submit" class="btn btn-reporte mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect" value="Reporte Mortalidad ">
                         </form>

                        <form action="../Reportes/indexpormes.php">
                             <input type="submit" class="btn btn-reporte mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect" value="Reporte de pollos ">
                         </form>

                      
                                


                         
                         <br>
                         <br>

                            
    </table>
               
                   
 <form  action="?controller=pollito&&action=save" method="POST" class="from-registro">
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
                            <p> <b>Reporte por Linea Genetica y Mortalidad</b></p>
                            <input type="text" name="lineaGenetica" placeholder="Linea Genetica" required="" size="7"></input>
                            <input type="text" name="descripciondemuerte" placeholder="Descripcion de Muerte" required="" size="5"></input>
                            <input type="date" name="desdefecha" placeholder="desde fecha" required="" size="5"></input>
                            <input type="date" name="lineaGenetica" placeholder="hasta fecha" required=""></input>
                            <input type="button" name="" value="Generar Reporte">
                        </td>

                    
                    
                        <td style="padding: 3%">
                            <p><b>Reporte por Mortalidad</b></p>
                            <input type="text" name="descripciondemuerte" placeholder="Descripcion de Muerte" required="" size="7"></input>
                            <input type="date" name="desdefecha" placeholder="desde fecha" required=""></input>
                            <input type="date" name="lineaGenetica" placeholder="hasta fecha" required="">
                            <input type="button" name="" value="Generar Reporte">
                            </input>
                        </td>
                        <tr>
                            <td style="padding: 3%">
                              <p><b>Reporte por Linea Genetica</b></p>  
                             <input type="text" name="lineaGenetica" placeholder="Linea Genetica" required=""></input>
                            
                            <input type="date" name="desdefecha" placeholder="desde fecha" required=""></input>
                            <input type="date" name="hastaquefecha" placeholder="hasta fecha" required=""></input>
                             <input type="button" name="" value="Generar Reporte">
                           
                            </td>
                            <td style="padding: 3%">
                               
                            <p><b>Reporte por Fechas</b></p>
                            <input type="date" name="desdefecha" placeholder="desde fecha" required=""></input>
                            <input type="date" name="hastaquefecha" placeholder="hasta fecha" required=""></input>
                            <input type="button" name="" value="Generar Reporte">
                           
                            </td>
                        </tr>

                </table> 

            
          </div>
       </form>



 <form  action="?controller=pollito&&action=save" method="POST" class="from-registro">
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
                            <p> <b>Reporte por Linea Genetica y Galpon</b></p>
                            <input type="text" name="lineaGenetica" placeholder="Linea Genetica" required="" size="7"></input>
                            <input type="text" name="galpon" placeholder="Galpon" required="" size="5"></input>
                            <input type="date" name="desdefecha" placeholder="desde fecha" required="" size="5"></input>
                            <input type="date" name="hastaquefecha" placeholder="hasta fecha" required=""></input>
                            <input type="button" name="" value="Generar Reporte">
                        </td>

                    
                    
                        <td style="padding: 3%">
                            <p><b>Reporte por Linea Genetica</b></p>
                            <input type="text" name="lineaGenetica" placeholder="linea Genetica" required="" size="7"></input>
                            <input type="date" name="desdefecha" placeholder="desde fecha" required=""></input>
                            <input type="date" name="hastaquefecha" placeholder="hasta fecha" required="">
                            <input type="button" name="" value="Generar Reporte">
                            </input>
                        </td>
                        <tr>
                            <td style="padding: 3%">
                              <p><b>Reporte por Galpon</b></p>  
                             <input type="text" name="galpon" placeholder="Galpon" required=""></input>
                            
                            <input type="date" name="desdefecha" placeholder="desde fecha" required=""></input>
                            <input type="date" name="hastaquefecha" placeholder="hasta fecha" required=""></input>
                             <input type="button" name="" value="Generar Reporte">
                           
                            </td>
                            <td style="padding: 3%">
                               
                            <p><b>Reporte por Fechas</b></p>
                            <input type="date" name="desdefecha" placeholder="desde fecha" required=""></input>
                            <input type="date" name="hastaquefecha" placeholder="hasta fecha" required=""></input>
                            <input type="button" name="" value="Generar Reporte">
                           
                            </td>
                        </tr>

                </table> 

            
          </div>
       </form>




        </div>
       
            
           
            
        