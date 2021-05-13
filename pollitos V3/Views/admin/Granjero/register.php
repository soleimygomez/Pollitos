<?php
  $mysqli = new mysqli('localhost','root','','pollitos');
?>
<div>
    <form action="?controller=granjero&&action=save"  method="POST" class="from-registro" style="display: inline;" >

    <H2 class="from-titulo"> Registrar Granjero </H2>
         <div class="inputs">     <!-- INICIO DE INPUTS -->
    

               
                   
                        <input type="text" name="nombre" placeholder="Nombre" required="">
                        <input type="text" name="apellido" placeholder="Apellido" required="">

                        <input type="text" name="cedula" placeholder="cedula" required="">
                        <input type="text" name="direccion" placeholder="direccion" required="">

                      
                        <input type="text" name="usuario" placeholder="Usuario" required size="7">
                        <input type="text" name="clave" placeholder="Clave" required="" size="7" >


                   
                            <input type="text" name="telefono" placeholder="telefono" required="" >
                     

                     
                            <div  style="background:#E3E2D3;
                                          color:#0C0C0C;
                                          padding: 10px;
                                          width: 210px;
                                          height: 50px;
                                          border:none; 
                                          font-size: 20px;
                                          box-shadow: 0 5px 25px rgba(201, 200, 187);"> 
                                <select name="tipo" style="background:#E3E2D3;
                                                              color:#0C0C0C;
                                                              padding: 10px;
                                                              width: 210px;
                                                              height: 50px;
                                                              border:none; 
                                                              font-size: 20px;
                                                              box-shadow: 0 5px 25px rgba(201, 200, 187);" >
                                    <option name="tipo"  value="0">tipo de usuario:</option>
                                    <option  name="tipo" value="1">Administrador</option>  
                                    <option name="tipo" value="2">Usuario</option> 
                                </select>
                            </div>
                      
                   
                        
                                    
                         

                         <input   type="submit" value="Registrar" class="btn-registroG">
                     


                   

            

</div>

 </form>



  
</div>






